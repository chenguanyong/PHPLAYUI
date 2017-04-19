<?php
namespace app\mall\controller;

use app\admin\controller\Base;
use app\mall\model\OrderModel;
use think\Db;
use app\mall\model\OrderGoodsModel;
class Order extends Base
{
    public function index(){
        $key = input('key');
        $map = [];
        if($key&&$key!=="")
        {
            $map['username'] = ['like',"%" . $key . "%"];
        }
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = 10;// 获取总条数
        $count = Db::name('order')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $user = new OrderModel();
        $lists = $user->getMembersByWhere($map, $Nowpage, $limits);
       // var_dump($lists);
        //exit;
        foreach($lists as $k=>$v)
        {
            $lists[$k]['last_login_time']=date('Y-m-d H:i:s',$v['last_login_time']);
        }
        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('count',$count);
        $this->assign('val', $key);
        if(input('get.page'))
        {
            return json($lists);
        }
        return $this->fetch();
    }
    public function ajaxBuildOrder(){
        $orderdata = input("post.");
        $order = new OrderModel();
        $data["userID"] = 2;
        $data['allprice'] = $orderdata["price"];//总价
        $data['bz'] = "";//备注
        $data['goodsId'] = 1;//$orderdata["id"];//商品ID
        $data["size"] = $orderdata['goodsSize'];//商品数量
        $result = $order->buildOrder($data);
        if($result == null){
            return json(array("code"=>"0","msg"=>"失败","data"=>""));
        }else{
            return json(array("code"=>"1","msg"=>"成功","data"=>$result));
        }  
    }
    public function ajaxBuildOrderByCar(){
        $orderdata = input("post.");
        $data["userID"] = 2;
        $data['allprice'] = $orderdata["price"];//总价
        $data['bz'] = "";//备注
        $datashop = $orderdata["json"];
        $order = new OrderModel();
        $result = $order->buildOrderFromCard($data,$datashop);
        if($result == null){
            return json(array("code"=>"0","msg"=>"失败","data"=>""));
        }else{
            return json(array("code"=>"1","msg"=>"成功","data"=>$result));
        }
    }
    //确认订单
    public function orderinfo(){
        $order_id = input('get.order_id');
       // echo $order_id;
        $order = new OrderModel();
        $orderInfo = $order->where(["order_id"=>$order_id])->select();
        $ordergoods = new OrderGoodsModel();
        $goodsInfo = $ordergoods->where(["order_id"=>$order_id])->select();
      //  var_dump($goodsInfo);
        $this->assign("order",$orderInfo);
        $this->assign("goods",$goodsInfo);
        return $this->fetch("invoice");
    }
}

?>