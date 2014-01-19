<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--{eval if(!defined('VERSON')) exit('Access Denied'); }-->
<head>
<title>$indextitle</title>
<meta name="keywords" content="$sitekey" />
<meta name="description" content="$sitedesc" />
<link rel="Shortcut Icon" href="$sitetitleurl/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link rel="stylesheet" type="text/css" href="css/css.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!--{template headerjs}-->


</head>
<body id="allitem" onload="seturl_LazyLoad('allitem');">
<center>

<!--{template header}-->

  <!--输出首页所有栏目--> 
  <!--{loop $indexs $indexkey $indexvalue}--> 
  
  <!--{if $indexvalue[typeid]==11}-->
  <!-- 轮播大图和登陆的栏目显示 --> 
  
  <div class="classhd" id="zonghe-{$indexkey}">
    <div class="one">
      <div class="one1"> 
        
        <!--这一行是用来调用大图数据的2-->
        <div id="focus">
          <ul>
          
            <!--{eval $PicArr = GetArrByValue($indexvalue);}--> 
            <!--{loop $PicArr $k $v}-->
            <li><a href="$v[url]" target="_blank"><img src="$v[picurl]" height="348" width="730" alt="$v[typename]" style="position:static; z-index:-1" /></a></li>
            <!--{/loop}-->
          </ul>
        </div>
      </div>
    </div>
    <div class="two">
      <div class="two1">
        <div class="two2">
          <div class="two3">推荐文章</div>
          <div class="two4">>> <a href="<!--{eval echo GetDaohangUrl(array("typeid"=>"6"));}-->">更多</a></div>
        </div>
        <div class="two5"> 
          <!--{eval $NewsArr = GetArrArticle(0,5,1,0,1,"add_time");}--> 
          <!--{loop $NewsArr $k $v}-->
          <div class="two6"><a href="$v[url]" target="_blank"><span style="color:#cc0200;">·[{$v[cate_name]}]</span>{$v[title]}</a></div>
          <!--{/loop}--> 
        </div>
      </div>
      
      <!--{if $CustomSetFieldValue[SetLogin]!=""}-->   
      <div class="two7_2">
      $CustomSetFieldValue[SetLogin]
      </div>
      <!--{else}-->
      <div class="two7">
            <form name="myform" action="usercenter.php" method="post">
        <div class="two2">
          <div class="two3">会员登入</div>
          <!--
          <div id="taobao-login" class="taologin"> 
            <script>
          TOP.ui("login-btn", {
            container: "#taobao-login"
          , type: "3,4"
          , callback:{
              login: function(){}
            , logout: function(){}
            }
          });

        </script> 
          </div>
          -->
        </div>
        <div class="two8">
          <div class="two9">用户:</div>
          <div class="two10">
            <input name="name" type="text" class="two11" value="注册邮箱/会员帐号" onMouseOut="if(this.value=='')this.value='注册邮箱/会员帐号';" onClick="if(this.value=='注册邮箱/会员帐号')this.value=''" />
          </div>
        </div>
        <div class="two8">
          <div class="two9">密码:</div>
          <div class="two10">
            <input name="passwd" type="password" class="two11" />
          </div>
        </div>
        <div class="two8" style="margin-top:5px;">
          <div class="two9"></div>
          <div class="two10">
            <div class="two12">
              <input name="cookie_expire" type="checkbox" value="604800" style="margin:0px; padding:0px;"/>
            </div>
            <div class="two13">自动登陆</div>
          </div>
        </div>
        <div class="two8" style="margin-top:5px;">
          <div class="two9"></div>
          <div class="two10">
                <input type="hidden" name="dosubmit" value="login" />
                <input type="hidden" name="ac" value="login" />
                <input type="image" src="images/ico20.jpg" name="dosubmit" style="margin-right:7px;" alt="登录"/>
                <a href="usercenter.php?ac=register"><img src="images/ico21.jpg" /></a></div>
        </div>
        	</form>
      </div>
   	  <!--{/if}--> 
     
      
    </div>
  </div>
  <div class="clear"></div>
  <script language="javascript">seturl_LazyLoad('zonghe-{$indexkey}');</script>
    
  <!--{/if}-->
  
  <!--{if $indexvalue[typeid]==12}-->
  <!-- 综合类别栏目显示 --> 
  
  <div class="taotj">
  <!--{ad/typestop}-->
  </div>
  
  <div id="rm">

    <div class="one" id="zonghe-{$indexkey}"> 
      <!--{eval $AllTypesArr = GetArrByValue($indexvalue);}--> 
      <!--{loop $AllTypesArr $k $v}-->
      <div class="one1">
        <div class="one3"><a href="$v[url]" target="$v[target]" class="one3" style="color:<!--{eval echo($v['color']!=""?$v['color']:"#666") }-->">$v[typename]</a></div>
        <!--{loop $v[SubDaohangArr] $k2 $v2}-->
        <div class="one4"> <a href="$v2[url]" target="$v2[target]" class="one5" style="color:<!--{eval echo($v2['color']!=""?$v2['color']:"#076FA2") }-->">$v2[typename]</a> 
          <!--{loop $v2[SubDaohangArr] $k3 $v3}--> 
          <a href="$v3[url]"  target="$v3[target]" style="color:<!--{eval echo($v3['color']!=""?$v3['color']:"#5c5858") }-->">$v3[typename]</a> 
          <!--{/loop}--> 
        </div>
        <!--{/loop}--> 
      </div>
      <!--{/loop}--> 
  <script language="javascript">seturl_LazyLoad('zonghe-{$indexkey}');</script>
      
    </div>
    <div  class="two">
      <div  class="two1"><!--{ad/typesright}--></div>
      
  <!--{if $TaoConfig[DB_OPEN] }-->
      <div  class="two2">
        <div  class="two3">热门Tag</div>
        <div  class="two4"> 
          <!--{eval $TagsArr = GetArrTags(20);}--> 
          <!--{loop $TagsArr $k $v}--> 
          <a href="$v[url]">
          <div class="<!--{if $v[is_hot]}-->actag<!--{/if}-->">$v[keyword]</div>
          </a> 
          <!--{/loop}--> 
          
        </div>
      </div>
