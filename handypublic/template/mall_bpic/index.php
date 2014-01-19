<?PHP
if (!defined('VERSON'))
{
	exit('Access Defined');
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="GBK" />
<!--{template headerjs}-->
<title><?php echo $indextitle ?></title>
<meta name="keywords" content="<?php echo $sitekey ?>" />
<meta name="description" content="<?php echo $sitedesc ?>" />
<link rel="Shortcut Icon" href="<?php echo $sitetitleurl;?>/favicon.ico">
<link rel="Bookmark" href="<?php echo $sitetitleurl;?>/favicon.ico">
<link rel="stylesheet" href="images/style.css" />
<link rel="stylesheet" href="images/index.css" />

<link href="images/css.css" rel="stylesheet" type="text/css" />
<script src="images/yu.js" type="text/javascript"></script>
<script src="images/tb.js" type="text/javascript"></script>
<style type="text/css">

#apDiv1 {

	position:absolute;
	left:180px;
	width:189px;
	height:234px;
	z-index:9999;
	top:36px;
	color:#666;
}

#apDiv1 a {
	color:#666;
	float:left;
	width:80px;
}
.showtypelist{
	border:solid #C10202 4px;
	background-color:#FFF;
	color:#333;
	width:235px;
	min-height:120px;
	height:auto;
	_height:120px;

	display:none;}
