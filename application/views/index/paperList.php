
<STYLE type=text/css>.wzOn {
        BACKGROUND-POSITION: 50% top; FONT-WEIGHT: bold; BACKGROUND-IMAGE: url(<?= base_url() ?>images/gxy_38.jpg); CURSOR: pointer; COLOR: #003333; PADDING-TOP: 2px; BACKGROUND-REPEAT: no-repeat
    }
    .wz {
        CURSOR: pointer; COLOR: #003333; PADDING-TOP: 2px
    }
    .ww {
        CURSOR: pointer; COLOR: #003333; PADDING-TOP: 2px
    }
    .wwOn {
        BACKGROUND-POSITION: 50% top; FONT-WEIGHT: bold; BACKGROUND-IMAGE: url(<?= base_url() ?>images/gxy_38.jpg); CURSOR: pointer; COLOR: #003333; PADDING-TOP: 2px; BACKGROUND-REPEAT: no-repeat
    }
    .wq {
        CURSOR: pointer; COLOR: #003333; PADDING-TOP: 2px
    }
    .wqOn {
        FONT-WEIGHT: bold; CURSOR: pointer; COLOR: #003333; PADDING-TOP: 2px
    }
    .qq {
        CURSOR: pointer; COLOR: #003333; PADDING-TOP: 2px
    }
    .qqOn {
        FONT-WEIGHT: bold; CURSOR: pointer; COLOR: #003333; PADDING-TOP: 2px
    }
</STYLE>

<SCRIPT type=text/javascript>
    function ShowTag(TagName, TagClass, num, count, more) {
        for (var i = 0; i < count; i++) {
            var tag = document.getElementById(TagName + "_tab_" + i);
            var cont = document.getElementById(TagName + "_cont_" + i);
            var mores;
            if (more) {
                mores = document.getElementById(TagName + "_more_" + i);
            }
            if (i == num) {
                tag.className = TagClass + "On";
                cont.style.display = "block";
                if (more) {
                    mores.style.display = "block";
                }
            } else {
                tag.className = TagClass;
                cont.style.display = "none";
                if (more) {
                    mores.style.display = "none";
                }
            }
        }
    }
