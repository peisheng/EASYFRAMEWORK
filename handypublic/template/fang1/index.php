<?PHP
if (!defined('VERSON'))
{
	exit('Access Defined');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>$indextitle</title>
<meta name="keywords" content="$sitekey" />
<meta name="description" content="$sitedesc" />
<link rel="Shortcut Icon" href="$sitetitleurl/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=GBK">

<link href="css/eaea_all.css" rel="stylesheet" type="text/css" />
<link href="css/eaea_index.css" rel="stylesheet" type="text/css" />
<link href="css/css.css" rel="stylesheet" type="text/css" />
<!--{template headerjs}-->

<!-- 兼容其他浏览器收藏夹脚本 -->
<script src="js/yu.js" type="text/javascript"></script>
<script src="js/tb.js" type="text/javascript"></script>
</head>
<body>
<!--{template header}-->
<div class="index" id="list">
 
  <!--输出首页所有栏目--> 
  <!--{loop $indexs $indexkey $indexvalue}--> 
  <!--{if $indexvalue[typeid]==21}-->
  <!-- 整合频道 --> 
   <!--{if !$indexvalue[height]}--><!--{eval $indexvalue[height]=2000;}--><!--{/if}--> 
   <!--{eval $indexvalue[urltxt]=UpdateSystemVerible($indexvalue[urltxt]);}-->
  	<center><div style="width:100%; text-align:center; overflow:hidden; clear:both; margin-top:0px; margin-bottom:0px;"><div style="height:<!--{eval echo($indexvalue[height]+$indexvalue[hidentop]) }-->px; margin-top:-{$indexvalue[hidentop]}px;"><iframe frameborder="0" marginheight="0" marginwidth="0" border="0" id="alimamaifrm" name="alimamaifrm" scrolling="no" height="<!--{eval echo($indexvalue[height]+$indexvalue[hidentop]) }-->px" width="100%" src="$indexvalue[urltxt]" ></iframe></div></div></center>
  <div class="clear"></div>
  <!--{/if}--> 
  
  <!--{if $indexvalue[typeid]==6}--> 
  <!-- 文章栏目 --> 
    <!--{if $TaoConfig[DB_OPEN] }-->
      <!--{eval $NewsTypeList = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey);}-->
        <div style="padding-left:8px; width:950px; margin-left:auto; margin-right:auto">
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
        <div style="clear:both"></div>
      <!--{/if}--> 
