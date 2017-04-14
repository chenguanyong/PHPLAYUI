<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class SetupModel extends Model
{ 
     protected $name = 'config';
    // 查数据库中所有信息
    public function getindex(){
        return $this->select();
    }  
    //修改操作
    public function getupdate($param,$id){
        try{
            $result = $this->allowField(true)->save($param, ['id' => $id]);
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