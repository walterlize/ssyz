<div style="margin-left:20px; margin-right:20px">
    <br />
    <div class="title_lee">课题管理组</div>
    <table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th class="td1">序号</th>
            <th class="td3">专家姓名</th>
            <th class="td1">类别</th>   
            <th class="td3">单位</th>
            <th class="td1">课题名称</th>
            <th class="td3">操作</th>
        </tr>
        <?php if (is_array($manage)) foreach ($manage as $key=>$r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1">
                        <?=$key+1?></td>
                    <td class="td3"> 
                        <?= $r['name'] ?></td>
                    <td class="td1">
                        <?= $r['type'] ?></td>
                    <td class="td3">
                        <?= $r['firm'] ?></td>
                    <td class="td1">
                        <?= $r['subjectName'] ?></td>
                    <td class="td3">
                        <a id="" href="<?= base_url() ?>index.php/admin/manage/manageDetail/<?= $r['manageId'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
            <td colspan="6" align="center" class="td3">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href = '<?= base_url() ?>index.php/admin/manage/manageNew';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href = '<?= base_url() ?>index.php/admin/subject/subjectManage';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
    </table>
    <div align="center"><?= $page ?></div>
</div>