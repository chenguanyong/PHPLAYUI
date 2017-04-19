<?php
namespace app\mall\model;

use think\Model;
use think\Db;
class ShopCarModel extends Model
{
    protected $name = "cart";
    //添加到购物车
    public function addCart($data){
        $goodresult = Db::name("goods")->where("goodsId",$data['goods_id'])->find();//查询商品
        $goods = array();
        $goods['user_id'] = $data["user_id"];//订单id
        $goods["goods_id"] = $data['goods_id'];
        $goods["goods_name"] = $goodresult['goodsName'];
        $goods["goods_sn"] = $goodresult['goodsSn'];
        $goods["goods_num"] = $data["size"];//商品数量
        $goods["market_price"] = $goodresult['marketPrice'];//市场价
        $goods["goods_price"] = $goodresult['shopPrice'];//本店价
        $goods["spec_key"] = "dvfd";//商品规格
        $goods["spec_key_name"] = "dvfd";//商品规格
        $goods["bar_code"] = "dvfd";//商品规格selected
        $goods["selected"] =$data["selected"];//购物车选中状态
        $goods["add_time"] =time();//购物车选中状态
        $goods["prom_type"] =$data["prom_type"];//购物车订单类型
        $goods["prom_id"] =$data["prom_id"];//活动id
        $goods["session_id"] = $data['session_id'];
        $goods["member_goods_price"] = $data['member_goods_price'];
        
        return $this->save($goods);
    }
    //删除购物车
    public function deleCard($data){
        
        if(count($data) == 1){
           $result = $this->where('id',$data[0])->delete();
           return $result;
        }else{
           $result = self::destroy($data);
           return $result;
        }
    }
    
    /**
     * 根据搜索条件获取用户列表信息
     */
    public function getCardsByWhere($map, $Nowpage, $limits)
    {
        return $this->
            where($map)->page($Nowpage, $limits)->order('id desc')->select();
    }
}

?>