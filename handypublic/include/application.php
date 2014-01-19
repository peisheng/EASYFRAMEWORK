<?php 
function array_iconv($in_charset,$out_charset,$arr){
  return( Newiconv($in_charset,$out_charset,var_export($arr,true).';'));
  //return eval('return '.Newiconv($in_charset,$out_charset,var_export($arr,true).';'));
 }

 function application($name,$file){
	$temparrays = array ();
	$fstr = "";
	if (is_file($file)){
		//将所有数据都读出来
			$str = file_get_contents($file,true);
			
			$str = str_replace("<?php exit();?>","",$str);
			
			$temparrays = unserialize($str); 		
			//$temparrays = include ($file);

	}
	
	if($name==""){
		return $temparrays;
	}
	
	if(isset($temparrays[$name])){
		return $temparrays[$name];
	}else{
		return "";
	}
	
}

function adshow($adid){
    global $TaoConfig;
	if($TaoConfig["CustomAdListCode"][$adid]["status"]!="0"){
		
		$code = strtr((html_entity_decode($TaoConfig["CustomAdListCode"][$adid]["code"],ENT_QUOTES)),$TaoConfig["ad_verible"]);
		
		echo($code);	
	}
}

function UpdateSystemVerible($str){
    global $TaoConfig;
	$url = strtr($str,$TaoConfig["ad_verible"]);
	return $url ;
}

function setapplication($key,$value,$file){
	global $rootroad;
	$temparrays = array ();
		//将所有数据都读出来
		
		$str = file_get_contents($file,true);
		$str = str_replace("<?php exit();?>","",$str);
		
		$temparrays = unserialize($str); 		
		if($key==""){
			$temparrays = $value;
		}else{
			$temparrays[$key] = $value;
		}
		
		//写入到缓存中.
		file_put_contents($file,'<?php exit();?>'.serialize($temparrays).'<?php exit();?>');//写入缓存
}
//设置GZIP
function ob_gzip($content){ 
	if(!headers_sent()&&extension_loaded("zlib")&&strstr($_SERVER["HTTP_ACCEPT_ENCODING"],"gzip")){ 
		$content = gzencode($content,9); 
		header("Content-Encoding: gzip"); 
		header("Vary: Accept-Encoding"); 
		header("Content-Length: ".strlen($content)); 
	} 
	return $content; 
} 
function Newiconv($_input_charset,$_output_charset,$input ) {

              $output = "";

              if($_input_charset == $_output_charset || $input ==null) {

                     $output = $input;

              } elseif (function_exists("mb_convert_encoding")){

                     $output = mb_convert_encoding($input,$_output_charset,$_input_charset);
              } elseif(function_exists("iconv")) {

                     $output = iconv($_input_charset,$_output_charset,$input);


              } else die("对不起，你的服务器系统无法进行字符转码.请联系空间商。");

              return $output;

}


function gbk_utf8(&$value, &$key = "", $userdata = "") {
     $value = Newiconv('GBK', 'UTF-8', $value);
}

function utf8_gbk(&$value, &$key = "", $userdata = "") {
     $value = Newiconv('UTF-8','GBK',  $value);
}


function showend(){
	global $TaoConfig;
	
	if(DEBUG && !empty($TaoConfig["db"])){
		echo"<div>数据库读取次数：".$TaoConfig["db"]->querynum."</div>";	
		
		if(count($TaoConfig["debug_query"])>0){
			foreach($TaoConfig["debug_query"] as $value){
				//echo"<div>sql：".$value["sql"]."   time:".$value["time"]."  row:".$value["explain"]["rows"]."</div>";	
			}
		}
	}
	
	if(DEBUG){
	global $read_data_num;
	global $pagestartime;
	global $read_cache_num;
echo "<div> API 读取次数 ".$read_data_num.","; 
echo "缓存读取次数 ".$read_cache_num.","; 
			$pageendtime = microtime(); 
			$starttime = explode(" ",$pagestartime); 
			$endtime = explode(" ",$pageendtime); 
			$totaltime = $endtime[0]-$starttime[0]+$endtime[1]-$starttime[1]; 
			$timecost = sprintf("%s",$totaltime); 
			$timecost = round($timecost, 3); 
			echo " 总执行时间: $timecost s</div>"; 
			
	}
	global $openGZIP;
	//结束GZIP
	if($openGZIP=="1"){
		ob_end_flush();
	}
}				

function get_neirong_str($type){
	global $pidsplit;
	global $default_soft_lang;
	
	$pages = application("",WEBROOT."data/singerpagedate.php");
	$singerpage =$pages["singerpagelist"];
	if(is_array($singerpage)){
		foreach($singerpage as $value){
			if($value["txtname"]==$type){
				$returnstr = strtr(stripslashes(html_entity_decode($value["pagedescription"],ENT_QUOTES)),$pidsplit);
				
				if($default_soft_lang=="UTF-8"){
					$returnstr = Newiconv("GBK","UTF-8",$returnstr);
				}
				
				return $returnstr ;
				
			}
		}
		
	}
	return "";
}

//数据库连接
function dbconnect() {
	global $TaoConfig;
	$_SC = $TaoConfig["DB_CONFIG"];
	if(empty($TaoConfig['db'])) {
		
		if($_SC["DB_HOST"]=="noinstall_taodiv6"){
			$TaoConfig["DB_OPEN"] = FALSE;
			
			redirect_to("install.php");
			exit();	
		}
		if($_SC["DB_HOST"]=="noinstall_taodiv6_not"){
			$TaoConfig["DB_OPEN"] = FALSE;
			
			return;
			//redirect_to("install.php");
			//exit();	
		}
		
		include_once(WEBROOT.'/include/class_mysql.php');
		$TaoConfig['db'] = new dbstuff;
		$TaoConfig['db']->charset = "utf8";
		$TaoConfig['db']->connect($_SC["DB_HOST"].":".$_SC["DB_PORT"], $_SC['DB_USER'], $_SC['DB_PWD'], $_SC['DB_NAME'], 20);
		$TaoConfig["DB_OPEN"] = TRUE;
	}
}

//获取到表名
function tname($name) {
	global $TaoConfig;
	return $TaoConfig['DB_CONFIG']['DB_PREFIX'].$name;
}

// 循环创建目录
function mk_dir($dir, $mode = 0777) {
	if (is_dir($dir) || @mkdir($dir, $mode))
	return true;
	if (!mk_dir(dirname($dir), $mode))
	return false;
	return @mkdir($dir, $mode);
}

function CheckSubstrs($substrs,$text)
{  
	foreach($substrs as $substr)  
		if(false!==strpos($text,$substr))  
		{  
			return true;  
		}  
			return false;  
}  
function TaodiisMobile()
{  
        $useragent=isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';  
        $useragent_commentsblock=preg_match('|\(.*?\)|',$useragent,$matches)>0?$matches[0]:'';  
          
          
        $mobile_os_list=array('Google Wireless Transcoder','Windows CE','WindowsCE','Symbian','Android','armv6l','armv5','Mobile','CentOS','mowser','AvantGo','Opera Mobi','J2ME/MIDP','Smartphone','Go.Web','Palm','iPAQ');  
              
        $mobile_token_list=array('Profile/MIDP','Configuration/CLDC-','160×160','176×220','240×240','240×320','320×240','UP.Browser','UP.Link','SymbianOS','PalmOS','PocketPC','SonyEricsson','Nokia','BlackBerry','Vodafone','BenQ','Novarra-Vision','Iris','NetFront','HTC_','Xda_','SAMSUNG-SGH','Wapaka','DoCoMo','iPhone','iPod');  
              
        $found_mobile=CheckSubstrs($mobile_os_list,$useragent_commentsblock) ||  
                  CheckSubstrs($mobile_token_list,$useragent);  
              
        if ($found_mobile)   
        {  
            return true;  
        }  
        else   
        {  
            return false;  
        }  
}  

//所有前台用到的函数

