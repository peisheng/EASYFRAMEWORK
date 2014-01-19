<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>$page_title</title>
<meta name="keywords" content="$page_keyword" />
<meta name="description" content="$page_discription" />
<link rel="Shortcut Icon" href="$sitetitleurl/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link rel="stylesheet" type="text/css" href="css/css.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!--{template headerjs}-->


</head>
<body onload="check_a_taobao()">
<center>
<!--{template header}-->


<div class="share_list" id="list">                                                                       
<div class="share01"><ul>

<!--{loop $cate_list $k $v}-->
<li><a href="$v[url]">$v[name]</a></li>
<!--{/loop}-->

</ul></div>

<div class="share02"><dl><dt><img src="images/share_ico02.jpg"/></dt>
<dd class="dd01"><ul><li class="li01">分享您喜欢的
晒出您购买的宝贝</li>
<li class="li02">看大家买了什么
发现喜欢的宝贝</li>
</ul></dd>
<dd class="dd02"><ul><li class="li01">看看别人都喜欢什么
交流购物心得</li>
<li class="li02">本站让您更省钱
去淘宝等各大商城购物可返现金</li>
</ul></dd>
<dd class="dd03">
<a href="#" onClick="art.dialog.open('{$TaoConfig[rootroad]}/usercenter.php?ac=shareframe', {title: '分享',id:'add'});"><img src="images/share_ico05.jpg"/></a><br />告诉大家你喜欢的宝贝！</dd>
</dl>
<div class="clear"></div>
</div>

<div class="clear"></div>
 <div class="share_tab">
 <ul class="ul01">
 <!--{eval if($param["sort"]=="likes"){
 	$likescss = "tabactive";
 }else{
 	$newcss = "tabactive";
 }
 }-->
<li><a href="$url_new"  class="$newcss">最新宝贝</a></li>
<li><a href="$url_likes"  class="$likescss">最热宝贝</a></li>

</ul>
<div class="clear"></div>
</div>
<DIV id=grid-wrapper>

<!--{loop $share_list $k $v}-->

    <DIV class="grid-item x1">
    
    <!--{if $v[tao_iid]!=""}--> 
    	<div style=" width:234px; height:322px; float:left; overflow:hidden">      
            <a target="_blank" data-itemid="$v[tao_iid]" data-tmpl="230x312" data-style="2" data-rd="1" data-type="0">
            
                    <div class="pic01"></div>
                    <div class="pic02">
                    <DIV class="grid-image" style="height:210px;">
                          <!--{eval setPic($v["img"],200,200,strip_tags($v["title"])) }-->
                          </DIV>
                    <div>$v["title"]</div>
                    <div class="pic04"><ul><li class="li01">￥$v["price"]<span></span></li></ul></div>
                    <div class="clear"></div>
                    </div>

            </a>
        </div>
    <!--{else}-->
       <div style=" width:234px; height:322px; float:left; overflow:hidden">      
        <div class="pic01"></div>
        <div class="pic02">
        <DIV class="grid-image" style="height:200px;"><a href="$v[pai_url]" data-rd="1" data-itemid="$v[tao_iid]" $v[rel] target="$v[target]">
              <!--{eval setPic($v["img"],200,200,strip_tags($v["title"])) }-->
              </a></DIV>
        <div><a href="$v[pai_url]" data-itemid="$v[tao_iid]" $v[rel] data-rd="1" target="$v[target]">$v["title"]</a></div>
        <div class="pic04"><ul><li class="li01">喜欢<span>$v["likes"]</span></li></ul></div>
        <div class="clear"></div>
        </div>
      </div>
    
    <!--{/if}--> 
    
     
    </DIV>
<!--{/loop}-->
    
</DIV>
<div class="clear"></div>

       <div class="page">
       
       		<ul class="page3">
              $pagestr   
			</ul>
	   
       </div>

</DIV>



</div>
 

 <script language="javascript">seturl_LazyLoad('list');</script>
 <script language="javascript">
 	setInterval("check_a_taobao()",100);
 </script>

 <script language="javascript">
 
 var delnum = 0;
 
 function check_a_taobao() {
	
    var c = document.getElementsByTagName('a');
	var s = "";
	
	
    for (var d = 0, j = c.length; d < j; d++) {
        var t_a = c[d];
		if(t_a.attributes.getNamedItem("_tk_rb_index")!=null){
			if(t_a.attributes.getNamedItem("_tk_rb_index").nodeValue=='0'){
				
				//t_a.parentNode.parentNode.remove();
				delnum ++;
			}
		}
    }
	
	//$("#grid-wrapper").css("paddingTop", "0px");
};



 </script>

  <!--{template footer}-->
</center>
</body>
</html>