<?PHP
if (!defined('VERSON'))
{
	exit('Access Defined');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<!--{template headerjs}-->

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php echo $page_title ?></title>
<meta name="keywords" content="<?php echo $page_keyword ?>" />
<meta name="description" content="<?php echo $page_discription ?>" />
<link rel="Shortcut Icon" href="favicon.ico">
<link rel="Bookmark" href="favicon.ico">
<link href="css/taodi_bhtbwcom.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="js/common.js"></script>

</head>
<body>
<div class="all">

<!--{template header}-->


<div class="main">

   <!--{if !$indexvalue[height]}--><!--{eval $indexvalue[height]=2000;}--><!--{/if}--> 
    	<center><div style="width:100%; text-align:center; overflow:hidden; clear:both; margin-top:0px; margin-bottom:0px;"><div style="height:<!--{eval echo($indexvalue[height]+$indexvalue[hidentop]) }-->px; margin-top:-{$indexvalue[hidentop]}px;"><iframe frameborder="0" marginheight="0" marginwidth="0" border="0" id="alimamaifrm" name="alimamaifrm" scrolling="no" height="<!--{eval echo($indexvalue[height]+$indexvalue[hidentop]) }-->px" width="100%" src="$indexvalue[urltxt]" ></iframe></div></div></center>



<div class="bot"></div>
</div>

<!--{template footer}-->

</div>                                                                                                                                                            </body>
</html>