<!--{/if}-->
      
      <!--{eval 
           $ShopTjarg = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey);
           if(empty($indexvalue[pronum])) $indexvalue[pronum]=6;
           
           $ShopTjArr = GetArrByValue($ShopTjarg[0],array("page_size"=>$indexvalue[pronum]));   
            }-->
      <div  class="two5" id="taodizonghe-tj{$indexkey}">
        <div class="two6">$ShopTjarg[0][typename]</div>
        <!--{loop $ShopTjArr $k $v}-->
            <!--{if $v[tao_iid]!=""}--> 
            <div style=" width:234px; height:322px; margin-bottom:10px; margin-left:auto; margin-right:auto;">      
                <a target="_blank" data-itemid="$v[tao_iid]" data-tmpl="230x312" data-style="2" data-rd="1" data-type="0">
                    	$v[title] <br />  ￥ $v[price]
                    </a>
            </div>
            <!--{else}-->
                <div class="two7">
                  <div class="two8"><a href="$v[url]"  $v[rel] target="$v[target]">
                    <!--{eval setPic($v["pic_url"]."_80x80.jpg",70,70,strip_tags($v["title"])) }-->
                    </a></div>
                  <div class="two9"><a href="$v[url]"  target="$v[target]" data-itemid="$v[tao_iid]" $v[rel] data-rd="1">$v[title]</a><br/>
                    <span style="color:#fe2309; font-size:14px; font-weight:bold;">$v[price]￥</span> </div>
                </div>
            <!--{/if}--> 
        
        <!--{/loop}--> 
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <script language="javascript">seturl_LazyLoad('taodizonghe-tj{$indexkey}');</script>

  <!--{/if}--> 
  
  <!--{if $indexvalue[typeid]==13}-->
  <!-- 自定义html --> 
  <div class="taotj" id="taozhekou-{$indexkey}" style="text-align:{$indexvalue[sort]};">
  <!--{eval echo strtr(stripslashes(html_entity_decode($indexvalue[contentHtml],ENT_QUOTES)),$TaoConfig["ad_verible"]);}-->
  </div>
  <div class="clear"></div>
  <!--{/if}--> 
  <!--{if $indexvalue[typeid]==21}-->
   <!--{if !$indexvalue[height]}--><!--{eval $indexvalue[height]=2000;}--><!--{/if}--> 
   <!--{eval $indexvalue[urltxt]=UpdateSystemVerible($indexvalue[urltxt]);}-->
  <!-- 整合频道 --> 
  	<center><div style="width:100%; text-align:center; overflow:hidden; clear:both; margin-top:0px; margin-bottom:0px;"><div style="height:<!--{eval echo($indexvalue[height]+$indexvalue[hidentop]) }-->px; margin-top:-{$indexvalue[hidentop]}px;"><iframe frameborder="0" marginheight="0" marginwidth="0" border="0" id="alimamaifrm" name="alimamaifrm" scrolling="no" height="<!--{eval echo($indexvalue[height]+$indexvalue[hidentop]) }-->px" width="100%" src="$indexvalue[urltxt]" ></iframe></div></div></center>
  <div class="clear"></div>
  <!--{/if}--> 
  
  <!--{if $indexvalue[typeid]==2}-->
  <!-- 淘宝打折商品栏目 --> 
  <div class="taotj" id="taozhekou-{$indexkey}">
    <div class="one">
      <div class="one1" style="color:$indexvalue[color]">$indexvalue[typename]</div>
      <div class="one2"> 
        <!--{eval $tuijianleibie = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey);}--> 
        <!--{loop $tuijianleibie $k $v}--> 
        <a href="$v[url]" target="$v[target]" style="color:$v[color]">$v[typename]</a> | 
        <!--{/loop}--> 
        <a href="$indexvalue[url]" target="$indexvalue[target]">更多>></a> </div>
    </div>
    <div class="two"> 
      <!--{eval $dazhelists = GetArrByValue($indexvalue,array("page_size"=>"4"));}--> 
      <!--{loop $dazhelists $k $v}-->
                   <div style=" width:230px; height:322px; margin:5px 5px 0 0; float:left;">
    <a target="_blank" data-itemid="$v[tao_iid]" data-tmpl="230x312" data-style="2" data-rd="1" data-type="0">
                    	$v[title] <br />  ￥ $v[price]
                    </a>
                   </div>

      <!--{/loop}-->
      
      <div class="clear"></div>
    </div>
  </div>
  <div class="clear"></div>
  <script language="javascript">seturl_LazyLoad('taozhekou-{$indexkey}');</script>
  <!--{/if}--> 
  
  <!--{if $indexvalue[typeid]==3}-->
  <!-- 淘宝商品栏目 --> 
  <div class="taotj"  id="taozhekou-{$indexkey}">
    <div class="one">
      <div class="one1" style="color:$indexvalue[color]">$indexvalue[typename]</div>
      <div class="one2"> 
        <!--{eval $tuijianleibie = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey);}--> 
        <!--{loop $tuijianleibie $k $v}--> 
        <a href="$v[url]" target="$v[target]" style="color:$v[color]">$v[typename]</a> | 
        <!--{/loop}--> 
        <a href="$indexvalue[url]" target="$indexvalue[target]">更多>></a> </div>
    </div>
    <div class="two"> 
      <!--{eval $taogoulists = GetArrByValue($indexvalue,array("page_size"=>"4"));}--> 
      <!--{loop $taogoulists $k $v}-->
                   <div style=" width:230px; height:322px; margin:5px 5px 0 0; float:left;">
    <a target="_blank" data-itemid="$v[tao_iid]" data-tmpl="230x312" data-style="2" data-rd="1" data-type="0">
                    	$v[title] <br />  ￥ $v[price]
                    </a>
                   </div>
      <!--{/loop}--> 
    </div>
  </div>
  <div class="clear"></div>
  <script language="javascript">seturl_LazyLoad('taozhekou-{$indexkey}');</script>
  <!--{/if}--> 
  <!--{if $indexvalue[typeid]==15}-->
  <!-- 拍拍商品栏目 --> 
  <div class="taotj" id="taozhekou-{$indexkey}">
    <div class="one">
      <div class="one1" style="color:$indexvalue[color]">$indexvalue[typename]</div>
      <div class="one2"> 
        <!--{eval $tuijianleibie = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey);}--> 
        <!--{loop $tuijianleibie $k $v}--> 
        <a href="$v[url]" target="$v[target]" style="color:$v[color]">$v[typename]</a> | 
        <!--{/loop}--> 
        <a href="$indexvalue[url]" target="$indexvalue[target]">更多>></a> </div>
    </div>
    <div class="two"> 
      <!--{eval $taogoulists = GetArrByValue($indexvalue,array("page_size"=>"5"));}--> 
      
      <!--{loop $taogoulists $k $v}-->
      <div class="two1">
        <div class="two2"><a href="$v[url]"  $v[rel] target="$v[target]">
          <!--{eval setPic($v["pic_url"]."_160x160.jpg",160,160,strip_tags($v["title"])) }-->
          </a><br/>
          <a href="$v[url]"  $v[rel] target="$v[target]">$v[title]</a></div>
        <div class="two3"><a href="$v[url]"  $v[rel] target="$v[target]"><img src="images/ico4.png"  width="62" height="27" align="absmiddle"/></a>
          <div>月销:$v[volume]件</div>
        </div>
        <div class="two4">优惠价：<span style="color:#fe0202;">$v[price]￥</span><br />
          卖家:$v[nick] 
        </div>
        <div class="two5"><img src="images/ico5.png" width="45" height="45" /></div>
      </div>
      <!--{/loop}--> 
    </div>
  </div>
  <div class="clear"></div>
  <script language="javascript">seturl_LazyLoad('taozhekou-{$indexkey}');</script>
  <!--{/if}--> 
  
  <!--{if $indexvalue[typeid]==5}-->
  <!-- B2C商品 --> 
  <div class="taotj" id="taozhekou-{$indexkey}">
    <div class="one">
      <div class="one1" style="color:$indexvalue[color]">$indexvalue[typename]</div>
      <div class="one2"> 
        <!--{eval $tuijianleibie = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey);}--> 
        <!--{loop $tuijianleibie $k $v}--> 
        <a href="$v[url]" target="$v[target]" style="color:$v[color]">$v[typename]</a> | 
        <!--{/loop}--> 
        <a href="$indexvalue[url]" target="$indexvalue[target]">更多>></a> </div>
    </div>
    <div class="two"> 
      <!--{eval $taogoulists = GetArrByValue($indexvalue,array("page_size"=>"5"));}--> 
      <!--{loop $taogoulists $k $v}-->
      <div class="two1">
        <div class="two2"><a href="$v[url]"  $v[rel] target="$v[target]">
          <!--{eval setPic($v["pic_url"]."_160x160.jpg",160,160,strip_tags($v["title"])) }-->
          </a><br/>
          <a href="$v[url]"  $v[rel] target="$v[target]">$v[title]</a></div>
        <div class="two3"><a href="$v[url]"  $v[rel] target="$v[target]"><img src="images/ico4.png"  width="62" height="27" align="absmiddle"/></a>
          <div></div>
        </div>
        <div class="two4">优惠价：<span style="color:#fe0202;">$v[price]￥</span><br />
          <img src="$rootroad/img/level/level_{$v[seller_credit_score]}.gif" align="absmiddle" alt="信誉度"> </div>
        <div class="two5"><img src="images/ico5.png" width="45" height="45" /></div>
      </div>
      <!--{/loop}--> 
    </div>
  </div>
  <div class="clear"></div>
  <script language="javascript">seturl_LazyLoad('taozhekou-{$indexkey}');</script>
  <!--{/if}--> 
  

  <!--{if $indexvalue[typeid]==9}-->
  <!-- B2C商城栏目显示 -->   
