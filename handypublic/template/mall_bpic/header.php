<!--{eval if(!defined('VERSON')) exit('Access Denied'); }-->
<!--{if (false)}--><!--����ã�����dweamweaverʶ��-->
<link rel="stylesheet" href="images/style.css" />
<link rel="stylesheet" href="images/index.css" />

<link href="images/css.css" rel="stylesheet" type="text/css" />
<!--{/if}-->
<div id="header_jscorder">
<!--{ad/top}-->
<div id="at">

    <div class="a_b h28">

	    <div class="lf h28 pl20">		

        <a onClick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo $sitetitleurl ?>');" href="#">��Ϊ��ҳ</a> | 

		<a href="javascript:window.external.addFavorite('<?php echo $sitetitleurl ?>','<?php echo $sitetitle ?>');">�ղر�վ</a> | 

		<a href="<?php echo $rootroad ?>/sitemap.php">վ���ͼ</a>

		</div>

		<div class="rt h28 pr20">
        

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



<div class="a_b" id="hd_t">
    <h1><table border="0"> 
<tr> 
<td valign=middle height=64><a href="<?php echo $rootroad ?>/"><img src="<?php echo $logo?>" title="<?php echo $sitetitle ?>" alt="<?php echo $sitetitle ?>" ></a></td> 
</tr> 
</table> </h1>



	<div class="tel"><!--{ad/leftbanner}--></div>

</div>

<div class="a_b" id="n_bx">

   <div class="lbox">

      <div id="nav">

	      <a href="<?php echo $rootroad ?>/"<?php echo $nowdaohang==-1?" class=on":""?>>��ҳ</a>

    <?php

    

    if(is_array($arrays) && Count($arrays)>0){

        for($i=0;$i<Count($arrays);$i++){

    ?>

    <a href="$arrays[$i][url]" target="$arrays[$i][target]" style="color:$arrays[$i][color]"><?php echo $arrays[$i][0]?></a>

    <?php

        }

    }

    ?>

          

	  </div>

      <!--{if $CustomSetFieldValue[SetSearch]}-->
      <!--{else}-->
	  <div id="n_bt">

          <span class="c1">վ���ۺ�������</span>
          <form id="searchlist" name="searchlist" action="<?php echo $rootroad;?>/search.php" method="get" <?php if($win_search=="1") echo(" target=_blank"); ?>>
    
              <input name="qserach" id="qserach" type="text" class="c3" value="������������ҵ���Ʒ" onFocus="if(this.value=='������������ҵ���Ʒ') this.value=''" onBlur="if(this.value==''||this.value=='������������ҵ���Ʒ') this.value='������������ҵ���Ʒ'">
    
              <input class="c4" type="image" value="����Ʒ" src="images/ssp.gif" onClick="return tosearch(2)">
            <input name="searchbuyer" id="searchbuyer" type="hidden" value="">
    
              <script language="javascript">
    
                function tosearch(type){
    
                    if(document.getElementById("qserach").value=="������������ҵ���Ʒ"){
    
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
          <span class="c7"><em>����������</em>
    
    <?php
            foreach($hotkeyword as $val){
    
            $kk++;
    
            
    
            ?>
    
            <a href="<?php echo $val["url"];?>" target="<?php echo $val["target"];?>" style="color:<?php echo $val["color"];?>"><?php echo $val["typename"];?></a> 
    
             <?php } 
    ?>
          
    
          </span>
	  </div>
      <!--{/if}--> 

   </div>

   <span class="rbg"></span>

</div>
              <!--{if $CustomSetFieldValue[SetSearch]}-->
          <table width="1004" height="112">
            <tr>
              <td valign="middle">$CustomSetFieldValue[SetSearch]</td>
            </tr>
          </table>
              <!--{else}-->
              <!--{/if}--> 

<div class="clear pd8"><img src="images/s.gif" alt="�ָ���" /></div>

<div class="a_b">
<!--{ad/tonglan_mall}-->

</div>
<div class="clear pd8"><img src="images/s.gif" alt="�ָ���" /></div>
</div>
<script language="javascript">seturl_LazyLoad('header_jscorder');</script>
