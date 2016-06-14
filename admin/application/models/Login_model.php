<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }
    public function add_yan($data){
        return $this->db->insert('captcha',$data);
    }
    public function sel($u_name){
        return $this->db->where("u_name='$u_name'")->get('user')->row_array();
    }
}




?>