<!--{if $TaoConfig[DB_OPEN] }-->
  <div id="hd" class="classhd">
    <div class="one" id="mall-{$indexkey}">
      <div class="one2">
        <div class="one3" rel='tb-btn'> 
          <!--{eval $shops_cate = GetArrShops_Cate(10);}--> 
          <!--{loop $shops_cate $k $v}-->
          <div class="one4"  rel='btn'>
            <div class="one5"></div>
            <div class="one6"><a href="javascript://">$v[name]</a></div>
          </div>
          <!--{/loop}-->
          <div class="one4"  style=" background-image:url(images/ico13.jpg); height:67px;">
            <div class="one10" style="display:none"><a href="#">>>更多</a></div>
          </div>
        </div>
        
        <!--{loop $shops_cate $k $v}-->
        <div class="one11"  rel='tb-box'>
          <div class="one12"> 
            <!--{eval $shops = GetArrShops($v[id],25);}--> 
            <!--{loop $shops $k2 $v2}-->
            <div class="one13"><a href="$v2[url]"  rel='nofollow' target="_blank"><!--{eval setPic($v2[img],100,40,strip_tags($v["title"])) }--></a><br/>
              <a href="$v2[url]"  rel='nofollow' target="_blank" ><span style="color:#d84600; width:50px; overflow:hidden;" >$v2[title]</span></a></div>
            <!--{/loop}--> 
          </div>
        </div>
        <!--{/loop}--> 
      </div>
    </div>
  <script language="javascript">seturl_LazyLoad('mall-{$indexkey}');</script>
    <div class="two">
      <div class="two14">
        <div class="two2">
          <div class="two3">会员动态</div>
        </div>
        <div class="two15" id="UserDtCon">
          <ul>
            
            <!--{eval $tao_order = GetArrTaoOrder();}--> 
            <!--{loop $tao_order $k $v}-->
            <li class="two16">
              <div class="two17">$v[seller_nick]</div>
              <div class="two18">买了<a href="$v[url]" target="_blank"><span style="color:#ff5b00; font-weight:bold;">{$v[item_title]}</span></a></div>
            </li>
            <!--{/loop}-->
            <!--分享数据-->
            <!--{eval $tao_order = GetArrSharePro(0,0,10,1,0,-2,"add_time",$count);}--> 
            <!--{loop $tao_order $k $v}-->
            <li class="two16">
              <div class="two17">$v[uname]</div>
              <div class="two18">分享了<a href="$v[pai_url]" data-itemid="$v[tao_iid]" data-rd="1" $v[rel] target="_blank"><span style="color:#ff5b00; font-weight:bold;">{$v[title]}</span></a></div>
            </li>
            <!--{/loop}-->
            
            
             <li class="two16">
              <div class="two17"></div>
              <div class="two18"></div>
            </li>
           
          </ul>
        </div>
      </div>
      <div class="two19"><!--{ad/dongtai}--></div>
    </div>
    <div class="clear"></div>
  </div>
  <!--{/if}--> 
  <!--{/if}--> 
  
  

  
  <!--{if $indexvalue[typeid]==4 || $indexvalue[typeid]==7}-->
  <!-- 分享商品栏目 --> 
