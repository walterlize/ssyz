<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 align="center">课题总经费预算执行表</h3>
    <table cellpadding="0" cellspacing="1" class="tablist2">

        <tr>
            <td class="td1">课题</td>
            <td class="td3">课题组单位</td>
            <td class="td1">预算经费总额(万元)</td>
            <td class="td3">已支出经费总额(万元)</td>
            <td class="td1">执行额度（%）</td>
            <td class="td3">详细</td>
        </tr>

        <tr>
            <?php if (is_array($totalMoney)) foreach ($totalMoney as $r): ?>



                    <td class="td1">
                        <?= $r['subjectName'] ?></td>
                    <td class="td3">
                        <?= $r['subjectUnit'] ?></td>
                    <td class="td1">
                        <?= $r['total'] ?></td>
                    <td class="td3">
                        <?= $r['totalcost'] ?></td>
                    <td class="td1">
                        <?= $r['total'] ?></td>
                    <td class="td3">
                        <a id="" href="<?= base_url() ?>index.php/admin/money/projectBudget/<?= $r['subjectId'] ?>">详细</a>
                    </td>



                </tr>


            <?php endforeach; ?>

    </table>

</div>