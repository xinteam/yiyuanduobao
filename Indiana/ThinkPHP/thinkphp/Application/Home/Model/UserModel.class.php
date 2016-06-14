<?php
namespace Home\Model;
use Think\Model;
	class UserModel extends Model {
		//protected $tableName = 'u_r';
		//protected $tableName = 'role';
		//查询用户信息
		public function sel(){
			return $this->Table('user')->select();
		}


		//查询每个用户所拥有的权限
		public function role1(){
			return $this->Table('user')->join('u_r on u_r.u_id = user.u_id')->join('role on role.r_id = u_r.r_id')->select();
		}


		//查询每个用户所拥有的权限
		public function role(){
			//接收值
			$id = I('get.val');
			//echo $id;die;
			return $this->Table('u_r')->join('role on role.r_id = u_r.r_id')->where("u_id=$id")->select();
		}
	}
?>