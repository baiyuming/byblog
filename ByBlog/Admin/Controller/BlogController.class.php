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
        $data = array (
            'a_title' => I('post.a_title'),
            'a_keyword' => I('post.a_keyword'),
            'a_remark' => I('post.a_remark'),
            'a_content' => I('post.a_content'),
            'a_time' => time(),
            'a_ip' => get_client_ip(),
        );
        if(D('Article')->addArticle($data)){
            $this->success('发表完成！','listA');
        }else{
            $this->error('发表失败！');
        }
    }

    public function listA(){

        // 文章列表
        // 查询满足要求的总记录数
        $count = M('article')->count();
        $this->assign('count',$count);
        // 实例化分页类 传入总记录数和每页显示的记录数
        $Page  = new \Think\Page($count,10);
        // 分页显示输出
        $show  = $Page->show();
        $article = M('article') ->order('a_id desc') -> field('a_title,a_time') ->limit($Page->firstRow.','.$Page->listRows)->select();
        // 赋值数据集
        $this->assign('list',$article);
        // 赋值分页输出
        $this->assign('page',$show);
        $this->display();

    }

}