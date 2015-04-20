<div style="margin-left:20px; margin-right:20px">
    <br />
    <div class="title_lee">用户信息编辑</div>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/admin/user/save/<?= $user->roleId ?>" id="form1">
        <input type="hidden" value="<?= $user->userId ?>" name="userId" id="userId" />
        <input type="hidden" value="<?= $user->state ?>" name="state" id="state" />
        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                <td class="td1" style="width: 111px">用户名</td>
                <td class="td2" ><input name="userName" type="text" id="userName" value="<?= $user->userName ?>" size="50"  isRequired="true" />
                    <font color="red">*</font><span id="userNameMsg" class="MsgHide">用户名不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 179px">
                    密码</td>
                <td class="td2">
                    <input name="password" size="50" type="password" value="" id="password" isRequired="true" onblur="valid_password('password', 'passValid')" />
                    <font color="red">*</font> <span id="passwordMsg" class="MsgHide">新密码不能为空！</span>
                    <span id="passValid">请使用字母和数字的组合，长度在6-20之间</span>
                </td>
            </tr>
            <tr>
                <td class="td1" style="width: 179px">
                    再次输入密码</td>
                <td class="td2">
                    <input name="password2"size="50"  type="password" value="" id="password2" isrequired="true"  onblur="check_next_password('password', 'password2', 'pass2Valid')"/>
                    <font color="red">*</font> <span id="password2Msg" class="MsgHide">再次输入密码不能为空！</span>
                    <span id="pass2Valid">请使用字母和数字的组合，长度在6-20之间</span>
                </td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">用户类别</td>
                <td class="td2" ><select id="roleId" name="roleId" >
                        <?php foreach ($roles as $r): ?>
                            <option value="<?= $r->roleId ?>"
                            <?php
                            if (isset($user->roleId) && $r->roleId == $user->roleId)
                                echo 'selected';
                            else
                                echo '';
                            ?>
                                    >
                                        <?= $r->roleName ?>
                            </option>
                        <?php endforeach; ?>
                    </select>       </td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">参与课题</td>
                <td class="td2">
                    <select id="subjectId" name="subjectId">
                        <?php foreach ($subject as $r): ?>
                            <option value="<?= $r->subjectId ?>"
                            <?php
                            if (isset($user->subjectId) && $r->subjectId == $user->subjectId)
                                echo 'selected';
                            else
                                echo '';
                            ?>
                                    >
                                        <?= $r->subjectName ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <font color="red">*</font><span id="subjectIdMsg" class="MsgHide">请选择课题！</span>      </td>
            </tr>

            <tr>
                <td class="td1" style="width: 111px">状态</td>
                <td class="td2">
                    <?= $user->state ?>
                    <input type="button" name="btnActive" value="激 活" onclick="window.location.href = '<?= base_url() ?>index.php/admin/user/userUpdate/<?= $user->userId ?>/0';" id="btnActive" class="input" style="<?= $showActive ?>" />
                    <input type="button" name="btnUnactive" value="注 销" onclick="window.location.href = '<?= base_url() ?>index.php/admin/user/userUpdate/<?= $user->userId ?>/1';" id="btnUnactive" class="input"  style="<?= $showUnactive ?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href = '<?= base_url() ?>index.php/admin/user/userDetail/<?= $user->userId ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
            </tr>
        </table>
    </form>
</div>