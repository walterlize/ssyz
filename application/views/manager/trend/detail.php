<div align="center">
  <div class="context">
<div style="width:80%">
<br />
<TABLE width="100%" border="0">
    <TR>
    	<TD align="center" style="font-family:宋体;font-size:14pt;line-height:20pt;color:#000"><B><?=$trend->trendName?></B></TD>
	</TR>
    <TR>
    	<TD align="right"><HR size="1" color="#CC0066"><FONT color="black" style="font-size:10pt">作者:&nbsp;<?=$trend->trendAuthor?>&nbsp;时间:<?=$trend->time?></FONT></TD>
	</TR>
</TABLE>
<div>
    <div align="left" style="width:80%"><?=$trend->content?>></div>
    <br />
    <hr />
    <div align="left">状态：<?=$trend->state?></div>
    <p align="center">
    	<input type="button" value="修 改" class="input" onclick="window.location.href='<?=base_url()?>index.php/manager/trend/trendEdit/<?=$trend->trendId?>'" style="<?=$show?>">
        <input type="button" value="删 除" class="input" onclick="deleteInfo('<?=base_url()?>index.php/manager/trend/trendDelete/<?=$trend->trendId?>/<?=$trend->trendType?>')" style="<?=$show?>">
        <input type="button" value="返 回" class="input" onclick="window.location.href='<?=base_url()?>index.php/manager/trend/trendList'">
    </p>
    <br />
</div>
</div>
</div>
</div>
