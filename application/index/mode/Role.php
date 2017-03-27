<?php
namespace app\index\mode;
use \think\Model;
use think\Session;
class Role extends Model
{
    protected  $table = 'ce_role';
    public function initialize(){
    
        parent::initialize();
    }
    
    public function getRole($page,$rownum){
        $start = ($page-1) * $rownum;
        Session::set('role_page',$page);
        Session::set('role_row',$rownum);
      $result = $this
        ->limit($start, $rownum)
        ->order('id', 'desc')
        ->select();
       $count = $this->count('id');
       $back_result = array();
       $i = 0;
       foreach ($result as $result_row){
           
           $back_result[$i]['角色ID'] = $result_row['RoleID'];
           $back_result[$i]['角色名'] = $result_row['RoleName'];
           $back_result[$i]['是否删除'] = $result_row['IsDelete'];
           $back_result[$i]['添加时间'] = $result_row['DatetimeCreated'];
           $back_result[$i]['更新时间'] = $result_row['DatetimeUpdated'];
           $i++;
       }
       
       
        $gg = array('page'=>$page,'total'=> ceil($count/$rownum),'records'=>$count,'rows'=>$back_result);
       //var_dump($result);
      if($result == null){
          
          return false;
      }
      return $gg;
      
    }
    public function  addRole($Roledata){
        

        $role = $this->where("RoleName",$Roledata['RoleName'])
        ->find();
        if($role != null){
            
            return null;
        }
        //var_dump($role);
        //exit;
        $id = $this->Max('ID');
        $id++;
        $Roledata['RoleID'] = $id;
        $Roledata['DatetimeCreated']=date('Y-m-d H:i:s', time()); 
        $Roledata['DatetimeUpdated']=date('Y-m-d H:i:s', time()); 
        $result = $this->save($Roledata);
        
        return $result === false ?false:true;
        
    }
    public function deleRole($RoleID){
       $page = Session::get('role_page');
       $rownum = Session::get('role_row');
       $start = ($page-1) * $rownum;

       $result = $this
       ->limit($start, $rownum)
       ->order('id', 'desc')
       ->select();
       $RoleID = $RoleID-1;
       $id = $result[$RoleID]['ID'];
       //echo $id;
      return   $this -> save(['IsDelete'=>1],['ID'=>$id])===false?false:true;
        
    }
    public function updateRole($Roledata){

        $role = $this->where("RoleName",$Roledata['RoleName'])
        ->select();
        if(count($role) > 1){
        
            return null;
        }
        $Roledata['DatetimeUpdated']=date('Y-m-d H:i:s', time());
        return   $this -> save($Roledata,['RoleID'=>$Roledata['RoleID']])===false?false:true;
    }
}

?>