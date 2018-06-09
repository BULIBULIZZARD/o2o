<?php
namespace app\index\controller;

use think\Controller;

class Base extends Controller
{
    public $city='';
    public $account='';
    public $cates=[];
    public function _initialize(){
        $citys=model('city')->getNormalCitys();
        $this->cates=$this->getRecommendCats();
        $this->getCity($citys);
        $this->assign('citys',$citys);
        $this->assign('city',$this->city);
        $this->assign('user',$this->getLoginUser());
        $this->assign('cates',$this->cates);
        $this->assign('controller',strtolower(request()->controller()));
        $this->assign('tttitle','o2o团购网');
        
    }
    
    public function getCity($citys){
        $defaultname='';
        foreach ($citys as $value){
            $value = $value->toArray();
            if($value['is_default']==1){
                $defaultname=$value['uname'];
                break;
            }
        }
        $defaultname = $defaultname?$defaultname:'nanchang';
        if(session('cityuname','','o2o') && !input('get.city')){
            $cityuname=session('cityuname','','o2o') ;
            
        }else {
            $cityuname = input('get.city',$defaultname,'trim');
            session('cityuname',$cityuname,'o2o');
        }
        $this->city =model('City')->where(['uname'=>$cityuname])->find();
    }
    public function getLoginUser(){
        if(!$this->account)$this->account=session('o2o_user','','o2o');
        return $this->account;
    }
    /*
     * 分类数据
     */
    public function getRecommendCats(){
        $parentIds=[];
        $childarr=[];
        $catearr=[];
        $cats=model('Category')->getNormalRecommendCategoryByParentId(0,5);
        foreach ($cats as $value){
            $parentIds[]=$value->id;
        }
        $catechild=model('Category')->getNormalCategoryIdParentId($parentIds);
        foreach ($catechild as $value){
            $childarr[$value->parent_id][]= 
                [
                    'id' => $value->id , 
                    'name' => $value->name,
                ];
        }
        //所有分类数组整合
        foreach ($cats as $value){
            $catearr [$value->id] = 
                [   
                    'id' => $value->id,
                    'name'=>$value->name , 
                    'child'=>empty($childarr[$value->id])?[]:$childarr[$value->id],
                ];
        }
        return $catearr;
    }
    
    
    
    
}
