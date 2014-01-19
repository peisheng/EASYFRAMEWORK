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
<link href="css/orange_shop.css" rel="stylesheet" type="text/css" />
    
<script language="javascript">
function ResizeImage(F,D,G){if(F!=null){imageObject=F}var E=imageObject.readyState;if(E!="complete"){setTimeout("ResizeImage(null,"+D+","+G+")",50);return }var B=new Image();B.src=imageObject.src;var A=B.width;var C=B.height;if(A>D||C>G){a=A/D;b=C/G;if(b>a){a=b}A=A/a;C=C/a}if(A>0&&C>0){imageObject.width=A;imageObject.height=C}}
</script>
</head>
<body>

<!--{template header}-->
<div id="main">

<?php
			$listurl = getshopIDurl($userid,$sortnum);
			$urlsort = getshopIDurl($userid,$sortnum,false);
?>

<div style="clear:both">
<div style="width:950px; text-align:left; float:left; padding:0px; margin:0px;">
<div>


<div class="taodi_tips">
<div class="listweizhi">����λ��:<a href="<?php echo $rootroad;?>/">��ҳ</a>><a href="<?php echo $listurl ?>"><?php echo $title ?></a></div>
<div class="shuliang">������<span>(<?php echo $totalResults ?>)</span>��������Ҫ���Ա����򣬡�֧�������������׻򡾻�����������ȫ�������ǣ�</div>
</div>

<?php if($Show_list_sort == "1") { ?>

<div class="taodi_choose">
<ul>
<li<?php if(intval($sortnum) == 0) { echo ' id="this_choose"';} ?>><a href="<?php echo getshopIDurl($userid,0); ?>">�����Ӹߵ���</a></li>
<li<?php if(intval($sortnum) == 1) { echo ' id="this_choose"';} ?>><a href="<?php echo getshopIDurl($userid,1); ?>">ʱ��Ӹߵ���</a></li>
<li<?php if(intval($sortnum) == 2) { echo ' id="this_choose"';} ?>><a href="<?php echo getshopIDurl($userid,2); ?>">�۸�Ӹߵ���</a></li>
<li<?php if(intval($sortnum) == 3) { echo ' id="this_choose"';} ?>><a href="<?php echo getshopIDurl($userid,3); ?>">�۸�ӵ͵���</a></li>
</ul>
</div>




<?php } ?>

<div class="staodi_listbox">
<dl>

<?php for($i = 0; $i < count($taobaokeItem); $i++) {


	$urlview =getproducturl($taobaokeItem[$i]["num_iid"]);
	if($listlinktype=="tao"){
		$picurl = " onclick=\"clickurl('".base64_encode($taobaokeItem[$i]["click_url"])."','".$rootroad."'); return false;\"";
	}else{
		$picurl = "";
	}
	
	
 ?>

<dt>
<em><a href="<?php echo $urlview?>" target="_blank"><script language="javascript">setPic('<?php echo base64_encode($taobaokeItem[$i]["pic_url"]."_310x310.jpg") ?>',0,0,'<?php echo htmlspecialchars(iconv("UTF-8","GBK",$taobaokeItem[$i]["title"]),ENT_QUOTES) ?>');</script></a></em>
<p class="taodi_title"><a href="<?php echo $urlview?>" <?php if($win_pro=="1") echo(" target=_blank"); ?>><?php echo Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"]) ?></a></p>
<p class="taodi_nick"><b>��<?php echo $taobaokeItem[$i]["price"] ?>Ԫ</b>��30��������<b><?php echo $taobaokeItem[$i]["volume"] ?></b> ��</p>

</dt>

<?php } ?>
</dl>
</div>


</div>
</div>

</div>
<div style="clear:both">
</div>
<?php if($is_indexs == "ok") {?>
<DIV class="block clearfix" style="clear:both; width:940px; margin:0 auto;">
		<?php
	include($WEBROOT_TEMP."news.php");
?>
    </DIV>
<DIV style="clear:both;">
</DIV>	
<?php } ?>
<?php include($WEBROOT_TEMP."hot.php");?>
<!--{template footer}-->
</div>
</body>
</html>