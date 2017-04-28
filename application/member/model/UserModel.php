<?php
namespace app\member\model;
use think\Model;

class UserModel extends Model
{
    protected $name = "users";
    
    /**
     * [getUserById 得到会员信息]
     * @return [description]
     * @author
     */
    public function getUserById($id){
        
        return $this->where('userId',$id)->find();
    }
    
    /**
     * [editUser 编辑会员信息]
     * @return [description]
     * @author
     */
    public function editUser($data,$id){
        $user = $this->get(['userId'=>$id]);
        if($user == null){
            return false;
        }
        $result = $this->save($data,["userId"=>$id]);
        return $result;
    }
}

?>