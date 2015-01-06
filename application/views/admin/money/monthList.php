<div style="margin-left:20px; margin-right:20px">
    <br />
    <div class="title_lee">月度经费管理</div>
    <table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th class="td1">序号</th>
            <th class="td3">时间</th>
            <th class="td1">课题组</th>
            <th class="td3">课题组单位</th>
            <th class="td1">支出经费(万元)</th>
            <th class="td3">审核状况</th>
            <th class="td1">操作</th>
        </tr>
        <?php if (is_array($money)) foreach ($money as $r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1">
                        <input type="checkbox" /></td>
                    <td class="td3">
                        <?= $r['year'] ?>年<?= $r['month'] ?>月</td>
                    <td class="td1">
                        <?= $r['subjectName'] ?></td>
                    <td class="td3">
                        <?= $r['subjectUnit'] ?></td>
                    <td class="td1">
                        <?= $r['total'] ?></td>
                    <td class="td3">
                        <?= $r['stateInfo'] ?></td>
                    <td class="td1">
                        <a id="" href="<?= base_url() ?>index.php/admin/money/monthMoneyDetail/<?= $r['monthMoneyId'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>