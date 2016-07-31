<?php
/**
 * Created by PhpStorm.
 * User: BYM
 * Date: 2016/7/31
 * Time: 22:24
 */

namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {

    Public function _initialize(){
        // 判断session 是否存在，不存在跳转到登录页
        if(!isset($_SESSION['uid'])){
            $this -> redirect('Admin/Login/index');
        }
    }

}