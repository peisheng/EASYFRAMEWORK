<!--{eval if(!defined('VERSON')) exit('Access Denied'); }-->
<!--{if (false)}--><!--设计用，用于dweamweaver识别-->
<link rel="stylesheet" type="text/css" href="css/css.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!--{/if}-->
<!--{ad/top}-->
  <div id="top">
    <div class="one">
      <div class="one1">
        <div class="one2"> <a href="#" onclick="window.external.addFavorite('$sitetitleurl','$sitetitle');">收藏</a> | 
        <a href="#" onClick="this.style.behavior='url(#default#homepage)';this.setHomePage('$sitetitleurl');">设为主页</a> | <a href="help.php">帮助中心</a> </div>
        <div class="one3">
     		<!--{if $CustomSetFieldValue[showuser]!="2"}-->   
			<script language="JavaScript" type="text/javascript" src="$rootroad/index.php?mod=jslogintop"></script>
   	  		<!--{/if}--> 
            
        </div>
      </div>
      
      <div class="one7">
        <div class="one8">
          <table width="376" height="112">
            <tr>
              <td valign="middle"><a href="$TaoConfig[rootroad]/"><img src="$logo"/></a></td>
            </tr>
          </table>
        </div>
		      <div class="one9">
              
              <!--{if $CustomSetFieldValue[SetSearch]}-->
          <table height="112">
            <tr>
              <td valign="middle">$CustomSetFieldValue[SetSearch]</td>
            </tr>
          </table>
              <!--{else}-->
          <div class="one10" rel='tb-btn'>
            <div class="one11 on" rel='btn'><a href="#">搜商品</a></div>
            <div class="one11" rel='btn'><a href="#">搜拍拍</a></div>
            <div class="one11" rel='btn'><a href="#">搜B2C</a></div>
            <div class="one11" rel='btn'><a href="#">搜分享</a></div>
            <div class="one11" rel='btn'><a href="#">搜文章</a></div>
          </div>
          <div class="one12" rel='tb-box' >
           <form id="searchlist" name="searchlist" action="$rootroad/search.php" method="get">    
            <div class="one13">
              <input name="sharekeyword" type="text"  value="输入搜索商品" class="one15" onClick="if(this.value=='输入搜索商品')this.value=''" onblur="if(this.value=='输入搜索商品')this.value=''" />
            </div>
            <div class="one14"><input type="image" src="images/ico5.jpg" /></div>
            </form>
          </div>
          <div class="one12" rel='tb-box' >
           <form id="searchlist" name="searchlist" action="$rootroad/search.php" method="get">    
            <div class="one13">
              <input name="paikeyword" type="text"  value="输入搜索商品" class="one15" onClick="if(this.value=='输入搜索商品')this.value=''" onblur="if(this.value=='输入搜索商品')this.value=''" />
            </div>
            <div class="one14"><input type="image" src="images/ico5.jpg" /></div>
            </form>
          </div>
          <div class="one12" rel='tb-box' >
           <form id="searchlist" name="searchlist" action="$rootroad/search.php" method="get">    
            <div class="one13">
              <input name="b2ckeyword" type="text"  value="输入搜索B2C商品" class="one15" onClick="if(this.value=='输入搜索B2C商品')this.value=''"  onblur="if(this.value=='输入搜索B2C商品')this.value=''"/>
            </div>
            <div class="one14"><input type="image" src="images/ico5.jpg" /></div>
            </form>
          </div>
          <div class="one12" rel='tb-box' >
           <form id="searchlist" name="searchlist" action="$rootroad/search.php" method="get">    
            <div class="one13">
              <input name="sharekeyword" type="text"  value="输入搜索分享商品" class="one15" onClick="if(this.value=='输入搜索分享商品')this.value=''" onblur="if(this.value=='输入搜索分享商品')this.value=''"/>
            </div>
            <div class="one14"><input type="image" src="images/ico5.jpg" /></div>
       		</form>
          </div>
          <div class="one12" rel='tb-box' >
           <form id="searchlist" name="searchlist" action="$rootroad/search.php" method="get">    
            <div class="one13">
              <input name="articlekeyword" type="text"  value="输入搜索文章" class="one15"   onClick="if(this.value=='输入搜索文章')this.value=''" onblur="if(this.value=='输入搜索文章')this.value=''"/>
            </div>
            <div class="one14"><input type="image" src="images/ico5.jpg" /></div>
       	</form>
          </div>
              <!--{/if}--> 
          
          
        </div>
      </div>
      
      <div class="two">
        <ul id="cjsddm">
            <li class="two1"><a href="$TaoConfig[rootroad]/">首 页</a></li>
            <!--{eval $DaohangArr = GetArrDaohang("daohang");}--><!--这一行是用来调用主导航的--> 
            <!--{loop $DaohangArr $k $v}-->
            <li class="two1"> <a href="$v[url]" target="$v[target]" style="color:$v[color]">$v[typename]</a> 
              <!--{if $v[SubDaohangArr]}--> <!--判断是否存在导航-->
                  <ul>
                    <!--{loop $v[SubDaohangArr] $key2 $value2}-->
                    <li><a href="$value2[url]" target="$value2[target]" style="color:$v[color]">$value2[typename]</a>
                    </li>
                    <!--{/loop}-->
                  </ul>
              <!--{else}--> 
              <!--{/if}--> 
              	<!--{if $v[ishot]=="1" }-->
                <div class="two2"><img src="images/ico2.png"  width="40" height="25"/></div>
               <!--{/if}--> 
            </li>
            <!--{/loop}-->
        </ul>
      </div>
    </div>
  </div>
  <!--{if $TaoConfig[DB_OPEN] }-->

  <div id="gg">
    <div class="one">
      <div class="one1">
        <div style=" width:60px; height:35px; float:left; color:#9a0000;">最新公告：</div>
        <ul id="message_list" style="height:35px; overflow: hidden; float: left;">
          <!--{eval $NewsArr = GetArrArticle(0,5,1,1,0,"add_time");}--> 
          <!--{loop $NewsArr $k $v}-->
          <li><a href="$v[url]" target="_blank">{$v[title]} [<!--{eval echo date('m-d',strtotime($v['add_time']))}-->]</a></li>
          <!--{/loop}-->
        </ul>
      </div>
      <div class="one2"><img src="images/ico3.png"  width="25" height="9"/></div>
    </div>
  </div>
              <!--{/if}--> 
  <script language="javascript">seturl_LazyLoad('top');</script>
  
<!--{ad/tonglan}-->