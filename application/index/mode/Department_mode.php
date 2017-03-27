<?php
namespace app\index\mode;
use \think\Model;
use think\Db;
class Department_mode extends Model
{
    protected $table = 'ce_department';
    //初始化
    public function initialize(){
    
        parent::initialize();
    }
    //获取部门列表
    public function getDepartmentList(){
        
        $Department = $this->select();
        
        if($Department == null){
            
            return null;            
        }
        return $Department;
    }
    //保存部门
    public function saveDepart($depart){
        
        $result = $this->save($depart);
        if($result == null){
            
            return null;
        }
        return $result;
    }
    
    //更新数据
    public function updateDepart($depart,$where){
        

        $result = $this->save($depart,$where);
        if($result == null){
        
            return null;
        }
        return $result;
    }
    
    //删除数据和还原数据
    public function deleteDepart($departValue, $where){
        
        $result = $this->save(['IsDelete'=>$departValue], $where);
        
        if($result == null){
        
            return null;
        }
        
        return $result;
        
    }
    //获取部门列表，通过父id
    
    public function getDeparParentID($ParentID){
    
        //$menu = $this->get(['ParentID'=$ParentID]);
        $result_array = array();
        $sql = 'SELECT ';
        $sql = $sql . '	c.*, ';
        $sql = $sql . '	(';
        $sql = $sql . '		SELECT';
        $sql = $sql . '			COUNT(*) ';
        $sql = $sql . '		FROM ';
        $sql = $sql . '			ce_department c2 ';
        $sql = $sql . '		WHERE ';
        $sql = $sql . '			c2.ParentID = c.ID ';
        $sql = $sql . '	) AS child_count ';
        $sql = $sql . 'FROM ';
        $sql = $sql . '	ce_department c ';
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
                'text' => $row['ShortName'] ,
                'type' => $row['child_count'] > 0 ? 'folder' : 'item',
                'additionalParameters' =>  array('id' => $row['ID'])
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
    
                $data[$row['ID']] = $item;
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
}

?>