//根据一个栏目设置获取对应的数据
function GetArrByValue($parmvalue,$OtherParam = array(),&$count=0){
	global $TaoConfig;
	$returnArr = array();
	if($parmvalue["typeid"]==""){
		$parmvalue["typeid"]=GetDaohangVarNameToId($TaoConfig["pagename_template"]);
	}else{
		$parmvalue["urltype"]=GetDaohangIdToVarName($parmvalue["typeid"]);
	}
	
	if(empty($parmvalue["urltype"]) && $parmvalue["urltype"]) {
		$parmvalue["urltype"]=$TaoConfig["pagename_template"];
		$parmvalue["typeid"]=GetDaohangVarNameToId($TaoConfig["pagename_template"]);
	}
	

	$key = $parmvalue["keyid"];
	if(!empty($parmvalue["typeid"]) && isset($parmvalue["typeid"])){
		
		switch($parmvalue["typeid"])	{
			case "11":  //首页切换图及登陆框
				//设置
				
				$singerpagedate = $TaoConfig["singerpagedate"]["singerpagelist"];
				$returnArr = $singerpagedate["IndexDaohang_".$key]["SubTypesArray"];
				
				foreach($returnArr as $key=>$value){
					$value["url"] = GetDaohangUrl($value);
					$returnArr[$key] = $value;
				}
				break;
			case "12":  //综合分类导航
				//设置
				$singerpagedate = $TaoConfig["singerpagedate"]["singerpagelist"];
				$returnArr = array();
				
				if(isset($singerpagedate["IndexDaohang_".$key]) && count($singerpagedate["IndexDaohang_".$key])>0){
					$returnArr = GetAllDaohangLevelArr("IndexDaohang_".$key);
					
				}
				
			break;
			case "2":  //淘宝限时打折
				$param = array();
				$param = array_merge($parmvalue,$OtherParam);
				
				
				if(!empty($parmvalue["pronum"]))$param["page_size"] = $parmvalue["pronum"];
				if(empty($param["page_no"])) $param["page_no"] = 1;
				if(empty($param["page_size"])) $param["page_size"] = 10;
				if(!empty($param["vcate_id"])) $param["cid"] = $param["vcate_id"];
				
				if((empty($param["cid"])||$param["cid"]=="0") && empty($param["keyword"])){
						$param["keyword"] = "包邮";
				}
				
				
				$returnArr = GetTaoZheKou($param,$count);
			break;
			case "5":  //b2c商品栏目
				$param = array();
				
				$param = array_merge($param,$OtherParam);
				
				if(empty($param["keyword"]))$param["keyword"] = $parmvalue["keyword"];
				if(empty($param["vcate_id"]))$param["vcate_id"] = $parmvalue["vcate_id"];
				if(empty($param["mall_id"]))$param["mall_id"] = $parmvalue["mall_id"];
				if(empty($param["sort"]))$param["sort"] = $parmvalue["sort"];
				if(empty($param["page_size"]))$param["page_size"] = $parmvalue["page_size"];
				

				if(empty($param["page_no"])) $param["page_no"] = 1;
				if(empty($param["page_size"])) $param["page_size"] = 10;
				
				
				if(!empty($parmvalue["pronum"]))$param["page_size"] = $parmvalue["pronum"];
				
				
				$returnArr = GetB2CGou($param,$count);
			break;
			case "3":  //普通淘宝商品
				$param = array();
				$param = array_merge($parmvalue,$OtherParam);
				
				if(!empty($parmvalue["pronum"]))$param["page_size"] = $parmvalue["pronum"];
				if(empty($param["page_no"])) $param["page_no"] = 1;
				if(empty($param["page_size"])) $param["page_size"] = 10;
				if(!empty($param["vcate_id"])) $param["cid"] = $param["vcate_id"];
				
				if((empty($param["cid"])||$param["cid"]=="0") && empty($param["keyword"])){
						$param["keyword"] = "包邮";
				}


				$returnArr = GetTaoGou($param,$count);
			break;
			case "10":  //卖家推荐商品
				$param = array();
				$param = array_merge($param,$OtherParam);
				if(empty($param["seller_id"]))$param["seller_id"] = $parmvalue["userid"];
				if(empty($param["num_iid"]))$param["num_iid"] = $parmvalue["num_iid"];
				if(empty($param["relate_type"]))$param["relate_type"] = $parmvalue["relate_type"];
				
				if(!empty($parmvalue["pronum"]))$param["max_count"] = $parmvalue["pronum"];
				
				
				$returnArr = GetTaoSeller($param,$count);
				
			break;
			case "4":  //分享商品栏目
				$param = array();
				$param = array_merge($param,$OtherParam);
				
				if(empty($param["page_size"]))$param["page_size"] = $parmvalue["page_size"];
				if(empty($param["page_no"])) $param["page_no"] = 1;
				if(empty($param["page_size"])) $param["page_size"] = 10;
				if(empty($param["userid"])) $param["userid"] = -1;
				if(empty($param["is_index"])) $param["is_index"] = -1;
				if(!empty($parmvalue["pronum"]))$param["page_size"] = $parmvalue["pronum"];
				if(!empty($parmvalue["sort"]))$parmvalue["sort"] = "last_time ";
				
				$returnArr = GetArrSharePro($parmvalue["vcate_id"],$parmvalue["keyword"],$param["page_size"],$param["page_no"],$param["is_index"],$param["userid"],$parmvalue["sort"],$count);
				
				
			break;
			case "7":  //分享商品,只调用后台发布的
				$param = array();
				$param = array_merge($parmvalue,$OtherParam);
				
				
				
				if(empty($param["page_size"]))$param["page_size"] = $parmvalue["page_size"];
				if(empty($param["page_no"])) $param["page_no"] = 1;
				if(empty($param["page_size"])) $param["page_size"] = 10;
				if(empty($param["userid"])) $param["userid"] = 0;
				if(empty($param["is_index"])) $param["is_index"] = -1;
			
				if(!empty($parmvalue["pronum"]))$param["page_size"] = $parmvalue["pronum"];
				if(!empty($parmvalue["sort"]))$parmvalue["sort"] = "last_time ";
				
				$returnArr = GetArrSharePro($parmvalue["vcate_id"],$parmvalue["keyword"],$param["page_size"],$param["page_no"],$param["is_index"],$param["userid"],$parmvalue["sort"],$count);
				
				
				
			break;
			case "15":  //拍拍商品搜索
				$param = array();
				
				$param = array_merge($param,$OtherParam);
				
				if(empty($param["keyword"]))$param["keyword"] = $parmvalue["keyword"];
				if(empty($param["vcate_id"]))$param["vcate_id"] = $parmvalue["vcate_id"];
				if(empty($param["sort"]))$param["sort"] = $parmvalue["sort"];
				if(empty($param["page_size"]))$param["page_size"] = $parmvalue["page_size"];

				if(empty($param["page_no"])) $param["page_no"] = 1;
				if(empty($param["page_size"])) $param["page_size"] = 10;
				
				if(!empty($parmvalue["pronum"]))$param["page_size"] = $parmvalue["pronum"];
		
				$returnArr = GetPaiGou($param,$count);
				
				
			break;
			
			case "1":  //店铺列表
				$param = array();
				$param = array_merge($param,$OtherParam);
				
				if(empty($param["page_size"]))$param["page_size"] = $parmvalue["page_size"];
				if(empty($param["page_no"])) $param["page_no"] = 1;
				if(empty($param["page_size"])) $param["page_size"] = 10;
				if(!empty($parmvalue["pronum"]))$param["page_size"] = $parmvalue["pronum"];
				
				$returnArr = GetTaodianpu($param,$count);
				
			break;
			default:
		}
		
	//转码
		if($TaoConfig["default_lang"]=="UTF-8"){
			array_walk_recursive($returnArr,"gbk_utf8");
		}
		
		
		return $returnArr;
	}
}

//获得所有后台发布商品分类
function GetArrShareTypes(){
	global $TaoConfig;
	dbconnect();
	if(!$TaoConfig["ArrShareTypes"]){
		$cate_list = fetch_Allarray("select * from ".tname('items_cate')." order by ordid,id");
		//转码
		if($TaoConfig["default_lang"]=="GBK"){
			array_walk_recursive($cate_list,"utf8_gbk");
		}
		$TaoConfig["ArrShareTypes"] = $cate_list;
	}
	return $TaoConfig["ArrShareTypes"];
}
//根据上级id查询发布商品分类
function GetArrShareTypesSearch($pid){
	global $TaoConfig;
	dbconnect();
	$ids = GetArrShareTypes();
	$returns = array();
	foreach($ids as $val){
		if($val[pid]==$pid){
			$returns[] = $val;
		}
	}
	
	return $returns;
}
//获得子类id集合
function GetArrShareTypes_allid($pid,&$return_arr = ""){
	global $TaoConfig;
	$id_list = GetArrShareTypes();
	foreach($id_list as $val){
		if($val[pid]==$pid){
			$return_arr.= ",".$val[id];
			GetArrShareTypes_allid($val[id],$return_arr);
		}
	}
	
	return $return_arr;
}
 

//调用商品api:读取分享商品
function GetArrSharePro($catid=0,$keyword="",$num=5,$page=1,$is_index=1,$uid=0,$sort="add_time",&$count){
	global $TaoConfig;
	dbconnect();
	if(!$TaoConfig["DB_OPEN"]) return array();
	if(!$sort) $sort="add_time";
	
	$where = tname('items').".status=1" ;
	
	if($catid!=0) {
		
		$id_list = GetArrShareTypes_allid($catid,$catid);
		
		$where.=" and cid in (".$catid.") ";
	}
	if($keyword!="") $where.=" and title like '%".Newiconv("GBK","UTF-8",$keyword)."%'";
	if($is_index!=-1) $where.=" and is_index=".$is_index;
	
	if($uid>-1) $where.=" and uid=".$uid;
	
	
	$count = fetch_Onearray("SELECT count(*) as count,sum(likes) as likes FROM ".tname('items')."  where $where");

	if($uid==-2) $where.=" and name<>'' " ;
	
	$start = ($page-1)*$num;
	
	
	$query = $TaoConfig['db']->query("SELECT ".tname('items').".*,".tname('user').".name as uname,".tname('user').".img as uimg  FROM ".tname('items')." LEFT JOIN ".tname('user')." on ".tname('items').".uid=".tname('user').".id where $where order by $sort desc LIMIT $start,$num" );
	


	$items = array();
	
	while ($value = $TaoConfig['db']->fetch_array($query)) {
		$items[] = $value;
	}
	//转码
	if($TaoConfig["default_lang"]=="GBK"){
		array_walk_recursive($items,"utf8_gbk");
	}
	
	foreach($items as $key=>$value){
		$value["urltype"]="shareproduct";
		$value["item_id"]=$value["id"];
		
		$value["title"]=strip_tags($value["title"]);
		if(substr($value["item_key"],0,7)=="taobao_") {
			$value["tao_iid"]=str_replace("taobao_","",$value["item_key"]);
		}
		
		if(substr($value["item_key"],0,7)=="paipai_" || substr($value["item_key"],0,7)=="handel_") {
			$value["pai_url"] = GetClickUrl($value["url"],"share_".$valuepro["commId"]);
		}else{
			$value["pai_url"] = "#";
		}
		
		
		
		if($TaoConfig["applicationdata"]["GJconfig"]["listlinktype"]!="localitem"){
			if(strpos($value["url"],"click.taobao") > 1){
				$value["url"] = GetClickUrl($value["url"],"share_".$valuepro["commId"]);
				$value["pai_url"] = $value["url"];
			}
				$value["target"] = "_blank";
				$value["rel"] = " rel='nofollow'"; 
		}else{
				$value["target"] = "_blank";
				$value["rel"] = " rel='nofollow'";
			$value["url"] = GetDaohangUrl($value);
			$value["pai_url"] = $value["url"];
		}
		
		
		
		
		if(empty($value["uimg"])) $value["uimg"] =$TaoConfig["rootroad"]."/img/nohead.jpg";
		if(empty($value["uname"])) $value["uname"] ="管理员";
		
		$items[$key] = $value;
	}


	foreach($items as $key=>$valuepro){
		
			$valuepro["click_url_base64"] = GetClickUrl($valuepro["url"],$valuepro["item_key"]);
			if(empty($valuepro["usernick"]))$valuepro["usernick"]="管理员";
			$valuepro["pic_url"] = $valuepro["bimg"];
			$items[$key] = $valuepro;
	}

	
	return $items;
}


function GetProductCaiji_tao($url){
	
error_reporting(7);  //设为7时，可以显示php报错详细信息
	
			$regex = '/id=([0-9]*)/i';
			$matches = array();
			if(preg_match($regex, $url, $matches)){
				$iid = ($matches[1]);
			}
			if($iid=="") return 0;
			
			$date = array();
			$Taoapi_Util = new Taoapi_Util();
			$Taoapi_Util->fetch($url);
			$result = $Taoapi_Util->results;
			
			
			//标题
			$regex = '/<title>(.*)<\/title>/i';
			$matches = array();
			if(preg_match($regex, $result, $matches)){
					$date["item"]["title"] = Newiconv("GBK","UTF-8",str_replace("-淘宝网","",$matches[1]));
			}
			
			//价格
			$regex = '/<em class="tb-rmb-num">(.+)<\/em>/i';
			$matches = array();
			if(preg_match($regex, $result, $matches)){
					$date["item"]["price"] = ($matches[1]);
			}
			
			//pic
			$regex = '/http:\/\/img(.+)_310x310\.jpg/i';
			$matches = array();
			if(preg_match($regex, $result, $matches)){
					$date["item"]["img"] = ($matches[0]);
			}
			
			$date["item"]["click_url"] = $url;
			$date["item"]["key"] = "taobao_".$iid;
			
			return $date;
}


function GetProductCaiji_tmall($url){
	
error_reporting(7);  //设为7时，可以显示php报错详细信息
	
			$regex = '/id=([0-9]*)/i';
			$matches = array();
			if(preg_match($regex, $url, $matches)){
				$iid = ($matches[1]);
			}
			if($iid=="") return 0;
			
			$date = array();
			$Taoapi_Util = new Taoapi_Util();
			$Taoapi_Util->fetch($url);
			$result = $Taoapi_Util->results;
			
			
			//标题
			$regex = '/<title>(.*)<\/title>/i';
			$matches = array();
			if(preg_match($regex, $result, $matches)){
					$date["item"]["title"] = Newiconv("GBK","UTF-8",str_replace("-淘宝网","",$matches[1]));
			}
			
			//pic
			$regex = '/<span id\="J_ImgBooth\" src\=\"(.*)"><\/span>/i';
			$matches = array();
			if(preg_match($regex, $result, $matches)){
					$date["item"]["img"] = ($matches[1]);
					
			}
			
			//价格
			$regex = '/<strong class\="J_originalPrice">(.*)<\/strong>/i';
			$matches = array();
			if(preg_match($regex, $result, $matches)){
					$date["item"]["price"] = ($matches[1]);
			}
			
			
			$date["item"]["click_url"] = $url;
			$date["item"]["key"] = "taobao_".$iid;
			
			
			return $date;
}


