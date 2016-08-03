<?php
namespace Home\Controller;
use Think\Controller;
class ContentController extends Controller {
    public function content($id=2){
        $Article   =   M('Article');
        // 读取数据
        $data =   $Article->find($id);
        //var_dump($data);
        if($data) {
            $hit = array(
                'a_id' => $id,
                'a_hit' => $data['a_hit'] + 1
            );
            // 更新文章点击次数
            $Article -> save($hit);
            $this->assign('data',$data);// 模板变量赋值
        }else{
            $this->error('数据错误');
        }
        $this->display();
    }
}