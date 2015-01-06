/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
// 删除记录
function deleteInfo(url){
    if(confirm('确认删除？')){
        window.location = url;
    }
}

function date_change(element1, element2, element3, url){
    var year = $("#" + element1).val();
    var month = $("#" + element2).val();
    $.post(url, {
        year: year,
        month:month
    }, function(result){
        $("#"+element3).empty();
        $("#"+element3).append(result);
    });
}