//调用商品api:根据网址采集商品
function GetUrlProduct($url){
	global $paipai_appOAuthID, $paipai_appOAuthkey, $paipai_accessToken, $paipai_uin,$setCacheTime,$TaoConfig,$paipai_uid;
	global $userpiddp,$Taoapi,$TaoConfig;

	$date = array();
	
	if(strpos($url,"taobao.com")>1){
				$date = GetProductCaiji_tao($url);
	return $date;
	}
	if(strpos($url,"tmall.com")>1){
				$date = GetProductCaiji_tmall($url);
	return $date;
	}
	if(strpos($url,"taobao.com")>1 || strpos($url,"tmall.com")>1){
				$regex = '/id=([0-9]*)/i';
				$matches = array();
				if(preg_match($regex, $url, $matches)){
					$iid = ($matches[1]);
				}
				
				if($iid=="") return 0;
				
				
				$Taoapi->method = 'taobao.item.get';
				$Taoapi->fields = 'num_iid,title,nick,price,pic_url,detail_url';
				$Taoapi->num_iid = $iid;
				$TaoapiItem = $Taoapi->Send('get','xml')->getArrayData();
				$date = $TaoapiItem;
				$date["item"]["click_url"]	= ($date["item"]["detail_url"]);				
				$date["item"]["img"]	= ($date["item"]["pic_url"]);				
				$date["item"]["url"]	= ($date["item"]["detail_url"]);				
				$date["item"]["key"]	= "taobao_".$iid;				
				
				$ret = fetch_Onearray("select * from ".tname('items')." where item_key='taobao_".$iid."'");
				if(isset($ret["id"]) && $ret!="0" && is_array($ret)){
					$date["item"]["isown"] = "ok";
				}				
				
				
	return $date;
	}
	if(strpos($url,"paipai.com")>1){
		//http://auction1.paipai.com/8456F632000000000401000024F3DB9C?PTAG=40042.2.7
		
				if(strpos($url,"?")>1) {
					$regex = '/paipai.com\/(.*)(\?)/i';
				}else{
					$regex = '/paipai.com\/(.*)/i';
				}
				$matches = array();
				if(preg_match($regex, $url, $matches)){
					$iid = ($matches[1]);
					
					if(strpos($iid,".")>1){
						$iid = substr($iid,0,strpos($iid,"."));	
					}
					
				}
				if($iid=="") return array();
				
				$paipaipro = GetPaiProduct($iid,0);
				
				$date["item"] = $paipaipro[0];
				$date["item"]["img"]	= ($date["item"]["pic_url"]);				
				$date["item"]["title"]	= newiconv("GBK","UTF-8",($date["item"]["title"]));				
				$date["item"]["url"]	= $date["item"]["sClickUrl"];				
				$date["item"]["key"]	= "paipai_".$iid;				
				$ret = fetch_Onearray("select * from ".tname('items')." where item_key='paipai_".$iid."'");
				if(isset($ret["id"]) && $ret!="0" && is_array($ret)){
					$date["item"]["isown"] = "ok";
				}
				
	return $date;
	}
	
	return 0;	
}


//调用商品api:淘宝折扣商品(已过期)
function GetTaoZheKou_old($param,&$count = 0){
	global $userpiddp,$Taoapi,$TaoConfig;
	//可以提交的字段,除了这些字段，其余不提交到淘宝
	$is_field = array();
	$is_field["pid"] = 1;
	$is_field["nick"] = 1;
	$is_field["outer_code"] = 1;
	$is_field["is_mobile"] = 1;
	$is_field["keyword"] = 1;
	$is_field["coupon_type"] = 1;
	$is_field["cid"] = 1;
	$is_field["shop_type"] = 1;
	$is_field["sort"] = 1;
	$is_field["start_coupon_rate"] = 1;
	$is_field["end_coupon_rate"] = 1;
	$is_field["start_credit"] = 1;
	$is_field["end_credit"] = 1;
	$is_field["start_commission_rate"] = 1;
	$is_field["end_commission_rate"] = 1;
	$is_field["start_commission_volume"] = 1;
	$is_field["end_commission_volume"] = 1;
	$is_field["start_commission_num"] = 1;
	$is_field["end_commission_num"] = 1;
	$is_field["start_volume"] = 1;
	$is_field["end_volume"] = 1;
	$is_field["area"] = 1;
	$is_field["fields"] = 1;
	$is_field["page_no"] = 1;
	$is_field["page_size"] = 1;
	
	
		$Taoapi->method = 'taobao.taobaoke.items.coupon.get';
				$Taoapi->fields = 'num_iid,title,nick,pic_url,price,click_url,commission,commission_rate,commission_num,commission_volume,shop_click_url,seller_credit_score,item_location,volume,coupon_price,coupon_rate,coupon_start_time,coupon_end_time,shop_type';
				$Taoapi->pid = $userpiddp;
				
				foreach($param as $field=>$values){
					if($values!="0" && !empty($values) && $is_field[$field]){
						$Taoapi->$field = $values;
					}
				}
				
				
				if($ismobileAgent)$Taoapi->is_mobile = "true";
				if($ismall=="1")$Taoapi->mall_item = "true";
				$Taoapi->keyword = Newiconv("GBK","UTF-8",$Taoapi->keyword);
				
				
				$Taoapireturn = $Taoapi->Send('get','xml')->getArrayData();
				
				if(is_array($Taoapireturn)) {
				
					//转码
					array_walk_recursive($Taoapireturn,"utf8_gbk");
					$count = $Taoapireturn["total_results"];
	
					$indexcache = array();
					
					if(is_array($Taoapireturn["taobaoke_items"]["taobaoke_item"])){
						if(!empty($Taoapireturn["taobaoke_items"]["taobaoke_item"]["title"])){
							$indexcache[] = $Taoapireturn["taobaoke_items"]["taobaoke_item"];			
						}else{
							$indexcache =  array_merge($indexcache,$Taoapireturn["taobaoke_items"]["taobaoke_item"]);
						}
					}
					if(count($indexcache)>$param["page_size"]){
						array_splice($indexcache,$param["page_size"]);
					}
					
					foreach($indexcache as $key=>$valuepro){
							$valuepro["target"] = $param["target"];
							$valuepro["click_url_base64"] = GetClickUrl($valuepro["click_url"],"taobao_".$valuepro["num_iid"]);
							$valuepro["shop_click_url_base64"] =GetClickUrl($valuepro["shop_click_url"],"taoshop_".$valuepro["nick"]);
							$valuepro["urltype"]="taoproduct";
							$valuepro["item_id"]=$valuepro["num_iid"];
							
							if($TaoConfig["applicationdata"]["GJconfig"]["listlinktype"]!="localitem"){
								$valuepro["url"] =  GetClickUrl($valuepro["click_url"],"taobao_".$valuepro["num_iid"]);
								$valuepro["rel"] = " rel='nofollow'";
								if($valuepro["target"]=="") $valuepro["target"]="_blank";
								
								
							}else{
								if($valuepro["target"]=="") $valuepro["target"]="_blank";
								$valuepro["url"] = GetDaohangUrl($valuepro);
								$valuepro["url"] = GetClickUrl($valuepro["click_url"],"taobao_".$valuepro["num_iid"]);
							}
							
							
							$indexcache[$key] = $valuepro;
					}
					
					
					
					
				}				
	return $indexcache;
}

//调用商品api:帝国api
function GetTaoZheKou($param,&$count=0,&$sortarr=array(),&$typearr=array()){
	global $userpiddp,$Taoapi,$TaoConfig;
	//可以提交的字段,除了这些字段，其余不提交到淘宝
	
	$Taoapireturn = cnmysoft_taoapi_search($param["keyword"],$param["vcate_id"],$param["start"],$param["sort"],$param["start_price"],$param["end_price"]);
	
	
				
				
				if(is_array($Taoapireturn)) {
				
					//转码
					
					$count = $Taoapireturn["total_results"];
					$sortarr =  $Taoapireturn["sort"];
					$typearr =  array();
					if(isset($Taoapireturn["navs"])){
					foreach($Taoapireturn["navs"] as $key=>$val){
						$cat = array();
						$cat["name"] = $Taoapireturn["navs"][$key];
						$cat["vcate_id"] = $Taoapireturn["navscat"][$key];
						$cat["vcate_num"] = $Taoapireturn["navnum"][$key];
						$typearr[] = $cat;
					}
					}
					
					
					$indexcache = array();
					
					
					$num = 0;
					if(isset($Taoapireturn["idlist"])){
					foreach($Taoapireturn["idlist"] as $key=>$val){
						$num++;
							$valuepro = array();
							$valuepro["target"] = $param["target"];
							$valuepro["urltype"]="taoproduct";
							$valuepro["tao_iid"]=$val;
							$valuepro["item_id"]=$val;
							$valuepro["title"]=$Taoapireturn["titlelist"][$key];
							$valuepro["price"]=$Taoapireturn["pricelist"][$key];
							$valuepro["num_iid"]=$val;
							
							$valuepro["target"]="_blank";
							$valuepro["url"] = GetClickUrl("","taobao_".$valuepro["tao_iid"]);

							$indexcache[$key] = $valuepro;
							
							if($num>=intval($param["page_size"])){
								break;	
							}
							
					}
					}
					
					
				}				
	return $indexcache;
}

