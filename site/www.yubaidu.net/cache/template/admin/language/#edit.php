<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div class="blank20"></div>

                <form name="form1" id="form1" method="post" action="<?php echo uri();?>">
<div style="margin-left:10px;">
                    <input class="btn_c" type="button" value=" 增加语言项 " name="add" onclick="javascript:window.location.href='<?php echo modify("act/add/table/$table"); ?>'"/>
</div>
                    <div class="blank10"></div>
<div id="tagscontent" class="right_box">
                    <div class="page"><?php echo $link_str;?></div>
<div class="blank10"></div>
                    <table border="0" cellspacing="0" cellpadding="0" name="table" id="table1" width="100%">
                        <thead>
                            <tr class="th">
                                <th>中文备注 / 调用方法</th>
                                <th>前台显示值</th>
                                <th width="60" align="center">删除</th>
                            </tr>
                        </thead>
          


<tbody>
                    <?php foreach($sys_lang as $key => $value) { ?>

                    
                        
                            <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
                                <td align="left" style="padding-left:10px;"><?php echo $tips[$key];?> / <strong>{lang(</strong><?php echo $key;?><strong>)}</strong>
                                </td>
                                <td align="left" style="padding-left:10px;">
                                    <input type="text" name="<?php echo $key;?>" class="input" value="<?php echo $value;?>" />
                                </td>
                                <td width="60" align="center">
                                    <input type="checkbox" name="to_delete_items[]" value="<?php echo $key;?>" />
                                </td>
                            </tr>
                        

                    <?php } ?>
</tbody>
                    </table>
<div class="blank10"></div>
                    <div class="page"><?php echo $link_str;?></div>
<div class="blank10"></div>
</div>
 <div class="blank20"></div>
                    <input type="submit" value=" 修改 " name="submit" class="btn_a" />




                </form>



                <form name="editform" id="editform" method="post" action="<?php echo url('template/save'); ?>">
                    <input type="hidden" value="" name="sid" id="sid" />
                    <input type="hidden" value="" name="slen" id="slen" />
                    <input type="hidden" value="" name="scontent" id="scontent" />
                </form>


