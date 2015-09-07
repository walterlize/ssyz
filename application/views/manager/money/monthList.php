<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>月度经费列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">全选<input type="checkbox" /></th>
            <th scope="col">时间</th>
            <th scope="col">当月支出总额(万元)</th>
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
                        <?= $r['total'] ?></td>
                    <td>
                        <?= $r['stateInfo'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/manager/money/monthMoneyDetail/<?= $r['monthMoneyId'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
            <td colspan="5" align="center">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/manager/money/monthMoneyNew';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/manager/money/subjectManage';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
    </table>
    <div align="center"><?= $page ?></div>
</div>