<?php
$_SGLOBAL['i'] = 0;
$_SGLOBAL['block_search'] = $_SGLOBAL['block_replace'] = array();
function parse_template($tpl,$issubtemplate = 0) {
    global $templatefolder,$templateroot, $WEBROOT_TEMP,$_SGLOBAL,$rootroad;


    //yoho:�����ñ����滻Ĭ��ģ��
    $newtpl = empty($_SCONFIG['yoho_'.$tpl.'_template']) ? $tpl : $_SCONFIG['yoho_'.$tpl.'_template'];



    //����ģ��
    $_SGLOBAL['sub_tpls'] = array($newtpl);

    $tplfile = $WEBROOT_TEMP.$newtpl.'.php';
    $objfile = $WEBROOT.'./data/tpl_cache/'.str_replace('/','_',$newtpl).'.php';
    
	
	
    //read
    if(!file_exists($tplfile)) {
        $tplfile = str_replace('/'.$templatefolder.'/', '/default/', $tplfile);
		

				$templatefolder = "default";
				//ģ���·������ַ��
				$templateroot = $rootroad."/template/".$templatefolder;
				//ģ���·�����ļ���
				$WEBROOT_TEMP = WEBROOT."template/".$templatefolder."/";

    }
	
	
	
    $template = sreadfile($tplfile);
    if(empty($template)) {
        exit("Template file : $tplfile Not found or have no access!");
    }
	
	
	$template_md5 = md5($template);
	
	//<!--{eval php����;}-->
	
	
	$pidsplit = array();
	$pidsplit["=\"img/"] = "=\"".$templateroot."/img/";
	$pidsplit["=\"images/"] = "=\"".$templateroot."/images/";
	$pidsplit["=\"js/"] = "=\"".$templateroot."/js/";
	$pidsplit["=\"css/"] = "=\"".$templateroot."/css/";
	
	$pidsplit["<!--{if"] = "<!--{#if";  //��� js������ {if ��ͻ�����⡣

	$template =  strtr($template,$pidsplit);

    //ģ��
    $template = preg_replace("/\<\!\-\-\{template\s+([a-z0-9_\/]+)\}\-\-\>/ie", "readtemplate('\\1')", $template);
    //������ҳ���еĴ���
    $template = preg_replace("/\<\!\-\-\{template\s+([a-z0-9_\/]+)\}\-\-\>/ie", "readtemplate('\\1')", $template);
	
	
    //����ģ�����
    $template = preg_replace("/\<\!\-\-\{block\/(.+?)\}\-\-\>/ie", "blocktags('\\1')", $template);
    //�������
    $template = preg_replace("/\<\!\-\-\{ad\/(.+?)\}\-\-\>/ie", "adtags('\\1')", $template);
    //ʱ�䴦��
    $template = preg_replace("/\<\!\-\-\{date\((.+?)\)\}\-\-\>/ie", "datetags('\\1')", $template);
    //ͷ����
    $template = preg_replace("/\<\!\-\-\{avatar\((.+?)\)\}\-\-\>/ie", "avatartags('\\1')", $template);

    //PHP����
    $template = preg_replace("/\<\!\-\-\{eval\s+(.+?)\s*\}\-\-\>/ies", "evaltags('\\1')", $template);
    //PHP���� <script[^>]*>(?:.|[\r\n])*?
    $template = preg_replace("/\<\?php\s+(.+?)\s*\?>/ies", "evaltags('\\1')", $template);

    //��ʼ����
    //����
    
	$var_regexp = "((\\\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)(\[[a-zA-Z0-9_\-\.\"\'\[\]\$\x7f-\xff]+\])*)";
    $template = preg_replace("/\<\!\-\-\{(.+?)\}\-\-\>/s", "{\\1}", $template);
    $template = preg_replace("/([\n\r]+)\t+/s", "\\1", $template);
    $template = preg_replace("/(\\\$[a-zA-Z0-9_\[\]\'\"\$\x7f-\xff]+)\.([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)/s", "\\1['\\2']", $template);
    $template = preg_replace("/\{(\\\$[a-zA-Z0-9_\[\]\'\"\$\.\x7f-\xff]+)\}/s", "<?=\\1?>", $template);
    $template = preg_replace("/$var_regexp/es", "addquote('<?=\\1?>')", $template);
    $template = preg_replace("/\<\?\=\<\?\=$var_regexp\?\>\?\>/es", "addquote('<?=\\1?>')", $template);
    //�߼�
    
	$template = preg_replace("/\{elseif\s+(.+?)\}/ies", "stripvtags('<?php } elseif(\\1) { ?>','')", $template);
    $template = preg_replace("/\{else\}/is", "<?php } else { ?>", $template);
    //ѭ��
    
	for($i = 0; $i < 6; $i++) {
        $template = preg_replace("/\{loop\s+(\S+)\s+(\S+)\}(.+?)\{\/loop\}/ies", "stripvtags('<?php if(is_array(\\1)) { foreach(\\1 as \\2) { ?>','\\3<?php } } ?>')", $template);
        $template = preg_replace("/\{loop\s+(\S+)\s+(\S+)\s+(\S+)\}(.+?)\{\/loop\}/ies", "stripvtags('<?php if(is_array(\\1)) { foreach(\\1 as \\2 => \\3) { ?>','\\4<?php } } ?>')", $template);
        $template = preg_replace("/\{#if\s+(.+?)\}(.+?)\{\/if\}/ies", "stripvtags('<?php if(\\1) { ?>','\\2<?php } ?>')", $template);
    }
    //����
    $template = preg_replace("/\{([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\}/s", "<?=\\1?>", $template);
    
    $template = preg_replace("/\<\?\=(.+?)\?\>/s", "<?php echo(\\1) ?>", $template);
	
	
    //�滻
    if(!empty($_SGLOBAL['block_search'])) {
        $template = str_replace($_SGLOBAL['block_search'], $_SGLOBAL['block_replace'], $template);
    }
    
    //����
    $template = preg_replace("/ \?\>[\n\r]*\<\? /s", " ", $template);
    
    //���Ӵ���
    //$template = $template."<?php //  echo debuginfo(); //?//>";
	
    $template = "<?php //".$template_md5." ?><?php if(!defined('VERSON')) exit('Access Denied');?>$template";
    
	$template = "".$template;
	
	if($issubtemplate){
		return $template;	
	}else{
		//write
		//echo("д��ģ��");
		if(!swritefile($objfile, $template)) {
			exit("File: $objfile ģ�滺��д��ʧ��!");
		}else{
			return $template;	
		}
	}
	
}
//��ȡ�ļ�����
function sreadfile($filename) {
	$content = '';
	if(function_exists('file_get_contents')) {
		@$content = file_get_contents($filename);
	} else {
		if(@$fp = fopen($filename, 'r')) {
			@$content = fread($fp, filesize($filename));
			@fclose($fp);
		}
	}
	return $content;
}

