<?php

namespace app\member\controller;
use think\Controller;

class Base extends Controller
{
    public function _initialize()
    {
        if (!session('userId')){
            $this->redirect(url('login/index'));
        }

        $auth = new \com\Auth();

        $module     = strtolower(request()->module());
        $controller = strtolower(request()->controller());
        $action     = strtolower(request()->action());
        $url        = $module."/".$controller."/".$action;

        $this->assign([
            'userId' => session('userId'),
            'loginName' =>session('loginName')
        ]);
    }
}