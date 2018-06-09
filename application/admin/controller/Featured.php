<?php
namespace app\admin\controller;

use think\Controller;
class Featured extends Base
{
    private $model;
    public function _initialize(){
        $this->model=model('Featured');
    }
    public function index()
    {
        $type=input('get.type',0,'intval');
        $featureds=$this->model->getFeaturedByType($type);
        $types=config('featured.featured_type');
        $this->assign('types',$types);
        $this->assign('featureds',$featureds);
        $this->assign('tp',$type);
        return view();
    }
    //入驻申请 
    public function add(){
        if (request()->isPost()){
            $data=input('post.');
            $validate=validate('featured');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            $this->model->add($data)?$this->success('添加成功'):$this->error('添加失败');
            return ;
        }
        $types=config('featured.featured_type');
        $this->assign('types',$types);
        return view();
    }
   
}
