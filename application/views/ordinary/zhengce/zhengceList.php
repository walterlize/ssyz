   <link href="<?=base_url();?>css/css.css" rel="stylesheet" type="text/css" />
   <br/>
<div id="container">
    <div class="border">
        <div class="title">
            <div class="span">
               政策文件列表
            </div>
           <!--<font size="4px" color="blue">  <?=$title1?></font>-->
        </div>
        <div class="content_all">

            <table cellspacing="0" border="0"    style="width:100%;border-collapse:collapse;">
                <tr>
                    <td>
                        <table border='0' width='950'  class="title_1" style="width:100%;border-collapse:collapse;">
                            <td width='700' align="left">&nbsp标题</td> 
                         
                            <td width='150'>发布时间</td>

                        </table>
                        <?php
                        if (is_array($zhengce))
                            foreach ($zhengce as $r):
                                ?>
                                <table border='0' width='1000' class="dash">
                                    <tr >
                                        <td width='700'><a id=""  href="<?= base_url() ?>index.php/ordinary/zhengce/detail/<?= $r['z_id'] ?>" target="_blank" >
                                             <b>.</b> <?= $r['title'] ?></a> </td>                              
                                    
                                        <td width='150'> [<?= $r['date'] ?>]</td>

                                </table>

                                <br />
                            <?php endforeach; ?>
                    </td>
                </tr>
                </tbody></table>
          <!--<p align="center"><font size="3px"></font></p>-->
        </div>

        <div class="span">
            <?= $page ?>
        </div>
     
    </div>

</div>

</div>



<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

