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
<div class="img"><a href="javascript:;" onclick="clickurl('<?php echo base64_encode($click_url)?>','<?php echo $rootroad;?>'); return false;"><?php setPic($pic_path,300,300,Newiconv("UTF-8","GBK",$title))?></a></div>
<div class="jtxx">
			<p>商 城 价：<b><?php echo "<s>&yen;".$price."</s>  " ?></b></p>
			<p>销售商城：<a href="<?php echo getsearchurlB2C("",$catid,$sid)?>" <?php if($win_daohang=="1") echo(" target=_blank"); ?>><?php echo $nick ?></a ></p
            ><p>售后服务：无条件退款</li>
            <p>货到付款：<?php echo $cash_ondelivery;?></p>
            <p>是否包邮：<?php echo $freeshipment;?></p>
            <p>分期付款：<?php echo $installment;?></p>
            <p>提供发票：<?php echo $has_invoice;?></p>
            <p>更新时间：<?php echo $modified;?></p>
			<p>快捷链接：<?php echo $keywordStr ?></p>



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
                <?php setPic($taobaokeItem[$i]["pic_url"],0,0,Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"]))?></a></div><p>优惠价：<b><?php echo $taobaokeItem[$i]["price"] ?>元</b></p><p>商城：<em><a href="<?php echo $pageview?>" target="_blank"><?php echo $taobaokeItem[$i]["seller_name"] ?></a></em></p></div>

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