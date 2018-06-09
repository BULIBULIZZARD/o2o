<?php

namespace app\Common\model;

use think\Model;

class City extends Model
{
    //
    
    public function getNormalCitysByparentId($parentId=0){
        $date=[
            'status'=>['neq',-1],
            'parent_id'=>$parentId,
        ];
        $order=[
            'listorder'=>'desc',
            'id'=>'desc',
        ];
        return
        $this->where($date)
        ->order($order)
        ->select();
    }
    public function getNormalCitys(){
        $date=[
            'status'=>['neq',-1],
            'parent_id'=>['gt',0],
        ];
        $order=[
            'listorder'=>'desc',
            'id'=>'desc',
        ];
        return
        $this->where($date)
        ->order($order)
        ->select();
    }
}
