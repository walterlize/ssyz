<body class="left">
    <div id="left_wrap">
        <div class="left_top">
            <span class="">子课题组</span>
        </div>
        <div class="menu_wrap">
            <div class="menu">
                <ul id="nav">
                    <li><a href="#"><span>课题情况</span></a>
                        <ul>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/subject/subjectDetail" target="mainFrame"><span>课题情况简介</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/workReport/reportList/WorkReport/2" target="mainFrame"><span>课题经费情况</span></a></li>
                        </ul></li>
                    <li><a href="#"><span>汇款与报销</span></a>
                        <ul>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/borrow/borrowList" target="mainFrame"><span>汇款管理</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/baoxiao/baoxiaoList" target="mainFrame"><span>报销管理</span></a></li>
                        </ul></li>

                    <li><a href="#"><span>工作进度</span></a>
                        <ul>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/workReport/reportList/WeekReport/2" target="mainFrame"><span>工作月报</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/workReport/reportList/WorkReport/2" target="mainFrame"><span>工作简报</span></a></li>
                        </ul></li>
                    <li><a href="#"><span>经费管理</span></a>
                        <ul>
                           <!-- <li><a href="<?= base_url(); ?>index.php/ordinary/money/projectBudget" target="mainFrame"><span>课题经费执行统计</span></a></li>-->
                            <li><a href="<?= base_url(); ?>index.php/ordinary/money/yearBudget" target="mainFrame"><span>年度经费预算执行</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/money/monthList/2" target="mainFrame"><span>月度经费执行填报</span></a></li>

                        </ul></li>
                   <!-- <li><a href="#"><span>研究成果管理</span></a>
                        <ul>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/paper/paperList" target="mainFrame"><span>论文</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/book/bookList" target="mainFrame"><span>论著</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/patent/patentList" target="mainFrame"><span>专利</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/software/softwareList" target="mainFrame"><span>软件著作权</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/result/resultList" target="mainFrame"><span>鉴定成果</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/standard/standardList" target="mainFrame"><span>标准</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/report/reportList" target="mainFrame"><span>报告</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/award/awardList" target="mainFrame"><span>报奖材料</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/demonstration/demonstrationList" target="mainFrame"><span>应用示范</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/other/otherList" target="mainFrame"><span>其他</span></a></li>
                        </ul></li>-->
                   <!--<li><a href="mainC/rzgl.html" target="mainFrame" ><span>日志管理</span></a>-->
                    <li><a href="<?= base_url() ?>index.php/user/password" target="mainFrame"><span>修改密码</span></a>
                </ul>
            </div>
        </div>
    </div>
    <div id="sidebar">
        <a onclick="changeFrame()" href="#">
            <img src="<?= base_url(); ?>images/admin/menu_hide.gif" />
        </a>
    </div>
</body>