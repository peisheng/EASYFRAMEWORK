<!--{eval if(!defined('VERSON')) exit('Access Denied'); }-->
<!--{if (false)}--><!--设计用，用于dweamweaver识别-->
<link href="css/eaea_all.css" rel="stylesheet" type="text/css" />
<link href="css/eaea_index.css" rel="stylesheet" type="text/css" />
<link href="css/css.css" rel="stylesheet" type="text/css" />
<!--{/if}-->
<?php if($pagename_template == "index") {?>
<div style="padding-left:8px; width:950px; margin-left:auto; margin-right:auto">
<?php
	include($WEBROOT_TEMP."news.php");
?>
</div>
<div style="clear:both"></div>
<?php } ?>

<!-- 用户帮助 -->

<?php if($pagename_template == "index") {?>

<!-- 友情链接 -->
<div class="links">
<ul>
<li>友情链接:</li>
      <!--{eval $LinkArr = GetLinkFriend(1);}--><!--这一行是用来调用图片友情连接的--> 
      <!--{loop $LinkArr $k $v}-->
      <li><a href="$v[0]" target="_blank" title="$v[1]"><img src="$v[2]" alt="$v[1]" width="80" height="40"/></a></li>
      <!--{/loop}-->
      <!--{eval $LinkArr = GetLinkFriend(3);}--><!--这一行是用来调用文字友情连接的--> 
      <!--{loop $LinkArr $k $v}--> 
      <li><a href="$v[0]" target="_blank" title="$v[1]">$v[1]</a></li>
      <!--{/loop}--> 

</ul>
</div>
<?php } ?>


<div class="copyright">
	
	<!-- 版权信息 -->
	<div class="copyright_info">Copyright &copy; 2009-2012 <a href="<?php echo $sitetitleurl ?>"><?php echo $sitetitle ?></a> All Rights Reserved $tongjidaima</div>
	<!-- 版权信息 -->
	
	
	<div class="copyright_img">
<!--{ad/footer}-->	</div>
	<div class="copyright_special"><?php if($special != ""){echo $special;}?></div>
</div>

<!-- 底部联系 -->
<div class="footer">
  <div class="footer_div">
  	<div class="footer_img"><img src="<?php echo $templateroot;?>/img/eaea/father.gif" width="85" height="79" /></div>
	<div class="footer_gg"><span>商城宗旨：</span>淘你喜欢,淘你所爱!</div>
	<div class="footer_line"></div>
	<div class="footer_cat">$webcontact $beianxinxi
</div>
  </div>
</div>

