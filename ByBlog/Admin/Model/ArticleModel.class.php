<?php
/**
 * Created by PhpStorm.
 * User: BYM
 * Date: 2016/7/22
 * Time: 13:53
 */

namespace Admin\Model;
use Think\Model;


class ArticleModel extends Model {
    public function addArticle($data){
        // 添加文章
        if(M('article')->add($data)){
            return 1;
        }else{
            return 0;
        }
    }
}