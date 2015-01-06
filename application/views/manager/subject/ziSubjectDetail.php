<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>课题详细信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">课题名称</td>
            <td class="td2" ><?= $subjectName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课题编号</td>
            <td class="td2" ><?= $subjectNum ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课题单位名称</td>
            <td class="td2" ><?= $subjectUnit ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课题起止时间</td>
            <td class="td2" >自:<?= $startDate ?>&nbsp;&nbsp;至&nbsp;<?= $endDate ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">负责专家</td>
            <td class="td2" ><?= $expert ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课题简介</td>
            <td class="td2"><?= $introduction ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课题内容</td>
            <td class="td2"><?= $content ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课题完成情况</td>
            <td class="td2" ><?= $completion ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">备注</td>
            <td class="td2"><?= $remark ?>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" class="td3" align="center"><input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?= base_url() ?>index.php/manager/subject/ziSubjectEdit/<?= $subjectId ?>';" id="btnEdit" class="input" />
                <input type="button" name="btnSave" value="删 除" onclick="deleteInfo('<?= base_url() ?>index.php/manager/subject/subjectDelete/<?= $subjectId ?>')" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/manager/subject/subjectManage';" id="btnReturn" class="input" />      </td>
        </tr>
    </table>
</div>