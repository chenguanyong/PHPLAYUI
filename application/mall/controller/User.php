<?php

namespace app\mall\controller;
use think\Controller;
use app\mall\model\UserModel;
use app\member\controller\Base;
// use think\Db;

class User extends Base
{

    /**
     * [index 商城会员列表]
     * @return [type] [description]
     * @author 
     */
    public function index(){
        $key = input('key');
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = 10;// 获取总条数
        $user = new UserModel();
        $count = $user->getUserNum();//用户总数
        $allpage = intval(ceil($count / $limits));//分页        
        $lists = $user->getUsers($Nowpage, $limits);
        $this->assign('allpage', $allpage); //总页数
        $this->assign('count',$count);
        if(input('get.page'))
        {
            return json($lists);   
        }
        return $this->fetch();
    }
    
    /**
     * [user_state 用户状态]
     * @return [type] [description]
     * @author
     */
    public function user_state()
    {
        $id = input('param.id');
        $user = new UserModel;
        $status = $user->getUserStatus($id);//判断当前状态情况  
        if($status == 1)
        {
            $flag = $user -> setUserStatus('0', $id);
           return json(['code' => 1, 'data' => $flag['data'], 'msg' => '已禁止']);
        }
        else
        {
            $flag = $user -> setUserStatus('1', $id);
            return json(['code' => 0, 'data' => $flag['data'], 'msg' => '已开启']);
        }
    
    }
    
    /**
     * [userAdd 添加会员]
     * @return [type] [description]
     * @author
     */
    public function userAdd()
    {
        return $this->fetch();
    }
    
    /**
     * [ajax_useradd 添加会员]
     * @return [type] [description]
     * @author
     */
    public function ajax_useradd()
    {
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
    
    /**
     * [userEdit 编辑会员信息]
     * @return [type] [description]
     * @author
     */
    public function userEdit()
    {
        $user = new UserModel();
        $id = input('param.id');
        $this->assign('user', $user->getOneUser($id));
        return $this->fetch();
    }
    
    /**
     * [ajax_userEdit 编辑会员信息]
     * @return [type] [description]
     * @author
     */
    public function ajax_userEdit()
    {
        if(request()->isAjax()){
            $param = input('post.');
            if(empty($param['loginName'])){
                unset($param['loginName']);
            }else{
                $param['loginPwd'] = md5(md5($param['loginPwd']) . config('auth_key'));
            }
            $time = date("Y-m-d H:i:s", time());
            $param['createTime'] = $time;
            $user = new UserModel();
            $flag = $user->editUser($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
    }
    
    /**
     * [userDel 删除会员]
     * @return [type] [description]
     * @author
     */
    public function userDel()
    {
        $id = input('param.id');
        $user = new UserModel();
        $flag = $user -> delUser($id);        
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
}