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
<link href="css/orange_view.css" rel="stylesheet" type="text/css" />
<style>
body {
	font:12px arial;
	text-align:center;
	background:#fff
}
body, p, form {
	margin:0;
	padding:0
}
body, form, #lg {
	position:relative
}
td {
	text-align:left
}
img {
	border:0
}
a {
	color:#00c
}
a:active {
	color:#f60
}
#u {
	padding:7px 10px 3px 0;
	text-align:right
}
#m {
	width:650px;
	margin:0 auto
}
#nv {
	font-size:16px;
	margin:0 0 4px -32px
}
#nv a, #nv b, #su, #lk {
	font-size:14px
}
#lg {
	margin:-17px 0 9px
}
#fm {
	padding-left:111px;
	text-align:left
}
#kw {
	width:391px;
	line-height:16px;
	padding:3px 1px;
	margin:0 6px 0 0;
	font:16px arial
}
#su {
	width:78px;
	height:28px;
	line-height:24px
}
#kw, #su {
	vertical-align:middle
}
#lk {
	margin:33px 0
}
#lk span {
	font:14px "����"
}
#lm {
	height:60px
}
#lh {
	margin:16px 0 5px;
	font:12px "����"
}
#lh a {
	font:12px arial
}
#hp {
	position:absolute;
	line-height:14px;
	margin:0 0 0 6px;
	top:-1px;
*top:2px
}
#cp, #cp a {
	color:#77c
}
</style></head>
<body>

<?php
include($WEBROOT_TEMP."header.php");
?>

<div id="main">

<div class="taodi_mainbox">
<div class="clear"></div>
<div class="taodi_mainboxl">
<div class="taodi_left_catalogs">
<h2><span>�Ҳ��㻹ϲ����</span></h2>

</div>
<div class="leftad">

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
<div>
<a href="<?php echo $urlview?>" <?php echo $picurl?> target="_blank"><script language="javascript">setPic('<?php echo base64_encode($taobaokeItem[$i]["pic_url"]."_160x160.jpg") ?>',0,0,'<?php echo iconv("UTF-8","GBK",$taobaokeItem[$i]["title"]) ?>');</script></a>
<p><a href="<?php echo $urlview?>"<?php if($win_pro=="1") echo(" target=_blank"); ?>><?php echo iconv("UTF-8","GBK",$taobaokeItem[$i]["title"]) ?></a></p>
<b>��<?php echo $taobaokeItem[$i]["price"] ?>Ԫ</b> <a href="<?php echo $urlview?>" <?php echo $picurl?> target="_blank"><b>����>></b></a></p>
<p>һ��������<b><?php echo $taobaokeItem[$i]["commission_num"] ?></b>��</p>

</div>
<?php } ?>

<?php 
echo $ggleftcontent;
?>
</div>
</div>

<div class="taodi_mainboxr" style="text-align:left">
<div class="nideweizi">����λ�ã�<a href="<?php echo $sitetitleurl?>">��ҳ</a> > <strong><?php echo iconv("UTF-8", "GBK",$title) ?></strong></div>

<div class="titems_title"><h1><?php echo iconv("UTF-8", "GBK",$title) ?></h1></div>
<div class="titemsbox">
	<div class="titemsbox_l" style="overflow:hidden">
	<a href="javascript:;" onclick="clickurl('<?php echo base64_encode($click_url)?>','<?php echo $rootroad;?>'); return false;"><script language="javascript">setPic('<?php echo base64_encode($pic_path."_310x310.jpg") ?>',0,0,'<?php echo iconv("UTF-8","GBK",$title) ?>');</script></a>
	</div>
	<div class="titemsbox_r">
		<ul>
			<li class="price">�� �� �ۣ�<b><?php echo $coupon_price==""?"&yen;".$price:"<s>&yen;".$price."</s>  �����ۣ�".$coupon_price ?></b>Ԫ</li>
			<li>�����˷ѣ�<?php if ($express_fee!="���Ұ���"){?>ƽ�ʣ�<?php echo $post_fee; ?>Ԫ&nbsp;&nbsp;��ݣ�<?php echo $express_fee; ?>Ԫ&nbsp;&nbsp;EMS��<?php echo $ems_fee; ?>Ԫ<?php } else { echo $express_fee; }?></li>
			<li>�ƹ����ƣ�<?php echo Newiconv("UTF-8", "GBK",$nick) ?> <a href="<?php echo getshopurl(Newiconv("utf-8","gbk",$nick));
?>" target="_blank">����鿴�ƹ������Ʒ</a></li>
			<li>�������ã�<img src="<?php echo $templateroot;?>/img/orange/level_<?php echo $seller_credit_score; ?>.gif"></li>
			<li>���ڵ�����<?php echo iconv("UTF-8", "GBK",$state) ?><?php echo iconv("UTF-8", "GBK",$city) ?></li>
			<li class="num">����������<b><?php echo $volume; ?></b>��</li>
            <li class="num">���������<b><?php echo $num; ?></b>��</li>
			<li>�ϼ�ʱ�䣺<?php echo $list_time; ?></li>
			<li>�¼�ʱ�䣺<?php echo $delist_time; ?></li>
		</ul>
		<div class="go_buy">
		<a href="javascript:;" onclick="clickurl('<?php echo base64_encode($click_url)?>','<?php echo $rootroad;?>'); return false;"><img src="<?php echo $templateroot;?>/img/orange/buy.gif"></a>
		<a href="javascript:;" onclick="clickurl('<?php echo base64_encode($shop_click_url)?>','<?php echo $rootroad;?>'); return false;"><img src="<?php echo $templateroot;?>/img/orange/shop.gif"></a>
		</div>
	</div><div class="clear"></div>
</div>

<div class="titems_info">
<div class="ti_box">
	<div class="ti"><h1>��Ʒ��ϸ��Ϣ-<?php echo Newiconv("UTF-8", "GBK",$title) ?></h1></div>
</div>

<!-- ��Ʒ��ϸ������ʼ -->
<?php if(Show_product_hotlist) {?>
<div class="titems_xxinfo">
	<ul>
<?php
if(isset($props['prop_name'])){
?>
<li>
<?php echo Newiconv("UTF-8", "GBK",$props['prop_name']); ?>:<?php echo Newiconv("UTF-8", "GBK",$props['name']); ?>
</li>
<?php
}elseif(is_array($props)){
for($i = 0; $i < count($props); $i++) {
?>
<li>
<?php echo Newiconv("UTF-8", "GBK",$props[$i]['prop_name']); ?>:<?php echo Newiconv("UTF-8", "GBK",$props[$i]['name']); ?>
</li>
<?php }
}?>
	</ul>
</div>

<?php } ?>

<div id="tb_content" style="clear:both">
<?php 
writeDesc("");
?>

</div>

<!-- ���̹���ʼ -->
<div class="go_buyb">
		<a href="javascript:;" onclick="clickurl('<?php echo base64_encode($click_url)?>','<?php echo $rootroad;?>'); return false;"><img src="<?php echo $rootroad?>/template/<?php echo $templatefolder?>/img/orange/buy.gif"></a>
		<a href="javascript:;" onclick="clickurl('<?php echo base64_encode($shop_click_url)?>','<?php echo $rootroad;?>'); return false;"><img src="<?php echo $rootroad?>/template/<?php echo $templatefolder?>/img/orange/shop.gif"></a>
</div>

<?php if(Show_product_hotlist) {?>
<?php } ?>
</div>

</div>
<div class="clear"></div>
</div>

<?php include($WEBROOT_TEMP."hot.php");?>
<!--{template footer}-->
</div>
</body>
</html>