<?php
$pagename_template = "channel"; //����ֶ�һ��Ҫ��ҳ�����ƶ��ϡ� 
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


if($list_title=="")$list_title = "{�����}{�ؼ���}_{��վ��}";
if($list_keyword=="")$list_keyword = "{�����}{�ؼ���},�Ա�{�����}{�ؼ���}";
if($list_discription=="")$list_discription = "�����鿴����{�����}{�ؼ���},{��վ��}��������ʹ��֧�������ף����ջ��󸶿";

$tihuanarr = array();
$tihuanarr["{�����}"] = $indexvalue[typename];
$tihuanarr["{�ؼ���}"] = $indexvalue[keyword];
$tihuanarr["{��վ��}"] = $sitetitle;


$page_title = strtr($list_title,$tihuanarr); 
$page_keyword = strtr($list_keyword,$tihuanarr); 
$page_discription = strtr($list_discription,$tihuanarr); 
//����ģ��
require_once Tao_template($pagename_template);
showend();

?>
