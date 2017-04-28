<?php

namespace app\admin\controller;
use think\Db;
use think\Cache;
class Index extends Base
{
    public function index()
    {
		if(request()->isAjax()){
         $list=Db::table('xx_config')->select();
         return $list;
        }
       // $this->assign("list",$list);
        return $this->fetch();
    }


    /**
     * [indexPage 后台首页]
     * @return [type] [description]
     * @author
     */
    public function indexPage()
    {
        $info = array(
            'web_server' => $_SERVER['SERVER_SOFTWARE'],
            'onload'     => ini_get('upload_max_filesize'),
            'think_v'    => THINK_VERSION,
            'phpversion' => phpversion(),
        );

        $this->assign('info',$info);
        return $this->fetch('main');
    }
    public function center(){
        return $this->fetch();
    }
}
