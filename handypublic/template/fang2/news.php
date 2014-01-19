


<style type="text/css">
<!--

/*首页论坛列表*/
.news {width: 306px;margin: 5px 5px 0 0;padding: 0 0 10px;float: left;}
.news-title {height:30px;background: url(<?php echo $rootroad;?>/img/wenzhang.jpg) repeat-x;color: #cd0000;font: bold 14px/26px arial;padding: 0 0 0 30px;}
.news-title span {display: block;float: left; line-height:30px;height: 30px;}
.news-title span.more {float:right;margin-right:10px;}
.news-title span.more a {font: normal 12px/26px arial;color: #FFFFFF;text-decoration: none;}
.news ul{width:304px;border:1px solid #e6c5c5; border-top:none; padding-top:10px;background: url(<?php echo $rootroad;?>/img/newsindex_bg.jpg) repeat-x top;}
.news ul li{background: url(<?php echo $rootroad;?>/img/news-item-icon.gif) no-repeat 5px 8px;padding: 0 0 0 15px;width:288px;height:20px;_height:18px; text-align:left; overflow:hidden; margin-bottom:4px;}
.news ul li a{color:#4a4a4a;display: block;float: left;width:230px;overflow:hidden; line-height:22px}
.news ul li span {display: block;float: right;color: #b5b5b5; margin-right:10px;}


-->
</style>

<?php 


foreach($newslist as $list) {

	$listnews = $list["artlist"];

	

	if(count($listnews) > 0) {

?>


<div class="news">              
<div class="news-title"><span><?php echo $list["typename"];?></span><span class="more"><a href="<?php echo $list["typedir"];?>">更多&raquo;</a></span></div>
<ul>
	<?php 
	$listnews = $list["artlist"];
	foreach($listnews as $onenews) { ?>
<li><a href="<?php echo $onenews["url"];?>" title="<?php echo $onenews["title"];?>" target="_blank"><?php echo $onenews["title"];?></a><span><?php echo date('m-d',$onenews["date"])?></span></li>
	<?php } ?>
</ul>
</div>

<?php } 

}

?>
