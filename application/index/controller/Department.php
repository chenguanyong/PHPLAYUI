<?php
namespace app\index\controller;
use think\controller;
use app\index\mode\Login;
use think\View;
use think\Session;
use app\index\mode\Department_mode;
use think\Request;
class Department
{
    public function index(){
        $view = new View();
        return $view->fetch('index'); //$password;
        
    }
    //获取部门列表
    public function getDeparList(){
        
        //初始化请求
        $request = Request::instance();
         
        //获取请求参数
        $query_data = $request->param();
        
        //var_dump($query_data);
        $username = '';
        $UserID = CheckUser();
        if($UserID == false){
        
            return $view->fetch('Login/login');
        }
        
        $username = Session::get("UserName");
        
        $menudata = new Department_mode();
        $ParentID =$query_data['id'];
        $result = $menudata->getDeparParentID($ParentID);
        //var_dump($result);
        return json_encode($result,JSON_UNESCAPED_UNICODE);
        
        
    }
}

?>