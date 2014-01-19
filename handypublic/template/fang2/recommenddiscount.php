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
<link rel="Shortcut Icon" href="<?php echo $sitetitleurl;?>/favicon.ico">
<link rel="Bookmark" href="<?php echo $sitetitleurl;?>/favicon.ico">
<link href="css/taodi_bhtbwcom.css" rel="stylesheet" type="text/css" />

<script src="js/base64.js"></script>

<script src="js/function.js"></script>

<script type="text/javascript" src="js/common.js"></script>

<script type="text/javascript" src="js/swfobject_source.js"></script>
</head>
<body>
<div class="all">

<!--{template header}-->


<!--搜索与小分类结束-->                                                                        <div class="main">
<!--列表左边开始-->
<div class="list_left">
<div class="list_dh">
<div class="titt">总共搜索到<a href="<?php echo GetRecommendDiscounUrl($qstr,$catid,$sortnum)?>"><?php echo $cat_name ?><?php echo empty($cat_name )?$q:"".$q ?></a>，<?php echo $sitetitle ?>相关商品<b><?php echo $totalResults ?></b>件      
	</div>
<?php if($result_subcats_count > 0) { ?>
<ul class="alls">

<?php

foreach ($result_subcats as $row){ 

$tpurl = GetRecommendDiscounUrl("",$row["cid"]);
?>
<li><a href="<?php echo $tpurl ?>"<?php if($win_daohang=="1") echo(" target=_blank"); ?>><?php echo Newiconv("UTF-8","GBK",$row["name"]) ?></a></li>
<?php  } ?>


</ul>
<?php } ?>
<?php
			$listurl = GetRecommendDiscounUrl($qstr,$catid,$sortnum);

			if($Show_list_sort == "1") { 
			$urlcommissionNum_desc 	= GetRecommendDiscounUrl($qstr,$catid,0);
			$urlcredit_desc 		= GetRecommendDiscounUrl($qstr,$catid,1);
			$urlprice_desc 			= GetRecommendDiscounUrl($qstr,$catid,2);
			$urlprice_asc 			= GetRecommendDiscounUrl($qstr,$catid,3);
			$delist_desc 			= GetRecommendDiscounUrl($qstr,$catid,4);
			
			$ssort="0";
			if($sort=="commissionNum_desc")$ssort="0";
			if($sort=="credit_desc")$ssort="1";
			if($sort=="price_desc")$ssort="2";
			if($sort=="price_asc")$ssort="3";
			if($sort=="delistTime_desc")$ssort="4";
			}
			

?>
<div style="clear:both;"></div>
</div>
<?php if($Show_list_sort == "1") { ?>
<div class="tbot"></div>
<ul class="cmenu">
<li<?php if($sort == "commissionNum_desc") { echo ' class="this"';} ?>><a href="<?php echo $urlcommissionNum_desc; ?>">销量从高到低</a></li>
<li<?php if($sort == "credit_desc") { echo ' class="this"';} ?>><a href="<?php echo $urlcredit_desc; ?>">信用从高到低</a></li>
<li<?php if($sort == "price_desc") { echo ' class="this"';} ?>><a href="<?php echo $urlprice_desc; ?>">价格从高到低</a></li>
<li<?php if($sort == "price_asc") { echo ' class="this"';} ?>><a href="<?php echo $urlprice_asc; ?>">价格从低到高</a></li>
<li<?php if($sort == "delistTime_desc") { echo ' class="this"';} ?>><a href="<?php echo $delist_desc; ?>">时间从高到低</a></li>
</ul>
<?php } ?>




<ul class="list">

<?php for($i = 0; $i < count($taobaokeItem); $i++) {

$taousernick = Newiconv("utf-8","gbk",$taobaokeItem[$i]["nick"]);

	$urlview =$taobaokeItem[$i]["taodiurl"];
	$pageview =$taobaokeItem[$i]["taodishopurl"];
	if($listlinktype=="tao"){
		$picurl = " onclick=\"clickurl('".base64_encode($taobaokeItem[$i]["click_url"])."','".$rootroad."'); return false;\"";
	}else{
		$picurl = "";
	}
	
 ?>


<li><div class="img"><a href="<?php echo $urlview?>" <?php echo $picurl?> <?php if($win_pro=="1") echo(" target=_blank"); ?>><?php setPic($taobaokeItem[$i]["pic_url"]."_b.jpg",0,0,strip_tags(Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"])))?></a></div><div class="title"><a href="<?php echo $urlview?>" <?php if($win_pro=="1") echo(" target=_blank"); ?>><?php echo Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"]) ?></a></div><div class="info"><div class="lef"><p>折扣价：<b><?php echo $taobaokeItem[$i]["price"] ?></b></p><p>原价：<?php echo $taobaokeItem[$i]["old_price"] ?>元</p><p>已销售：<em><?php echo $taobaokeItem[$i]["volume"] ?></em> 件</p></div><div class="rig"><a href="javascript:;" onclick="clickurl('<?php echo base64_encode($taobaokeItem[$i]["shop_click_url"])?>','<?php echo $rootroad;?>'); return false;" target="_blank"><img src="images/buynow.gif"></a><a href="javascript:;" onclick="javascript:addfavor('<?php echo $urlview?>','<?php echo $sitetitleurl.Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"]) ?>');"><img src="images/sc.gif"></a></div></div></li>

<?php } ?>




</ul>


<div class="page">

 <?php 
  $page_size=$pagenumKeys;
  $nums=$totalResults;
  $sub_pages=10;
  $pageCurrent=$page;
  
  $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,GetRecommendDiscounUrl($qstr,$catid,$sortnum,false).($weijingtai?"-":"&page="),2,$weijingtai);
  
?>       

</div>

</div>
<!--列表左边结束-->

<!--列表右边开始-->
<div class="list_right">
<div class="rt"><strong>热卖商品</strong></div>
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
if(Show_index_hotprokeyword!="") $Taoapi->keyword = Newiconv("GBK","UTF-8",Show_index_hotprokeyword);
if(intval(Show_index_hotprocatid)!=0) $Taoapi->cid = Show_index_hotprocatid;
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
                <div class="cbb"><div class="img"><div class="titl"><A href="<?php echo $urlview?>"<?php if($win_pro=="1") echo(" target=_blank"); ?>><?php echo Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"]) ?></A></div><a href="<?php echo $urlview?>" <?php echo $picurl?> <?php if($win_pro=="1") echo(" target=_blank"); ?>><?php setPic($taobaokeItem[$i]["pic_url"]."_160x160.jpg",0,0,strip_tags(Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"])))?></a></div><p>淘宝价：<b><?php echo $taobaokeItem[$i]["price"] ?>元</b></p><p>本月热销：<em><?php echo $taobaokeItem[$i]["commission_num"] ?></em> 件</div>
                
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