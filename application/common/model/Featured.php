<?php
namespace app\common\model;

use think\Model;

class Featured extends BaseModel
{
    public function getFeaturedByType($type=0){
        $order=[
            'id'=>'desc',
        ];
        $data=[
            'type'=>$type,
            'status' => ['neq',-1]
        ];
        return $this->where($data)
        ->order($order)
        ->paginate();
    }
    public function getNormalFeaturedByType($type=0)
    {
        $order=[
            'id'=>'desc',
        ];
        $data=[
            'type'=>$type,
            'status' => ['eq',1]
        ];
        return $this->where($data)
        ->order($order)
        ->select();
    }
}
    
