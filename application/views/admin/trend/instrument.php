<div style="margin-left:20px; margin-right:20px">
    <br />
    <div class="title_lee">管理办法</div>
    <table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th class="td1">全选<input type="checkbox" /></th>
            <th class="td3">办法标题</th>
            <th class="td1">发布人</th>
            <th class="td3">发布时间</th><th scope="col">操作</th>
        </tr>
        <?php if (is_array($trends)) foreach ($trends as $key=>$r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1">
                        <?=$key+1?></td>
                    <td class="td1">
                        <?= $r['trendName'] ?></td>
                    <td class="td3">
                        <?= $r['trendAuthor'] ?></td>
                    <td class="td1">
                        <?= $r['time'] ?></td>
                    <td class="td3">
                        <a id="" href="<?= base_url() ?>index.php/admin/trend/trendDetail/<?= $r['trendId'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr class="td3">
            <td colspan="5" align="center">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href = '<?= base_url() ?>index.php/admin/trend/trendNew/3';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href = '<?= base_url() ?>index.php/admin/subject/subjectManage';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
    </table>
    <div align="center"><?= $page ?></div>
</div>