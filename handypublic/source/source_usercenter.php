<?php
$pagename_template = "usercenter";
require_once WEBROOT.'include/function.php';
dbconnect();


$ac = htmlspecialchars(urldecode(var_request("ac","")));
$redirect = htmlspecialchars(urldecode(var_request("redirect","usercenter.php?ac=main")));
$inwin = htmlspecialchars(urldecode(var_request("inwin","0")));

if($ac=="shareframe") {
	$inwin= 1;
	$redirect = "usercenter.php?ac=shareframe";
	if(!check_login()){
					//echo("<script language=\"JavaScript\">alert(\"请先登录哦。\");<//script>");
					//$mod = "ok";
					//$dialog = "add";
	}
}
if(check_login()){
	if($ac=="") $ac = "main";
}else{
	if ($ac!="login" && $ac!="register" && $ac!="verify"){
		$ac = "login";
	}
}


//执行函数
$ac();

function loginout(){
	global $TaoConfig;
	$_SESSION['user_id'] = "";
	unset($TaoConfig["UserData"]);
	unset($_SESSION);
	setcookie ("var_name", $data["name"], time()-604800);
	setcookie ("var_passwd", $data["passwd"], time()-604800);
	exit;
	//redirect_to($TaoConfig["rootroad"]."/");
}


function shareframe(){
	global $Taoapi,$Global_headerCode,$dialog;
	global $TaoConfig;
	global $redirect;
	global $userpiddp;
	$mod = htmlspecialchars(urldecode(var_request("mod","geturl")));
	
		if($mod=="setfield"){
			
			if (isset($_POST['dosubmit'])) {
				
							
					$data = array();
				
                    $data['info'] = htmlspecialchars(urldecode(var_request("info","")));
                    $data['title'] = htmlspecialchars(urldecode(var_request("title","")));
					
                    $data['url'] = (base64_decode(var_request("url","")));
					
					$data['item_key']=htmlspecialchars(urldecode(var_request("key","")));
					$data['price']=htmlspecialchars(urldecode(var_request("price","")));
					$data['hits'] =  1;
					$data['likes'] =  1;
					$data['img'] = htmlspecialchars(urldecode(var_request("pic_url","")))."_210x210.jpg";
					$data['simg'] = htmlspecialchars(urldecode(var_request("pic_url","")))."_64x64.jpg";
					$data['bimg'] = htmlspecialchars(urldecode(var_request("pic_url","")));
					
					$data['uid'] =  $_SESSION['user_id'];
					$data['usernick'] =  $TaoConfig["UserData"]["name"];
					
					$data['add_time'] = time();
					$data['last_time'] = time();
					if (($_POST['cid'] != "")&&($_POST['scid'] != "")&&($_POST['pcid'] != "")) {
						$data['cid']    = $_POST['cid'];
						$data['level']  = "3";
					} elseif (($_POST['scid'] != "")&&($_POST['pcid'] != "")) {
						$data['cid'] = $_POST['scid'];
						$data['level'] = "2";               
					}elseif ($_POST['pcid'] != "") {
						$data['cid'] = $_POST['pcid'];
						$data['level'] = "1";
					}elseif ($_POST['pcid'] == "") {
						echo("<script language=\"JavaScript\">alert(\"要选择一个分类。\");history.go(-1);</script>");
						exit;
					}
						
					//来源
					$author = isset($_POST['author']) ? $_POST['author'] : '';
					$data['sid'] = 1;
					
					array_walk_recursive($data,"gbk_utf8");
					
					
					$fname = array();
					$fval = array();
					foreach($data as $key=>$val){
						$fname[]=$key;
						$fval[] ="'".$val."'";
					}
					$table = implode(",",$fname);
					$tval = implode(",",$fval);
					
					$ret = fetch_Noarray("INSERT INTO ".tname('items')."($table) values ($tval)");
					echo("<script language=\"JavaScript\">alert(\"分享完成。\");</script>");
					$mod = "ok";
					$dialog = "add";
			}
		}
	
	if(var_request("dosubmit","")!=""){
		if($mod=="geturl"){
			$url = $_POST["url"];
			
			if(((strpos($url,"tmall.com")>0 ||  strpos($url,"taobao.com")>0) && strpos($url,"item.htm")>0) || strpos($url,"paipai.com")>0){
				
				
				$date = GetUrlProduct($url);
				if($TaoConfig["default_lang"]=="GBK"){
					array_walk_recursive($date,"utf8_gbk");
				}
				
				
				
				if(is_array($date)){
					
					$date = $date["item"];
				}else{
					if($date==0){
					echo("<script language=\"JavaScript\">alert(\"网址格式错误哦，只支持淘宝，天猫，拍拍三个站。\");history.go(-1);</script>");
					exit;
					}
					echo("<script language=\"JavaScript\">alert(\"读取失败，请检查网站APPKEY配置。\");history.go(-1);</script>");
					exit;

				}
				
				if($date["item"]["isown"]=="ok"){
					echo("<script language=\"JavaScript\">alert(\"已经有人分享过这个商品了。\");history.go(-1);</script>");
					exit;
				}
				
				$date["click_url"] = base64_encode($date["click_url"]);
				
				if(!isset($date)){
					echo("<script language=\"JavaScript\">alert(\"读取失败，请检查网站APPKEY配置。\");history.go(-1);</script>");
					exit;
					
				}
				$date["num_iid"] = $iid;
							
				$cate_list = fetch_Allarray("SELECT * FROM ".tname('items_cate')." where pid=0 order by ordid desc ");
				//转码
				if($TaoConfig["default_lang"]=="GBK"){
					array_walk_recursive($cate_list,"utf8_gbk");
				}
				
				$mod = "setfield";
				
			}else{
				echo("<script language=\"JavaScript\">alert(\"网址格式不对哦，只支持淘宝和天猫的网址。\");history.go(-1);</script>");
				//redirect_to($redirect);
				exit;
			}
		}
		
		
		
		
		if($mod=="ok"){
		$dialog = "add";
		}
	}

	//加载模板
	require_once Tao_template("shareframe");
	exit;
}

