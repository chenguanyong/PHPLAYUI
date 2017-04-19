<?php
namespace app\member\model;

use think\Model;
class UserModel extends Model
{
    protected $name = "users";
    
    public function getUserById($id){
        return $this->where('userId',$id)->find();
    }
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