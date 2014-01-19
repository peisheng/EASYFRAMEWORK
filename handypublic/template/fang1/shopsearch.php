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
    

    <!-- 高级选项 -->
        
    <!-- 商品列表 -->
    <div class="list_goodslist">
    
    
<?php for($i = 0; $i < count($taobaokeItem); $i++) {

$taousernick = Newiconv("utf-8","gbk",$taobaokeItem[$i]["nick"]);


		$urlview = " onclick=\"clickurl('".base64_encode($taobaokeItem[$i]["click_url"])."','".$rootroad."'); return false;\"";
	
 ?>


		    <li style=" line-height:30px; height:30px; padding-left:20px;">
			 - <a href="javascript:;" <?php echo $urlview?> target="_blank"><?php echo Newiconv("UTF-8","GBK",$taobaokeItem[$i]["shop_title"]) ?></a> <span><img src="<?php echo $rootroad?>/template/<?php echo $templatefolder?>/img/eaea/level_<?php echo $taobaokeItem[$i]["seller_credit"] ?>.gif"></span>
			</li>


<?php 
}?>

    </div>

    
    <!-- 列表分页 -->
    <div id="pages">
 <?php 
  $page_size=$pagenumKeys;
  $nums=$totalResults;
  $sub_pages=10;
  $pageCurrent=$page;
  
  $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,getsearchshopurl($q,$catid,false).($weijingtai?"-":"&page="),2,$weijingtai);
  
?>       
    </div>
</div>

</div>

<!-- 加载底部模板 -->
<!--{template footer}--></body>
</html>