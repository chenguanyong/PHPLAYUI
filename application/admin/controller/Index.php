<?php

namespace app\admin\controller;

class Index extends Base
{
    public function index()
    {

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
