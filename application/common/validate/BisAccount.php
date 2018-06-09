<?php
namespace app\common\validate;
use think\Validate;

class BisAccount extends Validate{
    protected $rule= [
        'username'=> 'require|min:6|max:20',
        'password'=> 'require|min:6|max:20',
    ];
}
