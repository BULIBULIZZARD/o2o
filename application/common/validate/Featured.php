<?php
namespace app\common\validate;
use think\Validate;

class Featured extends Validate{
    protected $rule= [
        'title' => 'require|min:2|max:25',
        'image'=>'require',
        'type'=>'number|require',
    ];
}
