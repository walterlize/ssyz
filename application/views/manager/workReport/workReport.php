<div style="margin-left:20px; margin-right:20px">
    <div class="title_lee">工作简报列表</div>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">全选<input type="checkbox" /></th>
            <th scope="col">标题</th>
            <th scope="col">相关人</th>

            <th scope="col">发布单位</th>
            <th scope="col">发布时间</th>
            <th scope="col">状态</th>
            <th scope="col">操作</th>
        </tr>
        <?php if (is_array($workreports)) foreach ($workreports as $r): ?>
                <tr class="RowStyle" align="center">
                    <td>
                        <input type="checkbox" /></td>
                    <td>
                        <?= $r['title'] ?></td>
                    <td>
                        <?= $r['author'] ?></td>
                    <td>
                        <?= $subjectUnit ?></td>
                    <td>
                        <?= $r['year'] ?>年<?= $r['month'] ?>月</td>
                    <td>
                        <?= $r['state'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/manager/workReport/reportDetail/<?= $r['workReportId'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
            <td colspan="7" align="center">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href = '<?= base_url() ?>index.php/manager/workReport/reportNew/WorkReport';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href = '<?= base_url() ?>index.php/manager/workReport/reportDelete';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
    </table>
    <div align="center"><?= $page ?></div>
</div>