function addquote($var) {
    return str_replace("\\\"", "\"", preg_replace("/\[([a-zA-Z0-9_\-\.\x7f-\xff]+)\]/s", "['\\1']", $var));
}

function striptagquotes($expr) {
    $expr = preg_replace("/\<\?\=(\\\$.+?)\?\>/s", "\\1", $expr);
    $expr = str_replace("\\\"", "\"", preg_replace("/\[\'([a-zA-Z0-9_\-\.\x7f-\xff]+)\'\]/s", "[\\1]", $expr));
    return $expr;
}

function evaltags($php) {
    global $_SGLOBAL;


    $_SGLOBAL['i']++;
    $search = "<!--EVAL_TAG_{$_SGLOBAL['i']}-->";
    $_SGLOBAL['block_search'][$_SGLOBAL['i']] = $search;
    $_SGLOBAL['block_replace'][$_SGLOBAL['i']] = "<?php ".stripvtags($php)." ?>";
	
    return $search;
}

function blocktags($parameter) {
    global $_SGLOBAL;

    $_SGLOBAL['i']++;
    $search = "<!--BLOCK_TAG_{$_SGLOBAL['i']}-->";
    $_SGLOBAL['block_search'][$_SGLOBAL['i']] = $search;
    $_SGLOBAL['block_replace'][$_SGLOBAL['i']] = "<?php block(\"$parameter\"); ?>";
    return $search;
}

function adtags($pagetype) {
    global $_SGLOBAL;

    $_SGLOBAL['i']++;
    $search = "<!--AD_TAG_{$_SGLOBAL['i']}-->";
    $_SGLOBAL['block_search'][$_SGLOBAL['i']] = $search;
    $_SGLOBAL['block_replace'][$_SGLOBAL['i']] = "<?php adshow('$pagetype'); ?>";
    return $search;
}
function datetags($parameter) {
    global $_SGLOBAL;

    $_SGLOBAL['i']++;
    $search = "<!--DATE_TAG_{$_SGLOBAL['i']}-->";
    $_SGLOBAL['block_search'][$_SGLOBAL['i']] = $search;
    $_SGLOBAL['block_replace'][$_SGLOBAL['i']] = "<?php echo sgmdate($parameter); ?>";
    return $search;
}
//ʱ���ʽ��
function sgmdate($dateformat, $timestamp='', $format=0) {
	global $_SCONFIG, $_SGLOBAL;
	if(empty($timestamp)) {
		$timestamp = $_SGLOBAL['timestamp'];
	}
	$timeoffset = strlen($_SGLOBAL['member']['timeoffset'])>0?intval($_SGLOBAL['member']['timeoffset']):intval($_SCONFIG['timeoffset']);
	$result = '';
	if($format) {
		$time = $_SGLOBAL['timestamp'] - $timestamp;
		if($time > 24*3600) {
			$result = gmdate($dateformat, $timestamp + $timeoffset * 3600);
		} elseif ($time > 3600) {
			$result = intval($time/3600).'Сʱ'.'��ǰ';
		} elseif ($time > 60) {
			$result = intval($time/60).('����').('��ǰ');
		} elseif ($time > 0) {
			$result = $time.('��').('��ǰ');
		} else {
			$result = ('�ո�');
		}
	} else {
		$result = gmdate($dateformat, $timestamp + $timeoffset * 3600);
	}
	return $result;
}

