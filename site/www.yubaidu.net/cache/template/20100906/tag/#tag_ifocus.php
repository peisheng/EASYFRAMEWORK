<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div class="ifocus">
  <script type="text/javascript" src="js/myfocus-1.2.0.full.js"></script>
              <div id="myFocus-wrap">
    <div id="myFocus" style="visibility:hidden"><!--焦点图盒子-->
      <div class="loading"><span>请稍候...</span></div><!--载入画面-->
      <ul class="pic"><!--内容列表-->
       <?php for($i=1;$i<=config::get('ifocus_number');$i++): ?>
        <li><a href="<?php echo config::get('ifocus_pic'.$i.'_url');?>"><img src="<?php echo config::get('ifocus_pic'.$i);?>" thumb="" alt="<?php echo config::get('ifocus_pic'.$i.'_title');?>" text="<?php echo config::get('ifocus_pic'.$i.'_title');?>" /></a></li>
       <?php endfor; ?>
      </ul>
    </div>
    </div>
    <div class="clear"></div>
  </div>
<script type="text/javascript">
var mf=myFocus;
var html=mf.$('myFocus-wrap').innerHTML;
function getParam(){
return {
id:'myFocus',
pattern:"<?php echo config::get('ifocus_pattern');?>",
time:<?php echo config::get('ifocus_time');?>,
width:<?php echo config::get('ifocus_width');?>,
height:<?php echo config::get('ifocus_height');?>
};
}
function reHTML(){
mf.$('myFocus-wrap').innerHTML=html;
var css=mf.$$('style')[0];
css.parentNode.removeChild(css);
};

function displayParam(){
var s=mf.$('pattern');
var st=mf.pattern[s.value]['cfg'];
var ps=mf.$$('p','oth'),len=ps.length;
for(var i=0;i<len;i++) ps[i].style.display='';
if(st) for(var p in st) mf.$('p-'+p).style.display=mf.$('custom').style.display='inline';
}
function apply(){
reHTML();
var p=getParam();
p.waiting=false;
myFocus.set(p,true,function(){
displayParam();
});
}
myFocus.set(getParam(),true,function(){
displayParam();
});
</script>
