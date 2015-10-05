<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="title_lee">工作月报列表</h3>
    <table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th class="td1">序号</th>
            <th class="td3">标题</th>
            <th class="td1">相关人</th>
            <th class="td3">发布单位</th>
            <th class="td1">发布时间</th>
            <th class="td3">状态</th>
            <th class="td1">操作</th>
        </tr>
        <?php if (is_array($workreports)) foreach ($workreports as $key=>$r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1">
                       <?=$key+1?></td>
                    <td class="td3">
                        <?= $r['title'] ?></td>
                    <td class="td1">
                        <?= $r['author'] ?></td>
                    <td class="td3">
                        <?= $subjectUnit ?></td>
                    <td class="td1">
                        <?= $r['year'] ?>年<?=$r['month']?>月</td>
                    <td class="td3">
                        <?= $r['state'] ?></td>
                    <td class="td1">
                        <a id="" href="<?= base_url() ?>index.php/ordinary/workReport/reportDetail/<?= $r['workReportId'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr class="td3">
            <td colspan="7" align="center">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/ordinary/workReport/reportNew/WeekReport';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/ordinary/workReport/reportDelete';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
    </table>
    <div align="center"><?= $page ?></div>
</div>