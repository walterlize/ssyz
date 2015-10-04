
<div align="center">
  <div class="context">
<div style="width:80%">
<br />
<TABLE width="100%" border="0">
    <TR>
    	<TD align="center" style="font-family:宋体;font-size:14pt;line-height:20pt;color:#000"><B><?=$trend->trendName?></B></TD>
	</TR>
    <TR>
    	<TD align="right"><HR size="1" color="#006666"><FONT color="black" style="font-size:10pt">作者:&nbsp;<?=$trend->trendAuthor?>&nbsp;时间:<?=$trend->time?></FONT></TD>
	</TR>
</TABLE>
<div>
    <div align="left" style="width:80%"><?=$trend->content?></div>
    <br />
    <hr />
    <div align="left">状态：<?=$trend->state?></div>
    <p align="center">
    	<input type="button" value="通 过" class="input" onclick="window.location.href='<?=base_url();?>index.php/admin/trend/updateTrendState/<?=$trend->trendId?>/2'">
        <input type="button" value="整 改" class="input" onclick="window.location.href='<?=base_url();?>index.php/admin/trend/updateTrendState/<?=$trend->trendId?>/1'">
        <input type="button" value="返 回" class="input" onclick="window.location.href='<?=base_url();?>index.php/admin/trend/trendList/2'">
    </p>
    <br />
</div>
</div>
</div>
</div>














