<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function sel(){
		//实例化model
		$user = D('User');
		//调用user层中的方法
		$arr = $user->sel();
		//print_r($arr);die;
		//发送数据到视图层
		$this->assign('arr',$arr);
		//调用模板
		$this->display();
	}
	//修改
	public function update(){
		//实例化model
		$user = D('User');
		echo $suer->update();die;
		if($user->update()){
			echo true;
		}else{
			echo false;
		}
	}
}