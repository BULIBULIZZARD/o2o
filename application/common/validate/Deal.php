<?php
namespace app\common\validate;
use think\Validate;

class Deal extends Validate{
    protected $rule= [
        'name' => 'require|min:3|max:25',
        'city_id'=> 'require|number',
        'location_ids' => 'require',
        'image' => 'require',
        'category_id'=>'require',
        'start_time'=>'require|max:25',
        'end_time'=>'require|max:25',
        'total_count' => 'require|number',
        'origin_price' => 'require|number',
        'current_price' => 'require|number',
        'coupons_begin_time' => 'require|max:25',
        'coupons_end_time' => 'require|max:25',
        'description' => 'max:1000',
        'notes' => 'max:1000',
    ];
}
