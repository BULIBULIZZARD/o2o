<?php
namespace app\api\controller;

use think\Controller;


class Category extends Controller
{
    private $model;
    public function _initialize(){
        $this->model=model('Category');
    }
    public function getCategoryByParentId()
    { 
       $id =input('post.id',0,'intval');
       if(!$id){
           $this->error('ID不合法');
       }
       $category=$this->model->getNormalCategoryByparentId($id);
       if(!$category){
           return show(0,'error');
       }
       return show(1,'success',$category);
    }
    
   
}
