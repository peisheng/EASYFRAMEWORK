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
<link rel="Shortcut Icon" href="<?php echo $sitetitleurl;?>/favicon.ico">
<link rel="Bookmark" href="<?php echo $sitetitleurl;?>/favicon.ico">
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
    
    
    <!--{if $cate_list}--> 
    <div class="list_class">
    	<div class="list_class_catalogs">
        <div class="clear"></div>
        <ul>
          <!--{loop $cate_list $k $v}-->
     		<li><a href="$v[url]">$v[name]</a></li>
          <!--{/loop}-->
        </ul>
        <div class="clear"></div>
        </div>
    </div>

     <!--{/if}-->
     
    
        <div class="list_choose">
        <ul>
         <!--{eval if($param["sort"]=="likes"){
            $likescss = "this_choose";
         }else{
            $urllikes = "this_choose";
         }
         }-->

<li id="$urllikes"><a href="$url_new" >���±���</a></li>
<li id="$likescss"><a href="$url_likes" >���ȱ���</a></li>
       
        </ul>
        </div>
    
    
    <!-- ��Ʒ�б� -->
    
<div class="list_goodslist">
    
      <div style="height:10px;"></div>
  
    
            <!--{loop $share_list $k $v}-->

                   <div style=" width:234px; height:322px; margin-left:10px; float:left;">
                    <a target="_blank" data-itemid="$v[tao_iid]" data-tmpl="230x312" data-style="2" data-rd="1" data-type="0">
                    	$v[title] <br />  �� $v[price]
                    </a>
                   </div>

        	
          <!--{/loop}-->
    <div style=" clear:both;"></div>
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