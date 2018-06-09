<?php
namespace app\index\controller;

use think\Controller;

class User extends Base
{
    public function login()
    {
        $user = session('o2o_user','','o2o');
        if($user && $user->id){
            $this->redirect(url('index/index'));
        }
        if (request()->isPost()){
            $data=input('post.');
            $validate=validate('user');
            if(!$validate->scene('login')->check($data))$this->error($validate->getError());
            $user=model('User')->getUserByUsername($data['username']);
            if(!$user)$this->error('此账号尚未注册');
            if(md5($data['password'].$user->code)!=$user->password){
                $this->error('用户名或密码错误');
            }
            model('User')->updateById($user->id);
            session('o2o_user',$user,'o2o');            
            $this->success('登陆成功',url('index/index'));
        }
        return view();
    }
    public function register()
    {
        if(request()->isPost()){
            $data=input('post.');
            $validate=validate('user');
            if(!$validate->check($data))$this->error($validate->getError());
            if ($data['password']!=$data['repassword'])$this->error('两次密码不一致');
            if(!captcha_check($data['verifycode'])){
                $this->error('验证码填写错误');
            }
            $data['code']=mt_rand(100,10000);
            
            $user=[
                'username'=>$data['username'],
                'code'=>$data['code'],
                'password'=>md5($data['password'].$data['code']),
                'email'=>$data['email'],
            ];
            model('user')->add($user)?$this->success('注册成功',url('user/login')):$this->error('注册失败请重试');
        }
        return view();
    }
    public function logout()
    {
        session(null,'o2o');
        $this->redirect(url('user/login'));
    }
}
