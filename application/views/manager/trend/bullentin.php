<div style="margin-left:20px; margin-right:20px">
<br />
<h3 class="title_lee">公告管理</h3>
<table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
		<tr class="HeaderStyle">
			<th scope="col">全选<input type="checkbox" /></th>
			<th scope="col">公告标题</th>
			<th scope="col">发布人</th>
			<th scope="col">发布时间</th><th scope="col">操作</th>
		</tr>
        <?php if(is_array($trends)) foreach($trends as $r):?>
        <tr class="RowStyle" align="center">
        	<td>
            	<input type="checkbox" /></td>
			<td>
				<?=$r['trendName']?></td>
            <td>
				<?=$r['trendAuthor']?></td>
            <td>
				<?=$r['time']?></td>
            <td>
            	<a id="" href="<?=base_url()?>index.php/admin/trend/trendDetail/<?=$r['trendId']?>">详细</a>
            </td>
		</tr>
        <?php endforeach; ?>
        <tr>
        	<td colspan="5" align="center">
            	<input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?=base_url()?>index.php/admin/trend/trendNew/1';" id="btnDelete" class="input" />
      	  		<input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?=base_url()?>index.php/admin/subject/subjectManage';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
</table>
<div align="center"><?=$page?></div>
</div>