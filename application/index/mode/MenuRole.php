<?php
namespace app\index\mode;
use think\Model;
class MenuRole extends Model
{
    protected  $table = 'ce_menu_role';
    public function initialize(){
    
        parent::initialize();
    }
}

?>