<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 align="center"><font color="#003366" size="5px">课题管理</font></h3>
    <table cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1" class="tablist2">
        <tr class="HeaderStyle">
            <th class="td1">序号</th>
            <th class="td3">课题编号</th>
            <th class="td1">课题名称</th>
            <th class="td3">课题单位名称</th>
            <th class="td1">负责专家</th>
            <th class="td3">操作</th>
        </tr>
        <?php if (is_array($subject)) foreach ($subject as $key=>$r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1">
                       <?= $key+1 ?></td>
                    <td class="td3">
                        <?= $r['subjectNum'] ?></td>
                    <td class="td1">
                        <?= $r['subjectName'] ?></td>
                    <td class="td3">
                        <?= $r['subjectUnit'] ?></td>
                    <td class="td1">
                        <?= $r['expert'] ?></td>
                    <td class="td3">
                        <a id="" href="<?= base_url() ?>index.php/admin/subject/subjectDetail/<?= $r['subjectId'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
            <td colspan="6" align="center"class="td3">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/admin/subject/subjectNew';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/admin/subject/subjectManage';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
    </table>
    <div align="center"><?= $page ?></div>
</div>