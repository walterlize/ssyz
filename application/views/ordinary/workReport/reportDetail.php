<div align="center">
  <div class="context">
<div style="width:80%">
<br />
<TABLE width="100%" border="0">
   <TR>
    	<TD align="center" style="font-family:宋体;font-size:14pt;line-height:20pt;color:#000"><B><?=$report->title?></B></TD>
	</TR>
    <TR>
    	<TD align="right"><HR size="1" color="#CC0066"><FONT color="black" style="font-size:10pt">作者:&nbsp;<?=$report->author?>&nbsp;时间:<?=$report->year?>年<?=$report->month?>月</FONT></TD>
	</TR>
</TABLE>
<div>
    <div align="left" style="width:80%"><?=$report->content?></div>
    <br />
    <hr />
    <div align="left">状态：<?=$report->state?></div>
    <p align="center">
    	<input type="button" value="修 改" class="input" onclick="window.location.href='<?=base_url();?>index.php/ordinary/workReport/reportEdit/<?=$report->workReportId?>'" style="<?=$show?>">
        <input type="button" value="删 除" class="input" onclick="deleteInfo('<?=base_url();?>index.php/ordinary/workReport/reportDelete/<?=$report->workReportId?>/<?=$report->type?>')" style="<?=$show?>">
        <input type="button" value="返 回" class="input" onclick="window.location.href='<?=base_url();?>index.php/ordinary/workReport/reportList/<?=$report->type?>/2'">
    </p>
    <br />
</div>
</div>
</div>
</div>