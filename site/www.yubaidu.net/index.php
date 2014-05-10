<?php
$buf="";//保存输出
function callback($buffer) {
    global $buf;
    $buf.=$buffer;  //保存本次输出
    //return ""; 
    $result=str_replace("- Powered by CmsEasy", "- Powered by 益百度工作室", $buf) ; 
    $result=str_replace("CmsEasy 5_0_0_20120626_UTF8", "YUBAIDU 5_0_0_20120626_UTF8", $result) ; 
    $result=str_replace("http://www.cmseasy.cn", "http://www.yubaidu.net", $result) ;
    $result=str_replace("Powered by CmsEasy", "Powered by YUBAIDU", $result) ;
	$result=str_replace("http://new.cmseasy.com/", "http://www.yubaidu.net/", $result) ;
   
    return  $result;    //不输出任何内容
}
ob_start("callback");  //开启输出缓冲
include "bdbfdfsadfasd.php";  //将原来的脚本包含进来
ob_end_flush(); 