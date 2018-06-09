<?php
namespace app\api\controller;

use think\Controller;


class City extends Controller
{
    private $model;
    public function _initialize(){
        $this->model=model('City');
    }
    public function getCitysByParentId()
    { 
       $id =input('post.id');
       if(!$id){
           $this->error('ID不合法');
       }
       $city=$this->model->getNormalCitysByparentId($id);
       if(!$city){
           return show(0,'error');
       }
       return show(1,'success',$city);
    }
    
   
}
