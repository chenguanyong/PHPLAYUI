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
     * [index 首页]
     * @return [type] [description]
     * @author
     */
    public function getAllCurreny(){
        $dic = $this->select();
        return $dic;
    }
    //返回所有字典指定字典
    /**
     * [index 首页]
     * @return [type] [description]
     * @author
     */
    public function getCurrenyByParent($id,$limit,$start){
        $start = ($start-1)*$limit;
        $dic = $this->where(['parentID'=>$id,'IsDelete'=>0])->order('orderby asc')->limit($start,$limit)
        ->select();
        return $dic;
    }
    //删除字典
    /**
     * [index 首页]
     * @return [type] [description]
     * @author
     */
    public function deleCurrency($data){
    
        $result = $this->save(['IsDelete'=>'1'],['id'=>$data]);
        return $result;
    }
    /**
     * [index 首页]
     * @return [type] [description]
     * @author
     */
    public function getAllCurrenySize($parentID){
        $count = $this->where(['parentID'=>$parentID,'IsDelete'=>0])->count();
        return $count;
    }
    //添加节点
    /**
     * [index 首页]
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
    //更新字典
    /**
     * [index 首页]
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
    // 根据树id获取部分树数据
    /**
     * [index 首页]
     * @return [type] [description]
     * @author
     */
    public function getbufenTree($id){
        $result = $this->where(["parentID"=>$id,"IsDelete"=>0])->select();
        return $result;
    }
    // 根据树id获取单个树数据
    /**
     * [index 首页]
     * @return [type] [description]
     * @author
     */
    public function getTreebyID($id){
        $result = $this->where(["id"=>$id,"IsDelete"=>0])->select();
        return $result;
    }

    
}

?>