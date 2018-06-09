<?php
namespace app\admin\controller;

use think\Controller;
class Base extends Controller
{
    
    public function status(){
        $arr=input('get.');
        $validate=validate('Category');
        if(!$validate->scene('status')->check($arr)){
            $this->error($validate->getError());
        }
        $model=request()->controller();
        model($model)->update($arr)?$this->success('操作成功'):$this->error('操作失败请重试');
    }
    
    public function listorder($id,$listorder){
        $this->model->save(['listorder'=>$listorder],['id'=>$id])?
        $this->result($_SERVER['HTTP_REFERER'],1,'排序成功'):
        $this->result($_SERVER['HTTP_REFERER'],0,'修改失败');
    }
}
