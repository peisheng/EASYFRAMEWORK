<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<table width="850" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:18px;" id="bottom">
  <tr>
    <td width="28"><img src="<?php echo $skin_path;?>/btm_left.jpg" width="28" height="62" /></td>
    <td valign="top" background="<?php echo $skin_path;?>/btm_bg.jpg"><table width="794" border="0" cellspacing="0" cellpadding="0" style="margin-top:11px;">
      <tr>
        <td width="726" style="line-height:18px;" class="btm_text">TEL : <?php echo get('tel');?>  &nbsp;&nbsp;&nbsp;&nbsp;FAX : <?php echo get('fax');?> &nbsp;&nbsp;&nbsp;&nbsp;E-Mail : <a href="<?php echo get('email');?>"><?php echo get('email');?></a><br />
          Copyright © 2009 <a href="<?php echo $base_url;?>/" target="_blank"><?php echo get('sitename');?></a> Co.Ltd. All Rights Reserved.  &nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo get('site_icp');?></a></td>
        <td width="68" align="right"><a href="#top"><img src="<?php echo $skin_path;?>/totop.jpg" alt="TOP" width="29" height="28" border="0" /></a></td>
      </tr>
    </table></td>
    <td width="28"><img src="<?php echo $skin_path;?>/btm_right.jpg" width="28" height="62" /></td>
  </tr>
</table>
<div class="copyright"> &nbsp;&nbsp;<?php echo getcnzzcount();?></div>
</body>
</html>