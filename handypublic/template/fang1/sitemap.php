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
 网站地图        
        </div>
    </div>


    <!-- 高级选项 -->
        
    <!-- 商品列表 -->
    <div class="list_goodslist">
    
  <?php 
foreach($sitemap_arr as $big){
	$bigname = $big["name"];
	
?>
<table width="100%" cellspacing="1" class="money">
<tr>
<th width="100" rowspan="3" bgcolor="#F0F0F0"><a href="<?php echo $big["url"];?>" target="_blank" class='ts0'><?php echo $bigname ?></a></th>
<td align="left" style="padding:5px; border:#F0F0F0 solid 1px;">
	<?php foreach($big["subcats"] as $small){	?>
    <a href="<?php echo $small["url"];?>" target="_blank"><?php echo $small["name"]; ?></a>　
    <?php }  ?>
</td>
</tr>
</table>

<?php	
}
?>

    </div>

    
</div>

</div>

<!-- 加载底部模板 -->
<!--{template footer}--></body>
</html>