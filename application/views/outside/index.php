<div class="c">
    <div class="conent"></div>
    <div class="conent_02">
        <div class="left">
            <div class="c_text1">
                <div class="img"><img  src="<?= base_url() ?>images/index_03.png" width="19" height="18"/></div>
                <div class="text">系统登录</div>
                <div class="clear"></div>
                <div style="<?= $form ?>">
                    <form name="form1" method="post" action="<?= base_url() ?>index.php/index/login" id="form1">
                        <div class="lable1"><label>用户名：</label><input name="userName" type="text"  size="16" /></div><br />
                        <div class="lable2"><label>密 &nbsp;码：</label><input type="password" name="password" size="16" /></div>
                        <input type="submit"  alt="提交" class="sub" width="61" height="34" value=" ">
                        <input  type="button"  align="找回密码" value=" " class="sub2" />
                    </form>
                </div>
                <div class="yonghudown2" style="<?= $welcome ?>">欢迎你，<?php if (isset($username))
    echo $username; ?><br /><br /><br /><a class="titleLink" href="<?= base_url() ?>index.php/index/getin/<?= $userId ?>">登陆</a>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<a class="titleLink" href="<?= base_url() ?>index.php/index/logOut">退出</a></div>
            </div>
            <div class="c_text2">
                <div class="img"><img  src="<?= base_url() ?>images/index_19.png" height="17" width="18"/></div>
                <div class="text">项目概况</div>
                <div class="clear"></div>
                <ul>
                    <li><b>项目承担单位：中国农业大学</b></li>
                    <li><b>项目首席：吴文良</b></li>
                    <li>发展品质优良、特色明显、附加值高的优势农产品，扩大劳动密集型产品如绿色、有机食品生产，包括优质富硒农产品等的研究和开发，是农业产业提升和农村经济发展的重要内容，对于发挥地方资源优势、提升农民收入、生产优质特色农产品具有重要意义。</li>
                </ul>
            </div>
            <div class="c_text3">
                <div class="img"><img  src="<?= base_url() ?>images/index_23.png" width="16" height="16"/></div>
                <div class="text">友情链接</div>
                <div class="clear"></div>
                <ul>
                    <li><a class="titleLink" href="http://www.moa.gov.cn/sjzz/kjs">农业部科教司</a></li>
                    <li><a class="titleLink" href="http://www.cau.edu.cn">中国农业大学</a></li>
                    <li><a class="titleLink" href="http://www.caae.com.cn">农业部规划设计研究院</a></li>
                    <li><a class="titleLink" href="http://www.hzau.edu.cn">华中农业大学</a></li>
                    <li><a class="titleLink" href="http://www.scau.edu.cn">华南农业大学</a></li>
                    <li><a class="titleLink" href="http://www.nwsuaf.edu.cn">西北农林科技大学</a></li>
                </ul>
            </div>

        </div>

        <div class="right">
            <div class="por">
                <div class="p_tex">项目动态</div>
                <a href="<?=base_url() ?>index.php/outside/trend/index/2">more</a>
            </div>
            <div class="cone">
                <ul>
                    <?php if (is_array($instruments))
                        foreach ($instruments as $r): ?>
                            <li><a class="titleLink" href="<?= base_url() ?>index.php/outside/trend/detail/<?= $r->trendId ?>" target="_blank" title="<?= $r->trendName ?>">
                                    &middot;<?
                            if (strLength($r->trendName, $charset = 'utf-8') > 34) {
                                echo utf8Substr($r->trendName, $from = 0, 34);
                                echo "...";
                            } else {
                                echo $r->trendName;
                            }
                    ?></a><font><?= $r->time ?></font>
                    </li>
                    <?php endforeach; ?>
                    </ul>
            </div>
            <div class="gg">
                <div class="g_tex">重要公告</div>
                <a href="<?=base_url() ?>index.php/outside/trend/index/1">more</a>
            </div>
            <div class="cone">
                <ul>
                    <?php if (is_array($bullentins))
                        foreach ($bullentins as $r): ?>
                            <li><a class="titleLink" href="<?= base_url() ?>index.php/outside/trend/detail/<?= $r->trendId ?>" target="_blank" title="<?= $r->trendName ?>">
                                    &middot;<?
                            if (strLength($r->trendName, $charset = 'utf-8') > 34) {
                                echo utf8Substr($r->trendName, $from = 0, 34);
                                echo "...";
                            } else {
                                echo $r->trendName;
                            }
                    ?></a><font><?= $r->time ?></font>
                    </li>
                    <?php endforeach; ?>
                    </ul>
            </div>
            <div class="zy">
                <div class="zy_tex">管理办法</div>
                <a href="<?=base_url() ?>index.php/outside/trend/index/3">more</a>
            </div>
            <div class="cone">
                <ul>
                    <?php if (is_array($trends))
                        foreach ($trends as $r): ?>
                            <li><a class="titleLink" href="<?= base_url() ?>index.php/outside/trend/detail/<?= $r->trendId ?>" target="_blank" title="<?= $r->trendName ?>">
                                    &middot;<?
                            if (strLength($r->trendName, $charset = 'utf-8') > 34) {
                                echo utf8Substr($r->trendName, $from = 0, 34);
                                echo "...";
                            } else {
                                echo $r->trendName;
                            }
                    ?></a><font><?= $r->time ?></font>
                    </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
<?php
                        /*                         * *********************************************
                         *
                         * 截取一定长度的字符串，确保截取后字符串不出乱码
                         *
                         * ********************************************* */

                        function utf8Substr($str, $from, $len) {
                            return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $from . '}' .
                                    '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $len . '}).*#s',
                                    '$1', $str);
                        }

//获取字符串的长度
                        function strLength($str, $charset='utf-8') {
                            if ($charset == 'utf-8')
                                $str = iconv('utf-8', 'gb2312', $str);
                            $num = strlen($str);
                            $cnNum = 0;
                            for ($i = 0; $i < $num; $i++) {
                                if (ord(substr($str, $i + 1, 1)) > 127) {
                                    $cnNum++;
                                    $i++;
                                }
                            }
                            $enNum = $num - ($cnNum * 2);
                            $number = ($enNum / 2) + $cnNum;
                            return ceil($number);
                        }
?>