function get_child_catesAll() {
	global $TaoConfig;
	
	$parent_id = intval(var_request("parent_id","0"));
	
		//$cate_list = $items_cate_mod->field('id,name,pid')->order('ordid DESC')->select();
		
		$cate_list = fetch_Allarray("SELECT * FROM ".tname('items_cate')." where pid=".$parent_id." order by ordid desc ");
		
		//转码
		if($TaoConfig["default_lang"]=="GBK"){
			array_walk_recursive($cate_list,"utf8_gbk");
		}
		
		
		$content = "<option value=''>--请选择分类--</option>";
		foreach ($cate_list as $val) {
				$content .= "<option value=" . $val['id'] . ">" . $val['name'] . "</option>";
		}

	$data2 = array(
		'content' => NewIconv("GBK","UTF-8",$content),
	);
	exit($_GET['callback'].'('.json_encode($data2).')');
}

function main(){
	
}
function password(){
	global $TaoConfig;
	global $redirect;
	
	$data["oldpwd"] = htmlspecialchars(urldecode(var_request("oldpwd","")));
	$data["passwd"] = htmlspecialchars(urldecode(var_request("passwd","")));
	$data["confirm_passwd"] = htmlspecialchars(urldecode(var_request("confirm_passwd","")));
	
	if (isset($_POST['dosubmit'])) {
		if($data["passwd"]!=$data["confirm_passwd"]){
			echo("<script language=\"JavaScript\">alert(\"重复密码错误。\");history.go(-1);</script>");
			exit;
		}
		if(strlen($data["passwd"])<5 || strlen($data["passwd"])>20){
			echo("<script language=\"JavaScript\">alert(\"密码不能超过20个字符，也不能少与5个字符。\");history.go(-1);</script>");
			exit;
		}
		
		$where = " id=".$_SESSION['user_id'];
		$user = fetch_Onearray("SELECT * FROM ".tname('user')."  WHERE $where ");
		$errstr = "";
		
		if($user) {
			if(md5(trim($data['oldpwd']))!=$user["passwd"]){
				echo("<script language=\"JavaScript\">alert(\"旧密码错误。\");history.go(-1);</script>");
				exit;
			}
			
			$query = fetch_Noarray("update ".tname('user')." set passwd='".md5(trim($data['passwd']))."'  WHERE id='" . $_SESSION['user_id'] . "' " );
			
			echo("<script language=\"JavaScript\">alert(\"修改完成。\");history.go(-1);</script>");
			exit;
		}
	}
	
}
//用户设置
function userset(){
	global $TaoConfig;
	global $redirect;
	
	if (isset($_POST['dosubmit'])) {
		
		$data = array();
		$data["email"] = htmlspecialchars(urldecode(var_request("email","")));
		$data["sex"] = htmlspecialchars(urldecode(var_request("sex","")));
		$data["brithday"] = htmlspecialchars(urldecode(var_request("brithday","")));
		$data["province"] = htmlspecialchars(urldecode(var_request("province","")));
		$data["city"] = htmlspecialchars(urldecode(var_request("city","")));
		$data["area"] = htmlspecialchars(urldecode(var_request("area","")));
		$data["blog"] = htmlspecialchars(urldecode(var_request("blog","")));
		$data["info"] = htmlspecialchars(urldecode(var_request("info","")));
		if ($_FILES['img']['name'] != '') {
			$path = $TaoConfig["rootroad"]."/uploadfile/".date("Y-m-d")."/";
			
			$upload_list = _upload($_FILES['img'], "","","logo_",120,120);
			
			$data['img'] = $path . "logo_" . $upload_list['0']['savename'];
		}
		
		
	//转码
	if($TaoConfig["default_lang"]=="GBK"){
		array_walk_recursive($data,"gbk_utf8");
	}
		
		$fname = array();
		$fval = array();
		foreach($data as $key=>$val){
			$setfield[] = $key."='".$val."'";
		}
		$setfield = implode(",",$setfield);
		$where = " id=".$_SESSION['user_id'];
		
		$ret = fetch_Noarray("update ".tname('user')." set $setfield where $where");
		$id = mysql_insert_id();
		echo("<script language=\"JavaScript\">alert(\"修改成功。\");history.go(-1);</script>");
		//redirect_to("usercenter.php?ac=userset");
		exit;
	}
}
function invit(){
	
}
function verify(){
	require_once 'include/thinkphp/Common/common.php';
	require_once 'include/thinkphp/Extend/Library/ORG/Util/Image.class.php';
	require_once 'include/thinkphp/Extend/Library/ORG/Util/String.class.php';
	Image::buildImageVerify();
	exit;
}

