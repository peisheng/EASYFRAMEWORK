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
<body>
<center>
<!--{template header}-->


<div id="list">
  <div class="one">
  
  
  
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
    </div>
  <div id="pingjiacontent" class="two">
	   <div class="two1">
		  
		   <div class="two3" style="width:auto;margin-left:10px">��ǰλ��:��ҳ > $TaoapiCat[name] > $vpro[title]</div>
	   </div>
	   <div class="sp9_product">
       
       <dl class="shop_cont02"><dt><b>$vpro[title]</b></dt>
       <dd class="dd01"><a href="$vpro[url]" {$vpro[click_url_base64]} target="$vpro[target]">
          <!--{eval setPic($vpro["pic_url"],300,300,strip_tags($vpro["title"])) }-->
          </a></dd>
       <dd class="dd02"><ul>
       <li>һ �� �ۣ�<b> <!--{eval echo $vpro[coupon_price]==""?"��".$vpro[price]:"<s>&yen;".$vpro[price]."</s>" }--></b> Ԫ   
       
       <!--{eval echo $vpro[coupon_price]==""?"":" �ۿۼۣ�<b>��".$vpro[coupon_price]."</b>Ԫ" }-->
       
        </li>
	   <li>30��������$vpro[volume]��</li>
       <li>�˷ѳе���<!--{if $vpro[dwTransportPriceType]==1}-->���ҳе��˷�<!--{else}-->ems:$vpro[dwEmsMailPrice] ƽ��:$vpro[dwNormalMailPrice] ���:$vpro[dwExpressMailPrice]<!--{/if}--></li>
	   <li>���������$vpro[dwNum] ��</li>
       
       
       <li style="line-height:35px;">
       <a href="{$vpro[click_url_base64]}"  rel='nofollow' target="_blank" >
       <img src="images/shop_con05.jpg" hspace="10" align="absmiddle"/></a><a href="{$vpro[shop_click_url_base64]}"  rel='nofollow' target="_blank" ><img style=" margin-left:10px;" src="images/shop_con06.jpg" align="absmiddle"/>
       </a>
   <script language="javascript">seturl_LazyLoad('list');</script>
       </li>
       <li><div class="bshare-custom">
<a title="����" href="http://www.bShare.cn/" id="bshare-shareto" class="bshare-more">����</a>
<a title="����QQ�ռ�" class="bshare-qzone">QQ�ռ�</a>
<a title="��������΢��" class="bshare-sinaminiblog">����΢��</a>
<a title="����������" class="bshare-renren">������</a>
<a title="������Ѷ΢��" class="bshare-qqmb">��Ѷ΢��</a>
<a title="��������" class="bshare-douban">����</a>
<a title="����ƽ̨" class="bshare-more bshare-more-icon more-style-addthis"></a>
<span class="BSHARE_COUNT bshare-share-count">0</span></div>
<script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>  </li>
       </ul></dd>
       </dl>
	     <div class="clear"></div>

        <div id="pingjia_shop" class="shop_pj">
            <div class="ul01" rel='tb-btn'>
                <div rel='btn' class="on"><a href="javascript::">��Ʒ����</a></div>
            </div>
            <div rel='tb-box' class="tb_content" >
                {$vpro[desc]}
            </div>
            
         </div>
 
           </div>
    </div>
</div>

  <!--{template footer}-->
</center>
</body>
</html>