<?php
namespace app\common\model;

use think\Model;

class Category extends Model
{
    protected $autoWriteTimestamp=true;
    public function add($data){
        $data['status']=1;
        //$data['create_time']=time();
        return $this->save($data);
    }
    
    public function getNormalFirstCategory(){
        $date=[
          'status'=>'1',
          'parent_id'=>'0',
        ];
        $order=[
            'id'=>'desc',
        ];
        return 
        $this->where($date)
             ->order($order)
             ->select();
    }
    public function getFirstCategory($parentId=0){
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
                ->paginate();
    }
    
    public function getNormalCategoryByparentId($parentId=0){
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
    
    public function getNormalRecommendCategoryByParentId($id=0,$limit){
        $data=[
            'parent_id'=>$id,
            'status' => 1,
        ];
        $order=[
            'listorder' => 'desc',  
            'id' => 'desc',
        ];
        if ($limit){
            $result=$this->where($data)->order($order)->limit($limit)->select();
        }else {
            $result=$this->where($data)->order($order)->select();
        }
        return $result;
    }
    public function getNormalCategoryIdParentId($parentId){
        $data=[
            'parent_id'=>['in',implode(',', $parentId)],
            'status' => 1,
        ];
        $order=[
            'listorder' => 'desc',
            'id' => 'desc',
        ];
        $result=$this->where($data)->order($order)->select();
        return $result;
    }
}