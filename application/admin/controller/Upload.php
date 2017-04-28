<?php

namespace app\admin\controller;
use think\Controller;
use think\File;
use think\Request;

class Upload extends Base
{

    /*
     * 上传广告图片
     */
    public function uploadAdImage(){
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'upload/image/adv');
        if($info){
            $res['status']=1;
            $res['image_name']=$info->getSaveName();
            return json($res);

        }else{
            $res['status']=0;
            $res['error_info']=$file->getError();
            return json($res);
        }
    }
    /*
     * 编辑器图片上传接口
     */
    public function uploadImage(){
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'upload/editor');
        if($info){
            $res['src']="http://www.93admin.com/public/statisc/img/tong.jpg";
            $result=array('code'=>0,'data'=>$res,'msg'=>'上传成功');

            return json($result);

        }else{

            $result=array('code'=>-1,'data'=>'','msg'=>$file->getError());

            return json($result);
        }
    }
	//图片上传
    public function upload(){
        $type = input('get.type');
        $path = 'article';
        if($type == 1){           
            $path = 'images';
        }
       $file = request()->file('file');
       $info = $file->move(ROOT_PATH . 'public' . DS . 'upload/image/' . $path);
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
    
    //文件上传
    public function uploadFile(){
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'upload/file/down');
        if($info){

            $res['status']=1;
            $res['file_name']=$info->getFilename();
            $res['file_path']="/upload/file/down/".$info->getSaveName();
            return json($res);

        }else{
            $res['status']=0;
            $res['error_info']=$file->getError();
            return json($res);
        }
    }

    //会员头像上传
    public function uploadface(){
       $file = request()->file('file');
       $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/face');
       if($info){
            echo $info->getSaveName();
        }else{
            echo $file->getError();
        }
    }
    
    //商品图片上传
    public function uploadGoods(){
    
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'upload/image/goods');
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