//调用商品api:调用普通淘宝商品列表
function GetTaoGou($param,&$count = 0){
	global $userpiddp,$Taoapi,$TaoConfig;
	//可以提交的字段,除了这些字段，其余不提交到淘宝
	$is_field = array();
	$is_field["fields"] = 1;
	$is_field["nick"] = 1;
	$is_field["pid"] = 1;
	$is_field["keyword"] = 1;
	$is_field["cid"] = 1;
	$is_field["start_price"] = 1;
	$is_field["end_price"] = 1;
	$is_field["auto_send"] = 1;
	$is_field["area"] = 1;
	$is_field["start_credit"] = 1;
	$is_field["end_credit"] = 1;
	$is_field["sort"] = 1;
	$is_field["guarantee"] = 1;
	$is_field["start_commissionRate"] = 1;
	$is_field["end_commissionRate"] = 1;
	$is_field["start_commissionNum"] = 1;
	$is_field["end_commissionNum "] = 1;
	$is_field["start_totalnum"] = 1;
	$is_field["end_totalnum"] = 1;
	$is_field["cash_coupon"] = 1;
	$is_field["vip_card"] = 1;
	$is_field["overseas_item"] = 1;
	$is_field["sevendays_return"] = 1;
	$is_field["real_describe"] = 1;
	$is_field["onemonth_repair"] = 1;
	$is_field["cash_ondelivery"] = 1;
	$is_field["mall_item"] = 1;
	$is_field["page_no"] = 1;
	$is_field["page_size"] = 1;
	$is_field["outer_code"] = 1;
	$is_field["is_mobile"] = 1;
	
	
	
	
				$Taoapi->method = 'taobao.tbk.items.get';
				$Taoapi->fields = 'num_iid,title,nick,pic_url,price,click_url,commission,commission_rate,commission_num,commission_volume,shop_click_url,seller_credit_score,item_location,volume';
				$Taoapi->pid = $userpiddp;
				
				foreach($param as $field=>$values){
					if($values!="0" && !empty($values) && $is_field[$field]){
						$Taoapi->$field = $values;
					}
				}
				

				if($ismobileAgent)$Taoapi->is_mobile = "true";
				if($ismall=="1")$Taoapi->mall_item = "true";
				$Taoapi->keyword = Newiconv("GBK","UTF-8",$Taoapi->keyword);
				$Taoapi->start_credit = $shoplevelstart;
				$Taoapi->end_credit  = $shoplevelend;
				$Taoapi->start_commissionRate  = $stratmoneyKeys;
				$Taoapi->end_commissionRate  = $endmoneyKeys;
				
				$Taoapireturn = $Taoapi->Send('get','xml')->getArrayData();
				
				
				if(is_array($Taoapireturn)) {
					//转码
					array_walk_recursive($Taoapireturn,"utf8_gbk");
					$count = $Taoapireturn["total_results"];
					
					$indexcache = array();
					
					if(is_array($Taoapireturn["tbk_items"]["tbk_item"])){
						if(!empty($Taoapireturn["tbk_items"]["tbk_item"]["title"])){
							$indexcache[] = $Taoapireturn["tbk_items"]["tbk_item"];			
						}else{
							$indexcache =  array_merge($indexcache,$Taoapireturn["tbk_items"]["tbk_item"]);
						}
					}
					if(count($indexcache)>$param["page_size"]){
						array_splice($indexcache,$param["page_size"]);
					}
					foreach($indexcache as $key=>$valuepro){
							//$valuepro["target"] = $parmvalue["target"];
							$valuepro["click_url_base64"] = GetClickUrl($valuepro["item_url"],"taobao_".$valuepro["num_iid"]);
							$valuepro["shop_click_url_base64"] =GetClickUrl($valuepro["shop_url"],"taoshop_".$valuepro["nick"]);
							$valuepro["urltype"]="taoproduct";
							$valuepro["item_id"]=$valuepro["num_iid"];
							$valuepro["tao_iid"]=$valuepro["num_iid"];
							
							$valuepro["seller_credit_score"]="0";
							if($TaoConfig["applicationdata"]["GJconfig"]["listlinktype"]!="localitem"){
								$valuepro["url"] =  GetClickUrl($valuepro["item_url"],"taobao_".$valuepro["num_iid"]);
								$valuepro["rel"] = " rel='nofollow'";
								if($valuepro["target"]=="") $valuepro["target"]="_blank";
							}else{
								if($valuepro["target"]=="") $valuepro["target"]="_blank";
								$valuepro["url"] =GetDaohangUrl($valuepro);
								$valuepro["url"] =  GetClickUrl($valuepro["item_url"],"taobao_".$valuepro["num_iid"]);
								
							}
							$indexcache[$key] = $valuepro;
					}
				}
				
		
				
				
	return $indexcache;
}


//调用商品api:调用普通淘宝店铺列表
function GetTaodianpu($param,&$count = 0){
	global $userpiddp,$Taoapi,$TaoConfig;
	//可以提交的字段,除了这些字段，其余不提交到淘宝
	$is_field = array();
	$is_field["fields"] = 1;
	$is_field["nick"] = 1;
	$is_field["pid"] = 1;
	$is_field["outer_code"] = 1;
	$is_field["keyword"] = 1;
	$is_field["cid"] = 1;
	$is_field["start_credit"] = 1;
	$is_field["end_credit"] = 1;
	$is_field["start_commissionrate"] = 1;
	$is_field["end_commissionrate"] = 1;
	$is_field["start_auctioncount"] = 1;
	$is_field["end_auctioncount  "] = 1;
	$is_field["start_totalaction"] = 1;
	$is_field["end_totalaction"] = 1;
	$is_field["only_mall"] = 1;
	$is_field["sort_field"] = 1;
	$is_field["sort_type"] = 1;

	$is_field["is_mobile"] = 1;
	$is_field["page_no"] = 1;
	$is_field["page_size"] = 1;

	
	
				$Taoapi->method = 'taobao.taobaoke.shops.get';
				$Taoapi->fields = 'user_id,click_url,shop_title,commission_rate,seller_credit,shop_type,auction_count,total_auction';
				$Taoapi->pid = $userpiddp;
				
				
				
				foreach($param as $field=>$values){
					if($values!="0" && !empty($values) && $is_field[$field]){
						$Taoapi->$field = $values;
					}
				}
				if($ismobileAgent)$Taoapi->is_mobile = "true";
				if($ismall=="1")$Taoapi->mall_item = "true";
				$Taoapi->keyword = Newiconv("GBK","UTF-8",$Taoapi->keyword);
				
				$Taoapi->start_credit = $shoplevelstart;
				$Taoapi->end_credit  = $shoplevelend;
				$Taoapi->start_commissionrate  = $stratmoneyKeys;
				$Taoapi->end_commissionrate  = $endmoneyKeys;
				
				if(empty($Taoapi->start_credit)){
					$Taoapi->start_credit = "5diamond";	
					$Taoapi->end_credit = "5goldencrown";	
				}
				if(empty($Taoapi->start_commissionrate)){
					$Taoapi->start_commissionrate = "250";	
					$Taoapi->start_commissionrate = "8000";	
				}
				
					$Taoapireturn = $Taoapi->Send('get','xml')->getArrayData();
					//转码
					$count = $Taoapireturn["total_results"];
					
				
					$indexcache = array();
					
					if(is_array($Taoapireturn["taobaoke_shops"]["taobaoke_shop"])){
						if(!empty($Taoapireturn["taobaoke_shops"]["taobaoke_shop"]["shop_title"])){
							$indexcache[] = $Taoapireturn["taobaoke_shops"]["taobaoke_shop"];			
						}else{
							$indexcache =  array_merge($indexcache,$Taoapireturn["taobaoke_shops"]["taobaoke_shop"]);
						}
					}
				if(is_array($indexcache)) {
					
					array_walk_recursive($indexcache,"utf8_gbk");
					
					foreach($indexcache as $key=>$valuepro){
							$valuepro["click_url_base64"] = GetClickUrl($valuepro["click_url"],"0");
							$valuepro["rel"] = " rel='nofollow'";
							$indexcache[$key] = $valuepro;
							
					}
					
					if(count($indexcache)>$param["page_size"] && $param["page_size"]!=""){
						array_splice($indexcache,$param["page_size"]);
					}
				
				}
	return $indexcache;
}


////调用商品api:调用淘宝商品详情
function GetTaoProduct($num_iid){
	global $userpiddp,$Taoapi,$TaoConfig;
				
				$Taoapi->method = 'taobao.taobaoke.items.detail.get';
				$Taoapi->fields = 'desc,auction_point,stuff_status,has_invoice,has_warranty,has_showcase,property_alias,input_pids,input_str,type,seller_cids,props,input_pids,cid,title,post_fee,express_fee,ems_fee,location,click_url,shop_click_url,seller_credit_score,nick,pic_url,price,cid,num,list_time,delist_time,location,props_name,stuff_status';
				$Taoapi->pid = $userpiddp;
				$Taoapi->num_iids = $num_iid;
				
				if($ismobileAgent)$Taoapi->is_mobile = "true";
				
				$Taoapireturn = $Taoapi->Send('get','xml')->getArrayData();
				//转码
				array_walk_recursive($Taoapireturn,"utf8_gbk");
				
				
				$indexcache = array();
				
				if(is_array($Taoapireturn["taobaoke_item_details"]["taobaoke_item_detail"])){
					if(isset($Taoapireturn["taobaoke_item_details"]["taobaoke_item_detail"]["click_url"])){
						$indexcache[] = $Taoapireturn["taobaoke_item_details"]["taobaoke_item_detail"];			
					}else{
						$indexcache =  array_merge($indexcache,$Taoapireturn["taobaoke_item_details"]["taobaoke_item_detail"]);
					}
				}
				foreach($indexcache as $key=>$valuepro){
						$valuepro["click_url_base64"] = GetClickUrl($valuepro["click_url"],"taobao_".$num_iid);
						$valuepro["shop_click_url_base64"] =GetClickUrl($valuepro["shop_click_url"],"taoshop_".$valuepro["nick"]);
						$valuepro = array_merge($valuepro,$valuepro["item"]);
						$valuepro["item"] = "";
						$valuepro["num_iid"] = $num_iid;
						$indexcache[$key] = $valuepro;
				}
				
				
				
				
	return $indexcache;
}

//调用商品api:拍拍商品详情
function GetPaiProduct($num_iid,$getinfo=1){
	global $paipai_appOAuthID, $paipai_appOAuthkey, $paipai_accessToken, $paipai_uin,$setCacheTime,$TaoConfig,$paipai_uid;
	
	$paipai_sdk = new PaiPaiOpenApiOauth($paipai_appOAuthID, $paipai_appOAuthkey, $paipai_accessToken, $paipai_uin);
	$paipai_sdk->Cache->setCacheTime($setCacheTime);
    $paipai_sdk->setMethod("get");//post
    $paipai_sdk->setCharset("utf-8");//gbk
				
			    $params = &$paipai_sdk->getParams();//注意，这里使用的是引用，故可以直接使用
				$paipai_sdk->setApiPath("/cps/cpsCommQueryAction.xhtml");//这个是用户需要调用的 接口函数
				$params["commId"] = $num_iid;
				$params["userId"] = $paipai_uid;
				$Taoapireturn = $paipai_sdk->invoke();
				
				if($getinfo){
				$paipai_sdk->setApiPath("/item/getItemDetailInfo.xhtml");
				$params["itemCode"] = $num_iid;
				$detail = $paipai_sdk->invoke();
				}
				
				//转码
				array_walk_recursive($Taoapireturn,"utf8_gbk");
				array_walk_recursive($detail,"utf8_gbk");
				
				
				$indexcache = array();
				
				$indexcache = array();
				
				if(is_array($Taoapireturn["cpsSearchCommData"])){
						if($getinfo) $Taoapireturn["cpsSearchCommData"]["desc"] = $detail["detailInfo"];
						$indexcache[] = $Taoapireturn["cpsSearchCommData"];			
				}
				
				
				foreach($indexcache as $key=>$valuepro){
						$valuepro["click_url_base64"] = GetClickUrl($valuepro["sClickUrl"],"paipai_".$num_iid);
						$valuepro["shop_click_url_base64"] =GetClickUrl($valuepro["sClickUrl"],"paishop_".$valuepro["nick"]);
						
						$valuepro["url"] = GetClickUrl($valuepro["sClickUrl"]);
						
						$valuepro["title"] = $valuepro["sTitle"];
						$valuepro["volume"] = $valuepro["dwTotalPayNum"];
						$valuepro["pic_url"] = $valuepro["sCommImgUrl"];
						
						if($valuepro["dwMarketPrice"]!="0"){
							
						$valuepro["price"] = $valuepro["dwMarketPrice"]/100;
						$valuepro["coupon_price"] = $valuepro["dwPrice"]/100;
							
						}else{
							
							$valuepro["price"] = $valuepro["dwPrice"]/100;
						}
						
						
						$valuepro["num_iid"] = $num_iid;
						$indexcache[$key] = $valuepro;
				}
				
				
				
				
	return $indexcache;
}

