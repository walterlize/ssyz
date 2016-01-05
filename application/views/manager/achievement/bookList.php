<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 class="title_lee">论著列表</h3>
    <table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
        <tr class="HeaderStyle">
            <th class="td1">序号</th>
            <th class="td3">论著名称</th>
            <th class="td1">出版社</th>
            <th class="td3">主编</th>
            <th class="td1">出版时间</th>
            <th class="td3">状态</th>
            <th class="td1">操作</th>
        </tr>
        <?php if(is_array($book)) foreach($book as $key=>$r):?>
            <tr class="RowStyle" align="center">
                <td class="td1">
                    <?=$key+1?>
                </td>
                <td class="td3"><?=$r['bookName']?></td>
                <td class="td1"><?=$r['publication']?></td>
                <td class="td3"><?=$r['chiefEditor']?></td>
                <td class="td1"><?=$r['time']?></td>
                <td class="td3"><?=$r['state']?></td>
                <td class="td1">
                    <a id="" href="<?=base_url()?>index.php/manager/book/bookDetail/<?=$r['bookId']?>">详细</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr class="td3">
            <td colspan="8" align="center">
                <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?=base_url()?>index.php/manager/book/bookNew';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?=base_url()?>index.php/manager/book/bookDelete';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
    </table>
    <div align="center"><?=$page?></div>
</div>