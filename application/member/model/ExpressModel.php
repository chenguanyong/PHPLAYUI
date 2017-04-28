<?php
namespace app\member\model;
use think\Db;
use think\Model;
class ExpressModel extends Model
{
    protected $name="express";
    //返回所有数据
    /**
     * @return [getindex]
     * @author fuquanen
     */
    public function getindex(){
        return $this->select();
    }
    //执行添加数据
    /**
     * @return [getindex]
     * @author fuquanen
     */
    public function getadd($param){
        try{
            $result=$this->allowField(true)->save($param);
            if(false === $result){            
                
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
               
                return ['code' => 1, 'data' => '', 'msg' => '添加成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
    //执行添加数据
    /**
     * @return [getindex]
     * @author fuquanen
     */
    public function getdel($id){
         try{
            $result=$this->where('expressId',$id)->delete();
            if(false === $result){            
                
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
               
                return ['code' => 1, 'data' => '', 'msg' => '删除成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
    //获取单条数据
    /**
     * @return [getindex]
     * @author fuquanen
     */
    public function getedit($id){
        return $this->where('expressId',$id)->find();
    }
    //执行修改操作
    /**
     * @return [getindex]
     * @author fuquanen
     */
    public function getupdate($param){
         try{
            $result=$this->allowField(true)->save($param,['expressId'=>$param['expressId']]);
            if(false === $result){            
                
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
               
                return ['code' => 1, 'data' => '', 'msg' => '修改成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
}

?>