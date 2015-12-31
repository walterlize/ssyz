<?php
/**
 * Created by PhpStorm.
 * User: walter
 * Date: 15/10/4
 * Time: 16:05
 */
?>
<!--Left的css-->
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
    //The link color for paper page author:walter
    a:link { text-decoration:none;color: #000000; font-size:13px;}
    a:visited {text-decoration:none; color: #000000; font-size:13px;}
    a:active { text-decoration:none; color:#0000ff; font-size:13px;}
    a:hover { text-decoration: none; color:#33CC99; font-size:13px; }
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
                        <TD width=206 height=40>
                            <TABLE cellSpacing=0 cellPadding=0 width=206 border=0>
                                <TBODY>
                                <TR>
                                    <TD width=70 background="<?= base_url() ?>images/coe/gxy_bg_21.gif"
                                        height=38></TD>
                                    <TD
                                        style="FONT-WEIGHT: bold; FONT-SIZE: 14px; COLOR: #ffffff; PADDING-TOP: 10px; BACKGROUND-REPEAT: no-repeat"
                                        vAlign=top
                                        background="<?= base_url() ?>images/coe/gxy_bg_22.gif">研究成果</TD></TR></TBODY></TABLE></TD></TR>
                    <TR>
                        <TD
                            style="PADDING-RIGHT: 10px; PADDING-LEFT: 10px; PADDING-BOTTOM: 5px; PADDING-TOP: 10px"
                            bgColor=#fcfcfc>
                            <TABLE style="MARGIN-BOTTOM: 8px; BACKGROUND-REPEAT: no-repeat"
                                   height=20 cellSpacing=0 cellPadding=0 width=170 align=center
                                   background="<?= base_url() ?>images/coe/gxycol_03.gif" border=0>
                                <TBODY>
                                <TR>
                                    <TD align=middle width=55></TD>
                                    <TD><A id=<?= $title ?> style="FONT-WEIGHT: bold"
                                        href="<?= base_url() ?>index.php/head/paper/paperList">-&nbsp论文</A></TD></TR></TBODY></TABLE>
                        </TD>
                    </TR>
                    <TR>
                        <TD
                            style="PADDING-RIGHT: 10px; PADDING-LEFT: 10px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px"
                            bgColor=#fcfcfc>
                            <TABLE style="MARGIN-BOTTOM: 8px; BACKGROUND-REPEAT: no-repeat"
                                   height=20 cellSpacing=0 cellPadding=0 width=170 align=center
                                   background="<?= base_url() ?>images/coe/gxycol_03.gif" border=0>
                                <TBODY>
                                <TR>
                                    <TD align=middle width=55></TD>
                                    <TD><A id=<?= $title ?> style="FONT-WEIGHT: bold"
                                        href="<?= base_url() ?>index.php/head/book/bookList">-&nbsp论著</A></TD></TR></TBODY></TABLE>
                        </TD>
                    </TR>
                    <TR>
                        <TD
                            style="PADDING-RIGHT: 10px; PADDING-LEFT: 10px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px"
                            bgColor=#fcfcfc>
                            <TABLE style="MARGIN-BOTTOM: 8px; BACKGROUND-REPEAT: no-repeat"
                                   height=20 cellSpacing=0 cellPadding=0 width=170 align=center
                                   background="<?= base_url() ?>images/coe/gxycol_03.gif" border=0>
                                <TBODY>
                                <TR>
                                    <TD align=middle width=55></TD>
                                    <TD><A id=<?= $title ?> style="FONT-WEIGHT: bold"
                                        href="<?= base_url() ?>index.php/head/patent/patentList">-&nbsp专利</A></TD></TR></TBODY></TABLE>
                        </TD>
                    </TR>
                    <TR>
                        <TD
                            style="PADDING-RIGHT: 10px; PADDING-LEFT: 10px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px"
                            bgColor=#fcfcfc>
                            <TABLE style="MARGIN-BOTTOM: 8px; BACKGROUND-REPEAT: no-repeat"
                                   height=20 cellSpacing=0 cellPadding=0 width=170 align=center
                                   background="<?= base_url() ?>images/coe/gxycol_03.gif" border=0>
                                <TBODY>
                                <TR>
                                    <TD align=middle width=55></TD>
                                    <TD><A id=<?= $title ?> style="FONT-WEIGHT: bold"
                                        href="<?= base_url() ?>index.php/head/software/softwareList">-&nbsp软件著作权</A></TD></TR></TBODY></TABLE>
                        </TD>
                    </TR>
                    <TR>
                        <TD
                            style="PADDING-RIGHT: 10px; PADDING-LEFT: 10px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px"
                            bgColor=#fcfcfc>
                            <TABLE style="MARGIN-BOTTOM: 8px; BACKGROUND-REPEAT: no-repeat"
                                   height=20 cellSpacing=0 cellPadding=0 width=170 align=center
                                   background="<?= base_url() ?>images/coe/gxycol_03.gif" border=0>
                                <TBODY>
                                <TR>
                                    <TD align=middle width=55></TD>
                                    <TD><A id=<?= $title ?> style="FONT-WEIGHT: bold"
                                        href="<?= base_url() ?>index.php/head/result/resultList">-&nbsp鉴定成果</A></TD></TR></TBODY></TABLE>
                        </TD>
                    </TR>
                    <TR>
                        <TD
                            style="PADDING-RIGHT: 10px; PADDING-LEFT: 10px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px"
                            bgColor=#fcfcfc>
                            <TABLE style="MARGIN-BOTTOM: 8px; BACKGROUND-REPEAT: no-repeat"
                                   height=20 cellSpacing=0 cellPadding=0 width=170 align=center
                                   background="<?= base_url() ?>images/coe/gxycol_03.gif" border=0>
                                <TBODY>
                                <TR>
                                    <TD align=middle width=55></TD>
                                    <TD><A id=<?= $title ?> style="FONT-WEIGHT: bold"
                                        href="<?= base_url() ?>index.php/head/standard/standardList">-&nbsp标准</A></TD></TR></TBODY></TABLE>
                        </TD>
                    </TR>
                    <TR>
                        <TD
                            style="PADDING-RIGHT: 10px; PADDING-LEFT: 10px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px"
                            bgColor=#fcfcfc>
                            <TABLE style="MARGIN-BOTTOM: 8px; BACKGROUND-REPEAT: no-repeat"
                                   height=20 cellSpacing=0 cellPadding=0 width=170 align=center
                                   background="<?= base_url() ?>images/coe/gxycol_03.gif" border=0>
                                <TBODY>
                                <TR>
                                    <TD align=middle width=55></TD>
                                    <TD><A id=<?= $title ?> style="FONT-WEIGHT: bold"
                                        href="<?= base_url() ?>index.php/head/report/reportList">-&nbsp报告</A></TD></TR></TBODY></TABLE>
                        </TD>
                    </TR>
                    <TR>
                        <TD
                            style="PADDING-RIGHT: 10px; PADDING-LEFT: 10px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px"
                            bgColor=#fcfcfc>
                            <TABLE style="MARGIN-BOTTOM: 8px; BACKGROUND-REPEAT: no-repeat"
                                   height=20 cellSpacing=0 cellPadding=0 width=170 align=center
                                   background="<?= base_url() ?>images/coe/gxycol_03.gif" border=0>
                                <TBODY>
                                <TR>
                                    <TD align=middle width=55></TD>
                                    <TD><A id=<?= $title ?> style="FONT-WEIGHT: bold"
                                        href="<?= base_url() ?>index.php/head/award/awardList">-&nbsp报奖材料</A></TD></TR></TBODY></TABLE>
                        </TD>
                    </TR>
                    <TR>
                        <TD
                            style="PADDING-RIGHT: 10px; PADDING-LEFT: 10px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px"
                            bgColor=#fcfcfc>
                            <TABLE style="MARGIN-BOTTOM: 8px; BACKGROUND-REPEAT: no-repeat"
                                   height=20 cellSpacing=0 cellPadding=0 width=170 align=center
                                   background="<?= base_url() ?>images/coe/gxycol_03.gif" border=0>
                                <TBODY>
                                <TR>
                                    <TD align=middle width=55></TD>
                                    <TD><A id=<?= $title ?> style="FONT-WEIGHT: bold"
                                        href="<?= base_url() ?>index.php/head/demonstration/demonstrationList">-&nbsp应用示范</A></TD></TR></TBODY></TABLE>
                        </TD>
                    </TR>
                    <TR>
                        <TD
                            style="PADDING-RIGHT: 10px; PADDING-LEFT: 10px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px"
                            bgColor=#fcfcfc>
                            <TABLE style="MARGIN-BOTTOM: 8px; BACKGROUND-REPEAT: no-repeat"
                                   height=20 cellSpacing=0 cellPadding=0 width=170 align=center
                                   background="<?= base_url() ?>images/coe/gxycol_03.gif" border=0>
                                <TBODY>
                                <TR>
                                    <TD align=middle width=55></TD>
                                    <TD><A id=<?= $title ?> style="FONT-WEIGHT: bold"
                                        href="<?= base_url() ?>index.php/head/other/otherList">-&nbsp其他</A></TD></TR></TBODY></TABLE>
                        </TD>
                    </TR>
                    </TBODY></TABLE></TD>
