<?php
namespace app\common\model;

use think\Model;

class Deal extends BaseModel
{
    public function getAllDealByBisId($bis_id){
        $order=[
            'id'=>'desc',
        ];
        
        $data=[
            'bis_id'=>$bis_id,
        ];
        return $this->where($data)
        ->order($order)
        ->paginate();
    }
    
    public function getDealByStatus($status=0){
        $order=[
            'id'=>'desc',
        ];
        
        $data=[
            'status'=>$status,
        ];
        return $this->where($data)
        ->order($order)
        ->paginate();
    }
    public function getNormalDeals($search=[]){
        $search['status']=1;
        $order=[
            'listorder'=>'desc',
            'id'=>'desc',
        ];
        $result=$this->where($search)
        ->order($order)
        ->paginate();
        return $result;
    }
    public function getNomalDealCategoryCityId($cate_id,$city_id,$limit=10){
        $data=[
            'end_time' => ['gt',time()],
            'category_id' => $cate_id,
            'city_id' => $city_id,
            'status' => 1,
        ];
        $order=[
            'listorder' => 'desc',
            'id' => 'desc',
        ];
        if($limit){
        $result=$this->where($data)
                        ->order($order)
                        ->limit($limit)
                        ->select();
        }else {
            $result=$this->where($data)
            ->order($order)
            ->select();
        }
        return $result;
        
    }
    public function getDealByConditions($data=[],$orders){
        if (!empty($orders['order_sales'])){
            $order['buy_count']='desc';
        }
        if (!empty($orders['order_price'])){
            $order['current_price']='desc';
        }
        if (!empty($orders['order_time'])){
            $order['create_time']='desc';
        }
        $datas=[];
        if (!empty($data['id'])){
            $datas[]="find_in_set(".$data['id'].",se_category_id) or category_id=".$data['id'];
        }
        if (!empty($data['city_id'])){
            $datas[]='city_id='.$data['city_id'];
        }
        $datas[]='status=1';
        $datas[]='end_time >'.time();
        $order['id']='desc';
        $result = $this->where(implode(' and ',$datas))->order($order)->paginate(); 
        return $result;
        
    }
    
    
    
    
    
}