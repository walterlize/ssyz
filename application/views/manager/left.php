<body class="left">
    <div id="left_wrap">
        <div class="left_top">

            <span class="">课题组</span>
        </div>
        <div class="menu_wrap">
            <div class="menu">
                <ul id="nav">
                    <li><a href="#"><span>课题组管理</span></a>
                        <ul>
                            <li><a href="<?= base_url(); ?>index.php/manager/subject/subjectDetail" target="mainFrame"><span>课题管理</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/manager/subject/subjectManage" target="mainFrame"><span>子课题管理</span></a></li>
                        </ul></li>

                    <li><a href="#"><span>工作进度</span></a>
                        <ul>
                            <li><a href="<?= base_url(); ?>index.php/manager/workReport/reportList/WeekReport/1" target="mainFrame"><span>工作月报</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/manager/workReport/reportList/WorkReport/1" target="mainFrame"><span>工作简报</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/manager/workReport/reportListCheck/WeekReport/2" target="mainFrame"><span>子课题工作月报审核</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/manager/workReport/reportListCheck/WorkReport/2" target="mainFrame"><span>子课题工作简报审核</span></a></li>
                        </ul></li>
                    <li><a href="#"><span>经费审核</span></a>
                        <ul>
                            <li><a href="<?= base_url(); ?>index.php/manager/check/baoxiaoManage" target="mainFrame"><span>普通报销审核</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/manager/check/travelManage" target="mainFrame"><span>差旅报销审核</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/manager/check/borrowManage" target="mainFrame"><span>汇款/支票审核管理</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/manager/check/borrowBaoxiao" target="mainFrame"><span>借款报销管理</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/manager/check/laowuManage" target="mainFrame"><span>劳务费审核管理</span></a></li>

                        </ul></li>
                    <li><a href="#"><span>课题经费管理</span></a>
                        <ul>
                            <li><a href="<?= base_url(); ?>index.php/manager/money/projectBudget" target="mainFrame"><span>课题总经费执行统计</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/manager/money/yearBudget" target="mainFrame"><span>年度经费预算执行</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/manager/money/monthList/1" target="mainFrame"><span>月度经费执行填报</span></a></li>
                           <!-- <li><a href="<?= base_url(); ?>index.php/manager/money/monthReportList" target="mainFrame"><span>经费执行情况简报</span></a></li>
                            -->
                        </ul></li>
                    <li><a href="#"><span>子课题经费管理</span></a>
                        <ul>
                            <li><a href="<?= base_url(); ?>index.php/manager/money/totalList" target="mainFrame"><span>子课题总经费填写</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/manager/money/yearList" target="mainFrame"><span>子课题年度经费填写</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/manager/money/monthCheck/2" target="mainFrame"><span>子课题月度经费审核</span></a></li>


                        </ul></li>
                    <li><a href="#"><span>研究成果管理</span></a>
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
                        </ul></li>
                    <li><a href="#"><span>项目动态</span></a>
                        <ul>
                            <li><a href="<?= base_url(); ?>index.php/manager/trend/trendList" target="mainFrame"><span>项目动态</span></a></li>
                        </ul>
                    </li>
                    <li><a href="<?= base_url() ?>index.php/user/password" target="mainFrame"><span>修改密码</span></a>
                    <li><a href="<?= base_url(); ?>index.php/manager/user/userList" target="mainFrame"><span>子课题用户管理</span></a>
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