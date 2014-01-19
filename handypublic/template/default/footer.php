<!--{eval if(!defined('VERSON')) exit('Access Denied'); }-->
<!--{if (false)}--><!--设计用，用于dweamweaver识别-->
<link rel="stylesheet" type="text/css" href="css/css.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!--{/if}-->
<div id="footer">
    <div class="footerMain">
      
		<!--{if $TaoConfig[DB_OPEN] }-->   
        <!--{if $CustomSetFieldValue[showhelp]!="2"}-->   
      <div class="footeruh" >
      <!--{eval $cateArr = GetArrHelps_cate();}-->
      <!--{loop $cateArr $k $v}--> 
      	<!--{if $k<=3}-->
        <div class="footerfirst" >
          <div class="footertext" >$v[name]</div>
          <div class="footerdashed" ></div>
          <div class="footertext1" > 
            <!--{eval $helpArr = GetArrHelps($v[id],4);}-->
              <!--{loop $helpArr $k2 $v2}--> 
            <a href="$v2[url]#to$v2[id]" target="_blank">$v2[title]</a><br />
              <!--{/loop}--> 
            </div>
        </div>
        <!--{/if}-->
      <!--{/loop}--> 
      </div> 
      <!--{/if}-->
      <!--{/if}-->
      
      <div class="footerline" ></div>
      <div class="footertext2"> 
          <!--{eval $NewsArr = GetArrArticle(-1,10);}--> 
          <!--{loop $NewsArr $k $v}-->
          <a href="$v[url]" target="_blank">{$v[title]}</a> ┊ 
          <!--{/loop}-->
      
      <a href="$rootroad/sitemap.php" target="_blank">网站地图</a>
      
      <br/>$webcontact $beianxinxi
      <br/> Copyright &copy; 2009-2013 <a href="$sitetitleurl">$sitetitle</a> All Rights Reserved $tongjidaima
      
       </div>
      
      <div class="clear"></div>
      <div class="footerunit" >
    <!--{ad/footer}-->
      </div>
    </div>
  </div>