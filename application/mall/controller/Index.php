<?php
namespace app\mall\controller;

use app\member\controller\Base;
use app\mall\model\OrderModel;
use app\mall\model\ShopModel;

class Index extends Base
{
    public function index(){

       return  $this->fetch('index');
    }
    public function shop(){
        $shopid = input("get.id");
         $shop = new ShopModel();
         $shopInfo = $shop->getShopByID($shopid);
         $this->assign("shopId",$shopid);
         $this->assign("shopInfo",$shopInfo);
       return $this->fetch("shop");
    }
}

?>