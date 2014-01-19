<!--{eval if(!defined('VERSON')) exit('Access Denied'); }-->
<!--{if (false)}--><!--设计用，用于dweamweaver识别-->
<link rel="stylesheet" type="text/css" href="css/css.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!--{/if}-->

<!--{if $ac==login }-->

    <div id="dlzc_2">
        <div class="dlzc_3">
            <div class="dlzc_4"><!--{ad/mleft}--></div>
        </div>
        <div class="dlzc_5">
            <div id="dlzc_6">               
            <div class="hydl">会员登录</div>
            <form id="myform" name="myform" action="" method="post" onsubmit="return check();">
            <div class="dlzc_7">
                <div class="dlzc_8">
                    <div class="dlzc_9">用户名：</div>
                    <div class="dlzc_10"><input  name="name" id="name" value="注册邮箱/会员帐号" onMouseOver="this.focus()" onMouseOut="if(this.value=='')this.value='注册邮箱/会员帐号';" onFocus="this.select()" onClick="if(this.value=='注册邮箱/会员帐号')this.value=''"/></div>
                </div>
                <div class="dlzc_11">
                    <div class="dlzc_9">密码：</div>
                    <div class="dlzc_10"><input  name="passwd" type="password" id="passwd" value=""/></div>
                </div>
                <div class="dlzc_12">
                    <div class="dlzc_26"><input type="checkbox" name="cookie_expire" value="604800" /></div>
                    <div class="dlzc_28">一周免登陆</div>
                </div>
                <div class="dlzc_13">
                
                    <div class="dlzc_25">
                    <input type="hidden" name="dosubmit" value="login" />
                    <input type="hidden" name="ac" value="login" />
                    <input type="hidden" name="redirect" value="$redirect" />
                    <input type="image" src="images/loginBtn.png" name="dosubmit" alt="登录"/></div>
                    <div class="dlzc_27"></div>
                </div>
                    <div class="dlzc_14"><a href="#">还不是会员？</a><a href="usercenter.php?ac=register" style="padding-left:6px;color:#d10000;">轻松注册！</a></div>
                    <div class="dlzc_15"><img src="images/slogan.png" alt=""/></div>
                </div>
            </form>
            </div>
        </div>
    </div>
	 <script type="text/javascript">
    function check(){ 
        var name=$.trim($('#name').val());
        var passwd=$.trim($('#passwd').val());
        if(name.length<1){ 			
            $('#name').next('.hint').html('请填写昵称');
            return false;
        }	
        if(passwd.length<1){ 			
            $('#passwd').next('.hint').html('请填写密码');
            return false;
        }	
        return true;
    }
    </script>
<!--{/if}-->

<!--{if $ac==register }-->
	<script language="javascript" type="text/javascript" src="statics/js/jquery/plugins/formvalidator.js"></script>
    <script language="javascript" type="text/javascript" src="statics/js/jquery/plugins/formvalidatorregex.js"></script>
    <div id="dlzc_2">
            <div class="dlzc_3">
                <div class="dlzc_4"><!--{ad/mleft}--></div>
            </div>
            <div class="dlzc_5">
                <div id="dlzc_6">               
                <div class="dlzc_6_captions">
                <div class='dlzc_6_caption_pre'></div>
                <div id='dlzc_6_caption_0' class='dlzc_6_0_caption_now'  >注册成为会员
                </div>
                <div class='dlzc_6_caption_space'></div>
                </div>
                <form action="" method="post" id="myform">
                <div class="dlzc_6_contents">
                  <div id='dlzc_6_content_1' >
                    <div class="dlzc_7">
                    <div class="dlzc_8">
                        <div class="dlzc_9">注册账号：</div>
                        <div class="dlzc_10"><input  name="name" id="name" value=""/></div>
                    </div>
                    <div class="dlzc_11">
                        <div class="dlzc_9">登录密码：</div>
                        <div class="dlzc_10"><input  name="passwd" type="password" id="passwd" value=""/></div>                                
                    </div>
                    <div class="dlzc_11">
                        <div class="dlzc_9">确认密码：</div>
                        <div class="dlzc_10"><input  name="confirm_passwd" type="password" id="confirm_passwd" value=""/></div>                                
                    </div>
                    <div class="dlzc_11">
                        <div class="dlzc_9">电子邮箱：</div>
                        <div class="dlzc_10"><input  name="email" id="email" value=""/></div>                                
                    </div>
                    <div class="dlzc_19">
                        <div class="dlzc_9">验证码：</div>
                        <div class="dlzc_10">
                        <input name="verify" id="verify" value=""/>
                        <img src="usercenter.php?ac=verify" alt="yzm" onclick="this.src='usercenter.php?ac=verify&m=math.random()'"/>
                        </div>
                        
                    </div>
                    <div class="dlzc_23">
                    <input type="hidden" name="ac" value="register" />
                    <input type="hidden" name="dosubmit" value="register" />
                    <input type="image" src="images/zcBtn.png" alt="注册" name="dosubmit"/> <img style="padding-left:167px;" src="images/slogan.png" alt="" /></div>
                    </div>
                </div>
                </div>
                </form> 
                </div>
            </div>
        </div>
    
    <script type="text/javascript">
	$(function(){
		$.formValidator.initConfig({formid:"myform",autotip:true});
		$("#name").formValidator({onshow:"用户帐号不能为空",onfocus:"用户帐号不能为空",on}).inputValidator({min:1,onerror:"用户帐号不能为空"});
		$("#email").formValidator({empty:true,onshow:"请填写邮箱",onfocus:"请填写邮箱"}).inputValidator({min:1,onerror:"请填写邮箱"}).regexValidator({regexp:"email",datatype:"enum",onerror:"邮件格式错误"}).ajaxValidator();
		$("#passwd").formValidator({onshow:"填写密码",onfocus:"填写6位以上密码"}).inputValidator({min:6,onerror:"请填写6位以上密码"});
		$("#confirm_passwd").formValidator({onshow:"确认密码",onfocus:"确认密码",oncorrect:"填写正确"}).compareValidator({desid:"passwd",operateor:"=",onerror:"两次输入密码不一致"});
	});
	</script>

