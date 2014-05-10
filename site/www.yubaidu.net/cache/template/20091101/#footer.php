<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<table width="920" border="0" align="center" cellpadding="0" cellspacing="0" id="bottom">
  <tr>
    <td width="409" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>
        <td><img src="<?php echo $skin_path;?>/t.gif" width="1" height="6" /></td>
      </tr>
      <tr>
        <td height="22"><?php echo lang(tel);?>：<?php echo get('tel');?>  <?php echo lang(address);?>：<?php echo get('address');?></td>
      </tr>
 
      <tr>
        <td height="22" style="font-size:11px;"><?php echo lang(email);?>：<a href="mailto:<?php echo get('email');?>"><?php echo get('email');?></a>　<?php echo lang(qq);?>：<a target="blank" href="http://wpa.qq.com/msgrd?V=1&Uin=<?php echo get('qq1');?>&Site=cnpuda.com&Menu=yes"><img border='0' src='http://wpa.qq.com/pa?p=1:<?php echo get('qq1');?>:3' alt='<?php echo get('sitename');?>' align="absmiddle" /></a>　</td>
      </tr>
    </table></td>
    <td width="511" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="21" align="right" valign="bottom"><a href="<?php echo $base_url;?>/"><?php echo lang(homepage);?></a>
<!-- <?php foreach(archive(1,0,0,'0,0,0',20,'aid',4,false,0) as $i => $archive) { ?> -->
  |  <a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><?php echo $archive['title'];?></a>
<!-- <?php } ?> -->
<!-- <a href="eng/"><span style="font-size:11px;">ENGLISH</span></a> --></td>
      </tr>
      <tr>
        <td height="25" align="right"><span style="font-size:11px;"><!-- 页底说明 -->
<?php echo get(site_right);?> <a title="<?php echo get('sitename');?>" href="<?php echo $base_url;?>/"><?php echo get('sitename');?></a> All Rights Reserved.      </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="18" colspan="2" valign="top"> </td>
  </tr>
</table>
<!-- 非商业用户请勿删除 -->
<div class="copyright">&nbsp;&nbsp;<?php echo getcnzzcount();?>
<br />
<?php if($topid==0) { ?><!-- 热门关键词 -->
<div class="hot_keys"><?php echo lang(hotkeys);?>： <?php echo gethotsearch(10);?></div><?php } ?>
</div>
</div>


<!-- 友情链接 -->
<?php if($topid==0) { ?><select name="website" onchange="javascript:window.open(this.options[this.selectedIndex].value)" style="float:right; margin-top:10px;">
<option value="default"><?php echo lang('links');?></option>
<?php foreach(friendlink('text',0,20) as $flink) { ?>
<option value="<?php echo $flink['url'];?>"><?php echo $flink['name'];?></option>
<?php } ?>
</select><?php } ?>
</div>

<!-- 在线客服 -->
<?php echo template('system/servers.html'); ?>
<!-- 短信 -->
<?php echo template('system/sms.html'); ?>

<?php if(get('lang_type')=='cn') { ?><script type="text/javascript" src="<?php echo $base_url;?>/js/tc.js"></script><?php } ?>
</body>
</html>