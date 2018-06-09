<?php
namespace app\index\controller;

use think\Controller;
use phpmailer\PHPMailer;

class Pay extends Base
{
    public function index(){
        if (!$user=$this->getLoginUser()){
            $this->error('登陆后才能购买商品哦',url('user/login'));
        }
        $id = input('get.id',0,'intval');
        if (empty($id)){
            $this->error('没有查到商品信息');
        }
        //并不能做出微信支付 先放一个好友二维码吧(_ _);
       $order = model('Order')->get($id);
       if ($order ->username != $user->username)$this->error('订单打开失败');
       $deal = model('Deal') ->get($order->deal_id);
       $this->assign([
           'deal'=>$deal,
           'order'=>$order,
           
       ]);
       return view();
    }
    
    public function Pay(){
        if (!$user=$this->getLoginUser()){
            $this->error('登陆后才能购买商品哦',url('user/login'));
        }
        $id = input('get.id',0,'intval');
        if (empty($id)){
            $this->error('没有查到商品信息');
        }
        $order = model('Order')->get($id);
        if ($order ->username != $user->username)$this->error('订单打开失败');
        $data = [
          'transaction_id'=>$id,
          'pay_time'=>time(),
          'status'=>1,
          'id'=>$id,
        ];
        
       
        model('Order')->update($data)?true:$this->error('更新订单失败');
        model('Deal')->where(['id'=>$order->deal_id])->setInc('buy_count',$order->deal_count);
        $coupons=[
            'sn'=>$order->out_trade_no,
            'password'=>rand(10000,99999),
            'user_id'=>$order->user_id,
            'deal_id'=>$order->deal_id,
            'order_id'=>$order->id,
        ];
        model('Coupons')->add($coupons);
        $title = "您购买的o2o商城团购卷已发送";
        $content= "您购买的o2o商城团购卷已发送 请在购物时出示此团购卷 ".$order->out_trade_no;
        \phpmailer\Email::send($user->email, $title, $content);
        $this->success('支付成功?',url('pay/paysuccess'));
    }
        
    public function paysuccess(){
        
        if (!$user=$this->getLoginUser()){
            $this->error('登陆后才能购买商品哦',url('user/login'));
        }
        return view();
    }
}