<?php
namespace app\member\controller;
use think\Controller;
use app\member\model\UserModel;
use app\member\model\AddressModel;
use app\member\controller\Base;
use think\Session;
class User extends Base
{
    public function index(){
        $user = new UserModel();
        $id = 1;
        $result = $user->getUserById($id);
       // var_dump($result);
       // exit;
        $userdata = array();
        if($result == null){
            $userdata = array("loginName"=>"","userSex"=>"","userName"=>"","trueName"=>"","brithday"=>"");
            $userdata["userQQ"]="";
            $userdata["userPhone"]="";
            $userdata["userEmail"]="";
            $userdata["userStatus"]="";
        }else{
            $sex = 0;
            if($result["userSex"] == 0){
                $sex = "保密";
            }else if($result["userSex"] == 1){
                $sex = "男";
            }else{
                $sex ="女";
            }
           
            $userdata = array("loginName"=>$result["loginName"],"userSex"=>$sex,"userName"=>$result["userName"],"trueName"=>$result["trueName"],"brithday"=>$result["brithday"]);
            $userdata["userQQ"]=$result["userQQ"];
            $userdata["userPhone"]=$result["userPhone"];
            $userdata["userEmail"]=$result["userEmail"];
            $userdata["userStatus"]=$result["userStatus"];
        }
        $this->assign("userdata",$userdata);
        $address = new AddressModel();
        $result = $address->getAdressListByID(21);
        $this->assign("addresslist",$result);
        $this->assign("IDCarList",array());
        $this->assign("userid",$id);
        return $this->fetch("userprofile");
    }
    public function editprofile(){
       $id = input("get.id");
       $this->assign("userid",$id);
        return $this->fetch("editUser");
    }
    public function editPassword(){
        $id = input("get.id");
        $this->assign("userid",$id);
        return $this->fetch("editPassword");
    }
    //
    public function ajaxEditProfile(){
       $input = input("post.");
       $user = new UserModel();
       $id = $input["id"];
       unset($input['id']);
       $result = $user->editUser($input, $id);
            if($result == null){
            
          return json(array('code'=>0,"msg"=>"保存出错"));  
        }else{
          return json(array('code'=>1,"data"=>"","msg"=>"保存成功"));
        }
    }
    public function ajaxEditPassword(){
        $password = input("post.");
        $user = new UserModel();
        $userID = Session::get("userId");
       // $id = $password['id'];
       
        $result = $user->get(["userId"=>$userID]);
        if($result == null){
            return json(array('code'=>0,"msg"=>"无该用户"));  
        }
        if($result["loginPwd"] == md5(md5($password['oldpassword']) . config('auth_key'))){
            
            if($password['password'] == $password["confirm_password"])
            {
                $result = $user->save(["loginPwd"=>md5(md5($password['password']) . config('auth_key'))],["userId"=>$userID]);
                if($result){return json(array('code'=>1,"msg"=>"修改成功"));}else{return json(array('code'=>0,"msg"=>"修改错误"));}
                
            }else{
                return json(array('code'=>0,"msg"=>"两次输入的密码不一致"));
            }
        }else{
            return json(array('code'=>0,"msg"=>"输入的旧密码错误"));
        }
    }
}

?>
