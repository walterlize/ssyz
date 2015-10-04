<div style="margin-left:20px; margin-right:20px">
    <br />
    <div class="title_lee">公告管理</div>
    <table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th class="td1">序号</th>
            <th class="td3">公告标题</th>
            <th class="td1">发布人</th>
            <th class="td3">发布时间</th>
            <th class="td1">操作</th>
        </tr>
        <?php if (is_array($gonggaos)) foreach ($gonggaos as $key => $r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1"><?= $key + 1 ?> </td>
                    <td class="td3">
                        <?= $r['title'] ?></td>
                    <td class="td1">
                        <?= $r['author'] ?></td>
                    <td class="td3">
                        <?= $r['date'] ?></td>
                    <td class="td1">
                        <a id="" href="<?= base_url() ?>index.php/admin/gonggao/gonggaoDetail/<?= $r['gonggaoId'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
                <tr class="td3">
            <td colspan="5" align="center">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href = '<?= base_url() ?>index.php/admin/gonggao/gonggaoNew/1';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href = '<?= base_url() ?>index.php/admin/subject/subjectManage';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
    </table>
    <div align="center"><?= $page ?></div>
</div>