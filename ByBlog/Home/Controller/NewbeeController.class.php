<?php
/**
 * Created by PhpStorm.
 * User: BYM
 * Date: 2016/6/21
 * Time: 16:12
 */
namespace Home\Controller;
use Think\Controller;
class NewbeeController extends Controller {
    
    public function listNewbee(){
        // 查询满足要求的总记录数
        $count = M('Newbee')->count();
        //var_dump($count);
        $this->assign('count',$count);
        // 实例化分页类 传入总记录数和每页显示的记录数
        $Page  = new \Think\Page($count,50);
        // 分页显示输出
        $show  = $Page->show();
        $newbee = M('Newbee') ->order('n_id desc') -> field('n_id,n_url,n_name,n_remark,n_time') ->limit($Page->firstRow.','.$Page->listRows)->select();
        // 赋值数据集
        $this->assign('list',$newbee);
        // 赋值分页输出
        $this->assign('page',$show);
        //dump($newbee);
        $this->display();
    }

}