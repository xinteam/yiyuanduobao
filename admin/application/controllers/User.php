<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }
	
	//用户添加页面
    public function index(){	
		$this->load->view('User/user_add.html');		
    }
	
	//处理接受表单的值
	public function user_add(){
		$name=$this->input->post("name");
		$pwd=$this->input->post("pwd");
		//print_r($name);
		$this->db->where("user",$name);
		$arr=$this->db->get("q_user")->row_array();
		//print_r($arr['user']);
		if($arr['user']==$name){
			$this->load->view("home/upda.html");
		}else{
			echo "<script>alert('用户名不存在，请重新输入'),location.href='".site_url('wanji/index')."'</script>";
		}
	}
	
}