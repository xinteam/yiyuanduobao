<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	
	//显示首页界面
    public function index(){
		$this->display('index');
	}
	
	
}