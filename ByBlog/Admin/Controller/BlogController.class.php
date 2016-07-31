<?php
/**
 * Created by PhpStorm.
 * User: BYM
 * Date: 2016/6/21
 * Time: 16:12
 */
namespace Admin\Controller;
use Think\Controller;
class BlogController extends CommonController {
    // 添加博客 方法
    public function insert(){
        $time = I('post.a_time')?strtotime(I('post.a_time')):time();
        $data = array (
            'a_title' => I('post.a_title'),
            'a_keyword' => I('post.a_keyword'),
            'a_remark' => I('post.a_remark'),
            'a_content' => I('post.a_content'),
            'a_time' => $time,
            'a_ip' => get_client_ip(),
        );
        if(D('Article')->addArticle($data)){
            $this->success('发表完成！','listA');
        }else{
            $this->error('发表失败！');
        }
    }
    public function del($id=0){
        // 实例化Article对象
        $Article = M("Article"); 
        //根据id删除
        $Article->where('a_id = '.$id)->delete();
        if($Article) { // 根据条件保存修改的数据
            $this->success('文章已删除！',"../../listA");
        }else{
            $this->error('删除失败！');
        }
    }
    //编辑博客方法
    public function edit($id=0){
        $Article   =   M('Article');
        $this->assign('data',$Article->find($id));
        $this->display();
    }
    // 更新博客
    public function update(){
        $Article = M("Article");
        $time = I('post.a_time')?strtotime(I('post.a_time')):time();
        $data = array (
            'a_id' => I('post.a_id'),
            'a_title' => I('post.a_title'),
            'a_keyword' => I('post.a_keyword'),
            'a_remark' => I('post.a_remark'),
            'a_content' => I('post.a_content'),
            'a_time' => $time,
        );

        if($Article->save($data)) { // 根据条件保存修改的数据
            $this->success('编辑成功！','listA');
        }else{
            $this->error('编辑失败！');
        }
    }
    // 列表展示博客
    public function listA(){

        // 文章列表
        // 查询满足要求的总记录数
        $count = M('article')->count();
        $this->assign('count',$count);
        // 实例化分页类 传入总记录数和每页显示的记录数
        $Page  = new \Think\Page($count,10);
        // 分页显示输出
        $show  = $Page->show();
        $article = M('article') ->order('a_time desc') -> field('a_id,a_title,a_time') ->limit($Page->firstRow.','.$Page->listRows)->select();
        // 赋值数据集
        $this->assign('list',$article);
        // 赋值分页输出
        $this->assign('page',$show);
        $this->display();

    }

}