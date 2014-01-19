<?php
$config = array();

$array = array(
'URL_MODEL'             => 0,
'SHOW_PAGE_TRACE' =>false,
'OUTPUT_CHARSET'=>'gb2312', //输出编码设置   
'DB_CHARSET' =>'gb2312', //数据库编码设置   
'TEMPLATE_CHARSET' => 'gb2312', //模板编码设置  
'DEFAULT_CHARSET'=> 'gb2312',//默认编码
'TMPL_ACTION_SUCCESS' => 'public:success',
'TMPL_ACTION_ERROR' => 'public:error',
'LANG_SWITCH_ON'=>true,
'DEFAULT_LANG'=>'zh-cn',
'LANG_AUTO_DETECT'=>true,

'LANG_LIST'=>'zh-cn'
);

return $array;


?>