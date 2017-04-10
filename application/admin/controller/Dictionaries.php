<?php
namespace app\admin\controller;

use app\admin\controller\Base;

class Dictionaries extends Base
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
     * [getDicList 获取字典列表]
     * @return [type] [description]
     * @author
     */
    public function getDicList()
    {
        return $this->fetch('list');
    }
    /**
     * [getDicListByPage 通过指定页码获取字典列表]
     * @return [type] [description]
     * @author
     */
    public function getDicListByPage(){
        $key = input('get.id');
        $map = [];
        $dic = new \app\admin\model\Dictionaries();
        $dics = $dic->get(["id"=>$key]);
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = 10;// 获取总条数
        $count = $dic->getAllDicSize($key);  //总数据
        $allpage = intval(ceil($count / $limits));
        $lists = $dic->getDicByParent($key, $limits, $Nowpage);
        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('count', $count);
        $this->assign('val', $key);
        $this->assign('lists', $lists);
        $this->assign('content', $dics['name']);
        return $this->fetch('list');
    }

    /**
     * [setState 设置状态]
     * @return [type] [description]
     * @author
     */
    public function setState(){
        $key = input('post.id');
        $dic = new \app\admin\model\Dictionaries();
        $dics = $dic->get(['id'=>$key]);
        $result = '';
        $flag = 0;
        if($dics['state'] == 1){
            $flag=1;
            $result = $dic->save(['state'=>0],['id'=>$key]);
        }else{            
            $result = $dic->save(['state'=>1],['id'=>$key]);
            $flag=0;
        }
        return $result > 0 ? json(array("code"=>$flag)):json(array('code'=>-1));
    }
    /**
     * [adddic 添加字典页面]
     * @return [type] [description]
     * @author
     */
    public function adddic(){
        $key = input('get.id');
        $dic = new \app\admin\model\Dictionaries();
        $result = $dic->getDicParent();
        $nav = new \org\Leftnav;
        $arr = $nav::rule($result);
        $data = array('pid'=>0,'name'=>'','bianma'=>'','bz'=>'','state'=>true,'orderby'=>0);
        $pid = input('get.pid');
        $type = 0;
        if(is_numeric($key)){
            $data['pid'] = $pid;
            $type = 1;
        }
        $title = '添加子典';
        if(is_numeric($key)){
            $datas = $dic->get(['id'=>$key]);
            $data['pid']=$datas['parentID'];
            $data['name']=$datas['name'];
            $data['bianma']=$datas['bianma'];
            $data['bz']=$datas['bz'];
            $data['state']=$datas['state'] ==1 ? true:false;
            $data['orderby'] = $datas['orderby'];
            $type = 2;
            $title = '修改子典';
        }
        $this->assign('admin_rule',$result);
        $this->assign('data',$data);
        $this->assign('type',$type);
        $this->assign('key_id',input('get.id'));
        $this->assign('title',$title);
        return  $this->fetch('adddic');
    }
    /**
     * [ajaxAddDic 添加字典]
     * @return [type] [description]
     * @author
     */
    public function ajaxAddDic(){
        $dic = new \app\admin\model\Dictionaries();
        $data['parentID'] = input('post.pid');
        $data['name'] = input('post.title');
        $data['bianma'] = input('post.bianma');
        $data['bz'] = input('post.bz');
        $id = input('post.id');
        $data['state'] = input('post.status')=='on'?1:0;
        //var_dump($data);
        //exit;
        $type = input('post.type');
        $result = 0;
        if($type == 2){
            $result = $dic->updateDiction(array('bianma'=>$data['bianma'],'bz'=>$data['bz'],'name'=>$data['name'],'parentID'=>$data['parentID'],'state'=>$data['state'],'IsDelete'=>0),$id);
        }else{
            $result = $dic->addDiction($data);
        }
        return $result > 0 ? json(array("state"=>1)):json(array('state'=>0));
    }
    /**
     * [ajaxDeleDic 删除字典]
     * @return [type] [description]
     * @author
     */    
    public function ajaxDeleDic(){
        $dic = new \app\admin\model\Dictionaries();
        $key = input('post.id');
        $result = $dic->deleDiction($key);
        return $result > 0 ? json(array("state"=>1)):json(array('state'=>0));
    }
      /**
     * [ajaxOrder 排序]
     * @return [type] [description]
     * @author
     */
    public function ajaxOrder(){
        $dic = new \app\admin\model\Dictionaries();
        $key = input('post.id');
        $order = input('post.order');
        $result = $dic->save(["orderby"=>$order],["id"=>$key]);
        return $result > 0 ? json(array("state"=>1)):json(array('state'=>0));        
    }
   
}

?>