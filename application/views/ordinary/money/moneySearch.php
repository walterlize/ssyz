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
    <select id="year_select" name="year_select" onchange="expenseMoney_change_1('year_select', 'month_select','moneyType','search_result', '<?= base_url() ?>index.php/ordinary/money/changeOption')">
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
    <select id="month_select" name="month_select" onchange="expenseMoney_change_1('year_select', 'month_select','moneyType','search_result', '<?= base_url() ?>index.php/ordinary/money/changeOption')">
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
    <font  >经费类型:</font>
    <select id="moneyType" name="moneyType" onchange="expenseMoney_change_1('year_select', 'month_select','moneyType','search_result', '<?= base_url() ?>index.php/ordinary/money/changeOption')">
        <option value="all">全部显示</option>
        <?php foreach ($Type as $r): ?>
            <option value="<?= $r ?>"
                <?php
                if (isset($moneyType) && $r == $moneyType)
                    echo 'selected';
                else
                    echo '';
                ?>
                >
                <?= $r ?>
            </option>
        <?php endforeach; ?>
    </select>

</div>  </br>
<div style="margin-left:20px; margin-right:20px">
<form name="form2" method="post" action="<?= base_url(); ?>index.php/ordinary/money/expenseMoneySearch" id="form2">
    按金额查询：  <input type="text" name="searchTerm" id="searchTerm"  isRequired="true" validEnum="Double1"/>
    <span id="searchTermMsg" class="MsgHide">请按照正确的方式填写金额！</span> </td>
  <input type="submit"onclick="return check_base('form2');" name="submit" value="查询" class="input"/>
</form>
    </div>