
<tr><h2 align="center"><font color="#3A6EA5" >课题经费汇总</font></h2></tr>
<tr><font color="red" >*</font><font >请选择年、月以查看不同年、不同月份的课题经费汇总</font></tr></br></br>
<div><font  size="3px" >年份:</font>
    <select id="Year_select" name="Year_select"  onchange="date_change('Year_select', 'Month_select', 'date_result', '<?= base_url() ?>index.php/admin/money/change')">
        <option value="all">全部</option>
           <?php foreach ($Year as $r): ?>
            <option value="<?= $r ?>" 
            <?php
            if (isset($year) && $r == $year)
                echo 'selected';
            else
                echo '';
            ?>
                    >
            <?= $r ?>
            </option>
<?php endforeach; ?>
    </select>
    </select>年
    &nbsp;&nbsp;
    <font size="3px"  >月份:</font>
    <select id="Month_select" name="Month_select" onchange="date_change('Year_select', 'Month_select', 'date_result', '<?= base_url() ?>index.php/admin/money/change')">
        <option value="all">全部</option>
        <?php foreach ($Month as $r): ?>
            <option value="<?= $r ?>" 
            <?php
            if (isset($month) && $r == $month)
                echo 'selected';
            else
                echo '';
            ?>
                    >
                        <?= $r ?>
            </option>
        <?php endforeach; ?>
    </select>月


</div> 