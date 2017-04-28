<?php
namespace app\member\model;
use think\Db;
use think\Model;
class UseraddressModel extends Model
{
    protected $name="user_address";
    //获取地址列表
     public function addressindex(){
        return $this->paginate(5);
    } 
    public function index(){
        return $this->count();
    }
    public function addressdel($id){
        try{
            $result=$this->where('addressId',$id)->delete();
            if(false === $result){            
                
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
               
                return ['code' => 1, 'data' => '', 'msg' => '删除成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    } 
    public function csjls($parentId){
        return Db::table('xx_areas')->where('parentId',$parentId)->select();
    }
    public function csjlss($parentId){
        return Db::table('xx_areas')->where('parentId',$parentId)->select();
    }
    public function end($parentId){
        return Db::table('xx_areas')->where('parentId',$parentId)->select();
    }
    public function csjl($id){
    	return Db::table('xx_areas')->where('parentId',$id)->select();
    }
    public function add($param){
        try{
            $result = $this->allowField(true)->save($param);
            if(false === $result){            
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '添加用户成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
    //获取单条数据
    public function find($id){
            return  $this->where('addressId',$id)->find();
            
    }
    //修改操作
    public function edit($param){
        try{
            $result = $this->allowField(true)->save($param,$param['addressId']);
            if(false === $result){            
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '修改成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
    //通过获取单条数据查询地址
    public function getaddress($id){
        return Db::table('xx_areas')->find($id);
    }
}

?>