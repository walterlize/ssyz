<html xmlns="http://www.w3.org/1999/xhtml">
    <head id="Head1">
            <script src="images/resource/WebResource.axd" type="text/javascript"></script>
            <script type="text/javascript">
                /**
                 * 关闭窗口的方法
                 */
                function closeie6() {
                    window.opener = null;
                    window.close();
                }
            </script>
            <div class="page"><TABLE width="90%" border="0"align="center">
                    <TBODY>
                        <TR >
                            <TD align="center"  style="font-family:宋体;font-size:14pt;line-height:40pt;color:#000"><B><?= $title ?></B></TD>
                        </TR>
                        <TR>
                            <TD align="right"><HR size="2" color="#3A6EA5"><FONT color="black" style="font-size:10pt">时间:<?= $date ?> </FONT></TD>
                        </TR>
                        <TR>
                            <TD align="left"><?= $content ?></TD>
                        </TR>
                    </TBODY>
                </TABLE>
                </br></br></br></br></div>
            <p align="center"><input type="button" value="关闭窗口" id="close" class="input" onclick="window.close()"></p>

