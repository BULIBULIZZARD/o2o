<?php
namespace app\admin\controller;

use think\Controller;
class Deal extends Base
{
    public $model;
    public function _initialize(){
        $this->model=model('Deal');
    }
    public function index()
    {
        $data=input('get.');
        $search=[];
        if(!empty($data['start_time'])&&!empty($data['end_time'])&& strtotime($data['start_time'])<strtotime($data['end_time'])){
            $search['create_time']=[
                'gt',strtotime($data['start_time']),
                'lt',strtotime($data['end_time']),
            ];
        }
        if(!empty($data['category_id'])){
            $search['category_id']=$data['category_id'];
        }
        if(!empty($data['city_id'])){
            $search['city_id']=$data['city_id'];
        }
        if(!empty($data['name'])){
            $search['name']=[
                'like', '%'.$data['name'].'%'
            ];
        }
        $categorys=model('Category')->getNormalCategoryByparentId();
        $citys=model('City')->getNormalCitys();
        $deals=$this->model->getNormalDeals($search);
        $view=[
            'deals'=>$deals,
            'categorys'=>$categorys,
            'citys'=>$citys,
            'category_id'=>empty($data['category_id'])?'':$data['category_id'],
            'city_id'=>empty($data['city_id'])?'':$data['city_id'],
            'start_time'=>empty($data['start_time'])?'':$data['start_time'],
            'end_time'=>empty($data['end_time'])?'':$data['end_time'],
            'name'=>empty($data['name'])?'':$data['name'],
        ];
        $this->assign($view);
        return view();
    }
   
    public function apply()
    {
        $deals=$this->model->getDealByStatus();
        $this->assign('deals',$deals);
        return view();
    }
  
}
