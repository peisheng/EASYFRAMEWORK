<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<table width="948" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4" background="<?php echo $skin_path;?>/middle_bg1.jpg">&nbsp;</td>
    <td valign="top"><table width="904" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:16px;">

      <tr>
        <td width="180" valign="top" bgcolor="#F3F3F3">
<table width="180" border="0" cellspacing="0" cellpadding="0">
<tr>
            <td height="29" class="navbt"><strong><?php echo lang(siteannoun);?></strong><img src="<?php echo $skin_path;?>/split2.gif" width="1" height="7" align="absmiddle" style="margin-left:5px; margin-right:5px;" /><span class="en10">LIST</span></td>
          </tr>
          <tr>
            <td>
            <div id="nav">
            	<?php foreach(announ(5) as $an) { ?>
<a href="<?php echo $an['url'];?>" target="_blank"><?php echo $an['title'];?></a>
<?php } ?>
</div></td>
          </tr>

          <tr>
            <td height="20">&nbsp;</td>
          </tr>
          <tr>
            <td><div id="leftimgs"><a href="#" target="_blank"><img src="<?php echo $skin_path;?>/img1.jpg" alt="企业形象片" width="180" height="49" border="0" /></a><a href="<?php echo url('user');?>"><img src="<?php echo $skin_path;?>/img2.jpg" alt="会员中心" width="180" height="49" border="0" /></a><a href="#"><img src="<?php echo $skin_path;?>/img3.jpg" alt="在线订购" width="180" height="50" border="0" /></a></div>
</td>
          </tr>
        </table></td>
        <td width="724" valign="top"><table width="706" border="0" align="right" cellpadding="0" cellspacing="0">
        <?php echo template('position.html'); ?>
          <tr>
            <td height="20">&nbsp;</td>
          </tr>
          <tr>
            <td>
            <div style="border:1px dotted #FEB697; padding:8px; text-align:center; font-size:14px; color:#333333; background:#FFFAF9;"><h1><?php echo $announ['title'];?></h1></div></td>
          </tr>
          <tr>
            <td><img src="<?php echo $skin_path;?>/t.gif" width="1" height="6" /></td>
          </tr>
          <tr>
            <td align="right" style="font-size:11px; color:#BCBCBC;"></td>
          </tr>
          <tr>
            <td height="16">&nbsp;</td>
          </tr>
          <tr>
            <td class="newsCon text">
<?php echo $announ['content'];?>

</td>
          </tr>
          <tr>
            <td height="16" style="border-bottom:1px dotted #E6E6E6;"> </td>
          </tr>

        </table></td>
      </tr>      
    </table></td>
    <td width="4" background="<?php echo $skin_path;?>/middle_bg2.jpg"> </td>
  </tr>
</table>
<table width="948" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="948"><img src="<?php echo $skin_path;?>/btm_bg.jpg" width="948" height="7" /></td>
  </tr>
</table>
<?php echo template('footer.html'); ?>