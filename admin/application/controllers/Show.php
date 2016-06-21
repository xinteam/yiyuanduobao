<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Show extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }
	
	//客户列表+搜索+分页
	public function show_list(){

		$user_name=isset($_GET['user_name'])?$_GET['user_name']:'';
		//echo $user_name;
		$page=isset($_GET['page'])?$_GET['page']:1;
		$counts=$this->db->join('user','show.user_id=user.user_id')->join('goods','show.goods_id=goods.goods_id')->like('user.user_name',$user_name)->count_all_results('show');
		//print_r($counts);
		$length='2';
		$pages=ceil($counts/$length);
		$prev=$page<=1?1:$page-1;
		$next=$page>=$pages?$pages:$page+1;
		//print_r($next);
		$offset=($page-1)*$length;
		$str='';
		$str.="<a href='javascript:void(0);' onclick='page(1)'>首页</a>　";
		$str.="<a href='javascript:void(0);' onclick='page({$prev})'>上一页</a>　";
		$str.="<a href='javascript:void(0);' onclick='page({$next})'>下一页</a>　　";
		$str.="<a href='javascript:void(0);' onclick='page({$pages})'>末页</a>";
		$data['show']=$this->db->join('user','show.user_id=user.user_id')->join('goods','show.goods_id=goods.goods_id')->like('user.user_name',$user_name)->limit($length,$offset)->get('show')->result_array();
		$data['str']=$str;
		$data['user_name']=$user_name;
		$this->load->view('Show/show_list.html',$data);

	}
	//评论删除
	public function show_delete(){
		$show_id=$this->uri->segment(3);
		$data=$this->db->delete('show', array('show_id' => $show_id)); 
		//var_dump($data);die;
		if($data){
			$this->show_list();
		}else{
			$this->show_list();
		}
	}
	//审核
	public function show_st(){
		$show_id=$this->uri->segment(3);
		//echo $show_status;
		$data = array(
               'show_status' =>1
            );

		$arr=$this->db->where('show_id', $show_id)->update('show', $data);
		//var_dump($data);die;
		if($arr){
			$this->show_list();
		}else{
			$this->show_list();
		}
	}
	
}