<?php
/**
 * Created by PhpStorm.
 * User: BYM
 * Date: 2016/6/21
 * Time: 16:12
 */
namespace Admin\Controller;
use Think\Controller;
class BlogController extends Controller {

    public function insert(){
        $Article   =   D('Article');
        if($Article->create()) {
            $result =   $Article->add();
            if($result) {
                $this->success('数据添加成功！');
            }else{
                $this->error('数据添加错误！');
            }
        }else{
            $this->error($Article->getError());
        }
    }

    public function listA(){

        // 文章列表
        $count = M('article')->count();// 查询满足要求的总记录数
        $this->assign('count',$count);
        $Page  = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
        $show  = $Page->show();// 分页显示输出
        $article = M('article') ->order('a_id desc') -> field('a_title') ->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$article);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();


//        $Article   =   M('Article');
//        $count = $Article->count();
//        $Page  = new \Think\Page($count,10);
//        $p = new Page($count, 10);
//        $page = $p->show();
//        // 读取数据
//        $list = $Article -> limit($p->firstRow.','.$p->listRows) -> field('a_title') -> select();
        //var_dump($list);
    }

}