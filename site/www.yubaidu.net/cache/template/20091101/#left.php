<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<table width="904" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:16px;">
      <tr>
        <td width="180" valign="top" bgcolor="#F3F3F3"><table width="180" border="0" cellspacing="0" cellpadding="0">
<tr>
            <td height="29" class="navbt"><strong>网站公告</strong><img src="<?php echo $skin_path;?>/split2.gif" width="1" height="7" align="absmiddle" style="margin-left:5px; margin-right:5px;" /><span class="en10">LIST</span></td>
          </tr>
          <tr>
            <td>
            <div id="nav">
            	<?php foreach(announ(5) as $an) { ?>
<a href="<?php echo $an['url'];?>" target="_blank"><?php echo $an['title'];?></a>
<?php } ?>
</div></td>
          </tr>
  <tr>
            <td height="20"> </td>
          </tr>
  	
<!--只展开当前栏目所在一级栏目下的分类-->
<?php $__pid = getcategoryparentsid($catid);?>
<tr>
            <td height="29" class="navbt"><strong>+ <?php echo lang(quicknav);?></strong><img src="<?php echo $skin_path;?>/split2.gif" width="1" height="7" align="absmiddle" style="margin-left:5px; margin-right:5px;" /></td>
          </tr>
<tr>
            <td>
            <div id="nav">
<?php foreach(categories_nav() as $t) { ?>
<?php if($t['catid']==$__pid) { ?>
<!-- <?php foreach(category::listcategorydata($__pid) as $type) { ?> -->
<a href="<?php echo $type['url'];?>" title="<?php echo $type['catname'];?>"<?php if($type['catid']==$catid) { ?> class="on<?php } ?>"><?php echo $type['catname'];?></a>
<!-- <?php } ?> -->
<?php } ?>
<?php } ?>

</div>
</td>
          </tr>
          <tr>
            <td height="5"> </td>
          </tr>
<!--只展开当前栏目所在一级栏目下的分类-->




          <tr>
            <td style="padding:0px 5px;">

<script type=text/Javascript>
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>

<select class=blueinput onchange="MM_jumpMenu('parent',this,true)" name=link1 style="width:170px;" >
<option value="<?php echo $t['url'];?>">    产品分类</option>

<?php foreach(categories(3) as $t1) { ?>
<option value="<?php echo $t1['url'];?>">    <?php echo $t1['catname'];?></option>
<?php } ?>

</select>
</td>
          </tr>
  <tr>
            <td height="20"> </td>
          </tr>
          
          
        </table>