<!--{if $TaoConfig[DB_OPEN] }-->
  <div class="taotj" id="taozhekou-{$indexkey}">
    <div class="one">
      <div class="one1" style="color:$indexvalue[color]">$indexvalue[typename]</div>
      <div class="one2"> 
        <!--{eval $tuijianleibie = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey);}--> 
        <!--{loop $tuijianleibie $k $v}--> 
        <a href="$v[url]" target="$v[target]" style="color:$v[color]">$v[typename]</a> | 
        <!--{/loop}--> 
        <a href="$indexvalue[url]" target="$indexvalue[target]">更多>></a> </div>
    </div>
    <div class="two"> 
      <!--{eval $taoseller = GetArrByValue($indexvalue,array("page_size"=>"4"));}--> 
      <!--{loop $taoseller $k $v}-->
      

      
    <div style=" width:230px; height:322px; margin:5px 5px 0 0; float:left;">
    <a target="_blank" data-itemid="$v[tao_iid]" data-tmpl="230x312" data-style="2" data-rd="1" data-type="0">
        <div style=" width:230px; height:312px; float:left;	border:solid 1px #e4e4e4;">
                    <div class="pic01"></div>
                    <div class="pic02">
                    <DIV class="grid-image" style="height:210px;">
                          <!--{eval setPic($v["img"],200,200,strip_tags($v["title"])) }-->
                          </DIV>
                    <div>$v["title"]</div>
                    <div class="pic04"><ul><li class="li01">￥$v["price"]<span></span></li></ul></div>
                    <div class="clear"></div>
                    </div>
    
        </div>
    </a>
    </div>
      
      <!--{/loop}--> 
    </div>
    <div class="clear"></div>
  </div>
  <script language="javascript">seturl_LazyLoad('taozhekou-{$indexkey}');</script>
  <!--{/if}--> 
  <!--{/if}--> 
 
  <!--{if $indexvalue[typeid]==6}--> 
  <!-- 文章栏目 --> 
