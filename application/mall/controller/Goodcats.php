<?php
namespace  app\mall\controller;
use think\Controller;
use app\mall\model\GoodCatsModel;
use app\admin\controller\Base;

class Goodcats extends Base
{
	/**
	 * [index 首页]
	 * @return [type] [description]
	 * @author
	 */
	public function index()
	{
		return $this->fetch();
	}
	
	/**
	 * [getGoodsTree 获取商品分类列表]
	 * @return [type] [description]
	 * @author
	 */
	public function getGoodTree(){
		$auth = new \com\Auth();
		$module     = strtolower(request()->module());
		$controller = strtolower(request()->controller());
		$action     = strtolower(request()->action());
		$url        = $module."/".$controller."/".$action;
		$parentid = input('id');   
		$goods = new GoodCatsModel();
		if($parentid == null){
			$parentid = 0;
		}
		return json($goods->getGoodsTree($parentid));
	}
	
	/**
	 * [getGoodsListByPage 获取商品分类列表]
	 * @return [type] [description]
	 * @author
	 */
	public function getGoodsListByPage(){
		$key = input('get.id');
		$dic = new GoodCatsModel();
		$lists = $dic->getGoodsByParent($key);
		$this->assign('val', $key);
		$this->assign('lists', $lists);
		return $this->fetch('list');
	}

	/**
	 * [addGoods 添加商品分类]
	 * @return [type] [description]
	 * @author
	 */
	public function addGoods(){
		$param = input('post.');
		if($param['parentId'] == null){
			$param['parentId'] = 0;
		}
		$goods = new GoodCatsModel();
		//查看是否重复
		$result = $goods -> checkGoods($param);
		if($result != null){
			return json(['code' => -1, 'data' => '', 'msg' => '该分类已存在']);
		}
		$param['createTime'] = date("Y-m-d H:i:s", time());	
		$result = $goods -> addGoodsCat($param);
		if($result == null){
			return json(['code' => 0, 'data' => '', 'msg' => '添加失败']);
		}else{
			return json(['code' => 1, 'data' => '', 'msg' => '添加成功']);
		}
	}
	/**
	 * [editGoods 修改商品分类]
	 * @return [type] [description]
	 * @author
	 */
	public function  editGoods(){
		$param = input('post.');
		$goods = new GoodCatsModel();
		//查看是否重复
		$result = $goods -> checkGoods($param);
		if($result != null){
			return json(['code' => -1, 'data' => '', 'msg' => '该分类已存在']);
		}
		$result = $goods -> editGoodsCat($param['catId'], $param['catName']);
		if($result == null){
			return json(['code' => 0, 'data' => '', 'msg' => '修改失败']);
		}else{
			return json(['code' => 1, 'data' => '', 'msg' => '修改成功']);
		}
	}

	/**
	 * [getName 得到商品分类名称]
	 * @return [type] [description]
	 * @author
	 */
	public function getName(){
		$pid = input('post.parentId');
		if($pid == null || $pid == 0){
			return json(['code' => 1, 'data' => '顶级分类', 'msg' => '']);
		}
		$goods = new GoodCatsModel();
		$result = $goods -> parentName($pid);

		if($result == null){
			return json(['code' => 0, 'data' => '', 'msg' => '获取分类失败']);
		}else{
			return json(['code' => 1, 'data' => $result['0']['catName'], 'msg' => '']);
		}
	}
		/**
	 * [doAdd 添加商品分类]
	 * @return [type] [description]
	 * @author
	 */
	 public function doAdd(){
	 	return $this -> fetch();
	 }	

	/**
	 * [doDel 删除商品分类]
	 * @return [type] [description]
	 * @author
	 */
	 public function doDel(){
	 	$param = input('post.');
	 	$goods = new GoodCatsModel();
	 	$result = $goods -> deleteCat($param['id']); 
	 	if($result != 0){
	 		return json(['code' => 1, 'data' => '', 'msg' => '删除成功']);
	 	}else{
	 		return json(['code' => 0, 'data' => '', 'msg' => '删除失败']);
	 	}
	 }

    /**
     * [ajaxOrder 排序]
     * @return [type] [description]
     * @author
     */
    public function ajaxOrder(){
        $id = input('post.catId');
        $order = input('post.catSort');
        $goods = new GoodCatsModel();
        $result = $goods->Sorting($id, $order);
        if($result != 0){
	 		return json(['code' => 1, 'data' => '', 'msg' => '成功']);
	 	}else{
	 		return json(['code' => 0, 'data' => '', 'msg' => '失败']);
	 	}
    }	
	
}
