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
<div class="titt">�ܹ�������<font color="#FF0000"><!--{if $param[keyword]!="" }-->$param[keyword]<!--{/if}--><!--{if $catename!="" }-->$catename<!--{/if}--></font>�����Ʒ<b><?php echo $totalResults ?></b>��      
	</div>


<div style="clear:both;"></div>
</div>



         <!--{eval if($param["sort"]=="likes"){
            $likescss = "this";
         }else{
            $urllikes = "this";
         }
         }-->
<div class="tbot"></div>
<ul class="cmenu">

<li class="$urllikes"><a href="$url_new" >���±���</a></li>
<li class="$likescss"><a href="$url_likes" >���ȱ���</a></li>
</ul>



<ul class="list">

            <!--{loop $taobaokeItem $k $v}-->

<li><div style=" width:234px; height:322px; float:left;">
                    <a target="_blank" data-itemid="$v[tao_iid]" data-tmpl="230x312" data-style="2" data-rd="1" data-type="0">
                    	$v[title] <br />  �� $v[price]
                    </a>
                   </div></li>

          <!--{/loop}-->




</ul>


<div class="page">

<table align="center" style=" margin:0 auto"><tr><td>$pagestr  </td></tr></table>

</div>



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