<!--{/if}-->
<!--{if $ac==invit }-->
	<script type="text/javascript" src="statics/js/zeroclipboard.js"></script>
    <script type="text/javascript" src="statics/js/area.js"></script>
    <script type="text/javascript" src="statics/js/dateselect.js"></script>
    <div id="gl_1">
        <div class="gl_2">
        <div class="gl_3">后台管理中心</div>
        <!--{template usercenter_left}-->
        </div>
        <div class="gl_8">
        <div class="gl_9"><strong>公告：</strong>Hello,各位朋友好！</div>
        <div class="gl_10">
        <div class="gl_12"></div>
        <div class="gl_13"></div>
        </div>
        <div class="right_region">
			<p>方式一、这是您的专用邀请链接，请通过QQ或MSN发送给好友：</p>	
            <textarea style="width:600px;height:60px; margin:10px 0;" id="uc_url">$sitedesc~{$sitetitleurl}</textarea>
           	<p>
				<input type="button" class="submit" id="copy_url" value="复制" name="dosubmit"/>             
            </p>
            <p class="clearfix">方式二、通过SNS网站分享邀请好友：</p>
            <div class="share">
            <a class="renren" href="javascript:window.open('http://share.renren.com/share/buttonshare.do?link='+encodeURIComponent('{$sitetitleurl}')+'&title='+encodeURIComponent('{$sitedesc}'));void(0)">人人网</a>
            <a class="kaixin" href="javascript:window.open('http://www.kaixin001.com/repaste/share.php?rtitle='+encodeURIComponent('{$share.info}')+'&rurl='+encodeURIComponent('{$sitetitleurl}'));void(0)">开心网</a>
            <a class="sina" href="javascript:window.open('http://service.t.sina.com.cn/share/share.php?title='+encodeURIComponent('{$sitedesc}'));void(0)">新浪微博</a>
            <a class="sohu" href="javascript:window.open('http://t.sohu.com/third/post.jsp?title='+encodeURIComponent('{$sitedesc}')+'&url='+encodeURIComponent('{$sitetitleurl}')+'&content=utf-8');void(0)">搜狐微博</a>
            <a class="qzone" href="javascript:window.open('http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?title='+encodeURIComponent('{$sitedesc}')+'&url='+encodeURIComponent('{$sitetitleurl}')+'&content=utf-8');void(0)">QQ空间</a>
            <a class="tqq" href="javascript:window.open('http://share.v.t.qq.com/index.php?c=share&a=index&url='+encodeURIComponent('{$sitetitleurl}')+'&content='+encodeURIComponent('{$sitedesc}')+'');void(0)">腾讯微博</a>             
            </div>
        </div>
<script type="text/javascript">

$(function(){ 
	var clip = new ZeroClipboard.Client();
	clip.setHandCursor( true );
	clip.addEventListener('mouseOver', function (client) {
		clip.setText($('#uc_url').val());
	});
	clip.glue('copy_url');
	document.getElementById("copy_url").onmouseover = function(){
		clip.reposition(this);
	}
	
});

</script>

        
        <div class="gl_25"></div>
        </div>
    </div>
<!--{/if}-->
<!--{if $ac==password }-->
    <div id="gl_1">
        <div class="gl_2">
        <div class="gl_3">后台管理中心</div>
        <!--{template usercenter_left}-->
        </div>
        <div class="gl_8">
        <div class="gl_9"><strong>公告：</strong>Hello,各位朋友好！</div>
        <div class="gl_10">
        <div class="gl_12"></div>
        <div class="gl_13"></div>
        </div>
        <div class="right_region">
          <form action="" method="post" id="myform">
          <table cellpadding="5">
            <tr>
              <th>旧密码：</th>
              <td><input type="password" name="oldpwd" id="oldpwd" value="" class="input_text"/></td>
            </tr>
            <tr>
              <th>新密码：</th>
              <td><input type="password" name="passwd" id="passwd" value="" class="input_text"/></td>
            </tr>
            <tr>
              <th>密码重复：</th>
              <td><input type="password" name="confirm_passwd" id="confirm_passwd" value="" class="input_text"/></td>
            </tr>
            <tr>
              <th></th>
              <td>
                    <input type="hidden" name="ac" value="$ac" />
                    
              <input type="image" src="images/sp_shop_ico18.jpg" class="submit" value="确定" name="dosubmit"/></td>
            </tr>
          </table>
                    <input type="hidden" name="ac" value="password" />
                    <input type="hidden" name="dosubmit" value="register" />
          </form>
        </div>
        
        <div class="gl_25"></div>
        </div>
    </div>
<!--{/if}-->
