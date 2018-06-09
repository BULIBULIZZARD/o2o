<?php
namespace app\admin\controller;

use think\Controller;
class Bis extends Controller
{
    private $model;
    public function _initialize(){
        $this->model=model('Bis');
    }
    public function index()
    {
        $bis=$this->model->getBisByStatus(1);
        $this->assign('Bis',$bis);
        return view();
    }
    //入驻申请 
    public function apply(){
        $bis=$this->model->getBisByStatus();
        $this->assign('Bis',$bis);
        return view();
    }
    public function detail($id){
        if(empty($id))$this->error('无法查询到信息,请重试');
        $citys=model('city')->getNormalCitysByparentId();
        $category=model('category')->getNormalCategoryByparentId();
        $bisData=model('Bis')->get($id);
        $locationData=model('BisLocation')->get(['bis_id'=>$id,'is_main'=>1,]);
        $accountData=model('BisAccount')->get(['bis_id'=>$id,'is_main'=>1,]);
        $catekid=model('category')->getNormalCategoryByparentId($locationData->category_id);
        $data=[
            'citys'=>$citys,
            'category'=>$category,
            'bisdata'=>$bisData,
            'locationdata'=>$locationData,
            'accountdata'=>$accountData,
            'catekid'=>$catekid,
        ];
        $this->assign($data);
//         $this->assign('category',$category);
        return view();
    }
    public function status(){
        $arr=input('get.');
        $validate=validate('Bis');
        if(!$validate->scene('status')->check($arr)){
            $this->error($validate->getError());
        }
        $bis=$this->model->update($arr);
        $location=model('BisLocation')->save(['status'=>$arr['status']],['bis_id'=>$arr['id'],'is_main'=>1]);
        $account=model('BisAccount')->save(['status'=>$arr['status']],['bis_id'=>$arr['id'],'is_main'=>1]);
        if($bis&&$location&&$account){
            //被吃的邮件
//             $bisdata=$this->model->get($arr['id']);
//             $to=$bisdata->email;
//             switch ($arr['status']){
//                 case 1:
//                     $title="您商户入驻申请\"".$bisdata->name."\"已通过审核";
//                     $content="您商户入驻申请\"".$bisdata->name."\"已通过审核请点击这里<a>chick_it</a>来了解详细信息";
//                 case 0:
//                     $title="您已未审核";
//                     $content="恭喜您已未审核";
//                 case 2:
//                     $title="您未通过审核";
//                     $content="恭喜您通过审核";
//                 case -1:
//                     $title="您的信息存在违规已被删除";
//                     $content="您的信息存在违规已被删除";
//             }
//             \phpmailer\Email::send($to, $title, $content);
            $this->success('操作成功');
        }else {
            $this->error('操作失败请重试');
        }
    }
   
}
