<div id="search_result">
    <div style="margin-left:20px; margin-right:20px">
        <br />

        <table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
            <tr class="HeaderStyle">
                <th class="td1">序号</th>
                <th class="td3">时间</th> 
              
                <th class="td1">代码</th>
                <th class="td3">类别</th>
                <th class="td1">汇款/借款类别</th>
                <th class="td3">收款单位</th>
                <th class="td1">金额（元）</th>
                <th class="td3">状态</th>
                <th class="td1">操作</th>
            </tr>
            <?php if (is_array($borrow)) foreach ($borrow as $key => $r): ?>
                    <tr class="RowStyle" align="center">
                        <td class="td1">
                            <?= $key + 1 ?></td>
                        <td class="td3">
                            提交时间：<?= $r['date'] ?>，借款完成时间<?= $r['date4'] ?></td>
                        <td class="td1">
                            <?= $r['code'] ?></td>
                        <td class="td3">
                            <?= $r['type'] ?></td>
                        <td class="td1">
                            <?= $r['borrowType'] ?>-<?= $r['moneyType'] ?></td>
                        <td class="td3">
                            <?= $r['b_name'] ?></td>
                        <td class="td1">
                            <?= $r['money'] ?></td>
                        <td class="td3">
                            <p style="color:<?= $r['color'] ?>"><?= $r['state'] ?></p>
                        </td>
                        </td>
                        <td class="td1">
                            <a id="" href="<?= base_url() ?>index.php/ordinary/borrow/baoxiaoDetail/<?= $r['b_id'] ?>" target="_blank">编辑/查看</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
           
        </table>
        <div align="right"><font color="#3A6EA5" size="3px">共有<?= $num ?>条记录，每页10条。</font></div>
        <div align="center"><?= $page ?></div>
    </div>
</div>