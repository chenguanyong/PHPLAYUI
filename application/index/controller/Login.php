<?php
namespace app\index\controller;

use think\Request;
use think\Session;
use think\Controller;
use think\View;
use think\Validate;
use app\index\mode\User_mode;
class Login extends Controller{
    
    //验证登陆规则
    protected $rule_login = [
        'UserName' => '[A-Z,a-z,0-9,_]{0,10}',
        'PassWord' => '[A-Z,a-z,0-9,_,@,\.]{0,10}',
        
    ];
    //验证修改密码规则
    protected $rule_fix_password = [
        'UserName' => 'require|max:25',
        'email' => 'email',
    
    ];
    //验证注册规则
    protected $rule_register = [
        'UserName' => 'require|max:25',
        'email' => 'email',
    
    ];
   public  function index() {
       
       //初始化请求
       $request = Request::instance();
       
       //获取请求参数
       $query_data = $request->param();
       //var_dump($query_data);
       $data_array = explode('-', $query_data['data']);
       
       if(count($data_array) < 1){ return json_encode(array("res" =>'0')); }
       
       $validate = new Validate($this->rule_login);
       
       $flog = $validate->check([array("UserName"=>$data_array[0], "PassWord"=>$data_array[1])]);
       
       if(!$flog){
          // echo $validate->getError();
           return json_encode(array("res" =>'0'));           
       }
       //初始化模型
       $user = new User_mode();
        //echo $data_array[0];
        //exit;
       $user_object = $user->getAllUserData($data_array[0]);
      //var_dump($user_object);
       //
       //ses
       $username = $user_object->getAttr('UserName');
       $password = $user_object->getAttr("PassWord");
       $UserID = $user_object->getAttr("UserID");
       
       $postpassword = md5($data_array[1]); 
       if($password != $postpassword){
           
           return json_encode(array("res" =>'0'));
       }
       
       Session::set("UserName", $username);
       Session::set("UserID", $UserID);
      // $view = new View();
      // return $view->fetch('index/index'); //$password;;
       return json_encode(array("res" =>'1'));
    }
    
    //退出
    public function loginOut(){
        
        Session::clear();
        //echo "dsfsd";
        //echo ROOT_PATH;
        return $this->fetch('login');
    }
}