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
<link href="css/orange.css" rel="stylesheet" type="text/css" />
<link href="css/orange_list.css" rel="stylesheet" type="text/css" />
<link href="css/orange_shop.css" rel="stylesheet" type="text/css" />
    
<script language="javascript">
function ResizeImage(F,D,G){if(F!=null){imageObject=F}var E=imageObject.readyState;if(E!="complete"){setTimeout("ResizeImage(null,"+D+","+G+")",50);return }var B=new Image();B.src=imageObject.src;var A=B.width;var C=B.height;if(A>D||C>G){a=A/D;b=C/G;if(b>a){a=b}A=A/a;C=C/a}if(A>0&&C>0){imageObject.width=A;imageObject.height=C}}
</script>
</head>
<body>

<!--{template header}-->

<div id="main">

<?php if($result_subcats_count > 0) { ?>
<div class="taodi_right_catalogs">
<ul><div class="clear"></div>
<?php
foreach ($result_subcats as $row){

$tpurl = getsearchurl($qstr,$row["cid"]);
?>
<li><a href="<?php echo $tpurl ?>"<?php if($win_daohang=="1") echo(" target=_blank"); ?>><?php echo Newiconv("UTF-8","GBK",$row["name"]) ?></a></li>
<?php } ?>
<div class="clear"></div>
</ul>
</div>
<?php } ?>

<div style="clear:both">
<div style="width:950px; text-align:left; float:left; padding:0px; margin:0px;">
<div>


<div class="taodi_tips">
<div class="listweizhi">您的位置:<a href="<?php echo $sitetitleurl?>">淘宝</a>><a href="<?php echo getsearchurl($q,$catid,0,0,$sp,$ep);?>"><?php echo $cat_name?><?php echo empty($cat_name )?$q:" > ".$q ?></a></div>
<div class="shuliang">搜索到<strong><a href="/catid-<?php echo $catid; ?>-<?php echo ($q) ?>"><?php echo $pagetitle?></a></strong>相关商品<span><?php echo $totalResults ?></span>件，您需要到淘宝购买，【支付宝】担保交易，安全保障无忧！</div>
</div>

<?php
			$listurl = getsearchurl($qstr,$catid,0,$sortnum,$sp,$ep);
			if($Show_list_sort == "1") { 
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
			
			}

?>
<?php if($Show_list_sort == "1") { ?>

<div class="taodi_choose">
<ul>
<li<?php if($sort == "commissionNum_desc") { echo ' id="this_choose"';} ?>><a href="<?php echo $urlcommissionNum_desc; ?>">销量从高到低</a></li>
<li<?php if($sort == "credit_desc") { echo ' id="this_choose"';} ?>><a href="<?php echo $urlcredit_desc; ?>">信用从高到低</a></li>
<li<?php if($sort == "price_desc") { echo ' id="this_choose"';} ?>><a href="<?php echo $urlprice_desc; ?>">价格从高到低</a></li>
<li<?php if($sort == "price_asc") { echo ' id="this_choose"';} ?>><a href="<?php echo $urlprice_asc; ?>">价格从低到高</a></li>
<li<?php if($sort == "delistTime_desc") { echo ' id="this_choose"';} ?>><a href="<?php echo $delist_desc; ?>">时间从高到低</a></li>
</ul>
</div>

<div class="condition">
	<ul>
		<li class="tilist"><b>价格区间排列：</b></li>
		<li class='by-price'>
		<a href="<?php echo getsearchurl($qstr,$catid,0,$sortnum,1,200) ?>"><?php echo (intval($sp) == 1 && intval($ep) == 200)?'<b>1～100元</b>':"1～200元" ?></a>
		<a href="<?php echo getsearchurl($qstr,$catid,0,$sortnum,200,500) ?>"><?php echo (intval($sp) == 200 && intval($ep) == 500)?'<b>200～500元</b>':"200～500元" ?></a>
		<a href="<?php echo getsearchurl($qstr,$catid,0,$sortnum,500,1000) ?>"><?php echo (intval($sp) == 500 && intval($ep) == 1000)?'<b>500～1000元</b>':"500～1000元" ?></a>
		<a href="<?php echo getsearchurl($qstr,$catid,0,$sortnum,1000,2000) ?>"><?php echo (intval($sp) == 1000 && intval($ep) == 2000)?'<b>1000～2000元</b>':"1000～2000元" ?></a>
		<a href="<?php echo getsearchurl($qstr,$catid,0,$sortnum,2000,5000) ?>"><?php echo (intval($sp) == 2000 && intval($ep) == 5000)?'<b>2000～5000元</b>':"2000～5000元" ?></a>
		<a href="<?php echo getsearchurl($qstr,$catid,0,$sortnum,5000,50000) ?>"><?php echo (intval($sp) == 5000 && intval($ep) == 50000)?'<b>5000元以上</b>':"5000元以上" ?></a>
		</li>
	</ul>
</div>
<?php } ?>


