<?php
namespace app\mall\controller;

use app\member\controller\Base;
use app\mall\model\OrderModel;
use think\Db;
use app\mall\model\OrderGoodsModel;
use think\Session;
use app\mall\model\AddressModel;
class Order extends Base
{    /**
     * [index 首页]
     * @return [type] [description]
     * @author cgy
     */
    public function index(){
        $key = input('get.key');
        $orderStatus = input("get.Ostatus");
        $shippingStatus = input("get.Sstatus");
        $pay_status = input("get.Pstatus");
        $type= input("get.type");
        $map=array();
        if($key == null){
            //$key = 0;
        }
        if($orderStatus == null){
            $orderStatus = 0;
            $map["order_status"]=0;
        }else{
                $map["order_status"]=$orderStatus;
            }
        if($shippingStatus == null){
            $shippingStatus =0;
            $map["shipping_status"]=0;
        }else{
            $map["shipping_status"]=$shippingStatus;
        }
        if($pay_status == null){
            $shippingStatus =0;
            $map["pay_status"]=0;
        }else{
            $map["pay_status"]=$pay_status;
        }
        if($type == null||$type == 0){
            $map = array();
            $type = 0;
        }
        $map["user_id"]=Session::get("userId");
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = 10;// 获取总条数
        $count = Db::name('order')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $user = new OrderModel();
        $lists = $user->getOrdersByWhere($map, $Nowpage, $limits);
        $ordergoods = new OrderGoodsModel();
        foreach ($lists as &$value){
           $value["data"] = $ordergoods->getGoodsByOrderID($value["order_id"]);
        }
        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('count',$count);
        $this->assign('val', $key);
        $this->assign("list",$lists);
        $this->assign("orderStatus",$orderStatus);
        $this->assign("shippingStatus",$shippingStatus);
        return $this->fetch("index");
    }
    /**
     * [ajaxBuildOrder 创建订单]
     * @return [type] [description]
     * @authorcgy
     */
    public function ajaxBuildOrder(){
        $orderdata = input("post.");
        $order = new OrderModel();
        $data["userID"] = Session::get("userId");
        $data['allprice'] = $orderdata["price"]=100;//总价
        $data['bz'] = "";//备注
        $data['goodsId'] = $orderdata["id"];//商品ID
        $data["size"] = $orderdata['goodsSize'];//商品数量
        $result = $order->buildOrder($data);
        if($result == null){
            return json(array("code"=>"0","msg"=>"失败","data"=>""));
        }else{
            return json(array("code"=>"1","msg"=>"成功","data"=>$result));
        }  
    }
    /**
     * [ajaxBuildOrderByCar 从购物车中创建订单]
     * @return [type] [description]
     * @authorcgy
     */
    public function ajaxBuildOrderByCar(){
        $orderdata = input("post.");
        $data["userID"] = Session::get("userId");
        $data['bz'] = "";//备注
        $datashop = $orderdata["json"];
        $where = substr($datashop, 0,strlen($datashop)-1);
        $result = Db::query("SELECT sum(goods_price*goods_num) zong from xx_cart where id in(" . $where . ")");
        if($result == null){
            return json(array("code"=>"0","msg"=>"计算失败","data"=>""));
        }
        $data['allprice'] = $result[0]["zong"];
        $order = new OrderModel();
        $result = $order->buildOrderFromCard($data,$datashop);
        if($result == null){
            return json(array("code"=>"0","msg"=>"失败","data"=>""));
        }else{
            return json(array("code"=>"1","msg"=>"成功","data"=>$result));
        }
    }
    /**
     * [orderinfo 订单详情]
     * @return [type] [description]
     * @authorcgy
     */
    public function orderinfo(){
        $order_id = input('get.order_id');
       // echo $order_id;
        $order = new OrderModel();
        $orderInfo = $order->where(["order_id"=>$order_id])->find();
        $ordergoods = new OrderGoodsModel();
        $goodsInfo = $ordergoods->where(["order_id"=>$order_id])->select();
        $province = Db::name("areas")->where("areaId",$orderInfo["province"])->find();
        $city = Db::name("areas")->where("areaId",$orderInfo["city"])->find();
        $district = Db::name("areas")->where("areaId",$orderInfo["district"])->find();
        $this->assign("province",$province["areaName"]);
        $this->assign("city",$city["areaName"]);
        $this->assign("district",$district["areaName"]);
        $this->assign("order",$orderInfo);
        $this->assign("goods",$goodsInfo);
        $adress = Db::name("user_address")->where(["userId"=>Session::get("userId")])->select();
        $this->assign("address",$adress);
        return $this->fetch("invoice");
    }
    /**
     * [ajaxDeleOrder 删除订单]
     * @return [type] [description]
     * @author cgy
     */
    public function ajaxDeleOrder(){
        $order_id = input('post.id');        
        $order = new OrderModel();
        $result = $order->where("order_id",$order_id)->delete();
        if($result == null){
            return json(array("code"=>0,"msg"=>"删除失败"));
        }else{
            return json(array("code"=>1,"msg"=>"删除成功"));
        }
    }
    /**
     * [ajaxDeleOrder 删除订单]
     * @return [type] [description]
     * @author cgy
     */
    public function editAddress(){
        $addresID = input("post.id");
        $orderID = input("post.order");
        $restult = Db::name("user_address")->where("addressId",$addresID)->find();
        $order = new OrderModel();
        $temp = explode("_", $restult["areaIdPath"]);
        $data = array("consignee"=>$restult["userName"],"mobile"=>$restult["userPhone"],"country"=>0,"province"=>$temp[0], "city"=>$temp[1] , "district"=>$temp[2],"address"=>$restult["userAddress"]);
        $orderresult = $order->save($data,["order_id"=>$orderID]);
        if($orderresult == null){
            return json(array("code"=>0,"msg"=>"失败"));
        }else{
            return json(array("code"=>1,"msg"=>"成功","data"=>$orderID));
        }
    }
}

?>