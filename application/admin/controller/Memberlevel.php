<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\MemberlevelModel;
use think\Db;
class Memberlevel extends Base
{
    /**
     * [index 首页]
     * @return [type] [description]
     * @author
     */
   public function index(){
        $key = input('key');
        $map = [];
        if($key&&$key!=="")
        {
            $map['username'] = ['like',"%" . $key . "%"];
        }
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = 10;// 获取总条数
        $count = Db::name('user_leval')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $user = new MemberlevelModel();
        $lists = $user->getMemberlevelByWhere($map, $Nowpage, $limits);
        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('count',$count);
        $this->assign('val', $key);
        if(input('get.page'))
        {
            return json($lists);
        }
        return $this->fetch();
    }
    
    /**
     * [getMemberlevelInfoByID 通过id获取指定会员信息]
     * @return [type] [description]
     * @author
     */
    public function getMemberlevelInfoByID(){
        $key = input('post.id');
        if(!is_numeric($key)){
            //echo "ds";
            return json(array('state'=>0));
        }
        $user = new MemberlevelModel();
        $result = $user->getOneMemberlevel($key);
        if($result == null){
            
          return json(array('state'=>0));  
        }else{
            
          return json(array('state'=>1,"data"=>$result));
        }
    }
    /**
     * [Memberleveladd 添加会员等级]
     * @return [type] [description]
     * @author
     */
    public function Memberleveladd(){
        
        if(request()->isAjax()){
        
            $param = input('post.');
            $param['status'] = $param['status'] == "on"?1:0;
            $user = new MemberlevelModel();
            if($param["type"] == 1){
                unset($param["type"]);
                $flag = $user->insertMemberlevel($param);
            }else if($param["type"] == 2){
                unset($param["type"]);
                $flag = $user->editMemberlevel($param);
            }
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        

        return $this->fetch("index");
    }
    /**
     * [MemberlevelDel 删除用户]
     * @return [type] [description]
     * @author
     */
    public function MemberlevelDel()
    {
        $id = input('param.id');
        $role = new MemberlevelModel();
        $flag = $role->delMemberlevel($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
    
    /**
     * [Memberlevel_state 会员等级状态]
     * @return [type] [description]
     * @author
     */
    public function Memberlevel_state()
    {
        $id = input('param.id');
        $status = Db::name('user_leval')->where(array('id'=>$id))->value('status');//判断当前状态情况
        if($status==1)
        {
            $flag = Db::name('user_leval')->where(array('id'=>$id))->setField(['status'=>0]);
            return json(['code' => 1, 'data' => $flag['data'], 'msg' => '已禁止']);
        }
        else
        {
            $flag = Db::name('user_leval')->where(array('id'=>$id))->setField(['status'=>1]);
            return json(['code' => 0, 'data' => $flag['data'], 'msg' => '已开启']);
        }
    }
    /**
     * [Memberlevel_state 会员等级状态]
     * @return [type] [description]
     * @author
     */
    public function pageAddMember(){
        $id = input("post.id");
        $mem = new MemberlevelModel();
        $result = $mem->getOneMemberlevel($id);
        if($result == null){
            $this->assign("Member",array("leval_name"=>"","leval_points"=>"","status"=>1));
        }
        else{
            $this->assign("Member",$result);
        }
        return $this->fetch("addMemberlevel");
    }
}

?>