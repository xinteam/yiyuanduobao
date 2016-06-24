<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	//贾建陆也面
	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }
	
	//用户添加页面
    public function index(){
        $query['arr']=$this->db->query("select * from wi_type")->result_array();
        $query['re']=$this->db->query("select * from wi_price")->result_array();
        //print_r($query);die;
		$this->load->view('User/cat_add.html',$query);
    }
    public function g_add(){
        $data["goods_name"]=$_POST['goods_name'];
        $data["goods_price"]=$_POST['goods_price'];
        $data["type_id"]=$_POST['type_name'];
        $data["goods_desc"]=$_POST['goods_desc'];
        $data["goods_status"]=$_POST['goods_status'];
        $data["price_id"]=$_POST['price_name'];
        $data["goods_want"]=0;
        $data["goods_time"]=date('Y-m-d H:i:s',time());
        //$data["goods_people"]=$_POST['goods_people'];
        //$info = $_FILES;
        if($data["price_id"]=='1'){
            $data["goods_people"]=$data["goods_price"];
        }else if($data["price_id"]=='2'){
            $data["goods_people"]=$data["goods_price"]/10;
        }else if($data["price_id"]=='3'){
            $data["goods_people"]=$data["goods_price"]/100;
        }else{
            $data["goods_people"]="";
        }
        //print_r($data);die;
        $config['upload_path'] = 'yiyuanduobao/../../uploads/goods/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('goods_img'))
        {
            $error = array('error' => $this->upload->display_errors());exit;
            $this->load->view('User/index', $error);
        }
        else
        {
            $datas = array('upload_data' => $this->upload->data());
            //print_r($datas);exit;
            $data['goods_img']="../../uploads/goods/".$datas['upload_data']['file_name'];
            //print_r($data);die;
            $arr=$this->db->insert('wi_goods',$data);
            if($arr){
                echo "<script>alert('成功'),location.href='user_list'</script>";
            }else{
                echo "<script>alert('失败'),location.href='index'</script>";
            }
        }
    }
    //商品列表
    public function user_list(){
        //@$type_id=trim($_GET['type_id']);
        //$type_id=isset($type_id)?$type_id:'';
        //print_r($type_id) ;die;
        $type_id=isset($_GET['type_id'])?$_GET['type_id']:'';
        $goods_name=isset($_GET['goods_name'])?$_GET['goods_name']:'';
        $page=isset($_GET['page'])?$_GET['page']:1;
        $counts=$this->db->join('type','goods.type_id=type.type_id')->join('price','goods.price_id=price.price_id')->like('type.type_id',$type_id)->like('goods.goods_name',$goods_name)->count_all_results('goods');
        $length='3';
        $pages=ceil($counts/$length);
        //echo $pages;
        $prev=$page<=1?1:$page-1;
        $next=$page>=$pages?$pages:$page+1;
        //print_r($prev);
        $offset=($page-1)*$length;
        $str='';
        $str.="<a href='javascript:void(0);' onclick='page(1)'>首页</a>　";
        $str.="<a href='javascript:void(0);' onclick='page({$prev})'>上一页</a>　";
        $str.="<a href='javascript:void(0);' onclick='page({$next})'>下一页</a>　　";
        $str.="<a href='javascript:void(0);' onclick='page({$pages})'>末页</a>";
        $query['arr']=$this->db->join('type','goods.type_id=type.type_id')->join('price','goods.price_id=price.price_id')->like('type.type_id',$type_id)->like('goods.goods_name',$goods_name)->limit($length,$offset)->get('goods')->result_array();
        // $sql=$this->db->last_query();
        // print_r($sql);die;
        $query['str']=$str;
        $query['goods_name']=$goods_name;
        $query['type_id']=$type_id;
        $query['type']=$this->db->query("select * from wi_type")->result_array();
        //print_r($query);
        //$query['arr']=$this->db->query("select * from wi_goods inner JOIN wi_type on  wi_goods.type_id=wi_type.type_id INNER JOIN wi_price on wi_goods.price_id=wi_price.price_id order by goods_id desc;")->result_array();
        //$query['arr']=$this->db->query("select * from wi_type")->result_array();
        //print_r($query);die;
        $this->load->view('user/cat_manage.html',$query);
        
        
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
	//删除
    public function user_delete(){
        $goods_id=$this->uri->segment(3);
        //echo $goods_id;
        $data=$this->db->delete('goods', array('goods_id' => $goods_id)); 
        //var_dump($data);die;
        if($data){
            $this->user_list();
        }else{
            $this->user_list();
        }
    }
}