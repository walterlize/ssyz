<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="title_lee">用户信息编辑</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/manager/user/save" id="form1">
        <input type="hidden" value="<?= $user->userId ?>" name="userId" id="userId" />
        <input type="hidden" value="<?= $user->state ?>" name="state" id="state" />
         <input type="hidden" value="3" name="roleId" id="roleId" />
        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                <td class="td1" style="width: 111px">用户名</td>
                <td class="td2" ><input name="userName" type="text" id="userName" value="<?= $user->userName ?>" size="50"  isRequired="true" />
                    <font color="red">*</font><span id="userNameMsg" class="MsgHide">用户名不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">密码</td>
                <td class="td2" ><input name="password" type="text" id="password" value="<?= $user->password ?>" size="50"  isRequired="true" />
                    <font color="red">*</font><span id="passwordMsg" class="MsgHide">密码不能为空！</span></td>
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
                    <input type="button" name="btnActive" value="激 活" onclick="window.location.href='<?= base_url() ?>index.php/manager/user/userUpdate/<?= $user->userId ?>/0';" id="btnActive" class="input" style="<?= $showActive ?>" />
                    <input type="button" name="btnUnactive" value="注 销" onclick="window.location.href='<?= base_url() ?>index.php/manager/user/userUpdate/<?= $user->userId ?>/1';" id="btnUnactive" class="input"  style="<?= $showUnactive ?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/manager/user/userDetail/<?= $user->userId ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />      </td>
            </tr>
        </table>
    </form>
</div>