////调用商品api:淘宝商品折扣价格
function GetTaoProductZhePrice($proarr){
	global $userpiddp,$Taoapi,$TaoConfig;
				
				//转码
				$vpro = $proarr;
	array_walk_recursive($vpro,"gbk_utf8");
	
	if($vpro["old_title"]=="" || empty($vpro["old_title"])) $vpro["old_title"] = $vpro["title"];
				
				
				
				//读取打折信息
				$Taoapi->method = 'taobao.taobaoke.items.coupon.get';
				$Taoapi->fields = 'num_iid,price,volume,coupon_price,coupon_end_time,shop_type';
				$Taoapi->pid = $userpiddp;
				$Taoapi->page_no = 1;
				$Taoapi->page_size = 40;
				$Taoapi->keyword = $vpro["old_title"];
				$Taoapi->area 	 = $vpro["location"]["state"];
				$Taoapi->cid = $vpro["cid"];
				$TaoapiItems_coupon_price = $Taoapi->Send('get','xml')->getArrayData();
				
				$TaoapiItems_coupon_price = $TaoapiItems_coupon_price["taobaoke_items"]["taobaoke_item"];
				
				
				
				if($TaoapiItems_coupon_price["num_iid"]!=""){
					$coupon_price = "".$TaoapiItems_coupon_price["coupon_price"];
					$volume = $TaoapiItems_coupon_price["volume"];
					if(is_array($click_url) || empty($click_url)) $click_url=$TaoapiItems_coupon_price["click_url"];
					if(is_array($shop_click_url) || empty($shop_click_url)) $shop_click_url=$TaoapiItems_coupon_price["shop_click_url"];
					
				}else{
					if(count($TaoapiItems_coupon_price)>1){
						foreach($TaoapiItems_coupon_price as $arr_coupon_price){
							if($arr_coupon_price["num_iid"]==$vpro["num_iid"]){
								$coupon_price = "".$arr_coupon_price["coupon_price"];
								$volume = $arr_coupon_price["volume"];
								break;	
							}
						}
					}
				}
							
				$proarr["coupon_price"]=$coupon_price;
				$proarr["volume"]=$volume;
				
				
	return $proarr;
}

//调用商品api:调用b2c商品
function GetB2cProduct($iid){
	global $userpiddp,$api59miao,$TaoConfig;
				
				$fields = 'iid,click_url,seller_url,title,sid,seller_name,cid,desc,pic_url,price,cash_ondelivery,freeshipment,installment,has_invoice,modified,price_reduction,price_decreases,original_price';
				$Api59miaoData=$api59miao->ListItemsDetail($iid,'',$fields);
				
				$taobaoke_items = $Api59miaoData["items"]["item"];
				//转码
						
				$indexcache = array();
				
				$indexcache = $taobaoke_items;			

				$indexcache["click_url_base64"] = GetClickUrl($indexcache["click_url"],"b2c_".$iid);
				$indexcache["shop_click_url_base64"] =GetClickUrl($indexcache["seller_url"],"b2cshop_".$indexcache["sid"]);
				
				
	return $indexcache;
}
//调用商品api:调用淘宝卖家信息
function GetTaoShop($nick){
	global $userpiddp,$Taoapi,$TaoConfig;
				
				$Taoapi->method = 'taobao.shop.get';
				$Taoapi->fields = 'sid,cid,title,nick,desc,bulletin,pic_path,created,modified,shop_score,click_url';
				$Taoapi->nick = Newiconv("GBK","UTF-8",$nick);
				
				$Taoapireturn = $Taoapi->Send('get','xml')->getArrayData();
				//转码
				array_walk_recursive($Taoapireturn,"utf8_gbk");
				
				
				$indexcache = array();
				
				if(is_array($Taoapireturn["shop"])){
					$indexcache = $Taoapireturn["shop"];
				}
				
				
					$indexcache["click_url_base64"] = GetClickUrl($indexcache["click_url"],"taonick_".$nick);
					$indexcache["pic_path"] = "http://logo.taobaocdn.com/shop-logo".$indexcache["pic_path"];
				
				
	return $indexcache;
}
//调用商品api:调用淘宝商品分类
function GetTaoCates($param){
	global $userpiddp,$Taoapi,$TaoConfig;
	//可以提交的字段
	$is_field = array();
	$is_field["cids"] = 1;
	$is_field["parent_cid"] = 1;
	
	
	$Taoapi->method = 'taobao.itemcats.get';
	$Taoapi->fields = 'cid,name,parent_cid,status';
	foreach($param as $field=>$values){
		if($values!="0" && !empty($values) && $is_field[$field] ){
			$Taoapi->$field = $values;
		}
	}
	
	
	$Taoapireturn = $Taoapi->Send('get','xml')->getArrayData();
	
	if(is_array($Taoapireturn)){
		//转码
		array_walk_recursive($Taoapireturn,"utf8_gbk");
		$count = $Taoapireturn["total_results"];
		
		$indexcache = array();
		
		if(isset($Taoapireturn["item_cats"]["item_cat"])){
			if(!empty($Taoapireturn["item_cats"]["item_cat"]["name"])){
				$indexcache[] = $Taoapireturn["item_cats"]["item_cat"];			
			}else{
				$indexcache =  $Taoapireturn["item_cats"]["item_cat"];
			}
		}
				
		foreach($indexcache as $key=>$val){
			$param = array();
			$param["vcate_id"]=$val["cid"];
			$indexcache[$key]["url"] = GetDaohangUrl(array("urltype"=>$TaoConfig["pagename_template"]),$param);
		}
			
	}
	return $indexcache;
}
//调用商品api:调用拍拍商品分类
function GetPaiCates($param){
	global $paipai_appOAuthID, $paipai_appOAuthkey, $paipai_accessToken, $paipai_uin,$setCacheTime;
	
	$paipai_sdk = new PaiPaiOpenApiOauth($paipai_appOAuthID, $paipai_appOAuthkey, $paipai_accessToken, $paipai_uin);
	$paipai_sdk->Cache->setCacheTime($setCacheTime);
    $paipai_sdk->setMethod("get");//post
    $paipai_sdk->setCharset("utf-8");//gbk

	//可以提交的字段
	$is_field = array();
	$is_field["navigationId"] = 1;
	
	
			$params = &$paipai_sdk->getParams();
			$paipai_sdk->setApiPath("/attr/getNavigationChildList.xhtml");
			
			foreach($param as $field=>$values){
				if($values!="0" && !empty($values) && $is_field[$field] ){
					$params[$field] = $values;
				}
			}
			
			$Taoapireturn = $paipai_sdk->invoke();
			

	if(is_array($Taoapireturn)){
		//转码
		array_walk_recursive($Taoapireturn,"utf8_gbk");
		
		$indexcache = array();
		
		if(isset($Taoapireturn["childList"]["navigation"])){
			$indexcache =  $Taoapireturn["childList"]["navigation"];
		}
				
		foreach($indexcache as $key=>$val){
			$param = array();
			$param["vcate_id"]=$val["navigationId"];

			$indexcache[$key]["name"] = $val["navigationName"];
			$indexcache[$key]["url"] = GetDaohangUrl(array("urltype"=>$TaoConfig["pagename_template"]),$param);
		}
			
	}
	
	return $indexcache;
}
//调用商品api:调用拍拍商品分类名称
function GetPaiCatesName($param){
	global $paipai_appOAuthID, $paipai_appOAuthkey, $paipai_accessToken, $paipai_uin,$setCacheTime;
	
	$paipai_sdk = new PaiPaiOpenApiOauth($paipai_appOAuthID, $paipai_appOAuthkey, $paipai_accessToken, $paipai_uin);
	$paipai_sdk->Cache->setCacheTime($setCacheTime);
    $paipai_sdk->setMethod("get");//post
    $paipai_sdk->setCharset("utf-8");//gbk
	//可以提交的字段
	$is_field = array();
	$is_field["classId"] = 1;
	$is_field["attrId"] = 1;
	$is_field["optionId"] = 1;
	$is_field["option"] = 1;
	
	
			$params = &$paipai_sdk->getParams();
			$paipai_sdk->setApiPath("/attr/getAttributeList.xhtml");
			
			foreach($param as $field=>$values){
				if($values!="0" && !empty($values) && $is_field[$field] ){
					$params[$field] = $values;
				}
			}
			
			$Taoapireturn = $paipai_sdk->invoke();
			
			
			

	if(is_array($Taoapireturn)){
		//转码
		array_walk_recursive($Taoapireturn,"utf8_gbk");
		
		$indexcache = array();
		
		if(isset($Taoapireturn["className"])){
			$indexcache = $Taoapireturn;
		}
				
			$param = array();
			$param["vcate_id"]=$param["classId"];

			$indexcache["name"] = $indexcache["className"];
			$indexcache["url"] = GetDaohangUrl(array("urltype"=>$TaoConfig["pagename_template"]),$param);
	}
	
	return $indexcache;
}
//调用商品api:调用淘宝店铺分类
function GetShopCates($param){
	global $userpiddp,$Taoapi,$TaoConfig;
	//可以提交的字段
	$is_field = array();
	
	
	$Taoapi->method = 'taobao.shopcats.list.get';
	$Taoapi->fields = 'cid,parent_cid,name,is_parent';
	foreach($param as $field=>$values){
		if($values!="0" && !empty($values) && $is_field[$field] ){
			$Taoapi->$field = $values;
		}
	}

	$Taoapireturn = $Taoapi->Send('get','xml')->getArrayData();
	
	//转码
	array_walk_recursive($Taoapireturn,"utf8_gbk");
	$count = $Taoapireturn["total_results"];
	
	$indexcache = array();
	
	if(isset($Taoapireturn["shop_cats"]["shop_cat"])){
		if(!empty($Taoapireturn["shop_cats"]["shop_cat"]["name"])){
			$indexcache[] = $Taoapireturn["shop_cats"]["shop_cat"];			
		}else{
			$indexcache =  $Taoapireturn["shop_cats"]["shop_cat"];
		}
	}
			
	foreach($indexcache as $key=>$val){
		$param = array();
		$param["vcate_id"]=$val["cid"];
		$indexcache[$key]["url"] = GetDaohangUrl(array("urltype"=>$TaoConfig["pagename_template"]),$param);
	}
			
	
	return $indexcache;
}
//调用商品api:调用普通B2C商品
function GetB2CGou($param,&$count = 0){
	global $userpiddp,$api59miao,$TaoConfig;
	
		$fileds="iid,click_url,seller_url,title,sid,seller_name,cid,pic_url,price,cash_ondelivery,freeshipment,installment,has_invoice,modified,price_reduction,price_decreases,original_price";
		
		
		
		
		$Api59miaoData=$api59miao->ListItemsSearch($fileds,$param["keyword"],$param["vcate_id"],$param["mall_id"],$param["page"],$param["page_size"],null,null,$param["sort"]);
		
		$indexcache = array();
		
		if(isset($Api59miaoData["items_search"])){
			$temparr = $Api59miaoData["items_search"]["items"]["item"];
			
			if($temparr["title"]!=""){
					$indexcache[] = $temparr;
			}else{
				$indexcache = $temparr;
			}
			for($z = 0; $z < count($indexcache); $z++) {
				$indexcache[$z]["taodishopurl"] = $indexcache[$z]["seller_url"];
				$indexcache[$z]["nick"] = 	$indexcache[$z]["seller_name"];
				$indexcache[$z]["seller_credit_score"] = 	"20";
				$indexcache[$z]["volume"] = 0;
			}
				$count = array();
				$count["count"] = $Api59miaoData["total_results"];
				
				if($Api59miaoData["items_search"]["item_categories"]["item_category"]["category_name"]!=""){
					$count["category"][] = $Api59miaoData["items_search"]["item_categories"]["item_category"];
				}else{
					$count["category"] = $Api59miaoData["items_search"]["item_categories"]["item_category"];
				}
				
				if($Api59miaoData["items_search"]["item_sellers"]["item_seller"]["seller_name"]!=""){
					$count["seller"][] = $Api59miaoData["items_search"]["item_sellers"]["item_seller"];
				}else{
					$count["seller"] = $Api59miaoData["items_search"]["item_sellers"]["item_seller"];
				}
				
				if(count($indexcache)>$param["page_size"]){
					array_splice($indexcache,$param["page_size"]);
				}
				foreach($indexcache as $key=>$valuepro){
						$valuepro["target"] = $param["target"];
						$valuepro["click_url_base64"] = GetClickUrl($valuepro["click_url"],"b2c_".$valuepro["iid"]);
						$valuepro["shop_click_url_base64"] =GetClickUrl($valuepro["seller_url"],"b2cShop_".$valuepro["sid"]);
						$valuepro["urltype"]="b2cproduct";
						$valuepro["item_id"]=$valuepro["iid"];
						$valuepro["url"] =GetDaohangUrl($valuepro);
						
							if($TaoConfig["applicationdata"]["GJconfig"]["listlinktype"]!="localitem"){
								$valuepro["url"] = GetClickUrl($valuepro["click_url"],"b2c_".$valuepro["iid"]);
								$valuepro["rel"] = " rel='nofollow'";
								if($valuepro["target"]=="") $valuepro["target"]="_blank";
							}
								if($valuepro["target"]=="") $valuepro["target"]="_blank";

						$indexcache[$key] = $valuepro;
				}
		}
	return $indexcache;
}


