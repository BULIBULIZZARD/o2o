<?php
namespace app\common\model;

use think\Model;

class BisLocation extends BaseModel
{
    public function getLocation($bis_id,$status=1){
        $order=[
            'id'=>'desc',
        ];
        
        $data=[
            'status'=>$status,
            'bis_id'=>$bis_id,
        ];
        return $this->where($data)
        ->order($order)
        ->paginate();
    }
    
    public function getNormalLocationByBisid($bis_id,$status=1){
        $order=[
            'id'=>'desc',
        ];
        
        $data=[
            'status'=>$status,
            'bis_id'=>$bis_id,
        ];
        return $this->where($data)
        ->order($order)
        ->select();
    }
    
    public function getNormalLocationsInId($ids){
        $data=
        [
            'id' => ['in' , $ids],
            'status'=> 1,
        ];
        return $this->where($data)->select();
    }
}
    
