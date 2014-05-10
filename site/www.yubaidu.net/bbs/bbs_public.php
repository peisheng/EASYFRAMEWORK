<?php
error_reporting(E_ALL & ~E_NOTICE);
date_default_timezone_set('Asia/Shanghai');
define('MAGIC_QUOTES_GPC', function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc());
if (isset($_GET['GLOBALS']) || isset($_POST['GLOBALS']) || isset($_COOKIE['GLOBALS']) || isset($_FILES['GLOBALS'])) {
    exit('request_tainting');
}

if (!MAGIC_QUOTES_GPC) {
    $_GET = daddslashes($_GET);
    $_POST = daddslashes($_POST);
    $_COOKIE = daddslashes($_COOKIE);
    $_FILES = daddslashes($_FILES);
}

function unescape($str) {
	$str = rawurldecode($str);
	preg_match_all("/%u.{4}|&#x.{4};|&#d+;|.+/U",$str,$r);
	$ar = $r[0];
	foreach($ar as $k=>$v){
		if(substr($v,0,2) == "%u"){
			$ar[$k] = iconv("UCS-2","GBK",pack("H4",substr($v,-4)));
		}elseif(substr($v,0,3) == "&#x"){
			$ar[$k] = iconv("UCS-2","GBK",pack("H4",substr($v,3,-1))); 
		}elseif(substr($v,0,2) == "&#"){
			$ar[$k] = iconv("UCS-2","GBK",pack("n",substr($v,2,-1)));
		}
	}
	return join("",$ar); 
}

function daddslashes($string, $force = 1) {
    if (is_array($string)) {
        $keys = array_keys($string);
        foreach ($keys as $key) {
            $val = $string[$key];
            unset($string[$key]);
            $string[addslashes($key)] = daddslashes($val, $force);
        }
    } else {
        $string = addslashes($string);
    }
    return $string;
}

$GLOBALS['config'] = require_once('include/bbs_config.php');

require_once(ROOT . '/bbs/model/loadClass.php');
require_once(ROOT . '/editor/fckeditor.php');

/*
 * 配置fckeditor
 */
$editor = new FCKeditor('content');
$editor->BasePath = '../editor/';
$editor->Height = 500;
$editor->Width = 680;
$editor->ToolbarSet = 'Default';
/******************************/