<div class="staodi_listbox">
<dl>

<?php if(!is_array($taobaokeItem)){?>
<div style="color:#FF0000; line-height:50px; padding-left:20px;">没有搜索到相关商品！请换一个关键词再搜索。注意，不需要加上型号，只需要大概名称。</div>
<?php }

if(isset($taobaokeItem["title"])){
	$arrtemp = $taobaokeItem;
	$taobaokeItem = array();
	$taobaokeItem[0] = $arrtemp;
}

?>
<?php for($i = 0; $i < count($taobaokeItem); $i++) {

	$urlview =$taobaokeItem[$i]["taodiurl"];
	$pageview =$taobaokeItem[$i]["taodishopurl"];
	if($listlinktype=="tao"){
		$picurl = " onclick=\"clickurl('".base64_encode($taobaokeItem[$i]["click_url"])."','".$rootroad."'); return false;\"";
	}else{
		$picurl = "";
	}
	$click_url=$taobaokeItem[$i]["click_url"];
	$shop_click_url=$taobaokeItem[$i]["shop_click_url"];
 ?>

<dt>
<em><a href="<?php echo $urlview?>" <?php echo $picurl?> target="_blank"><script language="javascript">setPic('<?php echo base64_encode($taobaokeItem[$i]["pic_url"]."_310x310.jpg") ?>',0,0,'<?php echo strip_tags(Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"])) ?>');</script></a></em>
<p class="taodi_title"><a href="<?php echo $urlview?>" <?php if($win_pro=="1") echo(" target=_blank"); ?>><?php echo Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"]) ?></a></p>
<p class="taodi_nick"><b>￥<?php echo $taobaokeItem[$i]["price"] ?>元</b>　30天卖出：<b><?php echo $taobaokeItem[$i]["volume"] ?></b> 件 </p>
<p class="taodi_nick">掌柜：<a href="<?php echo $pageview?>" target="_blank"><?php echo Newiconv("utf-8","gbk",$taobaokeItem[$i]["nick"]) ?></a>
信誉：<img src="<?php echo $templateroot;?>/img/orange/level_<?php echo $taobaokeItem[$i]["seller_credit_score"]; ?>.gif"></p>
<p class="taodi_nick">
<a href="javascript:;" onclick="clickurl('<?php echo base64_encode($shop_click_url)?>','<?php echo $rootroad;?>'); return false;"><img src="<?php echo $templateroot;?>/img/orange/toshop.gif" alt="怎么在淘宝上买东西?点击进入该商家的店铺！" align="absmiddle"/></a>
<a href="javascript:;" onclick="clickurl('<?php echo base64_encode($click_url)?>','<?php echo $rootroad;?>'); return false;"><img src="<?php echo $templateroot;?>/img/orange/totaob.gif" alt="怎么在淘宝上买东西?点击该按钮，立刻购买该产品。" align="absmiddle"/></a>

</p>
</dt>

<?php } ?>
</dl>
</div>

<div id="pages"><?php 
  $page_size=$pagenumKeys;
  $nums=$totalResults;
  $sub_pages=10;
  $pageCurrent=$page;
  
  $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,getsearchurl($qstr,$catid,0,$sortnum,$sp,$ep,false).($weijingtai?"-":"&page="),2,$weijingtai);  
  
?></div>
</div>
</div>

</div>
<div style="clear:both">
</div>
<?php if($is_indexs == "ok") {?>
<DIV class="block clearfix" style="clear:both; width:940px; margin:0 auto;">
		<?php
	include($WEBROOT_TEMP."news.php");
?>
    </DIV>
<DIV style="clear:both;">
</DIV>	
<?php } ?>

<?php include($WEBROOT_TEMP."hot.php");?>

<!--{template footer}-->
</div>
</body>
</html>