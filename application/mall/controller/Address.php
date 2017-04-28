<?php
namespace app\mall\controller;

use app\member\controller\Base;
class Address extends Base
{
    public function index(){
    
        return $this->fetch("index");
    }
}

?>