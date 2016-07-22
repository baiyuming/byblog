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
    public function index(){
        $this -> display();
    }
    public function add(){
        $Form   =   D('Form');
        if($Form->create()) {
            $result =   $Form->add();
            if($result) {
                $this->success('数据添加成功！');
            }else{
                $this->error('数据添加错误！');
            }
        }else{
            $this->error($Form->getError());
        }
    }

}