<div style="margin-left:20px; margin-right:20px">
<br />
<h3>标准列表</h3>
<table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
		<tr class="HeaderStyle">
			<th scope="col">全选<input type="checkbox" /></th>
			<th scope="col">标准名称</th>
			<th scope="col">完成单位</th>
            <th scope="col">完成人</th>
            <th scope="col">审核日期</th>
            <th scope="col">状态</th>
            <th scope="col">操作</th>
		</tr>
        <?php if(is_array($standard)) foreach($standard as $r):?>
        <tr class="RowStyle" align="center">
        	<td>
            	<input type="checkbox" /></td>
			<td><?=$r['standardName']?></td>
            <td><?=$r['workplace']?></td>
            <td><?=$r['author']?></td>
            <td><?=$r['time']?></td>
            <td><?=$r['state']?></td>
            <td>
           	  <a id="" href="<?=base_url()?>index.php/manager/standard/standardDetail/<?=$r['standardId']?>">详细</a>
            </td>
		</tr>
        <?php endforeach; ?>
        <tr>
        	<td colspan="8" align="center">
           	  <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?=base_url()?>index.php/manager/standard/standardNew';" id="btnDelete" class="input" />
   	  		  <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?=base_url()?>index.php/manager/standard/standardDelete';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
</table>
<div align="center"><?=$page?></div>
</div>