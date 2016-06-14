<?php
namespace Home\Controller;
use Think\Controller;
class RoleController extends Controller {
    public function index(){
		//实例化model
		$user = D('User');
		//数据
		$arr = $user->sel();
		//print_r($arr);die;
		//获取user表中的数据
		$arr_user = $arr[0];
		//print_r($arr_user);
		/*$str='';
		foreach($arr_user as $key=>$val){
			$str = $str.$val['r_id'];
		}*/
		//echo '123';
		for($i=0;$i<count($arr_user);$i++){
			$aa[]  = $arr_user[$i]['r_id'];
		}
		for($i=0;$i<count($aa);$i++){
			$a[] = explode(',',$aa[$i]);
			//echo explode(',',$aa);
		}
		//print_r($aa);die;
		//print_r($arr_user);die;
		//获取role表中的数据
		$arr_role = $arr[1];
		//print_r($arr_role);die;
		//发送数据
		$this->assign('arr_user',$arr_user);
		$this->assign('arr_role',$arr_role);
		$this->assign('aa',$a);
		//显示页面
		$this->display();
	}
}