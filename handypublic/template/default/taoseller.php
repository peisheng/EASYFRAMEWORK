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
<script language="JavaScript" type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<!--{template headerjs}-->

</head>
<body>
<center>
<!--{template header}-->



<div id="list">
  <div class="one">
  
  <div class="shop_cont">
  <dl><dt>$TaoShop[title]</dt>
  <dd class="dd01"><a href="#" {$vpro[shop_click_url_base64]} ><!--{eval setPic($TaoShop["pic_path"],80,80,strip_tags($TaoShop["shop_title"])) }--></a></dd>
  <div class="clear"></div>
  <dd class="dd02"><ul>
  <li>�ƹ����ƣ�$TaoShop[nick]</li>
  <li>����������<img src="$rootroad/img/level/level_{$vpro[seller_credit_score]}.gif" align="absmiddle" alt="������"></li>
  <li>����ʱ�䣺$TaoShop[created] </li>
  <li><b>���̶�̬����</b></li>
  <li>���������������<img src="images/shop_con03.jpg" alt="$TaoShop[item_score]��"  title="$TaoShop[shop_score][item_score]��"/></li>
  <li>���ҵķ���̬�ȣ�<img src="images/shop_con04.jpg" alt="$TaoShop[item_score]��"  title="$TaoShop[shop_score][service_score]��"/></li>
  <li>���ҷ������ٶȣ�<img src="images/shop_con07.jpg" alt="$TaoShop[item_score]��"  title="$TaoShop[shop_score][delivery_score]��"/></li>

  <li class="li01"><a href="{$vpro[shop_click_url_base64]}"  rel='nofollow' ><img src="images/shop_con08.jpg"/></a></li>
  </ul></dd>
  </dl>
  </div>
	  <div class="one1">
	      <div class="one2">���ŵ���</div>
            <!--{eval $DaohangArr = GetArrDaohang("cidaohang");}--><!--��һ��������������������-->
            <!--{loop $DaohangArr $k $v}-->
		    <div class="one3"><a href="$v[url]" target="$v[target]" style="color:$v[color]">$v[typename]</a></div>
                <!--{loop $v[SubDaohangArr] $key2 $value2}-->
                <div class="one3b"><a href="$value2[url]" target="$value2[target]" style="color:$v[color]">$value2[typename]</a></div>
                <!--{/loop}-->
            
            <!--{/loop}-->
	  </div>
      <div class="one4" style="padding-bottom:5px;">
	  	  <div class="one5" style="margin-bottom:5px;">�������</div>
          
		  
          <!--{eval $NewsArr = GetArrArticle(0,10,1,1,0,"add_time");}--> 
          <!--{loop $NewsArr $k $v}-->
          <div class="ny"><a href="$v[url]" target="_blank">&middot;{$v[title]}</a></div>
          <!--{/loop}-->
          
	  </div>
    <div style="height:10px; width:20px; clear:both"></div>
<!--{ad/taoleft}-->
    </div>
  
  
  <div class="two">
	   <div class="two1">
		   <div class="two2"></div>
		   <div class="two3">��ǰλ��:��ҳ 
           <!--{if $param[keyword]!="" }--> > $param[keyword] <!--{/if}-->
           <!--{if $TaoapiCat[0][name]!="" }-->  > $TaoapiCat[0][name]<!--{/if}-->
           </div>
	   </div>
	   <div class="sp6">
			<div class="sp7">����������
            <!--{eval $DaohangArr = GetArrDaohang("keyword");}--><!--��һ��������������������������-->
            <!--{loop $DaohangArr $k $v}-->
		    <a href="$v[url]" target="$v[target]" style="color:$v[color]">$v[typename]</a>
            <!--{/loop}-->
            
             </div>	
			<div class="sp8">
            <!--{eval $url1 = GetDaohangUrl(array(),array_merge($param,array("showtype"=>"2")));}-->
            <!--{eval $url2 = GetDaohangUrl(array(),array_merge($param,array("showtype"=>"1")));}-->
            <a href="$url1"><img src="images/ico46.jpg"  style="margin-right:5px;" /></a>
            <a href="$url2"><img src="images/ico47.jpg"  /></a></div>   
	   </div>
	   <!--{if $param[showtype]!="1"}-->
            <!--{loop $taobaokeItem $k $v}-->
     		
           <div class="sp9">
               <div class="sp10"><dl>
               <dt><a href="$v[url]" $v[rel]  target="$v[target]">
          <!--{eval setPic($v["pic_url"]."_100x100.jpg",100,100,strip_tags($v["title"])) }-->
          </a></dt>
               <dd class="dd01"><ul><li class="li01">
               <a href="$v[url]" $v[rel]  target="$v[target]">$v[title]</a>
               </li>
               <li class="li02">�������۳�<b>$v[volume]</b>��<img src="$rootroad/img/level/level_{$v[seller_credit_score]}.gif" align="absmiddle" alt="������"></li>
               <li class="li03">����:$v[nick] </li>
               </ul></dd>
               <dd class="dd02"><ul>
               <li class="li01"><span>�Ա��ۣ�$v[price]Ԫ</span>  </li>

            	<!--{eval $bijiaUrl = GetDaohangUrl(array("urltype"=>"taogou","keyword"=>$v[title]));}-->
               <li class="li02"><a href="$bijiaUrl"><img src="images/ico51.jpg"/></a><a href="$v[url]" $v[rel]  target="$v[target]"><img src="images/gotao.gif"/></a></li>
               </ul></dd>
               </dl><div class="clear"></div></div>
           </div>
          <!--{/loop}-->
       <!--{else}-->
       <div class="sp9">
                   
                   <div class="sp_two">
            <!--{loop $taobaokeItem $k $v}-->
                   
                   <dl>
                   <dt><a href="$v[url]" target="$v[target]">
          <!--{eval setPic($v["pic_url"]."_160x160.jpg",160,160,strip_tags($v["title"])) }-->
          </a></dt>
                   <dd class="dd01"><a href="$v[url]" $v[rel]  target="$v[target]">$v[title]</a></dd>
                   <dd class="dd02">�������ã�<img src="$rootroad/img/level/level_{$v[seller_credit_score]}.gif" align="absmiddle" alt="������"></dd>
                   <dd class="dd01">�����ǳ�:$v[nick]</dd>
                   <dd class="dd01">�Ա��ۣ�<s>$v[price]</s>Ԫ</dd>
                   <dd class="dd01">�ۿۼۣ�<font>$v[coupon_price]</font>Ԫ</dd>
                   <dd class="dd03"><a href="$v[url]" $v[rel]  target="$v[target]"><img src="images/gotao.gif"/></a></dd>
                   </dl>
              <!--{/loop}-->
                   
                   </div>
                   
                   <div class="clear"></div>
       
               </div>	
       <!--{/if}-->
        <div class="page">
       		<ul class="page3">
              $pagestr   
			</ul>
       </div>                  
    </div>
</div>
  <script language="javascript">seturl_LazyLoad('list');</script>

  <!--{template footer}-->
</center>
</body>
</html>