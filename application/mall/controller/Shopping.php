<?php
namespace app\mall\controller;

use app\member\controller\Base;
use app\mall\model\ShopModel;
use think\Db;
use think\Session;
class Shopping extends Base
{
    public function index(){
       return $this->fetch("index") ;
    }
    public function goodsList(){
        $catID = input("get.id");
        $page = input("get.page");
        if($page == null){
            $page = 1;
        }
        $limits = 28;
        $shop = new ShopModel();
        $count = Db::name("goods")->where("goodsCatId",$catID=10)->count();
        $allpage = intval(ceil($count / $limits));
        $result = $shop->getGoodsByCatID($catID=10,$page,$limits);
        $this->assign("shop",$result);
        $this->assign("allpage",$allpage);
        $this->assign("Nowpage",$page);
        $this->assign("val",$catID);
        return $this->fetch("list");
    }
}

?>