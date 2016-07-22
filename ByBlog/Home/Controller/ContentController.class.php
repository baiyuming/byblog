<?php
namespace Home\Controller;
use Think\Controller;
class ContentController extends Controller {
    public function content($id=2){
        $Form   =   M('Article');
        // 读取数据
        $data =   $Form->find($id);
        //var_dump($data);
        if($data) {
            $this->assign('data',$data);// 模板变量赋值
        }else{
            $this->error('数据错误');
        }
        $this->display();
    }
}