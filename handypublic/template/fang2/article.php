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
<link rel="Bookmark" href="$sitetitleurl/favicon.ico">
<link href="css/taodi_bhtbwcom.css" rel="stylesheet" type="text/css" />

<script src="js/base64.js"></script>

<script src="js/function.js"></script>

<script type="text/javascript" src="js/common.js"></script>

<script type="text/javascript" src="js/swfobject_source.js"></script>
</head>
<body>
<div class="all" id="listpro">

<!--{template header}-->


<!--搜索与小分类结束-->                                                                        <div class="main">
<!--列表左边开始-->
<div class="list_left">
<div class="list_dh">
<div class="titt">总共搜索到<font color="#FF0000"><!--{if $param[keyword]!="" }-->$param[keyword]<!--{/if}--><!--{if $catename!="" }-->$catename<!--{/if}--></font>相关商铺<b><?php echo $totalResults ?></b>个</div>


            <!--{loop $article_cate_list['parent'] $k $v}-->

            <ul class="alls">
                    <li><a href="$v[url]"><strong>$v[name]</strong></a></li>
            	<!--{loop $article_cate_list['sub'][$k] $k2 $v2}-->
		    		<li><a href="$v2[url]">$v2[name]</a></li>
                <!--{/loop}-->

            </ul>

            <!--{/loop}-->




<div style="clear:both;"></div>
</div>



      <!--{if $CustomSetFieldValue[ProListSmallSortKG] != close}--> 
     <!--{if $arr_sort}--> 
<div class="tbot"></div>
<ul class="cmenu">
          <!--{loop $arr_sort $k $v}-->
          <!--{eval if($v["class"]=="on"){$css = ' class="this"';}else{$css = "";} }-->
         <li $css><a href="$v[url]">$v[title]</a></li>
          <!--{/loop}-->
       
</ul>
     <!--{/if}-->
     <!--{/if}-->

<div class="tbot"></div>



<table width="95%" border="0" align="center" cellpadding="5" cellspacing="5">
                  <tr>
                    <td align="center"><span class="ny1">$article[title] </span></td>
            </tr>
                  <tr>
                    <td align="right"><span class="ny3">作者：$article[orig]    发布时间：$article[add_time] </span></td>
            </tr>
                  <tr>
                    <td><span class="ny5">$article[info]</span></td>
            </tr>
                  <tr>
                    <td>&nbsp;</td>
            </tr>
                  <tr>
                    <td>上一篇：<a href="$article[prev_one][0][url]">$article[prev_one][0][title]</a><br />
                        下一篇：<a href="$article[next_one][0][url]">$article[next_one][0][title]</a>
    &nbsp;</td>
            </tr>
          </table>

		       <center>
       
       <a data-type="2" data-keyword="($article[keyword]==""?$CustomSetFieldValue[ProArticleproKeyword]:$article[keyword])" data-tmpl="628x270" data-tmplid="14" data-rd="1" data-style="2" href="#"></a>
       <br /><br /><br /><br />
       </center>


</div>
<!--列表左边结束-->

<!--列表右边开始-->
<div class="list_right">
<div class="rt"><strong>热卖商品</strong></div>
<div class="rc">

<?php
$taobaokeItem_type = GetArrByValue(array("typeid"=>"15","keyword"=>$CustomSetFieldValue[ProListKeyword],"page_size"=>$CustomSetFieldValue[ProListKeywordNum],"sort"=>$sort));;

?>
              <!--{loop $taobaokeItem_type $k $v}-->

                <div class="cbb"><div class="img"><div class="titl"><a href="$v[url]" $v[rel] target="$v[target]">$v[title]</a></div>
                
                <a href="$v[url]" $v[rel] target="$v[target]">
                <?php setPic($v["pic_url"],160,160,strip_tags($v["title"]))?></a></div><p>淘宝价：<b><?php echo $v["price"] ?>元</b></p><p>本月热销：<em><?php echo $v["volume"] ?></em> 件</div>
                
                
           <!--{/loop}-->
               
                
 <script language="javascript">seturl_LazyLoad('listpro');</script>
 
                </div>

</div>
<!--列表右边结束-->

<!--{template teyue}-->


<div class="bot"></div>
</div>

<!--{template footer}-->

</div>                                                                                                                                                            </body>
</html>