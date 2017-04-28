<?php
namespace app\mall\controller;

use app\member\controller\Base;
use app\mall\model\ShopCarModel;
use think\Session;
use think\Db;
class ShopCar extends Base
{
    /**
     * [index 首页]
     * @return [type] [description]
     * @author cgy
     */
    public function index(){
        $key = input('key');
        $map = [];
        if($key&&$key!=="")
        {
            
        }
        $map=array("user_id"=>Session::get("userId"));
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = 10;// 获取总条数
        $count = Db::name('cart')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $user = new ShopCarModel();
        $lists = $user->getCardsByWhere($map, $Nowpage, $limits);
        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('count',$count);
        $this->assign('val', $key);
        $this->assign("list",$lists);
        return $this->fetch();
    }
    /**
     * [ajaxDeleOrder 删除订单]
     * @return [type] [description]
     * @author cgy
     */
    public function addCard(){
        $data = input("post.");
        $card = new ShopCarModel();
        $cardinfo = array();
        $cardinfo["user_id"] = Session::get("userId");//用户id
        $cardinfo["goods_id"] = $data["id"];//货物id
        $cardinfo["size"] = $data["goodsSize"];//订单数量
        $cardinfo["selected"] = 0;//$data["selected"];//在购物车中的状态
        $cardinfo["prom_type"] = 0;//$data["promtype"];//活动id
        $cardinfo["session_id"] = 0;//sessionid();$data[""];//会话id
        $cardinfo["member_goods_price"] = $data["price"];//会员折扣价
        $cardinfo["prom_id"] = 100;//$data["prom_id"];
        $result = $card->addCart($cardinfo);
        if($result == null){
            return json(array("code"=>"0","msg"=>"失败","data"=>""));
        }else{
            return json(array("code"=>"1","msg"=>"成功","data"=>""));
        }
    }
}

?>