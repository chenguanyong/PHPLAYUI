<?php
namespace app\member\controller;
use think\Controller;
use app\member\model\UserModel;
use app\member\controller\Base;
use think\Session;

class Index extends Base
{
	/**
	 * [index 显示首页]
	 * @return [type] [description]
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
    public function userLogin(){
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
     * [link 推广链接]
     * @return [type] [description]
     * @author  an
     */
    public function link(){
        $userId = Session::get('userId');
        $loginName = Session::get('loginName');
        $this->assign('userId',$userId);
        $this->assign('loginName',$loginName);
        $this->assign("link",'http://'.$_SERVER['SERVER_NAME'].'/member/login/register.html?uid='.$userId);
        return $this->fetch();
    }
}

?>