function login() {
	global $TaoConfig;
	global $redirect;
	$TaoConfig["list_title"] = "会员登陆_{网站名}";
	
	if (check_login()) {
		redirect_to($redirect);
	}
		$data["name"] = htmlspecialchars(urldecode(var_request("name","")));
		$data["passwd"] = htmlspecialchars(urldecode(var_request("passwd","")));
		//转码
		if($TaoConfig["default_lang"]=="GBK"){
			array_walk_recursive($data,"gbk_utf8");
		}
	

	if (isset($_POST['dosubmit'])) {
		$where = " (name='" . trim($data['name']) . "' or email='" . trim($data['name']) . "') and passwd='" . md5(trim($data['passwd'])) . "' and status='1'";
		$user = fetch_Onearray("SELECT * FROM ".tname('user')."  WHERE $where ");

		if ($user) {
			$_SESSION['user_id'] = $user['id'];
			$query = fetch_Noarray("update ".tname('user')." set last_ip='".$_SERVER['REMOTE_ADDR']."',last_time='".time()."'  WHERE id='" . $_SESSION['user_id'] . "' " );
			
			setcookie ("var_name", $data["name"], $expire);
			setcookie ("var_passwd", $data["passwd"], $expire);
			
			
			redirect_to($redirect);
		} else {
		echo("<script language=\"JavaScript\">alert(\"账号或者密码错误，请重新填写。\");history.go(-1);</script>");
		exit;
		}
	}
}
function register() {
	global $TaoConfig;
	$TaoConfig["list_title"] = "会员注册_{网站名}";
	if (check_login()) {
		redirect_to($redirect);
	}
	if (isset($_POST['dosubmit'])) {
		
		$data = array();
		
		$data["name"] = htmlspecialchars(urldecode(var_request("name","")));
		$data["email"] = htmlspecialchars(urldecode(var_request("email","")));
		$data["passwd"] = htmlspecialchars(urldecode(var_request("passwd","")));

		//转码
		if($TaoConfig["default_lang"]=="GBK"){
			array_walk_recursive($data,"gbk_utf8");
		}
		$flag = true;
		
		$usercheck = fetch_Onearray("SELECT COUNT(*) as count FROM ".tname('user')." WHERE name='" . trim($data['name']) . "' ");
		if ( $usercheck["count"] != 0) {
		echo("<script language=\"JavaScript\">alert(\"用户名重复。\");history.go(-1);</script>");
		exit;
		}
		
		if (strlen(trim($data['email'])) > 0) {
		$emailcheck = fetch_Onearray("SELECT COUNT(*) as count FROM ".tname('user')." WHERE email='" . trim($data['email']) . "' ");
			if ($emailcheck["count"] != 0) {
		echo("<script language=\"JavaScript\">alert(\"邮箱重复。\");history.go(-1);</script>");
		exit;
			}
		}
		if ($_SESSION['verify'] != md5($_POST['verify'])) {
		echo("<script language=\"JavaScript\">alert(\"验证码错误。\");history.go(-1);</script>");
		exit;
		}
		if ($flag) {
			$data['ip'] = $_SERVER['REMOTE_ADDR'];
			$data['add_time'] = time();
			$data['passwd'] = md5(trim($data['passwd']));
			
			
			$fname = array();
			$fval = array();
			foreach($data as $key=>$val){
				$fname[]=$key;
				$fval[] ="'".$val."'";
			}
			$table = implode(",",$fname);
			$tval = implode(",",$fval);
			
			$ret = fetch_Onearray("INSERT INTO ".tname('user')."($table) values ($tval)");
			$id = mysql_insert_id();
			$_SESSION['user_id'] = $id;
			
			redirect_to("usercenter.php");
		}
	}
}


$list_title=$TaoConfig["list_title"];
$list_keyword=$TaoConfig["list_keyword"];
$list_discription=$TaoConfig["list_discription"];

if($list_title=="")$list_title = "{标题}_{网站名}";
if($list_keyword=="")$list_keyword = "{标题}";
if($list_discription=="")$list_discription = "{网站名}用户管理中心。您可以在这里管理您的登陆信息。";

$tihuanarr = array();
$tihuanarr["{标题}"] = "用户中心";
$tihuanarr["{网站名}"] = $sitetitle;
$tihuanarr["{简介}"] = "用户管理中心";


$page_title = strtr($list_title,$tihuanarr); 
$page_keyword = strtr($list_keyword,$tihuanarr); 
$page_discription = strtr($list_discription,$tihuanarr); 


//加载模板
require_once Tao_template($pagename_template);
showend();

?>
