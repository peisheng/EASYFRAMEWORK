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
</head>
<body>
<!--{template header}-->


<div class="a_b">
    <div class="info_lf">
<!--{template left}-->
		
		<div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>

		
		<div class="balbo">
        
        <!--{ad/paileft}-->

        
</div>
		
	</div>
<?php
			$listurl = getshopIDurl($userid,$sortnum);
			$urlsort = getshopIDurl($userid,$sortnum,false);
?>
	<div class="info_rt">
	    <div class="in_weizi"><strong>您的位置：</strong> <a href="<?php echo $rootroad;?>/" class="hom">首页</a> &#8250; <a href="<?php echo $listurl ?>"><?php echo $title ?></a></div>
<?php if($Show_list_sort == "1") { ?>
		<div class="in_fen">
        

		
        
        
        <a href="#"><strong>排序结果：</strong></a>
        
    <a href="<?php echo getshopIDurl($userid,0,$sp,$ep); ?>"<?php echo (intval($sortnum) == 0)?' class="cs"':"" ?>>销量从高到低</a>
    <a href="<?php echo getshopIDurl($userid,1,$sp,$ep); ?>"<?php echo (intval($sortnum) == 1)?' class="cs"':"" ?>>时间从高到低</a>
    <a href="<?php echo getshopIDurl($userid,2,$sp,$ep); ?>"<?php echo (intval($sortnum) == 2)?' class="cs"':"" ?>>价格从高到低</a>
    <a href="<?php echo getshopIDurl($userid,3,$sp,$ep); ?>"<?php echo (intval($sortnum) == 3)?' class="cs"':"" ?>>价格从低到高</a>
        
        
        <br>
		
        
        </div>
<?php } ?>
		
		<div class="in_tlt">
		    <div class="lfred">在淘宝上搜索相关商品 <?php echo $totalResults ?> 件</div>
		</div>
		<ul class="in_li">


<?php for($i = 0; $i < count($taobaokeItem); $i++) {


	$urlview =getproducturl($taobaokeItem[$i]["num_iid"]);
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
                
				<span class="it"><a href="#"><font color="#FF0000">已售：<?php echo $taobaokeItem[$i]["volume"] ?>件</font></a></u></span>
				<span class="ian"><a href="javascript:;" onClick="clickurl('<?php echo base64_encode($taobaokeItem[$i]["click_url"])?>','<?php echo $rootroad;?>'); return false;"><img src="images/qgm.gif" alt="点击购买"></a></span>
			</li>

<?php
}?>

		</ul>        
		
	</div>
	
</div>



<!--{template teyue}-->

<div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>

<!--{template footer}-->

</body>
</html>
