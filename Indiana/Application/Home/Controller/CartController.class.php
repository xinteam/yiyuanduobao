<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2016/6/23
 * Time: 8:59
 */
namespace Home\Controller;
use Think\Controller;
class CartController extends Controller {
    //购物车
    public function gouwu(){
        $goods_id=$_GET['goods_id'];
        $goods = D('wi_goods');
        $arr= $goods->where("goods_id='$goods_id'")->find();
        //print_r($arr);die;
        $this->assign('arr',$arr);
        $this->display('Index/member/cart/cartlist');
    }
}