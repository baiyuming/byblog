<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
        $this -> display();
    }
    public function loginSucc(){
        $User   =   M('User');
        $userName = I('post.userName');
        $pwd = I('post.pwd');
        $condition['userName'] = $userName;
        $date = $User -> field('pwd') ->where($condition)->select();

        if($pwd == $date[0]['pwd']){
            echo '1111';
        }else{
            echo '22222';
        }

        //$this -> assgin('post',$_POST);
        $this->display();
    }
}