<?php
namespace app\bis\controller;

use think\Controller;
use app\admin\controller\Index;

class Login extends Controller
{

    public function index(){
        if (request()->isPost()){
            $data=input('post.');
            $validate=validate('BisAccount');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            $account=model('BisAccount')->get(['username'=>$data['username']]);
            if(!$account)$this->error('不存在此账户');
            if($account->status!=1)$this->error('此账号不能登陆');
            if(md5($data['password'].$account->code)!=$account->password){
                $this->error('密码错误');   
            }
            model('BisAccount')->updateById($account->id);
            // 三参  作用域
            session('bisAccount',$account,'bis');
            $this->success('登陆成功',url('index/index'));
            return ;
        }
        
        $account=session('bisAccount','','bis');
        if($account && $account ->id){
            return $this->redirect(url('index/index'));
        }
        return view(); 
    } 
    
    public function logout(){
       session(null,'bis');
       return $this->redirect(url('login/index'));
    }
}