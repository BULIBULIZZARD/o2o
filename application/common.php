<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function status ($status){
    if($status==1){
        $str="<span class='label label-success radius'>正常</span>";
    }else if($status==0){
        $str="<span class='label label-danger radius'>待审</span>";
    }else{
        $str="<span class='label label-danger radius'>删除</span>";
    }
    return $str;
}

function doCurl($url,$type=0,$data=[]){
    $ch=curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    if($type==1){
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        
    }
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}
function bisRegister($status){
    if($status==1){
        $str="入驻申请成功!";
    }else if($status==0){
        $str="审核尚未成功,审核后会收到通知,请注意查收";
    }    
    else if($status==2){
        $str="非常抱歉审核未通过,请您重新提供详细的信息";
    }else {
        $str="该申请已消失";
    }
    
    return $str;
}
/*
 * 通用分页样式 
 */
function pagination($obj){
    if(!$obj) return '';
    $params=request()->param();
    return '<div class="tp5-o2o" style="padding-left:20px;">
    '.$obj->appends($params)->render().'
    </div>';
}


function getSecityName($path){
    if(empty($path))return '';
    if(preg_match('/,/', $path)){
        $cityPath=explode(',',$path);
        $cityId=$cityPath[1];
    }else {
        $cityId=$path;   
    }
    $cityname=model('city')->get($cityId);
    return $cityname->name;
}
function getCategoryName($path){
    if(empty($path))return '';
    $cityname=model('category')->get($path);
    return $cityname->name;
}
function showSecity($kid,$path){
    if(empty($path))return '';
    if(preg_match('/,/', $path)){
        $cityPath=explode(',',$path);
        $cityId=$cityPath[1];
    }else {
        $cityId=$path;
    }
    $html="";
    foreach ($kid as $value){
        $value->id == $cityId? $select='selected="selected"':$select='';
        $html.='<option '.$select.' value="'.$value->id.'">'.$value->name.'</option>';
    }
    return $html;
}
function getcatekid($kid,$path){
    if(empty($path))return '';
    $catepath=explode(',',$path);
    $html="";
    foreach ($kid as $value){
        in_array($value->id, $catepath)?$check='checked="checked"':$check="";
        $html.='<input name="se_category_id[]" type="checkbox" '.$check.' id="checkbox-moban" value="'.$value->id.'">'.$value->name;
        $html.='<label for="checkbox-moban">&nbsp;</label>';
    }
    
    return $html;
}
function timetostr($time){
    return date('Y-m-d H:i:s',$time);
}
function countLocation($ids){
    if(empty($ids))return 1;
    if(preg_match('/,/', $ids)){
        $arr=explode(',', $ids);
        return count($arr);
    }
    return 1;
       
}
function setOrderSn(){
    list($t1,$t2)=explode(' ',microtime());
    $t3=explode('.', $t1*10000);
    return $t2.$t3[0].rand(10000,99999);
}








