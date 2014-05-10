<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="bd">
    	<div class="bd_bg_left">
        	<div class="bd_bg_right">
            
            	<div id="bd_leftg">
                	<?php echo template('left.html'); ?>
                        

                </div>
                <div id="bd_rightg">
                	<div class="right_content">
                    	<?php echo template('position.html'); ?>
                        <div class="content">

                            <div class="content_content">
                            	<div class="pd_title"><?php echo $category[$catid]['catname'];?></div>
                       <div class="pd">

<!-- 内容 -->
<?php echo $category[$catid]['categorycontent'];?>

<div class="blank30"></div>

<?php echo template('ditu.html'); ?>



 <div class="blank30"></div>
<a title="<?php echo lang(gotop);?>" href="#" class="clear floatright"><img alt="<?php echo lang(gotop);?>" src="<?php echo $skin_url;?>/images/gotop.gif"></a>
<div class="clear"></div>
   </div>

                        </div>
               	  </div>
                </div>
                <div class="clear"></div>
                <div class="bd_bgb">
                    <div class="bd_bgb_left">
                    <div class="bd_bgb_right"></div>
                    </div>
                </div>
            </div>
        </div>
        
<div class="clear"></div>
    </div>


<script> 
function resizeImg(obj)
{ 
var obj = document.getElementById(obj); 
var objContent = obj.innerHTML;
var imgs = obj.getElementsByTagName('img'); 
if(imgs==null) return; 
for(var i=0; i<imgs.length; i++) 
{ 
if(imgs[i].width>parseInt(obj.style.width)) 
{ 
imgs[i].width = parseInt(obj.style.width);
} 
} 
} 
window.onload = function() {resizeImg('content');
} 
</script>
<?php echo template('footer.html'); ?>