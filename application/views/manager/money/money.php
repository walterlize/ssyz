<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>年度经费列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">全选<input type="checkbox" /></th>
            <th scope="col">年度</th>
            <th scope="col">课题</th>
            <th scope="col">课题组单位</th>
            <th scope="col">经费总额(万元)</th>
            <th scope="col">操作</th>
        </tr>
        <?php if (is_array($money)) foreach ($money as $r): ?>
                <tr class="RowStyle" align="center">
                    <td>
                        <input type="checkbox" /></td>
                    <td>
                        <?= $r['year'] ?>年</td>
                    <td>
                        课题<?= $r['subjectNum'] ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= $r['subjectName'] ?></td>
                       <td>
                        <?= $r['subjectUnit'] ?></td>
                    <td>
                        <?= $r['total'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/admin/money/yearMoneyDetail/<?= $r['yearMoneyId'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
            <td colspan="6" align="center">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/admin/money/yearMoneyNew';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/admin/subject/subjectManage';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
    </table>
    <div align="center"><?= $page ?></div>
</div>