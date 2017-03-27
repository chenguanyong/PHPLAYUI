<?php
namespace app\index\controller;
use think\controller;
use app\index\mode\User_mode;
use think\View;
use think\Session;
use think\Request;


class User
{
    public function index(){
        $view = new View();
        $UserID = CheckUser();
        if($UserID == false){
        
            return $view->fetch('Login/login');
        }
        
        return $view->fetch('index');
    }
    //通过部门id获取用户
    public function getUserByDepartID(){
        
        $UserID = CheckUser();
        if($UserID == false){
        
            return $view->fetch('Login/login');
        }
        
        //初始化请求
        $request = Request::instance();
       // var_dump($request);
       // exit;
        //获取请求参数
        $query_data = $request->param();
        
        $user = new User_mode(); 
        $user_array = $user->getUserByDeparID(1,$query_data['iDisplayStart'],$query_data['iDisplayLength']);
        if($user_array == null){
            
            return json_encode(['draw'=>$query_data['sEcho'],'recordsTotal'=>0,'recordsFiltered'=>0,'data'=>0],JSON_UNESCAPED_UNICODE);
        }
        return json_encode(['draw'=>$query_data['sEcho'],'recordsTotal'=>$user_array['length'],'recordsFiltered'=>$user_array['length'],'data'=>$user_array['data']],JSON_UNESCAPED_UNICODE);
    }
    
    public function editUser(){
        
        //
        $UserID = CheckUser();
        if($UserID == false){
        
            return $view->fetch('Login/login');
        }
        
        //初始化请求
        $request = Request::instance();
        // var_dump($request);
        // exit;
        //获取请求参数
        $query_data = $request->param();
        
        return json_encode($query_data,JSON_UNESCAPED_UNICODE);
        
        
    }
}

?>