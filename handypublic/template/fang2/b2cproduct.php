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
<!--������߿�ʼ-->
<div class="list_left">

<div class="tbot"></div>
<div style="clear:both"></div>
<div class="goinfo"><h1><?php echo Newiconv("UTF-8", "GBK",$title) ?></h1>
<div class="gsin">
<div class="img"><a href="javascript:;" onclick="clickurl('<?php echo base64_encode($click_url)?>','<?php echo $rootroad;?>'); return false;"><?php setPic($pic_path,300,300,Newiconv("UTF-8","GBK",$title))?></a></div>
<div class="jtxx">
			<p>�� �� �ۣ�<b><?php echo "<s>&yen;".$price."</s>  " ?></b></p>
			<p>�����̳ǣ�<a href="<?php echo getsearchurlB2C("",$catid,$sid)?>" <?php if($win_daohang=="1") echo(" target=_blank"); ?>><?php echo $nick ?></a ></p
            ><p>�ۺ�����������˿�</li>
            <p>�������<?php echo $cash_ondelivery;?></p>
            <p>�Ƿ���ʣ�<?php echo $freeshipment;?></p>
            <p>���ڸ��<?php echo $installment;?></p>
            <p>�ṩ��Ʊ��<?php echo $has_invoice;?></p>
            <p>����ʱ�䣺<?php echo $modified;?></p>
			<p>������ӣ�<?php echo $keywordStr ?></p>



<p class="buy"><a href="javascript:;" onclick="clickurl('<?php echo base64_encode($click_url)?>','<?php echo $rootroad;?>'); return false;"><img src="images/buy.gif" alt="<?php echo Newiconv("UTF-8","GBK",$title) ?>"></a>  <a href="javascript:;" onclick="clickurl('<?php echo base64_encode($shop_click_url)?>','<?php echo $rootroad;?>'); return false;"><img src="images/shop.gif"></a></p>
</div>
</div>
<div class="sp"></div>
</div>
<div class="tit"><strong>��Ʒ����</strong></div>
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

<div class="tit"><strong>��Ʒ����</strong></div>


<div class="Content" id="tb_content">
<?php 
writeDesc("");
?>

</div>

</div>
<!--������߽���-->
<!--�����ұ߿�ʼ-->
<div class="list_right">
<div class="rt"><strong>����<?php echo Newiconv("UTF-8","GBK",$cat_name) ?>������</strong></div>
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
                <?php setPic($taobaokeItem[$i]["pic_url"],0,0,Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"]))?></a></div><p>�Żݼۣ�<b><?php echo $taobaokeItem[$i]["price"] ?>Ԫ</b></p><p>�̳ǣ�<em><a href="<?php echo $pageview?>" target="_blank"><?php echo $taobaokeItem[$i]["seller_name"] ?></a></em></p></div>

    <?php } ?>

               
                                
</div>
</div>
<!--�����ұ߽���-->




<!--�������̽���-->
<div class="bot"></div>
</div>


<!--{template footer}-->

</div>                                                                                                                                                                                                                                                                                                                                                                                                            </body>
</html>