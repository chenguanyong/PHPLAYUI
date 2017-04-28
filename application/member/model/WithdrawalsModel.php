<?php
namespace app\member\model;
use think\Db;
use think\Model;
class WithdrawalsModel extends Model
{
    protected $name="Withdrawals";
    //返回所有数据
    /**
     * @return [getindex]
     * @author fuquanen
     */
    public function getindex(){
        return $this->where('status',1)->select();
    }
    //执行数据添加操作
    /**
     * @return [getadd]
     * @author 
     */
    public function getadd($param){
        try{
            $result = $this->allowField(true)->save($param);
            if(false === $result){            
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '添加成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
    //执行数据删除操作
    /**
     * @return [getdel]
     * @author fuquanen
     */
    public function getdel($id){
         try{
            $result = $this->save(['status'=>'0'],['id'=>$id]);
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
     * @return [getedit]
     * @author fuquanen
     */
    public function getedit($id){
        return $this->where('id',$id)->find();
    }
    //执行修改操作
    /**
     * @return [getupdate]
     * @author fuquanen
     */
   public function getupdate($param){
        try{
            $result = $this->allowField(true)->save($param,['id'=>$param['id']]);
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