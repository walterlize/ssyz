/**
* Check form
*/
function check(vform)
{
    var flag = true;
    try
    {
        form = document.getElementById(vform);

        for(var i=0;i<form.elements.length;i++)
        {        
            if(form.elements[i].getAttribute("isRequired") != null || form.elements[i].getAttribute("validEnum") != null)
            {
                try
                {
                    var checkResult = checkElement(form.elements[i]);
                    var name = form.elements[i].getAttribute("name");     
                    
                    
                    if(checkResult)
                    {
                        document.getElementById(name + "Msg").className = "MsgHide";
                    }
                    else
                    {        
                        document.getElementById(name+"Msg").className="MsgShow";
                        form.elements[i].focus();
                        flag = false;
                    }    
                }
                catch(e)
                {
                   alert(e.message + " " + name);
                }          
            }
        }
    } 
    catch(e)
    {
       //alert(e.message);
	   flag = false;
    }     
 
    return flag;
}

String.prototype.trim = function() 
{ 
    return this.replace(/(^\s*)|(\s*$)/g, ""); 
} 
    
/**
* Check text field in the form
*/
function checkElement(element)
{
    var isRequired=element.getAttribute("isRequired");
    var inputValue=element.value; 
    if(inputValue == "无权限查看")
      return true;
    
    var validChar = GetValidChar(element.getAttribute("validEnum"));
       
    //过滤特殊字符
    if(inputValue.length > 1 && (element.type == "text" || element == "textarea"))
    {
        var temp  =  "\\(|\\)|'|;|and|exec|insert|select|delete|update|count|%|chr|mid|master|truncate|char|declare|&|#|\\$"; 
        var regex1=new RegExp(temp,"g");
       
        element.value = inputValue.replace(regex1,"").trim();
    }

    //判断长度
    var minLength = element.getAttribute("MinLength");
    if (minLength != null && inputValue.length < minLength) {
        return false;
    }
    
    if(isRequired == "true")
    {
        if(inputValue.length<1)
        {
            return false;
        }
        else 
        {

            if(validChar!= null)
            {
            
                var regex=new RegExp(validChar);
                return regex.test(inputValue);
            } 
        }
    }
    else
    {
        if(inputValue.length<1)
        {
            return true;
        }
        else
        {
            if(validChar!= null)
            {
                var regex=new RegExp(validChar);
                return regex.test(inputValue);
            }
        }
    }
    
     return true;
}

function GetValidChar(validEnum)
{
    if(validEnum == null) return null;
    
    var validChar = "";
    switch(validEnum)
    {
        case "Int":
            validChar = "^[1-9][0-9]{0,5}$";
            break;
        case "Float":
            validChar = "^[1-9][0-9]{0,5}$";
            break;
        case "Email":
            validChar = "^\\w+([-+.]\\w+)*@\\w+([-.]\\w+)*\\.\\w+([-.]\\w+)*$";
            break;
        case "Tel":
            validChar = "(^((\\(\\d{2,3}\\))|(\\d{3}\\-))?(\\(0\\d{2,3}\\)|0\d{2,3}-)?[1-9]\\d{6,7}(\\-\\d{1,4})?$)|(^0{0,1}(13[0-9]|15[0-9]|18[0-9])[0-9]{8}$)";
            break;
        case "PostalCode":
            validChar = "^\\d{6}$";
            break;
        case "IDCard":
            validChar = "(^\\d{15}$)|(^\\d{17}([0-9]|(X|x))$)";
            break;
        case "Url":
            validChar="^http://([\\w-]+\\.)+[\\w-]+(/[\\w- ./?%&=]*)?$";
            break;
        case "MobilePhone":
            validChar="^0{0,1}(13[0-9]|15[0-9]|18[0-9])[0-9]{8}$";
            break;
        default:
            break;
    }
    
    return validChar;
}

function quanjiao(obj)
{
    var str=obj.value;
    
    if (str.length>0)
    {
        for (var i = str.length-1; i >= 0; i--)
        {
            unicode=str.charCodeAt(i);
            if (unicode>65280 && unicode<65375)
            {
                alert("不能输入全角字符，请输入半角字符");
                return false;
            }
        }
    }
    
    return true;
}

function checkInt(value) {
    var re = /^[1-9]+[0-9]*]*$/;   //判断正整数      //判断字符串是否为数字  /^[0-9]+.?[0-9]*$/
    if (!re.test(value)) {
        return false;
    }
    else {
        return true;
     }
}

// 旧密码与数据库中的不一致
function check_password(element1, element2, url){
    var flag = true;
    var password = $("#"+element1).val();
    if(password == 0 || password == '' || password == null) return true;
    try{
        $.post(url, { old_password:password },function(result){
          if(result != '' && result != 0 && result != null){
              $("#"+element1).val("");
              $("#"+element2).empty();
              $("#"+element2).append(result);
              $("#"+element1).focus();
              flag = false;
          } else {
              $("#"+element2).empty();
              flag = true;
          }
        });
    } catch(e){
        flag = false;
    }
    return flag;
}

// 验证密码的值是否有效
function valid_password(element1, element2){
    var password = $("#"+element1).val();
    if(password == 0 || password == '' || password == null) return true;

    if(password.length < 6){
        $("#"+element2).empty();
        $("#"+element2).append("密码长度必须大于6");
        return false;
    } else if(password.length >20){
        $("#"+element2).empty();
        $("#"+element2).append("密码长度必须小于20");
        return false;
    }

    var num=/[0-9]+/;
    var character=/[a-zA-Z]+/;
    if(!(password.match(num) && password.match(character))){
        $("#"+element2).empty();
        $("#"+element2).append("密码必须是数字与字母的组合");
        return false;
    }
    $("#"+element2).empty();
    return true;
}

// 检查两次输入的密码是否一致
function check_next_password(element1, element2, element3){
    if(valid_password(element2, element3) == false) return false;

    var password1 = $("#"+element1).val();
    var password2 = $("#"+element2).val();

    if(password1 != password2){
        $("#"+element3).empty();
        $("#"+element3).append("两次输入的密码不一致！");
        return false;
    }

    $("#"+element3).empty();
    return true;
}

function check_email(element1, element2, form, url){
    var flag = true;
    if(check_password(element1, element2, url) == false) flag = false;
    if(check(form) == false) flag = false;
    return flag;
}

function check_person_num(element1, element2, url){
    var number = $("#"+element1).val();
    var flag = true;
    if(number == 0 || number == '' || number == null) flag = true;

    $.post(url, { number:number },function(result){
          if(result != '' && result != 0 && result != null){
              $("#"+element1).val("");
              $("#"+element2).empty();
              $("#"+element2).append(result);
              $("#"+element1).focus();
              flag = false;
          } else {
              $("#"+element2).empty();
              flag = true;
          }
    });

    return flag;
}

function to_admin(url){
    $.post(url, function(result){
        if(result != '' && result != 0 && result != null){
            alert(result);
        } else {
            alert('未能成功提交至人事处，请刷新页面后重新提交！');
        }
    });
}