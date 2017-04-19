<?php
namespace app\member\controller;

use app\admin\controller\Base;
class Index extends Base
{
    public function index(){
       return  $this->fetch('index');
    }
    public function profile(){
        
        return $this->fetch("userprofile");
    }
}

?>