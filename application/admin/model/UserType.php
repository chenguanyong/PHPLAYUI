<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class UserType extends Model
{
    protected  $name = 'auth_group';

    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = true;

    /**
     * [getRoleByWhere 根据条件获取角色列表信息]
     * @author
     */
    public function getRoleByWhere($map, $Nowpage, $limits)
    {
        return $this->where($map)->page($Nowpage, $limits)->order('id desc')->select();
    }



    /**
     * [getRoleByWhere 根据条件获取所有的角色数量]
     * @author
     */
    public function getAllRole($where)
    {
        return $this->where($where)->count();
    }



    /**
     * [insertRole 插入角色信息]
     * @author
     */    
    public function insertRole($param)
    {
        try{
            $result =  $this->validate('RoleValidate')->save($param);
            if(false === $result){               
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '添加角色成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }



    /**
     * [editRole 编辑角色信息]
     * @author
     */  
    public function editRole($param)
    {
        try{
            $result =  $this->validate('RoleValidate')->save($param, ['id' => $param['id']]);
            if(false === $result){
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '编辑角色成功'];
            }
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }



    /**
     * [getOneRole 根据角色id获取角色信息]
     * @author
     */ 
    public function getOneRole($id)
    {
        return $this->where('id', $id)->find();
    }



    /**
     * [delRole 删除角色]
     * @author
     */ 
    public function delRole($id)
    {
        try{
            $this->where('id', $id)->delete();
            return ['code' => 1, 'data' => '', 'msg' => '删除角色成功'];
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }



    /**
     * [getRole 获取所有的角色信息]
     * @author
     */ 
    public function getRole()
    {
        return $this->select();
    }


    /**
     * [getRole 获取角色的权限节点]
     * @author
     */ 
    public function getRuleById($id)
    {
        $res = $this->field('rules')->where('id', $id)->find();
        return $res['rules'];
    }


    /**
     * [editAccess 分配权限]
     * @author
     */ 
    public function editAccess($param)
    {
        try{
            $this->save($param, ['id' => $param['id']]);
            return ['code' => 1, 'data' => '', 'msg' => '分配权限成功'];

        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }



    /**
     * [getRoleInfo 获取角色信息]
     * @author
     */ 
    public function getRoleInfo($id){

        $result = Db::name('auth_group')->where('id', $id)->find();
        if(empty($result['rules'])){
            $where = '';
        }else{
            $where = 'id in('.$result['rules'].')';
        }
        $res = Db::name('auth_rule')->field('name')->where($where)->select();

        foreach($res as $key=>$vo){
            if('#' != $vo['name']){
                $result['name'][] = $vo['name'];
            }
        }

        return $result;
    }
}