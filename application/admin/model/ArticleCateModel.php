<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class ArticleCateModel extends Model
{
    protected $name = 'article_cate';
    
    // 开启自动写入时间戳
    protected $autoWriteTimestamp = true;


    /**
     * [getAllCate 获取全部分类]
     * @author
     */
    public function getAllCate()
    {
        $cate_list=$this->where('pid',0)->order('id asc')->select();
        foreach($cate_list as $k=>$v){

            $cate_list[$k]['cate_sub_list']=$this->where('pid',$v['id'])->order('id asc')->select();
            
        }
        return $cate_list;
    }


    /**
     * [insertCate 添加分类]
     * @author
     */
    public function insertCate($param)
    {
        try{
            $result = $this->save($param);
            if(false === $result){     
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '分类添加成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }



    /**
     * [editMenu 编辑分类]
     * @author
     */
    public function editCate($param)
    {
        try{
            $result = $this->save($param, ['id' => $param['id']]);
            if(false === $result){          
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '分类编辑成功'];
            }
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }



    /**
     * [getOneMenu 根据分类id获取一条信息]
     * @return [type] [description]
     * @author
     */
    public function getOneCate($id)
    {
        return $this->where('id', $id)->find();
    }



    /**
     * [delMenu 删除分类]
     * @return [type] [description]
     * @author
     */
    public function delCate($id)
    {
        try{
            $this->where('id', $id)->delete();
            return ['code' => 1, 'data' => '', 'msg' => '删除分类成功'];
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

}