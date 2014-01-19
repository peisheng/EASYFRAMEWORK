<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>$page_title</title>
<meta name="keywords" content="$page_keyword" />
<meta name="description" content="$page_discription" />
<link rel="Shortcut Icon" href="$sitetitleurl/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="css/css.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!--{template headerjs}-->

</head>
<body>
<center>
<!--{if !$inwin}-->
    <!--{template header}-->
	
<!--{/if}-->
<!--{template usercenter_mod}-->


<!--{if $ac==main }-->
    <div id="gl_1">
        <div class="gl_2">
        <div class="gl_3">后台管理中心</div>
        <!--{template usercenter_left}-->
        </div>
      <div class="gl_8">
        <div class="gl_9"><strong>公告：</strong>Hello,各位朋友好！</div>
        
        <div class="member_dl01">
        <dl><dt><p>欢迎您：<b>$TaoConfig["UserData"]["name"]</b></p><span>上次登录时间： <!--{eval echo date("Y-m-d h:m:s",$TaoConfig["UserData"]["last_time"]) }--> </span><div class="clear"></div></dt>
        
        <dd>
        <div style="float:left"><img src="$TaoConfig[UserData][img]" width="120"/><p><a href="usercenter.php?ac=userset">修改头像</a></p></div>
        <ul>
        <li></li>
        <li>会员等级：1<img src="images/rank.gif"/></li>
        </ul><div class="clear"></div></dd>
        </dl>
        </div>
        
        <div class="gl_25"></div>
      </div>
    </div>
<!--{/if}-->
<!--{if $ac==share }-->
    <div id="gl_1">
        <div class="gl_2">
        <div class="gl_3">后台管理中心</div>
        <!--{template usercenter_left}-->
        </div>
        <div class="gl_8">
        <div class="gl_9"><strong>公告：</strong>Hello,各位朋友好！</div>
        <div class="gl_10">
        <div class="gl_11"><input  name="ctl_11" id="ctl_11" value="输入订单号" onfocus="if(this.value=='输入订单号') this.value='';" onblur="if(this.value=='') this.value='输入订单号';"  />
        
        </div>
        <div class="gl_12">
        <select name="dingdan">
        <option value="0">淘宝订单</option>
        </select>
        </div>
        <div class="gl_13"><a href="#" title="查找遗漏订单"><img src="images/find.png" alt="查找遗漏订单"/></a></div>
        </div>
        <div id="gl_14">               
            <div class="gl_14_captions">
            <div class='gl_14_caption_pre'></div>
            <div id='gl_14_caption_0' class='gl_14_0_caption_now'  onmouseover="gl_setTab('gl_14',4,0);"  onclick="gl_setTabSelect('gl_14',0)" >我的分享商品
            </div>
            <div class='gl_14_caption_space'></div>
            <div class='gl_14_caption_space'></div>
            <div id='gl_14_caption_3' class='gl_14_3_caption_normal'  onmouseover="gl_setTab('gl_14',4,3);"  onclick="gl_setTabSelect('gl_14',3)">待审核订单
            </div>
            </div>
            <div class="gl_14_contents">
            <div id='gl_14_content_0'>
                <div class="gl_17">
                    <div class="gl_18" style="font-weight:bold;">
                        <div class="gl_19">订单号</div>
                        <div class="gl_20">宝贝名称</div>
                        <div class="gl_21">金额</div>
                        <div class="gl_22">返现</div>
                        <div class="gl_23">成交时间</div>
                        <div class="gl_24">操作</div>
                    </div>
                    <div class="gl_18">
                        <div class="gl_19">167299220780498</div>
                        <div class="gl_20"><a href="#">相宜本草 四倍蚕丝凝白眼霜</a></div>
                        <div class="gl_21"><span>128.00</span>元</div>
                        <div class="gl_22"><span>12.00元</span></div>
                        <div class="gl_23">2012-12-25 18:10:23</div>
                        <div class="gl_24"><a href="#">确认收货</a></div>
                    </div>
                </div>
            </div>
            <div id='gl_14_content_1' style='display:none;' >
            </div>
            <div id='gl_14_content_2' style='display:none;' >
            </div>
            <div id='gl_14_content_3' style='display:none;' >
            </div>
            </div>
        	<script>gl_setTabNowUrl('gl_14',4)</script>
        
        </div>
        <div class="gl_25"></div>
        </div>
    </div>
<!--{/if}-->

