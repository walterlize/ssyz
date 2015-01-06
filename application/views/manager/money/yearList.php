<div style="margin-left:20px; margin-right:20px">
    <br />
    <div class="title_lee">年度经费列表</div>
    <table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th class="td1">全选<input type="checkbox" /></th>
            <th class="td3">年度</th>
            <th class="td1">子课题</th>
            <th class="td3">子课题组单位</th>
            <th class="td1">经费总额(万元)</th>
            <th class="td3">操作</th>
        </tr>
        <?php if (is_array($money)) foreach ($money as $r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1">
                        <input type="checkbox" /></td>
                    <td class="td3"> 
                        <?= $r['year'] ?>年</td>
                    <td class="td1">
                        课题<?= $r['subjectNum'] ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= $r['subjectName'] ?></td>
                    <td class="td3">
                        <?= $r['subjectUnit'] ?></td>
                    <td class="td1">
                        <?= $r['total'] ?></td>
                    <td class="td3">
                        <a id="" href="<?= base_url() ?>index.php/manager/money/yearMoneyDetail/<?= $r['yearMoneyId'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
            <td colspan="6" align="center"class="td3">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href = '<?= base_url() ?>index.php/manager/money/yearMoneyNew';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href = '<?= base_url() ?>index.php/manager/subject/subjectManage';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
    </table>
    <div align="center"><?= $page ?></div>
</div>