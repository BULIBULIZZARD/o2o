<?php
namespace app\admin\validate;
use think\Validate;

class Bis extends Validate{
    protected $rule=[
        ['id','number','非法id'],
        ['status','number|in:-1,0,1,2','错误的状态信息'],
    ];
    
    protected $scene=[
      'status'=> ['id','status'],
    ];
  
}
