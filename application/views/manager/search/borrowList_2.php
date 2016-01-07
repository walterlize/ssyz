<div id="search_result">
    <div style="margin-left:20px; margin-right:20px">
        <br />

        <table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
            <tr class="HeaderStyle">
                <th class="td1">序号</th>
                <th class="td3">时间</th>
                <th class="td1">借款代码</th>
                <th class="td3">类别</th>
                <th class="td1">金额类别</th>
                <th class="td3">金额</th>
                <th class="td1">单位</th>
                <th class="td3">状态</th>
                <th class="td1">查看详情</th>
                <th class="td3">审核</th>
                <th class="td1">完成</th>


            </tr>
            <?php if (is_array($baoxiao)) foreach ($baoxiao as $key => $r): ?>
                    <tr class="RowStyle" align="center">
                        <td class="td1">
                            <?= $key + 1 ?>
                        </td>
                        <td class="td3">
                            借款时间：<?= $r['date'] ?>，报销时间<?= $r['date5'] ?>
                        </td>
                        <td class="td1">
                            <?= $r['code'] ?>
                        </td>
                        <td class="td3">
                            <?= $r['type'] ?>
                        </td>
                        <td class="td1">
                            <?= $r['moneyType'] ?>
                        </td>

                        <td class="td3">
                            借款金额：<?= $r['moneyOld'] ?>，实际报销金额<?=$r['money']?>
                        </td>
                        <td class="td1">
                            <?= $r['subjectUnit'] ?>
                        </td>
                        <td class="td3">
                            <?= $r['state2'] ?>
                        </td>
                        <td class="td1">
                            <a id="" href="<?= base_url() ?>index.php/manager/check/borrowBaoxiaoDetail/<?= $r['b_id'] ?>" target="_blank">详细</a>
                        </td>
                        <td class="td1">
                            <div style="<?= $r['display1'] ?>"> 
                                <input type="button" name="btnSave" value="<?= $r['stateShow3'] ?>" onclick="window.location.href = '<?= base_url() ?>index.php/manager/check/updateBorrow_2/<?= $r['b_id'] ?>/<?= $r['state3'] ?>/1';"  class="input"  />
                                <!--<a id="" href="<?= base_url() ?>index.php/manager/check/borrowDetail/<?= $r['b_id'] ?>">操作</a>-->
                            </div>
                        </td>
                        <td class="td1">
                            <div style="<?= $r['display'] ?>"> 
                                <input type="button" name="btnSave" value="<?= $r['stateShow4'] ?>" onclick="window.location.href = '<?= base_url() ?>index.php/manager/check/updateBorrow_2/<?= $r['b_id'] ?>/<?= $r['state4'] ?>/2';"  class="input"  />
                                <!--<a id="" href="<?= base_url() ?>index.php/manager/check/borrowDetail/<?= $r['b_id'] ?>">操作</a>-->
                            </div>
                        </td>

                    </tr>
                <?php endforeach; ?>

        </table>
        <div align="right"><font color="#3A6EA5" size="3px">共有<?= $num ?>条记录，每页10条。</font></div>
        <!--<div align="center"><?= $page ?></div>-->
    </div></div>