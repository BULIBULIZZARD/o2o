<?php
namespace app\admin\controller;

use think\Controller;


class Category extends Base
{
    public $model;
    public function _initialize(){
        $this->model=model('Category');
    }
    public function index()
    { 
        $parentId=input('get.parent_id',0,'intval');
        $cate=$this->model->getFirstCategory($parentId);
        $this->assign('category',$cate);
        return view();
    }
    
    public function add(){
        $category=$this->model->getNormalFirstCategory();
        $this->assign('category',$category);
        return view();
    }
    
    public function save(){
         if(!request()->isPost()){
             $this->error('请求失败');
         }
         $date=input('post.');
         $validate=validate('Category');
         if(!empty($date['id'])){
             if(!$validate->scene('edit')->check($date)){
                 $this->error($validate->getError());
             }
             $this->model->update($date)?$this->success('修改成功'):$this->error('修改失败请重试');
             return ;
         }
         
         if(!$validate->scene('add')->check($date)){
             $this->error($validate->getError());
         }
         $this->model->add($date)?$this->success('添加成功'):$this->error('添加失败请重试');
         
    }
    
    public function edit($id){
        if(intval($id)<1){
            $this->error('非法参数');
        }
        $date=$this->model->get($id);
        $category=$this->model->getNormalFirstCategory();
        $this->assign('date',$date);
        $this->assign('category',$category);
        return view();
    }
    
   
}
