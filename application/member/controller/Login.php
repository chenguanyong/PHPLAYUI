<?php

namespace app\member\controller;
use think\Controller;
use app\mall\model\UserModel;
use think\Session;

class Login extends Controller
{
    /**
     * [index 会员登录页面]
     * @return [description]
     * @author
     */
    public function index(){
        return $this->fetch();
    }

        /**
     * [userLogin 用户登录验证]
     * @return [type] [description]
     * @author
     */
    public function login(){
        if(request()->isAjax()){        
            $param = input('post.');
            $param['loginPwd'] = md5(md5($param['loginPwd']) . config('auth_key'));
            $user = new UserModel();
            $result = $user -> getUser($param['loginName']);
            if($result){
                $userId = $result -> userId;
                $loginPwd = $result -> loginPwd;
                if($loginPwd == $param['loginPwd'] ){
                    Session::set('userId', $userId);
                    Session::set('loginName', $param['loginName']);
                    return  json(['code' => 1, 'data' => '', 'msg' => '登录成功']);
                } else { 
                    return  json(['code' => 0, 'data' => '', 'msg' => '用户名或密码错误']);
                }
            } else {
                return  json(['code' => 0, 'data' => '', 'msg' => '用户名或密码错误']);
            }
        }
    }
    
    /**
     * [Register 会员注册页面]
     * @return  [description]
     * @author
     */
    public function register(){
        $uid = input('get.uid', '');
        if(!empty($uid)){
            setcookie('tuijianren__cookie__',$uid,time()+3600*24*7,null);
        }
        return $this->fetch();       
    }
    
    /**
     * [Register 会员注册]
     * @return [type] [description]
     * @author
     */
    public function userRegister(){
        if(request()->isAjax()){
            $param = input('post.');
            $param['loginPwd'] = md5(md5($param['loginPwd']) . config('auth_key'));
            $time = date("Y-m-d H:i:s", time());
            $param['createTime'] = $time;
            $user = new UserModel();
            $flag = $user -> checkUser($param['loginName']);
            if($flag === true){
                $flag = $user -> insertUser($param);
                return  json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);       
            }else{
                return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
            }
        }   
    }
    
    
}