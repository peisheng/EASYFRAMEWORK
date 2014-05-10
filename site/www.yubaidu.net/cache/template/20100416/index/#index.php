<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<!-- 滑动门s-->
<SCRIPT language=javascript type=text/javascript>
//<!CDATA[
function g(o){return document.getElementById(o);}
//参数说明:n为标签编号,m为标签数量,q为标签名称的前缀，如id=tb_1中的"tb_",p为内容层的前缀,如id=tbc_01的"tbc_0"
function HoverLi(n,m,q,p){
//m为标签数量 m=6
//q为前缀  q=tb_
//如果有N个标签,就将i<=N;
//兼容IE7,FF,IE6

for(var i=1;i<=m;i++)
{
g(q +i).className='normaltab';
g(p+i).className='undis';
}
g(p+n).className='dis';
g(q+n).className='hovertab';
}
//如果要做成点击后再转到请将<li>中的onmouseover 改成 onclick;
//]]>
</SCRIPT>
<!-- 滑动门end-->
  	<div id="bd">
    	<div id="bd_left">
<div class="left_box1" style="width:272px;height:200px;overflow:hidden;">
<?php echo template('system/slide.html'); ?>
</div>
<div class="left_box2"><div class="l_box2_l"><img src="<?php echo $skin_path;?>/jt_15.gif" /></div>

<form name='search' action="<?php echo url('archive/search');?>" onsubmit="search_check();" method="post">
<div class="l_box2_c"><input  id="search_text" name="keyword" type="text" align="absmiple" /></div>
<div class="l_box2_r"><input type="image" src="<?php echo $skin_path;?>/jt_16.gif" id="search_btn" align="absmiple" name='submit' value=" <?php echo lang(search);?> " /></div>

</form>

</div>
<div class="left_box3">
            	<div class="l_box3_title"><div class="l_box3_l"><img src="<?php echo $skin_path;?>/jt_17.gif" /></div>
            	<span class="hui12"><?php $t=position_p($typeid=5);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>
<?php?></span></div>
                <div class="l_box3_content">
                  <div class="tj2"><ul>
<?php echo ballot(1);?>
</ul></div>
                 
                </div>
            	</div>
        	</div>
<div id="bd_right">
<div class="r_left">
            	<div class="rl_box1">
                	<DIV class="w936">
                        <DIV class="tb_">
                        <UL class="ULn">
                          <LI id=tb_1 class="hovertab" 
                          onmouseover="x:HoverLi(1,3,'tb_','tbc_0');">公司新闻</LI>
                          <LI id=tb_2 class="normaltab" 
                          onmouseover="i:HoverLi(2,3,'tb_','tbc_0');">行业动态</LI>
                          <LI id=tb_3 class="normaltab" 
                          onmouseover="i:HoverLi(3,3,'tb_','tbc_0');">综合信息</LI>
                        </UL>
                        </DIV>
                        <DIV class="ctt">
                            <DIV id=tbc_01 class="dis">
                            <ul class="ul2">
                            <!-- <?php foreach(archive(2,0,0,'0,0,0',16,'aid',5,false,0) as $i => $archive) { ?>  -->
                            	<li><span class="date">[<?php echo $archive['adddate'];?>]</span><a href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></li>
                           <!-- <?php } ?> -->
                            </ul>
                            </DIV>
                            <DIV id="tbc_02" class="undis">
                            <ul class="ul2">
                            <!-- <?php foreach(archive(2,0,0,'0,0,0',16,'aid',5,false,0) as $i => $archive) { ?>  -->
                            	<li><span class="date">[<?php echo $archive['adddate'];?>]</span><a href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></li>
                           <!-- <?php } ?> -->
                            </ul>
                            </DIV>
                            <DIV id="tbc_03" class="undis">
                            <ul class="ul2">
                            <!-- <?php foreach(archive(2,0,0,'0,0,0',16,'aid',5,false,0) as $i => $archive) { ?>  -->
                            	<li><span class="date">[<?php echo $archive['adddate'];?>]</span><a href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></li>
                           <!-- <?php } ?> -->
                            </ul>
                            </DIV>
                        </DIV>
                     </DIV>
                </div>
                <div class="rl_box2">
                	<div class="rl_box2_title"><div class="rl_box2_titlel"><?php $t=position_p($typeid=3);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a></div><div class="more"><a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><img src="<?php echo $skin_path;?>/jt_14.gif" border="0" /></a><?php?></div>
                	</div>
                    <div class="rl_box2_content">
 <!-- <?php foreach(archive(3,0,0,'0,0,0',20,'aid',6,true,0) as $i => $archive) { ?>  -->
                    	<div class="prod_box">
                        <a href="<?php echo $archive['url'];?>"><img src="<?php echo $archive['sthumb'];?>" alt="<?php echo $archive['stitle'];?>" class="prod"/></a><br />
                        <a href="<?php echo $archive['url'];?>" class="prod_font"><?php echo $archive['title'];?></a>
                      </div>
 <!-- <?php } ?> -->
                  		
                       <div class="clear"></div>
                    </div>
                </div>
            </div>
<div class="r_right">
            	<div class="rr_box1">
                	<div class="rr_box1_title"><div class="rr_box1_titlel"><img src="<?php echo $skin_path;?>/jt_22.gif" /></div><div class="titpic"><img src="<?php echo $skin_path;?>/jt_24.gif" /></div><?php $t=position_p($typeid=1);?><div class="titlewd">
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>
</div><div class="more1"><a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>">MORE >></a></div><?php?>
                	</div>
                    <div class="box">
                   	  <div class="em">
                       	  <div class="p"><?php echo templatetag::tag('公司简介');?></div>
                      </div>
                    </div>
                    </div>
                <div class="rr_box2">
                	<div class="rr_box1_title"><div class="rr_box1_titlel"><img src="<?php echo $skin_path;?>/jt_22.gif" /></div><div class="titpic"><img src="<?php echo $skin_path;?>/jt_24.gif" /></div><?php $t=position_p($typeid=2);?><div class="titlewd">
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><?php echo $t['name'];?></a>
</div><div class="more1"><a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>">MORE >></a></div><?php?>
                	</div>
                    <div class="box">
                   	  <div class="em">
                       	  <ul class="ul2">
                            <!-- <?php foreach(archive(2,0,0,'0,0,0',16,'aid',6,false,0) as $i => $archive) { ?> -->
                            	<li><a href="<?php echo $archive['url'];?>"><?php echo $archive['title'];?></a></li>
                            <!-- <?php } ?> -->
                            </ul>
                      </div>
                    </div>
<div style="text-align:center;">
<div class="blank10"></div>
<a href="<?php echo url('guestbook');?>"><img src="<?php echo $skin_path;?>/yx_13.gif" /></a>
<div class="blank10"></div>

<?php $t=position_p($catid=2);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><img src="<?php echo $skin_path;?>/yx_14.gif" /></a><?php?>
<div class="blank10"></div>
<?php $t=position_p($catid=7);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>"><img src="<?php echo $skin_path;?>/yx_15.gif" /></a>
<?php?>
</div>
                </div>
                </div>
</div>
        </div>
<div class="clear"></div>   
<!--bd部结束-->
   <?php echo template('footer.html'); ?>