</SCRIPT>
</HEAD>
<BODY>
    <DIV 
        style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px;  PADDING-BOTTOM: 0px; MARGIN: 0px auto; WIDTH: 1002px; PADDING-TOP: 0px">

        <TABLE height=10 cellSpacing=0 cellPadding=0 width=962 align=center border=0>
            <TBODY>
                <TR>
                    <TD></TD></TR></TBODY></TABLE>
        <TABLE cellSpacing=0 cellPadding=0 width=962 align=center border=0>
            <TBODY>
                <TR>
                    <TD style="BACKGROUND-REPEAT: no-repeat" width=17 
                        background="<?= base_url() ?>images/coe/gxy_bg_01.gif" height=20></TD>
                    <TD style="BACKGROUND-REPEAT: repeat-x" width=207 
                        background="<?= base_url() ?>images/coe/gxy_bg_05.gif"></TD>
                    <TD width=4 background="<?= base_url() ?>images/coe/gxy_bg_09.gif"></TD>
                    <TD style="BACKGROUND-REPEAT: repeat-x" width=719 
                        background="<?= base_url() ?>images/coe/gxy_bg_10.gif"></TD>
                    <TD width=15 
                        background="<?= base_url() ?>images/coe/gxy_bg_02.gif"></TD></TR></TBODY></TABLE>
        <TABLE cellSpacing=0 cellPadding=0 width=962 align=center border=0>
            <TBODY>
                <TR>
                    <TD width=17 background="<?= base_url() ?>images/coe/gxy_bg_04.gif"></TD>
                    <TD vAlign=top width=206 bgColor=#fcfcfc>
                        <TABLE cellSpacing=0 cellPadding=0 width=206 border=0>
                            <TBODY>
                                <TR>
                                    <TD bgColor=#fcfcfc height=20></TD></TR>
                                <TR>
                                    <TD width=206 height=38>
                                        <TABLE cellSpacing=0 cellPadding=0 width=206 border=0>
                                            <TBODY>
                                                <TR>
                                                    <TD width=70 background="<?= base_url() ?>images/coe/gxy_bg_21.gif" 
                                                        height=38></TD>
                                                    <TD 
                                                        style="FONT-WEIGHT: bold; FONT-SIZE: 14px; COLOR: #ffffff; PADDING-TOP: 4px; BACKGROUND-REPEAT: no-repeat" 
                                                        vAlign=top 
                                                        background="<?= base_url() ?>images/coe/gxy_bg_22.gif"><?= $title ?></TD></TR></TBODY></TABLE></TD></TR>
                                <TR>
                                    <TD 
                                        style="PADDING-RIGHT: 10px; PADDING-LEFT: 10px; PADDING-BOTTOM: 20px; PADDING-TOP: 20px" 
                                        bgColor=#fcfcfc>
                                        <TABLE style="MARGIN-BOTTOM: 8px; BACKGROUND-REPEAT: no-repeat" 
                                               height=32 cellSpacing=0 cellPadding=0 width=170 align=center 
                                               background="<?= base_url() ?>images/coe/gxycol_03.gif" border=0>
                                            <TBODY>
                                                <TR>
                                                    <TD align=middle width=55></TD>
                                                    <TD><A id=<?= $title ?> style="FONT-WEIGHT: bold" 
                                                           href="#"><?= $title ?></A></TD></TR></TBODY></TABLE>
                                    </TD></TR></TBODY></TABLE></TD>
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
                                                    <?php if (is_array($release)) foreach ($release as $r): ?>
                                                            <tr height="28" align="left" style="padding-left:4px;FONT-size:10.5pt;">
                                                                <td><a title="<?= $r->title ?>" href="<?= base_url() ?>index.php/index/releaseDetail/<?= $r->r_id ?>/<?= $r->type ?>" target="_blank">
                                                                        <font size="3px">
                                                                        <?php
                                                                        if (strLength($r->title, $charset = 'utf-8') > 80) {
                                                                            echo utf8Substr($r->title, $from = 0, 80);
                                                                            echo "...";
                                                                        } else {
                                                                            echo $r->title;
                                                                        }
                                                                        ?>
                                                                        </font>  

                                                                    </a></td>
                                                                <td align="right" width="80" style="FONT-size:9pt">  <?php
                                                                    if ($r->sendTime) {
                                                                        $t = strtotime($r->sendTime);
                                                                        $d = date('Y-m-d', $t);
                                                                    }
                                                                    echo "$d";
                                                                    ?></td>

                                                            </tr>
                                                            <tr>
                                                                <td height="1" colspan="2">
                                                                    <div style="border-top:1px dashed #cccccc;height: 1px;overflow:hidden;"></div>
                                                                </td> </tr>
                                                        <?php endforeach; ?>  





                                                    </tbody>
                                                </table>
                                                <div align="center"><?= $page ?> </div>

                                            </div>






                                    </TD></TR></TBODY></TABLE></TD>
                    <TD style="BACKGROUND-REPEAT: repeat-y" width=15 
                        background="<?= base_url() ?>images/coe/gxy_bg_12.gif"></TD></TR></TBODY></TABLE>
        <TABLE cellSpacing=0 cellPadding=0 width=962 align=center border=0>
            <TBODY>
                <TR>
                    <TD style="BACKGROUND-REPEAT: no-repeat" width=17 
                        background="<?= base_url() ?>images/coe/gxy_bg_03.gif" height=20></TD>
                    <TD style="BACKGROUND-REPEAT: repeat-x" width=207 
                        background="<?= base_url() ?>images/coe/gxy_bg_17.gif"></TD>
                    <TD width=4 background="<?= base_url() ?>images/coe/gxy_bg_18.gif"></TD>
                    <TD style="BACKGROUND-REPEAT: repeat-x" width=719 
                        background="<?= base_url() ?>images/coe/gxy_bg_19.gif"></TD>
                    <TD width=15 
                        background="<?= base_url() ?>images/coe/gxy_bg_20.gif"></TD></TR></TBODY></TABLE>
    </DIV><!-- visitcount Begin --><IFRAME id=vishidden 
                                           name=vishidden src="<?= base_url() ?>images/coe/visit.htm" width=0 height=0></IFRAME><!-- visitcount End --></BODY></HTML>
