<?php
namespace app\index\controller;
use think\controller;
use think\View;
use think\Session;
use think\Request;
class Menu
{
    public function index()
    { 
        
        $view = new View();
        $username = '';
        $UserID = CheckUser();
        if($UserID == false){
            
            return $view->fetch('Login/login');            
        }
        $username = Session::get("UserName");
        $menudata = \app\index\mode\Menu::getMenuData(1);
        $buildMenuhtml = new \lib\html\BuildMenuHtml($menudata);
        
        $meunhtml = $buildMenuhtml->buildMenu();
        //$user = new Login();
        //$password = $user->getuserpassword('chen');
        //$passwords = $user->addUser(['UserName'=>'guan','PassWord'=>'1456']);
         return $view->fetch('menu',['menuhtml'=>$meunhtml]); //$password;
    }
    
    //通过父id获取菜单
    public function getMenu(){
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
        
        $menudata = new \app\index\mode\Menu();
        $ParentID =$query_data['id'];
        $result = $menudata->getMenuParentID($ParentID);
        //var_dump($result);
        return json_encode($result,JSON_UNESCAPED_UNICODE);
        
    }
    
    //获取菜单
    public function getMenuInfo(){
        $request = Request::instance();
        
        //获取请求参数
        $query_data = $request->param();
        $menudata = new \app\index\mode\Menu();
        $menuinfo = $menudata ->getData(['MenuID'=>$query_data['menuID']]);
        if($menuinfo == null){
            
            return json_encode(array('0'));
        }else{
            return json_encode($menuinfo,JSON_UNESCAPED_UNICODE);            
        }
    }
}


?>