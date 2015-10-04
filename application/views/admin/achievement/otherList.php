<div style="margin-left:20px; margin-right:20px">
<br />
<h3 class="title_lee">其他列表</h3>
<table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
		<tr class="HeaderStyle">
			<th class="td1">序号</th>
            <th class="td3">课题编号</th>
			<th class="td1">名称</th>
			<th class="td3">内容</th>
            <th class="td1">状态</th>
            <th class="td3">操作</th>
		</tr>
        <?php if(is_array($other)) foreach($other as $r):?>
        <tr class="RowStyle" align="center">
        	<td class="td1">
            	<input type="checkbox" /></td>
			<td class="td3"><?=$r['subjectNum']?></td>
            <td class="td1"><?=$r['otherName']?></td>
            <td class="td3"><?=$r['content']?></td>
            <td class="td1"><?=$r['state']?></td>
            <td class="td3">
           	  <a id="" href="<?=base_url()?>index.php/admin/other/otherDetail/<?=$r['otherId']?>">详细</a>
            </td>
		</tr>
        <?php endforeach; ?>
</table>
<div align="center"><?=$page?></div>
</div>