<?php
/**
 * Created by JetBrains PhpStorm.
 * 说明：post 和 get方法都可以使用
 * sdk 入口文件
 * User: denniszhu
 * Date: 12-8-13
 * Time: 下午4:02
 * To change this template use File | Settings | File Templates.
 */
require_once dirname(__FILE__)."/".'global.php';

require_once WEBROOT.'include/function.php';



    // 以下部分用于设置用户在调用相关接口时url中"?"之后的各个参数，如上述描述中的a=1&b=2&c=3
    $params = &$paipai_sdk->getParams();//注意，这里使用的是引用，故可以直接使用
	
    $paipai_sdk->setApiPath("/cps/cpsCommSearch.xhtml");//这个是用户需要调用的 接口函数
    $params["userId"] = "43109";
	
    $params["pageSize"] = "30";
	$params["keyWord"] = "女装";

    //设置http请求接受的主机名，默认是 api.buy.qq.com。此处用户可不用修改
    //$sdk->setHostName("apitest.buy.qq.com");
// End参数设置

//run
try {
    $response = $paipai_sdk->invoke();
    print_r($response);
} catch(Exception $e) {
    printf("Request Failed. code:%d, msg:%s\n",$e->getCode(), $e->getMessage());
}

?>