//调用商品api:调用拍拍商品
function GetPaiGou($param,&$count = 0){
	global $paipai_appOAuthID, $paipai_appOAuthkey, $paipai_accessToken, $paipai_uin,$setCacheTime,$TaoConfig,$paipai_uid;
	
	$paipai_sdk = new PaiPaiOpenApiOauth($paipai_appOAuthID, $paipai_appOAuthkey, $paipai_accessToken, $paipai_uin);
	$paipai_sdk->Cache->setCacheTime($setCacheTime);
    $paipai_sdk->setMethod("get");//post
    $paipai_sdk->setCharset("utf-8");//gbk

	//可以提交的字段,除了这些字段，其余不提交到淘宝
	$is_field = array();
	$is_field["keyWord"] = 1;
	$is_field["classId"] = 1;
	$is_field["pageIndex"] = 1;
	$is_field["pageSize"] = 1;
	$is_field["authType"] = 1;
	$is_field["begPrice"] = 1;
	$is_field["channelId"] = 1;
	$is_field["crMax"] = 1;
	$is_field["crMin"] = 1;
	$is_field["cvMax"] = 1;
	$is_field["cvMin"] = 1;
	$is_field["degree"] = 1;
	$is_field["endPrice"] = 1;
	$is_field["endTime"] = 1;
	$is_field["hotClassId"] = 1;
	$is_field["level"] = 1;
	$is_field["materialId "] = 1;
	$is_field["onlineState"] = 1;
	$is_field["orderStyle"] = 1;
	$is_field["payType"] = 1;
	$is_field["outInfo"] = 1;
	$is_field["property"] = 1;
	$is_field["userId"] = 1;
	$is_field["activeId"] = 1;
	$is_field["address"] = 1;
	$is_field["adPosition"] = 1;
	$is_field["hongbaoTag"] = 1;
	$is_field["saleType"] = 1;
	$is_field["productId"] = 1;
	
	$param["classId"] = $param["vcate_id"];
	$param["keyWord"] = $param["keyword"];
	$param["begPrice"] = $param["start_price"];
	$param["endPrice"] = $param["end_price"];
	$param["orderStyle"] = $param["sort"];

	if(empty($param["pageSize"]))$param["pageSize"] = $param["page_size"];
	$param["keyWord"] = newiconv("GBK","UTF-8",$param["keyWord"]);




    $params = &$paipai_sdk->getParams();//注意，这里使用的是引用，故可以直接使用
	
    $paipai_sdk->setApiPath("/cps/cpsCommSearch.xhtml");//这个是用户需要调用的 接口函数
	

	foreach($param as $field=>$values){
		if($values!="0" && !empty($values) && $is_field[$field]){
			$params[$field] = $values;
		}
	}
	
	$params["userId"] = $paipai_uid;
    $Paiapireturn = $paipai_sdk->invoke();
	
	
				if(is_array($Paiapireturn)) {
					//转码
					array_walk_recursive($Paiapireturn,"utf8_gbk");
					$count = $Paiapireturn["hitNum"];
					
					
					$indexcache = array();
					
					if(($Paiapireturn["hitNum"]=="1")){
							$indexcache[] = $Paiapireturn["vecComm"]["CpsCommData"];			
					}
					if((intval($Paiapireturn["hitNum"])>1)){
							$indexcache = $Paiapireturn["vecComm"]["CpsCommData"];			
					}
					
				
					//代码暂停
					
					if(count($indexcache)>$param["pageSize"]){
						//array_splice($indexcache,$param["pageSize"]);
					}
					
					
					foreach($indexcache as $key=>$valuepro){
							//$valuepro["target"] = $parmvalue["target"];
							$valuepro["click_url_base64"] = GetClickUrl($valuepro["tagUrl"],"paipai_".$valuepro["commId"]);
							$valuepro["shop_click_url_base64"] = GetClickUrl($valuepro["tagUrl"],"paipai_".$valuepro["commId"]);
							$valuepro["urltype"]="paiproduct";
							$valuepro["item_id"]=$valuepro["commId"];
							
							$valuepro["url"] = GetDaohangUrl($valuepro);
							if($TaoConfig["applicationdata"]["GJconfig"]["listlinktype"]!="localitem"){
								$valuepro["url"] = GetClickUrl($valuepro["tagUrl"],"paipai_".$valuepro["commId"]);
								$valuepro["rel"] = " rel='nofollow'";
							}
							$valuepro["volume"] =$valuepro["saleNum"];
							$valuepro["pic_url"] =$valuepro["bigUri"];
							$valuepro["price"] = round($valuepro["price"]/100,2);
							$valuepro["coupon_price"] = round($valuepro["price"]/100,2);
							$valuepro["nick"] =$valuepro["nickName"];
							
							$valuepro["target"] = "_blank";
							$indexcache[$key] = $valuepro;
					}
				}
				
				
			
	return $indexcache;
}

//调用商品api:淘宝卖家推荐商品
function GetTaoSeller($param,&$count = 0){
	global $userpiddp,$Taoapi,$TaoConfig;
	//可以提交的字段,除了这些字段，其余不提交到淘宝
	$is_field = array();
	$is_field["pid"] = 1;
	$is_field["nick"] = 1;
	$is_field["outer_code"] = 1;
	$is_field["is_mobile"] = 1;
	$is_field["relate_type"] = 1;
	$is_field["num_iid"] = 1;
	$is_field["seller_id"] = 1;
	$is_field["cid"] = 1;
	$is_field["fields"] = 1;
	$is_field["shop_type"] = 1;
	$is_field["sort"] = 1;
	//$is_field["max_count"] = 1;
	$is_field["track_iid"] = 1;
	
	
				$Taoapi->method = 'taobao.taobaoke.items.relate.get';
				$Taoapi->fields = 'num_iid,title,nick,pic_url,price,click_url,commission,ommission_rate,commission_num,commission_volume,shop_click_url,seller_credit_score,item_location,volume';
				$Taoapi->pid = $userpiddp;
				$Taoapi->relate_type = 4;
				
				foreach($param as $field=>$values){
					if($values!="0" && !empty($values) && $is_field[$field]){
						$Taoapi->$field = $values;
					}
				}
				
				
				if($ismobileAgent)$Taoapi->is_mobile = "true";
				
				
				$Taoapireturn = $Taoapi->Send('get','xml')->getArrayData();
				if(is_array($Taoapireturn)) {
					//转码
					array_walk_recursive($Taoapireturn,"utf8_gbk");
	
					$count = $Taoapireturn["total_results"];
					
					$indexcache = array();
					
					if(is_array($Taoapireturn["taobaoke_items"]["taobaoke_item"])){
						if(!empty($Taoapireturn["taobaoke_items"]["taobaoke_item"]["title"])){
							$indexcache[] = $Taoapireturn["taobaoke_items"]["taobaoke_item"];			
						}else{
							$indexcache =  array_merge($indexcache,$Taoapireturn["taobaoke_items"]["taobaoke_item"]);
						}
					}
					if(count($indexcache)>$param["max_count"] && $param["max_count"]!=""){
						array_splice($indexcache,$param["max_count"]);
					}
					foreach($indexcache as $key=>$valuepro){
							$valuepro["target"] = $parmvalue["target"];
							$valuepro["click_url_base64"] = GetClickUrl($valuepro["click_url"],"taobao_".$valuepro["num_iid"]);
							$valuepro["shop_click_url_base64"] =GetClickUrl($valuepro["shop_click_url"],"taonick_".$valuepro["nick"]);
							$valuepro["urltype"]="taoproduct";
							$valuepro["item_id"]=$valuepro["num_iid"];
							$valuepro["url"] =GetDaohangUrl($valuepro);
							if($TaoConfig["applicationdata"]["GJconfig"]["listlinktype"]!="localitem"){
								$valuepro["url"] =  GetClickUrl($valuepro["click_url"],"taobao_".$valuepro["num_iid"]);
								$valuepro["rel"] = " rel='nofollow'";
								if($valuepro["target"]=="") $valuepro["target"]="_blank";
							}
							$indexcache[$key] = $valuepro;
					}
				}
		

	return $indexcache;
}

//读取导航
function GetArrDaohang($key){
	global $TaoConfig;
	$returnArr = array();
	$singerpagedate = $TaoConfig["singerpagedate"]["singerpagelist"];

	if(isset($singerpagedate["CustomDaohang_".$key]) && count($singerpagedate["CustomDaohang_".$key])>0){
		$returnArr = GetAllDaohangLevelArr("CustomDaohang_".$key);
		
	}
	
	
	return $returnArr;
}

