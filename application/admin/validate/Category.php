<?php
namespace app\admin\validate;
use think\Validate;

class Category extends Validate{
    protected $rule=[
        ['name','require|max:10','分类名称不能为空|分类名称不能大于10字符'],
        ['parent_id','number'],
        ['id','number','非法id'],
        ['status','number|in:-1,0,1','错误的状态信息'],
        ['listorder','number'],
    ];
    
    protected $scene=[
      'edit'=> ['id','name','parent_id'],
      'add'=>  ['name','parent_id'],
      'listorder'=>['id','listorder'],
      'status'=> ['id','status'],
    ];
  
}
