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
        // 判断是否是post提交
        if(!IS_POST) halt('页面错误');

        $db = M('user');
        // 根据提交的用户名 查询数据库
        $user = $db -> where(array('name' => I('post.username'))) -> find();

        if(!$user || $user['password'] != I('post.password','','md5')){
            $this -> error('账号或密码错误');
        }

        $data = array(
            'id' => $user['id'],
            'last_time' => time(),
            'ip' => get_client_ip()
        );
        // 更新登录时间 和 ip
        $db -> save($data);

        // 写入session
        session('uid',$user['id']);
        session('username',$user['name']);
        session('username',$user['name']);
        session('logintime',date('Y-m-d H:i:s'),$user['last_time']);
        session('ip',$user['ip']);
        // 跳转到后台列表页
        redirect('../Blog/listA');

    }
}