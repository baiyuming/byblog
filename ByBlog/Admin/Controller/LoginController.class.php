<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    // 登录控制器
    public function index(){
        // 登陆模板
        $this->display();
    }
    public function login(){
        // 登陆用户名提交判断
        $name = I('post.name');
        $password = I('post.password');
        $row = D('User')->login($name,$password);
        // 用D方法在数据库进行验证后返回
        if($row == 1){
            $this->redirect('User/Index/index');
        }elseif($row == 0){
            jumpError('用户名和密码不能为空！请重新输入！');
        }else{
            jumpError('用户名或者密码错误，请重新输入');
        }
    }
}