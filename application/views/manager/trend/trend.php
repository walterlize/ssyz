<div style="margin-left:20px; margin-right:20px">
<br />
<h3 class="title_lee">项目动态</h3>
<table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
		<tr class="HeaderStyle">
			<th class="td1">序号</th>
			<th class="td3">动态标题</th>
			<th class="td1">发布人</th>
			<th class="td3">审核状态</th>
			<th class="td1">发布时间</th>
			<th class="td3">操作</th>
		</tr>
        <?php if(is_array($trends)) foreach($trends as $key=>$r):?>
        <tr class="RowStyle" align="center">
        	<td class="td1">
            	<?=$key+1?></td>
			<td class="td3">
				<?=$r['trendName']?></td>
            <td class="td1">
				<?=$r['trendAuthor']?></td>
            <td class="td3">
				<?=$r['time']?></td>
              <td class="td1">
				<?=$r['state']?></td>
            <td class="td3">
            	<a id="" href="<?=base_url()?>index.php/manager/trend/trendDetail/<?=$r['trendId']?>">详细</a>
            </td>
		</tr>
        <?php endforeach; ?>
        <tr class="td3">
        	<td colspan="6" align="center">
            	<input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?=base_url()?>index.php/manager/trend/trendNew/2';" id="btnDelete" class="input" />
      	  		<input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?=base_url()?>index.php/manager/subject/subjectManage';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
</table>
<div align="center"><?=$page?></div>
</div>