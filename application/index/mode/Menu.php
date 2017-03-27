<?php
namespace app\index\mode;
use \think\Model;
use think\Db;
class Menu extends Model
{   
    protected $table = 'ce_menu';
    //初始化
    public function initialize(){
    
        parent::initialize();
    }
    
    //关联表
    public function menuRole(){
        
      return $this->hasOne("MenuRole",'MenuID','ID');        
    }
    
    //获取数据
    public function getMenuDatas($roleID){
        
        $this->menuRole();
        
    }
    //获取菜单数据
    public static  function getMenuData($roleID,$dele = 0,$flag = 0){
        
        $back_data_array = array();
        
        $sql = 'SELECT DISTINCT ';
        $sql = $sql . '	menu.MenuID AS menuID, ';
        $sql = $sql . '	menu.MenuName AS MenuName, ';
        $sql = $sql . '	menu.ParentID AS ParentID, ';
        $sql = $sql . '	menu.Flag AS Flag, ';
        $sql = $sql . '	menu.URL AS URL ';
        $sql = $sql . 'FROM ';
        $sql = $sql . '	ce_menu AS menu, ';
        $sql = $sql . '	ce_menu_role AS menu_role ';
        $sql = $sql . 'WHERE ';
        $sql = $sql . '	menu.MenuID = menu_role.MenuID ';
        $sql = $sql . 'AND menu_role.IsDelete = 0 ';
    	$sql = $sql . 'AND menu.IsDelete =' . $dele . ' ';
    	$sql = $sql . 'AND menu.Flag =' . $flag . ' ';
    	$sql = $sql . 'AND menu_role.RoleID =' . $roleID . ' ';    	
    	$sql = $sql . 'Order by ';
    	$sql = $sql . 'menu.MenuID ASC  ';

        
        $result = Db::query($sql);

        if(count($result) == 0){
        
            return false;
        }
        
        
        foreach ($result as $row){
        
            $arr = array($row['menuID'],$row['ParentID'],'title'=>$row['MenuName'],'url'=>$row['URL'],'flag'=>$row['Flag']);
            $back_data_array['' . $row['ParentID']][] = $arr;
        }
        return $back_data_array;
    }
    //获取彩单
    
    public function getMenuParentID($ParentID){
        
        //$menu = $this->get(['ParentID'=$ParentID]);
        $result_array = array();
        $sql = 'SELECT ';
        $sql = $sql . '	c.*, ';
        $sql = $sql . '	(';
        $sql = $sql . '		SELECT';
        $sql = $sql . '			COUNT(*) ';
        $sql = $sql . '		FROM ';
        $sql = $sql . '			ce_menu c2 ';
        $sql = $sql . '		WHERE ';
        $sql = $sql . '			c2.ParentID = c.MenuID ';
        $sql = $sql . '	) AS child_count ';
        $sql = $sql . 'FROM ';
        $sql = $sql . '	ce_menu c ';
        $sql = $sql . 'WHERE ';
        $sql = $sql . '	c.ParentID = ' . $ParentID;
      //echo $sql;
      //exit;
        $result = Db::query($sql);
        //var_dump($result);
        if(count($result) == 0){
        
            return false;
        } 
        $data = array();
        foreach($result as $row){
            //echo 'ddd';
            $item = array(
                'text' => $row['MenuName'] ,
                'type' => $row['child_count'] > 0 ? 'folder' : 'item',
                'additionalParameters' =>  array('id' => $row['MenuID'])
            );
            if($row['child_count'] > 0)
                $item['additionalParameters']['children'] = true;
                else {
                    //we randomly make some items pre-selected for demonstration only
                    //in your app you can set $item['additionalParameters']['item-selected'] = true
                    //for those items that have been previously selected and saved and you want to show them to user again
                    if(mt_rand(0, 3) == 0)
                        $item['additionalParameters']['item-selected'] = true;
                }
            
                $data[$row['MenuID']] = $item;
                //var_dump($data);
        }
        if(count($data) != 0){
            
            $result_array['status'] = 'OK';
            $result_array['data'] = $data;
    
        }else{
            $result_array['status'] = 'ERR';
            $result_array['message'] = '数据库错误';
        }
        return $result_array;
    }
    
    //添加菜单
    public function addMenu($Menudata){
        
       $menu = $this->where('MenuID',$Menudata['MenuID'])-find()->getdata();
       if($menu == null){
           
           return null;
           
       } 
       $result = $this->save($Menudata);
    }
    
    //删除菜单
    public function deleMenu($meunID){
        
        return $this->save(['ISdele'=>$meunID],['ID'=>$meunID['id']])==false?false:true;
        
    }
    
    public  function updateMenu($menuID){
        
        
        return $this->save($menudata,['id'=>$menudata['id']])==false?false:true;
    }
}

?>