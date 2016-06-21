<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }

	//商品添加页面
    public function index(){	
		$this->load->view('Goods/goods_add.html');		
    }

	//商品类型添加页面
	public function  type_add(){
		$this->load->view('Goods/type_add.html');
	}

	//商品类型添加入库
	public function type_list(){
		$data['type_name'] = $this->input->post('type_name');
		$arr = $this->db->insert('type',$data);
		if($arr){

		}
	}



}