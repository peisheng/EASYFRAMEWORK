<!--{eval if(!defined('VERSON')) exit('Access Denied'); }-->
<!--{if (false)}--><!--����ã�����dweamweaverʶ��-->
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
            <div class="hydl">��Ա��¼</div>
            <form id="myform" name="myform" action="" method="post" onsubmit="return check();">
            <div class="dlzc_7">
                <div class="dlzc_8">
                    <div class="dlzc_9">�û�����</div>
                    <div class="dlzc_10"><input  name="name" id="name" value="ע������/��Ա�ʺ�" onMouseOver="this.focus()" onMouseOut="if(this.value=='')this.value='ע������/��Ա�ʺ�';" onFocus="this.select()" onClick="if(this.value=='ע������/��Ա�ʺ�')this.value=''"/></div>
                </div>
                <div class="dlzc_11">
                    <div class="dlzc_9">���룺</div>
                    <div class="dlzc_10"><input  name="passwd" type="password" id="passwd" value=""/></div>
                </div>
                <div class="dlzc_12">
                    <div class="dlzc_26"><input type="checkbox" name="cookie_expire" value="604800" /></div>
                    <div class="dlzc_28">һ�����½</div>
                </div>
                <div class="dlzc_13">
                
                    <div class="dlzc_25">
                    <input type="hidden" name="dosubmit" value="login" />
                    <input type="hidden" name="ac" value="login" />
                    <input type="hidden" name="redirect" value="$redirect" />
                    <input type="image" src="images/loginBtn.png" name="dosubmit" alt="��¼"/></div>
                    <div class="dlzc_27"></div>
                </div>
                    <div class="dlzc_14"><a href="#">�����ǻ�Ա��</a><a href="usercenter.php?ac=register" style="padding-left:6px;color:#d10000;">����ע�ᣡ</a></div>
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
            $('#name').next('.hint').html('����д�ǳ�');
            return false;
        }	
        if(passwd.length<1){ 			
            $('#passwd').next('.hint').html('����д����');
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
                <div id='dlzc_6_caption_0' class='dlzc_6_0_caption_now'  >ע���Ϊ��Ա
                </div>
                <div class='dlzc_6_caption_space'></div>
                </div>
                <form action="" method="post" id="myform">
                <div class="dlzc_6_contents">
                  <div id='dlzc_6_content_1' >
                    <div class="dlzc_7">
                    <div class="dlzc_8">
                        <div class="dlzc_9">ע���˺ţ�</div>
                        <div class="dlzc_10"><input  name="name" id="name" value=""/></div>
                    </div>
                    <div class="dlzc_11">
                        <div class="dlzc_9">��¼���룺</div>
                        <div class="dlzc_10"><input  name="passwd" type="password" id="passwd" value=""/></div>                                
                    </div>
                    <div class="dlzc_11">
                        <div class="dlzc_9">ȷ�����룺</div>
                        <div class="dlzc_10"><input  name="confirm_passwd" type="password" id="confirm_passwd" value=""/></div>                                
                    </div>
                    <div class="dlzc_11">
                        <div class="dlzc_9">�������䣺</div>
                        <div class="dlzc_10"><input  name="email" id="email" value=""/></div>                                
                    </div>
                    <div class="dlzc_19">
                        <div class="dlzc_9">��֤�룺</div>
                        <div class="dlzc_10">
                        <input name="verify" id="verify" value=""/>
                        <img src="usercenter.php?ac=verify" alt="yzm" onclick="this.src='usercenter.php?ac=verify&m=math.random()'"/>
                        </div>
                        
                    </div>
                    <div class="dlzc_23">
                    <input type="hidden" name="ac" value="register" />
                    <input type="hidden" name="dosubmit" value="register" />
                    <input type="image" src="images/zcBtn.png" alt="ע��" name="dosubmit"/> <img style="padding-left:167px;" src="images/slogan.png" alt="" /></div>
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
		$("#name").formValidator({onshow:"�û��ʺŲ���Ϊ��",onfocus:"�û��ʺŲ���Ϊ��",on}).inputValidator({min:1,onerror:"�û��ʺŲ���Ϊ��"});
		$("#email").formValidator({empty:true,onshow:"����д����",onfocus:"����д����"}).inputValidator({min:1,onerror:"����д����"}).regexValidator({regexp:"email",datatype:"enum",onerror:"�ʼ���ʽ����"}).ajaxValidator();
		$("#passwd").formValidator({onshow:"��д����",onfocus:"��д6λ��������"}).inputValidator({min:6,onerror:"����д6λ��������"});
		$("#confirm_passwd").formValidator({onshow:"ȷ������",onfocus:"ȷ������",oncorrect:"��д��ȷ"}).compareValidator({desid:"passwd",operateor:"=",onerror:"�����������벻һ��"});
	});
	</script>

