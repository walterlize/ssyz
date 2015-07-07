<link href="<?= base_url(); ?>css/frame.css" rel="stylesheet" type="text/css" />
<div align="center">
        <!--<img src="<?= base_url() ?>images/admin.jpg" />-->

</div>

<div style="margin-left:20px; margin-right:20px">
    <br/>

    <div id="container">
        <div class="border">
            <div class="title_admin">
                <div class="title">
                    快捷办公
                </div>
                <br/>
            </div>
            <br/>
            <div class="text_admin_1">
                <span class="c_left"><a href="<?= base_url(); ?>index.php/manager/check/baoxiaoManage">普通报销审核 <?php if(isset($num1) and $num1 !==0)  echo "(".$num1.")";?></a></span>
                <span class="c_center"><a href="<?= base_url(); ?>index.php/manager/check/travelManage">差旅审核<?php if(isset($num2) and $num2 !==0)  echo "(".$num2.")";?></a></span>
                <span class="c_right"><a href="<?= base_url(); ?>index.php/manager/check/borrowManage">汇款审核<?php if(isset($num3) and $num3 !==0)  echo "(".$num3.")";?></a></span>
            </div>
            <div class="text_admin_2">
                <span class="c_left"><a href="<?= base_url(); ?>index.php/manager/check/laowuManage">劳务审核<?php if(isset($num4) and $num4 !==0) echo "(".$num4.")";?></a></span>
                <span class="c_center"><a href="<?= base_url(); ?>index.php/manager/money/expenseList">经费花费列表</a></span>
                <span class="c_right"><a href="<?= base_url() ?>index.php/manager/money/moneySum">子课题经费汇总</a></span>
            </div>

        </div></br></br></br>
        <!--<div align="center" >
            <img src="<?= base_url() ?>images/zhu.jpg" />
        </div>-->
    </div>
