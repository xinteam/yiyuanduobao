<?php
namespace Home\Model;
use Think\Model;
class ShowModel extends Model {
	//查询
	public function sel(){
		$arr = $this->Table('show')->select();
		return $arr;
	}
    public function car(){
        return $this->query("select * from wi_goods");
    }
}
?>