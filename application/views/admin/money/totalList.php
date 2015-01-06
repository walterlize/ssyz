<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 align="center"><font color="#003366" size="5px">课题总经费列表</font></h3>
    <table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th class="td1">序号</th>
            <th class="td3">课题起止年限</th>
            <th class="td1">课题</th>
            <th class="td3">课题组单位</th>
            <th class="td1">经费总额(万元)</th>
            <th class="td3">操作</th>
        </tr>
        <?php if (is_array($money)) foreach ($money as $key=>$r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1">
                        <?=$key+1?></td>
                    <td class="td3">
                        自：<?= $r['startDate'] ?>&nbsp;至:<?=$r['endDate']?></td>
                    <td class="td1">
                        课题<?= $r['subjectNum'] ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= $r['subjectName'] ?></td>
                       <td class="td3">
                        <?= $r['subjectUnit'] ?></td>
                    <td class="td1">
                        <?= $r['total'] ?></td>
                    <td class="td3">
                        <a id="" href="<?= base_url() ?>index.php/admin/money/totalMoneyDetail/<?= $r['totalMoneyId'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
            <td colspan="6" align="center" class="td3">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/admin/money/totalMoneyNew';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/admin/subject/subjectManage';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
    </table>
    <div align="center"><?= $page ?></div>
</div>