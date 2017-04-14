<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class Node extends Model
{

    protected $name = "auth_rule";


    /**
     * [getNodeInfo 获取节点数据]
     * @author
     */
    public function getNodeInfo($id)
    {
        $result = $this->field('id,title,pid')->select();
        $str = "";
        $role = new UserType();
        $rule = $role->getRuleById($id);

        if(!empty($rule)){
            $rule = explode(',', $rule);
        }
        foreach($result as $key=>$vo){
            $str .= '{ "id": "' . $vo['id'] . '", "pId":"' . $vo['pid'] . '", "name":"' . $vo['title'].'"';

            if(!empty($rule) && in_array($vo['id'], $rule)){
                $str .= ' ,"checked":1';
            }

            $str .= '},';
        }

        return "[" . substr($str, 0, -1) . "]";
    }


    /**
     * [getMenu 根据节点数据获取对应的菜单]
     * @author
     */
    public function getMenu($nodeStr = '')
    {

        //超级管理员没有节点数组
        $where = empty($nodeStr) ? 'status = 1' : 'status = 1 and id in('.$nodeStr.')';
        $result = Db::name('auth_rule')->order('sort')->select();
        if(config('template')['theme_name'] == ""){
            $new_result=array();
            foreach($result as $k=>$v){
                $new_result[$k]['id']=$v['id'];
                $new_result[$k]['pid']=$v['pid'];
                $new_result[$k]['name']=$v['name'];
                $new_result[$k]['title']=$v['title'];
                $new_result[$k]['icon']=$v['css'];
                $new_result[$k]['spread']=false;
                // $new_result[$k]['href']=$v['href'];
            }
            $menu = getMenuList($new_result);
        }else{
            $menu = prepareMenu($result);
        }
        return $menu;
    }
    /**
     * [getDic 获取字典列表]
     * @author
     */
    public function getDic($nodeStr = '')
    {
        $result = Db::name('dictionaries')->where('IsDelete',0)->order('orderby asc')->select();
        if(config('template')['theme_name'] == ""){
            $new_result=array();
            foreach($result as $k=>$v){
                $new_result[$k]['id']=$v['id'];
                $new_result[$k]['pid']=(int)$v['parentID'];
                $new_result[$k]['title']=$v['name'];
                $new_result[$k]['name']='/index.php/admin/Dictionaries/getDicListByPage?id=' . $v['id'];
               // $new_result[$k]['icon']=$v['css'];
                $new_result[$k]['spread']=true;
            }
            $dic = getDicList($new_result);
        } 
        return $dic;
    }
    /**
     * [getCurrency 获取通用树列表]
     * @author
     */
    public function getCurrency($nodeStr = 0)
    {
        $result = Db::name('currency_tree')->where(['IsDelete'=>0,'parentID'=>$nodeStr])->select();
        //var_dump($result);exit;
        if(config('template')['theme_name'] == ""){
            $new_result=array();
            foreach($result as $k=>$v){
                $new_result[$k]['id']=$v['id'];
                $new_result[$k]['pId']=(int)$v['parentID'];
                $new_result[$k]['name']=$v['name'];
                $new_result[$k]['iconSkin']=$v['css'];
                $new_result[$k]['isParent']=self::isParent($v['id']);
                $new_result[$k]['url']='/index.php/admin/CurrencyTree/getCurrenyListByPage?id=' . $v['id'];
                $new_result[$k]['target'] = 'list_currency';
            }
        }
        return $new_result;
    }
    
    /**
     * [isParent 检查是否父节点]
     * @author
     */
    private function isParent($id){
        $result = Db::name("currency_tree")->where(["parentID"=>$id,"IsDelete"=>0])->count();
        return $result==0? false:true;
    }
}