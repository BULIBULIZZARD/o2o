<?php
namespace app\common\validate;
use think\Validate;

class Bis extends Validate{
    protected $rule= [
        'name' => 'require|max:25',
        'email'=> 'require|email',
        'logo' => 'require',
        'city_id'=>'require',
        'bank_info'=>'require',
        'bank_name'=>'require',
        'bank_user'=>'require',
        'faren'=>'require',
        'faren_tel'=>'require',
        'tel' =>'require',
        'contact' => 'require',
        'category_id' => 'require',
        'address' => 'require',
        'username'=> 'require|min:8|max:20',
        'password'=> 'require|min:8|max:20',
    ];
    
    protected $scene=[
        'add' => [  'name' ,
                    'email',
                    'logo' ,
                    'city_id',
                    'bank_info',
                    'bank_name',
                    'bank_user',
                    'faren',
                    'faren_tel'],
        'location' => [  
            'name' ,
            'city_id',
            'logo' ,
            'tel',
            'contact',
            'category_id',
            'address',
            ]
    ];
}
