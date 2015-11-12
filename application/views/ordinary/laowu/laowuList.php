<div id="search_result">

    <br />
   <div style="margin-left:20px; margin-right:20px">
    <table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th class="td1">序号</th>
            <th class="td3">代码</th>
            <th class="td1">申请时间</th>
            <th class="td3">类别</th>
            <th class="td1">人数</th>
            <th class="td3">金额（元）</th>
            <th class="td1">状态</th>
            <th class="td3">编辑</th>
        </tr>
        <?php if (is_array($laowu)) foreach ($laowu as $key => $r): ?>
                <tr class="RowStyle" align="center">
                    <td class="td1">
                        <?= $key + 1 ?></td>
                    <td class="td3">
                        <?= $r['code'] ?></td>
                    <td class="td1">
                        <?= $r['date'] ?></td>
                    <td class="td3">
                        <?= $r['type'] ?></td>
                    <td class="td1">
                        <?= $r['peopleNum'] ?></td>

                    <td class="td3">
                       申报：<?= $r['money'] ?>元，其中缴税：<?= $r['money'] ?>元，实际金额<?=$r['money1']?>元。</td>
                    <td class="td1">
                        <p style="color:<?= $r['color'] ?>"><?= $r['state'] ?></p>
                    </td>
                    <td class="td3">
                        <a id="" href="<?= base_url() ?>index.php/ordinary/laowu/laowuDetail/<?= $r['laowu_id'] ?>" target="_blank">编辑</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <tr>
            <td colspan="8" align="center"  class="td3">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href = '<?= base_url() ?>index.php/ordinary/laowu/laowuNew';" id="btnDelete" class="input" />
            </td>
        </tr>
    </table>
    <div align="right"><font color="#3A6EA5" size="3px">共有<?= $num ?>条记录，每页10条。</font></div>
    <div align="center"><?= $page ?></div>
</div>
</div>