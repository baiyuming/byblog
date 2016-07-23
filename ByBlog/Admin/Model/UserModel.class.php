<?php
/**
 * Created by PhpStorm.
 * User: BYM
 * Date: 2016/7/22
 * Time: 21:15
 */

namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
    public function login($name, $password){

        // 登陆验证
        if ($name == '' || $password == '') {
            return 0;
        }
        $login = M('user')->where(array('name' => $name))->find();
        if ($login['password'] == $password) {
            // 验证通过 更新登陆时候的IP和时间
            $data = array(
                'last_time' => time(),
                'ip' => get_client_ip());
            // 更新数据库文件
            M('user')->where(array('name' => $name))->save($data);
            // 验证文件写入SESSION;
            SESSION('uid', $login['id']);
            SESSION('user', $login['user']);
            SESSION('name', $login['name']);
            SESSION('class', $login['class']);
            SESSION('last_time', date('Y-m-d H:i:s', $login['last_time']));
            SESSION('ip', $login['loginip']);
            return 1;
        } else {
            return 2;
        }
    }
}