<?php
namespace app\index\mode;
use \think\Model;
use think\Db;
class User_mode extends Model
{
    protected $table = 'ce_user';
    public function initialize(){
    
        parent::initialize();
    }
    
    /**
     * @method 获取用户信息
     * @param 用户id*/
    
    public function getUser($UserID){
        
        $user = $this->get('UserID',$UserID);
        
        if($user == null){
            
            
            return null;
        }
        return $user;        
    }

    
    //添加用户
    public function addUser($userdata){
    
        if(!is_array($userdata)){
            return false;
        }
        $this->UserName = $userdata['UserName'];
        $this->PassWord = $userdata['PassWord'];
        $this->save();
        $int_userid = $this->ID;
        // $this->UserID = $int_userid;
        $this->save(['UserID'=>$int_userid],['ID'=>$int_userid]);
    }
    
    //查询用户
    protected function selectuser($username){
    
        $user = parent::get(['UserName'=>$username]);
        return $user;
    
    }
    
    //返回密码
    public function getuserpassword($username){
    
        $user = self::selectuser($username);
    
        return $user->getAttr('PassWord');
    }
    //返回所有信息
    public function getAllUserData($username){
    
        return self::selectuser($username);
    }
    //获取指定部门id的用户列表
    public function getUserByDeparID($DeparID, $start, $length){
        
        $sql = 'SELECT ';
        $sql = $sql . 'users.UserName UserName, ';
        $sql = $sql . 'users.phone phone, ';
        $sql = $sql . 'users.moblie moblie, ';
        $sql = $sql . 'depart.ShortName CompanyName, ';
        $sql = $sql . 'depart.OrganizationName DeparName, ';
        $sql = $sql . 'users.Names AS Name ';
        $sql = $sql . 'FROM ';
        $sql = $sql . 'ce_department AS depart, ';
        $sql = $sql . 'ce_user AS users ';
        $sql = $sql . 'WHERE ';
        $sql = $sql . 'depart.ID = users.DepartmentID ';
        $sql = $sql . 'AND depart.IsDelete = 0 ';
        $sql = $sql . 'AND users.IsDelete = 0 ';
        $sql = $sql . 'AND depart.ID = ' . $DeparID . '  ';
        $sql = $sql . 'limit ' . $start . ' , ' . $length ;
        
        $result = Db::query($sql);
        
        if($result == null){
            
            return null;
        }
        
        $sql = 'SELECT ';
        $sql = $sql . 'count(0) UserSize  ';
        $sql = $sql . 'FROM  ';
        $sql = $sql . 'ce_department AS depart, ';
        $sql = $sql . 'ce_user AS users ';
        $sql = $sql . 'WHERE ';
        $sql = $sql . 'depart.ID = users.DepartmentID ';
        $sql = $sql . 'AND depart.IsDelete = 0  ';
        $sql = $sql . 'AND users.IsDelete = 0  ';
        $sql = $sql . 'AND depart.ID = ' . $DeparID . ' ';
        
        $usersize = Db::query($sql);
        
        if($result == null){
        
            return null;
        }       
        
        return ['data'=> $result,'length' => $usersize[0]["UserSize"]];
    }
}

?>