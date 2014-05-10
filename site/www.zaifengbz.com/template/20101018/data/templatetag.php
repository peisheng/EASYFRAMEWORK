<?php return array (
  0 => 
  array (
    'id' => '1',
    'name' => '首页滚动图片',
    'tagfrom' => 'content',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '0',
      'typeid' => '0',
      'spid' => '0',
      'province_id' => '0',
      'city_id' => '0',
      'section_id' => '0',
      'length' => '10',
      'ordertype' => 'aid-desc',
      'limit' => '15',
      'thumb' => 'on',
      'attr1' => '0',
      'tagtemplate' => 'tag_content_i_pic.html',
      'submit' => '提交',
    ),
  ),
  3 => 
  array (
    'id' => '3',
    'name' => '首页产品中心栏目',
    'tagfrom' => 'category',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '3',
      'tagtemplate' => 'tag_category.html',
      'submit' => '提交',
      'catname' => '',
      'htmldir' => '',
    ),
  ),
  5 => 
  array (
    'id' => '5',
    'name' => '首页新闻4条',
    'tagfrom' => 'content',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '2',
      'typeid' => '0',
      'spid' => '0',
      'province_id' => '0',
      'city_id' => '0',
      'section_id' => '0',
      'length' => '20',
      'ordertype' => 'aid-desc',
      'limit' => '4',
      'attr1' => '0',
      'tagtemplate' => 'tag_content_date.html',
      'submit' => '提交',
    ),
  ),
  6 => 
  array (
    'id' => 6,
    'name' => '首页联系我们栏目',
    'tagfrom' => 'category',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '5',
      'tagtemplate' => 'tag_category.html',
      'submit' => '提交',
      'catname' => '',
      'htmldir' => '',
    ),
  ),
  7 => 
  array (
    'id' => 7,
    'name' => '首页企业新闻栏目',
    'tagfrom' => 'category',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '2',
      'tagtemplate' => 'tag_category.html',
      'submit' => '提交',
      'catname' => '',
      'htmldir' => '',
    ),
  ),
  8 => 
  array (
    'id' => '8',
    'name' => '首页新闻图文1条',
    'tagfrom' => 'content',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '2',
      'typeid' => '0',
      'spid' => '0',
      'province_id' => '0',
      'city_id' => '0',
      'section_id' => '0',
      'length' => '20',
      'ordertype' => 'aid-desc',
      'limit' => '1',
      'thumb' => 'on',
      'attr1' => '0',
      'tagtemplate' => 'tag_content_pic_text.html',
      'submit' => '提交',
    ),
  ),
  9 => 
  array (
    'id' => 9,
    'name' => '首页全部分类',
    'tagcontent' => '{loop type() $i $t} <a title="{$t[typename]}" target="_blank" href="{$t[url]}">{$t[typename]}</a> {/loop}',
    'tagfrom' => 'define',
    'setting' => 
    array (
      'onlymodify' => '',
      'submit' => '提交',
      'catname' => '',
      'htmldir' => '',
    ),
  ),

  11 => 
  array (
    'id' => 11,
    'name' => '左侧专题列表',
    'tagcontent' => '<div class="box1"> <div class="title"> <div class="lanwd">{lang(contentspecial)}</div> <div class="english">/ Special</div> </div> <div class="content"> <ul class="ul2"> <!-- {loop special::listdata() $special} --> <li><a href="{$special[url]}" title="{$special[title]}">{$special[title]}</a></li> <!-- {/loop} --> </ul> </div> </div> <div class="blank10"></div>',
    'tagfrom' => 'define',
    'setting' => 
    array (
      'onlymodify' => '',
      'submit' => '提交',
      'catname' => '',
      'htmldir' => '',
    ),
  ),
  12 => 
  array (
    'id' => 12,
    'name' => '左侧地区列表',
    'tagcontent' => '<div class="box1"> <div class="title"> <div class="lanwd">{lang(arealist)}</div> <div class="english">/ Arealist</div> </div> <div class="content"> <ul class="ul2"> <!-- {loop area::listdata(0,50) $area} --> <a href="{$area[url]}" title="{$area[name]}">{$area[shortname]}</a> <!-- {/loop} --> </ul> </div> </div> <div class="blank10"></div>',
    'tagfrom' => 'define',
    'setting' => 
    array (
      'onlymodify' => '',
      'submit' => '提交',
      'catname' => '',
      'htmldir' => '',
    ),
  ),
  13 => 
  array (
    'id' => '13',
    'name' => '左侧联系我们',
    'tagcontent' => '<div class="box1"> <div class="title"> <div class="lanwd">{lang(contactus)}</div> <div class="english">/ CONTACT US</div> </div> <div class="content"> <div class="p1g"> <ul class="ul2g"> <li>{lang(address)}：{get(address)}</li> <li>{lang(tel)}：{get(tel)}</li> <li>{lang(fax)}：{get(fax)}</li> <li>{lang(email)}：{get(email)}</li> </ul></div> 
<form name="listform" id="listform"  action="index.php?case=archive&act=email" method="post">
 <input type="text" name="email" class="mail" value=""> <input type="submit" value=" " name="submit" class="mailbtn" /> </form> <div class="blank10"></div> <div class="blank10"></div> </div> </div>',
    'tagfrom' => 'define',
    'setting' => 
    array (
      'onlymodify' => '',
      'submit' => '提交',
    ),
  ),
  14 => 
  array (
    'id' => '14',
    'name' => '左侧订单查询',
    'tagcontent' => '<div class="box1"> <div class="title2"> <div class="lanwd2">{lang(vieworders)}</div> <div class="english2">/ Order</div> </div> <div class="content"> <div class="blank10"></div> <input size="20" id="oid" class="oid" name="oid" type="text" align="absmiple"value=" {lang(orderid)}… " "if(this.value==\' {lang(orderid)}… \') {this.value=\'\'}" onblur="if(this.value==\'\') this.value=\' {lang(orderid)}… \'" /><input type="submit" id="search_btn" align="absmiple" name=\'submit\' value=" {lang(look)} " "(script removed)window.location.href=\'＜?php echo url(\'archive/orders\');?＞&oid=\'+document.getElementById(\'oid\').value;" class="oidbtn" />
<div class="blank10"></div> </div> </div> <div class="blank10"></div>',
    'tagfrom' => 'define',
    'setting' => 
    array (
      'onlymodify' => '',
      'submit' => '提交',
    ),
  ),
  15 => 
  array (
    'id' => 15,
    'name' => '网站页底关于我们等说明',
    'tagfrom' => 'content',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '1',
      'typeid' => '0',
      'spid' => '0',
      'province_id' => '0',
      'city_id' => '0',
      'section_id' => '0',
      'length' => '4',
      'ordertype' => 'aid-desc',
      'limit' => '6',
      'attr1' => '0',
      'tagtemplate' => 'tag_content_foot.html',
      'submit' => '提交',
      'catname' => '',
      'htmldir' => '',
    ),
  ),
  16 => 
  array (
    'id' => 16,
    'name' => '公司简介',
    'tagcontent' => '公司简介……',
    'tagfrom' => 'define',
    'setting' => 
    array (
      'onlymodify' => '',
      'submit' => '提交',
      'catname' => '',
      'htmldir' => '',
    ),
  ),
  17 => 
  array (
    'id' => 17,
    'name' => '首页职位招聘4条',
    'tagfrom' => 'content',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '7',
      'typeid' => '0',
      'spid' => '0',
      'province_id' => '0',
      'city_id' => '0',
      'section_id' => '0',
      'length' => '20',
      'ordertype' => 'aid-desc',
      'limit' => '4',
      'attr1' => '0',
      'tagtemplate' => 'tag_content.html',
      'submit' => '提交',
      'catname' => '',
      'htmldir' => '',
      'introduce' => '...',
    ),
  ),
  18 => 
  array (
    'id' => 18,
    'name' => '首页文档下载10条',
    'tagfrom' => 'content',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '6',
      'typeid' => '0',
      'spid' => '0',
      'province_id' => '0',
      'city_id' => '0',
      'section_id' => '0',
      'length' => '20',
      'ordertype' => 'aid-desc',
      'limit' => '10',
      'attr1' => '0',
      'tagtemplate' => 'tag_content_down.html',
      'submit' => '提交',
      'catname' => '',
      'htmldir' => '',
      'introduce' => '...',
    ),
  ),
  19 => 
  array (
    'id' => 19,
    'name' => 'aa',
    'tagfrom' => 'category',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '1',
      'catname' => 'on',
      'tagtemplate' => 'tag_category.html',
      'submit' => '提交',
      'htmldir' => '',
      'introduce' => '...',
    ),
  ),
);