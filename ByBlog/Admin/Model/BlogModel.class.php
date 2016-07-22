<?php
/**
 * Created by PhpStorm.
 * User: BYM
 * Date: 2016/7/22
 * Time: 13:53
 */

namespace Home\Model;
use Think\Model;


class BlogModel extends Model {
    // 定义自动验证
    protected $_validate    =   array(
        array('title','require','标题必须'),
    );
    // 定义自动完成
    protected $_auto    =   array(
        array('create_time','time',1,'function'),
    );
}