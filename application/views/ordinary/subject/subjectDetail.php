<div style="margin-left:20px; margin-right:20px;">
    <br />
    <h3>课题详细信息</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">课题名称</td>
            <td class="td2" ><?= $inherit->subjectName ?>&nbsp;</td>
            <td class="td1" style="width: 111px">相关课题</td>
            <td class="td2" ><?= $subject->subjectName ?>&nbsp;</td>
        </tr>
        <tr>

            <td class="td1" style="width: 111px">课题编号</td>
            <td class="td2" colspan="3"><?= $inherit->subjectNum ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课题单位名称</td>
            <td class="td2" colspan="3"><?= $inherit->subjectUnit ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课题负责专家</td>
            <td class="td2" colspan="3"><?= $inherit->expert ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课题简介</td>
            <td class="td2"colspan="3"><?= $inherit->introduction ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课题内容</td>
            <td class="td2"colspan="3"><?= $inherit->content ?>&nbsp;</td>
        </tr>
        <!--<tr>
            <td class="td1" style="width: 111px">课题完成情况</td>
            <td class="td2"colspan="3" ><?= $inherit->completion ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">备注</td>
            <td class="td2"colspan="3"><?= $inherit->remark ?>&nbsp;</td>
        </tr>-->
        <tr>
            <td colspan="4" class="td3" align="center"><input type="button" name="btnEdit" value="编 辑" onclick="window.location.href = '<?= base_url() ?>index.php/ordinary/subject/subjectEdit';" id="btnEdit" class="input" />
            </td>
        </tr>
    </table>
</div>