// JavaScript Document

// 全选 反选
function selectAll(){
	var obj = document.getElementById('select_all');
	var code_values = document.getElementsByTagName("input"); 
	if(obj.checked == "checked" || obj.checked == true){
		for(i = 0; i <code_values.length; i++){
			if(code_values[i].type == "checkbox"){
				code_values[i].checked = true;
			}
		}
	} else{
		for(i = 0; i <code_values.length; i++){
			if(code_values[i].type == "checkbox"){
				code_values[i].checked = false;
			}
		}
	}
}

