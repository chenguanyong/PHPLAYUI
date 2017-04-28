<?php
namespace app\member\controller;
use think\Controller;
use think\Db;
use think\View;
use app\member\model\BrandsModel;
use app\admin\controller\Base;
class Brands extends Base
{
  //查询所有数据
  public function index(){
    $user=new BrandsModel();
    $list=$user->getindex();
    // var_dump($list);exit;
    $this->assign('list',$list);
    return $this->fetch();
  }
  // 执行添加方法
  public function add(){
    if(request()->isAjax()){
      // $data=input('post.');
      // return $data;
       $file = request()->file('pic');
       $info = $file->move(ROOT_PATH . 'public' . DS . 'upload/image');
       return $info->getSaveName();
    }
    if(request()->isPost()){
       $file = request()->file('pic');
       $info = $file->move(ROOT_PATH . 'public' . DS . 'upload/image');
       $s=$info->getSaveName();
       var_dump($s);
    }
    
  }
  //执行删除操作
  public function Del(){
    if(request()->isAjax()){
      $id=input('id');
      $user=new BrandsModel();
      $list=$user->getdel($id);
      return $list;
    }
  }
   // 上传图片
    public function uploads(){
       $file = request()->file('file');
       if(empty($file)){
        $res['status']=3;
        return json($res);
       }
       $info = $file->move(ROOT_PATH . 'public' . DS . 'upload/image');
       if($info){
           $res['status']=1;
           $res['image_name']=$info->getSaveName();
           $res['info'] = $info->getInfo();
           return json($res);
        }else{
           $res['status']=0;
           $res['error_info']=$file->getError();
           return $json($res);
        }
    }
   
}

?>