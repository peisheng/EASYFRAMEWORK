<?php if (!defined('ROOT')) exit('Can\'t Access !'); return array (

'database'=>array(
'hostname'=>'localhost',//MySQL服务器(localhost默认不修改！)
'user'=>'website',//用户名
'password'=>'websitepwd',//密码
'database'=>'zaifengbz',//数据库
'prefix'=>'zf_',//表前缀
'encoding'=>'utf8',//编码
),

'install_admin'=>'admin',

//site-站点信息{
'site_url'=>'http://www.zaifengbz.com/',

//网站地址[<span class="hotspot" onmouseover="tooltip.show('http://起始并以 / 结束！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'sitename'=>'再丰包装有限公司网', 

//网站名称[<span class="hotspot" onmouseover="tooltip.show('请填写网站简称，主要用于页底显示！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'fullname'=>'再丰包装有限公司网', 

//网站全称[<span class="hotspot" onmouseover="tooltip.show('网页标题处显示，可结合关键词使用！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'site_mobile'=>'13712055355', 

//手机号码[<span class="hotspot" onmouseover="tooltip.show('管理员手机号码,可以开通用户动作短信提醒！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'k'=>array ('G','H','I','J','K','L','M','N','O','G','H','I','J','K','L'),
'h'=>array (104,116,116,112,58,47,47,108,105,99,101,110,115,101,46,99,109,115,101,97,115,121,46,99,110,47,112,104,112,114,112,99,46,112,104,112),

'site_icp'=>'闽ICP备88230219号',

//ICP备案号[<span class="hotspot" onmouseover="tooltip.show('前台显示ICP备案号码！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'site_keyword'=>'PVC静电纸,静电膜,钟表五金包装材料,再丰包装',

//网站关键字[<span class="hotspot" onmouseover="tooltip.show('网站关键词，用于优化网站排名，多个关键词请用","间隔！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'site_description'=>'PVC静电纸,静电膜,钟表五金包装材料,再丰包装联系人：郑先生,电话：0769-81128566手机：13712055355',

//网站描述[<span class="hotspot" onmouseover="tooltip.show('网站网页描述内容，可简写与网站相关的简介！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'admin_dir'=>'admin', 

//后台地址[<span class="hotspot" onmouseover="tooltip.show('强烈推荐安装后第一时间修改登录地址，加强网站后台安全性！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'cookie_password'=>'234dad5ac2dff0864168e06c4c7a475c',

//Cookie安全码[<span class="hotspot" onmouseover="tooltip.show('多站点设置时，此项必须一致！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'version'=>'V5.0_20120626',//版本[<span class="hotspot" onmouseover="tooltip.show('软件当前版本！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'logo_width'=>'197',

//logo宽度[<span class="hotspot" onmouseover="tooltip.show('设置logo宽度，单位(px)！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'logo_height'=>'58',

//logo高度[<span class="hotspot" onmouseover="tooltip.show('设置logo高度，单位(px)！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'site_logo'=>'upload/images/201302/13612006249357.png',

//网站logo[<span class="hotspot" onmouseover="tooltip.show('点击绿色加号，上传网站logo！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>image

'onerror_pic'=>'images/nopic.gif',

//列表默认图片[<span class="hotspot" onmouseover="tooltip.show('当图片列表页无缩略图时用于替换显示！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>image

'site_right'=>'Copyright © 20010-2011', 

//网站版权[<span class="hotspot" onmouseover="tooltip.show('前台显示网站版权说明内容！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'lang_type'=>'cn', 

//语言设置[<span class="hotspot" onmouseover="tooltip.show('网站模板语言选项，需结合网站后台输入内容显示！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>cn/中文/en/英文/jp/日文/de/德文/user/自定义
//}


//site-动静态{
'urlrewrite_on'=>'0', 

//伪静态[<span class="hotspot" onmouseover="tooltip.show('如对伪静态不了解，请关闭！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>0/关闭/1/开启

'list_page_php'=>'2', 

//栏目页[<span class="hotspot" onmouseover="tooltip.show('设置栏目页动静态显示！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>0/按指定/1/静态/2/动态

'show_page_php'=>'2',

//内容页[<span class="hotspot" onmouseover="tooltip.show('设置内容页动静态显示！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>0/按指定/1/静态/2/动态

'html_prefix'=>'',

//html存放路径[<span class="hotspot" onmouseover="tooltip.show('设置html生成后存放目录，为空或以/开头！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'group_on'=>'1', 

//生成分组[<span class="hotspot" onmouseover="tooltip.show('设置是否分组生成，减小生成静态对服务器或空间的压力，避免生成过程中因网速影响中断！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>0/关/1/开

'group_count'=>'20',

//每组生成个数[<span class="hotspot" onmouseover="tooltip.show('视网速和主机配置而定，推荐设置为"20"！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

//生成TAG[<span class="hotspot" onmouseover="tooltip.show('设置是否生成TAG！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>0/不生成/1/生成
		
'area_html'=>'0',
		
//生成地区[<span class="hotspot" onmouseover="tooltip.show('设置是否生成地区！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>0/不生成/1/生成

//}


//site-列表缓存{
'list_cache'=>'1',

//列表缓存[<span class="hotspot" onmouseover="tooltip.show('是否启用php缓存，强烈推荐开启此项！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>0/关/1/开

'list_cache_time'=>'3600',

//缓存时间[<span class="hotspot" onmouseover="tooltip.show('设置缓存更新的时间，单位（秒）！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

//}

//site-分页{
'manage_pagesize'=>'8',

//后台分页数量[<span class="hotspot" onmouseover="tooltip.show('设置后台内容列表分页数量！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'list_pagesize'=>'12',

//前台分页数量[<span class="hotspot" onmouseover="tooltip.show('设置前台全站内容列表分页数量，如栏目单独设置分页，优先按栏目设置显示！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]
//}

//site-搜索{
'maxhotkeywordnum'=>'50',

//搜索基数[<span class="hotspot" onmouseover="tooltip.show('热门关键词获取条件，大于基数的为热门关键词！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]
//}



//archive-文章系统{
'archive_introducelen'=>'200',

//内容系统简介自动截取长度[<span class="hotspot" onmouseover="tooltip.show('自动获取内容中前200字符为内容简介！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]
//}


//security-字符过滤{
'filter_word'=>'陈水扁', 

//过滤字符[<span class="hotspot" onmouseover="tooltip.show('网站内容中被过滤替换掉的字符，多个请用“,”隔开！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'filter_x'=>'(*该人已被收押*)', 

//替代字符[<span class="hotspot" onmouseover="tooltip.show('网站内容中被过滤替换掉的字符，多个请用“,”隔开！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]
//}

//site-缩略图{
'thumb_width'=>'150',

//宽度[<span class="hotspot" onmouseover="tooltip.show('设置网站缩略图宽度，单位（PX）！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'thumb_height'=>'120',

//高度[<span class="hotspot" onmouseover="tooltip.show('设置网站缩略图高度，单位（PX）！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]
//}

//site-开关设置{
'verifycode'=>'1', 

//验证码开关[<span class="hotspot" onmouseover="tooltip.show('设置网站是否启用验证码！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>0/关/1/开

'reg_on'=>'1', 

//注册开关[<span class="hotspot" onmouseover="tooltip.show('设置网站是否启用会员系统！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>0/关/1/开

'isdebug'=>'1', 

//调试开关[<span class="hotspot" onmouseover="tooltip.show('设置网站是否显示PHP运行错误代码！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>0/关/1/开

'opguestadd'=>'1', 

//游客投稿开关[<span class="hotspot" onmouseover="tooltip.show('设置网站是否启用匿名发布内容，游客发布地址：http://域名/?g=1！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>0/关/1/开

'nav_blank'=>'0', 

//栏目打开方式[<span class="hotspot" onmouseover="tooltip.show('设置网站导航链接是否在新窗口打开！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>0/关/1/开

'isautobak'=>'0', 

//数据库自动备份[<span class="hotspot" onmouseover="tooltip.show('数据库可以按日周月自动备份！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>0/关/1/每日/2/每周/3/每月
//}

//缩略图
'smallimage_open' => 1,
'smallimage_width' => 200,
'smallimage_height' => 200,
'smallimage_path' => '/smallimages', 

//相对于upload文件夹而言

//image-图片水印{
'watermark_open'=>'0', 

//水印开关=>0/关/1/开

'watermark_min_width'=>'300',

//最小宽度[<span class="hotspot" onmouseover="tooltip.show('当上传的图片宽度小于设置宽度，不添加水印！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'watermark_min_height'=>'300',

//最小高度[<span class="hotspot" onmouseover="tooltip.show('当上传的图片高度小于设置高度，不添加水印！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'watermark_path'=>'/images/logo.png',

//水印路径[<span class="hotspot" onmouseover="tooltip.show('水印图片支持jpg、gif、png格式！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>image

'watermark_ts'=>'80',

//透明度[<span class="hotspot" onmouseover="tooltip.show('范围为 （1~100 ）的整数，数值越小水印图片越透明！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'watermark_qs'=>'90',

//JPEG图片质量[<span class="hotspot" onmouseover="tooltip.show('范围为（ 0~100 ）的整数，数值越大结果图片效果越好！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'watermark_pos'=>'5',

//添加位置[<span class="hotspot" onmouseover="tooltip.show('请在此选择水印添加的位置（3x3 共9个位置可选）');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>1/1/2/2/3/3/4/4/5/5/6/6/7/7/8/8/9/9
//}

//upload-附件设置{
'upload_filetype'=>'jpg,gif,bmp,jpeg,png,doc,zip,rar,7z,txt,sql,pdf,JPG,GIF,BMP,JPEG,PNG,TXT,SQL,PDF', 

//附件类型[<span class="hotspot" onmouseover="tooltip.show('设置添加上传附件的类型，多个后缀用","隔开！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'upload_max_filesize'=>'2', 

//附件大小[<span class="hotspot" onmouseover="tooltip.show('设置上传附件小小上限，单位(MB)！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]
'mods'=>'celive',
//}

//template-模板设置{
'template_dir'=>'20091101',

//前台模板选择[默认default]

'admin_template_dir'=>'admin', 

//后台模板目录[<span class="hotspot" onmouseover="tooltip.show('默认admin！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]
//}

//ballot-投票设置{
'checkip'=>'1',

//验证IP[<span class="hotspot" onmouseover="tooltip.show('设置投票是否开启IP限制，开启后，同一IP只需投票一次！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>0/关/1/开

'timer'=>'60',

//时间间隔[<span class="hotspot" onmouseover="tooltip.show('设置同一IP投票的限制时间，单位:分钟！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]
//}

//enlarge-网站客服信息{
'ifonserver'=>'0', 

//开启前台客服[<span class="hotspot" onmouseover="tooltip.show('设置是否在网站中显示悬浮客服侧栏！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>1/开启/0/关闭

'webserver'=>'close', 

//开启WEB客服[<span class="hotspot" onmouseover="tooltip.show('设置是否启用网站WEB客服系统！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>open/开启/close/关闭

'boxopen'=>'close',

//默认展开客服列表[<span class="hotspot" onmouseover="tooltip.show('设置网站悬浮客服侧栏默认展开状态！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>open/开启/close/关闭

'liveboxtip'=>'0', 

//弹出邀请对话框[<span class="hotspot" onmouseover="tooltip.show('设置是否弹出主动要请对话框！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>1/开启/0/关闭

'address'=>'再丰包装有限公司网',

//联系地址[<span class="hotspot" onmouseover="tooltip.show('填写联系地址！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'tel'=>'0769-81128566',

//联系电话[<span class="hotspot" onmouseover="tooltip.show('填写联系电话！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'mobile'=>'13712055355',

//移动电话[<span class="hotspot" onmouseover="tooltip.show('填写移动电话号码！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'fax'=>'xxxx-xxxxxxxxx',

//传真[<span class="hotspot" onmouseover="tooltip.show('填写传真号码！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'email'=>'',

//email[<span class="hotspot" onmouseover="tooltip.show('填写联系邮箱！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'postcode'=>'136000',

//邮政编码[<span class="hotspot" onmouseover="tooltip.show('填写邮政编码！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'qq1'=>'279805', 

//站长QQ[<span class="hotspot" onmouseover="tooltip.show('填写联系QQ号码！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'qq2'=>'', 

//售前QQ

'qq3'=>'', 

//售后QQ

'qq4'=>'',

//售后QQ

'qq5'=>'',

//售后QQ

'wangwang'=>'', 

//阿里旺旺

'skype'=>'', 

//Skype

'msn'=>'', 

//Msn

//}

//ditu-地图设置{
'ditu_width'=>'640', 

//地图宽度[<span class="hotspot" onmouseover="tooltip.show('填写地图的宽度，例如：360！，单位（PX）！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'ditu_height'=>'460', 

//地图高度[<span class="hotspot" onmouseover="tooltip.show('填写地图的高度，例如：300！，单位（PX）！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'ditu_center_left'=>'116.47033', 

//地图-经度[<span class="hotspot" onmouseover="tooltip.show('填写地图的经度！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'ditu_center_right'=>'39.919009', 

//地图-纬度[<span class="hotspot" onmouseover="tooltip.show('填写地图的纬度！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'ditu_level'=>'12',

//显示级别[<span class="hotspot" onmouseover="tooltip.show('填写地图的显示级别！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'ditu_title'=>'再丰包装有限公司',

//信息窗标题[<span class="hotspot" onmouseover="tooltip.show('填写地图坐标点提示信息标题！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'ditu_content'=>'<br>联系人：郑先生<br>电话：0769-81128566<br>手机：13712055355',

//信息窗内容[<span class="hotspot" onmouseover="tooltip.show('填写地图坐标点提示信息内容！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'ditu_maker_left'=>'116.47033',

//标记点经度[<span class="hotspot" onmouseover="tooltip.show('填写地图坐标点经度！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'ditu_maker_right'=>'39.919009',

//标记点纬度[<span class="hotspot" onmouseover="tooltip.show('填写地图坐标点提示纬度！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'ditu_explain'=>'',

//使用说明

//}

//mail-邮件设置{
	
'send_type'=>'2', 

//邮件发送方式[<span class="hotspot" onmouseover="tooltip.show('设置邮件发送模式！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>0/请选择/1/Sendmail/2/SOCKET/3/PHP函数

'header_var'=>'1', 

//邮件头的分隔符=>99/请选择/1/CRLF分隔符(Windows)/0/LF分隔符(Unix|Linux)/2/CR分隔符(Mac)

'kill_error'=>'1', 

//屏蔽错误提示=>0/否/1/是

//}


//mail-SOCKET{
	
'smtp_mail_host'=>'smtp.qq.com', 

//SMTP服务器

'smtp_mail_port'=>'25', 

//SMTP端口

'smtp_mail_auth'=>'1',

//要求身份验证=>0/否/1/是

'smtp_user_add'=>'admin@admin.com', 

//发信人地址

'smtp_mail_username'=>'admin', 

//用户名

'smtp_mail_password'=>'admin', 

//密码

//}

//mail-PHP函数{
	
'smtp_host'=>'smtp.qq.com',

//SMTP服务器

'smtp_port'=>'25', 

//SMTP端口

//}


//slide-幻灯片设置{
'slide_width'=>'990',

//幻灯宽度[<span class="hotspot" onmouseover="tooltip.show('设置幻灯片的显示宽度！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'slide_height'=>'284',

//幻灯高度[<span class="hotspot" onmouseover="tooltip.show('设置幻灯片的显示高度！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'slide_number'=>'4', 

//幻灯片[<span class="hotspot" onmouseover="tooltip.show('设置幻灯片的数量，小于或等于5！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'slide_time'=>'5', 

//自动播放时间[<span class="hotspot" onmouseover="tooltip.show('上传幻灯中的图片！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'slide_text_color'=>'0xffffff', 

//文字颜色[<span class="hotspot" onmouseover="tooltip.show('上传幻灯中的图片！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'slide_text_bg'=>'0x0099ff', 

//文字背景颜色[<span class="hotspot" onmouseover="tooltip.show('上传幻灯中的图片！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'slide_btn_transparent'=>'20', 

//文字背景透明度[<span class="hotspot" onmouseover="tooltip.show('上传幻灯中的图片！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'slide_btn_text_color'=>'0xffffff', 

//按键数字颜色[<span class="hotspot" onmouseover="tooltip.show('上传幻灯中的图片！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'slide_btn_hover_color'=>'0x0099ff', 

//当前按键颜色[<span class="hotspot" onmouseover="tooltip.show('上传幻灯中的图片！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'slide_btn_color'=>'0x000000', 

//普通按键色[<span class="hotspot" onmouseover="tooltip.show('上传幻灯中的图片！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]



'slide_pic1'=>'upload/images/201302/13619714574673.jpg',

//图片1地址[<span class="hotspot" onmouseover="tooltip.show('上传幻灯中的图片！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>image

'slide_pic1_title'=>'静电纸 产品图1',

//图片1标题[<span class="hotspot" onmouseover="tooltip.show('填写幻灯中的标题！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'slide_pic1_url'=>'http://www.zaifengbz.com/index.php?case=archive&act=show&aid=25',

//图片1链接地址[<span class="hotspot" onmouseover="tooltip.show('填写幻灯的点击链接地址，注意链接中的&要用%26替换！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'slide_pic2'=>'upload/images/201302/13619714956133.jpg', 

//图片2地址[<span class="hotspot" onmouseover="tooltip.show('上传幻灯中的图片！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>image

'slide_pic2_title'=>'静电纸 产品图2', 

//图片2标题[<span class="hotspot" onmouseover="tooltip.show('填写幻灯中的标题！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'slide_pic2_url'=>'http://www.zaifengbz.com/index.php?case=archive&act=show&aid=25', 

//图片2链接地址[<span class="hotspot" onmouseover="tooltip.show('填写幻灯的点击链接地址，注意链接中的&要用%26替换！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'slide_pic3'=>'upload/images/201302/13619715342405.jpg', 

//图片3地址[<span class="hotspot" onmouseover="tooltip.show('上传幻灯中的图片！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>image

'slide_pic3_title'=>'静电纸 产品图3',

//图片3标题[<span class="hotspot" onmouseover="tooltip.show('填写幻灯中的标题！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'slide_pic3_url'=>'http://www.zaifengbz.com/index.php?case=archive&act=show&aid=25',

//图片3链接地址[<span class="hotspot" onmouseover="tooltip.show('填写幻灯的点击链接地址，注意链接中的&要用%26替换！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'slide_pic4'=>'upload/images/201302/13619715617595.jpg',

//图片4地址[<span class="hotspot" onmouseover="tooltip.show('上传幻灯中的图片！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>image

'slide_pic4_title'=>'http://www.zaifengbz.com/index.php?case=archive&act=show&aid=25', //图片4标题[<span class="hotspot" onmouseover="tooltip.show('填写幻灯中的标题！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'slide_pic4_url'=>'',

//图片4链接地址[<span class="hotspot" onmouseover="tooltip.show('填写幻灯的点击链接地址，注意链接中的&要用%26替换！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'slide_pic5'=>'',

//图片5地址[<span class="hotspot" onmouseover="tooltip.show('上传幻灯中的图片！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>image

'slide_pic5_title'=>'', 

//图片5标题[<span class="hotspot" onmouseover="tooltip.show('填写幻灯中的标题！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'slide_pic5_url'=>'',

//图片5链接地址[<span class="hotspot" onmouseover="tooltip.show('填写幻灯的点击链接地址，注意链接中的&要用%26替换！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

//}

//cslide-内页切换图片{
'cslide_pic1'=>'images/banner/01.jpg',

//图片1链接地址[<span class="hotspot" onmouseover="tooltip.show('填写内页幻灯的点击链接地址，注意链接中的&要用%26替换！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>image

'cslide_pic2'=>'images/banner/02.jpg',

//图片1链接地址[<span class="hotspot" onmouseover="tooltip.show('填写内页幻灯的点击链接地址，注意链接中的&要用%26替换！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>image

'cslide_pic3'=>'images/banner/03.jpg',

//图片1链接地址[<span class="hotspot" onmouseover="tooltip.show('填写内页幻灯的点击链接地址，注意链接中的&要用%26替换！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>image

//}

'$mF'=>array(

    "mF_fscreen_tb","mF_YSlider","mF_luluJQ","mF_51xflash","mF_expo2010","mF_games_tb",
    "mF_ladyQ","mF_liquid","mF_liuzg","mF_pithy_tb","mF_qiyi","mF_quwan","mF_rapoo",
    "mF_sohusports","mF_taobao2010","mF_taobaomall","mF_tbhuabao","mF_pconline","mF_peijianmall",
    "mF_classicHC","mF_classicHB","mF_slide3D","mF_kiki",
    
    ),
    
//ifocus-焦点图设置{
'ifocus_width'=>'450', 

//焦点图幻灯宽度[<span class="hotspot" onmouseover="tooltip.show('设置焦点图幻灯的显示宽度！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'ifocus_height'=>'280', 

//焦点图幻灯高度[<span class="hotspot" onmouseover="tooltip.show('设置焦点图幻灯的显示高度！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'ifocus_number'=>'5', 

//幻灯片数量[<span class="hotspot" onmouseover="tooltip.show('设置焦点图幻灯的数量，小于或等于5！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'ifocus_time'=>'3', 

//切换时间间隔[<span class="hotspot" onmouseover="tooltip.show('设置焦点图幻灯的切换时间间隔，单位秒！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'ifocus_pattern'=>'mF_fscreen_tb', 

//风格应用选择=>$mF

'ifocus_pic1'=>'images/ifocus/1.jpg',

//图片1地址[<span class="hotspot" onmouseover="tooltip.show('上传焦点图幻灯中的图片！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>image

'ifocus_pic1_title'=>'  誉百度工作室',

//图片1标题[<span class="hotspot" onmouseover="tooltip.show('填写焦点图幻灯中的标题！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'ifocus_pic1_url'=>'http://www.yubaidu.net', 

//图片1链接地址[<span class="hotspot" onmouseover="tooltip.show('填写焦点图幻灯图片的点击链接地址，注意链接中的&要用%26替换！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'ifocus_pic2'=>'images/ifocus/2.jpg',

//图片2地址[<span class="hotspot" onmouseover="tooltip.show('上传焦点图幻灯中的图片！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>image

'ifocus_pic2_title'=>'   誉百度工作室', 

//图片2标题[<span class="hotspot" onmouseover="tooltip.show('填写焦点图幻灯中的标题！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'ifocus_pic2_url'=>' http://www.yubaidu.net',

//图片2链接地址[<span class="hotspot" onmouseover="tooltip.show('填写幻灯的点击链接地址，注意链接中的&要用%26替换！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'ifocus_pic3'=>'images/ifocus/3.jpg',

//图片3地址[<span class="hotspot" onmouseover="tooltip.show('上传焦点图幻灯中的图片！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>image

'ifocus_pic3_title'=>'   誉百度工作室',

//图片3标题[<span class="hotspot" onmouseover="tooltip.show('填写焦点图幻灯中的标题！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'ifocus_pic3_url'=>' http://www.yubaidu.net',

//图片3链接地址[<span class="hotspot" onmouseover="tooltip.show('填写幻灯的点击链接地址，注意链接中的&要用%26替换！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'ifocus_pic4'=>'images/ifocus/4.jpg', 

//图片4地址[<span class="hotspot" onmouseover="tooltip.show('上传焦点图幻灯中的图片！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>image

'ifocus_pic4_title'=>'   誉百度工作室',

//图片4标题[<span class="hotspot" onmouseover="tooltip.show('填写焦点图幻灯中的标题！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'ifocus_pic4_url'=>' http://www.yubaidu.net',

//图片4链接地址[<span class="hotspot" onmouseover="tooltip.show('填写幻灯的点击链接地址，注意链接中的&要用%26替换！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'ifocus_pic5'=>'images/ifocus/5.jpg',

//图片5地址[<span class="hotspot" onmouseover="tooltip.show('上传焦点图幻灯中的图片！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>image

'ifocus_pic5_title'=>'   誉百度工作室', 

//图片5标题[<span class="hotspot" onmouseover="tooltip.show('填写焦点图幻灯中的标题！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'ifocus_pic5_url'=>'http://www.yubaidu.net',

//图片5链接地址[<span class="hotspot" onmouseover="tooltip.show('填写幻灯的点击链接地址，注意链接中的&要用%26替换！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

//}

//sms-短信设置{
'sms_username'=>'', 

//用户名[<span class="hotspot" onmouseover="tooltip.show('请输入短信平台注册时填写的用户名！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>&nbsp&nbsp;<a href=http://pay.cmseasy.cn/reg.php target=_blank>注册用户</a>]

'sms_password'=>'', 

//密码[<span class="hotspot" onmouseover="tooltip.show('请输入短信平台注册时填写的密码！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'sms_on'=>'0', 

//短信开关[<span class="hotspot" onmouseover="tooltip.show('设置是否开启短信通知功能！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>1/开启/0/关闭

'sms_keyword'=>'共产党,江泽民', 

//替换非法字符[<span class="hotspot" onmouseover="tooltip.show('设置屏蔽短信中的非法字符，多个字符用英文逗号分隔！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'sms_maxnum'=>'10',  

//最多发送[<span class="hotspot" onmouseover="tooltip.show('每天发送的最大条数！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'sms_reg_on'=>'1',  

//注册发送[<span class="hotspot" onmouseover="tooltip.show('设置用户注册后，是否发送欢迎短信！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>1/是/0/否

'sms_reg'=>'欢迎你注册xxx网站', 

//注册发送内容[<span class="hotspot" onmouseover="tooltip.show('设置用户注册后，欢迎短信内容！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'sms_guestbook_on'=>'1', 

//留言发送[<span class="hotspot" onmouseover="tooltip.show('设置客户确认留言后，是否向客户发送确认收到留言通知！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>1/是/0/否

'sms_guestbook'=>'谢谢你的留言',

//留言发送内容[<span class="hotspot" onmouseover="tooltip.show('设置客户确认留言后，向客户发送确认收到留言通知内容！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'sms_order_on'=>'1', 

//订单发送=>1/是/0/否

'sms_order'=>'感谢你的订单',

//订单发送内容[<span class="hotspot" onmouseover="tooltip.show('设置客户确认订单后，向客户发送确认收到订单内容！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'sms_form_on'=>'1', 

//表单发送[<span class="hotspot" onmouseover="tooltip.show('设置客户确认留言后，是否向客户发送确认表单内容！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>1/是/0/否

'sms_form'=>'谢谢你的参与', 

//表单发送内容[<span class="hotspot" onmouseover="tooltip.show('设置客户确认表单后，向客户发送确认收到表单内容！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'sms_guestbook_admin_on'=>'1',

//确认留言[<span class="hotspot" onmouseover="tooltip.show('客户确认留言后，是否向管理员发送通知！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>1/是/0/否

'sms_form_admin_on'=>'1',

//确认表单[<span class="hotspot" onmouseover="tooltip.show('客户确认表单后，是否向管理员发送通知！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>1/是/0/否

'sms_order_admin_on'=>'1', 

//确认订单[<span class="hotspot" onmouseover="tooltip.show('客户确认订单后，是否向管理员发送通知！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>1/是/0/否

'sms_consult_admin_on'=>'1',  

//开启咨询[<span class="hotspot" onmouseover="tooltip.show('是否开启页底右侧悬浮短信咨询！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]=>1/是/0/否

//}

//cnzz-cnzz统计配置{
'cnzz_user'=>'81271233', 

//不要修改！[<span class="hotspot" onmouseover="tooltip.show('自动生成,请牢记,每域名只赠送一个全景帐号！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]

'cnzz_pass'=>'2586831878',

//不要修改！[<span class="hotspot" onmouseover="tooltip.show('自动生成,请牢记,每域名只赠送一个全景帐号！');" onmouseout="tooltip.hide();"><img src="./images/remind.gif" alt="" width="14" height="20" style="margin-left:10px; margin-right:5px; /"></span>]
//}
);

