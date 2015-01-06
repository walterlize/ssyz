<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>课题详细信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">课题名称</td>
            <td class="td2" ><?= $subject->subjectName ?>&nbsp;</td>

            <td class="td1" style="width: 111px">子课题名称</td>
            <td class="td2" ><?= $inherit->subjectName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课题编号</td>
            <td class="td2" ><?= $subject->subjectNum ?>&nbsp;</td>

            <td class="td1" style="width: 111px">子课题编号</td>
            <td class="td2" ><?= $inherit->subjectNum ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课题单位名称</td>
            <td class="td2" ><?= $subject->subjectUnit ?>&nbsp;</td>

            <td class="td1" style="width: 111px">子课题单位名称</td>
            <td class="td2" ><?= $inherit->subjectUnit ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">负责专家</td>
            <td class="td2" ><?= $subject->expert ?>&nbsp;</td>
            <td class="td1" style="width: 111px">子课题负责专家</td>
            <td class="td2" ><?= $inherit->expert ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课题简介</td>
            <td class="td2"><?= $subject->introduction ?>&nbsp;</td>
            <td class="td1" style="width: 111px">子课题简介</td>
            <td class="td2"><?= $inherit->introduction ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课题内容</td>
            <td class="td2"><?= $subject->content ?>&nbsp;</td>
            <td class="td1" style="width: 111px">子课题内容</td>
            <td class="td2"><?= $inherit->content ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课题完成情况</td>
            <td class="td2" ><?= $subject->completion ?>&nbsp;</td>
            <td class="td1" style="width: 111px">完成情况</td>
            <td class="td2" ><?= $inherit->completion ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">备注</td>
            <td class="td2"><?= $subject->remark ?>&nbsp;</td>
            <td class="td1" style="width: 111px">子课题备注</td>
            <td class="td2"><?= $inherit->remark ?>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" class="td3" align="center"><input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?= base_url() ?>index.php/ordinary/subject/subjectEdit';" id="btnEdit" class="input" />
            </td>
        </tr>
    </table>
</div>