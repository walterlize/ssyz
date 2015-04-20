<div style="margin-left:20px; margin-right:20px">
    <br />
    <div class="title_lee">政策规定列表</div>
    <table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th class="td1">序号</th>
            <th class="td3">标题</th>
            <th class="td1">时间</th>
            <th class="td3">操作</th>
        </tr>
        <?php if (is_array($zhengce)) foreach ($zhengce as $key => $r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1">
                        <?= $key + 1 ?></td>
                    <td class="td3">
                        <?= $r['title'] ?></td>
                    <td class="td1">
                        <?= $r['date'] ?></td>
                    <td class="td3">
                        <a id="" href="<?= base_url() ?>index.php/admin/zhengce/zhengceDetail/<?= $r['z_id'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
            <td colspan="5" align="center" class="td3">
                <input type="button" name="btnNew" value="新 增" onclick="window.location.href = '<?= base_url() ?>index.php/admin/zhengce/zhengceNew';" id="btnNew" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href = '<?= base_url() ?>index.php/admin/zhengce/zhengceList';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
    </table>
    <div align="center"><?= $page ?></div>
</div>