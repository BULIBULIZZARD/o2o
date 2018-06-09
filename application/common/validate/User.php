<?php
namespace app\common\validate;
use think\Validate;

class User extends Validate{
    protected $rule= [
        'username' => 'require|unique:user|min:2|max:25',
        'email'=>'email|require|unique:user',
        'password'=>'require|min:6|max:25',
        'repassword'=>'require|min:6|max:25',
        'verifycode'=>'require',
    ];
    
    protected $scene =[
        'login' => [  
            'username' => 'require|min:2|max:25',
            'password'=>'require|min:6|max:25',
        ],
    ];
}