//�ַ���ʱ�仯
function sstrtotime($string) {
	global $_SGLOBAL, $_SCONFIG;
	$time = '';
	if($string) {
		$time = strtotime($string);
		if(gmdate('H:i', $_SGLOBAL['timestamp'] + $_SCONFIG['timeoffset'] * 3600) != date('H:i', $_SGLOBAL['timestamp'])) {
			$time = $time - $_SCONFIG['timeoffset'] * 3600;
		}
	}
	return $time;
}

function avatartags($parameter) {
    global $_SGLOBAL;

    $_SGLOBAL['i']++;
    $search = "<!--AVATAR_TAG_{$_SGLOBAL['i']}-->";
    $_SGLOBAL['block_search'][$_SGLOBAL['i']] = $search;
    $_SGLOBAL['block_replace'][$_SGLOBAL['i']] = "<?php echo avatar($parameter); ?>";
    return $search;
}

function stripvtags($expr, $statement='') {
    $expr = str_replace("\\\"", "\"", preg_replace("/\<\?\=(\\\$.+?)\?\>/s", "\\1", $expr));
    $statement = str_replace("\\\"", "\"", $statement);
    return $expr.$statement;
}

function readtemplate($name) {
    global $templatefolder;
    
    $tpl = strczexists($name,'/')?$name:"template/$templatefolder/$name";
    $tplfile = WEBROOT.'./'.$tpl.'.php';
    
    $_SGLOBAL['sub_tpls'][] = $tpl;
    
    if(!file_exists($tplfile)) {
        //$tplfile = str_replace('/'.$_SCONFIG['template'].'/', '/default/', $tplfile);
    }
	
	
	
	
    $content = parse_template($name,1);
    return $content;
}

//�ж��ַ����Ƿ����
function strczexists($haystack, $needle) {
	return !(strpos($haystack, $needle) === FALSE);
}
//д���ļ�
function swritefile($filename, $writetext, $openmod='w') {
	
	if(@$fp = fopen($filename, $openmod)) {
		flock($fp, 2);
		fwrite($fp, $writetext);
		fclose($fp);
		return true;
	} else {
		exit("File: $filename ģ�滺��д��ʧ��.");
		return false;
	}
}
function createDir($path){ 
	if (!file_exists($path)){ 
		createDir(dirname($path)); 
		mkdir($path, 0777); 
	} 
} 
function Tao_template($name) {
    global $templatefolder,$WEBROOT_TEMP;
    $objfile = WEBROOT.'data/tpl_cache/'.str_replace('/','_',$name).'.php';
	
	createDir(WEBROOT.'data/tpl_cache/');
		


	
	if(file_exists($WEBROOT_TEMP."/clear.html") && file_exists($objfile) && !DEBUG){
		
		deldir(WEBROOT.'data/tpl_cache/',0);
		unlink($WEBROOT_TEMP."/clear.html");
	}
	
	
	
        if (DEBUG) {
            $temp = parse_template($name);
        } else {
            if (!file_exists($objfile)) {
				$temp = parse_template($name);
            }
        }
		
		
		
		
		if (!file_exists($objfile)) {
			eval($temp);
			exit;
		}else{
			return $objfile;
		}
}

//��ģ����¼��
function subtplcheck($subfiles, $mktime, $tpl) {
    global $_SC, $_SCONFIG;
    global $templatefolder;
	$name = WEBROOT.'template/'.$templatefolder.'/';

	


    if ($_SC['tplrefresh'] && ($_SC['tplrefresh'] == 1 || mt_rand(1, $_SC['tplrefresh']) == 1)) {
        $subfiles = explode('|', $subfiles);
        foreach ($subfiles as $subfile) {
            $tplfile = $name . $subfile . '.php';
			
            if (!file_exists($tplfile)) {
                $tplfile = str_replace('/' . $_SCONFIG['template'] . '/', '/default/', $tplfile);
				
            }
            @$submktime = filemtime($tplfile);
            if ($submktime > $mktime) {
                //include_once(WEBROOT . './source/function_template.php');\
                parse_template($tpl);
                break;
            }
        }
    }
}
?>