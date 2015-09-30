<div style="margin-left:20px; margin-right:20px">
<br />
<h3 class="title_lee">专利列表</h3>
<table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
		<tr class="HeaderStyle">
			<th class="td1">序号</th>
			<th class="td3">专利名称</th>
			<th class="td1">专利号</th>
            <th class="td3">完成人</th>
            <th class="td1">完成单位</th>
            <th class="td3">状态</th>
            <th class="td1">操作</th>
		</tr>
        <?php if(is_array($patent)) foreach($patent as $r):?>
        <tr class="RowStyle" align="center">
        	<td class="td1">
            	<input type="checkbox" /></td>
			<td class="td3"><?=$r['patentName']?></td>
            <td class="td1"><?=$r['patentNum']?></td>
            <td class="td3"><?=$r['author']?></td>
            <td class="td1"><?=$r['workplace']?></td>
            <td class="td3"><?=$r['state']?></td>
            <td class="td1">
           	  <a id="" href="<?=base_url()?>index.php/manager/patent/patentDetail/<?=$r['patentId']?>">详细</a>
            </td>
		</tr>
        <?php endforeach; ?>
        <tr class="td3">
        	<td colspan="8" align="center">
           	  <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?=base_url()?>index.php/manager/patent/patentNew';" id="btnDelete" class="input" />
   	  		  <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?=base_url()?>index.php/manager/patent/patentDelete';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
</table>
<div align="center"><?=$page?></div>
</div>