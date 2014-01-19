<?PHP
if (!defined('VERSON'))
{
	exit('Access Defined');
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="gb2312" />
<!--{template headerjs}-->

<title><?php echo $page_title ?></title>
<meta name="keywords" content="<?php echo $page_keyword ?>" />
<meta name="description" content="<?php echo $page_discription ?>" />
<link rel="stylesheet" href="images/style.css" />
<link rel="stylesheet" href="images/er_info.css" />
<!--www.cnmysoft.com -->
<script src="images/js.js" language="javascript" type="text/javascript"></script>
</head>
<body>
<!--{template header}-->

<div class="a_b">
    <div class="info_lf">
	    <!--{template left}-->

		
		<div class="clear pd8"><img src="images/s.gif" alt="�ָ���" /></div>

		
		<div class="balbo">
        
        <?php echo $ggleftcontent;?>
</div>
		
	</div>
	<div class="info_rt">
	    <div class="in_weizi"><strong>����λ�ã�</strong> <a href="<?php echo $rootroad;?>/" class="hom">��ҳ</a> &#8250; <a href="<?php echo $listurl ?>"><?php echo Newiconv("UTF-8","GBK",$cat_name) ?></a> &#8250; <?php echo Newiconv("UTF-8", "GBK",$title) ?></div>
		<h2 class="title"><?php echo Newiconv("UTF-8", "GBK",$title) ?></h2>
		<div class="chanshu">
		    <div class="cpimg">
			    <div class="bigimg">
					<span class="dis" id="subs1"><a href="javascript:;" onclick="clickurl('<?php echo base64_encode($click_url)?>','<?php echo $rootroad;?>'); return false;"><?php setPic($pic_path."_310x310.jpg",0,0,Newiconv("UTF-8","GBK",$title))?></a></span>
				</div>
			</div>
			<div class="cso">
			    <ul class="danli">
				    <li>�� �� �ۣ�<span class="jr"><?php echo $coupon_price==""?"&yen;".$price:"<s>&yen;".$price."</s>" ?></span> <img src="images/dpvip.gif" alt=vip></li>
					<li>��&nbsp;&nbsp;&nbsp;&nbsp;���� <img src="images/xszk.gif" alt="����"> <span class="jr"><?php echo $coupon_price; ?></span></li>
					<li>�ƹ���Ƭ��<?php echo Newiconv("UTF-8", "GBK",$nick) ?> <a href="<?php echo getshopurl(Newiconv("utf-8","gbk",$nick))?>" target="_blank"><u class="red">��������ƹ��̵�</u></a> </li>
					<li>30��������<?php echo $volume; ?>��</li>
					<li>�������ã�<img src="<?php echo $rootroad?>/template/<?php echo $templatefolder?>/images/level_<?php echo $level; ?>.gif" alt="����"></li>
					<li>���ڵ�ַ��<?php echo Newiconv("UTF-8", "GBK",$state) ?> <?php echo Newiconv("UTF-8", "GBK",$city) ?></li>
					<li>�����˷ѣ�<?php if ($express_fee!="���Ұ���"){?>ƽ�ʣ�<?php echo $post_fee; ?>Ԫ&nbsp;&nbsp;��ݣ�<?php echo $express_fee; ?>Ԫ&nbsp;&nbsp;EMS��<?php echo $ems_fee; ?>Ԫ<?php } else { echo $express_fee; }?></li>
				</ul>
				<ul class="dui">
				    <li>ʣ������:<?php echo $num; ?></li>
					<li>��Ʒ�¾�:<?php echo $stuff_status; ?></li>
				</ul>
				<div class="gm">
                <a href="javascript:;" onclick="clickurl('<?php echo base64_encode($click_url)?>','<?php echo $rootroad;?>'); return false;"><img src="images/ljgm.gif" alt="����"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="javascript:;" onclick="clickurl('<?php echo base64_encode($shop_click_url)?>','<?php echo $rootroad;?>'); return false;"><img src="images/ggsp.gif" alt="����"></a>
                </div>
                
			</div>
		</div>
		<div class="in_spjs">
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
		    <div class="titls"><strong>��Ʒ����</strong></div>
			<div class="xiangqing">
			
<div id="tb_content">
<?php 
writeDesc("");
?>

</div>



<?php if(Show_product_hotlist) {?>
<!-- ���̹������ -->
		<div class="in_tlt">
		    <div class="lfred">�������-<?php echo Newiconv("UTF-8","GBK",$cat_name) ?>-��Ʒ���а�</div>
		</div>
		<ul class="in_li">

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
		    <li>
			    <span class="ig"><a href="<?php echo $urlview?>" <?php echo $picurl?> <?php if($win_pro=="1") echo(" target=_blank"); ?>><?php setPic($taobaokeItem[$i]["pic_url"]."_b.jpg",180,180,strip_tags(Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"])))?></a></span>
				<span class="ijg"><strong>�Ա��ۣ���<?php echo $taobaokeItem[$i]["price"] ?>Ԫ</strong></span>
				<span class="it"><a href="<?php echo $urlview?>" <?php if($win_pro=="1") echo(" target=_blank"); ?>><?php echo Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"]) ?></a></span>
				<span class="it"><a href="#" class="volumn"><font color="#FF0000">����:<?php echo $taobaokeItem[$i]["volume"] ?>��</font></a><dl>&nbsp;&nbsp;�ƹ�:</dl><u><a href="<?php echo $pageview?>" target="_blank" title="<?php echo Newiconv("utf-8","gbk",$taobaokeItem[$i]["nick"]) ?>"><?php echo Newiconv("utf-8","gbk",$taobaokeItem[$i]["nick"]) ?></a></u></span>
				<div class="clear"><img src="images/s.gif" alt="�ָ���" /></div>
				<span class="ix">�������ã�<img src="images/level_<?php echo $taobaokeItem[$i]["seller_credit_score"] ?>.gif" alt="������"></span>				
				<span class="ian"><a href="javascript:;" onClick="clickurl('<?php echo base64_encode($taobaokeItem[$i]["click_url"])?>','<?php echo $rootroad;?>'); return false;"><img src="images/qgm.gif" alt="�������"></a></span>
			</li>
    <?php } ?>
		</ul>

<?php } ?>



			</div>
		</div>
		
	</div>
	
</div>



<div class="clear pd8"><img src="images/s.gif" alt="�ָ���" /></div>

<!--{template footer}-->
</body>
</html>
