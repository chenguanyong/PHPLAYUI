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
use think\Session;
function CheckUser(){
    
    if(Session::has('UserName')){
    
        $username = Session::get('UserName');
    }else{
        
        return false;
    }
    $UserID = '';
    if(Session::has('UserID')){
    
        $UserID = Session::get('UserID');
    }else{
        return false;
    }
    if($UserID == 0){
    
        return false;
    }
    
    return $UserID;    
    
}