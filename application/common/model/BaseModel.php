<?php
namespace app\common\model;

use think\Model;

class BaseModel extends Model
{
    protected $autoWriteTimestamp=true;
    public function add($data){
        $data['status']=0;
        $this->save($data);
        return $this->id;
    }
    public function updateById($id){
        $data=[
            'last_login_time'=>time(),
            'last_login_ip' =>$_SERVER["SERVER_ADDR"],
        ];
        //allowField()过滤非数据表中数据
        return $this->save($data,['id'=>$id]);
    }
   
}