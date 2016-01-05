<div id="search_result">
    <div style="margin-left:20px; margin-right:20px">
        <br />
       
        <table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
            <tr class="HeaderStyle">
                <th class="td1">序号</th>
                <th class="td3">时间</th>
                <th class="td1">类型</th>
                <th class="td3">金额（元）</th>
                <th class="td1">详情</th>
            </tr>
            <?php if (is_array($money)) foreach ($money as $key => $r): ?>
                    <tr class="RowStyle" align="center">
                        <td class="td1">
                            <?= $key + 1 ?></td>
                        <td class="td3">
                            <?= $r['date'] ?></td>
                        <td class="td1">
                            <?= $r['moneyType'] ?></td>
                        <td class="td3">
                            <?= $r['money'] ?></td>
                        <td class="td1">
                            <a id="" href="<?= base_url() ?>index.php/ordinary/money/expenseDetail/<?= $r['b_id'] ?>/<?= $r['m_type'] ?>" target="_blank">详情</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

        </table>
         <div align="right"><font color="#3A6EA5" size="3px">总金额<?=$sum?>元。<br/>共有<?= $num ?>条记录，每页10条。</font></div>
        <div align="center"><?= $page ?></div>
    </div>
</div>