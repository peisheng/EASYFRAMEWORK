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


<!--������С�������-->                                                                        <div class="main">
<!--�б���߿�ʼ-->
<div class="list_left">
<div class="list_dh">
<div class="titt">�ܹ�������<font color="#FF0000"><!--{if $param[keyword]!="" }-->$param[keyword]<!--{/if}--><!--{if $catename!="" }-->$catename<!--{/if}--></font>�������<b><?php echo $totalResults ?></b>��</div>


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



<ul>

      <!--{loop $article_list $k $v}-->

		    <li style="line-height:30px; height:30px; padding-left:20px; color: #999; font-size: 14px;">
			 <img src="images/ioc_03.gif" alt="HOT" vspace="10"/> <a href="$v[url]" target="_blank">{$v[title]}</a> <span><!--{if ($v[is_hot]|| $v[is_best]) }-->
           <img src="images/ico3.png" alt="HOT"  width="25" height="9"/>
           <!--{/if}-->
           
           [<!--{eval echo date('Y-m-d',strtotime($v['add_time']))}-->]</span>
           </span>
			</li>

      <!--{/loop}-->



</ul>

<div class="page">

<table align="center" style=" margin:0 auto"><tr><td>$pagestr  </td></tr></table>
</div>
    <div style="clear:both"></div>
       <center>
       
       <a data-type="2" data-keyword="<!--{eval echo ($cates_now[keyword]==""?$CustomSetFieldValue[ProListproKeyword]:$cates_now[keyword])}-->" data-tmpl="628x270" data-tmplid="14" data-rd="1" data-style="2" href="#"></a>
       <br /><br /><br /><br />
       </center>



</div>
<!--�б���߽���-->

<!--�б��ұ߿�ʼ-->
<div class="list_right">
<div class="rt"><strong>������Ʒ</strong></div>
<div class="rc">

<?php
$taobaokeItem_type = GetArrByValue(array("typeid"=>"15","keyword"=>$CustomSetFieldValue[ProListKeyword],"page_size"=>$CustomSetFieldValue[ProListKeywordNum],"sort"=>$sort));;

?>
              <!--{loop $taobaokeItem_type $k $v}-->

                <div class="cbb"><div class="img"><div class="titl"><a href="$v[url]" $v[rel] target="$v[target]">$v[title]</a></div>
                
                <a href="$v[url]" $v[rel] target="$v[target]">
                <?php setPic($v["pic_url"],160,160,strip_tags($v["title"]))?></a></div><p>�Ա��ۣ�<b><?php echo $v["price"] ?>Ԫ</b></p><p>����������<em><?php echo $v["volume"] ?></em> ��</div>
                
                
           <!--{/loop}-->
               
                
 <script language="javascript">seturl_LazyLoad('listpro');</script>
 
                </div>

</div>
<!--�б��ұ߽���-->

<!--{template teyue}-->


<div class="bot"></div>
</div>

<!--{template footer}-->

</div>                                                                                                                                                            </body>
</html>