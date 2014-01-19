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
<title>$page_title</title>
<meta name="keywords" content="$page_keyword" />
<meta name="description" content="$page_discription" />
<link rel="Shortcut Icon" href="$sitetitleurl/favicon.ico">
<link href="css/eaea_all.css" rel="stylesheet" type="text/css" />
<link href="css/eaea_list.css" rel="stylesheet" type="text/css" />
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
<div class="list" id="listpro">
<!-- 左部开始 -->
<div class="list_left">
	<!-- 热销商品 -->
	<div class="list_hot">
    	<div class="hot_head"><span>热销推荐</span></div>
        	
        <!--列表模块-->
<!--{template b2cleft}-->
      
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
    	<div class="list_place_nav">您的位置:<a href="<?php echo $rootroad;?>/">首页</a>  
        
           <!--{if $param[keyword]!="" }--> > $param[keyword] <!--{/if}-->
           <!--{if $TaoapiCat[name]!="" }-->  > $TaoapiCat[name]<!--{/if}-->
           
           
           搜索到相关商品<span class="goods_list_num">$totalResults</span>件
        
        </div>
    </div>
    
    <!-- 下级分类 -->
     <!--{if $CustomSetFieldValue[ProListSmalltypeKG] != close}--> 
     <!--{if $category}--> 
    <div class="list_class">
    	<div class="list_class_catalogs">
        <div class="clear"></div>
        <ul>
          <!--{loop $category $k $v}-->
        <li><img src="img/eaea/ioc_03.gif"/><a href="$v[url]" >$v[category_name]</a></li>
          <!--{/loop}-->
        </ul>
        <div class="clear"></div>
        </div>
    </div>
     <!--{/if}-->
    
     <!--{if $seller}--> 
     
    <div class="list_class">
    	<div class="list_class_catalogs">
        <div class="clear"></div>
        <ul>
         <!--{loop $seller $k $v}-->
        <li><img src="img/eaea/ioc_03.gif"/><a href="$v[url]">$v[seller_name]</a></li>
          <!--{/loop}-->
        </ul>
        <div class="clear"></div>
        </div>
    </div>
     		
     <!--{/if}-->
     <!--{/if}-->

    
      <!--{if $CustomSetFieldValue[ProListSmallSortKG] != close}--> 
     <!--{if $arr_sort}--> 
       <div class="list_choose">
        <ul>
          <!--{loop $arr_sort $k $v}-->
          <!--{eval if($v["class"]=="on"){$css = ' id="this_choose"';}else{$css = "";} }-->
              <li  $css ><a href="$v[url]" >$v[title]</a></li>
          <!--{/loop}-->
    
        </ul>
       
       </div>   
     <!--{/if}-->
     <!--{/if}-->

    
    <!-- 商品列表 -->
    <div class="list_goodslist">
    
    
    
            <!--{loop $taobaokeB2c $k $v}-->


        	<div class="goods_list">
            
            	<div class="goods_list_img" onMouseOver="this.className='goods_list_img_hover'" onMouseOut="this.className='goods_list_img'">
                <a href="$v[url]"  $v[rel] target="$v[target]">
          <!--{eval setPic($v["pic_url"],220,220,strip_tags($v["title"])) }-->
          </a>
                </div>
                <div class="goods_list_title">
                <a href="<?php echo $urlview?>" <?php if($win_pro=="1") echo(" target=_blank"); ?> title=""><?php echo $v["title"] ?></a>
                </div>
                
                <div class="goods_list_price">
                
                	<div class="goods_list_pricel">
                    	<div class="goods_list_scprice"><img src="<?php echo $templateroot;?>/img/eaea/list_ioc01.gif" />市场价:￥<span><?php echo ($v["price"]*$CustomSetFieldValue[ProShiChang]); //调用市场价格?></span> 元</div>
                    	<div class="goods_list_tbprice"><img src="<?php echo $templateroot;?>/img/eaea/list_ioc02.gif" />商城价:￥<span>$v[price]</span> 元</div>
                    	<div class="goods_list_num">　　发布商城：<a  href="$v[shop_click_url_base64]" rel='nofollow' target="_blank"><?php echo $v["seller_name"] ?></a></div>
                    </div>
                    
                    <div class="goods_list_pricer">
                    	<div class="goods_list_button"><a href="$v[url]" $v[rel] target="$v[target]"><img src="<?php echo $templateroot;?>/img/eaea/list_ioc05.gif" align="absmiddle" alt="点击购买此商品" /></a></div>
                        
                        <div class="goods_list_button"><a href="$v[shop_click_url_base64]" rel='nofollow' target="_blank"><img src="<?php echo $templateroot;?>/img/eaea/list_ioc06.gif" align="absmiddle" alt="点击访问卖家店铺" /></a></div>
                        
                        <div class="goods_list_button">
                        </div>
                    </div>
                </div>
                 
            </div>
          <!--{/loop}-->
    </div>

<div style="clear:both"></div>
    
    <!-- 列表分页 -->
    <div id="pages">
 $pagestr   
    </div>
</div>
  <script language="javascript">seturl_LazyLoad('listpro');</script>

<div style="clear:both"></div>

<!-- 加载底部模板 -->
<!--{template footer}--></body>
</html>