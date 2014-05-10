<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<script type="text/javascript">
var swf_width=<?php echo get('slide_width');?>;
var swf_height=<?php echo get('slide_height');?>;
var config='<?php echo get(slide_time);?>|<?php echo get(slide_text_color);?>|<?php echo get(slide_text_bg);?>|<?php echo get(slide_btn_transparent);?>|<?php echo get(slide_btn_text_color);?>|<?php echo get(slide_btn_hover_color);?>|<?php echo get(slide_btn_color);?>'
//-- config 参数设置 -- 自动播放时间(秒)|文字颜色|文字背景色|文字背景透明度|按键数字颜色|当前按键颜色|普通按键色 --

switch(<?php echo get('slide_number');?>){/*幻灯片数量控制*/
case 1:
var files='<?php echo get(slide_pic1);?>';/*广告图片*/
    var links='<?php echo get(slide_pic1_url);?>';/*图片上的链接,注意链接中的&要用%26替换*/
    var texts='<?php echo get(slide_pic1_title);?>';/*图片标题*/
break
case 2:
var files='<?php echo get(slide_pic1);?>|<?php echo get(slide_pic2);?>';/*广告图片*/
var links='<?php echo get(slide_pic1_url);?>|<?php echo get(slide_pic2_url);?>';/*图片上的链接,注意链接中的&要用%26替换*/
var texts='<?php echo get(slide_pic1_title);?>|<?php echo get(slide_pic2_title);?>';/*图片标题*/
break
case 3:
var files='<?php echo get(slide_pic1);?>|<?php echo get(slide_pic2);?>|<?php echo get(slide_pic3);?>';/*广告图片*/
var links='<?php echo get(slide_pic1_url);?>|<?php echo get(slide_pic2_url);?>|<?php echo get(slide_pic3_url);?>';/*图片上的链接,注意链接中的&要用%26替换*/
var texts='<?php echo get(slide_pic1_title);?>|<?php echo get(slide_pic2_title);?>|<?php echo get(slide_pic3_title);?>';/*图片标题*/
break
    case 4:
var files='<?php echo get(slide_pic1);?>|<?php echo get(slide_pic2);?>|<?php echo get(slide_pic3);?>|<?php echo get(slide_pic4);?>';/*广告图片*/
var links='<?php echo get(slide_pic1_url);?>|<?php echo get(slide_pic2_url);?>|<?php echo get(slide_pic3_url);?>|<?php echo get(slide_pic4_url);?>';/*图片上的链接,注意链接中的&要用%26替换*/
var texts='<?php echo get(slide_pic1_title);?>|<?php echo get(slide_pic2_title);?>|<?php echo get(slide_pic3_title);?>|<?php echo get(slide_pic4_title);?>';/*图片标题*/
break
   default:
   var files='<?php echo get(slide_pic1);?>|<?php echo get(slide_pic2);?>|<?php echo get(slide_pic3);?>|<?php echo get(slide_pic4);?>|<?php echo get(slide_pic5);?>';/*广告图片*/
var links='<?php echo get(slide_pic1_url);?>|<?php echo get(slide_pic2_url);?>|<?php echo get(slide_pic3_url);?>|<?php echo get(slide_pic4_url);?>|<?php echo get(slide_pic5_url);?>';/*图片上的链接,注意链接中的&要用%26替换*/
var texts='<?php echo get(slide_pic1_title);?>|<?php echo get(slide_pic2_title);?>|<?php echo get(slide_pic3_title);?>|<?php echo get(slide_pic4_title);?>|<?php echo get(slide_pic5_title);?>';/*图片标题*/
}


document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ swf_width +'" height="'+ swf_height +'">');
document.write('<param name="movie" value="<?php echo $base_url;?>/images/slide/focus.swf" />');
document.write('<param name="quality" value="high" />');
document.write('<param name="menu" value="false" />');
document.write('<param name=wmode value="opaque" />');
document.write('<param name="FlashVars" value="config='+config+'&bcastr_flie='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'" />');
document.write('<embed src="<?php echo $base_url;?>/images/slide/focus.swf" wmode="opaque" FlashVars="config='+config+'&bcastr_flie='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'& menu="false" quality="high" width="'+ swf_width +'" height="'+ swf_height +'" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');
document.write('</object>');
</script>