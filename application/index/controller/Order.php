<?php
namespace app\index\controller;

use think\Controller;

class Order extends Base
{
    
    public function index(){
        if (!$user=$this->getLoginUser()){
            $this->error('登陆后才能购买商品哦',url('user/login'));
        }
        $id = input('get.id',0,'intval');
        if (empty($id)){
            $this->error('没有查到商品信息');
        }
        $dealCount = input('get.deal_count',0,'intval');
        $totalPrice = input('get.total_price',0,'intval');
        
        $deal = model('Deal')->find($id);
        if (!$deal || $deal->status !=1 ) $this->error('没有查到商品信息');
        if (empty($_SERVER['HTTP_REFERER'])) $this->error('错误的打开方式');
        $orderSn=setOrderSn();
        $data = [
            'out_trade_no'=>$orderSn,
            'user_id' => $user->id,
            'username' => $user->username,
            'deal_id'=> $id,
            'deal_count'=> $dealCount,
            'total_price'=> $totalPrice,
            'referer' => $_SERVER['HTTP_REFERER'],
        ];
        $orderId=model('Order')->add($data);
        if (empty($orderId))$this->error('订单生产失败');
        $this->redirect(url('pay/index',['id'=>$orderId]));
        
    }
    public function confirm(){
        if (!$this->getLoginUser()){
               $this->error('登陆后才能购买商品哦',url('user/login'));
        }
        $id = input('get.id',0,'intval');
        if (empty($id)){
            $this->error('没有查到商品信息');
        }
        $count = input('get.count',1,'intval');
        $deal = model('Deal')->get($id);
        if (!$deal || $deal->status !=1 ) $this->error('没有查到商品信息');
        if ($deal->end_time < time()) $this->error('当前团购商品已经结束');
        $this->assign([
            'controler'=>'pay',
            'deal' => $deal,
            'count'=>$count,
        ]);
        return view();
    }
}
