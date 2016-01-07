<div id="search_result">
    <div style="margin-left:20px; margin-right:20px">
        <br />

        <table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
            <tr class="HeaderStyle">
                <th class="td1">序号</th>
                <th class="td3">提交时间</th>
                <th class="td1">报销代码</th>
                <th class="td3">类别</th>
                <th class="td1">发票张数</th>
                <th class="td3">报销金额</th>
                <th class="td1">单位</th>
                <th class="td3">报销状态</th>
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
                            <?= $r['date'] ?>
                        </td>
                          <td class="td1">
                            <?= $r['code'] ?>
                        </td>
                        <td class="td3">
                            <?= $r['baoxiaoType'] ?>
                        </td>
                        <td class="td1">
                            <?= $r['num'] ?>
                        </td>
                        <td class="td3">
                            <?= $r['money'] ?>
                        </td>
                        <td class="td1">
                            <?= $r['subjectUnit'] ?>
                        </td>

                        <td class="td3">
                            <?= $r['state'] ?>
                        </td>
                        <td class="td1">
                            <a id="" href="<?= base_url() ?>index.php/manager/check/travelDetail/<?= $r['bao_id'] ?>" target="_blank">详细</a>
                        </td>
                        <td class="td3">
                              <div style="<?= $r['display1'] ?>"> 
                                  <input type="button" name="btnSave" value="<?= $r['stateShow3'] ?>" onclick="window.location.href = '<?= base_url() ?>index.php/manager/check/updateTravel/<?=$r['bao_id']?>/<?=$r['state3']?>/1';"  class="input"  />
                      </div>
                        </td>
                        <td class="td1"style="<?= $r['display'] ?>">
                            <div style="<?= $r['display'] ?>">
                                <input type="button" name="btnSave" value="<?= $r['stateShow4'] ?>" onclick="window.location.href = '<?= base_url() ?>index.php/manager/check/updateTravel/<?=$r['bao_id']?>/<?=$r['state4']?>/2';"  class="input"  />
                       </div> 
                        </td>
                    </tr>
                <?php endforeach; ?>

        </table>
        <div align="right"><font color="#3A6EA5" size="3px">共有<?= $num ?>条记录，每页10条。</font></div>
        <!--<div align="center"><?= $page ?></div>-->
    </div></div>