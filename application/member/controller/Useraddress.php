<?php
namespace app\member\controller;
use think\Controller;
use think\Db;
use think\View;
use app\member\model\UseraddressModel;
use app\member\controller\Base;
class Useraddress extends Base
{
    public function index(){
        $user= new UseraddressModel();
        $list=$user->addressindex();
        $count=$user->index();
        $this->assign('count',$count);
        $this->assign('list',$list);
        return view();
      }

      // 执行地址添加操作
      public function add_address(){
      	if(request()->isAjax()){
          // return 1;
      		$param=input('post.');
          // return $param;
          foreach ($param as $value) { 
            $data['userName']=$value[0]['value'];
            $data['userPhone']=$value[1]['value'];
            $data['userAddress']=$value[5]['value'];
            $data['createTime']=date("Y-m-d H:i:s");
            $data['areaId']=$value[4]['value'];
            $data['isDefault']=$value[6]['value'];
            $a1=$value[2]['value'];
            $a2=$value[3]['value'];
            $a3=$value[4]['value'];
            $arr=array($a1,$a2,$a3);
            $data['areaIdPath']=implode("_",$arr);
            $user= new UseraddressModel();
            $list=$user->add($data);          
          }
          return $list;
      	}
      		return view('useraddress/address');
        
      }
      
      public function edit(){     	
        $id=input('id');
        // var_dump($id);exit;
        $user= new UseraddressModel();
        $list=$user->find($id);
        // var_dump($list);
        $info=$list['areaIdPath'];
        // var_dump($info);
        $s=explode("_",$info);
        // var_dump($s);        
        $o=Db::table('xx_areas')->find($s[0]);
        $er=Db::table('xx_areas')->find($s[1]);
        $s=Db::table('xx_areas')->find($s[2]);
        $a=$o['areaName'].$er['areaName'].$s['areaName'].$list['userAddress'];
        $this->assign('a',$a);
        $this->assign('o',$o);
        $this->assign('s',$s);
        $this->assign('list',$list);
        return view('useraddress/edit');
      }
      //修改
      public function update(){
        if(request()->isAjax()){
          $param=input("post.");
          foreach ($param as $value) {
            $data['userName']=$value[0]['value'];
            $data['userPhone']=$value[1]['value'];
            $data['userAddress']=$value[5]['value'];
            $data['createTime']=date("Y-m-d H:i:s");
            $data['areaId']=$value[4]['value'];
            $data['isDefault']=$value[6]['value'];
            $a1=$value[2]['value'];
            $a2=$value[3]['value'];
            $a3=$value[4]['value'];
            $arr=array($a1,$a2,$a3);
            $data['areaIdPath']=implode("_",$arr);
            $data['addressId']=$value[7]['value'];          
            $user= new UseraddressModel();
            $list=$user->edit($data);
          }
          return $list;
        }
      }
      //删除
      public function del(){
        if(request()->isAjax()){
          $id=input('id');
          // return $id;exit;
          $user= new UseraddressModel();
          $list=$user->addressdel($id);
          return json($list);
        }
      } 
      //一级联动
      public function add_csjl(){
          if(request()->isAjax()){
            $parentId=input('parentId');
          $user= new UseraddressModel();
          $list=$user->csjls($parentId);
          return json($list);
        }
      }  
      // 2级联动
      public function add_csjls(){
        if(request()->isAjax()){
            $parentId=input('parentId');
          $user= new UseraddressModel();
          $list=$user->csjlss($parentId);
          return json($list);
        }
      }
      //3级联动
      public function add_end(){
        if(request()->isAjax()){
            $parentId=input('parentId');
          $user= new UseraddressModel();
          $list=$user->end($parentId);
          return json($list);
        }
      }

}

?>