<!--{/if}--> 
  
  
      <!--{if $indexvalue[typeid]==11}-->
            <div class="index_header">
            
            <!--左部开始-->
            <div class="index_header_left">
            <!--加载幻灯片-->
            <script type="text/javascript">
            var swf_width=600;
            var swf_height=300;
            </script>
            <div id="flash_cycle_image">
                <div id="MainPromotionBanner">
            
                    <div id="SlidePlayer">
            
                        <ul class="Slides"><!-- 这里图片高度582px 宽度280px -->
            
                            <!--{eval $PicArr = GetArrByValue($indexvalue);}--> 
                            <!--{loop $PicArr $k $v}-->
                            <li><a href="$v[url]" target="$v[target]" title="$v[typename]"><img src="$v[picurl]" height="348" alt="$v[typename]" style="position:static; z-index:-1" /></a></li>
                            <!--{/loop}-->
                      </ul>
            
                    </div>
            
                  <script type="text/javascript">
            
                          TB.widget.SimpleSlide.decoration('SlidePlayer', {eventType:'mouse', effect:'scroll'});
            
              </script>
            
                </div>
            
            </div>
            
            </div>
            <!--左部结束-->
            
            <!--右部开始-->
            <div class="index_header_right">
                <!--{eval $tuijianleibie = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey."_tuijian");}--> 
                <!--单品推荐-->
                <div class="today_goods">
                    <div class="today_goods_menu">
                        <ul>
                            <li class="hover" id="today_tree1"><?php echo $tuijianleibie[0]["typename"]?></li>
                            <li id="today_tree2"><?php echo $tuijianleibie[1]["typename"]?></li>
                            <li id="today_tree3"><?php echo $tuijianleibie[2]["typename"]?></li>
                            <li id="today_tree4"><?php echo $tuijianleibie[3]["typename"]?></li>
                         </ul>
                         <div class="today_goods_clear"></div>
                    </div>
                        
                    <div class="today_tree">
                        <div id="today_tree1_body">
                            <!--{if $tuijianleibie[0][typename] }-->
                            <!--{eval $dazhelists = GetArrByValue($tuijianleibie[0],array("page_size"=>"5"));}--> 
                            <!--{loop $dazhelists $k $v}-->
                            <div class="tree_body"><ul><li class="tree_body_class"><a href="$v[url]"  $v[rel] target="$v[target]">[{$tuijianleibie[0][typename]}]</a></li><li class="tree_body_name"><a href="$v[url]"  $v[rel] target="$v[target]" title="$v[title]">$v[title]</a></li><li class="tree_body_price">{$tuijianleibie[0][typename]}:<b>￥{$v[price]}</b></li></ul></div>
                            <!--{/loop}-->
                            <!--{/if}-->
                        </div>
                        <div id="today_tree2_body" style="display:none;">
                            <!--{if $tuijianleibie[1][typename] }-->
                            <!--{eval $dazhelists = GetArrByValue($tuijianleibie[1],array("page_size"=>"5"));}--> 
                            <!--{loop $dazhelists $k $v}-->
                            <div class="tree_body"><ul><li class="tree_body_class"><a href="$v[url]"  $v[rel] target="$v[target]">[{$tuijianleibie[1][typename]}]</a></li><li class="tree_body_name"><a href="$v[url]"  $v[rel] target="$v[target]" title="$v[title]">$v[title]</a></li><li class="tree_body_price">{$tuijianleibie[1][typename]}:<b>￥{$v[price]}</b></li></ul></div>
                            <!--{/loop}-->
                            <!--{/if}-->
                        </div>
                        <div id="today_tree3_body" style="display:none;">
                            <!--{if $tuijianleibie[2][typename] }-->
                            <!--{eval $dazhelists = GetArrByValue($tuijianleibie[2],array("page_size"=>"5"));}--> 
                            <!--{loop $dazhelists $k $v}-->
                            <div class="tree_body"><ul><li class="tree_body_class"><a href="$v[url]"  $v[rel] target="$v[target]">[{$tuijianleibie[2][typename]}]</a></li><li class="tree_body_name"><a href="$v[url]"  $v[rel] target="$v[target]" title="$v[title]">$v[title]</a></li><li class="tree_body_price">{$tuijianleibie[2][typename]}:<b>￥{$v[price]}</b></li></ul></div>
                            <!--{/loop}-->
                            <!--{/if}-->
                        </div>
                        <div id="today_tree4_body" style="display:none;">
                            <!--{if $tuijianleibie[3][typename] }-->
                            <!--{eval $dazhelists = GetArrByValue($tuijianleibie[3],array("page_size"=>"5"));}--> 
                            <!--{loop $dazhelists $k $v}-->
                            <div class="tree_body"><ul><li class="tree_body_class"><a href="$v[url]"  $v[rel] target="$v[target]">[{$tuijianleibie[3][typename]}]</a></li><li class="tree_body_name"><a href="$v[url]"  $v[rel] target="$v[target]" title="$v[title]">$v[title]</a></li><li class="tree_body_price">{$tuijianleibie[3][typename]}:<b>￥{$v[price]}</b></li></ul></div>
                            <!--{/loop}-->
                            <!--{/if}-->
                        </div>
                    </div>
               </div>
            
            <script type="text/javascript">
            var cycleList = ['today_tree1','today_tree2','today_tree3','today_tree4'];
            var tabFront = 'hover';
            var tabBack = '';
            
            function cycleShow(obj){
                var curObj;
                var curBody;
                for (i=0; i < cycleList.length; i++){
                    curObj = document.getElementById(cycleList[i]);
                    curBody = document.getElementById(cycleList[i] + '_body');
                    if (obj.id == curObj.id){
                        curObj.className = tabFront;
                        curBody.style.display = "";
                    }else{
                        curObj.className = tabBack;
                        curBody.style.display = "none";
                    }
                }
            }
            
                for (i=0; i< cycleList.length; i++){
                    document.getElementById(cycleList[i]).onmouseover = function(){
                        cycleShow(this);
                    };
                }
            </script>
            
            
                <!--品牌推荐-->
                <div class="brand_box">
                    <div class="brand_box_header"><img src="<?php echo $templateroot;?>/img/eaea/brand.gif" /></div>
                    <div class="brand_box_img">
                        <ul>
                <!--{eval $pinpai = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey."_pinpai");}--> 
                            <!--{loop $pinpai $k $v}-->
                    <li><a  href="$v[url]"  $v[rel] target="$v[target]" title="$v[typename]"><img src="$v[picurl]" width="95" height="66" /></a></li>
                            <!--{/loop}-->
    
                        
                        </ul>
                    </div>
                </div>
                <script type="text/javascript" src="<?php echo $templateroot;?>/img/eaea/js/goodslist.js"></script>
            
            
            </div>
            <!--右部结束-->
            
            </div>
      <!--{/if}-->
    
      <!--{if $indexvalue[typeid]==12}-->
        <div class="index_header">
        
        <!--左部开始-->
        <div class="index_header_left">
        
        <!--热门分类-->
        <div class="hot_class_area">
            <div class="hot_class">
            <div class="hot_class_head">
                <div class="hot_class_headl"><img src="<?php echo $templateroot;?>/img/eaea/hot_class.gif"></div>
                <div class="hot_class_headr"><a href="sitemap.php" target="_blank">查看所有分类 →</a></div>
            
            </div>
            
            
          <!--{eval $AllTypesArr = GetArrByValue($indexvalue);}--> 
                <div class="class_area">
          <!--{loop $AllTypesArr $k $v}-->
    
    
                    <div class="class_left l" onMouseOver="this.className='class_left l class_hover'" onMouseOut="this.className='class_left l'">
                        <div class="classname l"><a href="$v[url]" target="$v[target]" class="one3" style="color:{$v['color']}">$v[typename]</a></div>
                        <div class="content_area l"><p>
                        <!--{loop $v[SubDaohangArr] $k2 $v2}-->
                        <a href="$v2[url]" target="$v2[target]" class="one5" style="color:<!--{eval echo($v2['color']!=""?$v2['color']:"") }-->">$v2[typename]</a>|
                        <!--{/loop}--> 
                        
                        </p></div>
                    </div>
    
                    
    
              <!--{/loop}--> 
                </div><div class="class_line"></div>
    
        
            </div>
        </div>
        
        </div>
        <!--左部结束-->
        
        <!--右部开始-->
        <div class="index_header_right">
            <!--热门活动-->
            <div class="activity">
                <div class="activity_head"><img src="<?php echo $templateroot;?>/img/eaea/activity.gif"></div>
                <div class="cat_ads_slider"><dl>
                
                
                <!--{eval $pinpai = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey);}--> 
                            <!--{loop $pinpai $k $v}-->
                    
                <dt id=top1s<?php echo $k+1;?> onMouseOver="show_goodspic(<?php echo $k+1;?>,'top1')"><p><?php echo $v["typename"] ?></p></dt>
                <dd id=top1b<?php echo $k+1;?> style="display: none"><a  href="$v[url]"  $v[rel] target="$v[target]" title="$v[typename]"><img src="<?php echo $v["picurl"] ?>" width="335" height="120" title="<?php echo $arr["typename"] ?>" /></a></dd>
                
                            <!--{/loop}-->
                <script type=text/javascript>
        
        function myRandom(iStart,iLast){        
        
        var iLength = iLast-iStart+1;    
        
        var num = Math.floor(Math.random()*iLength+iStart);    
        
        num = num%5;
        
        return num+1;
        
        }    
        
        window.onload = show_goodspic(myRandom(100,5000),'top1');
        
        </script>
        
                
        
                
        
                </dl></div>
            </div>
        </div>
        <!--右部结束-->
        
        </div>
        
        
        
      <!--{/if}-->
      
  <!-- 自定义html --> 
  <!--{if $indexvalue[typeid]==13}-->
  <div class="index_goods" id="taozhekou-{$indexkey}" style="text-align:{$indexvalue[sort]};">
  <!--{eval echo strtr(stripslashes(html_entity_decode($indexvalue[contentHtml],ENT_QUOTES)),$TaoConfig["ad_verible"]);}-->
  </div>
  <div class="clear"></div>
  <!--{/if}--> 

  <!-- 商品栏目 --> 
  <!--{eval if ($indexvalue[typeid]==2 || $indexvalue[typeid]==3) { }-->
        <div class="index_goods">
            <!--左部-->
            <div class="goods_left">
                <!--头部-->
                <div class="goods_head">
                    <div class="goods_head_title">$indexvalue[typename]></div>
                    <div class="goods_head_hot">
                        <!--{eval $tuijianleibie = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey);}--> 
                        <!--{loop $tuijianleibie $k $v}--> 
                        <a href="$v[url]" target="$v[target]" style="color:$v[color]">$v[typename]</a> | 
                        <!--{/loop}--> 
                        <a href="$indexvalue[url]" target="$indexvalue[target]">更多>></a>
                    </div>
                </div>
                
        
                <div style="border:solid 1px #cfcfcf; padding:5px 0px 5px 10px; height:auto;">
      <!--{eval $taogoulists = GetArrByValue($indexvalue,array("page_size"=>"4"));}--> 
      <!--{loop $taogoulists $k $v}-->
                   <div style=" width:234px; height:322px; float:left;">
                    <a target="_blank" data-itemid="$v[tao_iid]" data-tmpl="230x312" data-style="2" data-rd="1" data-type="0">
                    	$v[title] <br />  ￥ $v[price]
                    </a>
                   </div>
        <!--{/loop}-->
        			<div style=" clear:both"></div> 
                </div>
                
            </div>
            
             <!--本块右部-->
            
        
        </div>  
  <!--{eval } }--> 
  <!-- 商品栏目 --> 
  <!--{eval if ( $indexvalue[typeid]==5 || $indexvalue[typeid]==10 || $indexvalue[typeid]==15) { }-->
        <div class="index_goods">
            <!--左部-->
            <div class="goods_left">
                <!--头部-->
                <div class="goods_head">
                    <div class="goods_head_title">$indexvalue[typename]></div>
                    <div class="goods_head_hot">
                        <!--{eval $tuijianleibie = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey);}--> 
                        <!--{loop $tuijianleibie $k $v}--> 
                        <a href="$v[url]" target="$v[target]" style="color:$v[color]">$v[typename]</a> | 
                        <!--{/loop}--> 
                        <a href="$indexvalue[url]" target="$indexvalue[target]">更多>></a>
                    </div>
                </div>
                
        
                <div class="goods_div">
      <!--{eval $taogoulists = GetArrByValue($indexvalue,array("page_size"=>"5"));}--> 
      <!--{loop $taogoulists $k $v}-->
                    <div class="goods_list">
                        <div class="goods_list_title">
                        <a href="$v[url]"  $v[rel] target="$v[target]">$v[title]</a>
                        </div>
                        <div class="goods_list_img" onMouseOver="this.className='goods_list_img_hover'" onMouseOut="this.className='goods_list_img'">
                        <a href="$v[url]"  $v[rel] target="$v[target]">
          <!--{eval setPic($v["pic_url"]."_160x160.jpg",160,160,strip_tags($v["title"])) }-->
          </a>
                        </div>
                    	<div class="goods_list_scprice"><img src="$rootroad/img/level/level_0.gif" align="absmiddle" alt="信誉度"></div>
                        
                        <div class="goods_list_price"><img src="img/eaea/list_ioc02.gif" />折扣价:￥<span style="color:#F00">$v[price]</span> 元</div>
                    </div>
        <!--{/loop}--> 
                </div>
                
            </div>
            
             <!--本块右部-->
            
        
        </div>  
  <!--{eval } }--> 
  <!--{eval if ($indexvalue[typeid]==4 || $indexvalue[typeid]==7) { }-->
        <div class="index_goods">
            <!--左部-->
            <div class="goods_left">
                <!--头部-->
                <div class="goods_head">
                    <div class="goods_head_title">$indexvalue[typename]></div>
                    <div class="goods_head_hot">
                        <!--{eval $tuijianleibie = GetAllDaohangLevelArr("IndexDaohangCustomer_".$indexkey);}--> 
                        <!--{loop $tuijianleibie $k $v}--> 
                        <a href="$v[url]" target="$v[target]" style="color:$v[color]">$v[typename]</a> | 
                        <!--{/loop}--> 
                        <a href="$indexvalue[url]" target="$indexvalue[target]">更多>></a>
                    </div>
                </div>
                
        
                <div style="border:solid 1px #cfcfcf; padding:5px 0px 5px 10px; height:auto;">
      <!--{eval $taogoulists = GetArrByValue($indexvalue,array("page_size"=>"4"));}--> 
      <!--{loop $taogoulists $k $v}-->
                   <div style=" width:234px; height:322px; float:left;">
                    <a target="_blank" data-itemid="$v[tao_iid]" data-tmpl="230x312" data-style="2" data-rd="1" data-type="0">
                    	$v[title] <br />  ￥ $v[price]
                    </a>
                   </div>
        <!--{/loop}-->
        			<div style=" clear:both"></div> 
                </div>
                
            </div>
            
             <!--本块右部-->
            
        
        </div>  
  <!--{eval } }--> 


      <script language="javascript">seturl_LazyLoad('list');</script>

  <!--{/loop}-->






</div>

<!--{template footer}--></body>
</html>