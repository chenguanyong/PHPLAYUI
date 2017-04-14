<?php
/**
 * Created by PhpStorm.
 * User: SEO-9
 * Date: 2017/2/9
 * Time: 11:10
 */

namespace app\admin\controller;

use app\admin\model\Node;
use think\Controller;

class Ajax extends Controller
{
    public function getMenuList(){
        if(!session('admin_uid')){

            return json(array('code'=>'-1','error_info'=>$this->error('抱歉，您没有登录')));
        }

        $auth = new \com\Auth();

        $module     = strtolower(request()->module());
        $controller = strtolower(request()->controller());
        $action     = strtolower(request()->action());
        $url        = $module."/".$controller."/".$action;
        //var_dump(session('rule'));
        //echo $url;
        //跳过检测以及主页权限
        if(session('admin_uid')!=1){

            if(!in_array($url, ['admin/index/index','admin/index/center','admin/index/indexpage'])){
                if(!$auth->check($url,session('admin_uid'))){
                    return json(array('code'=>'-100','error_info'=>$this->error('抱歉，您没有操作权限')));
                }
            }
        }
        $node = new Node();        
        return json($node->getMenu(session('rule')));

    }
    //获取字典列表
    public function getDic(){
        if(!session('admin_uid')){
        
            return json(array('code'=>'-1','error_info'=>$this->error('抱歉，您没有登录')));
        }
        
        $auth = new \com\Auth();
        
        $module     = strtolower(request()->module());
        $controller = strtolower(request()->controller());
        $action     = strtolower(request()->action());
        $url        = $module."/".$controller."/".$action;
        //var_dump(session('rule'));
        //echo $url;
        //跳过检测以及主页权限
        if(session('admin_uid')!=1){
        
            if(!in_array($url, ['admin/index/index','admin/index/center','admin/index/indexpage'])){
                if(!$auth->check($url,session('admin_uid'))){
                    return json(array('code'=>'-100','error_info'=>$this->error('抱歉，您没有操作权限')));
                }
            }
        }
        $node = new Node();
        return json($node->getDic());
        
        
    }
    //获取通用树列表
    public function getCurrencyList(){
        if(!session('admin_uid')){
            return json(array('code'=>'-1','error_info'=>$this->error('抱歉，您没有登录')));
        }
        $auth = new \com\Auth();
        $module     = strtolower(request()->module());
        $controller = strtolower(request()->controller());
        $action     = strtolower(request()->action());
        $url        = $module."/".$controller."/".$action;
        if(session('admin_uid')!=1){
            if(!in_array($url, ['admin/index/index','admin/index/center','admin/index/indexpage'])){
                if(!$auth->check($url,session('admin_uid'))){
                    return json(array('code'=>'-100','error_info'=>$this->error('抱歉，您没有操作权限')));
                }
            }
        }
        $type = input('id');
        if($type == null){
            $type = 0;
        }
        $node = new Node();
        return json($node->getCurrency($type));
    }
}