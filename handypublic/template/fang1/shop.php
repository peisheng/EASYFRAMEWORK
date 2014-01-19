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
<link href="css/eaea_list.css" rel="stylesheet" type="text/css" />
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
<!--{template header}-->
<div class="list">
<!-- 左部开始 -->
<div class="list_left">
	<!-- 热销商品 -->
	<div class="list_hot">
    	<div class="hot_head"><span>热销推荐</span></div>
        	
        <!--列表模块-->
<!--{template left}-->
      
      <!--左部广告-->
      <div class="leftad">
        	<ul>
            	        <!--{ad/paileft}-->

            </ul>       
      </div>  
      
    </div>
    
</div>

<!-- 右部开始 -->
<div class="list_right">
	<!-- 当前位置 -->
	<div class="list_place">
    	<div class="list_place_ioc"><img src="<?php echo $templateroot;?>/img/eaea/ioc_02.gif" align="absmiddle"/></div>
    	<div class="list_place_nav">您的位置:<a href="<?php echo $rootroad;?>/">首页</a>>
        <?php
        if($catid != 0 || $catid == ""){
			echo '<a href="'.$listurl.'">'.$cat_name.'</a> 搜索到 '.$cat_name.$q.' 相关商品<span class="goods_list_num">'.$totalResults.'</span>件';
        }else{
			echo '搜索关键词<span class="goods_list_num">'.$q.'</span>商品列表';
		}
		?>
        
        </div>
    </div>
    
    <!-- 下级分类 -->
    <?php if($result_subcats_count > 0 && $catid > 0) { ?>
    <div class="list_class">
    	<div class="list_class_catalogs">
        <div class="clear"></div>
        <ul>
		<?php
        foreach ($result_subcats as $row){
			if(!ischengrencid($row["cid"])) { 
				$tpurl = getsearchurl("",$row["cid"]);
		?>
        <li><img src="<?php echo $templateroot;?>/img/eaea/ioc_03.gif"/><a href="<?php echo $tpurl ?>"<?php if($win_daohang=="1") echo(" target=_blank"); ?>><?php echo Newiconv("UTF-8","GBK",$row["name"]) ?></a></li>
		<?php } } ?>
        </ul>
        <div class="clear"></div>
        </div>
    </div>
    <?php } ?>
<?php
			$listurl = getshopIDurl($userid,$sortnum);
			$urlsort = getshopIDurl($userid,$sortnum,false);
?>
    
<?php if($Show_list_sort == "1") { ?>
    <!-- 商品排序 -->
    <div class="list_choose">
    <ul>
    <li<?php if($sortnum == 0) { echo ' id="this_choose"';} ?>><a href="<?php echo getshopIDurl($userid,0,$sp,$ep); ?>">销量从高到低</a></li>
    <li<?php if($sortnum == 1) { echo ' id="this_choose"';} ?>><a href="<?php echo getshopIDurl($userid,1,$sp,$ep); ?>">时间从高到低</a></li>
    <li<?php if($sortnum == 2) { echo ' id="this_choose"';} ?>><a href="<?php echo getshopIDurl($userid,2,$sp,$ep); ?>">价格从高到低</a></li>
    <li<?php if($sortnum == 3) { echo ' id="this_choose"';} ?>><a href="<?php echo getshopIDurl($userid,3,$sp,$ep); ?>">价格从低到高</a></li>

    </ul>
    </div>
<?php } ?>

    
    <!-- 商品列表 -->
    <div class="list_goodslist">
    
    
    
<?php for($i = 0; $i < count($taobaokeItem); $i++) {


	$urlview =getproducturl($taobaokeItem[$i]["num_iid"]);
	
	if($listlinktype=="tao"){
		$picurl = " onclick=\"clickurl('".base64_encode($taobaokeItem[$i]["click_url"])."','".$rootroad."'); return false;\"";
	}else{
		$picurl = "";
	}

 ?>



        	<div class="goods_list">
            
            	<div class="goods_list_img" onMouseOver="this.className='goods_list_img_hover'" onMouseOut="this.className='goods_list_img'">
                <a href="<?php echo $urlview?>" <?php echo $picurl?> <?php if($win_pro=="1") echo(" target=_blank"); ?> onfocus="this.blur()">
                <script language="javascript">setPic('<?php echo base64_encode($taobaokeItem[$i]["pic_url"]."_b.jpg") ?>',0,0,'<?php echo htmlspecialchars(Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"]),ENT_QUOTES) ?>');</script></a>
                </div>
                <div class="goods_list_title">
                <a href="<?php echo $urlview?>" <?php if($win_pro=="1") echo(" target=_blank"); ?> title=""><?php echo Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"]) ?></a>
                </div>
                
                <div class="goods_list_price">
                
                	<div class="goods_list_pricel">
                    	<div class="goods_list_scprice"><img src="<?php echo $templateroot;?>/img/eaea/list_ioc01.gif" />市场价:￥<span><?php echo ($taobaokeItem[$i]["price"]*$CustomSetFieldValue[ProShiChang]); //调用市场价格?></span> 元</div>
                    	<div class="goods_list_tbprice"><img src="<?php echo $templateroot;?>/img/eaea/list_ioc02.gif" />淘宝价:￥<span><?php echo $taobaokeItem[$i]["price"] ?></span> 元</div>
                    	<div class="goods_list_num"><img src="<?php echo $templateroot;?>/img/eaea/list_ioc03.gif" />已销售:￥<span><?php echo $taobaokeItem[$i]["volume"] ?></span> 件</div>
                    </div>
                    
                    <div class="goods_list_pricer">
                    	<div class="goods_list_button"><a href="<?php echo $rootroad."/gotourl.php?iid=".$taobaokeItem[$i]["num_iid"]?>"<?php echo $picurl?> <?php if($win_pro=="1") echo(" target=_blank"); ?>><img src="<?php echo $templateroot;?>/img/eaea/list_ioc05.gif" align="absmiddle" alt="点击购买此商品" /></a></div>
                        <div class="goods_list_button"><a href="javascript:;" onclick="javascript:addfavor('<?php echo $urlview?>','<?php echo Newiconv("UTF-8","GBK",$taobaokeItem[$i]["title"]).'-'.$sitetitle ?>');"><img src="<?php echo $templateroot;?>/img/eaea/list_ioc07.gif" align="absmiddle" alt="收藏商品到收藏夹" /></a>
                        </div>
                    </div>
                </div>
                 
            </div>
<?php
}?>
    </div>

    
    
</div>

</div>

<!-- 加载底部模板 -->
<!--{template footer}--></body>
</html>