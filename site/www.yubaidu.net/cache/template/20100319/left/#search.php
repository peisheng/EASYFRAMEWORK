<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div id="bd_left2">
        		<div class="bd_left_title"><div class="title_img"><img src="<?php echo $skin_path;?>/tz_10.gif" /></div>
                	<div class="title1">快速查找</div>
                    </div>
        		<div class="box">
                	<div class="em">
                   	  <div class="newsli2">
  <div class="blank20"></div>
  <div style="padding-left:18px;">
                       <form name='search' action="<?php echo url('archive/search');?>" onsubmit="search_check();" method="post">
<input  id="inputsearch" name="keyword" type="text" align="absmiple" />  
<input type="submit" class="s_btn" align="absmiple" name='submit' value=" " />
</form>
</div>
<div class="blank20"></div>
                      </div>
                        <div class="clear"></div>
                  </div>
  <div class="clear"></div>
  <div class="b"></div>
          </div>    
    