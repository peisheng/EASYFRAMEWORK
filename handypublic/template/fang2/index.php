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

<title><?php echo $indextitle ?></title><meta name="keywords" content="<?php echo $sitekey ?>" />
<meta name="description" content="<?php echo $sitedesc ?>" />

<link href="css/taodi_bhtbwcom.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="js/common.js"></script>

<script type="text/javascript" src="js/swfobject_source.js"></script>

<link href="css/css.css" rel="stylesheet" type="text/css" />
<script src="js/yu.js" type="text/javascript"></script>
<script src="js/tb.js" type="text/javascript"></script>

<link rel="Shortcut Icon" href="<?php echo $sitetitleurl;?>/favicon.ico">
<link rel="Bookmark" href="<?php echo $sitetitleurl;?>/favicon.ico">


</head>
<body>

<div class="all" id="list">
<!--{template header}-->
<!--搜索与小分类结束-->                                                                        <div class="main">
  <!--输出首页所有栏目--> 
  <!--{loop $indexs $indexkey $indexvalue}--> 
       <!--{if $indexvalue[typeid]==11}-->
        <div class="flash" id="dplayer2">
        
        
        
        <div id="MainPromotionBanner">
        
                <div id="SlidePlayer">
        
                    <ul class="Slides"><!-- 这里图片高度582px 宽度280px -->
        
        
                        
        <!--{eval $PicArr = GetArrByValue($indexvalue);}--> 
                                    <!--{loop $PicArr $k $v}-->
                                    <li><a href="$v[url]" target="$v[target]" title="$v[typename]"><img src="$v[picurl]" alt="$v[typename]" /></a></li>
                                    <!--{/loop}-->
                        
        
                        
        
                        
        
                  </ul>
        
                </div>
        
              <script type="text/javascript">
        
                      TB.widget.SimpleSlide.decoration('SlidePlayer', {eventType:'mouse', effect:'scroll'});
        
          </script>
        
            </div>
        
        
        
        </div>
        <div class="today" id="tab1">
        
        <dl>
        <!--{eval $tuijianleibie = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey."_tuijian");}--> 
        
        
        
        <dd onclick="setTab(1,0)" class="now0"><?php echo $tuijianleibie[0]["typename"]?></dd>
        
        <dd onclick="setTab(1,1)"><?php echo $tuijianleibie[1]["typename"]?></dd>
        
        <dd onclick="setTab(1,2)"><?php echo $tuijianleibie[2]["typename"]?></dd>
        
        </dl><div id="tablist1">
        
        <div class="tablist block"><ul>
        
                        <!--{if $tuijianleibie[0][typename] }-->
                        <!--{eval $dazhelists = GetArrByValue($tuijianleibie[0],array("page_size"=>"8"));
                        }--> 
                        <!--{loop $dazhelists $k $v}-->
                    <li><span>特价:{$v["price"]}元</span><a href="$v[url]" class="bt">[包邮]</a> <a href="$v[url]"  $v[rel] target="$v[target]"> {$v[title]}</a></li>
                        <!--{/loop}-->
                        <!--{/if}-->
        
        </ul></div>
        
        <div class="tablist"><ul>
        
                        <!--{if $tuijianleibie[1][typename] }-->
                        <!--{eval $dazhelists = GetArrByValue($tuijianleibie[1],array("page_size"=>"8"));
                        }--> 
                        <!--{loop $dazhelists $k $v}-->
                    <li><span>特价:{$v["price"]}元</span><a href="$v[url]" class="bt">[包邮]</a> <a href="$v[url]"  $v[rel] target="$v[target]"> {$v[title]}</a></li>
                        <!--{/loop}-->
                        <!--{/if}-->
        
        </ul></div>
        
        <div class="tablist"><ul>
        
        
                        <!--{if $tuijianleibie[2][typename] }-->
                        <!--{eval $dazhelists = GetArrByValue($tuijianleibie[2],array("page_size"=>"8"));
                        }--> 
                        <!--{loop $dazhelists $k $v}-->
                    <li><span>特价:{$v["price"]}元</span><a href="$v[url]" class="bt">[包邮]</a> <a href="$v[url]"  $v[rel] target="$v[target]"> {$v[title]}</a></li>
                        <!--{/loop}-->
                        <!--{/if}-->
        
        </ul></div>
        
        </div>
        
        </div>
      <!--{/if}-->
      
  <!--{if $indexvalue[typeid]==21}-->
  <!-- 整合频道 --> 
   <!--{if !$indexvalue[height]}--><!--{eval $indexvalue[height]=2000;}--><!--{/if}--> 
   <!--{eval $indexvalue[urltxt]=UpdateSystemVerible($indexvalue[urltxt]);}-->
  	<center><div style="width:100%; text-align:center; overflow:hidden; clear:both; margin-top:0px; margin-bottom:0px;"><div style="height:<!--{eval echo($indexvalue[height]+$indexvalue[hidentop]) }-->px; margin-top:-{$indexvalue[hidentop]}px;"><iframe frameborder="0" marginheight="0" marginwidth="0" border="0" id="alimamaifrm" name="alimamaifrm" scrolling="no" height="<!--{eval echo($indexvalue[height]+$indexvalue[hidentop]) }-->px" width="100%" src="$indexvalue[urltxt]" ></iframe></div></div></center>
  <div class="clear"></div>
  <!--{/if}--> 

  <!--{if $indexvalue[typeid]==13}-->
  <!-- 自定义html --> 
  <div class="a_b" id="taozhekou-{$indexkey}" style="text-align:{$indexvalue[sort]};">
  <!--{eval echo strtr(stripslashes(html_entity_decode($indexvalue[contentHtml],ENT_QUOTES)),$TaoConfig["ad_verible"]);}-->
  </div>
  <div class="clear"></div>
  <!--{/if}--> 

  <!--{eval if ($indexvalue[typeid]==5 || $indexvalue[typeid]==10 || $indexvalue[typeid]==15) { }-->
  <!-- 商品栏目 --> 

<div class="channel">

<div class="title"><strong>$indexvalue[typename]</strong>
<!--{eval $tuijianleibie = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey);}--> 
                            <!--{loop $tuijianleibie $k $v}--> 
                            <a href="$v[url]" target="$v[target]" style="color:$v[color]">$v[typename]</a> 　<span class=line>|</span> 
                            <!--{/loop}--> 
                            <a class=more href="$indexvalue[url]" target="$indexvalue[target]">更多>></a>            
