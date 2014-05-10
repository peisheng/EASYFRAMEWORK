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
<!-- 专题图片 -->
<img src="<?php echo $special['banner'];?>" style="float:left;margin:0px 20px 20px 0px;" />
<!-- 专题介绍 -->
<?php echo $special['description'];?>
<div class="clear"></div>
</div>
<!-- 内容_内容简介列表 -->
<ul class="news_list">
<?php foreach($archives as $i => $sp) { ?>
<li><span class="date"><?php echo $sp['adddate'];?></span><a title="<?php echo $sp['title'];?>" target="_blank" href="<?php echo $sp['url'];?>"><?php echo $sp['title'];?></a></li>
<?php } ?>
</ul>
<div class="blank10"></div>
<!-- 内容列表分页 -->
<?php if(isset($pages)) { ?>
<?php echo special::pagination();?>
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