<!--{if $TaoConfig[DB_OPEN] }-->
  <!--{eval $NewsTypeList = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey);}-->
  <div id="xx"> 
    <!--{loop $NewsTypeList $k $v}--> 
    
    <!--{if $k % 3 == 0}-->
    <div class="one">
      <div class="one1">
        <div class="one2" style="color:$v[color]">$v[typename]</div>
        <div class="one3"> <a href="$v[url]" target="$v[target]">>> 更多</a></div>
      </div>
      <div class="one4">
        <div class="one6"> 
          <!--{eval $NewsArr = GetArrArticle($v[vcate_id],$indexvalue[pronum],1,0,0,"add_time");}--> 
          <!--{loop $NewsArr $knew $vnew}-->
          <div class="one7"><a href="$vnew[url]" target="$v[target]">{$vnew[title]}</a></div>
          <div class="one8"><a href="#">[<!--{eval echo date('m-d',strtotime($vnew['add_time']))}-->]</a></div>
          <!--{/loop}--> 
        </div>
      </div>
    </div>
    <!--{/if}--> 
    <!--{if $k % 3 == 1}-->
    <div class="one" style="width:312px; overflow: hidden;">
      <div class="one1"  style="width:312px;color:$v[color]">
        <div class="one2">$v[typename]</div>
        <div class="one3" style="width:138px;"> <a href="$v[url]" target="$v[target]">>> 更多</a></div>
      </div>
      <div class="one4" style="width:312px;">
        <div class="one10"> 
          <!--{eval $NewsArr = GetArrArticle($v[vcate_id],$indexvalue[pronum],1,0,0,"add_time");}--> 
          <!--{loop $NewsArr $knew $vnew}-->
          <div class="one9"><a href="$vnew[url]" target="$v[target]">{$vnew[title]}</a></div>
          <div class="one8"><a href="#">[<!--{eval echo date('m-d',strtotime($vnew['add_time']))}-->]</a></div>
          <!--{/loop}--> 
        </div>
      </div>
    </div>
    <!--{/if}--> 
    <!--{if $k % 3 == 2}-->
    <div class="one" style="margin-right:0px;">
      <div class="one1">
        <div class="one2" style="color:$v[color]">$v[typename]</div>
        <div class="one3"> <a href="$v[url]" target="$v[target]">>> 更多</a></div>
      </div>
      <div class="one4">
        <div class="one6"> 
          <!--{eval $NewsArr = GetArrArticle($v[vcate_id],$indexvalue[pronum],1,0,0,"add_time");}--> 
          <!--{loop $NewsArr $knew $vnew}-->
          <div class="one7"><a href="$vnew[url]" target="$v[target]">{$vnew[title]}</a></div>
          <div class="one8"><a href="#">[<!--{eval echo date('m-d',strtotime($vnew['add_time']))}-->]</a></div>
          <!--{/loop}--> 
        </div>
      </div>
    </div>
    <!--{/if}--> 
    
    <!--{/loop}-->
    <div class="clear"></div>
  </div>
  <!--{/if}--> 
