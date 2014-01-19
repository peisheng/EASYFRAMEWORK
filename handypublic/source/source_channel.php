<?php
$pagename_template = "channel"; //这个字段一定要跟页面名称对上。 
require_once WEBROOT.'include/function.php';

$ChannelID = htmlspecialchars(urldecode(var_request("ChannelID","")));


function getChannel($id){
global $TaoConfig;	
	foreach($TaoConfig[singerpagedate][singerpagelist] as $val){
		
		if(is_array($val[SubTypesArray])){
			
			foreach($val[SubTypesArray] as $val2){
				
				
				if($val2["typeid"]!=""){
					if(isset($val2["ChannelID"])){
						if($val2["ChannelID"]==$id){
							return $val2;	
						}
					}
					
				}
				
			}
				
		}
		
	}
	return array();
}


$indexvalue = getChannel($ChannelID);
$indexvalue[urltxt]=UpdateSystemVerible($indexvalue[urltxt]);
$list_title = $CustomSeoconfig[$pagename_template."_title"];
$list_keyword = $CustomSeoconfig[$pagename_template."_keyword"];
$list_discription = $CustomSeoconfig[$pagename_template."_discription"];


if($list_title=="")$list_title = "{类别名}{关键词}_{网站名}";
if($list_keyword=="")$list_keyword = "{类别名}{关键词},淘宝{类别名}{关键词}";
if($list_discription=="")$list_discription = "您所查看的是{类别名}{关键词},{网站名}提醒您，使用支付宝交易，先收货后付款！";

$tihuanarr = array();
$tihuanarr["{类别名}"] = $indexvalue[typename];
$tihuanarr["{关键词}"] = $indexvalue[keyword];
$tihuanarr["{网站名}"] = $sitetitle;


$page_title = strtr($list_title,$tihuanarr); 
$page_keyword = strtr($list_keyword,$tihuanarr); 
$page_discription = strtr($list_discription,$tihuanarr); 
//加载模板
require_once Tao_template($pagename_template);
showend();

?>
