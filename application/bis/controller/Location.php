<?php
namespace app\bis\controller;

use think\Controller;

class Location extends Base
{
    public function index()
    {
        $data=model('BisLocation')->getLocation($this->account->bis_id);
        $this->assign('location',$data);
        return view();
    }
    public function add(){
        
        if(request()->isPost()){
            $data=input('post.');
            $validate= validate('BisLocation');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            //获取经纬度
            $lng=\Map::getLngLat($data['address']);
            if(empty($lng)||$lng['status']!=0||$lng['result']['precise']!=1){
                $this->error('无法获取数据,或地址不够准确');
            }
            $bisId=$this->account->bis_id;
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
                'is_main' => 0,
                'xpoint'=> empty($lng['result']['location']['lng'])?'':$lng['result']['location']['lng'],
                'ypoint'=> empty($lng['result']['location']['lat'])?'':$lng['result']['location']['lat'],
                'open_time'=>$data['open_time'],
            ];
            $locationId=model('BisLocation')->add($locationData);
            $locationId?$this->success('添加成功'):$this->error('添加失败请重试');
        }
        $citys=model('city')->getNormalCitysByparentId();
        $category=model('category')->getNormalCategoryByparentId();
        $this->assign('citys',$citys);
        $this->assign('categorys',$category);
        return  view();
    }
    public function edit($id){
        if(empty($id))$this->error('没有查询到数据');
        $detail=model('BisLocation')->get($id);
        $citys=model('city')->getNormalCitysByparentId();
        $category=model('category')->getNormalCategoryByparentId();
        $catekid=model('category')->getNormalCategoryByparentId($detail->category_id);
        $citykid=model('city')->getNormalCitysByparentId($detail->city_id);
        $view=[
            'location'=>$detail,
            'citys'=>$citys,
            'categorys'=>$category,
            'catekid'=>$catekid,
            'citykid'=>$citykid,
        ];
        $this->assign($view);
        return view();
    }
}
