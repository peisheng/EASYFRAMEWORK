<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="bd">
    	<div class="bd_up">
        	<div class="bd_up_left">
            	<div class="input1">搜索：</div>
              <div class="input2"><input type="text" size="14" />
              </div>
                <div class="input3"><input name="" type="image" src="<?php echo $skin_path;?>/lan_18.gif" /></div>
            </div>
            <div class="bd_up_right">

<div id="announ">
<?php foreach(announ(5) as $an) { ?>
<p><a href="<?php echo $an['url'];?>" title="<?php echo $an['title'];?>"><?php echo $an['title'];?></a> [<?php echo $an['adddate'];?>]</p>
<?php } ?>
</div>
<script type="text/javascript"> 
//
var t=setInterval(myfunc,2000); 
var oBox=document.getElementById("announ"); 
function myfunc(){ 
var o=oBox.firstChild 
oBox.removeChild(o) 
oBox.appendChild(o) 
} 
oBox.onmouseover=function()
{
clearInterval(t)
} 
oBox.onmouseout=function()
{
t=setInterval(myfunc,2000)
} 
</script>
            </div>
        </div>
    	<div id="bd_left">
        	<div class="box">
            	<div class="title">
                	<div class="title_wd"><?php $t=position_p($catid=3);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>
<?php?></div>
                    <div class="title_wde">PRODUCT</div>
                    <div class="more"></div>
                </div>
                <div class="content">
                	<ul class="ul2">
                    <?php foreach(categories(3) as $t1) { ?>
<li><a href="<?php echo $t1['url'];?>" title="<?php echo $t1['catname'];?>"><?php echo $t1['catname'];?></a></li>
<?php } ?>
                    </ul>
                </div>
            </div>
            
            <div class="box1">
            	<div class="title1">
                	<div class="title1_wd"><?php $t=position_p($catid=5);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>
<?php?></div>
                    <div class="title1_wde">CONTENT US</div>
                    <div class="more"></div>
                </div>
                <div class="content">
                	<div class="p">
<ul>
<li><?php echo lang(address);?>：<?php echo get(address);?></li>
<li><?php echo lang(tel);?>：<?php echo get(tel);?></li>
<li><?php echo lang(fax);?>：<?php echo get(fax);?></li> 
<li><?php echo lang(email);?>：<?php echo get(email);?></li> 
</ul>
</div>
                </div>
            </div>
            
        </div>
      <div id="bd_right">
      	<div class="bd_right_left">
        	<div class="box">
            	<div class="title1">
                	<div class="title1_wd"><?php $t=position_p($catid=1);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>
<?php?></div>
                    <div class="title1_wde">ABOUT US</div>
                    <div class="more"><?php $t=position_p($catid=1);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><img src="<?php echo $skin_path;?>/lan_3.gif" /></a>
<?php?></div>
                </div>
                <div class="content">
               	  <div class="abouts">
                    <div class="pro_r"><div class="pro_l"><img src="<?php echo $skin_path;?>/lan_20.gif" /></div> 
                      <span class="chengwd"><strong><a href="<?php echo $base_url;?>/"><?php echo get(sitename);?></a></strong></span><?php echo templatetag::tag('公司简介');?><span class="chengwd"><?php $t=position_p($catid=3);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>">[<?php echo lang(more);?>]</a>
<?php?></span></div>
  </div>
<div class=" clear"></div>
                </div>
            </div>
        </div>
        <div class="bd_right_right">
        	<div class="box">
            	<div class="title1">
                	<div class="title1_wd"><?php $t=position_p($catid=2);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>
<?php?></div>
                    <div class="title1_wde">NEWS</div>
                    <div class="more"><?php $t=position_p($catid=2);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><img src="<?php echo $skin_path;?>/lan_3.gif" /></a>
<?php?></div>
                </div>
                <div class="content">
                	<ul class="ul2g">
                    <?php foreach(archive(2,0,0,'0,0,0',16,'aid',6,false,0) as $i => $archive) { ?> 
<li><a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><?php echo $archive['title'];?></a></li>
<?php } ?>
                    </ul>
                </div>
            </div>
        </div>
<div class="clear"></div>        
        <div class="box1">
            	<div class="title1">
                	<div class="title1_wd"><?php $t=position_p($catid=3);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>
<?php?></div>
                    <div class="title1_wde">PRODUCT SHOW</div>
                    <div class="more"><?php $t=position_p($catid=3);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><img src="<?php echo $skin_path;?>/lan_3.gif" /></a>
<?php?></div>
                </div>
                <div class="content">
                	
            
            <?php foreach(archive(3,0,0,'0,0,0',20,'aid',8,true,0) as $i => $archive) { ?>
<div class="prod_box">
                     <a href="<?php echo $archive['url'];?>" title="<?php echo $archive['stitle'];?>"><img src="<?php echo $archive['sthumb'];?>" alt="<?php echo $archive['stitle'];?>" class="prod" /></a><br />
                    <a href="<?php echo $archive['url'];?>" class="prod_font"><?php echo $archive['title'];?></a>
            </div>
 <?php } ?>
            
<div class="clear"></div>        
                </div>
            </div>
        
      </div>
      <div class="clear"></div>
    </div>
    <!--bd部结束-->
<?php echo template('footer.html'); ?>