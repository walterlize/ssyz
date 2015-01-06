function theol(){}
theol.prototype = {
menu:function(id,curClass,subCurClass,showEffect){
		liId = "#" + id + " > li";
		aId = "#" + id + " > li > a";
		subaId = "#" + id + " > li > ul > li > a";
		var im = null,subim=null;
		if(showEffect != null && showEffect == "slide"){
		$(aId).each(
			function(i){
				$(this).click(
					function(){
						$(subaId).each(function(){$(this).removeClass(subCurClass);});
						if(im!=null && im!=i) {
							if($(liId).eq(im).find("ul").size() != 0){
								$(liId).eq(im).find("ul").slideToggle("fast",function(){$(this).css("display") == "none" ? $(this).prev("a").removeClass(curClass):$(this).parent().addClass(curClass);});
							}else{
								$(liId).eq(im).find("a").removeClass(curClass);
							}
						}
						(im == i) ? im =null : im =i;
						if($(this).parent().find("ul").size() != 0){
							$(this).parent().find("ul").slideToggle("fast",function(){$(this).css("display") == "none" ? $(this).prev("a").removeClass(curClass):$(this).prev("a").addClass(curClass);});
						}else{
							var str = $(this).attr("class");
							if(str == undefined) {
							$(this).addClass(curClass);}else{ $(this).prev("a").removeClass(curClass)}

						}
					}
				);
			}
		);
		}else{
		$(aId).each(
			function(i){
				$(this).click(
					function(){
						$(subaId).each(function(){$(this).removeClass(subCurClass);});
						if(im!=null && im!=i) {
							if($(liId).eq(im).find("ul").size() != 0){
								$(liId).eq(im).find("ul").toggle();
							}
							$(aId).eq(im).removeClass(curClass);
						}
						(im == i) ? im =null : im =i;
						if($(this).parent().find("ul").size() != 0){
							$(this).parent().find("ul").toggle();
							$(this).parent().find("ul").css("display") == "none" ? $(this).removeClass(curClass) : $(this).addClass(curClass);
						}else{
							var str = $(this).attr("class");
							if(str == undefined) {
							$(this).addClass(curClass);}else{ $(this).prev("a").removeClass(curClass)}
						}
					}
				);
			}
		);
		}
		$(subaId).each(
			function(i){
				$(this).click(
					function(){
						if(subim != null || subim != i){$(subaId).eq(subim).removeClass(subCurClass);}
						subim = i;
						$(this).addClass(subCurClass);
					}
				);
			}
		);
	}
};
var Theol = new theol();