<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
 
   <div id="bd">
    	<div class="nav_center">
            <div class="navtitle" style="padding-left:15px;"><?php echo lang(siteannoun);?></div>
<?php foreach(announ(5) as $an) { ?>
<div class="navcontent"><a href="<?php echo $an['url'];?>" title="<?php echo $an['title'];?>">·	<?php echo $an['title'];?></a></div>
<?php } ?>
        </div>
        <div id="bd_box">
          <div id="bd_left">
          	<div class="bd_left_title">
            <div class="title"><?php $t=position_p($catid=1);?>
<a href="<?php echo $t['url'];?>"><?php echo $t['name'];?></a></div>
            <div class="more"> <a href="<?php echo $t['url'];?>">MORE...</a><?php?></div>
            </div>
            <div class="bg_left_img"><a href="<?php echo $t['url'];?>"><img src="<?php echo $skin_path;?>/hy_11.gif" border="0" /></a></div>
            <div class="bg_left_content">　　<?php echo templatetag::tag('公司简介');?></div>
          </div>

           <div class="scoll_img">
        <table width="610" height="154" border="0" cellPadding="0" cellSpacing="0">
          <tr>
            <td width="16" ><div class="GalleryPictureScrollerMoveLeft" title="Turn to left" onmouseover=r_left() onMouseDown="r_f_left()" onMouseUp="r_left()"></div></td>
            <td width="546"><div class="GalleryPictureScroller" id=demo>
                <div id=demo1 style="FLOAT:left">
                  <table border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                      <tr>
                        
                          <?php foreach(archive(3,0,0,'0,0,0',20,'aid',10,true,0) as $i => $archive) { ?>
<td class="GalleryPictureScrollerImageArea"><div class="GalleryPictureScrollerImage"><a href="<?php echo $archive['url'];?>"><img src="<?php echo $archive['sthumb'];?>" class="p$i" alt="<?php echo $archive['stitle'];?>" /></a></div>
                              <div class="GalleryPictureScrollerDetails"><a href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></div>
                            </td>
<?php } ?>

                        
                      </tr>
                    </tbody>
                  </table>
                </div>
                <DIV id=demo2 style="FLOAT: left"></DIV>
              </div></td>
            <td width="22"><div class="GalleryPictureScrollerMoveRight" title="Turn to right"  onmouseover=r_right() onMouseDown="r_f_right()" onMouseUp="r_right()"></div></td>
          </tr>
          <script src="<?php echo $skin_path;?>/contentscroller.js" type="text/javascript"></script>
        </table>
      </div>
      <div class="clear"></div>
    </div>
<style>
body{background: #FFFFFF url(<?php echo $skin_path;?>/hy_1.gif) repeat-x top;}
</style>
    <!--bd部结束-->
<?php echo template('footer.html'); ?>