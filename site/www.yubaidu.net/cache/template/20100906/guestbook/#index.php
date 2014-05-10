<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="bd">
 <?php echo template('left.html'); ?><!-- 调用通用左栏 -->
<div id="bd_right">
      	<div class="box">
            <?php echo template('position.html'); ?>
            <div class="content">
            	<div class="pd_title"></div>
                       <div class="pd">
<div style="text-align:center;color:red;"><?php if(hasflash()) { ?>
<?php echo showflash(); ?>
<?php } ?>
</div>
<style>
table tr td {line-height:32px;}
table input {height:16px;font-size:14px;line-height:16px;}
</style>
<form method="post" action="" name="form1">
  <table width="650" border="0" align="center" cellpadding="7" cellspacing="0" style="font-size:14px;">
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
<?php if($user) { ?>

    <h5></h5>

<div style="border:1px solid #DBE2E6;margin:6px 0px 15px;background:#F7F7F7; text-align:center;color:#0F409C; font-weight:bold; font-size:14px;"><?php echo lang(guestlist);?></div>
    
    <table width="650" border="1" align="center" cellpadding="7" cellspacing="0" bordercolor="#EDEDED">

<?php foreach($data as $d) { ?>
<tr>
            <td scope="col" colspan="2"><strong><?php echo $d['username'];?></strong><span style="padding-left:20px;"><?php echo sdate($d['adddate'],'Y-m-d H:i');?></span>
            </td>
        </tr>
        <tr>
  <td style="width:80px;font-weight:bold;" align="center"><?php echo lang(guestcontent);?></td>
          <?php $tags = '<p>,<li>,<b>,<strong>,<ol>,<em>'?>
            <td scope="col"><?php echo strip_tags($d['content'],$tags);?></td>
</tr>
         <?php if($d['reply']) { ?><tr>
 <td align="center"><?php echo lang(adminreply);?></td>
            <td scope="col">
                <?php echo $d['reply'];?>
            </td>
        </tr><?php } ?>
<?php } ?>
    </table>
              </td>
            </tr>
          </table>
  <div class="clear"></div>
<div class="blank30"></div>
    <div class="pages"><?php echo pagination::html($record_count); ?></div>
<?php } ?>

</div>
            </div>
            </div>
      </div>
      <div class="clear"></div>
    </div>
<?php echo template('footer.html'); ?>