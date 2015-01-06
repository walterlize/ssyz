<div style="margin-left:20px; margin-right:20px;">
    <br />
    <div class="title_lee">报奖材料详细信息</div>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">报奖材料名称</td>
            <td colspan="3" class="td2" ><?= $award->awardName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td3" style="width: 111px">完成人</td>
            <td colspan="3" class="td2" ><?= $award->author ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">完成单位</td>
            <td colspan="3" class="td2" ><?= $award->workplace ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">报奖类型</td>
            <td class="td2" style="width: 319px"><?= $award->type ?>&nbsp;</td>
            <td class="td1" style="width: 111px">报奖级别</td>
            <td class="td2"><?= $award->level ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">报奖等级</td>
            <td class="td2" style="width: 319px"><?= $award->grade ?>&nbsp;</td>
            <td class="td1" style="width: 111px">报奖状态</td>
            <td class="td2"><?= $award->awardState ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">处理单位</td>
            <td colspan="3" class="td2"><?= $award->processWorkplace ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">组织部门</td>
            <td colspan="3" class="td2"><?= $award->organizationDepart ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">颁发部门</td>
            <td colspan="3" class="td2"><?= $award->issueDepart ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">备注</td>
            <td colspan="3" class="td2"><?= $award->remark ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">状态</td>
            <td colspan="3" class="td2"><?= $award->stateInfo ?>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" class="td3" align="center">
                <input type="button" name="btnEdit" value="通 过" onclick="window.location.href = '<?= base_url() ?>index.php/admin/award/updateAwardState/<?= $award->awardId ?>/2';" id="btnEdit" class="input"/>
                <input type="button" name="btnDelete" value="退 修" onclick="window.location.href = '<?= base_url() ?>index.php/admin/award/updateAwardState/<?= $award->awardId ?>/1';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href = '<?= base_url() ?>index.php/admin/award/awardList';" id="btnReturn" class="input" />      </td>
            </td>
        </tr>
    </table>
</div>