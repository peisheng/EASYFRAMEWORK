<?php

//本页面为隐藏配置，建议新手不要做任何修改。熟悉淘客帝国程序者可以酌情修改，具体含义都已经备注写清楚，请自行理解。

//模板说明
$temptitle = "红色风综合商城";
$tempabout = "红色风综合商城，定制模板。";

$default_soft_lang = "GBK";
$template_is_old = TRUE;  //旧版本模版代码。程序自动设置一些支持程序。
$TaoConfig["applicationdata"]["GJconfig"]["listlinktype"]="taobao";//设置列表页直接 跳转推广链接，不进入详情页。


//下面是首页模块的设置
/* 首页可用的模块ID
11=>"首页切换图及登陆框",
12=>"综合分类导航",
13=>"瀑布流首页模块类型",
21=>"淘宝推广频道",
1=>"淘宝店铺(淘宝API)",				
2=>"淘宝限时打折(淘宝API)",
3=>"淘宝普通推广(淘宝API)",
4=>"分享发布商品",
7=>"(分享)仅后台导入的",
5=>"B2C商品(b2c的API)",
6=>"文章栏目",
9=>"B2C商城列表",
10=>"指定淘宝卖家(淘宝API)",
15=>"拍拍商品(拍拍的API)",
13=>"自定义html模块",
8=>"网址URL");
*/

$CustomVariable = array();

$CustomVariable["AllowIndexConfig"]["is_add"]="1";//允许添加首页模块
$CustomVariable["AllowIndexConfig"]["is_del"]="1";//允许删除首页模块
$CustomVariable["AllowIndexConfig"]["is_sort"]="1";//允许首页模块调整顺序

//指定首页综合设置里可以设置的首页栏目类型,例如"1,2,3,12"则只限制这四种类型栏目。 如果无此变量则默认全部类型。非设计人员请勿改动
$CustomVariable["AllowIndexType"]="2,3,4,5,6,7,10,11,12,15,13,21"; 

//指定类型的首页栏目的自定义字段，用于模版里的栏目特殊参数设置，非模版设计人员请勿改动
$CustomVariable["CustomField"]=array();

//自定义的首页栏目的设置参数，中间的数字，代表栏目类型，后面的数字表示字段变量和名称。
$CustomVariable["CustomField"][2] = array("pronum"=>"商品数量");
$CustomVariable["CustomField"][3] = array("pronum"=>"商品数量");
$CustomVariable["CustomField"][4] = array("pronum"=>"商品数量");
$CustomVariable["CustomField"][5] = array("pronum"=>"商品数量","mall_id"=>"b2c商城ID");
$CustomVariable["CustomField"][6] = array("pronum"=>"文章数量");
$CustomVariable["CustomField"][7] = array("pronum"=>"商品数量");
$CustomVariable["CustomField"][10] = array("pronum"=>"商品数量");
$CustomVariable["CustomField"][15] = array("pronum"=>"商品数量");
$CustomVariable["CustomField"][12] = array("pronum"=>"热门活动数量");
$CustomVariable["CustomField"][21] = array("height"=>"高度(像素)","hidentop"=>"隐藏(像素)");

$CustomVariable["AllowIndexTitle"][11] = "首页轮播图及品牌旗舰店";


//设置类别对应的列表
$CustomVariable["AllowIndexTypeArr"][2] = 	array("title"=>"设置推荐类别","typelevel"=>1,"is_pic"=>0,"max_num"=>8);  //首页模块对应的列表 参数含义分别是：淘宝现时打折类型，设置推荐类别，可以设置一级类别，不带图片，导航数量最大为8，
$CustomVariable["AllowIndexTypeArr"][3] = 	array("title"=>"设置推荐类别","typelevel"=>1,"is_pic"=>0,"max_num"=>8);  
$CustomVariable["AllowIndexTypeArr"][4] = 	array("title"=>"设置推荐类别","typelevel"=>1,"is_pic"=>0,"max_num"=>8); 
$CustomVariable["AllowIndexTypeArr"][5] = 	array("title"=>"设置推荐类别","typelevel"=>1,"is_pic"=>0,"max_num"=>8); 
$CustomVariable["AllowIndexTypeArr"][7] = 	array("title"=>"设置推荐类别","typelevel"=>1,"is_pic"=>0,"max_num"=>8); 
$CustomVariable["AllowIndexTypeArr"][10] = 	array("title"=>"设置推荐类别","typelevel"=>1,"is_pic"=>0,"max_num"=>8); 

$CustomVariable["AllowIndexTypeArr"][11]["pinpai"] = 	array("title"=>"品牌旗舰店","typelevel"=>1,"is_pic"=>1,"max_num"=>6);  
$CustomVariable["AllowIndexTypeArr"][11]["tuijian"] = 	array("title"=>"推荐类别","typelevel"=>1,"is_pic"=>0,"max_num"=>4,"allow_tid"=>"2,3,4,5,7,10,15");  


