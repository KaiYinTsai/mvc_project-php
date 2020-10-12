function getimei() {

    document.getElementById("getOptionValue").value = document.getElementById("ZTDProduct").value;
}


function getform() {
    var a = document.getElementById("getOptionValue").value;

}

//ajax request
function ajaxrequest() {

    try {

        var request = new XMLHttpRequest();

    } catch (e1) {
        try {
            // （支援 IE6）如果有的話就用 ActiveX 物件的最新版本
            request = new ActiveXObject("Msxml2.XMLHTTP.6.0");
        } catch (e2) {
            try {
                // （支援 IE5）否則就用較舊的版本
                request = new ActiveXObject("Msxml2.XMLHTTP.3.0");
            } catch (e3) {
                // 不支援 Ajax，拋出錯誤
                throw new Error("XMLHttpRequest is not supported");
            }
        }
    }
    return request;
}


/*
$(function() {

    $("td").click(function(event) {
        //td中已經有了input,則不需要響應點選事件
        if ($(this).children("input").length > 0)
            return false;
        var tdObj = $(this);
        var preText = tdObj.html();
        //得到當前文字內容 
        var inputObj = $("<input type='text' />");
        //建立一個文字框元素 
        tdObj.html(""); //清空td中的所有元素 
        inputObj
            .width(tdObj.width())
            //設定文字框寬度與td相同 
            .height(tdObj.height())
            .css({ border: "0px", fontSize: "17px", font: "宋體" })
            .val(preText)
            .appendTo(tdObj)
            //把建立的文字框插入到tdObj子節點的最後
            .trigger("focus")
            //用trigger方法觸發事件 
            .trigger("select");
        inputObj.keyup(function(event) {
            if (13 == event.which)
            //使用者按下回車 
            {
                var text = $(this).val();
                tdObj.html(text);
            } else if (27 == event.which)
            //ESC鍵 
            {
                tdObj.html(preText);
            }
        });
        //已進入編輯狀態後，不再處理click事件 
        inputObj.click(function() {
            return false;
        });
    });
});
*/

function createtd(data) {

    console.log(data);
    var html = "<tr>";
    var col = 0
    leng = data[0].length;
    for (c = 1; c < leng; c++) {

        html += "<td>" + data[0][col] + "</td>";
        col++;
    }
    html += "</tr>";
    $(".projecttable").append(html);


}
/************************LeftBar***********************/

$('document').ready(Triangle(0));


$('#actionitem').click(function() {

    var tristatus = 0;

    if ($('#actionitem').attr('id') == 'actionitem') {
        $('#actionitem').attr('id', 'actionitem-off');
        tristatus = 1;
    } else {
        $('#actionitem-off').attr('id', 'actionitem');
        tristatus = 0;
    }
    $('#triangle-div').slideToggle(400);
    $('.listbar-ul').slideToggle(300);
    Triangle(tristatus);


});

function Triangle(status) {

    var canvas = document.getElementById("triangle-canvas");
    if (canvas.getContext) {
        var ctx = canvas.getContext("2d");

        ctx.fillStyle = "rgb(0,0,0)";
        ctx.clearRect(0, 0, 20, 20);
        ctx.beginPath();
        if (status == 0) {
            ctx.moveTo(0, 0);
            ctx.lineTo(20, 0);
            ctx.lineTo(10, 20);
        } else if (status == 1) {
            ctx.moveTo(0, 20);
            ctx.lineTo(20, 20);
            ctx.lineTo(10, 0);
        }
        ctx.closePath();
        ctx.fill();
    }
}

/***************************ImeiSearch***************************** */
/** ZTDProduct Option select and create table*/

$('#ZTDProduct').change(function() {
        $.ajax({
            url: "../application/model/dynamic/get_imei_result.php", //後臺請求的資料，用的是PHP
            dataType: "json", //資料格式
            type: "Post", //請求方式
            async: false, //是否非同步請求
            success: function(data) { //如果請求成功，返回資料。

                console.log("ajax in!");
                var html = "<tr>";
                var col = 0
                leng = data[0].length;
                for (c = 1; c < leng; c++) {

                    html += "<td>" + data[0][col] + "</td>";
                    col++;
                }
                html += "</tr>";
                $("#imeitable").append(html);
            },
            error: function(xhr) { alert(xhr.status + "Text: " + xhr.statusText) },
        })
    })
    /*****************************Projectindex****************************** */

