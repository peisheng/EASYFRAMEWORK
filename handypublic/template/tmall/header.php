<!--{ad/top}-->

<div class="m4go-t1">
<div class="top">

	<div class="topl">
		<a onClick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo $sitetitleurl ?>');" href="#">设为首页</a>
		<a href="javascript:window.external.addFavorite('<?php echo $sitetitleurl ?>','<?php echo $sitetitle ?>');">收藏本站</a>
		<a href="/sitemap.php">站点地图</a>
	</div>
    
	<div class="topr">


	<?php

if(is_array($topdaohangarray) && Count($topdaohangarray)>0){
	for($i=0;$i<Count($topdaohangarray);$i++){
?>
    <a href="$topdaohangarray[$i][url]" target="$topdaohangarray[$i][target]" style="color:$topdaohangarray[$i][color]"><?php echo $topdaohangarray[$i][0]?></a><?php if($i<Count($topdaohangarray)-1) echo(" | ");?>
<?php
	}
}
?>
</div>
</div>
</div>







<div class="m4go-t2">
<div class="toplogo">
<!-- LOGO站标 -->
	<div class="toplogol"><a href="<?php echo $rootroad ?>/"><img src="<?php echo $logo?>" alt="<?php echo $sitetitle ?>" /></a>
	</div>
<!-- 站内搜索 -->
	<div class="toplogor">
<div class="search" style="overflow:hidden;">
<form action="<?php echo $rootroad;?>/search.php" method="get" name="searchlist" id="searchlist"<?php if($win_search=="1") echo(" target=_blank"); ?>>
        <input type="text" name="qserach" id="qserach" value="" onfocus="this.value=''">
         
        <INPUT class="seitem" type="submit" value="搜商品" onclick="return tosearch(2)">
        <INPUT class="seitem" type="submit" name="searchshop" value="搜拍拍" onclick="return tosearch(3)">
        <INPUT class="seitem" type="submit" name="searchbuyer" value="搜站内" onclick="return tosearch(1)">


              <script language="javascript">
    
                function tosearch(type){
    
                    if(document.getElementById("qserach").value==""){
    
                            return false;
    
                    }
    
                    if(type==2){
    
                        document.getElementById("qserach").name = "taokeyword";
    
                        document.getElementById("searchlist").submit();
    
                    }	
                    if(type==1){
    
                        document.getElementById("qserach").name = "sharekeyword";
    
                        document.getElementById("searchlist").submit();
    
                    }	
    
                    if(type==3){
    
                        document.getElementById("qserach").name = "paikeyword";
    
                        document.getElementById("searchlist").submit();
    
                    }	
    
                    return false;
    
                }
    
                
    
              </script>

</form>
</div>
	</div>
</div>
</div><!--end ak92-t2-->
<!-- menu -->
<div class="m4go-t3">
<div style="clear: both;height:1px;margin-top:-1px; overflow:hidden;"></div>
<div class="menu" >
<ul>
<li><a href="<?php echo $rootroad ?>/"<?php if($win_daohang=="1") echo(" target=_blank"); ?>>首页</a></li>
<?php

if(is_array($arrays) && Count($arrays)>0){
	for($i=0;$i<Count($arrays);$i++){
?>
    <li><a href="$arrays[$i][url]" target="$arrays[$i][target]" style="color:$arrays[$i][color]"><?php echo $arrays[$i][0]?></a></li>
<?php
	}
}
?>
</ul>
</div>
</div><!-- end ak92-t3-->

<!--{template menu}-->
<div style="width:950px; overflow:hidden; margin:0 auto;">
<!--{ad/tonglan}-->
</div>