//获得导航分级
function GetAllDaohangLevelArr($key,$parentid="-1"){
	global $TaoConfig;
	$returnArr = array();
	$singerpagedate = $TaoConfig["singerpagedate"]["singerpagelist"];

	$arr = $singerpagedate[$key]["SubTypesArray"];
	if(is_array($arr)){
	foreach($arr as $keyid=>$value){
		if($value["parentid"]==$parentid || ($parentid=="-1" && $value["parentid"]=="")){
			
			$SubDaohangArr = GetAllDaohangLevelArr($key,$keyid);
			
			
			if(isset($SubDaohangArr)){
				$value["SubDaohangArr"] = $SubDaohangArr;
			}
			
			$value["url"] = GetDaohangUrl($value);
			
			
			
			$returnArr[] = $value;
		}
	}
	}
	
	return $returnArr;
	
}
//调用文章  参数分别为 ： catid类别编号，num文章数量，page分页页码，is_hot是否热门，is_best是否推荐 , keyword 搜索词
function GetArrArticle($catid=0,$num=5,$page=1,$is_hot=0,$is_best=0,$sort="add_time",$wherepam="",&$count = 0){
	global $TaoConfig;
	dbconnect();
	if(!$TaoConfig["DB_OPEN"]) return array();
	
	
	$where = " 1=1 ";
	if($catid!=0 && $catid!="-1") {
		if(strpos($catid,",")>0){
			$where .= " and cate_id in (".$catid.")";
		}else{
			$where .= " and cate_id=".$catid;
		}
	}
	if($catid==-1) $where .= " and cate_id=0";
	
	if($is_hot==1) $where .= " and is_hot=1";
	if($is_best!=0) $where .= " and is_best=1";
	$where .= " and ".tname('article').".status=1";
	$where .= NewIconv("GBK","UTF-8",$wherepam);
	
	
	if(($num)=="") $num = 5;
	
	$start = ($page-1)*$num;
	
	if($catid==-1){
	$query = $TaoConfig['db']->query("SELECT * FROM ".tname('article')."  WHERE $where order by ordid,".$sort." desc LIMIT $start,$num" );
	
	$count = $TaoConfig['db']->result($TaoConfig['db']->query("SELECT COUNT(*) FROM ".tname('article')." WHERE $where"), 0);

	
	}else{
	$query = $TaoConfig['db']->query("SELECT ".tname('article').".id,cate_id,".tname('article').".keyword,title,img,url,add_time,ordid,is_hot,is_best,".tname('article_cate').".name as cate_name FROM ".tname('article')." INNER JOIN ".tname('article_cate')." ON ".tname('article').".cate_id = ".tname('article_cate').".id WHERE $where order by ordid,".$sort." desc LIMIT $start,$num" );
	
	$count = $TaoConfig['db']->result($TaoConfig['db']->query("SELECT count(".tname('article').".id) FROM ".tname('article')." INNER JOIN ".tname('article_cate')." ON ".tname('article').".cate_id = ".tname('article_cate').".id WHERE $where"), 0);
	}
	$news = array();
	while ($value = $TaoConfig['db']->fetch_array($query)) {
		$value["urltype"]="article";
		if(empty($value["url"])) $value["url"] = GetDaohangUrl($value);
		$news[] = $value;
	}
	

	//转码
	if($TaoConfig["default_lang"]=="GBK"){
		array_walk_recursive($news,"utf8_gbk");
	}

	return $news;
	
}

//调用所有广告位。
function getallad(){
	global $TaoConfig;
	
	$adlist_list2 = fetch_Allarray("select * from ".tname('adlist')." ");
	//转码
	if($TaoConfig["default_lang"]=="GBK"){
		array_walk_recursive($adlist_list2,"utf8_gbk");
	}
	
	
	$key = 1;
	$adlist_list = array();
	foreach($adlist_list2 as $k=>$val){
		if($val["type"]=="template"){
			$adlist_list[$val["keyid"]]=$val;
		}
		if($val["type"]=="base"){
			$adlist_list[$val["id"]]=$val;
			$adlist_list[$val["id"]]['keyid'] = $val["id"];
			$adlist_list[$val["id"]]['type'] = "base";
		}
	}
	
	if(is_array($TaoConfig["CustomAdList"])){
		
		foreach($TaoConfig["CustomAdList"] as $key=>$val){
			$adlist_list[$key]['id']=$key;
			$adlist_list[$key]['name']=$val["name"];
			$adlist_list[$key]['width']=$val["width"];
			$adlist_list[$key]['height']=$val["height"];
			$adlist_list[$key]['description']=$val["description"];
			if($adlist_list[$key]['status']!="0")$adlist_list[$key]['status']=1;
			$adlist_list[$key]['type']="template";
			$adlist_list[$key]['keyid']=$key;
		}
		
	}
	
	return $adlist_list;
}


//调用文章分类  参数分别为 ： catid类别编号
function GetArrArticle_cate($catid=0){
	global $TaoConfig;
	dbconnect();
	if(!$TaoConfig["DB_OPEN"]) return array();
	
	$where = " 1=1 ";
	if($catid!=0) $where .= " and pid=".$catid;
	
	$query = $TaoConfig['db']->query("SELECT * FROM ".tname('article_cate')."  WHERE $where order by sort_order,id " );
	
	$news = array();
	while ($value = $TaoConfig['db']->fetch_array($query)) {
		$value["typeid"] = 6;
		$value["vcate_id"] = $value["id"];
		$value["keyword"] = "";
		$value["url"] = GetDaohangUrl($value);
		$news[] = $value;
	}
	
	//转码
	if($TaoConfig["default_lang"]=="GBK"){
		array_walk_recursive($news,"utf8_gbk");
	}
	return $news;
	
}

//调用帮助分类  参数分别为 ： catid类别编号
function GetArrHelps_cate($catid=0){
	global $TaoConfig;
	dbconnect();
	if(!$TaoConfig["DB_OPEN"]) return array();
	
	$where = " 1=1 ";
	if($catid!=0) $where .= " and cate_id=".$catid;
	
	$query = $TaoConfig['db']->query("SELECT * FROM ".tname('help_cate')."  WHERE $where order by sort_order desc,id " );
	
	$news = array();
	while ($value = $TaoConfig['db']->fetch_array($query)) {
		$news[] = $value;
	}
	
	//转码
	if($TaoConfig["default_lang"]=="GBK"){
		array_walk_recursive($news,"utf8_gbk");
	}
	return $news;
	
}

//调用帮助  参数分别为 ： catid类别编号，num文章数量，page分页页码
function GetArrHelps($catid=0,$num=0,$page=1){
	global $TaoConfig;
	dbconnect();
	if(!$TaoConfig["DB_OPEN"]) return array();
	
	$where = " 1=1 ";
	if($catid!=0) $where .= " and cate_id=".$catid;
	
	if(($num)=="") $num = 0;
	
	$start = ($page-1)*$num;
	
	$limit = 'LIMIT '.$start.",".$num;
	
	if($num==0) $limit = "";
	
	$query = $TaoConfig['db']->query("SELECT ".tname('help').".id,cate_id,info,title,img,url,add_time,ordid,is_hot,is_best,".tname('help_cate').".name as cate_name FROM ".tname('help')." INNER JOIN ".tname('help_cate')." ON ".tname('help').".cate_id = ".tname('help_cate').".id WHERE $where order by ordid desc,add_time desc $limit" );
	
	$news = array();
	while ($value = $TaoConfig['db']->fetch_array($query)) {
		$value["urltype"]="help";
		if(empty($value["url"])) $value["url"] = GetDaohangUrl($value);
		$news[] = $value;
	}
	
	//转码
	if($TaoConfig["default_lang"]=="GBK"){
		array_walk_recursive($news,"utf8_gbk");
	}
	return $news;
	
}


//读取本地商品TAG
function GetArrTags($num=6){
	global $TaoConfig;
	dbconnect();
	if(!$TaoConfig["DB_OPEN"]) return array();
	
	$query = $TaoConfig['db']->query("SELECT *  FROM ".tname('items_tags')." where status=1 order by id desc LIMIT $num" );
	
	$items_tags = array();
	while ($value = $TaoConfig['db']->fetch_array($query)) {
		
		$value["typeid"] = 4;
		$value["keyword"] = $value["name"];
		
		$items_tags[] = $value;
	}
	//转码
	if($TaoConfig["default_lang"]=="GBK"){
		array_walk_recursive($items_tags,"utf8_gbk");
	}
	
	foreach($items_tags as $k=>$value){
		
		$value["url"] = GetDaohangUrl($value);
		$items_tags[$k] = $value;
	}
	
	
	return $items_tags;
}
//读取B2C商城类别
function GetArrShops_Cate($num=6,$is_index=1){
	global $TaoConfig;
	dbconnect();
	if(!$TaoConfig["DB_OPEN"]) return array();
	
	$query = $TaoConfig['db']->query("SELECT *  FROM ".tname('shops_cate')." where pid=0 and is_hots=".$is_index." order by ordid,id LIMIT $num" );
	
	$shops_cate = array();
	while ($value = $TaoConfig['db']->fetch_array($query)) {
		$shops_cate[] = $value;
	}
	//转码
	if($TaoConfig["default_lang"]=="GBK"){
		array_walk_recursive($shops_cate,"utf8_gbk");
	}
	
	
	return $shops_cate;
}

//读取B2C商城列表
function GetArrShops($cid=0,$num,$page=1,$is_index=1){
	global $TaoConfig,$rootroad;
	dbconnect();
	if(!$TaoConfig["DB_OPEN"]) return array();

	$where = " 1=1 ";
	if($cid!=0) $where .= " and cid=".$cid;
	if($is_index!=0) $where .= " and is_index=1";
	$where .= " and status=1";
	
	$start = ($page-1)*$num;
	$query = $TaoConfig['db']->query("SELECT *  FROM ".tname('shops')." where ".$where." order by sort_order,id desc LIMIT $start,$num" );
	
	$shops = array();
	while ($value = $TaoConfig['db']->fetch_array($query)) {
		
		if(intval(str_replace("taobao_","",$value["item_key"])) && strpos($value["url"],"59miao.com")>0){
			$mallid = str_replace("taobao_","",$value["item_key"]);
			$value["url"] = $rootroad."/gotourl.php?b2cmall_id=".$mallid;
		}else{
			$value["url"] = GetClickUrl($value["url"]);
		}
		$shops[] = $value;
	}
	//转码
	if($TaoConfig["default_lang"]=="GBK"){
		array_walk_recursive($shops,"utf8_gbk");
	}
	return $shops;
}

