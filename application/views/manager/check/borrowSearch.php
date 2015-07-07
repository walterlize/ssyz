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
    <select id="year_select" name="year_select" onchange="option_change1('year_select', 'month_select', 'type_select', 'state_select', 'unit_select', 'search_result', '<?= base_url() ?>index.php/manager/check/changeOptionBorrow/<?=$type1?>')">
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
    <select id="month_select" name="month_select" onchange="option_change1('year_select', 'month_select', 'type_select', 'state_select', 'unit_select', 'search_result', '<?= base_url() ?>index.php/manager/check/changeOptionBorrow/<?=$type1?>')">
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
    <font  >借款类型:</font>
    <select id="type_select" name="type_select" onchange="option_change1('year_select', 'month_select', 'type_select', 'state_select', 'unit_select', 'search_result', '<?= base_url() ?>index.php/manager/check/changeOptionBorrow/<?=$type1?>')">
        <option value="all">全部显示</option>
        <?php foreach ($searchType as $r): ?>
            <option value="<?= $r ?>"
            <?php
            if (isset($type) && $r == $type)
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
    <font  >显示类型:</font>
    <select id="state_select" name="state_select" onchange="option_change1('year_select', 'month_select', 'type_select', 'state_select', 'unit_select', 'search_result', '<?= base_url() ?>index.php/manager/check/changeOptionBorrow/<?=$type1?>')">
        <option value="all">全部显示</option>
        <?php foreach ($State as $r): ?>
            <option value="<?= $r ?>"
            <?php
            if (isset($state) && $r == $state)
                echo 'selected';
            else
                echo '';
            ?>
                    >
                        <?= $r ?>
            </option>
        <?php endforeach; ?>
    </select>
    &nbsp;&nbsp;&nbsp;&nbsp;<br/><br/>
    <font  >单位:</font>
    <select id="unit_select" name="unit_select" onchange="option_change1('year_select', 'month_select', 'type_select', 'state_select', 'unit_select', 'search_result', '<?= base_url() ?>index.php/manager/check/changeOptionBorrow/<?=$type1?>')">
        <option value="all">全部显示</option>
        <?php foreach ($Unit as $r): ?>
            <option value="<?= $r ?>"
            <?php
            if (isset($subjectUnit) && $r == $subjectUnit)
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
    <form name="form2" method="post" action="<?= base_url(); ?>index.php/manager/check/borrowSearch" id="form2">
        查询类型：
        <select name="searchType"  id="searchType" >
            <option value="1">报销代码</option>
            <option value="2">金额</option>
        </select>
        <input type="text" name="searchTerm" id="searchTerm"  isRequired="true" validEnum="Double1"/>
        <span id="searchTermMsg" class="MsgHide">请按照正确的方式填写金额！</span> </td>
        <input type="submit"onclick="return check_base('form2');" name="submit" value="查询" class="input"/>
    </form>
</div>