<?php
namespace app\member\controller;

use app\admin\controller\Base;
class index extends Base
{
    public function index(){
        
       $this->fetch("index"); 
    }
}

?>