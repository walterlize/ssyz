<tr><h2 align="center"><font color="#3A6EA5" ><?= $title ?></font></h2></tr>
<div><font  size="3px">按部门信息:</font>
    <select id="show_select" name="show_select" onchange="college_change('show_select', 'state_select', 'offer_result', '<?= base_url() ?>index.php/guojichu/teacher/changeOffer/<?= $type ?>')">
        <option value="all">全部信息</option>
        <?php foreach ($show as $r): ?>
            <option value="<?= $r ?>" 
            <?php
            if (isset($workplace) && $r == $workplace)
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
    <font size="3px" >审核类型:</font>
    <select id="state_select" name="state_select" onchange="college_change('show_select', 'state_select', 'offer_result', '<?= base_url() ?>index.php/guojichu/teacher/changeOffer/<?= $type ?>')">
        <option value="all">全部显示</option>
        <?php foreach ($state as $r): ?>
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


</div>  </br>  
<form name="form1" method="post" action="<?= base_url(); ?>index.php/guojichu/teacher/search/<?= $type ?>/all" id="form1">
    <font size="3px">按人名查询：</font><input name="searchterm" type="text" size="22"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="查询" class="input"/>
</form>