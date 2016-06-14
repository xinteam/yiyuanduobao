<?php
namespace Home\Model;
use Think\Model;
	class UserModel extends Model {
		public function sel(){
		//查询user表中所有数据
		return $this->Table('user')->select();
	}
		//修改
		public function update(){
			$id = I('get.id');
			$name = I('get.val');
			//echo $name;die;
			$data['u_name'] = $name;
			//拼写sql语句
			return $this->Table('user')->where("u_id=$id")->save($data);
			//echo $this->getlastsql();
		}

	}
?>