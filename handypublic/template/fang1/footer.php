<!--{eval if(!defined('VERSON')) exit('Access Denied'); }-->
<!--{if (false)}--><!--����ã�����dweamweaverʶ��-->
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

<!-- �û����� -->

<?php if($pagename_template == "index") {?>

<!-- �������� -->
<div class="links">
<ul>
<li>��������:</li>
      <!--{eval $LinkArr = GetLinkFriend(1);}--><!--��һ������������ͼƬ�������ӵ�--> 
      <!--{loop $LinkArr $k $v}-->
      <li><a href="$v[0]" target="_blank" title="$v[1]"><img src="$v[2]" alt="$v[1]" width="80" height="40"/></a></li>
      <!--{/loop}-->
      <!--{eval $LinkArr = GetLinkFriend(3);}--><!--��һ�����������������������ӵ�--> 
      <!--{loop $LinkArr $k $v}--> 
      <li><a href="$v[0]" target="_blank" title="$v[1]">$v[1]</a></li>
      <!--{/loop}--> 

</ul>
</div>
<?php } ?>


<div class="copyright">
	
	<!-- ��Ȩ��Ϣ -->
	<div class="copyright_info">Copyright &copy; 2009-2012 <a href="<?php echo $sitetitleurl ?>"><?php echo $sitetitle ?></a> All Rights Reserved $tongjidaima</div>
	<!-- ��Ȩ��Ϣ -->
	
	
	<div class="copyright_img">
<!--{ad/footer}-->	</div>
	<div class="copyright_special"><?php if($special != ""){echo $special;}?></div>
</div>

<!-- �ײ���ϵ -->
<div class="footer">
  <div class="footer_div">
  	<div class="footer_img"><img src="<?php echo $templateroot;?>/img/eaea/father.gif" width="85" height="79" /></div>
	<div class="footer_gg"><span>�̳���ּ��</span>����ϲ��,��������!</div>
	<div class="footer_line"></div>
	<div class="footer_cat">$webcontact $beianxinxi
</div>
  </div>
</div>

