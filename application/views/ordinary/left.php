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
                        <li><a href="<?= base_url(); ?>index.php/ordinary/money/totalList" target="mainFrame"><span>课题总经费</span></a></li>
                        <li><a href="<?= base_url(); ?>index.php/ordinary/money/yearList" target="mainFrame"><span>课题年度经费</span></a></li>
                    </ul>
                </li>
                <li><a href="#"><span>工作进度汇报</span></a>
                    <ul>
                        <li><a href="<?= base_url(); ?>index.php/ordinary/workReport/reportList/WeekReport/2" target="mainFrame"><span>工作月报</span></a></li>
                        <li><a href="<?= base_url(); ?>index.php/ordinary/workReport/reportList/WorkReport/2" target="mainFrame"><span>工作简报</span></a></li>
                    </ul>
                </li>
                <li><a href="#"><span>报销管理</span></a>
                    <ul>
                        <li><a href="<?= base_url(); ?>index.php/ordinary/baoxiao/baoxiaoList" target="mainFrame"><span>票据报销</span></a></li>
                        <li><a href="<?= base_url(); ?>index.php/ordinary/travel/travelList" target="mainFrame"><span>差旅报销</span></a></li>
                    </ul>
                </li>
                <li><a href="#"><span>汇款与支票</span></a>
                    <ul>
                        <li><a href="<?= base_url(); ?>index.php/ordinary/borrow/borrowList" target="mainFrame"><span>借款管理</span></a></li>
                        <li><a href="<?= base_url(); ?>index.php/ordinary/borrow/baoxiaoList" target="mainFrame"><span>借款报销管理</span></a></li>
                    </ul>
                </li>
                <li><a href="#"><span>劳务费与专家咨询费</span></a>
                    <ul>
                        <li><a href="<?= base_url(); ?>index.php/ordinary/laowu/laowuList" target="mainFrame"><span>申报管理</span></a></li>

                    </ul>
                </li>
                <li><a href="#"><span>研究成果汇总</span></a>
                    <ul>
                        <li><a href="<?= base_url(); ?>index.php/manager/paper/paperList" target="mainFrame"><span>论文</span></a></li>
                        <li><a href="<?= base_url(); ?>index.php/manager/book/bookList" target="mainFrame"><span>论著</span></a></li>
                        <li><a href="<?= base_url(); ?>index.php/manager/patent/patentList" target="mainFrame"><span>专利</span></a></li>
                        <li><a href="<?= base_url(); ?>index.php/manager/software/softwareList" target="mainFrame"><span>软件著作权</span></a></li>
                        <li><a href="<?= base_url(); ?>index.php/manager/result/resultList" target="mainFrame"><span>鉴定成果</span></a></li>
                        <li><a href="<?= base_url(); ?>index.php/manager/standard/standardList" target="mainFrame"><span>标准</span></a></li>
                        <li><a href="<?= base_url(); ?>index.php/manager/report/reportList" target="mainFrame"><span>报告</span></a></li>
                        <li><a href="<?= base_url(); ?>index.php/manager/award/awardList" target="mainFrame"><span>报奖材料</span></a></li>
                        <li><a href="<?= base_url(); ?>index.php/manager/demonstration/demonstrationList" target="mainFrame"><span>应用示范</span></a></li>
                        <li><a href="<?= base_url(); ?>index.php/manager/other/otherList" target="mainFrame"><span>其他</span></a></li>
                    </ul>
                </li>

                <li><a href="#"><span>经费执行汇总</span></a>
                    <ul>
                        <li><a href="<?= base_url(); ?>index.php/ordinary/money/expenseList" target="mainFrame"><span>课题经费花费详情</span></a></li>
                        <li><a href="<?= base_url(); ?>index.php/ordinary/money/projectBudget" target="mainFrame"><span>经费执行汇总</span></a></li>
                        <!--
                            <li><a href="<?= base_url(); ?>index.php/ordinary/money/monthList/2" target="mainFrame"><span>月度经费执行填报</span></a></li>
                             -->
                    </ul></li>
                <li><a href="#"><span>政策文件下载</span></a>
                    <ul>
                        <li><a href="<?= base_url(); ?>index.php/ordinary/zhengce/zhengceList" target="mainFrame"><span>政策文件下载</span></a></li>
                    </ul>
                </li>
                </li>

                <!--
                <li><a href="#"><span>文件共享</span></a>
                    <ul>
                        <li><a href="#"><span>文件共享</span></a></li>

                    </ul>
                </li>
                -->
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