<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<script language="JavaScript">
bg = new Array(3);
bg[0] = '<?php echo $base_url;?>/<?php echo get(cslide_pic1);?>'
bg[1] = '<?php echo $base_url;?>/<?php echo get(cslide_pic2);?>'
bg[2] = '<?php echo $base_url;?>/<?php echo get(cslide_pic3);?>'

index = Math.floor(Math.random() * bg.length);
document.write("<img src="+bg[index]+" />");
</script>