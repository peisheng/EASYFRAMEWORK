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
<style type="text/css">
#listpro .list_right .list_goodslist table tr td .ny1 {
	font-size: 16px;
	color: #00C;
}
#listpro .list_right .list_goodslist table tr td .ny5 {
	font-size: 14px;
}
</style>
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
        
          $article[cate][name]
        
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
                </div>
            </div>

            <!--{/loop}-->

    
    <!-- ��Ʒ�б� -->
    
	<div class="list_goodslist">
    
    <table width="95%" border="0" align="center" cellpadding="5" cellspacing="5">
                  <tr>
                    <td align="center"><span class="ny1">$article[title] </span></td>
            </tr>
                  <tr>
                    <td align="right"><span class="ny3">���ߣ�$article[orig]    ����ʱ�䣺$article[add_time] </span></td>
            </tr>
                  <tr>
                    <td><span class="ny5">$article[info]</span></td>
            </tr>
                  <tr>
                    <td>&nbsp;</td>
            </tr>
                  <tr>
                    <td>��һƪ��<a href="$article[prev_one][0][url]">$article[prev_one][0][title]</a><br />
                        ��һƪ��<a href="$article[next_one][0][url]">$article[next_one][0][title]</a>
    &nbsp;</td>
            </tr>
          </table>
		
		       <center>
       
       <a data-type="2" data-keyword="($article[keyword]==""?$CustomSetFieldValue[ProArticleproKeyword]:$article[keyword])" data-tmpl="628x270" data-tmplid="14" data-rd="1" data-style="2" href="#"></a>
       <br /><br /><br /><br />
       </center>

	</div>

	  
</div>
</div>
 <script language="javascript">seturl_LazyLoad('listpro');</script>
<!-- ���صײ�ģ�� -->
<!--{template footer}--></body>
</html>