$('document').ready(function() {
        $('.projectbtn-div').css('display', 'none');
    })
    /* ZTD Project Option and create table */
$('#ZTDProjectsel').change(function() {
    var selected = $('#ZTDProjectsel').val();
    $(".projecttable").empty(); //remove display table
    $.ajax({
        url: "../application/model/dynamic/get_productproject_join.php",
        dataType: "json",
        type: "Post",
        async: false,
        data: { select: selected },
        cache: false,
        success: function(data) {
            var html = "<tr><th>ID</th><th>Project Name</th><th>Start Date</th><th>Status</th><th>Owner</th><th>Product ID</th><th>Product Name</th><th>Project ID</th><th>Imei Used</th></tr>";
            html += "<tr>";
            var col = 0
            leng = data[0].length;

            for (c = 1; c < leng; c++) {

                html += "<td>" + data[0][col] + "</td>";
                col++;
            }
            html += "</tr>";
            $(".projecttable").append(html);
            $('.projectbtn-div').css('display', '');
            $('.project-btn').attr('disabled', false);
        },
        error: function(xhr) { alert(xhr.status + "Text: " + xhr.statusText) },
    })
})

/*****************************Projectnew************************************ */
/** projectproductselected Option and create checkbox*/
$('#projectproductselected').change(function() {
        var selected = $('#projectproductselected').val();
        $(".productselected-table-div").empty(); //remove display table
        if (selected == 'new') {
            $(".projectproductselected-div").css("background-color", "#f0f8ff");
            return;
        }
        $(".projectproductselected-div").css("background-color", "#fff8ff");
        $.ajax({
            url: "../application/model/dynamic/get_product_result.php",
            dataType: "json",
            type: "Post",
            async: false,
            cache: false,
            success: function(data) {

                console.log(data);
                var col = 0
                leng = data.length;

                var html = "<table id=producttable>";
                html += "<tr>";
                for (c = 0; c < leng; c++) {

                    html += "<td> <input type='checkbox' value =" + data[col][1] + ">" + data[col][0] + "</td>";
                    col++;
                    if (col % 4 == 0) {

                        html += "</tr>"
                        html += "<tr>";
                    }

                }
                html += '</tr>'
                html += "</table>";
                $(".productselected-table-div").append(html);
            },
            error: function(xhr) { alert(xhr.status + "Text: " + xhr.statusText) },
        })
    })
    /*******************************ProjectUpdate *********************************/
    /************************** projectselected Option ***********************/
$('#ZTDProjectselUpdate').change(function() {
    var selected = $('#ZTDProjectselUpdate').val();
    $(".projecttable").empty(); //remove display table
    $.ajax({
        url: "../application/model/dynamic/get_project_join.php",
        dataType: "json",
        type: "Post",
        async: false,
        data: { select: selected },
        cache: false,
        success: function(data) {
            var html = "<tr>";
            html += "<th>ID</th><th>Project Name</th><th>Start Date</th><th>Status</th><th>Owner</th><th>Product ID</th><th>Product Name</th><th>Project ID</th><th>Imei Used</th><th>Mac Used</th>";
            html += "</tr>";
            var col = 0
            leng = data.length;
            leng_col = data[0].length;
            for (r = 0; r < leng; r++) {
                html += "<tr>";
                for (c = 0; c < leng_col; c++) {
                    if (data[r][c] == 'null')
                        html += "<td colspan='10'>There are No Data in this Project</td>";
                    else
                        html += "<td>" + data[r][c] + "</td>";
                }
                html += "</tr>";
            }

            $(".projecttable").append(html);
            $('.projectbtn-div').css('display', '');
            $('.project-btn').attr('disabled', false);
        },
        error: function(xhr) { alert(xhr.status + "Text: " + xhr.statusText) },
    })
})