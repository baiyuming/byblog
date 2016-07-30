<?php
/**
 * Created by PhpStorm.
 * User: BYM
 * Date: 2016/7/22
 * Time: 13:53
 */

namespace Admin\Model;
use Think\Model;


class NewbeeModel extends Model {
    public function addNewbee($data){
        // 添加文章
        if(M('Newbee')->add($data)){
            return 1;
        }else{
            return 0;
        }
    }
}