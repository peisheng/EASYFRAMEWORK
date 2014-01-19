<?PHP
if (!defined('VERSON'))
{
	exit('Access Defined');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<!--{template headerjs}-->

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php echo $page_title ?></title>
<meta name="keywords" content="<?php echo $page_keyword ?>" />
<meta name="description" content="<?php echo $page_discription ?>" />
<link rel="Shortcut Icon" href="favicon.ico">
<link rel="Bookmark" href="favicon.ico">
<link href="css/taodi_bhtbwcom.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="js/common.js"></script>

</head>
<body>
<div class="all">

<!--{template header}-->


<!--搜索与小分类结束-->                                                                        <div class="main">
<!--列表左边开始-->
<div class="list_left">
<div class="list_dh">
<div class="titt"> 您的位置： <a href="<?php echo $rootroad;?>/" class="hom">首页</a> &#8250; <a href="<?php echo $listurl ?>"><?php echo $cat_name ?><?php echo empty($cat_name)?$q:" > ".$q ?></a>    
	</div>
<?php
			$listurl = getsearchurl($qstr,$catid,0,$sortnum,$sp,$ep);
			$urlcommissionNum_desc 	= getsearchurl($qstr,$catid,0,0,$sp,$ep);
			$urlcredit_desc 		= getsearchurl($qstr,$catid,0,1,$sp,$ep);
			$urlprice_desc 			= getsearchurl($qstr,$catid,0,2,$sp,$ep);
			$urlprice_asc 			= getsearchurl($qstr,$catid,0,3,$sp,$ep);
			$delist_desc 			= getsearchurl($qstr,$catid,0,4,$sp,$ep);
			
			$ssort="0";
			if($sort=="commissionNum_desc")$ssort="0";
			if($sort=="credit_desc")$ssort="1";
			if($sort=="price_desc")$ssort="2";
			if($sort=="price_asc")$ssort="3";
			if($sort=="delistTime_desc")$ssort="4";
			
			

?>
<div style="clear:both;"></div>
</div>
<div class="tbot"></div>

<ul>

<?php for($i = 0; $i < count($taobaokeItem); $i++) {

$taousernick = Newiconv("utf-8","gbk",$taobaokeItem[$i]["nick"]);


		$urlview = " onclick=\"clickurl('".base64_encode($taobaokeItem[$i]["click_url"])."','".$rootroad."'); return false;\"";
	
 ?>


		    <li style=" line-height:30px; height:30px; padding-left:20px;">
			 - <a href="javascript:;" <?php echo $urlview?> target="_blank"><?php echo Newiconv("UTF-8","GBK",$taobaokeItem[$i]["shop_title"]) ?></a> <span><img src="<?php echo $rootroad?>/template/<?php echo $templatefolder?>/images/level_<?php echo $taobaokeItem[$i]["seller_credit"] ?>.gif"></span>
			</li>


<?php 
}?>



</ul>


<div class="page">

<?php 
  $page_size=$pagenumKeys;
  $nums=$totalResults;
  $sub_pages=10;
  $pageCurrent=$page;
  
  $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,getsearchshopurl($q,$catid,false).($weijingtai?"-":"&page="),2,$weijingtai);
  
  
?>      

</div>

</div>
<!--列表左边结束-->

<!--列表右边开始-->
<div class="list_right">
<div class="rt"><strong><?php echo $sitetitle ?></strong></div>
<div class="rc">

<?php
$Taoapi->method = 'taobao.taobaoke.items.get';
$Taoapi->fields = 'iid,num_iid,title,nick,pic_url,price,click_url,shop_click_url,seller_credit_score,commission,commission_rate,commission_num,commission_volume';
$Taoapi->pid = $userpiddp;

$Taoapi->page_no = 1;
$Taoapi->page_size = Show_index_hotpronum;
$Taoapi->sort = "commissionNum_desc";
$Taoapi->start_price = 1;
$Taoapi->end_price = 1000000;
$Taoapi->keyword = Newiconv("GBK","UTF-8",Show_index_hotprokeyword);
if(intval(Show_index_hotprocatid)!=0) $Taoapi->cid = $catid;
	if($ismall=="1")$Taoapi->mall_item = "true";

$TaoapiItems = $Taoapi->Send('get','xml')->getArrayData();
$taobaokeItem = $TaoapiItems["taobaoke_items"]["taobaoke_item"];

?>
                
<?php for($i = 0; $i < count($taobaokeItem); $i++) {

$taousernick = Newiconv("utf-8","gbk",$taobaokeItem[$i]["nick"]);

	$urlview =getproducturl($taobaokeItem[$i]["num_iid"]);
	if($listlinktype=="tao"){
		$picurl = " onclick=\"clickurl('".base64_encode($taobaokeItem[$i]["click_url"])."','".$rootroad."'); return false;\"";
	}else{
		$picurl = "";
	}
	
 ?>
                <div class="cbb"><div class="img"><div class="titl"><A href="<?php echo $urlview?>"<?php if($win_pro=="1") echo(" target=_blank"); ?>><?php echo Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"]) ?></A></div><a href="<?php echo $urlview?>" <?php echo $picurl?> <?php if($win_pro=="1") echo(" target=_blank"); ?>><?php setPic($taobaokeItem[$i]["pic_url"]."_160x160.jpg",0,0,strip_tags(Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"])))?></a></div><p>淘宝价：<b>499.00元</b></p><p>本月热销：<em>7507</em> 件</div>
                
    <?php }?>    
                
                
                
                </div>

</div>
<!--列表右边结束-->

<!--{template teyue}-->


<div class="bot"></div>
</div>

<!--{template footer}-->

</div>                                                                                                                                                            </body>
</html>