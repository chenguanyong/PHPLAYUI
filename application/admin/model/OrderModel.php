<?php
namespace app\admin\model;

use think\Model;
class OrderModel extends Model
{
    protected $table = "xx_order";
    /**
     * [getOrderByWhere 通过条件获取订单]
     * @return [type] [description]
     * @author cgy
     */
    public function getOrderByWhere($map, $Nowpage, $limits)
    {
        return $this
            ->where($map)->page($Nowpage, $limits)->order('order_id desc')->select();
    }
    //
    /**
     * [getOrderByOrderID 通过订单ID获取订单]
     * @return [type] [description]
     * @author cgy
     */
    public function getOrderByOrderID($orderID){
        
        return $this->where(["order_id"=>$orderID])->find();
    }
    //
    /**
     * [editOrder 编辑订单]
     * @return [type] [description]
     * @author cgy
     */
    public function editOrder($data){
        $order_id = $data["order_id"];
        unset($data["order_id"]);
        $orderdata = array();
        foreach ($data as $key=>$value){
            if(strlen($value) != 0){
                $orderdata[$key]=$value;
            }
        }
        return $this->save($data,["order_id"=>$order_id]);
    }
}

?>