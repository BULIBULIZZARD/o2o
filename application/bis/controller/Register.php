<?php
namespace app\bis\controller;

use think\Controller;

class Register extends Controller
{   
    public function index(){
        $citys=model('city')->getNormalCitysByparentId();
        $category=model('category')->getNormalCategoryByparentId();
        $this->assign('citys',$citys);
        $this->assign('category',$category);
        return view();
    }
    public function add(){
        if(!request()->isPost()){
            $this->error('REQUEST_ERROR');
        }
        $data=input('post.','','htmlentities');
        $validate= validate('Bis');
        if(!$validate->check($data)){
            $this->error($validate->getError());
        }
        $account=model('BisAccount')->get(['username'=>$data['username']]);
        if($account){
           $this->error('此用户名已存在'); 
        }
        
//         $validate= validate('BisAccount');
//         if(!$validate->check($data)){
//             $this->error($validate->getError());
//         }
        //获取经纬度
        $lng=\Map::getLngLat($data['address']);
        if(empty($lng)||$lng['status']!=0||$lng['result']['precise']!=1){
            $this->error('无法获取数据,或地址不够准确');
        }
        
        //商户信息入库
        $bisData=[
            'name' => $data['name'],
            'city_id' => $data['city_id'],
            'city_path' => empty($data['se_city_id'])?$data['city_id']:$data['city_id'].','.$data['se_city_id'],
            'logo' => $data['logo'],
            'licence_logo' => $data['licence_logo'],
            'description' => empty($data['description'])?'':$data['description'],
            'bank_info' => $data['bank_info'],
            'bank_user' => $data['bank_user'],
            'bank_name' => $data['bank_name'],
            'faren'=> $data['faren'],
            'faren_tel'=> $data['faren_tel'],
            'email' => $data['email'],
        ];
        $bisId=model('Bis')->add($bisData);
        
        //总店信息校验
        
        
        $data['cat']='';
        if(!empty($data['se_category_id'])){
            $data['cat']=implode('|', $data['se_category_id']);
        }
        //总店信息入库
        $locationData=[
            'bis_id'=>$bisId,
            'name' => $data['name'], 
            'logo' => $data['logo'],
            'tel' => $data['tel'], 
            'contact' => $data['contact'], 
            'category_id' => $data['category_id'], 
            'category_path' => $data['category_id'].','.$data['cat'], 
            'city_id' => $data['city_id'],
            'city_path' => empty($data['se_city_id'])?$data['city_id']:$data['city_id'].','.$data['se_city_id'],
            'address' => $data['address'], 
            'content' => empty($data['content'])?'':$data['content'],
            'is_main' => 1,//总店 
            'xpoint'=> empty($lng['result']['location']['lng'])?'':$lng['result']['location']['lng'],
            'ypoint'=> empty($lng['result']['location']['lat'])?'':$lng['result']['location']['lat'],
            'open_time'=>$data['open_time'],
        ];
        $locationId=model('BisLocation')->add($locationData);
        
        //账户信息监狱
        //账户信息入库
        //自动加盐字符串(ha)
        $data['code']=mt_rand(100,10000);
        $accountData=[
            'bis_id'=>$bisId,
            'username'=>$data['username'],
            'code' => $data['code'],
            'password'=>md5($data['password'].$data['code']),
            'is_main'=>1,//总管理员
        ];
        $AccountId=model('BisAccount')->add($accountData);
        
        
        //发送邮件 
        $url=request()->domain().url('bis/register/waiting',['id'=>$bisId]);
        $title = "o2o商城入驻验证邮件";
        $content= "已收到你的入驻申请,请等待管理员的审核,您可以通过点击链接<a href=\"".$url."\" target='_blank'>chick it!</a>关注审核进程";
        \phpmailer\Email::send($data['email'], $title, $content);
        $this->success('申请成功,请等待管理员审核信息',url('register/waiting',['id'=>$bisId]));
    }
    public function waiting($id){
        if(empty($id))$this->error('error');
        $detail=model('Bis')->get($id);
        $this->assign('detail',$detail);
        return view();
    }
}