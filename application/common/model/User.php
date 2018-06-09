<?php
namespace app\common\model;

use think\Model;

class User extends BaseModel
{
    public function add($data=[]){
        $data['status']=1;
        return  $this->save($data);
        
    }
    
    public function getUserByUsername($username){
        $data=[
          'username'=>$username  
        ];
        return $this->where($data)->find();
    }
   
}