<div style="margin-left:20px; margin-right:20px">
<br />
<h3 class="title_lee">标准列表</h3>
<table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
		<tr class="HeaderStyle">
			<th class="td1">序号</th>
            <th class="td3">课题编号</th>
			<th class="td1">标准名称</th>
			<th class="td3">完成单位</th>
            <th class="td1">完成人</th>
            <th class="td3">审核日期</th>
            <th class="td1">状态</th>
            <th class="td3">操作</th>
		</tr>
        <?php if(is_array($standard)) foreach($standard as $key=>$r):?>
        <tr class="RowStyle" align="center">
        	<td class="td1">
            	<?=$key+1?></td>
			<td class="td1"><?=$r['subjectNum']?></td>
            <td class="td1"><?=$r['standardName']?></td>
            <td class="td1"><?=$r['workplace']?></td>
            <td class="td1"><?=$r['author']?></td>
            <td class="td1"><?=$r['time']?></td>
            <td class="td1"><?=$r['state']?></td>
            <td>
           	  <a id="" href="<?=base_url()?>index.php/admin/standard/standardDetail/<?=$r['standardId']?>">详细</a>
            </td>
		</tr>
        <?php endforeach; ?>
</table>
<div align="center"><?=$page?></div>
</div>