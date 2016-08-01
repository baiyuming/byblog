<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        // 文章列表 
        // 查询满足要求的总记录数
        $count = M('article')->count();
        $this->assign('count',$count);
        // 实例化分页类 传入总记录数和每页显示的记录数
        $Page  = new \Think\Page($count,15);
        // 分页显示输出
        $show  = $Page->show();
        $article = M('article') ->order('a_time desc') -> field('a_id,a_title,a_remark,a_time,a_keyword,a_hit') ->limit($Page->firstRow.','.$Page->listRows)->select();
        // 赋值数据集
        $this->assign('data',$article);
        // 赋值分页输出
        $this->assign('page',$show);

        $Count = M();
        $sql = "SELECT DATE_FORMAT(FROM_UNIXTIME(a_time),'%Y%m') a_time, 
                COUNT(1) a_sum
                FROM `by_article`
                GROUP BY DATE_FORMAT(FROM_UNIXTIME(a_time),'%Y%m') desc";
        $res = $Count->query($sql);
        $this -> assign('count',$res);

        $this->display();
    }
}