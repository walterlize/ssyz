<div style="margin-left:20px; margin-right:20px;">
    <br />
    <div class="title_lee">用户信息</div>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">用户名</td>
            <td class="td2" ><?= $user->userName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">密码</td>
            <td class="td2" ><?= $user->password ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">用户类别</td>
            <td class="td2" ><?= $user->roleName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">参与课题</td>
            <td class="td2"><?= $user->subjectName ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">课题单位名称</td>
            <td class="td2"><?= $user->subjectUnit ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">状态</td>
            <td class="td2"><?= $user->state ?>&nbsp;</td>
        </tr>
        <tr style="<?=$show?>">
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?= base_url() ?>index.php/admin/user/userEdit/<?= $user->userId ?>';" id="btnEdit" class="input" />
                <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?= base_url() ?>index.php/admin/user/userDelete/<?= $user->userId ?>')" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?= base_url() ?>index.php/admin/user/userList';" id="btnReturn" class="input" />      </td>
        </tr>
    </table>
</div>