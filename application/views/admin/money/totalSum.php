<div id="date_result">
    <br />

    <table cellpadding="0" cellspacing="1" class="tablist2">

        <tr>
            <td class="td1">课题组</td>
            <td class="td1">课题单位</td>
            <td class="td3" align="center">课题经费预算总额</td>
            <td class="td1" align="center">已花费的金额</td>
            <td class="td3" align="center">剩余的经费</td>
            <td class="td1" align="center">经费执行率(%)</td>
            <td class="td3">设备费</td>
            <td class="td1" align="center">材料费</td>
            <td class="td3">测试化验费</td>
            <td class="td1" align="center">燃料动力费</td>
            <td class="td3">差旅费</td>
            <td class="td1" align="center">会议费</td>
            <td class="td3">国际合作费</td> 
            <td class="td1" align="center">出版/文献/信息传播/知识产权事务费</td>
            <td class="td3">劳务费</td>
            <td class="td1" align="center">专家咨询费</td>
            <td class="td3">管理费</td> 
            <!--<td class="td1">详细</td>--> 


        </tr>

        <tr>
            <?php if (is_array($yearSum)) foreach ($yearSum as $r): ?>


                    <td class="td1">
                        <?= $r['subjectName'] ?></td>
                    <td class="td1">
                        <?= $r['subjectUnit'] ?></td>
                    <td class="td3">
                        <?= $r['totalgive'] ?> </td>
                    <td class="td1">
                        <?= $r['total'] ?> </td>
                    <td class="td3">
                        <?= $r['last'] ?> </td>
                    <td class="td1">
                        <?= $r['rate'] ?>% </td>
                    <td class="td3">
                        <?= $r['equipment'] ?></td>

                    <td class="td1">
                        <?= $r['material'] ?></td>
                    <td class="td3">
                        <?= $r['experiment'] ?></td>

                    <td class="td1">
                        <?= $r['fuel'] ?></td>


                    <td class="td3">
                        <?= $r['travel'] ?></td>
                    <td class="td1">
                        <?= $r['conference'] ?></td>

                    <td class="td3">
                        <?= $r['international'] ?></td>
                    <td class="td1">
                        <?= $r['information'] ?></td>

                    <td class="td3">
                        <?= $r['service'] ?></td>
                    <td class="td1">
                        <?= $r['consultative'] ?></td>

                    <td class="td3">
                        <?= $r['management'] ?></td>
                  <!--  <td class="td1">
                        <a id="" href="<?= base_url() ?>index.php/admin/money/totalSumDetail/<?= $r['subjectId'] ?>">详细</a></td>-->




                </tr>


            <?php endforeach; ?>

    </table>

</div>