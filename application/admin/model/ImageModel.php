<?php
namespace app\admin\model;

use think\Model;
use app\admin\model\CurrencyTreeModel;
class ImageModel extends Model
{
    protected $ImageRootNode = 2;
    protected $table = 'xx_image';
    protected $pk ='id';
    public function initialize(){
    
        parent::initialize();
    }
    
    //返回所有图片
    public function getAllImage(){
    
        $dic = $this->select();
    
        return $dic;
    }
    //返回所有指定父id的图片
    public function getImageByParent($id,$limit,$start){
        $start = ($start-1)*$limit;
        $dic = $this->where(['nodeID'=>$id,'IsDelete'=>0])->limit($start,$limit)
        ->select();
        return $dic;
    }
    //添加图片
    public function addImage($data){
        //$dic = $this->where(["name"=>$data['name']])
       // ->find();
       // if($dic != null){
    
         //   return null;
       // }
       
        //var_dump($data);
        $result = $this->save($data);
        return $result;
    }
    //更新图片
    public function updateImagetion($data,$id){
        $dic = $this->where(["bianma"=>$data['bianma'],"parentID"=>$data['parentID']])
        ->find();
        if($dic != null){
    
            if($dic->getdata()['bz'] != trim($data['bz'])){
    
                $result = $this->save($data,['id'=>$id]);
                return $result;
    
            }else{return null;}
        }
        $result = $this->save($data,['id'=>$id]);
        return $result;
    
    }
    //删除图片
    public function deleImagetion($data){
        $image = $this->get(["id"=>$data]);
        if($image == null){
            
            return null;
        }else{
            
            unlink(ROOT_PATH . $image['path']);
            
        }
        $result = $this->save(['IsDelete'=>'1'],['id'=>$data]);
        return $result;
    
    }
    //获取指点父id的字节的数量
    public function getAllImageSize($parentID){
    
        $count = $this->where(['nodeID'=>$parentID,'IsDelete'=>0])->count();
        return $count;
    }
    //获取所有的图片选项
    public function getImageParent(){
    
        $reault = $this->where(['parentID'=>0,'IsDelete'=>0])->select();
        //$data =array();
        foreach ($reault as $key => &$value){
    
            $value['pid'] = $value['parentID'];
            $value['title'] = $value['name'];
        }
        return $reault;
    }
    //
    public function getImagetree($id=0){
        if($id == 0){
            
            $id = $this->ImageRootNode;
        }
        $Currency = new CurrencyTreeModel();
        $result = $Currency->getbufenTree($id);
        return $result;
    }
    public function initTree($id=0){
        if($id == 0){
    
            $id = $this->ImageRootNode;
        }
        $Currency = new CurrencyTreeModel();
        $result = $Currency->getTreebyID($id);
        return $result;
    }
}

?>