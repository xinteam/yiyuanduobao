<?php
namespace Home\Controller;
use Think\Controller;
	class RbacController extends Controller {
		public function index(){
			//调用model层
			$user = D('User');
			//调用model方法
			$arr = $user->role();
			//发送数据
			$this->assign('arr',$arr);
			//显示视图
			$this->display();
		}
		//调用model层中的sel方法
		public function sel(){
			//实例化model
			$user = D('User');
			//调用sel方法
			$arr = $user->sel();
			//print_r($arr);die;
			//发送数据
			$this->assign('info',$arr);
			//显示视图
			$this->display('index');
		}

		//查询单个用户的权限
		public function role(){
			//实例化model
			$role = D('User');
			//调用role方法
			$arr = $role->role();
			//发送数据
			$this->assign('info',$arr);
			//显示页面
			$this->display();
		}
	}
?>