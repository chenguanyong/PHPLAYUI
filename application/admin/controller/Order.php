<?php
namespace app\admin\controller;

use app\admin\controller\Base;
use think\Db;
use app\admin\model\OrderModel;
use app\mall\model\OrderGoodsModel;
class Order extends Base
{
    /**
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
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = 10;// 获取总条数
        $count = Db::name('order')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $user = new OrderModel();
        $lists = $user->getOrderByWhere($map, $Nowpage, $limits);

        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('count',$count);
        $this->assign('val', $key);
        $this->assign("orderStatus",$orderStatus);
        $this->assign("shippingStatus",$shippingStatus);
        $this->assign("pay_status",$pay_status);
        $this->assign("type",$type);
        if(input('get.page'))
        {
            return json($lists);
        }
        return $this->fetch("index");        
    }
    /**
     * [editOrder 编辑订单]
     * @return [type] [description]
     * @author cgy
     */
    public function editOrder(){
        $orderID = input("get.id");
        $order = new OrderModel();//订单详情
        $orderInfo = $order->getOrderByOrderID($orderID);
        if($orderInfo == null){
            return $this->index();
        }
        $map=array("order_id"=>$orderID);
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = 10;// 获取总条数
        $count = Db::name('order_goods')->where($map)->count();//计算总页面
       
        $allpage = intval(ceil($count / $limits));
        $orderGood = new OrderGoodsModel();
        $lists = $orderGood->getOrderGoodsByWhere($map, $Nowpage, $limits);
        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('count',$count);
        $this->assign('val', $orderID);
        $this->assign("orderInfo",$orderInfo);
        if(input('get.page'))
        {
            return json($lists);
        }
        return $this->fetch("editOrder");
    }
    /**
     * [orderView 查看订单]
     * @return [type] [description]
     * @author cgy
     */
    public function orderView(){

        $orderID = input("get.id");
        $order = new OrderModel();//订单详情
        $orderInfo = $order->getOrderByOrderID($orderID);
        if($orderInfo == null){
            return $this->index();
        }
        if($orderInfo["order_status"]==1){ 
            $orderInfo["order_status"] ="已完成";
        }else{ 
            $orderInfo["order_status"] ="未完成";
        }
        if($orderInfo["shipping_status"]==1){ 
           $orderInfo["shipping_status"] ="已发货";
         }else{
           $orderInfo["shipping_status"]="未发货";
        }
        if($orderInfo["pay_status"]==1){
            $orderInfo["pay_status"]="已付款";
        }else if($orderInfo["pay_status"]==2){
            $orderInfo["pay_status"]="未付款";
        }else if($orderInfo["pay_status"]==3){ 
            $orderInfo["pay_status"]="正在退款...";
        }else{
            $orderInfo["pay_status"]="已退款";
        }
        if($orderInfo["order_prom_type"]==1){
           $orderInfo["order_prom_type"]="抢购";
        }else if($orderInfo["order_prom_type"]==2){ 
           $orderInfo["order_prom_type"]="团购";
        }else if($orderInfo["order_prom_type"]==3){ 
           $orderInfo["order_prom_type"]="优惠";
        }else if($orderInfo["order_prom_type"]==4){
           $orderInfo["order_prom_type"]="预售";
        }else if($orderInfo["order_prom_type"]==5){
           $orderInfo["order_prom_type"]="虚拟";
        }else{ 
           $orderInfo["order_prom_type"]="默认";
        }
        $map=array("order_id"=>$orderID);
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = 10;// 获取总条数
        $count = Db::name('order_goods')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $orderGood = new OrderGoodsModel();
        $lists = $orderGood->getOrderGoodsByWhere($map, $Nowpage, $limits);
        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('count',$count);
        $this->assign('val', $orderID);
        $this->assign("orderInfo",$orderInfo);
        if(input('get.page'))
        {
            return json($lists);
        }
       return $this->fetch("view");
    }
    /**
     * [orderDele 删除订单]
     * @return [type] [description]
     * @author cgy
     */
    public function orderDele(){
        $order_id = input("post.id");
        $order = new OrderModel();
        $result = $order->save(['order_status' =>1],["order_id"=>$order_id]);
        if($result == 0){
            return json(array("code"=>0,"msg"=>"删除失败"));
        }else{
            return json(array("code"=>1,"msg"=>"删除成功"));
        }
    }
    /**
     * [ajaxEditOrder 编辑订单]
     * @return [type] [description]
     * @author cgy
     */
    public function ajaxEditOrder(){
        $order = input("post.");
        $orderModel = new OrderModel();
        $result = $orderModel->editOrder($order);
        if($result == 0){
            return json(array("code"=>0,"msg"=>"修改失败"));
        }else{
            return json(array("code"=>1,"msg"=>"修改成功"));
        }
        
    }
    /**
     * [ajaxDeleGoods 删除订单货物]
     * @return [type] [description]
     * @author cgy
     */
    public function ajaxDeleGoods(){
        $orders = input("post.id");
        $goods = new OrderGoodsModel();
        $result = $goods->where(["order_id"=>$orders])->delete();
        if($result == null){
            return json(array("code"=>0,"msg"=>"修改失败"));
        }else{
            return json(array("code"=>1,"msg"=>"修改成功"));
        }
    }
    /**
     * [ajaxSendGoods 是否发货]
     * @return [type] [description]
     * @author cgy
     */
    public function ajaxSendGoods(){
        $orders = input("post.id");
        $goods = new OrderModel();
        $result = $goods->save(["shipping_status"=>1],["order_id"=>$orders]);
        if($result == null){
            return json(array("code"=>0,"msg"=>"修改失败"));
        }else{
            return json(array("code"=>1,"msg"=>"修改成功"));
        }        
    }
    /**
     * [ajaxRefund 批准退货]
     * @return [type] [description]
     * @author cgy
     */
    public function ajaxRefund(){
        $orders = input("post.id");
        $goods = new OrderModel();
        $result = $goods->save(["pay_status"=>3],["order_id"=>$orders]);
        if($result == null){
            return json(array("code"=>0,"msg"=>"操作失败"));
        }else{
            return json(array("code"=>1,"msg"=>"操作成功"));
        }        
    }
}

?>