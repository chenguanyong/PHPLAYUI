<?php
namespace app\mall\controller;

use app\admin\controller\Base;
class Address extends Base
{
    public function index(){
    
        return $this->fetch("index");
    }
}

?>