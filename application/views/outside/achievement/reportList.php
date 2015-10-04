<!--paper列表页面-->
<TD width=5 background="<?= base_url() ?>images/coe/gxy_bg_11.gif"></TD>
<TD vAlign=top bgColor=#ffffff>
    <TABLE cellSpacing=0 cellPadding=0 width=719 border=0>
        <TBODY>
        <TR>
            <TD
                style="PADDING-RIGHT: 13px; PADDING-LEFT: 13px; PADDING-BOTTOM: 13px; PADDING-TOP: 13px">
                <TABLE cellSpacing=0 cellPadding=0 width=693 border=0>
                    <TBODY>
                    <TR>
                        <TD style="BACKGROUND-REPEAT: no-repeat" width=45
                            background="<?= base_url() ?>images/coe/gxy_bg_13.gif" height=40></TD>
                        <TD style="BACKGROUND-REPEAT: repeat-x"
                            background="<?= base_url() ?>images/coe/gxy_bg_14.gif">
                            <TABLE cellSpacing=0 cellPadding=0 border=0>
                                <TBODY>
                                <TR>
                                    <TD><A class=bt_link
                                           href="<?= base_url() ?>">首页</A></TD>
                                    <TD>&gt;&gt; <A class=bt_link
                                                    href=#"><?= $title ?></A></TD></TR></TBODY></TABLE></TD>
                        <TD style="BACKGROUND-REPEAT: no-repeat" width=6
                            background="<?= base_url() ?>images/coe/gxy_bg_15.gif"></TD></TR></TBODY></TABLE></TD></TR>
        <TR>
            <TD>
                <TABLE cellSpacing=0 cellPadding=0 width=719 border=0>
                    <TBODY>
                    <TR>
                        <TD style="PADDING-LEFT: 24px; PADDING-BOTTOM: 3px" align=left
                            width=17><IMG src="<?= base_url() ?>images/coe/gxy_bg_16.gif"></TD>
                        <TD
                            style="PADDING-LEFT: 10px; FONT-WEIGHT: bold; FONT-SIZE: 14px; PADDING-BOTTOM: 3px; COLOR: #06447d">
                            <SCRIPT language=javascript>
                                window.onload = function() {
                                    <?= $title ?>.className = "ndcol_linka";
                                }
                            </SCRIPT>
                            <?= $title ?></TD></TR></TBODY></TABLE></TD></TR>
        <TR>
            <TD>
                <TABLE cellSpacing=0 cellPadding=0 width=719 border=0>
                    <TBODY>
                    <TR>
                        <TD width=13></TD>
                        <TD width=149 bgColor=#0a4589 height=3></TD>
                        <TD width=2></TD>
                        <TD style="BORDER-TOP: #d2d2d2 1px solid" width=542></TD>
                        <TD></TD></TR></TBODY></TABLE></TD></TR>
        <TR>

        <tr>
            <td valign="top" height="250" style="padding:24px">
                <div id="8529">
                    <div class="default_pgContainer">
                        <table width="99%" cellspacing="0" cellpadding="0" border="0" style="margin-left:2px">
                            <tbody>
                            <font style="padding:0 4px 0 4px;FONT-size:10.5pt;"></font>
                            <div style="font-size=20px">
                                <?php if(is_array($report)) foreach($report as $key=>$r):?>

                                <?=$key+1?>、&nbsp
                                <a id="" href="<?=base_url()?>index.php/head/report/reportDetail/<?=$r['reportId']?>" target="_blank">
                                    <?=$r['reportName']?>
                                </a>
                                <div>
                                    <br /><br />
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div align="center"><?= $page ?> </div>

                    </div>
            </TD></TR></TBODY></TABLE></TD>
<TD style="BACKGROUND-REPEAT: repeat-y" width=15 background="<?= base_url() ?>images/coe/gxy_bg_12.gif"></TD></TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 width=962 align=center border=0>
    <TBODY>
    <TR>
        <TD style="BACKGROUND-REPEAT: no-repeat" width=17 background="<?= base_url() ?>images/coe/gxy_bg_03.gif" height=20></TD>
        <TD style="BACKGROUND-REPEAT: repeat-x" width=207 background="<?= base_url() ?>images/coe/gxy_bg_17.gif"></TD>
        <TD width=4 background="<?= base_url() ?>images/coe/gxy_bg_18.gif"></TD>
        <TD style="BACKGROUND-REPEAT: repeat-x" width=719 background="<?= base_url() ?>images/coe/gxy_bg_19.gif"></TD>
        <TD width=15 background="<?= base_url() ?>images/coe/gxy_bg_20.gif"></TD>
    </TR>
    </TBODY>
</TABLE>
</DIV>
<!-- visitcount Begin -->
<IFRAME id=vishidden name=vishidden src="<?= base_url() ?>images/coe/visit.htm" width=0 height=0></IFRAME>
<!-- visitcount End -->
</BODY>
</HTML>
