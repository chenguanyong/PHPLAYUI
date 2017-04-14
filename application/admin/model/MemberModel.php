<?php
namespace app\admin\model;

use think\Model;
class MemberModel extends Model
{
   protected $name = 'user';
    /**
     * 根据搜索条件获取用户列表信息
     */
    public function getMembersByWhere($map, $Nowpage, $limits)
    {
        return $this->field('xx_user.*,leval_name')->join('xx_user_leval', 'xx_user.leval_id = xx_user_leval.id ')
            ->where($map)->page($Nowpage, $limits)->order('id desc')->select();
    }

    /**
     * 根据搜索条件获取所有的用户数量
     * @param $where
     */
    public function getAllMembers($where)
    {
        return $this->join('xx_user_leval', 'xx_user.leval_id = xx_user_leval.id ')->where($where)->count();
    }

    /**
     * 插入管理员信息
     * @param $param
     */
    public function insertMembers($param)
    {
        try{
            $result = $this->validate('MemberValidate')->save($param);
            if(false === $result){            
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                writelog(session('admin_uid'),session('admin_username'),'用户【'.$param['username'].'】添加成功',1);
                return ['code' => 1, 'data' => '', 'msg' => '添加用户成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 编辑管理员信息
     * @param $param
     */
    public function editMembers($param)
    {
        try{
            $result =  $this->validate('MemberValidate')->save($param, ['id' => $param['id']]);
            if(false === $result){            
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                writelog(session('admin_uid'),session('admin_username'),'用户【'.$param['username'].'】编辑成功',1);
                return ['code' => 1, 'data' => '', 'msg' => '编辑用户成功'];
            }
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
    /**
     * 根据管理员id获取角色信息
     * @param $id
     */
    public function getOneMembers($id)
    {
        return $this->where('id', $id)->find();
    }
    /**
     * 删除管理员
     * @param $id
     */
    public function delMembers($id)
    {
        try{
            $this->where('id', $id)->delete();
            writelog(session('admin_uid'),session('username'),'用户【'.session('admin_username').'】删除管理员成功(ID='.$id.')',1);
            return ['code' => 1, 'data' => '', 'msg' => '删除管理员成功'];
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
    
}

?>