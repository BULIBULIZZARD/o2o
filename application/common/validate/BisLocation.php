<?php
namespace app\common\validate;
use think\Validate;

class BisLocation extends Validate{
    protected $rule= [
        'name' => 'require|max:25',
        'logo' => 'require',
        'city_id'=>'require',
        'tel' =>'require',
        'contact' => 'require',
        'category_id' => 'require',
        'address' => 'require',
    ];
    
   
}
