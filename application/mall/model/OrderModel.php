<?php
namespace app\mall\model;

use think\Model;
use think\Db;
use think\Session;
class OrderModel extends Model
{
    protected $name = "order";
    protected $pk = "order_id";
    
    public function buildOrder($data){
        $address = Db::name("user_address")->where(["userId"=>$data['userID'],"isDefault"=>1])->find();
        if($address == null){
            return null;
        }
        $order = array();
        $addressint = explode("_",$address["areaIdPath"]);
        if(!is_array($addressint)){
            return null;
        }
        if(count($addressint) == 1){
             $order['city'] = $addressint[0];
        }else if(count($addressint) == 2){
            $order['city'] = $addressint[0];
            $order['district'] = $addressint[1];
        }else{
            $order['city'] = $addressint[0];
            $order['district'] = $addressint[1];
            $order['twon'] = $addressint[2];
        }
        $order['address'] = $address['userAddress'];
        $order['order_sn'] = time();//订单编号
        $order['user_id'] = Session::get("userId");//用户id
        $order['consignee']= $address["userName"];//收货人
        $order['mobile'] = $address["userPhone"];//手机号
        $order['goods_price'] = $data['allprice'];//总价
        $order['order_amount'] = $data['allprice'];//总价
        $action = array();
        $action['order_id']=0;
        $action["action_user"] = $data['userID'];//用户id
        $action["action_note"] = $data['bz'];//备注
        $action['log_time'] = time();
        
        $goodresult = Db::name("goods")->where("goodsId",$data['goodsId'])->find();//查询商品
        $goods = array();
        $goods['order_id'] = 0;//订单id
        $goods["goods_id"] = $data['goodsId'];//商品ID
        $goods["goods_name"] = $goodresult['goodsName'];
        $goods["goods_sn"] = $goodresult['goodsSn'];
        $goods["goods_num"] = $data["size"];//商品数量
        $goods["market_price"] = $goodresult['marketPrice'];//市场价
        $goods["goods_price"] = $goodresult['shopPrice'];//本店价
        $goods["cost_price"] = 100;//成本价
        $goods["spec_key"] = "dvfd";//商品规格
        $goods["spec_key_name"] = "dvfd";//商品规格
        $goods["bar_code"] = "dvfd";//商品规格
        $this->startTrans();
     try{
         $result = $this->save($order);//保存订单

         $order_id = $this->order_id;
         $order_sn = buildOrserSn($order_id);
         $result = $this->save(["order_sn"=>$order_sn],["order_id"=>$order_id]);
          $actions = new OrderActionModel();
          $action['order_id'] = $order_id;
          $actions->save($action);//保存订单动作
          $goodss= new OrderGoodsModel();
          $goods['order_id'] = $order_id;
          $goodss->save($goods);//保存货物与订单的关系
          $this->commit();
         }catch(\Exception $e){
           // echo "sdf";
             $this->rollback();
             return null;
         }
        return $order_id;
    }
    
    public function getOrdersByWhere($map, $Nowpage, $limits)
    {
        
        return $this
        ->where($map)->page($Nowpage, $limits)->order('xx_order.order_id desc')->select();
    }
    
    //删除订单
    public function deleOrder($data){
    
        if(count($data) == 1){
            $result = $this->where('order_id',$data[0])->delete();
            return $result;
        }else{
            $result = self::destroy($data);
            return $result;
        }
    }
    //从购物车中生成订单
    public function buildOrderFromCard($data,$datashop){
        
            $address = Db::name("user_address")->where("userId",$data['userID'])->find();
            if($address == null){
                return null;
            }
            $order = array();
            $addressint = explode("_",$address["areaIdPath"]);
            if(!is_array($addressint)){
                return null;
            }
            if(!is_array($addressint)){
            return null;
        }
        if(count($addressint) == 1){
             $order['city'] = $addressint[0];
        }else if(count($addressint) == 2){
            $order['city'] = $addressint[0];
            $order['district'] = $addressint[1];
        }else{
            $order['city'] = $addressint[0];
            $order['district'] = $addressint[1];
            $order['twon'] = $addressint[2];
        }
                $order['address'] = $address['userAddress'];
                $order['order_sn'] = time();//订单编号
                $order['user_id'] = Session::get("userId");//用户id
                $order['consignee']= $address["userName"];//收货人
                $order['mobile'] = $address["userPhone"];//手机号
                $order['goods_price'] = $data['allprice'];//总价
                $order['order_amount'] = $data['allprice'];//总价        
                $action = array();
                $action['order_id']=0;
                $action["action_user"] = $data['userID'];//用户id
                $action["action_note"] = $data['bz'];//备注
                $action['log_time'] = time();
                $goods = array(); 
                $this->startTrans();
                try{
                    $this->save($order);//保存订单
                    $order_id = $this->order_id;
                    $order_sn = buildOrserSn($order_id);
                    $result = $this->save(["order_sn"=>$order_sn],["order_id"=>$order_id]);
                    $actions = new OrderActionModel();
                    $action['order_id'] = $order_id;
                    $actions->save($action);//保存订单动作
                    $goodss= new OrderGoodsModel();
                    $shopid = explode(",",$datashop);
                    if(!is_array($shopid)){
                        return null;
                    }  

                    foreach ($shopid as $key =>$value){
                        if($value == ""){break;}
                        $goodresult = Db::name("cart")->where("id",$value)->find();//查询商品
                        $goods[$key]['order_id'] = $order_id;//订单id
                        $goods[$key]["goods_id"] = $goodresult['goods_id'];
                        $goods[$key]["goods_name"] = $goodresult['goods_name'];
                        $goods[$key]["goods_sn"] = $goodresult['goods_sn'];
                        $goods[$key]["goods_num"] = $goodresult["goods_num"];//商品数量
                        $goods[$key]["market_price"] = $goodresult['market_price'];//市场价
                        $goods[$key]["goods_price"] = $goodresult['goods_price'];//本店价
                        $goods[$key]["cost_price"] = 100;//成本价
                        $goods[$key]["spec_key"] = "dvfd";//商品规格
                        $goods[$key]["spec_key_name"] = "dvfd";//商品规格
                        $goods[$key]["bar_code"] = "dvfd";//商品规格
                        Db::name("cart")->where("id",$value)->delete();
                    }
                  $result = $goodss->saveAll($goods);//保存货物与订单的关系
                  $this->commit();
                }catch(\Exception $e){
                    $this->rollback();
                   return null;
                }
                return $order_id;
        
    }
}

?>