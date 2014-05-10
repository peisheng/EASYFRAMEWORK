<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
   <div id="bd">
    	<div id="bd_left">
        	<div class="left_box1">
            	<div class="box1_title">
                <div class="box1_title_l"><img src="<?php echo $skin_path;?>/fdc_7.gif" /></div>
                <div class="box1_title_c"><span><img src="<?php echo $skin_path;?>/fdc_9.gif" /></span>　<?php echo get('sitename');?>　<span><img src="<?php echo $skin_path;?>/fdc_10.gif" /></span></div>
                </div>
                <div class="box1_content">
                	<div class="kj_pic"><a href="#"><img src="<?php echo $skin_path;?>/fdc_16.gif" border="0" /></a></div>
                  <div class="kj_pic"><a href="#"><img src="<?php echo $skin_path;?>/fdc_17.gif" border="0" /></a></div>
                  <div class="kj_pic"><a href="#"><img src="<?php echo $skin_path;?>/fdc_18.gif" border="0" /></a></div>
              </div>
            </div>
            
            <div class="left_box2">
           	  <div class="input_box">
  <form name='search' action="<?php echo url('archive/search');?>" onsubmit="search_check();" method="post">
 <div class="input_boxl">
  <input type="text"  name="keyword" class="sinput" value="请输入关键字！"  style="width:140px;height:18px;line-height:18px;border:1px solid #ccc;font-size:12px;padding-left:5px;color:#ccc;" />
              </div>
              <div class="input_img"><input  name='submit' type="image" src="<?php echo $skin_path;?>/fdc_12.gif" /></div>
  </form>
              </div>
              <div class="input_box2" style="margin-top:10px;">
          
                <div class="input_box22" style="margin-top:10px;">

</div>
              </div>
           	  
            </div>
        </div>
      <div id="bd_right">
      	<div class="right_l">
        <div class="right_1_box1">
                <DIV id="con">
                    <UL id="tags">
                      <LI class=selectTag><A onClick="selectTag('tagContent0',this)" href="javascript:void(0)">项目开发</A> </LI>
                      <LI><A onClick="selectTag('tagContent1',this)" href="javascript:void(0)">企业印象</A> </LI>
                      <LI><A onClick="selectTag('tagContent2',this)" href="javascript:void(0)">物业风采</A> </LI>
                    </UL>
                    <DIV id="tagContent">
                        <DIV class="tagContent selectTag" id="tagContent0">
                        	<div class="c_l"><img src="<?php echo $skin_path;?>/fdc_21.gif"  class="c_l_pic"/></div>
                            <div class="c_r">
                            	<div class="c_title"> <?php echo get('sitename');?></div>
                                <div class="c_p"><?php echo templatetag::tag('公司简介');?></div>
                            </div>
                        </DIV>
                        <DIV class="tagContent" id="tagContent1">
 <?php foreach(archive(3,0,0,'0,0,0',10,'aid',3,true,0) as $i => $archive) { ?>
 <div class="prod_box">
                            <a href="<?php echo $archive['url'];?>"><img src="<?php echo $archive['sthumb'];?>" alt="<?php echo $archive['stitle'];?>" onerror='this.src="<?php echo $base_url;?>/<?php echo config::get('onerror_pic');?>"' border="0" class="c_l_pic" /></a><br />
                            <a class="prod_font" href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a>
                          </div>
<?php } ?>
                        	
                        </DIV>
                        <DIV class="tagContent" id="tagContent2">
<div class="c_l"><img src="<?php echo $skin_path;?>/fdc_21g.gif"  class="c_l_pic"/></div>
                            <div class="c_r">
                            	<div class="c_title"> <?php echo get('sitename');?></div>
                                <div class="c_p">
<ul class="ul2">
<?php foreach(archive(2,0,0,'0,0,0',16,'aid',3,false,0) as $i => $archive) { ?> 
<li><span class="date">[<?php echo sdate($archive['adddate'],'Y-m');?>]</span><a href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></li>
<?php } ?>

            </ul>
</div>
                            </div>
                        </DIV>
</DIV>      
                </DIV>
</DIV>    
   		<div class="news">
        <div class="news_title"><div class="news_title_wd"><?php $t=position_p($typeid=2);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a></div><div class="more">
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><img src="<?php echo $skin_path;?>/fdc_15.gif" border="0" /></a></div></div>
        <div class="news_content">
            <ul class="ul2">
<?php foreach(archive(2,0,0,'0,0,0',16,'aid',3,false,0) as $i => $archive) { ?> 
<li><span class="date">[<?php echo sdate($archive['adddate'],'Y-m');?>]</span><a href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></li>
<?php } ?>

            </ul>
        </div>
    </div>
            </div>
        <div class="right_r">
            <div class="rr_title">热点<span style="font-size:14px">信息</span> <img src="<?php echo $skin_path;?>/hot.gif" /></div>
            <div class="rr_content">
<?php echo template('system/slide.html'); ?>
</div>
            </div>
        </div>
        
      <div class="clear"></div>
    </div>
    <!--bd部结束-->
   <?php echo template('footer.html'); ?>