<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photo extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }
	
	//轮播添加页面
    public function index(){	
		$this->load->view('Photo/photo_add.html');		
    }
	
	//轮播图入库操作
	public function  photo_add(){
		
		$data['car_status'] = $this->input->post('car_status');
		//$info = $_FILES;
		$config['upload_path'] = 'yiyuanduobao/../../uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
	

		$this->load->library('upload', $config);

		if( ! $this->upload->do_upload('car_name'))
		{
			$error = array('error' => $this->upload->display_errors());exit;
			$this->load->view('Photo/photo_add.html', $error);
		} 
		else
		{
			$datas = array('upload_data' => $this->upload->data());
			//print_r($datas);exit;
			$data['car_name']="../../uploads/".$datas['upload_data']['file_name'];
			$arr=$this->db->insert('carousel',$data);
			if($arr){
				echo "<script>alert('success'),location.href='photo_list'</script>";
			}else{
				echo "<script>alert('fail'),location.href='photo_list'</script>";
			}
		}

		
	}
	
	//轮播图显示
	public function photo_list(){
		$sum=$this->db->count_all('carousel');
		$data['page_all']=ceil($sum/3);
		$page = isset($_GET['page'])?$_GET['page']:1;
		$limit=($page-1)*3;
		$data['news']=$this->db->query("select * from wi_carousel limit $limit,3")->result_array();
		$this->load->view('Photo/photo_show.html',$data);
	}
	
	//删除
	public function photo_del(){
		$car_id = $this->input->get('id');
		$this->db->delete("carousel",array("car_id"=>$car_id));
		$this->photo_list();
	}
	
	//状态是否显示
	public function photo_update(){
		$car_id = $this->input->get('id');
		$data=$this->db->query("select car_status from wi_carousel where car_id='$car_id' ")->result_array();
		if($data['0']['car_status']==1){
			$data['0']['car_status']=0;
		}else{
			$data['0']['car_status']=1;
		}
		$this->db->update("carousel",$data[0],array("car_id"=>$car_id));
		$this->photo_list();
	}
	
	
	
}