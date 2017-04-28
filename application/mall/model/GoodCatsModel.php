<?php

namespace app\mall\model;
use think\Model;

class GoodCatsModel extends Model
{

    protected $name = "goods_cats";

    /**
     * [getGoodsTree 获取商品列表]
     * @author
     */
    public function getGoodsTree($parentid)
    {
        $result = $this->where(['dataFlag'=>1, 'parentId'=>$parentid])->select();
        $goods_result=array();
        foreach($result as $k=>$v){
            $goods_result[$k]['id']=$v['catId'];
            $goods_result[$k]['pid']=(int)$v['parentId'];
            $goods_result[$k]['name']=$v['catName'];
            $goods_result[$k]['isParent'] = self::isParent($v['catId']);
            //$goods_result[$k]['url']='/index.php/mall/goodcats/getGoodsListByPage?id=' . $v['catId'];
            //$goods_result[$k]['target'] = 'goods_list';
        }
        return $goods_result;
    }
    
    /**
     * [parentName 获取商品父级分类名称]
     * @author
     */
    public function parentName($pid){
        $result = $this -> where(['catId' => $pid]) -> select();
        return json_decode(json_encode($result),true);
    }

    /**
     * [isParent 检查是否父节点]
     * @author
     */
    private function isParent($parentid){
        $result = $this->where(['dataFlag'=>1,'parentId'=>$parentid])->count();
        return $result==0? false:true;
    }
    
    /**
     * [getGoodsSize 获取商品节点数量]
     * @return [type] [description]
     * @author
     */
    public function getGoodsSize($parentid){

    	$count = $this->where(['parentId'=>$parentid,'dataFlag'=>1])->count();
    	return $count;
    }
    
    /**
     * [getGoodsByParent 返回指定商品分类]
     * @return [type] [description]
     * @author
     */
    public function getGoodsByParent($id){
    	$dic = $this->where(['parentId'=>$id,'dataFlag'=>1])->order('catSort asc')
    	->select();
    	return $dic;
    }

    /**
     * [checkGoods 查看商品分类是否重复]
     * @return [type] [description]
     * @author
     */

    public function checkGoods($param){

        $result = $this -> where ($param) -> select();
        return $result; 
    }

    /**
     * [addGoodsCat 添加商品分类]
     * @return [type] [description]
     * @author
     */
    public function addGoodsCat($param){
        $result = $this -> save($param);
        return $result;
    }

    /**
     * [deleteCat 删除商品分类]
     * @return [type] [description]
     * @author
     */
    public function deleteCat($id){
        $result = $this -> where('catId', $id) -> setField('dataFlag', '0');
        return $result;
    }

    /**
     * [editGoodsCat 修改商品分类]
     * @return [type] [description]
     * @author
     */
    public function editGoodsCat($id, $name){
            
        $result = $this -> where('catId', $id) -> update(['catName' => $name,'createTime'=>date("Y-m-d H:i:s", time())]);
        return $result;
    }

    /**
     * [Sorting 修改商品次序]
     * @return [type] [description]
     * @author
     */
    public function Sorting($id, $order){
            
        $result = $this -> save(["catSort"=>$order],["catId"=>$id]);
        return $result;
    }
    

}