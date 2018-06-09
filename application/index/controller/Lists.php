<?php
namespace app\index\controller;

use think\Controller;

class Lists extends Base
{
    public function index()
    {
        $id = input('id',0,'intval');
        $listcate=model('Category')->getNormalCategoryByparentId();
        $listchild=[];
        $check =model('Category')->get($id);
        if (!empty($id)){
            if(!$check)$this->error('没有查询到栏目信息');
            if ($check->status!=1)$this->error('栏目出错');
            if ($check->parent_id!=0){
                $id = $check->parent_id;
             }
            $listchild=model('Category')->getNormalCategoryByparentId($id);
        }
        $order_sales = input('order_sales','');
        $order_price = input('order_price','');
        $order_time = input('order_time','');
        $orders=[];
        if(!empty($order_sales)){
            $orderflag='order_sales';
            $orders['order_sales']=$orderflag;
        }else if(!empty($order_price)) {
            $orderflag='order_price';
            $orders['order_price']=$orderflag;
        }
        else if(!empty($order_time)) {
            $orderflag='order_time';
            $orders['order_time']=$orderflag;
        }else {
            $orderflag='';
        }
        if(!empty($id)){
            $deals=model('Deal')->getDealByConditions(['id'=>input('id',0,'intval'),'city_id'=>$this->city->id],$orders);
        }else {
            $deals=model('Deal')->getDealByConditions(['city_id'=>$this->city->id],$orders);
        }
       
        $this->assign(
            [
                'listcate'=>$listcate,
                'listchild'=>$listchild,
                'checkid'=>$id,
                'childcheck'=>input('id',0,'intval'),
                'orderflag'=>$orderflag,
                'deals' => $deals,
            ]);
        return view();
    }
}