<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }
	
	//客户列表
	public function users_list(){
		$user=$this->db->get('user')->result_array();
		//print_r($data);die;
		$data['user']=$user;
		$this->load->view('Users/users_list.html',$data);
	}
	//客户删除
	public function users_delete(){
		$user_id=$this->uri->segment(3);
		$data=$this->db->delete('user', array('user_id' => $user_id)); 
		//var_dump($data);die;
		if($data){
			$this->users_list();
		}else{
			$this->users_list();
		}
	}
	
}