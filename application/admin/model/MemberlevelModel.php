<?php
namespace app\admin\model;

use think\Model;
class MemberlevelModel extends Model
{
    protected $name = 'user_leval';
    
    /**
     * 根据搜索条件获取用户等级列表信息
     */
    public function getMemberlevelByWhere($map, $Nowpage, $limits)
    {
        return $this
        ->where($map)->page($Nowpage, $limits)->order('id desc')->select();
    }
    
    /**
     * 根据搜索条件获取所有的用户等级数量
     * @param $where
     */
    public function getAllMemberlevel($where)
    {
        return $this->where($where)->count();
    }
    
    /**
     * 插入会员等级信息
     * @param $param
     */
    public function insertMemberlevel($param)
    {
        try{
            $result = $this->validate("UserlevalValidate")->save($param);
            if(false === $result){
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                //writelog(session('admin_uid'),session('admin_username'),'用户【'.$param['username'].'】添加成功',1);
                return ['code' => 1, 'data' => '', 'msg' => '添加用户等级成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
    
    /**
     * 编辑会员等级信息
     * @param $param
     */
    public function editMemberlevel($param)
    {
        try{
            $result =  $this->validate("UserlevalValidate")->save($param, ['id' => $param['id']]);
            if(false === $result){
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
               // writelog(session('admin_uid'),session('admin_username'),'用户【'.$param['username'].'】编辑成功',1);
                return ['code' => 1, 'data' => '', 'msg' => '编辑用户等级成功'];
            }
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
    
    
    /**
     * 根据id获取会员等级信息
     * @param $id
     */
    public function getOneMemberlevel($id)
    {
        return $this->where('id', $id)->find();
    }
    
    
    /**
     * 删除等级
     * @param $id
     */
    public function delMemberlevel($id)
    {
        try{
    
            $this->where('id', $id)->delete();
            return ['code' => 1, 'data' => '', 'msg' => '删除等级成功'];
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
}

?>