<body class="left">
    <div id="left_wrap">
        <div class="left_top">

            <span class="">超级管理员</span>
        </div>
        <div class="menu_wrap">
            <div class="menu">
                <ul id="nav">

                    <li><a href="#" ><span>工作管理</span></a>
                        <ul>
                            <li><a href="<?= base_url(); ?>index.php/admin/workReport/reportList/WeekReport/1/all" target="mainFrame"><span>工作月报管理</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/admin/workReport/reportList/WorkReport/1/all" target="mainFrame"><span>工作简报管理</span></a></li>
                        </ul></li>
                    <li><a href="#" ><span>经费管理</span></a>
                        <ul>

                            <li><a href="<?= base_url(); ?>index.php/admin/money/totalList" target="mainFrame"><span>课题总经费填写</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/admin/money/yearList/1" target="mainFrame"><span>年度经费填写</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/admin/money/yearExecutionList/1" target="mainFrame"><span>年度经费执行</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/admin/money/moneySum/all" target="mainFrame"><span>课题经费汇总</span></a></li>

                            <li><a href="<?= base_url(); ?>index.php/admin/money/monthList/1" target="mainFrame"><span>课题月度经费审核</span></a></li>
                        </ul></li>

                    <li><a href="#"><span>公告动态管理</span></a>
                        <ul>
                            <li><a href="<?= base_url(); ?>index.php/admin/trend/trendList/1" target="mainFrame"><span>重要公告</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/admin/trend/trendList/2" target="mainFrame"><span>项目动态</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/admin/trend/trendList/3" target="mainFrame"><span>管理办法</span></a></li>
                        </ul></li>
                    <li><a href="#"><span>课题信息管理</span></a>
                        <ul>
                            <li><a href="<?= base_url(); ?>index.php/admin/project/projectDetail/1" target="mainFrame"><span>课题简介</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/admin/project/projectDetail/2" target="mainFrame"><span>课题管理规范</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/admin/subject/subjectManage" target="mainFrame"><span>课题管理</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/admin/database/databaseDetail" target="mainFrame"><span>数据库平台介绍</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/admin/expert/expertList" target="mainFrame"><span>课题执行专家组</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/admin/manage/manageList" target="mainFrame"><span>课题管理组</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/admin/contact/contactList" target="mainFrame"><span>联系我们</span></a></li>
                        </ul></li>
                    <li><a href="#"><span>研究成果管理</span></a>
                        <ul>
                            <li><a href="<?= base_url(); ?>index.php/admin/paper/paperList" target="mainFrame"><span>论文</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/admin/book/bookList" target="mainFrame"><span>论著</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/admin/patent/patentList" target="mainFrame"><span>专利</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/admin/software/softwareList" target="mainFrame"><span>软件著作权</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/admin/result/resultList" target="mainFrame"><span>鉴定成果</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/admin/standard/standardList" target="mainFrame"><span>标准</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/admin/report/reportList" target="mainFrame"><span>报告</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/admin/award/awardList" target="mainFrame"><span>报奖材料</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/admin/demonstration/demonstrationList" target="mainFrame"><span>应用示范</span></a></li>
                            <li><a href="<?= base_url(); ?>index.php/admin/other/otherList" target="mainFrame"><span>其他</span></a></li>
                        </ul></li>
                    <li><a href="#"><span>政策规定管理</span></a>
                        <ul>
                            <li><a href="<?= base_url(); ?>index.php/admin/zhengce/zhengceList" target="mainFrame"><span>政策规定管理</span></a></li>

                        </ul></li>
                    <li><a href="#"><span>用户管理</span></a>
                        <ul>
                            <li><a href="<?= base_url(); ?>index.php/admin/user/userList" target="mainFrame"><span>用户信息</span></a></li>
                        </ul></li>

                    <li><a href="#"><span>个人信息</span></a>
                        <ul>
                            <li><a href="<?= base_url() ?>index.php/user/password" target="mainFrame"><span>修改密码</span></a></li>
                        </ul></li>
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