<!--{/if}--> 


  
  <!--{/loop}-->
  
  
  
  
  
  <!--{if $newslist }--> 
  <!-- 整合文章栏目 --> 
  <div id="xx"> 
    <!--{loop $newslist $k2 $list}--> 
    <?php $listnews = $list["artlist"]; ?>
        <!--{if $k2 % 3 == 0}-->
        <div class="one">
          <div class="one1">
            <div class="one2">$list[typename]</div>
            <div class="one3"> <a href="$list[typedir]" target="_blank">>> 更多</a></div>
          </div>
          <div class="one4">
            <div class="one6"> 
              <!--{loop $listnews $knew $vnew}-->
              <div class="one7"><a href="$vnew[url]" target="_blank">{$vnew[title]}</a></div>
              <div class="one8"><a href="#">[<!--{eval echo date('m-d',($vnew['date']))}-->]</a></div>
              <!--{/loop}--> 
            </div>
          </div>
        </div>
        <!--{/if}--> 
        <!--{if $k2 % 3 == 1}-->
        <div class="one" style="width:312px; overflow: hidden;">
          <div class="one1"  style="width:312px;color:$v[color]">
            <div class="one2">$list[typename]</div>
            <div class="one3" style="width:138px;"> <a href="$list[typedir]" target="_blank">>> 更多</a></div>
          </div>
          <div class="one4" style="width:312px;">
            <div class="one10"> 
              <!--{loop $listnews $knew $vnew}-->
              <div class="one9"><a href="$vnew[url]" target="_blank">{$vnew[title]}</a></div>
              <div class="one8"><a href="#">[<!--{eval echo date('m-d',($vnew['date']))}-->]</a></div>
              <!--{/loop}--> 
            </div>
          </div>
        </div>
        <!--{/if}--> 
        <!--{if $k2 % 3 == 2}-->
        <div class="one" style="margin-right:0px;">
          <div class="one1">
            <div class="one2">$list[typename]</div>
            <div class="one3"> <a href="$list[typedir]" target="_blank">>> 更多</a></div>
          </div>
          <div class="one4">
            <div class="one6"> 
              <!--{loop $listnews $knew $vnew}-->
              <div class="one7"><a href="$vnew[url]" target="_blank">{$vnew[title]}</a></div>
              <div class="one8"><a href="#">[<!--{eval echo date('m-d',($vnew['date']))}-->]</a></div>
              <!--{/loop}--> 
            </div>
          </div>
        </div>
        <!--{/if}--> 
    
    <!--{/loop}-->
    <div class="clear"></div>
  </div>
  <!--{/if}--> 
  
  <div id="link">
    <div class="linkT">友情链接：</div>
    <ul class="linkL">
      <!--{eval $LinkArr = GetLinkFriend(1);}--><!--这一行是用来调用图片友情连接的--> 
      <!--{loop $LinkArr $k $v}-->
      <li class="link_1"><a href="$v[0]" target="_blank" title="$v[1]"><img src="$v[2]" alt="$v[1]" width="80" height="40"/></a></li>
      <!--{/loop}-->
    </ul>
    <div class="linkL_1"> 
      <!--{eval $LinkArr = GetLinkFriend(3);}--><!--这一行是用来调用文字友情连接的--> 
      <!--{loop $LinkArr $k $v}--> 
      <a href="$v[0]" target="_blank" title="$v[1]">$v[1]</a> | 
      <!--{/loop}--> 
    </div>
  </div>
  
  
  <!--{template footer}-->
<script src="$TaoConfig[rootroad]/index.php?mod=updatehtml"></script>
</center>
</body>
</html>