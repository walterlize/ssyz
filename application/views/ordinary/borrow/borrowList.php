<div style="margin-left:20px; margin-right:20px">
    <br />
    <div class="title_lee">汇款列表</div>
    <table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th class="td1">序号</th>
            <th class="td3">汇款时间</th>
            <th class="td1">汇款类别</th>
            <th class="td3">收款单位</th>
            <th class="td1">金额（元）</th>
            <th class="td3">状态</th>
            <th class="td1">操作</th>
        </tr>
        <?php if (is_array($borrow)) foreach ($borrow as $key => $r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1">
                        <?= $key + 1 ?></td>
                    <td class="td3">
                        <?= $r['date'] ?></td>
                    <td class="td1">
                        <?= $r['type'] ?></td>
                       <td class="td3">
                        <?= $r['b_name'] ?></td>
                    <td class="td1">
                        <?= $r['money'] ?></td>
                    <td class="td3">
                        待审核</td>
                    <td class="td1">
                        <a id="" href="<?= base_url() ?>index.php/ordinary/borrow/monthMoneyDetail/<?= $r['b_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
            <td colspan="7" align="center"  class="td3">
                <input type="button" name="btnDelete" value="新增汇款" onclick="window.location.href = '<?= base_url() ?>index.php/ordinary/borrow/borrowNew';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href = '<?= base_url() ?>index.php/ordinary/money/subjectManage';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
    </table>
    <div align="center"><?= $page ?></div>
</div>