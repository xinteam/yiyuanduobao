<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	
	//注册
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
		$Verify->fontSize = 30;
		$Verify->fontttf = '4.ttf'; 
		$Verify->useNoise = false;
		$Verify->entry(); //主要内容
    }
	
	//注册进行判断
	public function zhu_ver($code){
		$verify = new \Think\Verify();
		if(!$verify->check($code, $id)){
			$this->error('验证码不正确');
		}else{
			$data['user_name'] = I('post.user_name');
			$data['user_pwd'] = I('post.userpassword');
			$user = D('wi_us    er');
			$re = $user->add($data);
			if($re){
				$this->success('注册成功',U('Index/login'),3);
			}else{
				$this->error('注册失败');
			}
		}
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
		//登陆用户
		$user_name = $_SESSION['user_name'];
		$this->assign('user_name',$user_name);
		//处理轮播图片
		$carousel = D('wi_carousel');
		$info = $carousel->where('car_status=1')->order('car_id desc')->limit(6)->select();
		$this->assign('info',$info);
		//最热商品展示
		$goods = D('wi_goods');
		$goods_hot = $goods->order('goods_people desc')->limit(5)->select();
        $goods_hot=$this->baifenbi($goods_hot);
		$this->assign('goods_hot',$goods_hot);
		//最新揭晓
		$type = D('wi_type');
		$g_type = $type->select();
		$this->assign('g_type',$g_type);
		//最新商品展示
		$goods_new = $goods->order('goods_id desc')->limit(5)->select();
        $goods_new=$this->baifenbi($goods_new);
		$this->assign('goods_new',$goods_new);
		//苹果专区
		$goods_apple = $goods->where('type_id=5')->order('goods_id desc')->limit(4)->select();
        $goods_apple=$this->baifenbi($goods_apple);
		$this->assign('goods_apple',$goods_apple);

		//手机数码专区
		$goods_tel = $goods->where('type_id=6')->order('goods_id desc')->limit(4)->select();
        $goods_tel=$this->baifenbi($goods_tel);
		$this->assign('goods_tel',$goods_tel);

		//代金卷类
		$goods_dai = $goods->where('type_id=4')->order('goods_id desc')->limit(4)->select();
        $goods_dai=$this->baifenbi($goods_dai);
		$this->assign('goods_dai',$goods_dai);

        //晒单
        $show = M('wi_show');
        $arr= $show->join('wi_user ON wi_show.user_id = wi_user.user_id')->where("show_status='1'")->select();
        //print_r($arr);die;
        $this->assign('show',$arr);

        $this->display('Index/index');
	}


    public function baifenbi($data){
        for($i=0;$i<count($data);$i++){

            $data[$i]['baifenbi']=number_format((($data[$i]['readly_people']/$data[$i]['goods_people'])*100 ), 2, '.', ''); ;
        }
        for($i=0;$i<count($data);$i++){
            $data[$i]['sheng']=($data[$i]['goods_people']-$data[$i]['readly_people']);
        }
        return $data;
    }
	
	//首页分类搜索功能
	public function goods_search(){
		$id = $_GET['id'];
		$type = D('wi_goods');
		$gg_type = $type->join('wi_type on wi_goods.type_id=wi_type.type_id')->where("wi_type.type_id='$id'")->order('goods_id desc')->select();

        $gg_type=$this->baifenbi($gg_type);
//        print_r($gg_type);die;
		$this->assign('gg_type',$gg_type);
		$this->display('Index/goods_search');
	}
	
	
	
	//首页商品详情页1
	public function goods_info(){
		$goods_id = isset($_GET['goods_id'])?$_GET['goods_id']:1;
		$goods = D('wi_goods');
		$g_info = $goods->where("goods_id='$goods_id'")->find();
		//print_r($g_info);exit;
		$this->assign('g_info',$g_info);
		
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
    $shai = M('wi_show');
    $shaidan = $shai->join('wi_user on wi_show.user_id=wi_user.user_id')->where("wi_show.show_status='1'")->order('wi_show.show_time desc')->limit(15)->select();
    //print_r($shaidan);exit;
    $this->assign('shaidan',$shaidan);
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