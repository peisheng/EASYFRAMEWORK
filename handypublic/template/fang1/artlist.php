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
    	<div class="list_place_nav">����λ��:<a href="<?php echo $rootroad;?>/">��ҳ</a> >> 
        
           $cates_now[name]
        
        </div>
    </div>
    
            <!--{loop $article_cate_list['parent'] $k $v}-->

            <div class="list_class">
                <div class="list_class_catalogs">
                <div class="clear"></div>
                <ul>
               		<li><a href="$v[url]"><strong>$v[name]</strong></a></li>
            	<!--{loop $article_cate_list['sub'][$k] $k2 $v2}-->
		    		<li><a href="$v2[url]">$v2[name]</a></li>
                <!--{/loop}-->
                </ul>
                <div class="clear"></div>
                </div>
            </div>

            <!--{/loop}-->


    
    <!-- ��Ʒ�б� -->
    
<div class="list_goodslist">
    
      <!--{loop $article_list $k $v}-->
    		    <li style=" line-height:30px; height:30px; padding-left:20px;">
			<img src="img/eaea/ioc_01.gif" alt="HOT"/> <a href="$v[url]" target="_blank">&middot;{$v[title]}</a>
           <!--{if ($v[is_hot]|| $v[is_best]) }-->
           <img src="img/ico3.png" alt="HOT"  width="25" height="9"/>
           <!--{/if}--> <span>[<!--{eval echo date('Y-m-d',strtotime($v['add_time']))}-->]</span>
			</li>

      <!--{/loop}-->
    
    </div>

    
<div style="clear:both"></div>
    <!-- �б��ҳ -->
    <div id="pages">
         $pagestr   
    </div>
    <div style="clear:both"></div>
       <center>
       
       <a data-type="2" data-keyword="<!--{eval echo ($cates_now[keyword]==""?$CustomSetFieldValue[ProListproKeyword]:$cates_now[keyword])}-->" data-tmpl="628x270" data-tmplid="14" data-rd="1" data-style="2" href="#"></a>
       <br /><br /><br /><br />
       </center>

</div>

</div>
 <script language="javascript">seturl_LazyLoad('listpro');</script>

<!-- ���صײ�ģ�� -->
<!--{template footer}--></body>
</html>