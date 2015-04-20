<div class="titleLink" align="center">
    <div class="main">
        <div class="main">
            <div class="right">
                <div class="up">
                    <div class="up-main">
                        <div class="yonghuup"></div>
                        <div class="yonghudown" style="<?= $form ?>">
                            <form name="form1" method="post" action="<?= base_url() ?>index.php/index/login" id="form1">
                                <div class="biaodan">
                                    <input name="userName" type="text"  size="8" />
                                </div>
                                <div class="biaodan2">
                                    <input type="password" name="password" size="8" />
                                </div>
                                <div class="up-main-wd1"><input type="submit" value="提交" class="input2"/></div>
                                <div class="up-main-kong"></div>
                                <div class="up-main-wd2"><input type="button" value="遗忘密码"  onclick="window.location.href = '<?=  base_url()?>index.php/password';" class="input2"/></div>
                            </form>
                        </div>
                        <div class="yonghudown2" style="<?= $welcome ?>">欢迎您，<?php
                            if (isset($userName))
                                echo $userName;
                            ?><br /><br/><br/><a class="titleLink"  href="<?= base_url() ?>index.php/index/getin/<?= $userId ?>">登陆</a>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<a class="titleLink" href="<?= base_url() ?>index.php/index/logOut">退出</a></div>

                    </div>
                </div>
                <div class="rt-dn">
                    <div class="ri-dn-word">
                        <li><a class="titleLink" target="_blank" href="http://www.cau.edu.cn">中国农业大学</a></li>
                        <li><a class="titleLink" target="_blank"href="http://beelab.cau.edu.cn/beelab/">农业部设施农业工程重点实验室</a></li>
                        <li><a class="titleLink" target="_blank"href="http://water.cau.edu.cn/">中国农业大学水利与土木工程学院</a></li>
                        <li><a class="titleLink" target="_blank"href="http://www.saas.ac.cn/saas/index.php">山东省农业科学院科技信息研究所</a></li>
                        <li><a class="titleLink" target="_blank"href="http://www.iascaas.net.cn/sites/IAS/">中国农业科学院北京畜牧兽医研究所</a></li>
                        <li><a class="titleLink" target="_blank"href="http://www.nercita.org.cn/">北京农业信息技术研究中心</a></li>
                        <li><a class="titleLink" target="_blank"href="http://www.imau.edu.cn/">内蒙古农业大学</a></li>
                        <li><a class="titleLink" target="_blank"href="http://www.dqy.com.cn/">北京德青源农业科技股份有限公司</a></li>
                    </div>
                </div>
            </div>

            <div class="middle">
                <div class="mi-up">
                    <div class="allword">
                        <div id="demo" style="OVERFLOW: hidden; WIDTH: 280px; HEIGHT: 220px; ">
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td id="demo1"><table width="100%" height="99" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td><b>主持单位：</b> 中国农业大学</td>
                                            </tr>
                                            <tr>
                                                <td><b>负责人：</b> 滕光辉教授</td>
                                            </tr>
                                            <tr>
                                                <td><b>课题目的和意义简述</b>
                                                    ：动物福利已成为一个不容回避的国际趋势。世界贸易组织的规则中已有专门针对动物福利的相关规定，许多发达国家也将动物福利的相关措施写入政府法律条令条例，为本国动物福利提供保证的同时也成为发达国家制约我国畜禽产品的对外贸易壁垒。因此，福利养殖模式已成为现代畜牧业生产的发展趋势。<br/>
                                                    <br/></td>
                                            </tr>
                                        </table></td>
                                </tr>
                                <tr>
                                    <td id="demo2"></td>
                                </tr>
                            </table>
                        </div></div>
                </div>

                <div class="mi-up3" id="mi-up3">

                    <div class="allword">
                        <?php
                        if (is_array($bullentins))
                            foreach ($bullentins as $r):
                                ?>
                                <li><a class="titleLink" href="<?= base_url() ?>index.php/head/trend/detail/<?= $r->trendId ?>" target="_blank" title="<?= $r->trendName ?>">
                                        &middot;<?php
                                        if (strLength($r->trendName, $charset = 'utf-8') > 18) {
                                            echo utf8Substr($r->trendName, $from = 0, 18);
                                            echo "...";
                                        } else {
                                            echo $r->trendName;
                                        }
                                        ?></a>
                                </li>
                            <?php endforeach; ?>	
                    </div>
                    <div class="more"><a  href="<?= base_url() ?>index.php/head/trend/index/1">&gt;&gt;... </a>&nbsp; &nbsp; &nbsp; </div>
                </div>
            </div>


            <div class="flash">


                <div class="fl">
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="330" height="220">
                        <param name="movie" value="flash/sheshi.swf">
                        <param name="quality" value="high">
                        <embed src="flash/sheshi.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="330" height="220"></embed>
                    </object>
                </div>

                <div class="guanli1">
                    <div class="allword">
                        <?php
                        if (is_array($instruments))
                            foreach ($instruments as $r):
                                ?>
                                <li><a class="titleLink" href="<?= base_url() ?>index.php/head/trend/detail/<?= $r->trendId ?>" target="_blank" title="<?= $r->trendName ?>">
                                        &middot;<?php
                                        if (strLength($r->trendName, $charset = 'utf-8') > 18) {
                                            echo utf8Substr($r->trendName, $from = 0, 18);
                                            echo "...";
                                        } else {
                                            echo $r->trendName;
                                        }
                                        ?></a>
                                </li>
                            <?php endforeach; ?>
                    </div>
                    <div class="more"><a c href="<?= base_url() ?>index.php/head/trend/index/2">&gt;&gt;... </a>&nbsp; &nbsp; &nbsp; </div>
                </div>

                <div class="guanli">
                    <div class="allword">
                        <?php
                        if (is_array($trends))
                            foreach ($trends as $r):
                                ?>
                                <li><a  href="<?= base_url() ?>index.php/head/trend/detail/<?= $r->trendId ?>" target="_blank" title="<?= $r->trendName ?>">
                                        &middot;<?php
                                        if (strLength($r->trendName, $charset = 'utf-8') > 18) {
                                            echo utf8Substr($r->trendName, $from = 0, 18);
                                            echo "...";
                                        } else {
                                            echo $r->trendName;
                                        }
                                        ?></a>
                                </li>
                            <?php endforeach; ?>
                    </div>
                    <div class="more"><a  href="<?= base_url() ?>index.php/head/trend/index/3">&gt;&gt;...</a> &nbsp; &nbsp; &nbsp; &nbsp; </div>
                </div>
            </div>
        </div>
    </div>
</div>
<SCRIPT>
    var speed = 30
    var MyMarh = setInterval(Marqueeh, speed)
    demo2.innerHTML = demo1.innerHTML
    demo.onmouseover = function () {
        clearInterval(MyMarh)
    }
    demo.onmouseout = function () {
        MyMarh = setInterval(Marqueeh, speed)
    }
    function Marqueeh() {
        if (demo2.offsetHeight - demo.scrollTop <= 0)
            demo.scrollTop -= demo1.offsetHeight
        else {
            demo.scrollTop++
        }
    }
</SCRIPT>
<?php
/* * *********************************************
 *
 * 截取一定长度的字符串，确保截取后字符串不出乱码
 *
 * ********************************************* */

function utf8Substr($str, $from, $len) {
    return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $from . '}' .
            '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $len . '}).*#s', '$1', $str);
}

//获取字符串的长度
function strLength($str, $charset = 'utf-8') {
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