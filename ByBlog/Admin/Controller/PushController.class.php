<?php
namespace Admin\Controller;
use Think\Controller;
class PushController extends CommonController {
    public function push(){
        $urls = array(
            'http://www.weber.pub/index.php/Home/Content/content/id/99.html',
            'http://www.weber.pub/index.php/Home/Content/content/id/82.html',
            'http://www.weber.pub/index.php/Home/Content/content/id/97.html ',
            'http://www.weber.pub/index.php/Home/Newbee/listNewbee.html ',
            'http://www.weber.pub/index.php/Admin/Login/index.html',
            'http://www.weber.pub/index.php/Home/Content/content/id/100.html ',
            'http://www.weber.pub/index.php/Home/Content/content/id/85.html',
            'http://www.weber.pub/index.php/Home/Content/content/id/95.html',
            'http://www.weber.pub/index.php/Home/Index/index/p/2.html ',
            'http://www.weber.pub/index.php/Home/Content/content/id/83.html ',
            'http://www.weber.pub/index.php/Home/Content/content/id/88.html',
            'http://www.weber.pub/index.php/Home/Content/content/id/87.html',
            'http://www.weber.pub/index.php/Home/Content/content/id/96.html',
            'http://www.weber.pub/index.php/Home/Content/content/id/84.html ',
            'http://www.weber.pub/index.php/Home/Content/content/id/104.html',
            'http://www.weber.pub/index.php/Home/Content/content/id/103.html',
            'http://www.weber.pub/index.php/Home/Content/content/id/98.html ',
            'http://www.weber.pub/index.php/Home/Content/content/id/101.html ',
            'http://www.weber.pub/index.php/Home/Index/index/p/1.html ',
            'http://www.weber.pub/index.php/Home/Content/content/id/92.html ',
            'http://www.weber.pub/index.php/Home/Content/content/id/94.html',
            'http://www.weber.pub/index.php/Home/Content/content/id/86.html',
            'http://www.weber.pub/index.php/Home/Content/content/id/91.html ',
            'http://www.weber.pub/index.php/Home/Content/content/id/102.html',
            'http://www.weber.pub/index.php/Home/Content/content/id/90.html ',
            'http://www.weber.pub/index.php/Home/Content/content/id/89.html',
            'http://www.weber.pub/index.php/Home/Content/content/id/93.html',
        );
        $api = 'http://data.zz.baidu.com/urls?site=www.weber.pub&token=km5INU0JFI3KSGWu';
        $ch = curl_init();
        $options =  array(
            CURLOPT_URL => $api,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => implode("\n", $urls),
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
        );
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        echo $result;
    }

}