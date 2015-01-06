<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>月度经费管理</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">全选<input type="checkbox" /></th>
            <th scope="col">时间</th>
            <th scope="col">课题组</th>
            <th scope="col">课题组单位</th>
            <th scope="col">支出经费(万元)</th>
            <th scope="col">审核状况</th>
            <th scope="col">操作</th>
        </tr>
        <?php if (is_array($money)) foreach ($money as $r): ?>
                <tr class="RowStyle" align="center">
                    <td>
                        <input type="checkbox" /></td>
                    <td>
                        <?= $r['year'] ?>年<?= $r['month'] ?>月</td>
                    <td>
                        <?= $r['subjectName'] ?></td>
                    <td>
                        <?= $r['subjectUnit'] ?></td>
                    <td>
                        <?= $r['total'] ?></td>
                    <td>
                        <?= $r['stateInfo'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/manager/money/monthMoneyDetailCheck/<?= $r['monthMoneyId'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>