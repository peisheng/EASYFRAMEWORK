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
					<span class="dis" id="subs1"><a href="javascript:;" onclick="clickurl('<?php echo base64_encode($click_url)?>','<?php echo $rootroad;?>'); return false;"><?php setPic($pic_path,0,0,Newiconv("UTF-8","GBK",$title))?></a></span>
				</div>
			</div>
			<div class="cso">
			    <ul class="danli">
				    <li>优 惠 价：<span class="jr"><?php echo $coupon_price==""?"&yen;".$price:"<s>&yen;".$price."</s>" ?></span> <img src="images/dpvip.gif" alt=vip></li>
					<li>商城名称：<a href="<?php echo getsearchurlB2C("",$catid,$sid)?>" <?php if($win_daohang=="1") echo(" target=_blank"); ?>><?php echo $nick ?></a ></li>
            <li>售后服务：无条件退款</li>
            <li>货到付款：<?php echo $cash_ondelivery;?></li>
            <li>是否包邮：<?php echo $freeshipment;?></li>
            <li>分期付款：<?php echo $installment;?></li>
            <li>提供发票：<?php echo $has_invoice;?></li>
				    <li>快捷链接:<?php echo $keywordStr ?></li>
				</ul>
				<div class="gm">
                <a href="javascript:;" onclick="clickurl('<?php echo base64_encode($click_url)?>','<?php echo $rootroad;?>'); return false;"><img src="images/ljgm.gif" alt="购买"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="javascript:;" onclick="clickurl('<?php echo base64_encode($shop_click_url)?>','<?php echo $rootroad;?>'); return false;"><img src="images/ggsp.gif" alt="购买"></a>
                </div>
                
			</div>
		</div>
		<div class="in_spjs">
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
			    <span class="ig"><a href="<?php echo $urlview?>" <?php echo $picurl?> <?php if($win_pro=="1") echo(" target=_blank"); ?>><?php setPic($taobaokeItem[$i]["pic_url"],180,180,strip_tags(Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"])))?></a></span>
				<span class="ijg"><strong>淘宝价：￥<?php echo $taobaokeItem[$i]["price"] ?>元</strong></span>
				<span class="it"><a href="<?php echo $urlview?>" <?php if($win_pro=="1") echo(" target=_blank"); ?>><?php echo Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"]) ?></a></span>
				<span class="it"><dl>&nbsp;&nbsp;店铺:</dl><u><a href="<?php echo $pageview?>" target="_blank" title="<?php echo Newiconv("utf-8","gbk",$taobaokeItem[$i]["nick"]) ?>"><?php echo Newiconv("utf-8","gbk",$taobaokeItem[$i]["nick"]) ?></a></u></span>
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
