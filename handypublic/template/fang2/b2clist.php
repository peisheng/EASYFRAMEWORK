<?PHP
if (!defined('VERSON'))
{
	exit('Access Defined');
}
?>
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
<div class="titt">总共搜索到<a href="<?php echo getsearchurlB2C($qstr,$catid,$sid,$sortnum,$sp,$ep)?>"><?php echo $cat_name ?><?php echo empty($cat_name )?$q:"".$q ?></a>，<?php echo $sitetitle ?>相关商品<b><?php echo $totalResults ?></b>件      
	</div>
<?php if($result_subcats_count > 0) { ?>
<ul class="alls">

<?php

foreach ($result_subcats as $row){ 

$tpurl = getsearchurlB2C($qstr,$row["category_id"],$sid);
?>
<li><a href="<?php echo $tpurl ?>"<?php if($win_daohang=="1") echo(" target=_blank"); ?>><?php echo $row["category_name"] ?></a></li>
<?php  } ?>


</ul>
<?php } ?>
<?php
			$listurl = getsearchurlB2C($qstr,$catid,$sid,$sortnum,$sp,$ep);

			if($Show_list_sort == "1") { 
			$sort0 	= getsearchurlB2C($qstr,$catid,$sid,0,$sp,$ep);
			$sort1 		= getsearchurlB2C($qstr,$catid,$sid,1,$sp,$ep);
			$sort2 			= getsearchurlB2C($qstr,$catid,$sid,2,$sp,$ep);
			$sort3 			= getsearchurlB2C($qstr,$catid,$sid,3,$sp,$ep);
			
			
			}
			

?>
<div style="clear:both;"></div>
</div>
<?php if($Show_list_sort == "1") { ?>
<div class="tbot"></div>
<ul class="cmenu">
<li<?php if($sortnum == 0) { echo ' class="this"';} ?>><a href="<?php echo $sort0; ?>"><?php echo proSortNumToSortNameB2C(0);?></a></li>
<li<?php if($sortnum == 1) { echo ' class="this"';} ?>><a href="<?php echo $sort1; ?>"><?php echo proSortNumToSortNameB2C(1);?></a></li>
<li<?php if($sortnum == 2) { echo ' class="this"';} ?>><a href="<?php echo $sort2; ?>"><?php echo proSortNumToSortNameB2C(2);?></a></li>
<li<?php if($sortnum == 3) { echo ' class="this"';} ?>><a href="<?php echo $sort3; ?>"><?php echo proSortNumToSortNameB2C(3);?></a></li>
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


<li><div class="img"><a href="<?php echo $urlview?>" <?php echo $picurl?> <?php if($win_pro=="1") echo(" target=_blank"); ?>><?php setPic($taobaokeItem[$i]["pic_url"],0,0,strip_tags(Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"])))?></a></div><div class="title"><a href="<?php echo $urlview?>" <?php if($win_pro=="1") echo(" target=_blank"); ?>><?php echo Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"]) ?></a></div><div class="info"><div class="lef"><p>商城价：<b><?php echo $taobaokeItem[$i]["price"] ?></b></p><p>市场价：<?php echo $taobaokeItem[$i]["price"]*1.3 ?>元</p><p>商城：<em><a href="<?php echo $pageview?>" target="_blank"><?php echo Newiconv("utf-8","gbk",$taobaokeItem[$i]["nick"]) ?></a></em> </p></div>
<div class="rig"><a href="javascript:;" onclick="clickurl('<?php echo base64_encode($taobaokeItem[$i]["click_url"])?>','<?php echo $rootroad;?>'); return false;" target="_blank"><img src="images/buynow.gif"></a><a href="javascript:;" onclick="javascript:addfavor('<?php echo $taobaokeItem[$i]["click_url"]?>','<?php echo $sitetitleurl.Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"]) ?>');"><img src="images/sc.gif"></a></div></div></li>

<?php } ?>




</ul>


<div class="page">

 <?php 
  $page_size=$pagenumKeys;
  $nums=$totalResults;
  $sub_pages=10;
  $pageCurrent=$page;
  
  $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,getsearchurlB2C($qstr,$catid,$sid,$sortnum,$sp,$ep,false).($weijingtai?"-":"&page="),2,$weijingtai);
  
?>       

</div>

</div>
<!--列表左边结束-->

<!--列表右边开始-->
<div class="list_right">
<div class="rt"><strong>热卖商品</strong></div>
<div class="rc">

<?php

$fileds="iid,click_url,seller_url,title,sid,seller_name,cid,pic_url,price";
$Api59miaoData=$api59miao->ListItemsSearch($fileds,Show_index_hotprokeyword, 0, 0,0, Show_index_hotpronum, 0, 0, proSortNumToSortB2C(0));

$taobaokeItem = $Api59miaoData["items_search"]["items"]["item"];


?>
                
<?php for($i = 0; $i < count($taobaokeItem); $i++) {

	$taousernick = $taobaokeItem[$i]["seller_name"];

	$urlview =getproducturlB2C($taobaokeItem[$i]["iid"]);
	$pageview =$taobaokeItem[$i]["seller_url"];
	if($listlinktype=="tao"){
		$picurl = " onclick=\"clickurl('".base64_encode($taobaokeItem[$i]["click_url"])."','".$rootroad."'); return false;\"";
	}else{
		$picurl = "";
	}
	
 ?>
                <div class="cbb"><div class="img"><div class="titl"><A href="<?php echo $urlview?>"<?php if($win_pro=="1") echo(" target=_blank"); ?>><?php echo $taobaokeItem[$i]["title"] ?></A></div><a href="<?php echo $urlview?>" <?php echo $picurl?> <?php if($win_pro=="1") echo(" target=_blank"); ?>><?php setPic($taobaokeItem[$i]["pic_url"],160,160,strip_tags($taobaokeItem[$i]["title"]))?></a></div><p>商城价：<b><?php echo $taobaokeItem[$i]["price"] ?>元</b></p>
                <p>商城：<em><a href="<?php echo $pageview?>" target="_blank"><?php echo $taobaokeItem[$i]["seller_name"] ?></a></em> </p>
                </div>
                
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