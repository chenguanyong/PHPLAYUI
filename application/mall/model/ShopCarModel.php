<?php
namespace app\mall\model;

use think\Model;
use think\Db;
use think\Session;
class ShopCarModel extends Model
{
    protected $name = "cart";
    //添加到购物车
    /**
     * [addCart 添加订单]
     * @return [type] [description]
     * @author cgy
     */
    public function addCart($data){
        $goodresult = Db::name("goods")->where("goodsId",$data['goods_id'])->find();//查询商品
       //var_dump($goodresult);
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
       // var_dump($goods);
        return $this->save($goods);
    }
    /**
     * [deleCard 删除购物车]
     * @return [type] [description]
     * @author cgy
     */
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
     * [getCardsByWhere 根据搜索条件获取用户列表信息]
     * @return [type] [description]
     * @author cgy
     */
    public function getCardsByWhere($map, $Nowpage, $limits)
    {
        return $this->join('xx_goods', 'xx_cart.goods_id = xx_goods.goodsId')->
            where($map)->page($Nowpage, $limits)->order('id desc')->select();
    }
}

?>