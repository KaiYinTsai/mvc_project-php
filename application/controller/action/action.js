function getimei() {

    document.getElementById("getOptionValue").value = document.getElementById("ZTDProduct").value;
}


function getform() {
    var a = document.getElementById("getOptionValue").value;

    print

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
            $(".Imeitable").append(html);
        },
        error: function(xhr) { alert(xhr.status + "Text: " + xhr.statusText) },
    })
})

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