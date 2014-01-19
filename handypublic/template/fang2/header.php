 
<!--{eval if(!defined('VERSON')) exit('Access Denied'); }-->
<!--{if (false)}--><!--设计用，用于dweamweaver识别-->
<link href="css/taodi_bhtbwcom.css" rel="stylesheet" type="text/css" />
<!--{/if}-->

<div class="t1">
<div class="tr">

<?php if(is_array($topdaohangarray) && Count($topdaohangarray)>0){

	for($i=0;$i<Count($topdaohangarray);$i++){

?>

    <a href="$topdaohangarray[$i][url]" target="$topdaohangarray[$i][target]" style="color:$topdaohangarray[$i][color]"><?php echo $topdaohangarray[$i][0]?></a><?php if($i<Count($topdaohangarray)-1) echo(" | ");?>

<?php

	}

}

?>



</div>

        <a onClick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo $sitetitleurl ?>');" href="#" class="h">设为首页</a>

		<a href="javascript:window.external.addFavorite('<?php echo $sitetitleurl ?>','<?php echo $sitetitle ?>');" class="s">收藏本站</a>

</div>
<div class="t2">
<div class="logo">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="height:79px;">
    <tr>
      <td valign="middle"><a href="<?php echo $rootroad ?>/"><img src="<?php echo $logo?>" alt="<?php echo $sitetitle ?>" /></a></td>
    </tr>
  </table>
  </div>
<div class="fbt"></div>
</div>

<!--栏目导航开始-->
<div class="menu">
<A href="<?php echo $rootroad ?>/" >首页<SPAN></SPAN></A> 
    <?php
    
    if(is_array($arrays) && Count($arrays)>0){
        for($i=0;$i<Count($arrays);$i++){
    ?>
    <a href="<?php echo $arrays[$i]["url"];?>" style="color:<?php echo $arrays[$i]["color"];?>" target="<?php echo $arrays[$i]["target"];?>"><?php echo $arrays[$i][0]?></a>
    <?php
        }
    }
    ?>
    
</div>
<!--栏目导航结束-->

<!--搜索与小分类开始-->
<div class="adiv_1">
<div class="search">

<form action="<?php echo $rootroad;?>/search.php" method="get" name="searchlist" id="searchlist" <?php if($win_search=="1") echo(" target=_blank"); ?>>
<input type="text" class="input" name="qserach" id="qserach" value="">
<input type="hidden" name="catid" value="0" hidden>&nbsp;
<INPUT type="submit" value="搜商品" style="width:68px; height:27px; line-height:27px;" onclick="return tosearch(2)">
<INPUT type="submit" name="searchbuyer" value="搜站内" style="width:68px; height:27px; line-height:27px;" onclick="return tosearch(1)">
</form>
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


<div class="hotkey">
<li><b><?php echo $sitetitle ?></b></li>
<?php foreach($hotkeyword as $val){ ?>
			<li><a href="<?php echo $val["url"];?>" target="<?php echo $val["target"];?>" style="color:<?php echo $val["color"];?>"><?php echo $val["typename"];?></a></li>
			 <?php } ?>

</div>
</div>
<div class="ad" style="overflow:hidden">

<!--{ad/tonglan}-->

</div>
<div class="sclass">


<!-- hotnav -->





<div class="s1">
        <?php 
			function echolist($array,$name){
			global $weijingtai;
			global $win_daohang;
				if(is_array($array[$name])){
			
			?>
<div class="bt"><a href="<?php echo $array[$name]["url"];?>" title="<?php echo $array[$name]["typename"]?>" target="<?php echo $array[$name]["target"]?>"><strong><?php echo $array[$name]["typename"]?></strong></a></div>

<div class="st">
		<?php
            foreach($array[$name]["SubDaohangArr"] as $val){
			?>
			<a href="<?php echo $val[url];?>" target="<?php echo $val[target];?>" style="color:<?php echo $val[color];?>"><?php echo $val[typename];?></a>
			 <?php 
			 } 
			 ?>
        </div>	
			 <?php
             }
			}
		 ?>
<?php echo 	echolist($arraykeywords,0);?>
</div>
<div class="s2">
		<?php echolist($arraykeywords,1); ?>
</div>
<div class="s3">
		<?php echolist($arraykeywords,2); ?>
</div>
<div class="s4">
		<?php echolist($arraykeywords,3); ?>
</div>
<div class="s5">
		<?php echolist($arraykeywords,4); ?>
</div>

</div>
</div>
