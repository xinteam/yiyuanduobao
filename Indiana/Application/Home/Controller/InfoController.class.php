<?php
namespace Home\Controller;
use Think\Controller;
class InfoController extends Controller
{

    public function goods_info()
    {
        $goods_id = isset($_GET['goods_id']) ? $_GET['goods_id'] : 1;
        $goods = D('wi_goods');
        $g_info = $goods->where("goods_id='$goods_id'")->find();
        $g_info['jin']=($g_info['readly_people']/$g_info['goods_people'])*500;
       // print_r($g_info);die;
        $this->assign('g_info', $g_info);
        $this->assign('sheng', $g_info['goods_people']-$g_info['readly_people']);

        $this->display('Index/goods_info');
    }

}