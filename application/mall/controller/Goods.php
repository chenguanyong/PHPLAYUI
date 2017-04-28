<?php
namespace app\mall\controller;
use think\Controller;
use app\mall\model\GoodsModel;
use app\admin\controller\Base;

class Goods extends Base
{
    /**
     * [index 商品列表首页]
     * @return [type] [description]
     * @author
     */
    public function index()
    {
        return $this->fetch();
    }
    
    /**
     * [getGoodsListByPage 商品列表]
     * @return [type] [description]
     * @author
     */
    public function getGoodsListByPage()
    {
		$key = input('get.id');
		$map = [];
		$dic = new GoodsModel();
		$dics = $dic->get(['goodsId'=>$key]);
		$Nowpage = input('get.page') ? input('get.page'):1;
		$limits = 10;// 获取总条数
		$count = $dic->getGoodsSize($key);  //总数据
		$allpage = intval(ceil($count / $limits));
		$lists = $dic->getGoodsByParent($key, $limits, $Nowpage);
		$this->assign('Nowpage', $Nowpage); //当前页
		$this->assign('allpage', $allpage); //总页数
		$this->assign('count', $count);
		$this->assign('val', $key);
		$this->assign('lists', $lists);
		if($dics['goodsName'] == null){
		    $this->assign('content', '顶级节点');
		}else{
		    $this->assign('content', $dics['goodsName']);
		}
		return $this->fetch('list');		
    }
   
    /**
     * [addGoods 添加商品页面]
     * @return [type] [description]
     * @author
     */
    public function addGoods(){
        $id = input('get.id'); 
        $this->assign('id', $id);
        return $this->fetch();
    }
    
    /**
     * [ajaxAddGoods 添加商品页面]
     * @return [type] [description]
     * @author
     */
    public function ajaxAddGoods(){
        $param = input('post.');
        $data = array();
        $data['goodsSn'] = $param['goodsSn'];
        $data['productNo'] = $param['productNo'];
        $data['goodsName'] = $param['goodsName'];
        $data['marketPrice'] = $param['marketPrice'];
        $data['shopPrice'] = $param['shopPrice'];
        $data['goodsStock'] = $param['goodsStock'];
        $data['shopId'] = $param['shopId'];
        $data['goodsUnit'] = $param['goodsUnit'];
        $data['goodsCatIdPath'] = $param['goodsCatIdPath'];
        $data['goodsCatId'] = $param['nodeID'];
        $data['shopCatId1'] = $param['shopCatId1'];
        $data['shopCatId2'] = $param['shopCatId2'];
        $data['brandId'] = $param['brandId'];
        $data['goodsDesc'] = $param['goodsDesc'];
        $data['createTime'] = date("Y-m-d H:i:s", time());
        $small = $param['small'];
        $small = str_replace('\\','/',(string)$small);
        $small = str_replace('&quot;','"', (string)$small);
        $smalldata = json_decode(''.$small.'');
        foreach ($smalldata as $value){
            $data['goodsImg'] = $value->imagename;
        }
        $goods = new GoodsModel();
        $result = $goods -> addGoods($data);        
        if($result != null){
            return json(['code' => 1, 'data' => '', 'msg' => '添加成功']);
        }else{
            return json(['code' => 0, 'data' => '', 'msg' => '添加失败']);
        };
    }
    
    
    
    
}