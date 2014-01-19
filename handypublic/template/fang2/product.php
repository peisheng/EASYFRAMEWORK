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
</head>
<body>
<div class="all">
<!--{template header}-->

<div class="main">
<!--宝贝左边开始-->
<div class="list_left">

<div class="tbot"></div>
<div style="clear:both"></div>
<div class="goinfo"><h1><?php echo Newiconv("UTF-8", "GBK",$title) ?></h1>
<div class="gsin">
<div class="img"><a href="javascript:;" onclick="clickurl('<?php echo base64_encode($click_url)?>','<?php echo $rootroad;?>'); return false;"><?php setPic($pic_path."_310x310.jpg",0,0,Newiconv("UTF-8","GBK",$title))?></a></div>
<div class="jtxx">
<p>淘宝价格：<b><?php echo $coupon_price==""?"&yen;".$price:"<s>&yen;".$price."</s>  折扣：".$coupon_price ?></b> 元</p>
<p>掌柜名称：<?php echo Newiconv("UTF-8", "GBK",$nick) ?> </p>
<p>商品来自：热销-<?php echo Newiconv("UTF-8","GBK",$cat_name) ?></p>
<p>卖家信用：<img src="images/level_14.gif"></p>
<p>所在地区：<?php echo Newiconv("UTF-8", "GBK",$state) ?><?php echo Newiconv("UTF-8", "GBK",$city) ?></p>
<p>运费介绍：<?php if ($express_fee!="卖家包邮"){?>平邮：<?php echo $post_fee; ?>元&nbsp;&nbsp;快递：<?php echo $express_fee; ?>元&nbsp;&nbsp;EMS：<?php echo $ems_fee; ?>元<?php } else { echo $express_fee; }?></p>
<p>本月销量：<em><?php echo $volume; ?></em> 件</p>
<p>库存数量：<em><?php echo $num; ?></em> 件</p>
<p>上架时间：<?php echo $list_time; ?></p>
<p>下架时间：<?php echo $delist_time; ?></p>
<p class="buy"><a href="javascript:;" onclick="clickurl('<?php echo base64_encode($click_url)?>','<?php echo $rootroad;?>'); return false;"><img src="images/buy.gif" alt="<?php echo Newiconv("UTF-8","GBK",$title) ?>"></a>  <a href="javascript:;" onclick="clickurl('<?php echo base64_encode($shop_click_url)?>','<?php echo $rootroad;?>'); return false;"><img src="images/shop.gif"></a></p>
</div>
</div>
<div class="sp"></div>
</div>
<div class="tit"><strong>产品参数</strong></div>
<div class="bbss">
<ul>


<?php
if(isset($props['prop_name'])){
?>
<li><img src="images/ioc_03.gif"/>
<?php echo Newiconv("UTF-8", "GBK",$props['prop_name']); ?>:<?php echo Newiconv("UTF-8", "GBK",$props['name']); ?>
</li>
<?php
}elseif(is_array($props)){
for($i = 0; $i < count($props); $i++) {
?>
<li><img src="images/ioc_03.gif"/>
<?php echo Newiconv("UTF-8", "GBK",$props[$i]['prop_name']); ?>:<?php echo Newiconv("UTF-8", "GBK",$props[$i]['name']); ?>
</li>
<?php }
}?>


</ul>
<div style="clear:both"></div>
</div>

<div class="tit"><strong>产品描述</strong></div>


<div class="Content" id="tb_content">
<?php 
writeDesc("");
?>

</div>

</div>
<!--宝贝左边结束-->
<!--宝贝右边开始-->
<div class="list_right">
<div class="rt"><strong>热销<?php echo Newiconv("UTF-8","GBK",$cat_name) ?>大卖场</strong></div>
<div class="rc">
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

<div class="cbb"><div class="img"><div class="titl"><a href="<?php echo $urlview?>" <?php if($win_pro=="1") echo(" target=_blank"); ?>><?php echo Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"]) ?></a></div><a href="<?php echo $urlview?>"  <?php echo $picurl?> <?php if($win_pro=="1") echo(" target=_blank"); ?>>
                <?php setPic($taobaokeItem[$i]["pic_url"]."_b.jpg",0,0,Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"]))?></a></div><p>淘宝价：<b><?php echo $taobaokeItem[$i]["price"] ?>元</b></p><p>本月热销：<em><?php echo $taobaokeItem[$i]["commission_num"] ?></em> 件</div>

    <?php } ?>

               
                                
</div>
</div>
<!--宝贝右边结束-->




<!--购物流程结束-->
<div class="bot"></div>
</div>


<!--{template footer}-->

</div>                                                                                                                                                                                                                                                                                                                                                                                                            </body>
</html>