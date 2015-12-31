<?php
/**
 * Created by PhpStorm.
 * User: walter
 * Date: 15-2-21
 * Time: 下午5:54
 */
?>
<tr>
    <div class="title_lee"><?= $title ?></div>
  </tr>
<div style="margin-left:20px; margin-right:20px;margin-bottom: 20px">
    <font >年份:</font>
    <select id="year_select" name="year_select" onchange="expenseMoney_change('year_select', 'month_select','subject_select','search_result', '<?= base_url() ?>index.php/manager/money/changeCostOption')">
        <option value="all">全部信息</option>
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
    &nbsp;&nbsp;&nbsp;&nbsp;
    <font  >月份:</font>
    <select id="month_select" name="month_select" onchange="expenseMoney_change('year_select', 'month_select','subject_select','search_result', '<?= base_url() ?>index.php/manager/money/changeCostOption')">
        <option value="all">全部显示</option>
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
    </select>

    &nbsp;&nbsp;&nbsp;&nbsp;
    <font  >子课题:</font>
    <select id="subject_select" name="subject_select" onchange="expenseMoney_change('year_select', 'month_select','subject_select','search_result', '<?= base_url() ?>index.php/manager/money/changeCostOption')">
        <option value="all"><?=$subjectUnit?></option>
        <?php foreach ($Unit as $r): ?>
            <option value="<?= $r ?>"
                <?php
                if (isset($unit) && $r == $unit)
                    echo 'selected';
                else
                    echo '';
                ?>
                >
                <?= $r ?>
            </option>
        <?php endforeach; ?>
    </select>

</div>