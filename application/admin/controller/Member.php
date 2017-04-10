<?php
namespace app\admin\controller;
use app\admin\model\MemberModel;
use think\Controller;
use think\Db;
class Member extends Base
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
        $count = Db::name('user')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $user = new MemberModel();
        $lists = $user->getMembersByWhere($map, $Nowpage, $limits);
       // var_dump($lists);
        //exit;
        foreach($lists as $k=>$v)
        {
            $lists[$k]['last_login_time']=date('Y-m-d H:i:s',$v['last_login_time']);
        }
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
     * [getUserInfoByID 通过id获取指定会员信息]
     * @return [type] [description]
     * @author
     */
    public function getUserInfoByID(){
        $key = input('post.id');
        if(!is_numeric($key)){
            //echo "ds";
            return json(array('state'=>0));
        }
        $user = new MemberModel();
        $result = $user->getOneMembers($key);
        if($result == null){
          return json(array('state'=>0));  
        }else{
          return json(array('state'=>1,"data"=>$result));
        }
    }
    /**
     * [memberadd 添加会员]
     * @return [type] [description]
     * @author
     */
    public function memberadd(){
        if(request()->isAjax()){
            $param = input('post.');
            $param['password'] = md5(md5($param['password']) . config('auth_key'));
            $user = new MemberModel();
            if($param["type"] == 1){
                unset($param["type"]);
                $flag = $user->insertMembers($param);
            }else if($param["type"] == 2){
                unset($param["type"]);
                $flag = $user->editMembers($param);
            }
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $role = new UserType();
        $this->assign('role',$role->getRole());
        return $this->fetch();
    }
    /**
     * [UserDel 删除用户]
     * @return [type] [description]
     * @author
     */
    public function memberDel()
    {
        $id = input('param.id');
        $role = new MemberModel();
        $flag = $role->delMembers($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
    
    /**
     * [user_state 用户状态]
     * @return [type] [description]
     * @author
     */
    public function member_state()
    {
        $id = input('param.id');
        $status = Db::name('user')->where(array('id'=>$id))->value('status');//判断当前状态情况
        if($status==1)
        {
            $flag = Db::name('user')->where(array('id'=>$id))->setField(['status'=>0]);
            return json(['code' => 1, 'data' => $flag['data'], 'msg' => '已禁止']);
        }
        else
        {
            $flag = Db::name('user')->where(array('id'=>$id))->setField(['status'=>1]);
            return json(['code' => 0, 'data' => $flag['data'], 'msg' => '已开启']);
        }
    }
    
}

?>