<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div class="box line_4">
<?php echo template('left.html'); ?>
<!--left_1 end-->
<div class="right_2">
<img src="<?php echo $skin_url;?>/hb_9.gif" style="float:left;padding:2px -3px 0px 5px;"/>

<div class="r-line"></div>
<div class="text">

<div style="text-align:center;color:red;"><?php if(hasflash()) { ?>
<?php echo showflash(); ?>
<?php } ?>
</div>
<style>
table tr td {line-height:32px;}
</style>
<form method="post" action="" name="form1">
  <table width="650" border="0" align="center" cellpadding="7" cellspacing="0">
             <tr>
                <td width="100">&nbsp;&nbsp;&nbsp;联系人：</td>
                <td><?php echo form::input('nickname',get('username'));?>
                <span style="color:#FF0000"> *</span></td>
                <td width="100"></td>
              </tr>
  <tr>
                <td width="100">&nbsp;&nbsp;&nbsp;联系电话：</td>
                <td><?php echo form::input('guesttel',get('guesttel'));?>
                <span style="color:#FF0000"> *</span></td>
                <td width="100"></td>
              </tr>
  <tr>
                <td width="100">&nbsp;&nbsp;&nbsp;联系邮箱：</td>
                <td><?php echo form::input('guesttel',get('guestemail'));?>
                <span style="color:#FF0000"> *</span></td>
                <td width="100"></td>
              </tr>
  <tr>
                <td width="100">&nbsp;&nbsp;&nbsp;联系QQ：</td>
                <td><?php echo form::input('guesttel',get('guestqq'));?>
                <span style="color:#FF0000"> *</span></td>
                <td width="100"></td>
              </tr>
  <?php foreach($field as $f) { ?>
<?php
 $name=$f['name'];
 if($name==$primary_key) continue; ?>
<tr>
                <td>&nbsp;&nbsp;&nbsp;<?php echo lang($name);?>：</td>
                <td colspan="2"><?php echo form::getform($name,@$form,$field,@$data);?> </td>
              </tr>
 <?php } ?>

            
              <tr>
                <td>&nbsp;&nbsp;&nbsp;验证码：</td>
                <td colspan="2"><span style="float:left;"><?php echo verify();?></span><span style="float:left;padding-left:10px;"><input type='text' id="verify"  name="verify" size="10" /></span><span style="color:#FF0000;float:left;">*</span>&nbsp;&nbsp;&nbsp;</td>
              </tr>
  <tr>
                <td colspan="3" align="center">&nbsp;
                  </td>
              </tr>
              <tr>
                <td colspan="3" align="center"><input type="submit" name="submit" value="提交" style="float:right;padding:2px; background:none; border:0px none; background-color:#DDDDDD; color:#000000; width:70px;" />
                  </td>
              </tr>
            </table>
</form>
<div class="blank30"></div>
<?php if($user) { ?>

    <h5></h5>

<div style="border:1px solid #DBE2E6;margin:6px 0px 15px;background:#F7F7F7; text-align:center;color:#0F409C; font-weight:bold; font-size:14px;">留言列表</div>
    
    <table width="650" border="1" align="center" cellpadding="7" cellspacing="0" bordercolor="#EDEDED">

<?php foreach($data as $d) { ?>
<tr>
            <td scope="col" colspan="2"><strong><?php echo $d['username'];?></strong><span style="padding-left:20px;"><?php echo sdate($d['adddate'],'Y-m-d H:i');?></span>
            </td>
        </tr>
        <tr>
  <td style="width:80px;font-weight:bold;" align="center">留言内容</td>
            <td scope="col"><?php echo $d['content'];?></td>
</tr>
         <?php if($d['reply']) { ?><tr>
 <td align="center">管理员回复</td>
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

<div class="blank10"></div>
</div>
<div class="blank30"></div>
<a title="<?php echo lang(gotop);?>" href="#" class="clear floatright"><img alt="<?php echo lang(gotop);?>" src="<?php echo $skin_url;?>/images/gotop.gif"></a>
<div class="clear"></div>

</div>
<div class="clear"></div>
</div>
<?php echo template('footer.html'); ?>