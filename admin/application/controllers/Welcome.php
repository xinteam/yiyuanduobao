<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('captcha');
        $this->load->helper('url');
        $this->load->library('session');
    }


    public function index()
    {
		//验证码
		$vals = array(
		'img_path' => './captcha/',
		'img_url' => base_url('captcha'),
		'word_length'   => 4,
		'pool'      => '0123456789',
		);

		$cap = create_captcha($vals);
		
		$data = array(
			'captcha_time' => $cap['time'],
			'ip_address' => $this->input->ip_address(),
			'word' => $cap['word']
			);
		$cap = create_captcha($vals);
		//print_r($cap);die;
		$this->session->set_userdata("word",$cap['word']);
        $this->load->view('login.html',$cap);
    }
	
    public function login_pro(){

       //用户密码验证
		$user_name=$this->input->post('admin_name');
		$user_pwd=$this->input->post('admin_pwd');
		$captcha=$this->input->post('captcha');
		$cap=$this->session->userdata('word');

		$this->db->where('admin_name',$user_name);
		$this->db->where('admin_pwd',$user_pwd);
		$this->db->select();

		$data=$this->db->get('admin')->row_array();
		//print_r($data);die;
		//$id有值就登陆成功，否则登陆失败
		$id=$data['admin_id'];
		if($id){
			if($cap!=$captcha){
				//验证码错误
				echo 5;
			}else{
				$this->session->set_userdata("admin_name",$user_name);
				//登陆成功
				echo 2;
			}
			
		}else{
			$this->db->where('admin_name',$user_name);
			$this->db->select();
			$datas=$this->db->get('admin')->row_array();
			$rid=$datas['admin_name'];
			if($rid){
				//密码错误
				echo 1;
			}else{
				//用户名错误
				echo 0;
			}
			
		}	

    }

    public function inde()
    {
        $this->load->view('inde.html');
    }
    public function top()
    {
		$name['admin_name']=$this->session->userdata('admin_name');
        $this->load->view('top.html',$name);
    }
    public function left()
    {
        $this->load->view('left.html');
    }
    public function main()
    {
        $this->load->view('main.html');
    }

}
