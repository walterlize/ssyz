<div style="margin-left:20px; margin-right:20px">
    <br />
    <div class="title_lee">联系我们列表</div>
    <table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th class="td1">序号</th>
            <th class="td3">负责人姓名</th>
            <th class="td1">单位</th>
            <th class="td3">操作</th>
        </tr>
        <?php if (is_array($contact)) foreach ($contact as $key=>$r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1">
                        <?=$key+1?></td>
                    <td class="td3">
                        <?= $r['personName'] ?></td>
                    <td class="td1">
                        <?= $r['firm'] ?></td>
                    <td class="td3">
                        <a id="" href="<?= base_url() ?>index.php/admin/contact/contactDetail/<?= $r['contactId'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
            <td colspan="5" align="center" class="td3">
                <input type="button" name="btnNew" value="新 增" onclick="window.location.href = '<?= base_url() ?>index.php/admin/contact/contactNew';" id="btnNew" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href = '<?= base_url() ?>index.php/admin/contact/contactList';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
    </table>
    <div align="center"><?= $page ?></div>
</div>