<div class="titleLink" align="center">
    <div class="main">
        <div class="main">

            <div class="right">
                <div class="up">
                    <div class="up-main">
                        <div class="yonghuup"></div>
                        <div class="yonghudown" style="<?=$form?>">
                            <form name="form1" method="post" action="<?=base_url()?>index.php/index/login" id="form1">
                                <div class="biaodan">
                                    <input name="userName" type="text"  size="16" />
                                </div>
                                <div class="biaodan2">
                                    <input type="password" name="password" size="16" />
                                </div>
                                <div class="up-main-wd1"><input type="submit" value="提交" class="input2"/></div>
                                <div class="up-main-kong"></div>
                                <div class="up-main-wd2"><input type="button" value="找回密码" class="input2"/></div>
                            </form>
                        </div>
                        <div class="yonghudown2" style="<?=$welcome ?>">欢迎你，<?php if (isset($username))
                            echo $username; ?><br /><br /><br /><a class="titleLink" href="<?=base_url() ?>index.php/index/getin/<?=$userId ?>">登陆</a>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<a class="titleLink" href="<?=base_url() ?>index.php/index/logOut">退出</a></div>
                <!--<div class="up-main-wd1"><a class="titleLink" href="<?=base_url() ?>index.php/index/getin/<?=$userId ?>">登陆</a></div>
	      	<div class="up-main-kong2"></div>
	      	<div class="up-main-wd2"><a class="titleLink" href="<?=base_url() ?>index.php/index/logOut">退出</a></div>--><!---->
                  <!--<div class="up-main-wd1"><input type="button" onclick="window.location.href=<?=base_url() ?>index.php/index/getin/<?=$userId ?>" value="登陆" /></div>
                  <div class="up-main-kong2"></div>
                  <div class="up-main-wd2"><input type="button" onclick="window.location.href=<?=base_url() ?>index.php/index/getin/<?=$userId ?>" value="登陆" /></div>-->
                    </div>
                </div>
                <div class="rt-dn">
                    <div class="ri-dn-word">
                        <li><a class="titleLink" href="http://www.moa.gov.cn/sjzz/kjs">农业部科教司</a></li>
                        <li><a class="titleLink" href="http://www.cau.edu.cn">中国农业大学</a></li>
                        <li><a class="titleLink" href="http://www.caae.com.cn">农业部规划设计研究院</a></li>
                        <li><a class="titleLink" href="http://www.hzau.edu.cn">华中农业大学</a></li>
                        <li><a class="titleLink" href="http://www.scau.edu.cn">华南农业大学</a></li>
                        <li><a class="titleLink" href="http://www.nwsuaf.edu.cn">西北农林科技大学</a></li>
                        <li><a class="titleLink" href="http://www.nriam.com">农业部南京机械化研究所</a></li>
                        <li><a class="titleLink" href="http://www.sjtu.edu.cn">上海交通大学</a></li>
                        <li><a class="titleLink" href="http://www.zju.edu.cn">浙江大学</a></li>
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
                                            <td><b>首席专家：</b> 韩鲁佳教授</td>
                                        </tr>
                                        <tr>
                                            <td><b>一、项目承担单位：</b>中国农业大学、农业部规划设计研究院、农业部南京农业机械化研究所、华中农业大学、华南农业大学、上海交通大学、西北农林科技大学和浙江大学。</td>
                                        </tr>
                                        <tr>
                                            <td><b>二、项目目的和意义简述：</b>我国农作物秸秆和畜禽粪便等农业生物质资源极其丰富，农业生物质资源的开发利用，既涉及到农业生产系统中的物质高效转化和能量高效循环，成为循环农业的重要实现途径。<br/><br/></td>
                                        </tr>
                                    </table></td>
                            </tr>
                            <tr>
                                <td id="demo2"></td>
                            </tr>
                        </table>
                    </div></div>
                </div>
                <div class="marvel"></div>
                <div class="shuju"><img src="images/111.jpg" alt="数据共享平台"/></div>

                <div class="mi-up3" id="mi-up3">
                    <div class="allword">
                                <?php if (is_array($bullentins))
                                    foreach ($bullentins as $r): ?>
                                <li><a class="titleLink" href="<?=base_url() ?>index.php/outside/trend/detail/<?=$r->trendId ?>" target="_blank" title="<?=$r->trendName ?>">
                                &middot;<?
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
                        <div class="more"><a class="titleLink" href="<?=base_url() ?>index.php/outside/trend/index/1">&gt;&gt;more </a>&nbsp; &nbsp; &nbsp; </div>
                </div>
            </div>


            <div class="flash">


                <div class="fl">
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="330" height="220">
                        <param name="movie" value="flash/end.swf">
                        <param name="quality" value="high">
                        <embed src="flash/end.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="330" height="220"></embed>
                    </object>
                </div>

                <div class="guanli1">
                    <div class="allword">
                        <?php if (is_array($instruments))
                                foreach ($instruments as $r): ?>
                                    <li><a class="titleLink" href="<?=base_url() ?>index.php/outside/trend/detail/<?=$r->trendId ?>" target="_blank" title="<?=$r->trendName ?>">
                                &middot;<?
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
                    <div class="more"><a class="titleLink" href="<?=base_url() ?>index.php/outside/trend/index/2">&gt;&gt;more </a>&nbsp; &nbsp; &nbsp; </div>
                </div>

                <div class="guanli">
                    <div class="allword">
<?php if (is_array($trends))
                        foreach ($trends as $r): ?>
                            <li><a class="titleLink" href="<?=base_url() ?>index.php/outside/trend/detail/<?=$r->trendId ?>" target="_blank" title="<?=$r->trendName ?>">
                                    &middot;<?
                            if (strLength($r->trendName, $charset = 'utf-8') > 18) {
                                echo utf8Substr($r->trendName, $from = 0, 18);
                                echo "...";
                            } else {
                                echo $r->trendName;
                            } ?></a>
                        </li>
<?php endforeach; ?>
                    </div>
                    <div class="more"><a class="titleLink" href="<?=base_url() ?>index.php/outside/trend/index/3">&gt;&gt;more</a> &nbsp; &nbsp; &nbsp; &nbsp; </div>
                </div>
            </div>
        </div>
    </div>
</div>
<SCRIPT>
var speed=30
var MyMarh=setInterval(Marqueeh,speed)
demo2.innerHTML=demo1.innerHTML
demo.onmouseover=function(){ clearInterval(MyMarh) }
demo.onmouseout=function(){ MyMarh=setInterval(Marqueeh,speed) }
function Marqueeh(){
if(demo2.offsetHeight-demo.scrollTop<=0)
   demo.scrollTop-=demo1.offsetHeight
else{
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