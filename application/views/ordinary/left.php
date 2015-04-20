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
                        </ul></li>
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

                    <li><a href="#"><span>工作进度</span></a>
                        <ul>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/workReport/reportList/WeekReport/2" target="mainFrame"><span>工作月报</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/workReport/reportList/WorkReport/2" target="mainFrame"><span>工作简报</span></a></li>
                        </ul>
                    </li>
                    <li><a href="#"><span>经费管理</span></a>
                        <ul>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/money/expenseList" target="mainFrame"><span>课题经费花费详情</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/money/yearBudget" target="mainFrame"><span>年度经费预算执行</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/money/monthList/2" target="mainFrame"><span>月度经费执行填报</span></a></li>

                        </ul></li>
                    <li><a href="#"><span>政策文件下载</span></a>
                        <ul>
                            <li><a href="<?= base_url(); ?>index.php/ordinary/zhengce/zhengceList" target="mainFrame"><span>政策文件下载</span></a></li>
                        </ul>
                    </li>
                    </li>
                    <li><a href="#"><span>文件共享</span></a>
                        <ul>
                            <li><a href="#"><span>文件共享</span></a></li>

                        </ul>
                    </li>
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