</div>
<div class="goods">
<ul id="nav">
          <!--{eval $taogoulists = GetArrByValue($indexvalue,array("page_size"=>"8"));}--> 
          <!--{loop $taogoulists $k $v}-->
<li><div class="gtit"><a href="$v[url]"  $v[rel] target="$v[target]">$v[title]</a></div><a href="$v[url]" $v[rel] target="$v[target]">
              <!--{eval setPic($v["pic_url"]."_220x220.jpg",220,220,strip_tags($v["title"])) }-->
              </a><p>市场价：<span><?php echo ($v["price"]*$CustomSetFieldValue[ProShiChang]);?></span> 元</p><p>淘宝价：<b><?php echo $v["price"] ?></b> 元</p></li>
          <!--{/loop}--> 
</ul>
</div>

</div>


<div style="height:2px; clear:both;"></div>
<!--{eval } }--> 

  <!--{eval if ($indexvalue[typeid]==2 || $indexvalue[typeid]==3 || $indexvalue[typeid]==4 || $indexvalue[typeid]==7) { }-->
    <div class="channel">
    
    <div class="title"><strong>$indexvalue[typename]</strong>
    <!--{eval $tuijianleibie = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey);}--> 
                                <!--{loop $tuijianleibie $k $v}--> 
                                <a href="$v[url]" target="$v[target]" style="color:$v[color]">$v[typename]</a> 　<span class=line>|</span> 
                                <!--{/loop}--> 
                                <a class=more href="$indexvalue[url]" target="$indexvalue[target]">更多>></a>            
    </div>
    <div class="goods">
    <ul id="nav">
              <!--{eval $taogoulists = GetArrByValue($indexvalue,array("page_size"=>"8"));}--> 
              <!--{loop $taogoulists $k $v}-->
                   <div style=" width:234px; height:322px; float:left;">
                    <a target="_blank" data-itemid="$v[tao_iid]" data-tmpl="230x312" data-style="2" data-rd="1" data-type="0">
                    	$v[title] <br />  ￥ $v[price]
                    </a>
                   </div>
                <!--{/loop}--> 
    </ul>
    </div>
    
    </div>
  <!--{eval } }--> 
  
  <!--{if $indexvalue[typeid]==6}--> 
  <!-- 文章栏目 --> 
    <!--{if $TaoConfig[DB_OPEN] }-->
      <!--{eval $NewsTypeList = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey);}-->
        <div style="padding-left:8px; width:940px; margin-left:auto; margin-right:auto">
      <!--{loop $NewsTypeList $k $v}--> 
            <div class="news">              
            <div class="news-title"><span>$v[typename]</span><span class="more"><a href="$v[url]" target="$v[target]">更多&raquo;</a></span></div>
            <ul>
                  <!--{eval $NewsArr = GetArrArticle($v[vcate_id],$indexvalue[pronum],1,0,0,"add_time");}--> 
                  <!--{loop $NewsArr $knew $vnew}-->
            <li><a href="$vnew[url]" target="$v[target]">{$vnew[title]}</a><span><!--{eval echo date('m-d',strtotime($vnew['add_time']))}--></span></li>
                  <!--{/loop}--> 
            </ul>
            </div>      
                  <!--{/loop}--> 
        </div>
        <div style="clear:both"></div>
      <!--{/if}--> 
<!--{/if}--> 
  
  
  <!--{/loop}-->

      <script language="javascript">seturl_LazyLoad('list');</script>
<div style="padding-left:8px;">
<!--{template news}-->
</div>


<!-- 循环结束 -->

<!--关于本站开始-->

<div class="info">

<div class="l1"></div>

<div class="l2">$CustomSetFieldValue[GongGao]</div>

<div class="l3"></div>

</div>

<!--关于本站结束-->

<!--购物流程开始-->



<!--购物流程结束-->

<!--友情链接开始-->

<div class="link" id="tab3">

<dl>

<dd onclick="setTab(3,0)" class="now0">合作伙伴</dd>

</dl>

<div class="tablist block">
<?php  

$arrays = application("linkarray",WEBROOT."data/applicationdate.php");

if(!is_array($arrays)){
	$arrays = array();
}
if(isset($arrays) && Count($arrays)>0){
	for($i=0;$i<Count($arrays);$i++){

?>

<li><a href="<?php echo $arrays[$i][0] ?>" target="_blank" title="<?php echo $arrays[$i][1] ?>"><?php echo $arrays[$i][1] ?></a></li>
<?php
}
}
?>

</div>

</div>

<!--友情链接结束-->
<div class="bot"></div>

</div>



<!--{template footer}-->


</div>                                                                                                                                                                                                                                                                                                                        </body>

</html>