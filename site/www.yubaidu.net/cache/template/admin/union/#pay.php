<?php defined('ROOT') or exit('Can\'t Access !'); ?>

<form name="listform" id="listform"  action="<?php echo uri();?>" method="post">
<div class="blank20"></div>
<div id="tagscontent" class="right_box">

    <table border="0" cellspacing="0" cellpadding="0" name="table1" id="table1" width="100%">
       <thead>
            <tr class="th">
          <th align="center">联盟用户</th>
          <th align="center">结算日期</th>
          <th align="center">结算金额</th>
          <th align="center">支付账号</th>
          <th align="center">操作人员</th>
        </tr>

</thead>


<tbody>
<?php foreach($data as $d) { ?>
<tr>

<td><?php echo $d['username'];?></td>
<td><?php echo date('Y-m-d H:i:s',$d['addtime']);?></td>
<td><?php echo $d['amount'];?> 元</td>
<td><font color="red"><?php echo $d['payaccount'];?></font></td>
<td><?php echo $d['inputer'];?></td>

</tr>
<?php } ?>


</tbody>
</table>

<div class="page"><?php echo pagination::html($record_count); ?></div>

</div>
<div class="blank20"></div>

<input type="hidden" name="batch" value="">
<input  class="btn_a" type="button" value=" 删除 " name="delete" onclick="if(getSelect(this.form) && confirm('确实要删除ID为('+getSelect(this.form)+')的记录吗?')){this.form.action='<?php echo modify('act/batch',true);?>'; this.form.batch.value='delete'; this.form.submit();}"/>

</form>