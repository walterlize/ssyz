<div style="margin-left:20px; margin-right:20px">
<br />
<h3>软件著作权列表</h3>
<table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
		<tr class="HeaderStyle">
			<th scope="col">全选<input type="checkbox" /></th>
            <th scope="col">课题编号</th>
			<th scope="col">软著名称</th>
			<th scope="col">完成人</th>
            <th scope="col">授权号</th>
            <th scope="col">授权日期</th>
            <th scope="col">状态</th>
            <th scope="col">操作</th>
		</tr>
        <?php if(is_array($software)) foreach($software as $r):?>
        <tr class="RowStyle" align="center">
        	<td>
            	<input type="checkbox" /></td>
			<td><?=$r['subjectNum']?></td>
            <td><?=$r['softwareName']?></td>
            <td><?=$r['author']?></td>
            <td><?=$r['authorizeNum']?></td>
            <td><?=$r['time']?></td>
            <td><?=$r['state']?></td>
            <td>
           	  <a id="" href="<?=base_url()?>index.php/admin/software/softwareDetail/<?=$r['softwareId']?>">详细</a>
            </td>
		</tr>
        <?php endforeach; ?>
</table>
<div align="center"><?=$page?></div>
</div>