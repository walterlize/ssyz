<div id="date_result">
    <br />

    <table cellpadding="0" cellspacing="1" class="tablist2">

        <tr>
            <td class="td1">课题组</td>
            <td class="td1">课题单位</td>
            <td class="td3" align="center"><?= $year ?>年<?= $month ?>月份经费使用</td>
            <td class="td1">设备费</td>
            <td class="td3" align="center">材料费</td>
            <td class="td1">测试化验费</td>
            <td class="td3" align="center">燃料动力费</td>
            <td class="td1">差旅费</td>
            <td class="td3" align="center">会议费</td>
            <td class="td1">国际合作费</td> 
            <td class="td3" align="center">出版/文献/信息传播/知识产权事务费</td>
            <td class="td1">劳务费</td>
            <td class="td3" align="center">专家咨询费</td>
            <td class="td1">管理费</td> 


        </tr>

        <tr>
            <?php if (is_array($monthMoney)) foreach ($monthMoney as $r): ?>

                    <td class="td1">
                        <?= $r['subjectName'] ?></td>

                    <td class="td1">
                        <?= $r['subjectUnit'] ?></td>
                    <td class="td3">
                        <?= $r['total'] ?> </td>
                    <td class="td1">
                        <?= $r['equipment'] ?></td>

                    <td class="td3">
                        <?= $r['material'] ?></td>
                    <td class="td1">
                        <?= $r['experiment'] ?></td>

                    <td class="td3">
                        <?= $r['fuel'] ?></td>


                    <td class="td1">
                        <?= $r['travel'] ?></td>
                    <td class="td3">
                        <?= $r['conference'] ?></td>

                    <td class="td1">
                        <?= $r['international'] ?></td>
                    <td class="td3">
                        <?= $r['information'] ?></td>

                    <td class="td1">
                        <?= $r['service'] ?></td>
                    <td class="td3">
                        <?= $r['consultative'] ?></td>

                    <td class="td1">
                        <?= $r['management'] ?></td>




                </tr>


            <?php endforeach; ?>

    </table>

</div>