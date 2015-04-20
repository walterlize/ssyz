<br/>
<div style="margin-left:20px; margin-right:20px" id="content">
    <table class="tablist2" cellpadding="0" cellspacing="1">
        <tr>
            <td class="td1" style="width: 111px"><font color="red" size="3px">报销状况情况：</font></td>
            <td class="td2" colspan="2" align="center">
                <?= $stateShow ?>&nbsp;&nbsp;&nbsp;&nbsp;通过时间：<?= $baoxiao->date3 ?>
            </td>
        </tr>
        <tr>  <td class="td1" style="width: 111px"><font color="red">批复情况：</font></td>
            <td class="td2" colspan="2" align="center"><?= $baoxiao->remark ?></td>
        </tr>

        <tr>
            <td colspan="3" class="td3" align="center">
                <input type="button" name="btnSave" value="修 改" onclick="window.location.href = '<?= base_url(); ?>index.php/manager/check/checkEditBaoxiao/<?= $baoxiao->bao_id ?>';" id="btnAdd"class="input"  />
                <input type="button" name="btnNext" value="返 回" onclick="window.location.href = '<?= base_url(); ?>index.php/manager/check/baoxiaoManage';" id="btnSave"class="input"/> 
            </td></tr>

</div>