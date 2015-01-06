
<!--<h2 align="center"><font color="#3A6EA5" ><?= $title ?></font></h2></tr>-->

<div class="title_lee"><?= $title ?></div>
<div class="search_1">
    <span class="l1">
        <font  size="3px" >按年份查询:</font>
        <select id="Year_select" name="Year_select"  onchange="date_change('Year_select', 'Month_select', 'date_result', '<?= base_url() ?>index.php/admin/workReport/change/<?= $type ?>/1')">
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
        </select>年
        &nbsp;&nbsp;&nbsp;&nbsp;
        <font size="3px"  >月份:</font>
        <select id="Month_select" name="Month_select" onchange="date_change('Year_select', 'Month_select', 'date_result', '<?= base_url() ?>index.php/admin/workReport/change/<?= $type ?>/1')">
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
    </span>
    <span class="l2">
        <form name="form1" method="post" action="<?= base_url(); ?>index.php/admin/workReport/search/<?= $type ?>/1/all" id="form1">
            <font size="3px" >按课题所在单位查询：</font><input name="searchterm" type="text" size="22"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="查询" class="input"/>
        </form>
    </span>
</div>