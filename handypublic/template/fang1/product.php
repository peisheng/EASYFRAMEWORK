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
<link href="css/eaea_all.css" rel="stylesheet" type="text/css" />
<link href="css/eaea_goods.css" rel="stylesheet" type="text/css" />
<link rel="Shortcut Icon" href="<?php echo $sitetitleurl;?>/favicon.ico">
<link rel="Bookmark" href="<?php echo $sitetitleurl;?>/favicon.ico">
<!-- 兼容其他浏览器收藏夹脚本 -->
<script language="javascript">
function addfavor(url,title) {
    if(confirm("网站名称："+title+"\n网址："+url+"\n确定添加收藏?")){
        var ua = navigator.userAgent.toLowerCase();
        if(ua.indexOf("msie 8")>-1){
            external.AddToFavoritesBar(url,title,'');//IE8
        }else{
            try {
                window.external.addFavorite(url, title);
            } catch(e) {
                try {
                    window.sidebar.addPanel(title, url, "");//firefox
                } catch(e) {
                    alert("加入收藏失败，请使用Ctrl+D进行添加");
                }
            }
        }
    }
    return false;
}
</script>
</head>
<body>
<!-- 加载头部模板 -->
<!--{template header}-->
<div class="list">
<!-- 左部开始 -->
<div class="list_left">
	<!-- 热销商品 -->
	<div class="list_hot">
    	<div class="hot_head"><span>热销推荐</span></div>

        <!--列表模块-->
      <?php include($WEBROOT_TEMP."left_pro.php");?>

        
        <!--左部广告-->
      <div class="leftad">
        	<ul>
        <?php echo $ggleftcontent;?>
            </ul>       
      </div>
        
    </div>
    

</div>
<?php
	$listurl = getsearchurl("",$catid);
	$prourl = getproducturl($iid);
?>

<!-- 右部开始 -->
<div class="list_right">
	<!-- 当前位置 -->
	<div class="list_place">
    	<div class="list_place_ioc"><img src="<?php echo $templateroot;?>/img/eaea/ioc_02.gif" align="absmiddle"/></div>
    	<div class="list_place_nav">您的位置:<a href="<?php echo $rootroad;?>/">首页</a>><a href="<?php echo $listurl?>"><?php echo Newiconv("UTF-8","GBK",$cat_name) ?></a>><a href="<?php echo $prourl?>"><?php echo Newiconv("UTF-8", "GBK",$title) ?></a></div>
    </div>
    
	<!-- 列表广告 -->
    <div class="topad"> 
        <ul>
			 <?php echo get_neirong_str("productgg")?>
        </ul>
    </div>
    
    <!-- 商品标题 -->
    <div class="goods_title">
		<div class="title_ioc"><img src="<?php echo $templateroot;?>/img/eaea/title_ioc.gif" /></div>
        <div class="goodstitle"><?php echo Newiconv("UTF-8", "GBK",$title) ?></div>
        <div class="title_iocr"><a href="javascript:;" onclick="javascript:addfavor('<?php echo $prourl ?>','<?php echo Newiconv("UTF-8","GBK",$title) ?>');"><img src="<?php echo $templateroot;?>/img/eaea/list_ioc08.gif" align="absmiddle" alt="收藏商品到收藏夹" /></a></div>
    </div>

    <!-- 商品信息 -->
    <div class="goods_info">
		<div class="goods_info_img" onMouseOver="this.className='goods_info_img_hover'" onMouseOut="this.className='goods_info_img'"><a href="javascript:;" onclick="clickurl('<?php echo base64_encode($click_url)?>','<?php echo $rootroad;?>'); return false;"><?php setPic($pic_path."_310x310.jpg",0,0,Newiconv("UTF-8","GBK",$title))?></a>
        </div>
        
        <div class="goods_info_div">
        	<ul>
                <li class="price">淘宝售价：<b><?php echo $coupon_price==""?"&yen;".$price:"<s>&yen;".$price."</s>  折扣：".$coupon_price."元" ?></b></li>
                <li>掌柜名称：<?php echo Newiconv("UTF-8", "GBK",$nick) ?> </li>
                <li>卖家信用：<img src="<?php echo $templateroot;?>/img/eaea/level_<?php echo $level; ?>.gif"></li>
                <li>商品来自：<?php echo Newiconv("UTF-8", "GBK",$state) ?> <?php echo Newiconv("UTF-8", "GBK",$city) ?></li>
                <li class="ems">运费介绍：<?php if ($express_fee!="卖家包邮"){?>平邮：<?php echo $post_fee; ?>元&nbsp;&nbsp;快递：<?php echo $express_fee; ?>元&nbsp;&nbsp;EMS：<?php echo $ems_fee; ?>元<?php } else { echo $express_fee; }?></li>
                <li class="stocknum">本月销量：<b><?php echo $volume ?></b>件</li>
                <li class="stocknum">库存数量：<b><?php echo $num ?></b>件</li>
                <li>上架时间：<?php echo $list_time; ?></li>
                <li>下架时间：<?php echo $delist_time; ?></li>
            </ul>
            <div class="go_buy">
		<a href="javascript:;" onclick="clickurl('<?php echo base64_encode($click_url)?>','<?php echo $rootroad;?>'); return false;"><img src="<?php echo $templateroot;?>/img/eaea/buy.gif"></a>
		<a href="javascript:;" onclick="clickurl('<?php echo base64_encode($shop_click_url)?>','<?php echo $rootroad;?>'); return false;"><img src="<?php echo $templateroot;?>/img/eaea/shop.gif"></a>
			</div>
        </div>
    </div>
    
    <!-- 商品头部 -->
	<div class="goods_head">
    	<div class="goods_head_ioc"><img src="<?php echo $templateroot;?>/img/eaea/ioc_02.gif" align="absmiddle"/></div>
    	<div class="goods_head_nav">商品详细信息 - </div>
        <h1 class="goods_head_h1"><?php echo Newiconv("UTF-8", "GBK",$title) ?></h1>
    </div>

    <!-- 商品属性 -->

    <?php if(is_array($props)) { ?>
    <div class="goods_props">
    	<div class="goods_props_catalogs">
        <div class="clear"></div>
        <ul>
		<?php
            if(is_array($props)){
                for($i = 0; $i < count($props); $i++) {
                    echo '<li><img src="'.$templateroot.'/img/eaea/ioc_03.gif"/>'.Newiconv("UTF-8","GBK",$props[$i]['prop_name']).':'.Newiconv("UTF-8","GBK",$props[$i]['name']).'</li>';
                    }
                }
        
        
        ?>
        </ul>
        <div class="clear"></div>
        </div>
    </div>
    <?php } ?>
    
    <!-- 商品详细 -->
    <div id="goods_desc">
<div id="tb_content">
<?php 
writeDesc("");
?>

</div>
    </div>
    
    
</div>

</div>

<!-- 加载底部模板 -->
<?php include("footer.php");?>


 </body>
</html>