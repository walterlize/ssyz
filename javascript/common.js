/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
// 删除记录
function deleteInfo(url) {
    if (confirm('确认删除？')) {
        window.location = url;
    }
}

function date_change(element1, element2, element3, url) {
    var year = $("#" + element1).val();
    var month = $("#" + element2).val();
    $.post(url, {
        year: year,
        month: month
    }, function (result) {
        $("#" + element3).empty();
        $("#" + element3).append(result);
    });
}
//课题改变经费
function subject_change(element1, element2, url) {

    var subjectId = $("#" + element1).val();

    $.post(url, {
        subjectId: subjectId

    }, function (result) {
        $("#" + element2).empty();
        $("#" + element2).append(result);
    });
}
//普通用具报销查询
function option_change(element1, element2, element3, element4, element5, url) {
    var year = $("#" + element1).val();
    var month = $("#" + element2).val();
    var type = $("#" + element3).val();
    var state = $("#" + element4).val();
    $.post(url, {
        year: year,
        month: month,
        type: type,
        state: state
    },
        function (result) {
        $("#" + element5).empty();
        $("#" + element5).append(result);
    });
}
//管理员报销查询
function option_change1(element1, element2, element3, element4, element5, element6, url) {
    var year = $("#" + element1).val();
    var month = $("#" + element2).val();
    var type = $("#" + element3).val();
    var state = $("#" + element4).val();
    var unit = $("#" + element5).val();
    $.post(url, {
        year: year,
        month: month,
        type: type,
        state: state,
        unit: unit
    }, function (result) {
        $("#" + element6).empty();
        $("#" + element6).append(result);
    });
}
function travel_change(element1, element2, element3, element4, element5, url) {
    var year = $("#" + element1).val();
    var month = $("#" + element2).val();
    var type = $("#" + element3).val();
    var state = $("#" + element4).val();
    $.post(url, {
        year: year,
        month: month,
        type: type,
        state: state
    }, function (result) {
        $("#" + element5).empty();
        $("#" + element5).append(result);
    });
}
function expenseMoney_change(element1, element2, element3, element4, url) {
    var year = $("#" + element1).val();
    var month = $("#" + element2).val();
    var moneyType = $("#" + element3).val();
    $.post(url, {
        year: year,
        month: month,
        moneyType: moneyType
    }, function (result) {
        $("#" + element4).empty();
        $("#" + element4).append(result);
    });
}
//计算出两个日期之间的天数
/*function  dayNum() {    //sDate1和sDate2是2014-12-18格式
    var data1 = document.getElementById("outDate").value;
    var data2 = document.getElementById("backDate").value;

    var aDate, oDate1, oDate2;
    aDate = data1.split("-");
    oDate1 = new Date(aDate[1] + '-' + aDate[2] + '-' + aDate[0]);   //转换为12-18-2014格式    
    aDate = data2.split("-");
    oDate2 = new Date(aDate[1] + '-' + aDate[2] + '-' + aDate[0]);
    outdaynum = parseInt(Math.abs(oDate1 - oDate2) / 1000 / 60 / 60 / 24); //把相差的毫秒数转换为天数
    document.getElementById("days").value = outdaynum;
}
*/
//计算出两个日期之间的天数
function  dayNum() {    //sDate1和sDate2是2014-12-18格式
    var data1 = document.getElementById("outDate").value;
    var data2 = document.getElementById("backDate").value;

    var aDate, oDate1, oDate2;
    aDate = data1.split("-");
    oDate1 = new Date(aDate[1] + '-' + aDate[2] + '-' + aDate[0]);   //转换为12-18-2014格式
    aDate = data2.split("-");
    oDate2 = new Date(aDate[1] + '-' + aDate[2] + '-' + aDate[0]);
    outdaynum = parseInt(Math.abs(oDate1 - oDate2) / 1000 / 60 / 60 / 24)+1; //把相差的毫秒数转换为天数
    document.getElementById("days").value = outdaynum;
}