<!--{/if}-->
<!--{if $ac==invit }-->
	<script type="text/javascript" src="statics/js/zeroclipboard.js"></script>
    <script type="text/javascript" src="statics/js/area.js"></script>
    <script type="text/javascript" src="statics/js/dateselect.js"></script>
    <div id="gl_1">
        <div class="gl_2">
        <div class="gl_3">��̨��������</div>
        <!--{template usercenter_left}-->
        </div>
        <div class="gl_8">
        <div class="gl_9"><strong>���棺</strong>Hello,��λ���Ѻã�</div>
        <div class="gl_10">
        <div class="gl_12"></div>
        <div class="gl_13"></div>
        </div>
        <div class="right_region">
			<p>��ʽһ����������ר���������ӣ���ͨ��QQ��MSN���͸����ѣ�</p>	
            <textarea style="width:600px;height:60px; margin:10px 0;" id="uc_url">$sitedesc~{$sitetitleurl}</textarea>
           	<p>
				<input type="button" class="submit" id="copy_url" value="����" name="dosubmit"/>             
            </p>
            <p class="clearfix">��ʽ����ͨ��SNS��վ����������ѣ�</p>
            <div class="share">
            <a class="renren" href="javascript:window.open('http://share.renren.com/share/buttonshare.do?link='+encodeURIComponent('{$sitetitleurl}')+'&title='+encodeURIComponent('{$sitedesc}'));void(0)">������</a>
            <a class="kaixin" href="javascript:window.open('http://www.kaixin001.com/repaste/share.php?rtitle='+encodeURIComponent('{$share.info}')+'&rurl='+encodeURIComponent('{$sitetitleurl}'));void(0)">������</a>
            <a class="sina" href="javascript:window.open('http://service.t.sina.com.cn/share/share.php?title='+encodeURIComponent('{$sitedesc}'));void(0)">����΢��</a>
            <a class="sohu" href="javascript:window.open('http://t.sohu.com/third/post.jsp?title='+encodeURIComponent('{$sitedesc}')+'&url='+encodeURIComponent('{$sitetitleurl}')+'&content=utf-8');void(0)">�Ѻ�΢��</a>
            <a class="qzone" href="javascript:window.open('http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?title='+encodeURIComponent('{$sitedesc}')+'&url='+encodeURIComponent('{$sitetitleurl}')+'&content=utf-8');void(0)">QQ�ռ�</a>
            <a class="tqq" href="javascript:window.open('http://share.v.t.qq.com/index.php?c=share&a=index&url='+encodeURIComponent('{$sitetitleurl}')+'&content='+encodeURIComponent('{$sitedesc}')+'');void(0)">��Ѷ΢��</a>             
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
        <div class="gl_3">��̨��������</div>
        <!--{template usercenter_left}-->
        </div>
        <div class="gl_8">
        <div class="gl_9"><strong>���棺</strong>Hello,��λ���Ѻã�</div>
        <div class="gl_10">
        <div class="gl_12"></div>
        <div class="gl_13"></div>
        </div>
        <div class="right_region">
          <form action="" method="post" id="myform">
          <table cellpadding="5">
            <tr>
              <th>�����룺</th>
              <td><input type="password" name="oldpwd" id="oldpwd" value="" class="input_text"/></td>
            </tr>
            <tr>
              <th>�����룺</th>
              <td><input type="password" name="passwd" id="passwd" value="" class="input_text"/></td>
            </tr>
            <tr>
              <th>�����ظ���</th>
              <td><input type="password" name="confirm_passwd" id="confirm_passwd" value="" class="input_text"/></td>
            </tr>
            <tr>
              <th></th>
              <td>
                    <input type="hidden" name="ac" value="$ac" />
                    
              <input type="image" src="images/sp_shop_ico18.jpg" class="submit" value="ȷ��" name="dosubmit"/></td>
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