//导航类型和变量换算
function GetDaohangIdToVarName($id){
	global $TaoConfig;
	$arr_daohang_keyval = $TaoConfig["singerpagedate"]["singerpagelist"]["arr_daohang_keyval"];
	return $arr_daohang_keyval["varname"][$id];
}
function GetDaohangIdToVarText($id){
	global $TaoConfig;
	$arr_daohang_keyval = $TaoConfig["singerpagedate"]["singerpagelist"]["arr_daohang_keyval"];
	return $arr_daohang_keyval["text"][$id];
}
function GetDaohangVarNameToId($varname){
	global $TaoConfig;
	$arr_daohang_keyval = $TaoConfig["singerpagedate"]["singerpagelist"]["arr_daohang_keyval"];
	foreach($arr_daohang_keyval["varname"] as $key=>$value){
		if($value == $varname){
			return $key;
		}
	}
}
//获取后台订单
function GetArrTaoOrder($num=20){
	global $TaoConfig;
	dbconnect();
	if(!$TaoConfig["DB_OPEN"]) return array();
	
	$query = $TaoConfig['db']->query("SELECT *  FROM ".tname('tao_order')." order by pay_time desc,id desc LIMIT $num" );
	
	$shops = array();
	while ($value = $TaoConfig['db']->fetch_array($query)) {
		$shops[] = $value;
	}
	//转码
	if($TaoConfig["default_lang"]=="GBK"){
		array_walk_recursive($shops,"utf8_gbk");
	}
		
		
		foreach($shops as $key=>$val){
			$val["url"] = GetDaohangUrl(array("urltype"=>"taoproduct","item_id"=>$val["num_iid"]));
			$shops[$key] = $val;
		}
		
		
	return $shops;
	
}
//获得友情连接
function GetLinkFriend($is_pic){
	global $TaoConfig;
	$linkarrays = $TaoConfig["applicationdata"]["linkarray"];
	
	
	if(!is_array($linkarrays)){
		return array();	
	}
	
		$returnarr = array();
	
	if($is_pic==1){
		$returnarr = array();
		foreach($linkarrays as $val){
			if(!empty($val[2]) && $val[2]!="" ){
				$returnarr[] = $val;		
			}
		}
	}
	if($is_pic==3){
		$returnarr = array();
		foreach($linkarrays as $val){
			if(empty($val[2])){
				$returnarr[] = $val;		
			}
		}
	}
	if($is_pic==0){
		$returnarr = $linkarrays;
	}
	
	return $returnarr;
}

//根据导航类型，生成对应导航网址
function GetDaohangUrl($value,$param = array()){
	global $TaoConfig;
	$returnstr = "/";
	
	
	if(empty($param["keyword"])) $param["keyword"] = ($value["keyword"]);
	if(empty($param["vcate_id"])) $param["vcate_id"] = $value["vcate_id"];
	if(empty($param["userid"])) $param["userid"] = $value["userid"];
	if(empty($param["sort"])) $param["sort"] = $value["sort"];
	if(empty($param["item_id"])) $param["item_id"] = $value["item_id"];
	if(empty($param["id"])) $param["id"] = $value["id"];

	//拍拍的网址参数
	if($value["typeid"]==15){
		if(!empty($value["start_price"])) $param["start_price"] = $value["start_price"];
		if(!empty($value["end_price"])) $param["end_price"] = $value["end_price"];
		if(!empty($value["crMin"])) $param["crMin"] = $value["crMin"];
		if(!empty($value["crMax"])) $param["crMax"] = $value["crMax"];
		if(!empty($value["cvMin"])) $param["cvMin"] = $value["cvMin"];
		if(!empty($value["cvMax"])) $param["cvMax"] = $value["cvMax"];
		
	}
	
	if($value["typeid"]==21){
		$param["ChannelID"] = $value["ChannelID"];
		$param["keyword"] = "";
	}
	
	//拍拍的网址参数
	if($value["typeid"]==5){
		if(!empty($value["mall_id"])) $param["mall_id"] = $value["mall_id"];
		
	}

	//店铺才需要这个参数
	if($param["userid"]!="10"){
		unset($param["userid"]);
	}

	


	if($param["id"]==$param["item_id"]) $param["item_id"] = "";
	
	if($value["urltype"]!=""){
		$value["typeid"] = GetDaohangVarNameToId($value["urltype"]);
	}
	
	
	
	//各种栏目的网址生成
	if(isset($value["typeid"])){
		if(!isset($value["urltype"])){
		 $value["urltype"]= GetDaohangIdToVarName($value["typeid"]);
		}
	}else{
		if(empty($value["urltype"]) || !isset($value["urltype"])) $value["urltype"]=$TaoConfig["pagename_template"];
		$value["typeid"] = GetDaohangVarNameToId($value["urltype"]);
	}

	//这几个参数不参与网址
	$is_noparam = array();
	$is_noparam["page_size"]=1;
	$is_noparam["page_no"]=1;
	if($value["urltype"]=="taoseller"){
		$is_noparam["keyword"]=1;
	}
	if($value["urltype"]=="taozhe"){
		$is_noparam["userid"]=1;
	}
	if($value["urltype"]=="artlist"){
		$is_noparam["id"]=1;
	}
	if($value["urltype"]=="article"){
		$is_noparam["keyword"]=1;
	}
	if($value["urltype"]=="shareproduct"){
		$is_noparam["page_no"]=1;
	}
	
		if(isset($param["keyword"])){
			$param["keyword"] = str_replace("/"," ",$param["keyword"]);
				
		}

	if($TaoConfig["WJTconfig"]["weijingtai"]=="1"){
		
		
		if(isset($param["keyword"])){
			if($TaoConfig["WJTconfig"]["UrlEncodeType"]=="base64") 	$param["keyword"] = url_base64_encode($param["keyword"]);
			if($TaoConfig["WJTconfig"]["UrlEncodeType"]=="urlencode") $param["keyword"] = urlencode($param["keyword"]);
				
		}
		foreach($param as $key=>$v){
			if(!empty($v) && $v!="0" && !$is_noparam[$key]){
				$urlparam .= "/".$key."/".strip_tags($v);
			}
		}
		//几个特殊的详情页处理
		if($value["urltype"]=="article"){
			$urlparam = "/".$param["id"];
		}
		if($value["urltype"]=="taoproduct"){
			$urlparam = "/".$param["item_id"];
		}
		if($value["urltype"]=="b2cproduct"){
			$urlparam = "/".$param["item_id"];
		}
		if($value["urltype"]=="paiproduct"){
			$urlparam = "/".$param["item_id"];
		}
		if($value["urltype"]=="shareproduct"){
			$urlparam = "/".$param["id"];
		}
		
		if($urlparam == ""){
			$url = $TaoConfig["rootroad"]."/".$value["urltype"].".php";
		}else{
			if($TaoConfig["WJTconfig"]["pagetype"]=="rewrite"){
				$url = $TaoConfig["rootroad"]."/".$value["urltype"].$urlparam.$TaoConfig["WJTconfig"]["pagehz"];
			}else{
				$url = $TaoConfig["rootroad"]."/".$value["urltype"].".php".$urlparam.$TaoConfig["WJTconfig"]["pagehz"];
			}
		}
		
	}else{

		if(isset($param["keyword"])){
			$param["keyword"] = urlencode($param["keyword"]);
				
		}
		$urlparam = "1=1";
		foreach($param as $key=>$v){
			if(!empty($v) && $v!="0" && !$is_noparam[$key]){
				$urlparam .= "&".$key."=".strip_tags($v);
			}
		}
		
		$url = $TaoConfig["rootroad"]."/".$value["urltype"].".php?".$urlparam;
		
		$psplit = array();
		$psplit["?1=1&"] = "?";
		$psplit["?1=1"] = "";
		$url =  strtr($url,$psplit);
	}
	
	
	
	if($value["typeid"]=="8"){
		$returnstr = GetClickUrl($value["keyword"]);
	}else{
		$returnstr = $url;
		
	}
	
		
	return $returnstr;
	
}
	
//快速查询数据库
	function fetch_Allarray($sql) {
		global $TaoConfig;
		dbconnect();
		if(!$TaoConfig["DB_OPEN"]) return array();


		$query = $TaoConfig['db']->query($sql);
		$returnValue = array();
		while ($value = $TaoConfig['db']->fetch_array($query)) {
			$returnValue[] = $value;
		}
		return $returnValue;
	}
	function fetch_Onearray($sql) {
		global $TaoConfig;
		dbconnect();
		if(!$TaoConfig["DB_OPEN"]) return array();
		
		$query = $TaoConfig['db']->query($sql);
		$returnValue = "0";
		
		if($query){
			if ($value = $TaoConfig['db']->fetch_array($query)) {
				$returnValue = $value;
			}
			
			
		}
		
		return $returnValue;
	}
	function fetch_Noarray($sql) {
		global $TaoConfig;
		dbconnect();
		if(!$TaoConfig["DB_OPEN"]) return array();

		$query = $TaoConfig['db']->query($sql);
		$returnValue = 1;
		return $returnValue;
	}
//检查是否登陆并填充用户数据
function check_login() {
	global $TaoConfig;
	dbconnect();
	if(!$TaoConfig["DB_OPEN"]) return array();
	
	
	if(isset($TaoConfig["UserData"]) && $TaoConfig["UserData"]["id"]!=""){
		return true;	
	}
	//检查COOKIE登录
	if (!empty($_SESSION['user_id'])){
	 	$UserData = fetch_Onearray("SELECT * FROM ".tname('user')." WHERE id=".$_SESSION['user_id']);
		if($UserData!="0"){
				//转码
				if($TaoConfig["default_lang"]=="GBK"){
					array_walk_recursive($UserData,"utf8_gbk");
				}
				
			$TaoConfig["UserData"]=$UserData;
				if(empty($TaoConfig["UserData"]["img"])) {
					$TaoConfig["UserData"]["img"]=$TaoConfig["rootroad"]."/img/nohead.jpg";
				}
			return true;
		}
	}
	else {
		$data = array();
		$data["name"] = htmlspecialchars(urldecode($_COOKIE["var_name"]));
		$data["passwd"] = htmlspecialchars(urldecode($_COOKIE["var_passwd"]));
		if($data["name"]){
			$where = " (name='" . trim($data['name']) . "' or email='" . trim($data['name']) . "') and passwd='" . md5(trim($data['passwd'])) . "' and status='1'";
			$user = fetch_Onearray("SELECT * FROM ".tname('user')."  WHERE $where ");
			if ($user) {
				$_SESSION['user_id'] = $user['id'];
				//转码
				if($TaoConfig["default_lang"]=="GBK"){
					array_walk_recursive($user,"utf8_gbk");
				}
				$TaoConfig["UserData"] = $user;
				if(empty($TaoConfig["UserData"]["img"])) {
					$TaoConfig["UserData"]["img"]=$TaoConfig["rootroad"]."/img/nohead.jpg";
				}
				return true;
			}
		}
	}
	
	
	return false;
	
}
function isadmin(){
	global $manage_adminname;
	global $manage_adminpass;
	global $_SESSION;
	
	$adminuser = $_COOKIE['COOKIEadminuser'];
	if(empty($adminuser) || $adminuser == "") $adminuser = $_SESSION['adminuser'];
	
	$adminpass = $_COOKIE['COOKIEadminpass'];
	if(empty($adminpass) || $adminpass == "") $adminpass = $_SESSION['adminpass'];
	
	$adminpass = md5($adminpass);
	
	if($adminuser!=$manage_adminname || $adminpass != $manage_adminpass){
		return 0;
	}
	return 1;
	
	
	
}

?>