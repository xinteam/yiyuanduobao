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
	
	//生成验证码
	function verify(){
		$Verify = new \Think\Verify();
		$Verify->codeSet = '0123456789'; 
		$Verify->length   = 4;
		$Verify->entry(); //主要内容
    }
	
	//登陆进行判断
	function verify_pro($code){
		$verify = new \Think\Verify();
		if(!$verify->check($code, $id)){
			$this->error('验证码不正确');
		}else{
			$user_name=I('post.user_name');
			$user_pwd=I('post.user_pwd');
			//实例化控制器
			$Index = D('Index');
			//数组传到Model层
			$re = $Index->cha($user_name,$user_pwd);
			//echo $re;exit;
			switch($re){
				case 0:$this->error("密码不正确");die;
				case 1:$_SESSION['user_name']=$user_name;
					
					$this->success("登录成功",U('Index/index'),3);die;
				case 2:$this->error("账号不存在");die;
			}
		}
		
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
		$user_name = $_SESSION['user_name'];
		$this->assign('user_name',$user_name);
		$this->display('Index/index');
	}
	
	//首页商品详情页
	public function goods_info(){
		
		$this->display('Index/goods_info');
	}
	
	//商品详情页中的立即快购
	public function goods_cartlist(){
		
		$this->display('Index/member/cart/cartlist');
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