<?php
namespace app\member\controller;
use think\Controller;
use think\Db;
use think\View;
use app\member\model\WithdrawalsModel;
use app\member\controller\Base;
class Withdrawals extends Base
{     
      //执行查询操作返回所有数据
      public function index(){
        $user=new WithdrawalsModel();
        $list=$user->getindex();
        foreach ($list as $key=>$value) {
           $list[$key]['create_time']=date("Y-m-d H:i:s",$value['create_time']);
           // $lists[$k]['last_login_time']=date('Y-m-d H:i:s',$v['last_login_time']);
        }
        $this->assign('list',$list);
        return view();
      }
      //执行删除操作
      public function del(){
        if(request()->isAjax()){
          $id=input('id');
          $user=new WithdrawalsModel();
          $list=$user->getdel($id);
          return $list;
        }
      }
      // 执行添加操作加载添加模板
      public function add(){
        if(request()->isAjax()){
          $data=input('post.');
          // var_dump($data);
          foreach ($data as $value){
            $info['money']=$value[0]['value'];
            $info['bank_name']=$value[1]['value'];
            $info['account_bank']=$value[2]['value'];
            $info['account_name']=$value[3]['value'];
            $info['tuanduiyeji']=$value[4]['value'];
            $info['zhishuyeji']=$value[5]['value'];
            $info['points']=$value[6]['value'];
            $info['remark']=$value[7]['value'];
            $info['create_time']=time();
            $info['status']="1";
            $user=new WithdrawalsModel();
            $list=$user->getadd($info);
          }
            return $list;
        }
        return view();
      }
      //加载修改页面
      public function edit(){
        if(request()->isAjax()){
          $data=input('post.');
          // var_dump($data);
          foreach ($data as $value){
            $info['money']=$value[0]['value'];
            $info['bank_name']=$value[1]['value'];
            $info['account_bank']=$value[2]['value'];
            $info['account_name']=$value[3]['value'];
            $info['tuanduiyeji']=$value[4]['value'];
            $info['zhishuyeji']=$value[5]['value'];
            $info['points']=$value[6]['value'];
            $info['remark']=$value[7]['value'];
            $info['id']=$value[8]['value'];
            $user=new WithdrawalsModel();
            $list=$user->getupdate($info);
          }
          return $list;
        }
        $id=input('id');
        // var_dump($id);
        $user=new WithdrawalsModel();
        $list=$user->getedit($id);
        $this->assign('list',$list);
        return view();
      }
}

?>