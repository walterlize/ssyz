<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="title_lee">用户列表</h3>
    <table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th scope="col">全选<input type="checkbox" /></th>
            <th scope="col">用户名</th>
            <th scope="col">类别</th>
            <th scope="col">课题名称</th>
            <th scope="col">课题组单位名称</th>
            <th scope="col">操作</th>
        </tr>
        <?php if (is_array($user)) foreach ($user as $r): ?>
                <tr class="RowStyle" align="center">
                    <td>
                        <input type="checkbox" /></td>
                    <td>
                        <?= $r['userName'] ?></td>
                    <td>
                        <?= $r['roleName'] ?></td>
                    <td>
                        <?= $r['subjectName'] ?></td>
                    <td>
                        <?= $r['subjectUnit'] ?></td>
                    <td>
                        <a id="" href="<?= base_url() ?>index.php/manager/user/userDetail/<?= $r['userId'] ?>">详细</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
            <td colspan="6" align="center">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?= base_url() ?>index.php/manager/user/userNew';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?= base_url() ?>index.php/manager/user/userList';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
    </table>
    <div align="center"><?= $page ?></div>
</div>