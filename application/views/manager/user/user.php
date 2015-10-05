<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="title_lee">用户列表</h3>
    <table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th class="td1">序号</th>
            <th class="td3">用户名</th>
            <th class="td1">类别</th>
            <th class="td3">课题名称</th>
            <th class="td1">课题组单位名称</th>
            <th class="td3">操作</th>
        </tr>
        <?php if (is_array($user)) foreach ($user as $key=>$r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1">
                        <?=$key+1?></td>
                    <td class="td3">
                        <?= $r['userName'] ?></td>
                    <td class="td1">
                        <?= $r['roleName'] ?></td>
                    <td class="td3">
                        <?= $r['subjectName'] ?></td>
                    <td class="td1">
                        <?= $r['subjectUnit'] ?></td>
                    <td class="td3">
                        <a id="" href="<?= base_url() ?>index.php/manager/user/userDetail/<?= $r['userId'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr class="td3">
            <td colspan="6" align="center">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/manager/user/userNew';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/manager/user/userList';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
    </table>
    <div align="center"><?= $page ?></div>
</div>