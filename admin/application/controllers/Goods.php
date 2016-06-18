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
			echo "<script>alert('success'),location.href='".site_url('Goods/type_show')."'</script>";
		}else{
			echo "<script>alert('fail'),location.href='".site_url('Goods/type_add')."'</script>";
		}
	}
	
	//商品类型显示
	public function type_show(){
		$data['data'] = $this->db->get('type')->result_array();
		//print_r($data);exit;
		$this->load->view('Goods/type_show.html',$data);
	}
	
	//商品类型删除
	public function type_del(){
		$type_id = $this->input->get('id');
		$this->db->delete("type",array("type_id"=>$type_id));
		$data['data'] = $this->db->get('type')->result_array();
		$this->load->view('Goods/type_show.html',$data);
	}
	
	
	
}