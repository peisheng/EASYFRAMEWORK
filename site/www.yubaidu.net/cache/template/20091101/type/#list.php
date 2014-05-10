<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<table width="948" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4" background="<?php echo $skin_path;?>/middle_bg1.jpg"> </td>
    <td valign="top">
<?php echo template('left.html'); ?>
</td>
        <td width="724" valign="top"><?php echo template('position.html'); ?>
</td>
          </tr>
                    <tr>
                      <td height="28"></td>
                    </tr>          <tr>
            <td><img src="<?php echo $skin_path;?>/t.gif" width="1" height="6" /></td>
          </tr>
          <tr>
            <td align="right" style="font-size:11px; color:#BCBCBC;"></td>
          </tr>
          <tr>
            <td height="16"> </td>
          </tr>
          <tr>
            <td class="newsCon">

<!-- 内容_内容简介列表 -->
<ul class="news_list">
<?php foreach($archives as $i => $archive) { ?>
<li><span class="date"><?php echo $archive['adddate'];?></span><a title="<?php echo $archive['stitle'];?>" target="_blank" href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></li>
<?php } ?>
</ul>
<div class="blank10"></div>
<?php if(isset($pages)) { ?>
<?php echo type_pagination($typeid);?>
<?php } ?>

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