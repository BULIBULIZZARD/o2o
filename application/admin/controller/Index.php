<?php
namespace app\admin\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return view();
    }
    
    public function welcome(){
        // \phpmailer\Email::send('bva7ustkhx@163.com', '今天不开会', '今天不开会');
        return 'Welcome to Mickey niaoniao house';
    }
    public function test(){
        return  \Map::staticimage('哈尔滨黑龙江科技大学');
        
    }
   
}
