<div class="blank20"></div>
<div id="tagscontent" class="right_box">

<table border="0" cellspacing="0" cellpadding="0" name="table1" id="table1" width="100%">
<thead>
<tr class="th">
                <th align="center" width="180">字段名称</td>
                <th align="center" width="480">内容</td>
            </tr>
            </thead>
        <tbody>
{user_cb_data($data,$table)}
            {loop $field $f}
                <?php

                $name=$f['name'];
				$aid = $data['aid'];
                if(!preg_match('/^my_/',$name)) continue;

                if(!isset($data[$name])) $data[$name]='';
                ?>

            <tr>
                <td width="180" align="center">{$name|lang}</td>
                <td width="480" align="center">{$data[$name]}</td>
            </tr>

            {/loop}
            <tr>
            <td colspan="2"><a href="index.php?case=archive&act=show&aid={get(aid)}" target="_blank">关联文章</a></td>
            </tr>

        </tbody></table>

		</div>
