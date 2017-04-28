<?php
namespace app\member\controller;
use think\Controller;
use think\Db;
use think\View;
use app\member\model\ExpressModel;
use app\member\controller\Base;
class Express extends Base
{
  public function index(){
    $user=new ExpressModel();
    $list=$user->getindex();
    // var_dump($list);
    $this->assign('list',$list);
    return view();
  }
  public function add(){
    // return 1;
    $param=input('post.');
    foreach ($param as $value) {
       $data['expressName']=$value[0]['value'];
    }
    // var_dump($param);
    $user=new ExpressModel();
    $list=$user->getadd($data);
    return $list;
  }
  public function del(){
    $id=input('id');
    $user=new ExpressModel();
    $list=$user->getdel($id);
    return $list;
  }
  public function edit(){
    // return view('edit');
    $id=input('id');
    $user=new ExpressModel();
    $list=$user->getedit($id);
    return $list;
  }
  public function update(){
    if(request()->isAjax()){
      $data=input('post.');
      // var_dump($data);
      foreach ($data as $value) {
       $info['expressName']=$value[0]['value'];
       $info['expressId']=$value[1]['value'];
    }
      $user=new ExpressModel();
      $list=$user->getupdate($info);
      return $list;
    }
  }
    public function link(){
      return $this->fetch();
    }
}

?>