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
<div class="titt"> 您的位置： <a href="<?php echo $rootroad;?>/" class="hom">首页</a> &#8250; <a href="<?php echo $listurl ?>"><?php echo $title ?></a>，<?php echo $sitetitle ?>相关商品<b><?php echo $totalResults ?></b>件      
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

<div style="clear:both;"></div>
</div>
<div class="tbot"></div>
<ul class="cmenu">

    <li<?php echo (intval($sortnum) == 0)?' class="this"':"" ?>><a href="<?php echo getshopIDurl($userid,0,$sp,$ep); ?>">销量从高到低</a></li>
    <li<?php echo (intval($sortnum) == 1)?' class="this"':"" ?>><a href="<?php echo getshopIDurl($userid,1,$sp,$ep); ?>">时间从高到低</a></li>
    <li<?php echo (intval($sortnum) == 2)?' class="this"':"" ?>><a href="<?php echo getshopIDurl($userid,2,$sp,$ep); ?>">价格从高到低</a></li>
    <li<?php echo (intval($sortnum) == 3)?' class="this"':"" ?>><a href="<?php echo getshopIDurl($userid,3,$sp,$ep); ?>">价格从低到高</a></li>


</ul>
<?php } ?>




<ul class="list">

<?php for($i = 0; $i < count($taobaokeItem); $i++) {


	$urlview =getproducturl($taobaokeItem[$i]["num_iid"]);
	
	if($listlinktype=="tao"){
		$picurl = " onclick=\"clickurl('".base64_encode($taobaokeItem[$i]["click_url"])."','".$rootroad."'); return false;\"";
	}else{
		$picurl = "";
	}

 ?>


<li><div class="img"><a href="<?php echo $urlview?>" <?php echo $picurl?> <?php if($win_pro=="1") echo(" target=_blank"); ?>><?php setPic($taobaokeItem[$i]["pic_url"]."_b.jpg",0,0,strip_tags(Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"])))?></a></div><div class="title"><a href="<?php echo $urlview?>" <?php if($win_pro=="1") echo(" target=_blank"); ?>><?php echo Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"]) ?></a></div><div class="info"><div class="lef"><p>淘宝价：<b><?php echo $taobaokeItem[$i]["price"] ?></b></p><p>市场价：<?php echo $taobaokeItem[$i]["price"]*1.3 ?>元</p><p>已销售：<em><?php echo $taobaokeItem[$i]["commission_num"] ?></em> 件</p></div>
<div class="rig"><a href="javascript:;" onclick="clickurl('<?php echo base64_encode($taobaokeItem[$i]["shop_click_url"])?>','<?php echo $rootroad;?>'); return false;" target="_blank"><img src="images/buynow.gif"></a><a href="javascript:;" onclick="javascript:addfavor('<?php echo $urlview?>','<?php echo $sitetitleurl.Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"]) ?>');"><img src="images/sc.gif"></a></div></div></li>

<?php } ?>




</ul>




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