$CustomVariable["AllowIndexTypeArr"][15] = 	array("title"=>"设置推荐类别","typelevel"=>1,"is_pic"=>0,"max_num"=>8); 
//自定义的列表
$CustomVariable["AllowIndexTypeArr"][12] = 	array("title"=>"编辑热门活动","typelevel"=>1,"is_pic"=>1,"max_num"=>10); 
$CustomVariable["AllowIndexTypeArr"][12]["base"] = 	array("title"=>"综合分类","typelevel"=>2,"is_pic"=>0); 
//文章模块类别设置
$CustomVariable["AllowIndexTypeArr"][6] = 	array("title"=>"文章类别","typelevel"=>1,"is_pic"=>0,"max_num"=>0,"allow_tid"=>"6"); 

//下面是导航模块的设置
/* 导航可用的模块ID
1=>"淘宝店铺(淘宝API)",
2=>"淘宝限时打折(淘宝API)",
3=>"淘宝普通推广(淘宝API)",
4=>"分享发布商品",
7=>"(分享)仅后台导入的",
5=>"B2C商品(b2c的API)",
6=>"文章栏目",
8=>"网址URL"
9=>"B2C商城",
10=>"指定淘宝卖家(淘宝API)",
15=>"拍拍商品(拍拍的API)",
*/

//指定导航设置里可以用的链接类型,例如"1,2,3,12"则只限制这四种类型栏目。 如果无此变量则默认全部类型。非设计人员请勿改动
$CustomVariable["AllowDaoHangType"]="1,2,3,5,6,7,8,10,15,21"; 

//设定配置中心设置的导航类型。
$CustomVariable["CustomDaohang"]["daohang"] = 	array("title"=>"主导航设置","typelevel"=>1,"is_pic"=>0);  //主导航参数
$CustomVariable["CustomDaohang"]["cidaohang"] = array("title"=>"辅导航","typelevel"=>2,"is_pic"=>0,"max_num"=>5);  //次导航
$CustomVariable["CustomDaohang"]["keyword"] = 	array("title"=>"热门搜索","typelevel"=>1,"is_pic"=>0);  //关键词导航
$CustomVariable["CustomDaohang"]["topdaohang"] = 	array("title"=>"顶部导航","typelevel"=>1,"is_pic"=>0);  //关键词导航

//导航类型页面的特殊参数
$CustomVariable["CustomDaohangField"][21] = array("height"=>"高度(像素)","hidentop"=>"隐藏(像素)");
$CustomVariable["CustomDaohangField"][5] = array("mall_id"=>"b2c商城ID");


//自定义变量，配置中心里可以设置，用于模版里判断用。
$CustomVariable["CustomSetField"]["SetSearch"] = array("memo"=>"自定义搜索代码","default"=>"","list"=>"textarea");  //公告。
$CustomVariable["CustomSetField"]["ProListSmalltypeKG"] = 	array("memo"=>"商品列表页子类别是否显示","default"=>"close","list"=>array("open"=>"显示","close"=>"不显示"));  //列表页是否显示子类别
$CustomVariable["CustomSetField"]["ProListSmallSortKG"] = 	array("memo"=>"商品列表页排序方式是否显示","default"=>"open","list"=>array("open"=>"显示","close"=>"不显示"));  //列表页是否显示子排序
$CustomVariable["CustomSetField"]["ProListKeyword"] = array("memo"=>"商品列表页推荐商品搜索词","default"=>"包邮","list"=>"no");  //文章页面推荐商品的数量设置。
$CustomVariable["CustomSetField"]["ProShiChang"] = array("memo"=>"市场价倍数比例","default"=>"1.3","list"=>"no");  //市场价比例。


//模版自带广告位
$CustomAdList=array();
$CustomAdList["tonglan"] = 		array("name"=>"通栏广告","height"=>"auto","width"=>"980","description"=>"所有页面的导航下面用。包括首页。长宽不限");
$CustomAdList["top"] = 			array("name"=>"最顶部的广告","height"=>"auto","width"=>"auto","description"=>"最顶部的广告，不限制长宽的。");
$CustomAdList["footer"] = 		array("name"=>"最低下的一排小图片","height"=>"auto","width"=>"auto","description"=>"最底下的一排图片，要修改在这个广告位改。");

$CustomAdList["paileft"] = 	array("name"=>"商品列表页左侧下方","height"=>"auto","width"=>"230","description"=>"商品列表页面左边分类下面的位置，高度不限制。");
//$CustomAdList["B2Cleft"] = 	array("name"=>"B2C列表页左侧下方","height"=>"auto","width"=>"230","description"=>"B2C列表页面左边分类下面的位置，高度不限制。");
//$CustomAdList["taoleft"] = 	array("name"=>"淘宝列表页左侧下方","height"=>"auto","width"=>"230","description"=>"淘宝列表页面左边分类下面的位置，高度不限制。");
//$CustomAdList["shareleft"] = 	array("name"=>"分享列表页左侧下方","height"=>"auto","width"=>"230","description"=>"淘宝分享列表页面左边分类下面的位置，高度不限制。");
//模版自定义后台设置变量


?>