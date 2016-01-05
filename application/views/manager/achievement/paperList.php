<div style="margin-left:20px; margin-right:20px">
<br />
<h3 class="title_lee">论文列表</h3>
<table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
		<tr class="HeaderStyle">
			<th class="td1">序号</th>
			<th class="td3">论文名称</th>
			<th class="td1">刊物名称</th>
            <th class="td3">论文作者</th>
            <th class="td1">发表时间</th>
            <th class="td3">收录类型</th>
            <th class="td1">论文第一单位</th>
            <th class="td3">提交单位</th>
            <th class="td1">状态</th>
            <th class="td3">操作</th>
		</tr>
        <?php if(is_array($paper)) foreach($paper as $key=>$r):?>
        <tr class="RowStyle" align="center">

            <td class="td1">
                <?= $key + 1 ?>
            </td>

			<td class="td3"><?=$r['paperName']?>
            <td class="td1"><?=$r['publication']?></td>
            <td class="td3"><?=$r['author']?></td>
            <td class="td1"><?=$r['time']?></td>
            <td class="td3"><?=$r['record']?></td>
            <td class="td1"><?=$r['authorWorkplace']?></td>
            <td class="td3"><?=$r['subjectUnit']?></td>
            <td class="td1"><?=$r['state']?></td>
            <td class="td3">
           	  <a id="" href="<?=base_url()?>index.php/manager/paper/paperDetail/<?=$r['paperId']?>">详细</a>
            </td>
		</tr>
        <?php endforeach; ?>
        <tr class="td3">
        	<td colspan="10" align="center">
           	  <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?=base_url()?>index.php/manager/paper/paperNew';" id="btnDelete" class="input" />
   	  		  <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?=base_url()?>index.php/manager/paper/paperDelete';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
</table>
<div align="center"><?=$page?></div>
</div>