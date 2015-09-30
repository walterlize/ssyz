<div style="margin-left:20px; margin-right:20px">
<br />
<h3 class="title_lee">论文列表</h3>
<table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
		<tr class="HeaderStyle">
			<th class="td1"">序号</th>
            <th class="td3">课题编号</th>
			<th class="td1">论文名称</th>
			<th class="td3">刊物名称</th>
            <th class="td1">论文作者</th>
            <th class="td3">发表时间</th>
            <th class="td1">收录</th>
            <th class="td3">状态</th>
            <th class="td1">操作</th>
		</tr>
        <?php if(is_array($paper)) foreach($paper as $key=>$r):?>
        <tr class="RowStyle" align="center">
        	<td class="td1">
            <?=$key+1?>
            </td>
            <td class="td3"><?=$r['subjectNum']?></td>
			<td class="td1"><?=$r['paperName']?></td>
            <td class="td3"><?=$r['publication']?></td>
            <td class="td1"><?=$r['author']?></td>
            <td class="td3"><?=$r['time']?></td>
            <td class="td1"><?=$r['record']?></td>
            <td class="td3"><?=$r['state']?></td>
            <td class="td1">
           	  <a id="" href="<?=base_url()?>index.php/admin/paper/paperDetail/<?=$r['paperId']?>">详细</a>
            </td>
		</tr>
        <?php endforeach; ?>
</table>
<div align="center"><?=$page?></div>
</div>