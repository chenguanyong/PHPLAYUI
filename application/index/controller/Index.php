<?php
namespace app\index\controller;
use think\Controller;
use app\index\mode\Login;
use think\View;
use think\Session;
use app\index\mode\Menu;

class Index extends Controller
{
    public function index()
    {  

        //$view = new View();
        $username = '';
        $UserID = CheckUser();
        if($UserID == false){
            
            return $this->fetch('Login/login');            
        }
        $username = Session::get("UserName");
        $menudata = Menu::getMenuData(1);
        $buildMenuhtml = new \lib\html\BuildMenuHtml($menudata);
        
        $meunhtml = $buildMenuhtml->buildMenu();        

        //$user = new Login();
        //$password = $user->getuserpassword('chen');
        //$passwords = $user->addUser(['UserName'=>'guan','PassWord'=>'1456']);
        return $this->fetch('index',['menuhtml'=>$meunhtml]); //$password;
    }
    //显示主页
    public function content(){
        
        $view = new View();
        
        
        return $view->fetch('content');
    }
}
