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

		
		<div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>

		
		<div class="balbo">
        
        <?php echo $ggleftcontent;?>
</div>
		
	</div>
	<div class="info_rt">
	    <div class="in_weizi"><strong>您的位置：</strong> <a href="<?php echo $rootroad;?>/" class="hom">首页</a> &#8250; <a href="<?php echo $listurl ?>"><?php echo Newiconv("UTF-8","GBK",$cat_name) ?></a> &#8250; <?php echo Newiconv("UTF-8", "GBK",$title) ?></div>
		<h2 class="title"><?php echo Newiconv("UTF-8", "GBK",$title) ?></h2>
		<div class="chanshu">
		    <div class="cpimg">
			    <div class="bigimg">
					<span class="dis" id="subs1"><a href="javascript:;" onclick="clickurl('<?php echo base64_encode($click_url)?>','<?php echo $rootroad;?>'); return false;"><?php setPic($pic_path."_310x310.jpg",0,0,Newiconv("UTF-8","GBK",$title))?></a></span>
				</div>
			</div>
			<div class="cso">
			    <ul class="danli">
				    <li>淘 宝 价：<span class="jr"><?php echo $coupon_price==""?"&yen;".$price:"<s>&yen;".$price."</s>" ?></span> <img src="images/dpvip.gif" alt=vip></li>
					<li>促&nbsp;&nbsp;&nbsp;&nbsp;销： <img src="images/xszk.gif" alt="促销"> <span class="jr"><?php echo $coupon_price; ?></span></li>
					<li>掌柜名片：<?php echo Newiconv("UTF-8", "GBK",$nick) ?> <a href="<?php echo getshopurl(Newiconv("utf-8","gbk",$nick))?>" target="_blank"><u class="red">点击进入掌柜商店</u></a> </li>
					<li>30天销量：<?php echo $volume; ?>件</li>
					<li>卖家信用：<img src="<?php echo $rootroad?>/template/<?php echo $templatefolder?>/images/level_<?php echo $level; ?>.gif" alt="信誉"></li>
					<li>所在地址：<?php echo Newiconv("UTF-8", "GBK",$state) ?> <?php echo Newiconv("UTF-8", "GBK",$city) ?></li>
					<li>宝贝运费：<?php if ($express_fee!="卖家包邮"){?>平邮：<?php echo $post_fee; ?>元&nbsp;&nbsp;快递：<?php echo $express_fee; ?>元&nbsp;&nbsp;EMS：<?php echo $ems_fee; ?>元<?php } else { echo $express_fee; }?></li>
				</ul>
				<ul class="dui">
				    <li>剩余数量:<?php echo $num; ?></li>
					<li>商品新旧:<?php echo $stuff_status; ?></li>
				</ul>
				<div class="gm">
                <a href="javascript:;" onclick="clickurl('<?php echo base64_encode($click_url)?>','<?php echo $rootroad;?>'); return false;"><img src="images/ljgm.gif" alt="购买"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="javascript:;" onclick="clickurl('<?php echo base64_encode($shop_click_url)?>','<?php echo $rootroad;?>'); return false;"><img src="images/ggsp.gif" alt="购买"></a>
                </div>
                
			</div>
		</div>
		<div class="in_spjs">
<!-- 商品详细参数开始 -->
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
		    <div class="titls"><strong>商品介绍</strong></div>
			<div class="xiangqing">
			
<div id="tb_content">
<?php 
writeDesc("");
?>

</div>



<?php if(Show_product_hotlist) {?>
<!-- 立刻购买结束 -->
		<div class="in_tlt">
		    <div class="lfred">相关热销-<?php echo Newiconv("UTF-8","GBK",$cat_name) ?>-商品排行榜</div>
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
				<span class="ijg"><strong>淘宝价：￥<?php echo $taobaokeItem[$i]["price"] ?>元</strong></span>
				<span class="it"><a href="<?php echo $urlview?>" <?php if($win_pro=="1") echo(" target=_blank"); ?>><?php echo Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"]) ?></a></span>
				<span class="it"><a href="#" class="volumn"><font color="#FF0000">已售:<?php echo $taobaokeItem[$i]["volume"] ?>件</font></a><dl>&nbsp;&nbsp;掌柜:</dl><u><a href="<?php echo $pageview?>" target="_blank" title="<?php echo Newiconv("utf-8","gbk",$taobaokeItem[$i]["nick"]) ?>"><?php echo Newiconv("utf-8","gbk",$taobaokeItem[$i]["nick"]) ?></a></u></span>
				<div class="clear"><img src="images/s.gif" alt="分割线" /></div>
				<span class="ix">卖家信用：<img src="images/level_<?php echo $taobaokeItem[$i]["seller_credit_score"] ?>.gif" alt="信誉度"></span>				
				<span class="ian"><a href="javascript:;" onClick="clickurl('<?php echo base64_encode($taobaokeItem[$i]["click_url"])?>','<?php echo $rootroad;?>'); return false;"><img src="images/qgm.gif" alt="点击购买"></a></span>
			</li>
    <?php } ?>
		</ul>

<?php } ?>



			</div>
		</div>
		
	</div>
	
</div>



<div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>

<!--{template footer}-->
</body>
</html>
