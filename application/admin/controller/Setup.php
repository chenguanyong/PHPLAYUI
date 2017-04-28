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
       // var_dump($list);
       if (request()->isAjax()) {
        //接受传过来的数据
        $param=input('post.');
        $id1=$param['id0'];
        $id2=$param['id1'];
        $id3=$param['id2'];
        $id4=$param['id3'];
        $id5=$param['id4'];
        $data['value']=$param['Logo'];
        // $data['remarks']=$param['descr0'];
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
        // $datas['remarks']=$param['descr1'];
        $datat['value']=$param['copyright'];
        // $datat['remarks']=$param['descr2'];
        $da['value']=$param['company'];
        // $da['remarks']=$param['descr3'];
        $d['value']=$param['upload_file_size'];
        // $d['remarks']=$param['descr4'];
        // $d['remarks']=$param['descr4'];
        //导入model类
        $user=new SetupModel();
        // 执行修改操作
        $list=$user->getupdate($data,$id1);
        $list=$user->getupdate($datas,$id2);       
        $list=$user->getupdate($datat,$id3);
        $list=$user->getupdate($da,$id4);
        $list=$user->getupdate($d,$id5);
        
        return $list;
       }
       //加载模板分配变量
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
    public function shop(){
      if(request()->isAjax()){
       $user=new SetupModel();
        $param=input('post.');
        $id6=$param['id5'];
        $id7=$param['id6'];
        $id8=$param['id7'];
        $id9=$param['id8'];
        $id10=$param['id9'];
        $k['value']=$param['freight_free'];
        // $k['remarks']=$param['descr5'];
        $s['value']=$param['default_storage'];
        // $s['remarks']=$param['descr6'];
        $o['value']=$param['warning_storage'];
        // $o['remarks']=$param['descr7'];
        $p['value']=$param['point_rate'];
        // $p['remarks']=$param['descr8'];
        $j['value']=$param['reduce'];
        // $j['remarks']=$param['descr9'];
        $list=$user->getupdate($k,$id6);
        $list=$user->getupdate($s,$id7);
        $list=$user->getupdate($o,$id8);
        $list=$user->getupdate($p,$id9);
        $list=$user->getupdate($j,$id10);
        return $list;
      }
    }
    //短信设置
    public function appkey(){
       $user=new SetupModel();

      if(request()->isAjax()){
        $param=input('post.');
        // return $param;
        $id11=$param['id10'];
        $id12=$param['id11'];
        $id13=$param['id12'];
        $id14=$param['id13'];
        $id15=$param['id14'];
        $id16=$param['id15'];
        $id17=$param['id16'];
        $id18=$param['id17'];
        $appkey['value']=$param['sms_appkey'];
        // $appkey['remarks']=$param['descr10'];
        $appke['value']=$param['sms_secretKey'];
        // $appke['remarks']=$param['descr11'];
        $appk['value']=$param['regis_sms_enable'];
        // $appk['remarks']=$param['descr12'];
        $app['value']=$param['forget_pwd_sms_enable'];
        // $app['remarks']=$param['descr13'];
        $ap['value']=$param['bind_mobile_sms_enable'];
        // $ap['remarks']=$param['descr14'];
        $a['value']=$param['order_add_sms_enable'];
        // $a['remarks']=$param['descr15'];
        $shop['value']=$param['order_shipping_sms_enable'];
        // $shop['remarks']=$param['descr16'];
        $out['value']=$param['sms_time_out'];
        // $out['remarks']=$param['descr17'];
        $list=$user->getupdate($appkey,$id11);
        $list=$user->getupdate($appke,$id12);
        $list=$user->getupdate($appk,$id13);
        $list=$user->getupdate($app,$id14);
        $list=$user->getupdate($ap,$id15);
        $list=$user->getupdate($a,$id16);
        $list=$user->getupdate($shop,$id17);
        $list=$user->getupdate($out,$id18);
        return $list;
      }
    }
    public function email(){
      if(request()->isAjax()){
       $user=new SetupModel();
        $param=input('post.');
        // return $param;
        $id19=$param['id18'];
        $id20=$param['id19'];
        $id21=$param['id20'];
        $id22=$param['id21'];
        $id23=$param['id22'];
        $id24=$param['id23'];

        $email['value']=$param['smtp_server'];
        // $email['remarks']=$param['descr18'];
        $emai['value']=$param['smtp_port'];
        // $emai['remarks']=$param['descr19'];
        $ema['value']=$param['smtp_user'];
        // $ema['remarks']=$param['descr20'];
        $e['value']=md5($param['smtp_pwd']);
        // $e['remarks']=$param['descr21'];
        $status['value']=$param['regis_smtp_enable'];
        // $status['remarks']=$param['descr22'];
        $statuss['value']=$param['test_eamil'];
        // $statuss['remarks']=$param['descr23'];
        $list=$user->getupdate($email,$id19);
        $list=$user->getupdate($emai,$id20);
        $list=$user->getupdate($ema,$id21);
        $list=$user->getupdate($e,$id22);
        $list=$user->getupdate($status,$id23);
        $list=$user->getupdate($statuss,$id24);
        return $list;


      }
    }

    
}

?>
