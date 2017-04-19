<?php
namespace app\member\model;

use think\Model;
class AddressModel extends Model
{
    protected $name="user_address";
    //获取地址列表
    public function getAdressListByID($userid){
      return  $result = $this->where(["userId"=>$userid,"dataFlag"=>1])->select();
    }
}

?>