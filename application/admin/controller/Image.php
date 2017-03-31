<?php
namespace app\admin\controller;

use app\admin\controller\Base;
use app\admin\model\ImageModel;
class Image extends Base
{
    public function index()
    {
        return $this->fetch();
    }
    public function getImageList()
    {
        return $this->fetch('list');
    }
    public function getImageListByPage(){

            $key = input('get.id');
            
            $map = [];
            $dic = new ImageModel();
            $Nowpage = input('get.page') ? input('get.page'):1;
            $limits = 10;// 获取总条数
            $count = $dic->getAllImageSize($key);  //总数据
            $allpage = intval(ceil($count / $limits));
            $lists = $dic->getImageByParent($key, $limits, $Nowpage);
            $this->assign('Nowpage', $Nowpage); //当前页
            $this->assign('allpage', $allpage); //总页数
            $this->assign('count', $count);
            $this->assign('val', $key);
            $this->assign('lists', $lists);
            $this->assign('nodeID', $key);
            

            return $this->fetch('list');
    }

    //添加字典页面
    public function addImage(){
        $nodeid = input('get.id');
        $this->assign('nodeid',$nodeid);
        return  $this->fetch('addImage');
    }
    //添加字典
    public function ajaxAddImage(){
        $dic = new ImageModel();
        $data['Isrecommend'] = input('post.is_recommend');
        $data['Ishot'] = input('post.type');
        $data['Isstatus'] = input('post.is_status');//realname,path
        $data['name'] = input('post.realname');
        $data['path'] = input('post.image');
        $data['filepath'] = input('post.imagename');
        $data['nodeID'] = input('post.nodeID');
        $image1 = $data;
        $result = 0;
        $data['name'] = input('post.realnames');
        $data['path'] = input('post.images');
        $data['filepath'] = input('post.imagenames');
        $small = input('post.small');
        $small = str_replace('\\','/',(string)$small);
        $small = str_replace('&quot;','"', (string)$small);
        $big = input('post.big');
        $big = str_replace('\\','/', (string)$big);
        $big = str_replace('&quot;','"', (string)$big);
        $smalldata = json_decode(''.$small.'');
        $bigdata = json_decode(''.$big.''); 
        if(count($bigdata) == 0 && count($smalldata) == 0){
            
            return json(array('state'=>0));
        }
        $result =[];
        foreach ($smalldata as $value){
            $data['name'] = $value->name;
            $data['path'] = $value->imagename;
            $data['filepath'] = $value->size;
            if($data['name'] =="undefined"){
                continue;
            }
            $result[] = $data;
            
        }
        foreach ($bigdata as $value){
            $data['name'] = $value->name;
            $data['path'] = $value->imagename;
            $data['filepath'] = $value->size;
            if($data['name'] =="undefined"){
                continue;
            }
            $result[] = $data;
        
        }
        $result = $dic->saveAll($result);
        return $result > 0 ? json(array("state"=>1)):json(array('state'=>0));
    }
    //添加字典页面
    public function editImage(){
        $id = input('get.id');
        $dic = new ImageModel();
        $data = $dic->get(['id'=>$id]);
        $this->assign('id',$id);
        $this->assign('data',$data);
        return  $this->fetch('editImage');
    }
    //添加字典
    public function ajaxeditImage(){
        $dic = new ImageModel();
        $data['Isrecommend'] = input('post.is_recommend');
        $data['Ishot'] = input('post.type');
        $key = input('post.id');
        $data['Isstatus'] = input('post.is_status');//realname,path
        $result = $dic->save($data,['id'=>$key]);
        return $result > 0 ? json(array("state"=>1)):json(array('state'=>0));
    }
    //删除字典
    public function ajaxDeleImage(){
        
        $dic = new ImageModel();
        $key = input('post.id');
        $result = $dic->deleImagetion($key);
        return $result > 0 ? json(array("state"=>1)):json(array('state'=>0));
    }
    //排序
    public function ajaxOrder(){
        $dic = new ImageModel();
        $key = input('post.id');
        $order = input('post.order');
        $result = $dic->save(["orderby"=>$order],["id"=>$key]);
        return $result > 0 ? json(array("state"=>1)):json(array('state'=>0));        
    }
    
    //获取通用树中图片相关的数据
    public function ajaxGetImageData($nodeStr=0){
        $Image = new ImageModel();
        $id = input('post.id');
        $result = null;
        if($id == null){
            $result = $Image->initTree();
        }else{
        $result = $Image->getImagetree($id);}
        $new_result = array();
        foreach($result as $k=>$v){
            $new_result[$k]['id']=$v['id'];
            $new_result[$k]['pId']=(int)$v['parentID'];
            $new_result[$k]['name']=$v['name'];
            $new_result[$k]['iconSkin']=$v['css'];//
            $new_result[$k]['isParent']=true;
            if($nodeStr == 0){
                $new_result[$k]['url']='/index.php/admin/Image/getImageListByPage?id=' . $v['id'];
                $new_result[$k]['target'] = 'list_image';
            }
        }
        return json($new_result);
    }
}

?>