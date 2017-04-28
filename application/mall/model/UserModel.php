<?php
namespace app\mall\model;
use think\Model;

class UserModel extends Model
{
    protected $name = 'users';
    
    /**
     * [getUsers 查询用户信息]
     * @return 
     * @author  
     */
    public function getUsers($Nowpage, $limits)
    {
        return $this->page($Nowpage, $limits)->order('userId asc')->select(); 
    }
    
    /**
     * [getUserNum 得到用户总数量]
     * @return [count]
     * @author
     */
    public function getUserNum()
    {
        return $this->count();        
    }
    
    /**
     * [getUserStatus 得到用户状态]
     * @return [Status]
     * @author
     */
    public function getUserStatus($id)
    {
        return $this->where(array('userId'=>$id))->value('userStatus');
    }
    
    /**
     * [getOneUser 根据id获取会员信息]
     * @return [user]
     * @author
     */
    public function getOneUser($id)
    {
        return $this->where('userId', $id)->find();
    }
    

        /**
     * [getUser 登录页面会员信息检测]
     * @return [description]
     * @author an
     */
    public function getUser($loginName){
    
        return $this->where('loginName', $loginName)->find();
    }

    /**
     * [setUserStatus 更改用户状态]
     * @return [Status]
     * @author
     */
    public function setUserStatus($status, $id)
    {
        return $this->save(['userStatus'=>$status],['userId'=>$id]);
    }
    
    /**
     * [insertUser 插入用户数据]
     * @return 
     * @author
     */
    public function insertUser($param)
    {
        try{            
            $result = $this->save($param);
            if(false === $result){
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '添加会员成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
    
    /**
     * [editUser 修改用户信息]
     * @return 
     * @author
     */
    public function editUser($param)
    {
        try{
            $result =  $this->save($param , ['userId' => $param['userId']]);
            if(false === $result){
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{    
                return ['code' => 1, 'data' => '', 'msg' => '编辑用户成功'];
            }
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }        
    }
    
    /**
     * [editUser 修改用户信息]
     * @return 
     * @author
     */
    public function delUser($id)
    {
        return $this->where('userId',$id)->delete();
    }
    
    /**
     * [checkUser 检查用户是否存在]
     * @return
     * @author
     */
    public function checkUser($userName)
    {
        try{

            $result = $this->where('loginName',$userName)->find();
            if($result){
                return ['code' => 2, 'data' => '', 'msg' => '该用户已存在'];
            }else{
                return true;
            }
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
    
}
