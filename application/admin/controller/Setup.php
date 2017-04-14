<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Controller;
use think\Db;
use think\View;
use app\admin\model\SetupModel;
use think\Validate;
class Setup extends Base
{
	  //系统设置列表页
    public function index(){
    	 $user=new SetupModel();
       $list=$user->getindex();
       if (request()->isAjax()) {
        //接受传过来的数据
        $param=input('post.');
        $id1=$param['id0'];
        $id2=$param['id1'];
        $id3=$param['id2'];
        $id4=$param['id3'];
        $data['value']=$param['Logo'];
        $data['remarks']=$param['descr0'];
        // 判断是不是有图片上传
        if($data['value']==null){
          $data['value']=$list[0]['value'];
        }else{
          //如果有图片上传的话就用上传的然后把原来的图片删除掉
          $data['value']=$param['Logo'];
          $pic=$list[0]['value'];
            // $pics="F:\phpce".$pic;
            // unlink($pics);
        }
        $datas['value']=$param['systename'];
        $datas['remarks']=$param['descr1'];
        $datat['value']=$param['copyright'];
        $datat['remarks']=$param['descr2'];
        $da['value']=$param['company'];
        $da['remarks']=$param['descr3'];
        //导入model类
        $user=new SetupModel();
        // 执行修改操作
        $list=$user->getupdate($data,$id1);
        // if($list){
        //   return $data['value'];
        // }
        $list=$user->getupdate($datas,$id2);       
        $list=$user->getupdate($datat,$id3);
        $list=$user->getupdate($da,$id4);
        return $list;
       }
       //加载模板分配变量
       // session::set('path',"$data['value']");
        $this->assign('list',$list);
        // return view('index/index');
        return $this->fetch('setup/index');      
    }
   
    // 上传图片
    public function uploads(){
       $file = request()->file('file');
       if(empty($file)){
        $res['status']=3;
        return $res;
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
           return json($res);
        }
    }
    
}

?>
