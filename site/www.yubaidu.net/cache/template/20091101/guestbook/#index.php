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
            <td height="20"> </td>
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
<div style="text-align:center;color:red;"><?php if(hasflash()) { ?>
<?php echo showflash(); ?>
<?php } ?>
</div>
<style>
table tr td {line-height:32px;}
table input {height:16px;font-size:14px;line-height:16px;}
</style>
<form method="post" action="" name="form1">
  <table width="550" border="0" align="center" cellpadding="7" cellspacing="0" style="font-size:14px;">
             <tr>
                <td width="100">&nbsp;&nbsp;&nbsp;<?php echo lang(contactname);?>：</td>
                <td><?php echo form::input('nickname',get('username'));?>
                <span style="color:#FF0000"> *</span></td>
                <td width="100"></td>
              </tr>
  <tr>
                <td width="100">&nbsp;&nbsp;&nbsp;<?php echo lang(guesttel);?>：</td>
                <td><?php echo form::input('guesttel',get('guesttel'));?>
                <span style="color:#FF0000"> *</span></td>
                <td width="100"></td>
              </tr>
  <tr>
                <td width="100">&nbsp;&nbsp;&nbsp;<?php echo lang(guestemail);?>：</td>
                <td><?php echo form::input('guestemail',get('guestemail'));?>
                <span style="color:#FF0000"> *</span></td>
                <td width="100"></td>
              </tr>
  <tr>
                <td width="100">&nbsp;&nbsp;&nbsp;<?php echo lang(guestqq);?>：</td>
                <td><?php echo form::input('guestqq',get('guestqq'));?>
                <span style="color:#FF0000"> *</span></td>
                <td width="100"></td>
              </tr>

              <?php
              $title=$content=null;
              if(empty($submit_success)) {
                  $title=front::post('title');
                  $content=front::post('content');
              }
              ?>
                        <tr>
                <td>&nbsp;&nbsp;&nbsp;<?php echo lang(title);?>：</td>
                <td colspan="2"><input name="title" id="title" size="50" type="text" value="<?php echo $title;?>">&nbsp;<font color="red">*</font> </td>
              </tr>

                        <tr>
                <td>&nbsp;&nbsp;&nbsp;<?php echo lang(content);?>：</td>
                <td colspan="2">
                <input type="hidden" id="content" name="content" value="" style="display:none" /><input type="hidden" id="content___Config" value="SkinPath=<?php echo $base_url;?>/fckeditor/editor/skins/silver/&amp;UserFilesPath=<?php echo $base_url;?>/upload/" style="display:none" /><iframe id="content___Frame" src="<?php echo $base_url;?>/fckeditor/editor/fckeditor.html?InstanceName=content&amp;Toolbar=Basic" width="98%" height="300" frameborder="0" scrolling="no"></iframe>
<font color="red">*</font> </td>
              </tr>



  <tr>
                <td colspan="3" align="center" height="10">&nbsp;
                  </td>
              </tr>
            <?php if(config::get('verifycode')){
            ?>
              <tr>
                <td>&nbsp;&nbsp;&nbsp;<?php echo lang(verifycode);?>：</td>
                <td colspan="2"><span style="float:left;"><?php echo verify();?></span><span style="float:left;padding-left:10px;"><input type='text' id="verify"  name="verify" size="10" style="height:16px;" /></span><span style="color:#FF0000;float:left;">*</span>&nbsp;&nbsp;&nbsp;</td>
              </tr>
  <tr>
                <td colspan="3" align="center" height="10">&nbsp;
                  </td>
              </tr>
              <?php
              }
              ?>
              <tr>
                <td colspan="3" align="center"><input type="submit" name="submit" value="提交" style="float:right;padding:2px; background:none; border:0px none; background-color:#DDDDDD; color:#000000; width:70px;height:20px;line-height:20px;font-size:12px;" />
                  </td>
              </tr>
            </table>
</form>
<div class="blank30"></div>

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