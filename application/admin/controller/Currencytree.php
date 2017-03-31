<?php
namespace app\admin\controller;
use app\admin\controller\Base;
class Currencytree extends Base
{
   public function index()
    {
    
        return $this->fetch();
    }
    public function getCurrenyList()
    {
    
        return $this->fetch('list');
    }
    public function getCurrenyListByPage(){

            $key = input('get.id');
            
            $map = [];
            $dic = new \app\admin\model\CurrencyTreeModel();
            $dics = $dic->get(['id'=>$key]);
            $Nowpage = input('get.page') ? input('get.page'):1;
            $limits = 10;// 获取总条数
            $count = $dic->getAllCurrenySize($key);  //总数据
            $allpage = intval(ceil($count / $limits));
            $lists = $dic->getCurrenyByParent($key, $limits, $Nowpage);
            $this->assign('Nowpage', $Nowpage); //当前页
            $this->assign('allpage', $allpage); //总页数
            $this->assign('count', $count);
            $this->assign('val', $key);
            $this->assign('lists', $lists); 
            if($dics['name'] == null){
            $this->assign('content', '顶级节点');
            }else{
                $this->assign('content', $dics['name']);
                
            }
            return $this->fetch('list');
    }

    //添加字典页面
    public function addCurrency(){
        $key = input('get.id');
        $parentID = input('get.node');
        $type = input('get.type');
        $dic = new \app\admin\model\CurrencyTreeModel();
        $ParentNode = '';
        if($type == 1 ){
          //  echo 25;
            $parentID = $key;
            if($key == 0){
                $parentID = 0;
                $ParentNode = '顶层节点';                
            }else{
            $dics = $dic->get(["id"=>$key]);
            $ParentNode = $dics['name'];}
        }else if($type == null){
            if($parentID == 0){
                $parentID = 0;
                $ParentNode = '顶层节点';                
            }else{
            $dics = $dic->get(["id"=>$parentID]);
            $ParentNode = $dics['name'];}

        
        }else{
            //echo 22;
            $parentID = 0;
            $ParentNode = '顶层节点';
        }
        $data = array('pid'=>0,'name'=>'','css'=>0);
        $pid = input('get.node');
        $type = 0;
        $title = '添加节点';
        if($pid == null){
            
            //$data['pid'] = $pid;
            $type = 1;
        }else
        
        if(is_numeric($key)){
            $datas = $dic->get(['id'=>$key]);

            $data['pid']=$datas['parentID'];
            $data['name']=$datas['name'];
            $data['css']=$datas['css'];
            $type = 2;
            $title = '修改节点';
        }
        if($key == 0){
            $key = 1;
        }
        $this->assign('data',$data);
        $this->assign('type',$type);
        $this->assign('key_ids',$key);
        $this->assign('node',$ParentNode);
        $this->assign('nodeid',$parentID);
        $this->assign('title',$title);
        return  $this->fetch('addCurrency');
    }
    //添加字典
    public function ajaxAddCurrency(){
        $dic = new \app\admin\model\CurrencyTreeModel();
        $data['parentID'] = input('post.nodeid');
        $data['name'] = input('post.title');
        $data['css'] = input('post.css');
        $id = input('post.id');
       // $data['state'] = input('post.status')=='on'?1:0;
        //var_dump($data);
        //exit;
        $type = input('post.type');
        $result = 0;
       
        if($type == 2){
            
            $result = $dic->updateCurrency(array('name'=>$data['name'],'parentID'=>$data['parentID'],'css'=>$data['css'],'IsDelete'=>0),$id);
        
        }else{
        $result = $dic->addCurrency($data);
        }
        return $result > 0 ? json(array("state"=>1)):json(array('state'=>0));
        
    }
    //删除字典
    public function ajaxDeleCurrency(){
        
        $dic = new \app\admin\model\CurrencyTreeModel();
        $key = input('post.id');

        $result = $dic->deleCurrency($key);

        return $result > 0 ? json(array("state"=>1)):json(array('state'=>0));

    }
    //排序
    public function ajaxOrder(){
        $dic = new \app\admin\model\CurrencyTreeModel();
        $key = input('post.id');
        $order = input('post.order');
        $result = $dic->save(["orderby"=>$order],["id"=>$key]);
        
        return $result > 0 ? json(array("state"=>1)):json(array('state'=>0));        
        
        
    }

   
}

?>