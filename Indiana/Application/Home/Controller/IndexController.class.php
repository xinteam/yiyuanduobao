<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	
	//登陆
	public function zhuce(){
		$this->display('Index/register');
	}
	
	//登陆
	public function login(){
		$this->display('Index/Login/login');
	}
	
	//我的快购中的快购记录
	public function userbuylist(){
		$this->display('Index/member/home/userbuylist');
	}
	
	//常见问题
	public function help(){
		$this->display('Index/help/1');
	}
	
	//显示首页界面
    public function index(){
		$this->display('Index/index');
	}
	
	//新手指南
	public function newbie(){
		$this->display('Index/single/newbie');
	}
	
	//最新揭晓
	public function goods_lottery(){
		$this->display('Index/goods_lottery/index');
	}
	
	//晒单分享
	public function shaidan(){
		$this->display('Index/shaidan/index');
	}
	
	//心愿单
	public function wish(){
		$this->display('Index/wish/index');
	}
	
	//购物车
	public function cart(){
		$this->display('Index/member/cart/cartlist');
	}
	
	
}