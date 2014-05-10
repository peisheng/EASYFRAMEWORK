<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<table width="706" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td width="706" height="28" style="background:url(<?php echo $skin_path;?>/btbg.gif) repeat-x left bottom;"><table width="706" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="470" style="color:#999999" id="position"><a title="<?php echo get('sitename');?>" href="<?php echo $base_url;?>"><img src="<?php echo $skin_path;?>/arr4.gif" width="11" height="11" style="margin-right:6px;" align="absmiddle" /><?php echo get('sitename');?></a><a title="<?php echo get('sitename');?>" href="<?php echo $base_url;?>/"><?php echo get('sitename');?></a>
            	<?php
                if(front::get('case') == 'area'){
                ?>
                <?php echo area::getpositonhtml(get('province_id'),get('city_id'),get('section_id'),get('id'));?>
<?php
                }elseif(front::get('case') == 'announ'){
                ?>
<a title="<?php echo lang(siteannoun);?>" href="#"><?php echo lang(siteannoun);?></a>
<?php
                }elseif(front::get('case') == 'guestbook'){
                ?>
<a title="<?php echo lang('guestbook');?>" href="#"><?php echo lang('guestbook');?></a>
<?php
                }elseif(front::get('case') == 'comment'){
                ?>
<a title="<?php echo $t['name'];?>" href="<?php echo $t['url'];?>"><?php echo lang('commentlist');?></a>
                <?php
                }elseif(front::get('case') == 'type'){
                ?>
                <?php echo type::getpositionhtml($type['typeid']);?>
                <?php
                }elseif(front::get('case') == 'special'){
                ?>
                <a title="<?php echo $special['title'];?>" href="#"><?php echo $special['title'];?></a>
                <?php
                }elseif(front::get('case') == 'tag'){
                ?>
                <a title="<?php echo $tag;?>" href="#"><?php echo $tag;?></a>
<?php
                }elseif(front::get('case') == 'mailsubscription'){
                ?>
<a href="#" title="<?php echo lang(mailsubscription);?>"><?php echo lang(mailsubscription);?></a>
                <?php
                }else{
                ?>
            	<?php foreach(position($catid) as $t) { ?><a title="<?php echo $t['name'];?>" href="<?php echo $t['url'];?>"><?php echo $t['name'];?></a>
<?php } ?>
                <?php
                }
                ?></td>
                <td width="236" align="right" style="color:#CC0000"><img src="<?php echo $skin_path;?>/arr4.gif" width="11" height="11" style="margin-right:6px;" align="absmiddle" /><?php echo lang(nowposition);?></td>
              </tr>
            </table>