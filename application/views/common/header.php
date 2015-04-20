<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="<?= base_url(); ?>css/frame.css" rel="stylesheet" type="text/css" />
<script src="<?=base_url();?>javascript/jquery.js" type="text/javascript"></script>
<script src="<?=base_url();?>javascript/frameMenu.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(
	function(){
		Theol.menu("nav","cur","cur","slide");

        $('#nav > li > a').click(function(){
                if($(this).hasClass('cur')){
                    $(this).removeClass('cur');
                }else{
                     $(this).addClass('cur');
                }
        });

        var clientH =  $(document.body).height();
        var menuH =  clientH - $('.left_top').height() - 15;
        $('.menu_wrap').height(menuH);
        $(window).resize(function(){
                var clientH =  $(document.body).height();
                var menuH =  clientH - $('.left_top').height() - 15;
                $('.menu_wrap').height(menuH);
                $('#sidebar').children('a').css("top","50%");
        });


});
function changeFrame(){
		var obj=parent.document.getElementById("_middle_");
		if(obj.cols!="10,*"){
			obj.cols="10,*";
			document.getElementById("left_wrap").style.display="none";
			document.getElementById("sidebar").innerHTML="<a href='#' onClick='changeFrame()'><img src='<?=base_url();?>images/admin/menu_expand.gif' border='0'></a>";
		}else{
			obj.cols="208,*";
			document.getElementById("left_wrap").style.display="";
			document.getElementById("sidebar").innerHTML="<a href='#' onClick='changeFrame()'><img src='<?=base_url();?>images/admin/menu_hide.gif' border='0'></a>";
		}
};
</script>

</head>
