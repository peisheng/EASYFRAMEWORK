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
<link href="css/eaea_all.css" rel="stylesheet" type="text/css" />
<link href="css/eaea_list.css" rel="stylesheet" type="text/css" />
<link rel="Shortcut Icon" href="$sitetitleurl;/favicon.ico">
<link rel="Bookmark" href="$sitetitleurl;/favicon.ico">
<!-- ��������������ղؼнű� -->
<script language="javascript">
function addfavor(url,title) {
    if(confirm("��վ���ƣ�"+title+"\n��ַ��"+url+"\nȷ������ղ�?")){
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
                    alert("�����ղ�ʧ�ܣ���ʹ��Ctrl+D�������");
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
<!-- �󲿿�ʼ -->
<div class="list_left">
	<!-- ������Ʒ -->
	<div class="list_hot">
    	<div class="hot_head"><span>�����Ƽ�</span></div>
        	
        <!--�б�ģ��-->
        <!--{template left}-->
      
      <!--�󲿹��-->
      <div class="leftad">
        	<ul>
            	        <!--{ad/paileft}-->

            </ul>       
      </div>  
      
    </div>
    
</div>

<!-- �Ҳ���ʼ -->
<div class="list_right">
	<!-- ��ǰλ�� -->
	<div class="list_place">
    	<div class="list_place_ioc"><img src="<?php echo $templateroot;?>/img/eaea/ioc_02.gif" align="absmiddle"/></div>
    	<div class="list_place_nav">����λ��:<a href="<?php echo $rootroad;?>/">��ҳ</a> 
        
           <!--{if $param[keyword]!="" }--> > $param[keyword] <!--{/if}-->
           <!--{if $catename!="" }-->  > $catename<!--{/if}-->
        
        </div>
    </div>
    
    
     <!--{if $CustomSetFieldValue[ProListSmalltypeKG] == 'open_c'}--> 
     <!--{if $TaoapiSubCats}--> 
    <div class="list_class">
    	<div class="list_class_catalogs">
        <div class="clear"></div>
        <ul>
          <!--{loop $TaoapiSubCats $k $v}-->
     		<li><a href="$v[url]">$v[name]</a></li>
          <!--{/loop}-->
        </ul>
        <div class="clear"></div>
        </div>
    </div>

     <!--{/if}-->
     
     <!--{if $arr_price}--> 
    <div class="list_class">
    	<div class="list_class_catalogs">
        <div class="clear"></div>
        <ul>
          <!--{loop $arr_price $k $v}-->
     		<li><a href="$v[url]" <!--{if $v[class]}-->class="ac" <!--{/if}-->>$v[title]</a></li>
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
          <!--{eval if($v["class"]=="on"){$css = 'id="this_choose"';}else{$css = "";} }-->
         <li $css><a href="$v[url]">$v[title]</a></li>
          <!--{/loop}-->
       
        </ul>
        </div>
     <!--{/if}-->
     <!--{/if}-->
    

    
    <!-- ��Ʒ�б� -->
    
<div class="list_goodslist">
    
    
    
            <!--{loop $taobaokeItem $k $v}-->


        	<div class="goods_list">
            
            	<div class="goods_list_img" onMouseOver="this.className='goods_list_img_hover'" onMouseOut="this.className='goods_list_img'">
                <a href="$v[url]"  $v[rel] target="$v[target]">
          <!--{eval setPic($v["pic_url"],220,220,strip_tags($v["title"])) }-->
          </a>
                </div>
                <div class="goods_list_title">
                <a href="$v[url]" $v[rel] target="$v[target]"><?php echo $v["title"] ?></a>
                </div>
                
                <div class="goods_list_price">
                
                	<div class="goods_list_pricel">
                    	<div class="goods_list_scprice"><img src="<?php echo $templateroot;?>/img/eaea/list_ioc01.gif" />�г���:��<span><?php echo ($v["price"]*$CustomSetFieldValue[ProShiChang]); //�����г��۸�?></span> Ԫ</div>
                    	<div class="goods_list_tbprice"><img src="<?php echo $templateroot;?>/img/eaea/list_ioc02.gif" />�̳Ǽ�:��<span>$v[price]</span> Ԫ</div>
                    	<div class="goods_list_num">���������̳ǣ�<a  href="$v[shop_click_url_base64]" rel='nofollow' target="_blank"><?php echo $v["nick"] ?></a></div>
                    </div>
                    
                    <div class="goods_list_pricer">
                    	<div class="goods_list_button"><a href="$v[url]" $v[rel] target="$v[target]"><img src="<?php echo $templateroot;?>/img/eaea/list_ioc05.gif" align="absmiddle" alt="����������Ʒ" /></a></div>
                        
                        <div class="goods_list_button"><a href="$v[shop_click_url_base64]" rel='nofollow' target="_blank"><img src="<?php echo $templateroot;?>/img/eaea/list_ioc06.gif" align="absmiddle" alt="����������ҵ���" /></a></div>
                        
                        <div class="goods_list_button">
                        </div>
                    </div>
                </div>
                 
            </div>
          <!--{/loop}-->
    </div>

    
<div style="clear:both"></div>
    <!-- �б��ҳ -->
    <div id="pages">
         $pagestr   
    </div>
</div>

</div>
 <script language="javascript">seturl_LazyLoad('listpro');</script>

<!-- ���صײ�ģ�� -->
<!--{template footer}--></body>
</html>