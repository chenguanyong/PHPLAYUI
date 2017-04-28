<?php
namespace app\member\controller;
use app\member\model\Node;
use think\Controller;

class Currencytree extends Controller
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
     * [getCurrencyList 获取通用树列表]
     * @return [type] [description]
     * @author
     */
    public function getCurrencyList(){
        $userId = session('userId');
        $parentid = input('id');
        $node = new Node();
        if($parentid == null){
            return json($node->getCurrencyById($userId));
        }
        return json($node->getCurrency($parentid));
    }
}

?>