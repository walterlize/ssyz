<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?=$title?></title>
<link href="<?=base_url()?>css/public.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>css/header.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>css/conent.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>css/footer.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>css/pr_css.css" rel="stylesheet" type="text/css" />
<script src="<?=base_url();?>javascript/jquery.js" type="text/javascript"></script>
<script src="<?=base_url();?>javascript/JQuery.MenuTree.js" type="text/javascript"></script>
<script type="text/javascript">
   $(function() {
            $('#left_menu').menuTree();
        });
</script>
</head>

<body>
<div class="main">
  	<div class="hed_bg">
    <div class="dv_img"><img src="<?=base_url()?>images/te.png" width="642" height="80" /></div>
    	<div class="a">
        	<a href="<?=base_url()?>" class="a1">首页</a>
            <a href="<?=base_url()?>index.php/outside/subject/project" class="a2">项目介绍</a>
            <a href="<?=base_url()?>index.php/outside/subject/index" class="a3">课题设置</a>
            <a href="<?=base_url()?>index.php/outside/trend/index/3" class="a4">管理办法</a>
            <a href="<?=base_url()?>index.php/outside/trend/index/1" class="a5">重要公告</a>
            <a href="<?=base_url()?>index.php/outside/trend/index/2" class="a6">项目动态</a>
            <a href="<?=base_url()?>index.php/outside/paper/paperList" class="a7">研究成果</a>
            <a href="#" class="a8">数据共享平台</a>
            <a href="<?=base_url()?>index.php/outside/contact/index" class="a9">联系我们</a>
        </div>
    </div>

 <div class="qh">
    <dl id="album">
 <dt> <img id="index1" img src="<?=base_url()?>images/01.jpg" width="960" height="250">
 <img id="index2" img src="<?=base_url()?>images/02.jpg" width="960" height="250">
 <img id="index3" img src="<?=base_url()?>images/03.jpg" width="960" height="250">
 <img id="index4" img src="<?=base_url()?>images/04.jpg" width="960" height="250">
 <img id="index5" img src="<?=base_url()?>images/05.jpg" width="960" height="250">
  <dd> <a href="#index1">1</a><a href="#index2">2</a><a href="#index3">3</a><a href="#index4">4</a><a href="#index5">5</a>
</dl>
<div class="AD_sk"><script type="text/javascript">
  function imageRotater(id){
    var cases = "",
    album = document.getElementById(id),
    images = album.getElementsByTagName("img"),
    links = album.getElementsByTagName("a"),
    dt = album.getElementsByTagName("dt")[0],
    length = images.length,
    aIndex = 1,
    aBefore = length;
    for(var i=0;i< length;i++){
      cases += images[i].id + ':"'+images[i].getAttribute("src")+'",'
    }
    images[0].style.cssText = "position:absolute;top:0;left:0;";//修正图片位置错误
    var tip = document.createElement("dd");

    album.insertBefore(tip,dt.nextSibling);
    if(!+"\v1"){
      tip.style.color = "#369";
      tip.style.filter = "alpha(opacity=67)"
    }else{
      tip.style.cssText += "background: rGa(164, 173, 193, .65);"
    }
    cases = eval("({"+cases.replace(/,$/,"")+"})");
    for(var i=0;i<length;i++){
      links[i].onclick = function(e){
        e =e || window.event;
        var index = this.toString().split("#")[1];
        aIndex = index.charAt(index.length-1);//☆☆☆☆
        images[0].src = cases[index];
        tip.innerHTML = images[aIndex -1].getAttribute("alt");
          !+"\v1" ?(e.returnValue = false) :(e.preventDefault());
      }
    }
    var prefix = images[0].id.substr(0,images[0].id.length -1);
    (function(){
      setTimeout(function(){
        if(aIndex > length){
          aIndex = 1;
        }
        images[0].src = cases[prefix+aIndex];
        tip.innerHTML = images[aIndex -1].getAttribute("alt");
        tip.style.bottom = "-40px";
        links[aBefore-1].className = "";
        links[aIndex-1].className = "hover";
        aBefore = aIndex;
        aIndex++;
        move(tip);
        setTimeout(arguments.callee,5000)
      },5000)
    })()
    var move = function(el){
      var begin = parseFloat(el.style.bottom),
      speed = 1;
      el.bottom = begin;
      (function(){
        setTimeout(function(){
          el.style.bottom = el.bottom + speed + "px";
          el.bottom += speed;
          speed *= 1.5;//下一次移动的距离
          if(el.bottom >= 0){
            el.style.bottom = "0px";
          }else{
            setTimeout(arguments.callee,23);
          }
        },25)
      })()
    }
  }
  window.onload = function(){
    try{document.execCommand("BackgroundImageCache", false, true);}catch(e){};
    imageRotater("album");
  }
</script>
 </div>
</div>