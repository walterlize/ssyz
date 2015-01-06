<div id="date_result">
    <br />

    <table class="tablist2" cellpadding="0" cellspacing="1" style="width:95%;border-collapse:collapse;" border="1" align="center">
        <tr class="HeaderStyle">
            <th class="td1">序号</th>
            <th class="td3">标题</th>
            <th class="td1">课题名称</th>
            <th class="td3">相关人</th>
            <th class="td1">发布时间</th>
            <th class="td3">课题单位名称</th>
            <th class="td1">状态</th>
            <th class="td3">操作</th>
        </tr>
        <?php if (is_array($workreports)) foreach ($workreports as $key=>$r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1">
                        <?=$key+1?></td>
                    <td class="td3">
                        <?= $r['title'] ?></td>
                    <td class="td1">
                        <?= $r['subjectName'] ?></td>
                    <td class="td3">
                        <?= $r['author'] ?></td>
                    <td class="td1">
                        <?= $r['year'] ?>年 <?= $r['month'] ?>月 </td>
                    <td class="td3">
                        <?= $r['subjectUnit'] ?></td>
                    <td class="td1">
                        <?= $r['state'] ?></td>
                    <td class="td3">
                        <a id="" href="<?= base_url() ?>index.php/admin/workReport/reportDetail/<?= $r['workReportId'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <div align="center"><?= $page ?></div>
</div>