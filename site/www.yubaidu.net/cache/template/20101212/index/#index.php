<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="bd">

<div class="scoll_img">
<div class="box1">
            	<div class="title"><div class="lanwd"><?php echo templatetag::tag('首页产品中心栏目');?></div>
            	<div class="english">/ Products</div>
            	</div>
        <table width="760" height="154" border="0" cellPadding="0" cellSpacing="0">
          <tr>
            <td width="16" ><div class="GalleryPictureScrollerMoveLeft" title="Turn to left" onmouseover=r_left() onMouseDown="r_f_left()" onMouseUp="r_left()"></div></td>
            <td width="362"><div class="GalleryPictureScroller" id=demo>

                 <div id=demo1 style="FLOAT:left">
                  <table border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                      <tr>
<?php echo templatetag::tag('首页滚动图片');?>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <DIV id=demo2 style="FLOAT: left"></DIV>
              </div></td>
            <td width="22"><div class="GalleryPictureScrollerMoveRight" title="Turn to right"  onmouseover=r_right() onMouseDown="r_f_right()" onMouseUp="r_right()"></div></td>
          </tr>
               
          <script src="<?php echo $base_url;?>/js/contentscroller.js" type="text/javascript"></script>
        </table>
      </div>
</div>

 <div class="right_right">
        	<div class="box1" style="height:208px;">
            	<div class="title">
            	  <div class="lanwd"><?php echo templatetag::tag('首页联系我们栏目');?></div>
            	  <div class="english">/ CONTACT	US</div>
            	</div>
                <div class="content">
                	 <ul class="ul2g">
                      <li><?php echo lang(address);?>：<?php echo get(address);?></li>
<li><?php echo lang(tel);?>：<?php echo get(tel);?></li>
<li><?php echo lang(fax);?>：<?php echo get(fax);?></li> 

                        </ul>
<form name="listform" id="listform"  action="<?php echo url('archive/email');?>" method="post">
<input type="text" name="email" size="25" value="" style="display:none;"> <input type="submit" value=" " name="submit" class="mailbtn" />
</form>
<div class="blank10"></div>
                </div>


            
        
<div class="blank10"></div>
</div>


  <div class="clear"></div>
</div>
  <div class="blank10"></div>

    	<div id="bd_left">
        	<div class="box1">
            	<div class="title"><div class="lanwd"><?php echo templatetag::tag('首页企业新闻栏目');?></div>
            	<div class="english">/ NEWS</div>
            	</div>
                <div class="content">
<?php echo templatetag::tag('首页新闻图文1条');?>
<div class="news">
                        <ul class="ul2">
<?php echo templatetag::tag('首页新闻4条');?>
                        </ul>
                  </div><div class="clear"></div>
                    <div class="learn_more"><?php $t=position_p($catid=2);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><img src="<?php echo $skin_path;?>/sm_14.gif" style="padding-right:15px;" border="0" /></a></div>
<div class="blank10"></div>
              </div>
            </div>
        </div>
      <div id="bd_right">
      	<div class="right_left">

<div class="box1">
            	<div class="title">
            	  <div class="lanwd"><?php echo lang(producttype);?></div>
            	  <div class="english">/ Type</div>
            	</div>

<div id="i_type">
<?php echo templatetag::tag('首页全部分类');?>
<div class="clear"></div>
</div>
</div>

<div class="blank10"></div>

<div class="box1">
            	<div class="title">
            	  <div class="lanwd"><?php echo lang(contentspecial);?></div>
            	  <div class="english">/ Special</div>
            	</div>


<?php echo templatetag::tag('首页最新专题');?>

<div class="blank10"></div>
</div>
<div class="clear"></div>
        </div>

        <div class="right_right">

<div class="box1">
            	<div class="title">
            	  <div class="lanwd"><?php echo lang(vieworders);?></div>
            	  <div class="english">/ Order</div>
            	</div>
                <div class="content">
<div class="blank10"></div>
<input size="20"  id="oid"  class="oid" name="oid" type="text" align="absmiple" value=" <?php echo lang(orderid);?>… " onfocus="if(this.value==' <?php echo lang(orderid);?>… ') {this.value=''}" onblur="if(this.value=='') this.value=' <?php echo lang(orderid);?>… '"  />
<input type="submit" id="search_btn" align="absmiple" name='submit' value=" <?php echo lang(look);?> " onclick="javascript:window.location.href='<?php echo url('archive/orders');?>&oid='+document.getElementById('oid').value;" class="oidbtn" />

<div class="blank10"></div>
</div>
</div>
<div class="blank10"></div>
        	<div class="box1" style="height:212px;">
            	<div class="title">
            	  <div class="lanwd"><?php echo lang(vote);?></div>
            	  <div class="english">/ Vote</div>
            	</div>
                <div class="content" id="vote">
                	<ul class="ul2g">
<?php echo ballot(1);?>

                        </ul>
<div class="blank10"></div>
                </div>


            
        
<div class="blank10"></div>
</div>

</div>
      </div>

      <div class="clear"></div>
    </div>
    <!--bd部结束-->
<div class="blank10"></div>
<div  id="links">
<strong>热门关键词：</strong><?php echo gethotsearch(10);?>
<div class="blank10"></div>
<strong><?php echo lang(links);?>：</strong>
<?php foreach(friendlink('text',0,20) as $flink) { ?>
<?php echo $flink['link'];?>&nbsp;&nbsp;
<?php } ?>
<div class="blank10"></div>
<?php foreach(friendlink('image',0,20) as $flink) { ?>
<?php echo $flink['link'];?>&nbsp;&nbsp;
<?php } ?>
<div class="clear"></div>
</div>
<div class="blank10"></div>
<?php echo template('footer.html'); ?>