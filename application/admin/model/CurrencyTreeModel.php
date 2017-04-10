<?php
namespace app\admin\model;
use think\Model;
class CurrencyTreeModel extends Model
{
    protected $table = 'xx_currency_tree';
    protected $pk ='id';
    public function initialize(){
    
        parent::initialize();
    }
    //返回所有字典
    /**
     * [getAllCurreny 获取所有节点]
     * @return [type] [description]
     * @author
     */
    public function getAllCurreny(){
        $dic = $this->select();
        return $dic;
    }
    /**
     * [getCurrenyByParent 返回所有字典指定字典]
     * @return [type] [description]
     * @author
     */
    public function getCurrenyByParent($id,$limit,$start){
        $start = ($start-1)*$limit;
        $dic = $this->where(['parentID'=>$id,'IsDelete'=>0])->order('orderby asc')->limit($start,$limit)
        ->select();
        return $dic;
    }
    /**
     * [deleCurrency 删除字典]
     * @return [type] [description]
     * @author
     */
    public function deleCurrency($data){
    
        $result = $this->save(['IsDelete'=>'1'],['id'=>$data]);
        return $result;
    }
    /**
     * [getAllCurrenySize 获取节点数量]
     * @return [type] [description]
     * @author
     */
    public function getAllCurrenySize($parentID){
        $count = $this->where(['parentID'=>$parentID,'IsDelete'=>0])->count();
        return $count;
    }
    /**
     * [addCurrency 添加通用节点]
     * @return [type] [description]
     * @author
     */
    public function addCurrency($data){
        $dic = $this->where(["name"=>$data['name'],"parentID"=>$data['parentID']])
        ->find();
        if($dic != null){
            return null;
        }
        $result = $this->validate("CurrencytreeValidate")->save($data);
        return $result;
    }
    /**
     * [updateCurrency 更新字典]
     * @return [type] [description]
     * @author
     */
    public function updateCurrency($data,$id){
        $dic = $this->where(["name"=>$data['name'],"parentID"=>$data['parentID']])
        ->find();
        if($dic != null){
            if($dic->getdata()['css'] != trim($data['css'])){
                $result = $this->validate("CurrencytreeValidate")->save($data,['id'=>$id]);
                return $result;
            }else{return null;}
        }
        $result = $this->validate("CurrencytreeValidate")->save($data,['id'=>$id]);
        return $result;
    }
    /**
     * [getbufenTree 根据树id获取部分树数据]
     * @return [type] [description]
     * @author
     */
    public function getbufenTree($id){
        $result = $this->where(["parentID"=>$id,"IsDelete"=>0])->select();
        return $result;
    }
    /**
     * [getTreebyID 根据树id获取单个树数据]
     * @return [type] [description]
     * @author
     */
    public function getTreebyID($id){
        $result = $this->where(["id"=>$id,"IsDelete"=>0])->select();
        return $result;
    }

    
}

?>