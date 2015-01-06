<div align="center" class="titleLink">
<div class="zhuti">
  <div class="zhuti1">
<div class=pnav-cnt>
    <div class=pnav-box id=letter-a>
        <div class=box-title>
            <A class="btn-fold " href="http://www.mycodes.net"></A>
            <A class="btn-unfold hidden" href="http://www.mycodes.net"></A>
            <SPAN class=pnav-letter>项目简介</SPAN>
        </div>
        <ul class="box-list hidden">
            <li><B><A href="<?=base_url()?>index.php/outside/subject/project">项目概况</A></B></li>
            <li><B><A href="<?=base_url()?>index.php/outside/subject/expert">项目执行专家组</A></B></li>
        </ul>
    </div>
    <div class=pnav-box id=letter-a>
        <div class=box-title>
            <A class="btn-fold " href=""></A>
            <A class="btn-unfold hidden" href=""></A>
            <SPAN class=pnav-letter>重要公告</SPAN>
        </div>
        <ul class="box-list hidden">
            <li><B><A href="<?=base_url()?>index.php/outside/trend/index/1">重要公告</A></B></li>
        </ul>
    </div>
    <div class=pnav-box id=letter-a>
        <div class=box-title>
            <A class="btn-fold " href=""></A>
            <A class="btn-unfold hidden" href=""></A>
            <SPAN class=pnav-letter>项目动态</SPAN>
        </div>
        <ul class="box-list hidden">
            <li><B><A href="<?=base_url()?>index.php/outside/trend/index/2">项目动态</A></B></li>
        </ul>
    </div>
    <div class=pnav-box id=letter-a>
        <div class=box-title>
            <A class="btn-fold " href=""></A>
            <A class="btn-unfold hidden" href=""></A>
            <SPAN class=pnav-letter>管理办法</SPAN>
        </div>
        <ul class="box-list hidden">
            <li><B><A href="<?=base_url()?>index.php/outside/trend/index/3">管理办法</A></B></li>
        </ul>
    </div>
    <div class=pnav-box id=letter-a>
        <div class=box-title>
            <A class="btn-fold " href=""></A>
            <A class="btn-unfold hidden" href=""></A>
            <SPAN class=pnav-letter>研究成果</SPAN>
        </div>
        <ul class="box-list hidden">
            <li><B><A href="<?=base_url()?>index.php/outside/paper/paperList">论文</A></B></li>
            <li><B><A href="<?=base_url()?>index.php/outside/book/bookList">论著</A></B></li>
            <li><B><A href="<?=base_url()?>index.php/outside/patent/patentList">专利</A></B></li>
            <li><B><A href="<?=base_url()?>index.php/outside/software/softwareList">软件著作权</A></B></li>
            <li><B><A href="<?=base_url()?>index.php/outside/result/resultList">鉴定成果</A></B></li>
            <li><B><A href="<?=base_url()?>index.php/outside/standard/standardList">标准</A></B></li>
            <li><B><A href="<?=base_url()?>index.php/outside/report/reportList">报告</A></B></li>
            <li><B><A href="<?=base_url()?>index.php/outside/award/awardList">报奖材料</A></B></li>
            <li><B><A href="<?=base_url()?>index.php/outside/demonstration/demonstrationList">应用示范</A></B></li>
            <li><B><A href="<?=base_url()?>index.php/outside/other/otherList">其它</A></B></li>
        </ul>
    </div>

    <SCRIPT type="text/javascript">
            //<![CDATA[
            (function(){
            NTES("span.photo-search input[type=text]").addEvent("focus", function(){ this.value == this.defaultValue && (this.value = ""); }).addEvent("blur", function(){ this.value == "" && (this.value = this.defaultValue); });
	NTES("div.pnav-box div.box-title a.btn-fold").addEvent("click", function(e){
		e.preventDefault();
		var eleTitle = NTES(this.parentNode);
		NTES(this).addCss("hidden");
		eleTitle.$("a.btn-unfold").removeCss("hidden");
		NTES(eleTitle.parentNode).$("ul.box-list").removeCss("hidden");
	});
	NTES("div.pnav-box div.box-title a.btn-unfold").addEvent("click", function(e){
		e.preventDefault();
		var eleTitle = NTES(this.parentNode);
		NTES(this).addCss("hidden");
		eleTitle.$("a.btn-fold").removeCss("hidden");
		NTES(eleTitle.parentNode).$("ul.box-list").addCss("hidden");
	});
	NTES("div.pnav-box ul.box-list a.btn-fold").addEvent("click", function(e){
		e.preventDefault();
		var eleTitle = NTES(this.parentNode);
		NTES(this).addCss("hidden");
		eleTitle.$("a.btn-unfold").removeCss("hidden");
		eleTitle.$("h2").removeCss("hidden");
	});
	NTES("div.pnav-box ul.box-list a.btn-unfold").addEvent("click", function(e){
		e.preventDefault();
		var eleTitle = NTES(this.parentNode);
		NTES(this).addCss("hidden");
		eleTitle.$("a.btn-fold").removeCss("hidden");
		eleTitle.$("h2").addCss("hidden");
	});
	new NTES.ui.Slide(NTES("ul.photo-snav li"), NTES("div.photo-scnt"), "active", "mouseover", 6000);
            })();
            //]]>
</SCRIPT>


</div>
      </div>
