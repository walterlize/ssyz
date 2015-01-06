/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function changeYear(year, month, content, url){
    var yearNum = $('#' + year).val();
    var monthNum = $('#' + month).val();
    $.post(url, {year: yearNum, month:monthNum}, function(result){
        $("#"+content).empty();
        $("#"+content).append(result);
    });
}