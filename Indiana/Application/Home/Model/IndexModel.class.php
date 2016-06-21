<?php
	namespace Home\Model;
	use Think\Model;
	class IndexModel extends Model{
		protected $tableName='wi_user';
		
		//查询验证数据
	function cha($user_name,$user_pwd){
		//实例化表名
		$user=D($this->tableName);
		//print_r($admin);die;
		if($user->where("user_name='$user_name'")->select()){
			if($user->where("user_name='$user_name' and user_pwd ='$user_pwd'")->select()){
				return 1;
			}else{
				return 0;
			}
		}else{
			return 2;
		}
	}
}
?>