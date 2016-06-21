<?php
class Order extends CI_Controller {

    public function index(){
        @$status=$_GET['status'];
        if($status==0){
            $num=$this->db->query("select  COUNT(*) as num  from wi_order  ")->result_array();
        }else {
            $num = $this->db->query("select  COUNT(*) as num  from wi_order  where status_id='$status'  ")->result_array();
        }
        $num=$num[0]['num'];
        $per=10;
        $pages=ceil($num/$per);
        $page=isset($_GET['page'])?$_GET['page']:1;
        $limit=($page-1)*$per;

        if($status==0){
         $data['data']=$this->db->query("select * from wi_order inner join wi_user on wi_order.user_id=wi_user.user_id inner join wi_status on wi_order.status_id=wi_status.status_id limit $limit,$per ")->result_array();
        }else
        {
            $data['data']=$this->db->query("select * from wi_order inner join wi_user on wi_order.user_id=wi_user.user_id inner join wi_status on wi_order.status_id=wi_status.status_id where wi_status.status_id='$status' limit $limit,$per ")->result_array();
        }
        $str="";
        $fist=1;
        $befor=$page-1<=1?1:$page-1;
        $next=$page+1>$pages-1?$pages-1:$page+1;
        $last=$pages-1;
//        for($i=1;$i<$pages;$i++){
//            $str.="<a href='javascript:void(0)' onclick='pages($i)'>".$i."&nbsp;&nbsp;&nbsp;</a>";
//        }
        $str.="<a href='javascript:void(0)' onclick='pages($fist)'> 首页 </a>";
        $str.="<a href='javascript:void(0)' onclick='pages($befor)'> 上一页 </a>";
        $str.="<a href='javascript:void(0)' onclick='pages($next)'> 下一页 </a>";
        $str.="<a href='javascript:void(0)' onclick='pages($last)'> 尾页 </a>";
        $data['str']=$str;
        $data['status']=$status;
       $this->load->view('order/order_list.html',$data);

    }

    public function del(){
        $id=$_GET['id'] ;
         $this->db->delete('wi_order', array('order_id' => $id));
        $this->index();
    }
    public function sel(){
        $id=$_GET['id'];
        $data['data']=$this->db->query("select * from wi_order as w inner join wi_user as u  on w.user_id=u.user_id  inner join wi_pay as p  on w.send_mode=p.pay_id inner join wi_send as s on w.send_mode=s.send_id inner join wi_status as st on w.status_id=st.status_id where order_id=$id")->result_array();
        $this->load->view('order/mess.html',$data);
    }

    public function search(){
        $sear=isset($_GET['sear'])?$_GET['sear']:"";
        $start=isset($_GET['start'])?strtotime($_GET['start']):"";
        $end=isset($_GET['end'])?strtotime($_GET['end']):"";
        $status=$_GET['status'];
        if(empty($sear)&&empty($start)){
            $where=" where 1";
        }
        elseif(empty($sear)){
        $where="where O_down_time between $start and $end";
        }elseif(empty($start)){
            $where="where order_number like '%$sear%'";
        }else{
            $where="where order_number like '%$sear%' and O_down_time between $start and $end ";
        }
        if($status==0){
            $num= $this->db->query("select COUNT(*) as num from wi_order $where")->result_array();
        }else{
            $num= $this->db->query("select COUNT(*) as num from wi_order $where and status_id='$status'")->result_array();
        }
        $num=$num[0]['num'];
        $per=10;
        $pages=ceil($num/10);
        $page=isset($_GET['page'])?$_GET['page']:1;
        $limit=($page-1)*$per;

        if($status==0){
            $data['data']=$this->db->query("select * from wi_order inner join wi_user on wi_order.user_id=wi_user.user_id inner join wi_status on wi_order.status_id=wi_status.status_id $where  limit $limit,$per ")->result_array();
        }else {
            $data['data'] = $this->db->query("select * from wi_order inner join wi_user on wi_order.user_id=wi_user.user_id inner join wi_status on wi_order.status_id=wi_status.status_id $where  and wi_status.status_id='$status' limit $limit,$per ")->result_array();
        }
        $str="";
        $fist=1;
        $befor=$page-1<1?1:$page-1;
        $next=$page+1>$pages-1?$pages-1:$page+1;
        $last=$pages-1;
        $str.="<a href='javascript:void(0)' onclick='pagesear($fist)'> 首页 </a>";
        $str.="<a href='javascript:void(0)' onclick='pagesear($befor)'> 上一页 </a>";
        $str.="<a href='javascript:void(0)' onclick='pagesear($next)'> 下一页 </a>";
        $str.="<a href='javascript:void(0)' onclick='pagesear($last)'> 尾页 </a>";
        $data['str']=$str;
        $data['status']=$status;
        $this->load->view('order/order_list1.html',$data);
    }
}