</style>
</head>
<body>
<!--{template header}-->
                    <?php 
                    function echolistshow($array,$name,$id){
                        if(is_array($array[$name])){
                    ?>
                      <div class="showtypelist" id="stypelist<?php echo $id;?>">            
                      <?php foreach($array[$name]["SubDaohangArr"] as $val){ ?>
                      <a href="<?php echo $val[url];?>"  target="<?php echo $val["target"];?>" style="color:<?php echo $val["color"];?>"><?php echo $val[typename];?></a>
                      <?php }?>
                          <div style="clear:both"></div>
                      </div>
                     <?php
                     }
                     }
                     ?>
                        <?php
                    function echolist($array,$name,$id){			
                        if(is_array($array[$name])){			
                        ?>
                                <li onMouseOver="M_show(<?php echo $id;?>);"  class="bigclass"><a href="<?php echo $array[$name]["url"]?>"  target="<?php echo $array[$name]["target"];?>" style="color:<?php echo $array[$name]["color"];?>"><?php echo $array[$name][typename];?></a></li>
                                <?php
                         }
                     }
                ?>
  <!--输出首页所有栏目--> 
  <!--{loop $indexs $indexkey $indexvalue}--> 
  
  <!--{if $indexvalue[typeid]==21}-->
  <!-- 整合频道 --> 
   <!--{if !$indexvalue[height]}--><!--{eval $indexvalue[height]=2000;}--><!--{/if}--> 
   <!--{eval $indexvalue[urltxt]=UpdateSystemVerible($indexvalue[urltxt]);}-->
  	<center><div style="width:100%; text-align:center; overflow:hidden; clear:both; margin-top:0px; margin-bottom:0px;"><div style="height:<!--{eval echo($indexvalue[height]+$indexvalue[hidentop]) }-->px; margin-top:-{$indexvalue[hidentop]}px;"><iframe frameborder="0" marginheight="0" marginwidth="0" border="0" id="alimamaifrm" name="alimamaifrm" scrolling="no" height="<!--{eval echo($indexvalue[height]+$indexvalue[hidentop]) }-->px" width="100%" src="$indexvalue[urltxt]" ></iframe></div></div></center>
  <div class="clear"></div>
  <!--{/if}--> 
      <!--{if $indexvalue[typeid]==11}-->


        <div class="a_b" id="index{$indexkey}">
        <div class="f3_l bgC10202 pd6" >
        <div id="menuparent" >
                <dl class="bimg">
                    <dt style="position:relative; z-index:1;	"><a href="#"><strong>全部商品分类</strong></a>
        
                    <div id="apDiv1">
                        <?php  
						$arraykeywords = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey);
						
						$left_num_keyword = count($arraykeywords);
                        for($i = 1;$i<=$left_num_keyword;$i++){
                            echolistshow($arraykeywords,$i-1,$i);
                        }
                        
                         ?>
                        <div class="showtypelist" id="stypelist<?php echo $left_num_keyword+1;?>" style="width:300px; left:-180px; position:relative; top:123px; height:180px; overflow:hidden;">
                        <!--{if $CustomSetFieldValue[IndesShowChongzhi]!="close" }-->
                        <iframe id="long_li_1" class="ew-frame" style="height:	196px; width:300px; border:0; margin:0; padding:0;" frameborder="0" scrolling="no" name="mobileAutoForm" src="http://www.taobao.com/go/app/tbk_app/chongzhi_300_170.php?pid=<?php echo $userpid?>&size_w=300&size_h=180&stru_phone=1&stru_game=1&stru_travel=1&size_cat=cst"></iframe>
            
                              <div style="clear:both"></div>
            			<!--{/if}-->
                          </div>
                        </div>
                  </dt>
                <script language="javascript">
        
                    function M_show(id){
                        for(var i=1;i<=<?php echo $left_num_keyword+1;?>;i++){
                        document.getElementById("stypelist"+i).style.display = "none";	
                        }
                        document.getElementById("stypelist"+id).style.display = "block";	
                    }
                        var h=document.getElementById('menuparent');
                        h.onmouseout=function(e) {
                            var e = e || window.event, relatedTarget = e.toElement || e.relatedTarget;
                            while(relatedTarget && relatedTarget != this)
                                relatedTarget = relatedTarget.parentNode;
                                
                                
                                
                            if(!relatedTarget)
                                {
                                    if(relatedTarget + 100 == 100){
                                    for(var i=1;i<=<?php echo $left_num_keyword+1;?>;i++){
                                        
                                    document.getElementById("stypelist"+i).style.display = "none";	
                                    }
                                    }
                                }
                        }
                    window.onload = function(){
                    }
                </script>
        
                    <dd><ul>
                    
                
                <?php	 
                        for($i = 1;$i<=$left_num_keyword;$i++){
                            echolist($arraykeywords,$i-1,$i);
                        }
        
                 ?> 
        
            </ul></dd></dl>
        </div>	
                         <!--{if $CustomSetFieldValue[IndesShowChongzhi]!="close" }-->
        <!--充值 -->
       
        <div class="hotSpots">
                <ul onMouseOver="M_show(<?php echo $left_num_keyword+1;?>);"  class="hotSpotsNav" id="hosSpotsNav" style="height:125px;">
                    <li class="panelHandlerOn" id="panelHandler1">
                            <img src="images/chongzhi.jpg" alt="充值">
                    </li>
            
                </ul>
        
        </div>
        <!--充植end -->
              			<!--{/if}-->
          
            
        
        </div>
        
            <div class="f3_c h292 bgD8D8D8">
        
            <div id="MainPromotionBanner">
        
                <div id="SlidePlayer">
        
                    <ul class="Slides"><!-- 这里图片高度582px 宽度280px -->
        
             
        
                                    <!--{eval $PicArr = GetArrByValue($indexvalue);}--> 
                                    <!--{loop $PicArr $k $v}-->
                                    <li><a href="$v[url]" target="$v[target]" title="$v[typename]"><img down=ok src="$v[picurl]" height="348" alt="$v[typename]" title="$v[typename]" /></a></li>
                                    <!--{/loop}-->
                        
        
                        
        
                        
        
                        
        
                  </ul>
        
                </div>
        
              <script type="text/javascript">
        
                      TB.widget.SimpleSlide.decoration('SlidePlayer', {eventType:'mouse', effect:'scroll'});
        
          </script>
        
            </div>
        
            </div>
        
            <div class="f3_r">
        
                <dl class="gg">
        
                    <dt><a href="#">网站公告</a></dt>
        
                    <dd><marquee id="affiche" align="left" behavior="scroll" direction="up" height="150" width="185"  loop="-1" scrollamount="3" scrolldelay="100" onMouseOut="this.start()" onMouseOver="this.stop()">
        $CustomSetFieldValue[GongGao]
        </marquee>
        </dd>
        
                </dl>
        
                <div class="box"><!--{ad/gonggaodown}--></div>
        
            </div>
        
        </div>
      <script language="javascript">seturl_LazyLoad('index{$indexkey}');</script>
        <div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>
      <!--{/if}-->
      <!--{if $indexvalue[typeid]==12}-->

        <div class="a_b" id="index{$indexkey}">
        
            <div class="f3_l bgC10202">
        
      <!--{eval 
           $ShopTjarg = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey."_left");
           if(empty($indexvalue[leftnum])) $indexvalue[leftnum]=6;
           
           $ShopTjArr = GetArrByValue($ShopTjarg[0],array("page_size"=>$indexvalue[leftnum]));   
            }-->
                <div class="titr"><a href="$ShopTjarg[0][url]"><strong>$ShopTjarg[0][typename]</strong></a></div>
        
                <div class="b_bo">
        
                    <ul class="bbo">
 
 
        <!--{loop $ShopTjArr $k $v}-->
        
        <li>
            <a href="$v[url]"  $v[rel] target="$v[target]">
            <!--{eval setPic($v["pic_url"]."_80x80.jpg",50,50,strip_tags($v["title"])) }-->
            </a>
            <span>
            <em><a style="TEXT-DECORATION: none" href="$v[url]"  $v[rel] target="$v[target]">$v[title]</a></em>
            <strong>&yen;$v[price]元</strong>
            </span>

        </li>
        <!--{/loop}--> 

                        
        
                        
        
                    </ul>
        
                </div>
        
            </div>
        
            <div class="f3_2c">
        
                <div class="tit"><strong>推荐品牌</strong></div>
        
                <div class="tdai">
        
                
        
          <!--{eval $AllTypesArr = GetArrByValue($indexvalue);}--> 
        
          <!--{loop $AllTypesArr $k $v}-->
                    <dl class="lid">
        
                        <dt><a href="$v[url]" target="$v[target]" class="one3" style="color:{$v['color']}; font:bold;">$v[typename]</a></dt>
        
                        <dd>
                            <!--{loop $v[SubDaohangArr] $k2 $v2}-->        
                              <a href="$v2[url]" target="$v2[target]" class="one5" style="color:<!--{eval echo($v2['color']!=""?$v2['color']:"") }-->">$v2[typename]</a>
                            <!--{/loop}--> 
                        </dd>
        
                    </dl>
        
              <!--{/loop}--> 
        
                </div>
        
                <div class="t3li"></div>
        
            </div>
        
            <div class="f3_r salebg">
        
                <div class="timg"><img src="images/sale_t.gif" alt="占位符"></div>
        
                <div class="nro">
        
      <!--{eval 
           $ShopTjarg = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey."_right");
           if(empty($indexvalue[rightnum])) $indexvalue[rightnum]=11;
           
           $ShopTjArr = GetArrByValue($ShopTjarg[0],array("page_size"=>$indexvalue[rightnum]));   
            }-->
        <!--{loop $ShopTjArr $k $v}-->
                <dl class="neo">
                    <dt><a style="TEXT-DECORATION: none" href="$v[url]"  $v[rel] target="$v[target]">$v[title]</a></dt>
                </dl>
        <!--{/loop}--> 
        
                </div>
        
                <div class="btimg"><!--{ad/tuijiandown}--></div>
        
            </div>
        
        </div>
      <script language="javascript">seturl_LazyLoad('index{$indexkey}');</script>

        <div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>
      <!--{/if}-->

  <!--{if $indexvalue[typeid]==13}-->
  <!-- 自定义html --> 
  <div class="a_b" id="taozhekou-{$indexkey}" style="text-align:{$indexvalue[sort]};">
  <!--{eval echo strtr(stripslashes(html_entity_decode($indexvalue[contentHtml],ENT_QUOTES)),$TaoConfig["ad_verible"]);}-->
  </div>
  <div class="clear"></div>
  <!--{/if}--> 

  <!-- 商品栏目 --> 
  <!--{eval if ($indexvalue[typeid]==5 || $indexvalue[typeid]==10 || $indexvalue[typeid]==15) { }-->
        
    <div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>
    <div class="a_b" id="index{$indexkey}">
        <dl class="tt">
            <dt class="spantitle"><span class=spantt1>$indexvalue[typename]</span></dt>
            <dd>            <!--{eval $tuijianleibie = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey);}--> 
                            <!--{loop $tuijianleibie $k $v}--> 
                            <a href="$v[url]" target="$v[target]" style="color:$v[color]">$v[typename]</a> 　<span class=line>|</span> 
                            <!--{/loop}--> 
                            <a class=more href="$indexvalue[url]" target="$indexvalue[target]">更多>></a>
            </dd>
        </dl>	
        <dl class="nr">
           <dd>
               <ul>
          <!--{eval $taogoulists = GetArrByValue($indexvalue,array("page_size"=>"8"));}--> 
          <!--{loop $taogoulists $k $v}-->
                           <li>
                               <span class="imgs"><a href="$v[url]"  $v[rel] target="$v[target]">
              <!--{eval setPic($v["pic_url"]."_220x220.jpg",220,220,strip_tags($v["title"])) }-->
              </a></span>
    
                               <span class="txt"><a href="$v[url]"  $v[rel] target="$v[target]">$v[title]</a></span>
    
     <span class="jia"><u>￥<?php echo ($v["price"]*$CustomSetFieldValue[ProShiChang]);?></u>&nbsp;&nbsp;<em>￥$v[price]</em></span><span class="jia"></span>
                           </li>
            <!--{/loop}--> 
               </ul>
           </dd>
        </dl>
      <script language="javascript">seturl_LazyLoad('index{$indexkey}');</script>
    </div>    
        
        
  <!--{eval } }--> 
  <!--{eval if ($indexvalue[typeid]==2 || $indexvalue[typeid]==3 || $indexvalue[typeid]==4 || $indexvalue[typeid]==7) { }-->
        
    <div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>
    <div class="a_b" id="index{$indexkey}">
        <dl class="tt">
            <dt class="spantitle"><span class=spantt1>$indexvalue[typename]</span></dt>
            <dd>            <!--{eval $tuijianleibie = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey);}--> 
                            <!--{loop $tuijianleibie $k $v}--> 
                            <a href="$v[url]" target="$v[target]" style="color:$v[color]">$v[typename]</a> 　<span class=line>|</span> 
                            <!--{/loop}--> 
                            <a class=more href="$indexvalue[url]" target="$indexvalue[target]">更多>></a>
            </dd>
        </dl>	
        <dl class="nr">
           <dd>
               <ul>
          <!--{eval $taogoulists = GetArrByValue($indexvalue,array("page_size"=>"8"));}--> 
          <!--{loop $taogoulists $k $v}-->
               <li>
                   <div style=" width:234px; height:322px; float:left;">
                    <a target="_blank" data-itemid="$v[tao_iid]" data-tmpl="230x312" data-style="2" data-rd="1" data-type="0">
                    	$v[title] <br />  ￥ $v[price]
                    </a>
                   </div>
               </li>
            <!--{/loop}--> 
               </ul>
           </dd>
        </dl>
      <script language="javascript">seturl_LazyLoad('index{$indexkey}');</script>
    </div>    
  <!--{eval } }--> 

  <!--{if $indexvalue[typeid]==6}--> 
  <!-- 文章栏目 --> 
    <!--{if $TaoConfig[DB_OPEN] }-->
      <!--{eval $NewsTypeList = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey);}-->
         <div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>
       <div class="a_b" style="width:1000px;">
      <!--{loop $NewsTypeList $k $v}--> 
            <div class="news">              
            <div class="news-title"><span>$v[typename]</span><span class="more"><a href="$v[url]" target="$v[target]">更多&raquo;</a></span></div>
            <ul>
                  <!--{eval $NewsArr = GetArrArticle($v[vcate_id],$indexvalue[pronum],1,0,0,"add_time");}--> 
                  <!--{loop $NewsArr $knew $vnew}-->
            <li><a href="$vnew[url]" target="$v[target]">{$vnew[title]}</a><span><!--{eval echo date('m-d',strtotime($vnew['add_time']))}--></span></li>
                  <!--{/loop}--> 
            </ul>
            </div>      
                  <!--{/loop}--> 
        </div>
      <!--{/if}--> 
<!--{/if}--> 


  <!--{/loop}-->

<div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>
<div class="a_b" style="width:1000px;">
<?php
	include($WEBROOT_TEMP."news.php");
?>
</div>


<!--{template teyue}-->

<!--{template link}-->
<div class="clear pd8"><img src="images/s.gif" alt="分割线" /></div>
<!--{template footer}-->
</body>

</html>

