<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="bd">
<div id="bd_left">
    	<div class="bd_left1">
            <div class="title1"><div class="title1_t"><?php $t=position_p($catid=3);?>
<a href="<?php echo $t['url'];?>"><?php echo $t['name'];?></a></div></div>
                <ul class="ul2" style="height:190px;overflow:auto;">
<?php foreach(categories(3) as $t1) { ?>
<li><a href="<?php echo $t1['url'];?>" title="<?php echo $t1['catname'];?>"><?php echo $t1['catname'];?></a></li>
<?php } ?>
                </ul>
        </div>
        
        <div id="bd_left2">
            <div class="title2"><div class="title1_ts">站内搜索</div></div>
              <div style="height:10px;"> </div>

            <form name='search' action="<?php echo url('archive/search');?>" onsubmit="search_check();" method="post">		
<table width="160" border="0" cellspacing="0" cellpadding="0" align="right" style="margin-right:20px;">
          <tr>
            <td height="10"> </td>
          </tr>
          <tr>
            <td><input  type="text"  id="inputsearch" name="keyword" size="28" height="30" /></td>
          </tr>

  <tr>
              <td height="10"> </td>
            </tr>
 <tr>
              <td align="right">
<input  name="submit" type="image" src="<?php echo $skin_path;?>/five_16.gif" />
</td>
            </tr>
        </table>
</form>

              <div style="height:10px;"> </div>
      </div>
    
    </div>
    
    
    
    <div id="bd_right">
   	  <div id="bd_right_L">
        <div class="bd_right_L_1">
          <div class="bd_right_L_1f"><a href="#"><img src="<?php echo $skin_path;?>/five_11.gif" width="517" height="35" border="0" /></a></div>
            <div class="p1"><img src="<?php echo $skin_path;?>/five_2.jpg"/>　　<strong><?php echo get(sitename);?></strong><?php echo templatetag::tag('公司简介');?></div>
        </div>
      </div>
      
      <div id="bd_right_R">
          <div class="bd_right_R_1">
              <div class="bd_right_R_1_t"><?php $t=position_p($catid=2);?>
<a href="<?php echo $t['url'];?>"><?php echo $t['name'];?></a></div>
              <div class="bd_right_R_1_tm"><a href="<?php echo $t['url'];?>">+MORE</a></div>
          </div>
          <ul class="ul2g">
                    <!-- <?php foreach(archive(2,0,0,'0,0,0',16,'aid',7,false,0) as $i => $archive) { ?>  -->
<li><a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>">· <?php echo $archive['title'];?></a></li>
<!-- <?php } ?> -->
                </ul>
      </div>
      
      <div id="bd_right_Ls">
        <div class="bd_right_L_1s">
       	  <div class="bd_right_L_1sf"><a href="product.html"><img src="<?php echo $skin_path;?>/five_12.gif" width="517" height="35" border="0" /></a></div>

  <!-- <?php foreach(archive(3,0,0,'0,0,0',8,'aid',3,true,0) as $i => $archive) { ?> -->
<div class="pro">
          	<div class="pro_pic"><div class="pro_pics"><a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><img src="<?php echo $archive['sthumb'];?>" width="120" height="80" border="0"/></a></a></div>
          	</div>
            <div class="pro_font"><a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><?php echo $archive['title'];?></a></div>
          </div>
<!-- <?php } ?> -->
          
          
        </div>
      </div>
      
      <div id="bd_right_Rs">
        <div class="bd_right_R_1s">
          <div class="title1_ts"><?php echo lang(contactus);?></div>
              <div class="p_contact"><?php echo lang(address);?>：<?php echo get(address);?>
                <br />
                <?php echo lang(tel);?>：<?php echo get(tel);?>
                <br />
                <?php echo lang(fax);?>：<?php echo get(fax);?>
                <br />
                <?php echo lang(email);?>：<?php echo get(email);?>
                </div>
        </div>
      </div>
    </div>
<?php echo template('footer.html'); ?>