<?php
namespace app\bis\controller;

use think\Controller;

class Base extends Controller
{
    public $account;
    public function _initialize()
    {
        // 登陆判断
        $islogin=$this->isLogin();
        if(!$islogin){
            $this->redirect(url('login/index'));
        }
    }
    
    public function isLogin(){
        $user=$this->getLoginUser();
        if($user && $user->id){
            return true;
        }else{
            return false;
        }
    }
    
    public function getLoginUser(){
        if(!$this->account)$this->account=session('bisAccount','','bis');
        return $this->account;
    }
}