<!--{if $ac==userset }-->
	<script type="text/javascript" src="statics/js/zeroclipboard.js"></script>
    <script type="text/javascript" src="statics/js/area.js"></script>
    <script type="text/javascript" src="statics/js/dateselect.js"></script>
    <script type="text/javascript" src="statics/js/PCASClass.js"></script>
	<script language="javascript" type="text/javascript" src="statics/js/jquery/plugins/formvalidator.js?f"></script>
    <script language="javascript" type="text/javascript" src="statics/js/jquery/plugins/formvalidatorregex.js?s"></script>
    <div id="gl_1">
            <div class="gl_2">
            <div class="gl_3">后台管理中心</div>
            <!--{template usercenter_left}-->
            </div>
            <div class="gl_8">
            <div class="gl_9"><strong>公告：</strong>Hello,各位朋友好！</div>
            <div class="right_region">
                <form action="" method="post" name="myform" id="myform" enctype="multipart/form-data">
                  <table width="543" cellpadding="5" cellspacing="5">
                    <tr>
                      <th style="width:80px;" align="right">会员帐号：</th>
                      <td align="left"><input type="text" name="name" id="name" readonly="readonly" value="{$TaoConfig[UserData][name]}"/></td>
                    </tr>
                    <tr>
                      <th align="right">电子邮箱：</th>
                      <td align="left"><input type="text" name="email" id="email" value="{$TaoConfig[UserData][email]}"/></td>
                    </tr>
                    <tr>
                      <th align="right">会员头像：</th>
                      <td><img src="{$TaoConfig[UserData][img]}" width="120" id="headimg" height="120"/><br />
                        <input type="file"  name="img" id="img" onchange="document.getElementById('headimg').src=document.getElementById('img').value;"/></td>
                    </tr>
                    <tr>
                      <th align="right">性&nbsp;&nbsp;别：</th>
                      <td>
                      <!--{eval 
                      if($TaoConfig[UserData][sex]==1) $sex1 = "checked";
                      if($TaoConfig[UserData][sex]==2) $sex2 = "checked";
                      if($TaoConfig[UserData][sex]==0) $sex0 = "checked";
                      }-->
                      <input type="radio" name="sex" value="1" $sex1 />
                        男 
                        <input type="radio" name="sex" value="0"  $sex0 />
                        女 
                        
                        保密
                        <input type="radio" name="sex" value="2"  $sex2 /></td>
                    </tr>
                    <tr>
                      <th align="right">出生年月：</th>
                      <td><input type="text" name="brithday" value="{$TaoConfig[UserData][brithday]}"/></td>
                    </tr>
                    <tr>
                      <th align="right">所在城市：</th>
                      <td><select name="province" id="province">
                      </select>
                        &nbsp;&nbsp;
                        <select name="city" id="city">
                        </select>
                        &nbsp;&nbsp;
                        <select name="area" id="area">
                        </select>
                        &nbsp;&nbsp;
                        
                        <!--{eval 
                        $province = $TaoConfig[UserData][province];
                        $city = $TaoConfig[UserData][city];
                        $area = $TaoConfig[UserData][area];
                        }-->
                        
                        <script language="JavaScript" type="text/javascript" defer="defer">
                            new PCAS("province","city","area","$province","$city","$area");
                        </script></td>
                    </tr>
                    <tr>
                      <th align="right">个人主页：</th>
                      <td><input type="text" name="blog" value="$TaoConfig[UserData][blog]"/></td>
                    </tr>
                    <tr>
                      <th align="right">签名简介：</th>
                      <td><textarea style="width:300px;height:100px;" name="info">$TaoConfig[UserData][info]</textarea></td>
                    </tr>
                    <tr>
                      <th></th>
                      <td><input type="image" src="images/sp_shop_ico18.jpg" class="submit" value="确定"/></td>
                    </tr>
                  </table>
                        <input type="hidden" name="ac" value="userset" /><input type="hidden" name="dosubmit" value="tijiao" />
              </form>
            </div>
            </div>
        </div>
  <script type="text/javascript">
    $(function(){
		$.formValidator.initConfig({formid:"myform",autotip:true});
		//$("#name").formValidator({empty:true,nshow:"用户帐号不能为空",onfocus:"用户帐号不能为空"}).inputValidator({min:1,onerror:"用户帐号不能为空"});
		//$("#email").formValidator({empty:true,onshow:"请填写邮箱",onfocus:"请填写邮箱"}).inputValidator({min:1,onerror:"请填写邮箱"}).regexValidator({regexp:"email",datatype:"enum",onerror:"邮件格式错误"}).ajaxValidator();
    });
    </script>
<!--{/if}-->
<!--{if !$inwin}-->
  <!--{template footer}-->
<!--{/if}-->
</center>
</body>
</html>