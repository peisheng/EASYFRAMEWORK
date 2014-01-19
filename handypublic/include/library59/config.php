<?php
/**
 * 
 * @author 59miao.com
 * QQ:554024292
 */
//设置获取数据的编码. 支持UTF-8 GBK GB2312 
//需要 iconv或mb_convert_encoding 函数支持
//UTF-8 不可写成UTF8
define('CHARSET', 'GBK');
define('APPKEY',$B2CArrayAppKey); //设置59秒appkey
define('APPSECRET',$B2CArrayAppSecret);  //设置59秒appSecret
define('APIURL', 'http://api.59miao.com/Router/Rest?'); //设置与59秒通信的地址

?>