<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<form name="listform" id="listform"  action="<?php echo uri();?>" method="post">
<div class="blank20"></div>
<div id="tagscontent" class="right_box">

<table border="0" cellspacing="0" cellpadding="0" name="table1" id="table1" width="100%">
<thead>
<tr class="th">
<th><input title="点击可全选本页的所有项目"  onclick="CheckAll(this.form)" type="checkbox" name="chkall" class="checkbox" /> </th>
<th><!--id-->编号</th>
<th align="center"><!--name-->名称</th>
<th align="center"><!--listorder-->排序号</th>
<th align="center"><!--logo-->LOGO</th>
<th align="center"><!--username-->用户名</th>
<th align="center"><!--adddate-->添加时间</th>
<th align="center"><!--hits-->点击数</th>
<th align="center">操作</th>
</tr>


<?php foreach($data as $d) { ?>
<tr>

<td align="center" >
<input onclick="c_chang(this)" type="checkbox" value="<?php echo $d[$primary_key];?>" name="select[]" class="checkbox" />
</td>

<td align="center"><?php echo cut($d['id']);?></td>
<td align="left" style="padding-left:10px;"><?php echo cut($d['name']);?></td>
<td align="center"><?php echo cut($d['listorder']);?></td>
<td align="left" style="padding-left:10px;"><?php if($d['logo']) echo helper::img($d['logo'], 100); ?></td>
<td align="left" style="padding-left:10px;"><?php echo cut($d['username']);?></td>
<td align="center"><?php echo cut($d['adddate']);?></td>
<td align="center"><?php echo cut($d['hits']);?></td>

<td align="center">
<span class="hotspot" onmouseover="tooltip.show('编辑友情链接！');" onmouseout="tooltip.hide();">
<a href="<?php echo modify("act/edit/table/$table/id/$d[$primary_key]");?>" class="a_edit"></a>
</span>

<span class="hotspot" onmouseover="tooltip.show('确定要删除吗？');" onmouseout="tooltip.hide();">
<a onclick="javascript: return confirm('确实要删除吗?');" href="<?php echo modify("/act/delete/table/$table/id/$d[$primary_key]");?>" class="a_del"></a>
</span>

</td>
</tr>
<?php } ?>


</tbody>
</table>

<div class="page"><?php if(get('table')!='type' && front::get('case')!='field') echo pagination::html($record_count); ?></div>
</div>

<div class="blank20"></div>

<input type="hidden" name="batch" value="" class="button" />
<input  class="btn_a" type="button" value=" 删除 " name="delete" onclick="if(getSelect(this.form) && confirm('确实要删除ID为('+getSelect(this.form)+')的记录吗?')){this.form.action='<?php echo modify('act/batch',true);?>'; this.form.batch.value='delete'; this.form.submit();}" />

</form>