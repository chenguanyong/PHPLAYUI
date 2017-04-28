<?php

namespace app\member\model;
use think\Model;

class Node extends Model
{

    protected $name = "users";

    /**
     * [getCurrency 获取通用树列表]
     * @author
     */
    public function getCurrency($parentid)
    {
        $result = $this->where(['dataFlag'=>1, 'parentId'=>$parentid])->select();
        //var_dump($result);exit;

        $new_result=array();
        foreach($result as $k=>$v){
            $new_result[$k]['id']=$v['userId'];
            $new_result[$k]['pid']=(int)$v['parentId'];
            $new_result[$k]['name']=$v['loginName'];
            $new_result[$k]['isParent'] = self::isParent($v['userId']);
        }
        return $new_result;
    }

        /**
     * [getCurrencyById 获取通用树第一层]
     * @author
     */
    public function getCurrencyById($userId)
    {
        $result = $this->where(['userId' => $userId,'dataFlag' => 1])->select();

        $new_result=array();
        foreach($result as $v){
            $new_result[0]['id']=$v['userId'];
            $new_result[0]['pid']=(int)$v['parentId'];
            $new_result[0]['name']=$v['loginName'];
            $new_result[0]['isParent'] = self::isParent($v['userId']);
        }
        return $new_result;
    }
    
    /**
     * [isParent 检查是否父节点]
     * @author
     */
    private function isParent($parentid){
        $result = $this->where(['dataFlag'=>1,'parentId'=>$parentid])->count();
        return $result==0? false:true;
    }
}