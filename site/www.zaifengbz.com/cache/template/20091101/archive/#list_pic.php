<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<table width="948" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="4" background="<?php echo $skin_path;?>/middle_bg1.jpg">&nbsp;</td>
    <td valign="top"><?php echo template('left.html'); ?></td>
        <td width="724" valign="top"><?php echo template('position.html'); ?></td>
          </tr>
          <tr>
<td height="20">&nbsp;</td>
          </tr>
          <tr>
            <td>

<!-- 内容缩略图列表 -->
<ul id="list-view">
<?php foreach($archives as $i => $archive) { ?>
<?php if($i%4==0) { ?><div class="clear blank5"></div><?php } else { ?><?php } ?>
<li><div class="img-wrap"><a title="<?php echo $archive['stitle'];?>" target="_blank" href="<?php echo $archive['url'];?>"><img alt="<?php echo $archive['stitle'];?>" src="<?php echo $archive['sthumb'];?>" onerror='this.src="<?php echo $base_url;?>/<?php echo config::get('onerror_pic');?>"' /></a></div>
<h5><a title="<?php echo $archive['stitle'];?>" target="_blank" href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></h5><?php if($archive['attr2']) { ?><?php echo lang(price);?>	:	<span><?php echo $archive['attr2'];?></span><?php echo lang(unit);?><?php } ?>
</li>
<?php } ?>
</ul>
<!-- 内容缩略图列表结束 -->

<div class="clear"></div>
<div class="blank30"></div>
<?php if(isset($pages)) { ?>
<?php echo category_pagination($catid);?>
<?php } ?>
</div>

</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>      
    </table></td>
    <td width="4" background="<?php echo $skin_path;?>/middle_bg2.jpg">&nbsp;</td>
  </tr>
</table>
<table width="948" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="948"><img src="<?php echo $skin_path;?>/btm_bg.jpg" width="948" height="7" /></td>
  </tr>
</table>
<?php echo template('footer.html'); ?>