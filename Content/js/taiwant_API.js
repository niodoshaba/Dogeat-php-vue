$(document).ready(function () {
    //控制
    $(".btn_earthquake").click(function () {
        controllers("#box_taiwan_earthquake",".btn_earthquake",//開啟
        "#box_taiwant_reservoir,#box_taiwan_news,#box_taoyuan_parking,#box_taoyuan_travel,#box_exhibition",//要關閉的box
        ".btn_reservoir,.btn_news,.btn_taoyuan_parking,.btn_taoyuan_travel,.btn_exhibition");//要關閉的btn
    });
    $(".btn_reservoir").click(function () {
        reservoir();
        controllers("#box_taiwant_reservoir",".btn_reservoir",//開啟
        "#box_taiwan_earthquake,#box_taiwan_news,#box_taoyuan_parking,#box_taoyuan_travel,#box_exhibition",//要關閉的box
        ".btn_earthquake,.btn_news,.btn_taoyuan_parking,.btn_taoyuan_travel,.btn_exhibition");//要關閉的btn
    });
    $(".btn_news").click(function () {
        news();
        controllers("#box_taiwan_news",".btn_news",//開啟
        "#box_taiwan_earthquake,#box_taiwant_reservoir,#box_taoyuan_parking,#box_taoyuan_travel,#box_exhibition",//要關閉的box
        ".btn_earthquake,.btn_reservoir,.btn_taoyuan_parking,.btn_taoyuan_travel,.btn_exhibition");//要關閉的btn
    });
    $(".btn_taoyuan_parking").click(function () {
        taoyuan_park();
        controllers("#box_taoyuan_parking",".btn_taoyuan_parking",//開啟
        "#box_taiwan_earthquake,#box_taiwant_reservoir,#box_taiwan_news,#box_taoyuan_travel,#box_exhibition",//要關閉的box
        ".btn_earthquake,.btn_reservoir,.btn_news,.btn_taoyuan_travel,.btn_exhibition");//要關閉的btn
    });
    $(".btn_taoyuan_travel").click(function () {
        travel();
        controllers("#box_taoyuan_travel",".btn_taoyuan_travel",//開啟
        "#box_taiwan_earthquake,#box_taiwant_reservoir,#box_taiwan_news,#box_taoyuan_parking,#box_exhibition",//要關閉的box
        ".btn_earthquake,.btn_reservoir,.btn_news,.btn_taoyuan_parking,.btn_exhibition");//要關閉的btn
    });
    $(".btn_exhibition").click(function () {
        exhibition();
        controllers("#box_exhibition",".btn_exhibition",//開啟
        "#box_taiwan_earthquake,#box_taiwant_reservoir,#box_taiwan_news,#box_taoyuan_parking,#box_taoyuan_travel",//要關閉的box
        ".btn_earthquake,.btn_reservoir,.btn_news,.btn_taoyuan_parking,.btn_taoyuan_travel");//要關閉的btn
    });
    function controllers(open_box,click_btn,close_box,not_click_btn){
        //開啟
        $(`${click_btn}`).css("color","#fff");
        $(`${click_btn}`).css("background-color","#6bbc64");
        $(`${open_box}`).css("display","block");
        //關閉
        $(`${not_click_btn}`).css("color","#6bbc64");
        $(`${not_click_btn}`).css("background-color","#fff");
        $(`${close_box}`).css("display","none");
    }
    //地震
    $.ajax({
        type:"GET",
        url: "https://opendata.cwb.gov.tw/api/v1/rest/datastore/E-A0015-001?Authorization=rdec-key-123-45678-011121314",
        success: function(res){
            earthquake_data = res["records"]["earthquake"][0]
            $("#earthquake_title").text(earthquake_data["reportContent"])
            $("#earthquake_pic_img").attr("src",earthquake_data["reportImageURI"])
            for(i=0;i<earthquake_data["intensity"]["shakingArea"].length;i++){
                $("#earthquake_each_area_content").append(`
                    <div class="earthquake_each_area" data-area-set=${i}>
                        <div class="earthquake_each_location">${earthquake_data["intensity"]["shakingArea"][i]["areaDesc"]}</div>
                        <div class="earthquake_each_value">
                        ${earthquake_data["intensity"]["shakingArea"][i]["areaIntensity"]["value"]}`+"級"+`
                        </div>
                    </div>
                `)
            }
            $(".earthquake_each_area").click(function(){
                let area_set = $(this).data("areaSet")
                let eqStation = earthquake_data["intensity"]["shakingArea"][area_set]["eqStation"]

                    $("#station_list").html(`
                    <div id="station_list">${earthquake_data["intensity"]["shakingArea"][area_set]["areaDesc"]} 觀測站列表</div>
                    `)
                    $("#earthquake_station").html(`
                    `)
                    $("#earthquake_each_station").html(`
                    `)

                for(j=0;j<eqStation.length;j++){
                    $("#earthquake_station").append(`
                    <div class="each_station" data-station=${j}>${eqStation[j]["stationName"]}</div>
                    `)
                }
                $(".each_station").click(function(){
                    $("#earthquake_each_station").html("")
                    let station_set = $(this).data("station")
                    if(eqStation[station_set]["waveImageURI"]){
                        $("#earthquake_each_station").append(`
                        <div class="earth_text">地震規模：${eqStation[station_set]["stationIntensity"]["value"]} 級</div>
                        <div class="earth_text">震源深度：${eqStation[station_set]["distance"]["value"]} km</div> 
                        <div class="earth_text">方位角：${eqStation[station_set]["azimuth"]["value"]} 度</div>
                        <div class="earth_text">波圖： <img id="wave_img" src="${eqStation[station_set]["waveImageURI"]}"></div>
                        `)
                    }else{
                        $("#earthquake_each_station").append(`
                        <div class="earth_text">地震規模：${eqStation[station_set]["stationIntensity"]["value"]} 級</div>
                        <div class="earth_text">震源深度：${eqStation[station_set]["distance"]["value"]} km</div> 
                        <div class="earth_text">方位角：${eqStation[station_set]["azimuth"]["value"]} 度</div>
                        `)
                    }
                })
            })
        }
    })

    function reservoir(){
        if($("#load_reservoir").length){
            $.ajax({
                type: "GET",
                url: "https://www.taiwanstat.com/waters/latest",
                success: function (response) {
                    $("#load_reservoir").remove();
                    data = response[0]
                    for (let reservoirName in data) {
                        let percentage = parseFloat(data[reservoirName].percentage).toFixed(1);
                        let netFlow = -parseFloat(data[reservoirName].daliyNetflow).toFixed(1);
                        let netPercentageVar;
                        let usageDay;
                        let waterStatus;
                        let waterStatus_css;
                        let background_color;
                        let text_color;
                        let h=200-percentage*2;//波浪高度
                        let y=15+h;//定位點
                        let y1=19+h;//參考點
                        let y2=11+h;//參考點
                        if (isNaN(netFlow)) {
                            waterStatus='昨日水量狀態：待更新';
                        }else if (netFlow < 0) {
                            netPercentageVar = ((-netFlow) / parseFloat(data[reservoirName].baseAvailable)*100).toFixed(2);
                            usageDay = Math.round(percentage/netPercentageVar);
                            if (data[reservoirName].percentage > 80 && netPercentageVar > 2) {
                                usageDay = 60; 
                            }
                            if (usageDay >= 60) {
                                usageDay = '預測剩餘天數：60天以上';
                            }else if (usageDay >= 30) {
                                usageDay = '預測剩餘天數：30天-60天';
                            }else {
                                usageDay = '預測剩餘天數：' + usageDay + '天';
                            }
                            waterStatus='昨日水量下降：'+ netPercentageVar + '%';
                            waterStatus_css='color:#da9696';
                        }else {
                            usageDay = '預測剩餘天數：----';
                            netPercentageVar = ((netFlow) / parseFloat(data[reservoirName].baseAvailable)*100).toFixed(2);
                            waterStatus='昨日水量上升：'+ netPercentageVar + '%';
                            waterStatus_css='color:#31a2de';
                        }
                        if(data[reservoirName].percentage>50){
                            background_color = 'rgb(23, 139, 202)';
                            text_color = 'rgb(164, 219, 248)';
                        }else if(data[reservoirName].percentage<=50 && data[reservoirName].percentage >=30){
                            background_color = 'rgb(255 160 119)';
                            text_color = 'rgb(241 196 177)';
                        }else{
                            background_color = 'rgb(255 68 68)';
                            text_color = 'rgb(167 53 53)'
                        }
                        $(".box_each_reservoir").append(
                        '<div class="each_reservoir_flex">'+
                            '<div class="reservoir_info">'+
                                '<p style="text-align: center;">'+data[reservoirName].name+'</p>'+
                                '<div class="box" style="background-color: initial;">'+
                                    '<svg width="250" height="250" style="background-color: initial;">'+
                                        '<path class="wave" d="M0 '+y +
                                                            'Q20 '+y1+',40 '+y+
                                                            'Q60 '+y2+',80 '+y+
                                                            'Q100 '+y1+',120 '+y+
                                                            'Q140 '+y2+',160 '+y+
                                                            'Q180 '+y1+',200 '+y+
                                                            'Q220 '+y2+',240 '+y+
                                                            'Q260 '+y1+',280 '+y+
                                                            'Q300 '+y2+',320 '+y+
                                                            'Q340 '+y1+',360 '+y+
                                                            'V250'+
                                                            'H0 Z" stroke="'+background_color+'" fill="'+background_color+'"/>'+
                                        '<text x="50%" y="50%" fill="'+text_color+'" text-anchor = "middle" dominant-baseline="middle" style="font-size: 45px;font-weight: bolder;">'+percentage+'%</text>'+
                                        '<circle cx="125" cy="125" r="125" style="fill:#4682b400;stroke:'+background_color+';stroke-width:15;" />'+
                                    '</svg>'+
                                '</div>'+
                                '<p>有效蓄水量：'+data[reservoirName].volumn+'萬立方公尺</p>'+
                                '<p style="'+waterStatus_css+'">'+waterStatus+'</p>'+
                                '<p>'+usageDay+'</p>'+
                                '<p>更新時間：'+data[reservoirName].updateAt+'</p>'+
                            '</div>'+
                        '</div>')
                    }
                }
            });
        }
    }
    function news(){
        //token= 5b7edcfe3f7e0f0aa6ca412b93a2296b && e414735f9d17afeedf5f974e2fc07992
        if($("#load_news").length){
            $.ajax({
                type: "POST",
                url: "/frontVue/index.php?action=API&controller=Ajax",
                data: {"dataname":"news_data","url":"https://gnews.io/api/v4/search?q=寵物&lang=zh&max=8&country=tw&token=5b7edcfe3f7e0f0aa6ca412b93a2296b"},
                dataType: "text",
                success: function (response) {
                    let news_data = JSON.parse(response);
                    $("#load_news").remove();
                    for(let i=0;i<8;i++){
                        if(window.location.search.split('controller=')[1] == "Home_m"){
                            $("#new_info").append(`
                            <div class="news_content" style="border:3px solid #6bbc64;border-radius:15px;overflow:hidden;display:flex;flex-direction:column;width:85%;margin:25px">
                                <div class="news_img" style="width:100%">
                                    <a style="display:flex;justify-content:center;width:100%" href="${news_data["articles"][i]["url"]}">
                                        <img style="width:100%" src="${news_data["articles"][i]["image"]}" alt="">
                                    </a>
                                </div>
                                <div style="height:120px;font-size:40px;padding:5px 5px;background-color:#6bbc64;color:white;display:flex;justify-content:center;align-items:center;overflow-y:auto" class="news_title">'
                                ${news_data["articles"][i]["title"]}
                                .'</div>
                                <div style="font-size:32px;margin:10px 5px;height:350px;overflow-y:auto" class="news_content">'.
                                ${news_data["articles"][i]["description"]}
                                .'</div>
                            </div>
                            `)
                        }else{
                            $("#new_info").append(`
                            <div class="news_content" style="border:3px solid #6bbc64;border-radius:15px;overflow:hidden;display:flex;flex-direction:column;width:20%;margin:25px">
                                <div class="news_img" style="height:200px">
                                    <a style="display:flex;justify-content:center;height:100%" href="'${news_data["articles"][i]["url"]}'">
                                        <img style="height:100%" src="${news_data["articles"][i]["image"]}" alt="">
                                    </a>
                                </div>
                                <div style="height:75px;font-size:18px;padding:5px 5px;background-color:#6bbc64;color:white;display:flex;justify-content:center;align-items:center;overflow-y:auto" class="news_title">'
                                ${news_data["articles"][i]["title"]}
                                .'</div>
                                <div style="font-size:16px;margin:10px 5px;height:175px;overflow-y:auto" class="news_content">'.
                                ${news_data["articles"][i]["description"]}
                                .'</div>
                            </div>
                            `);
                        }
                    }
                }
            });

        }
    }
    let park_data_info = new Array;
    function taoyuan_park(){
        if($("#load_park").length){
            $.ajax({
                type: "POST",
                url: "/frontVue/index.php?action=API&controller=Ajax",
                data: {"dataname":"park_data","url":"https://data.tycg.gov.tw/api/v1/rest/datastore/0daad6e6-0632-44f5-bd25-5e1de1e9146f?format=json"},
                dataType: "text",
                success: function (response) {
                    let park_data = JSON.parse(response)["result"]["records"];
                    $("#load_park").remove();
                    $("#box_select_park").append(`<select id="select_park"></select><div id="park_info"></div>`);
                    for(let i=0;i<park_data.length;i++){
                        $("#select_park").append(`<option>${park_data[i]["parkName"]}</option>`);
                    }
                    //select park
                    for(let i =0;i<park_data.length;i++){
                        park_data_info[i] = park_data[i];
                    }
                    change_park(0);
                    $('#select_park').on('change', function() {
                        console.log("sdfdsf");
                        for(let i =0;i<park_data_info.length;i++){
                            if(park_data_info[i]["parkName"] == $(this).val()){
                                change_park(i);
                            }
                        }
                    });
                }
            });
        }
    }
    function change_park(i){
        $("#park_info").empty();
        $("#park_info").append(`
            <p style="background: #6bbc64;padding: 10px;font-size: 25px;color: #fff;border-radius: 10px 10px 0 0;margin:0;text-align: center;">${park_data_info[i]["parkName"]}</p>
            <p>剩餘車位：${park_data_info[i]["surplusSpace"]}</p>
            <hr style="height: 5px;width: 100%;background: linear-gradient(to right,#6bbc6424, #6bbc64,#6bbc6424);border: none;margin: 0">
            <p>${park_data_info[i]["payGuide"]}</p>
            <hr style="height: 5px;width: 100%;background: linear-gradient(to right,#6bbc6424, #6bbc64,#6bbc6424);border: none;margin: 0">
            <p>位置：${park_data_info[i]["address"]}</p>
        `);
        initMap(parseFloat(park_data_info[i]["wgsY"]),parseFloat(park_data_info[i]["wgsX"]));
    }

    function travel(){
        if($("#load_travel").length){
            $.ajax({
                type: "POST",
                url: "/frontVue/index.php?action=API&controller=Ajax",
                data:{"dataname":"travel_data","url":"https://travel.tycg.gov.tw/open-api/zh-tw/Travel/Attraction?regions=&category=&page=1"},
                dataType: "text",
                success: function (response) {
                    $("#load_travel").remove();
                    let travel_data = JSON.parse(response)["Infos"]["Info"];
                    for(let i=0;i<travel_data.length;i++){
                        let Name = travel_data[i]["Name"];//名稱
                        let Ticket = travel_data[i]["Ticket"];//票價
                        let address = "桃園市"+travel_data[i]["District"]+travel_data[i]["Address"];//位置     
                        let phone = travel_data[i]["Phone"];//電話
                        let Open_Time = travel_data[i]["Open-Time"];//開放時間
                        let Description = travel_data[i]["Description"];//描述
                        let Remind = travel_data[i]["Remind"];//提醒
                        let link;
                        if(travel_data[i]["Links"] != null){
                            link = travel_data[i]["Links"]["Link"]["Src"];
                        }else{
                            link="#";
                        }
                        if(window.location.search.split('controller=')[1] == "Home_m"){
                            $("#taoyuan_travel_info").append(`
                            <div id="each_info">
                                <div style="display: flex;">
                                    <div class="attraction_info">
                                        <a href="${link}" target="_blank" style="display: block;width: 100%;font-size: 45px;text-align: center;background: #6dcca9f0;border-radius: 50px;color: white;margin:0;">${Name}</a>
                                        <p>${Ticket}</p>
                                        <p>${phone}</p>
                                        <p>${Open_Time}</p>
                                        <p>${Description}</p>
                                        <p>${Remind}</p>
                                    </div>
                                </div>
                                <div class="each_img"></div>
                            </div>
                            `);
                        }else{
                            $("#taoyuan_travel_info").append(`
                            <div id="each_info">
                                <div style="display: flex;">
                                    <div class="attraction_img">
                                        <img src="${travel_data[i]["Images"]["Image"][0]["Src"]}" alt="">
                                        <div class="info">
                                            <a href="${link}" target="_blank" alt="官網">${Name}</a>
                                        </div>
                                        <div style="font-size: 19px;margin: 5px 0;width: 100%;">${address}</div>
                                    </div>
                                    <div class="attraction_info">
                                        <p style="font-size: 35px;text-align: center;background: #6dcca9f0;border-radius: 50px;color: white;margin:0;">${Name}</p>
                                        <p>${Ticket}</p>
                                        <p>${phone}</p>
                                        <p>${Open_Time}</p>
                                        <p>${Description}</p>
                                        <p>${Remind}</p>
                                    </div>
                                </div>
                                <div class="each_img"></div>
                            </div>
                            `);
                        }
                        for(let j=1;j<travel_data[i]["Images"]["Image"].length;j++){
                            $(".each_img").append(`<img src="${travel_data[i]["Images"]["Image"][j]["Src"]}" alt="">`);
                        }
                    }
                }
            });

        }
    }
    let weather_data;
    let weather_location = 0;
    let exhibition_run = true;//是反有更換API
    function exhibition(){
        if($("#load_exhibition").length){
            $.ajax({
                type: "POST",
                url: "/frontVue/index.php?action=API&controller=Ajax",
                data: {"dataname":"weather_data","url":"https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization=rdec-key-123-45678-011121314"},
                dataType: "text",
                success: function (response) {
                    $("#load_exhibition").remove();
                    $("#box_weather").append(`
                        <select id="weather_location"></select>
                        <select id="weather_time"></select>
                        <div class="weather_info"></div>
                    `);
                    weather_data = JSON.parse(response)["records"]["location"];
                    for(let i=0;i<3;i++){//將時間紀錄
                        let start_time= weather_data[0]["weatherElement"][0]["time"][i]["startTime"].split(" ");
                        let end_time = weather_data[0]["weatherElement"][0]["time"][i]["endTime"].split(" ");
                        $("#weather_time").append(`<option>${start_time[0]+" "+start_time[1]+"~"+end_time[1]}</option>`);
                    }
                    for(let i=0;i<weather_data.length;i++){//將地點名稱紀錄
                        let location_name=weather_data[i]["locationName"];
                        $("#weather_location").append(`<option>${location_name}</option>`);
                    }
                    change_weather(weather_location,0);//一進入的第一筆資料
                    $('#weather_location').on('change', function() {
                        for(let i=0;i<weather_data.length;i++){
                            if(weather_data[i]["locationName"] == $(this).val()){
                                change_weather(i,0);
                                weather_location = i;
                            }
                        } 
                    });
                    $('#weather_time').on('change', function() {
                        for(let i=0;i<3;i++){
                            if(weather_data[0]["weatherElement"][0]["time"][i]["startTime"]==$(this).val().split("~")[0]){
                                change_weather(weather_location,i);
                            }
                        } 
                    });
                    $("#box_exhibition").append(`
                        <div id="exhibition_info">
                            <select id="exhibition_category">
                                <option value="6">展覽</option>
                                <option value="2">戲劇表演</option>
                                <option value="5">獨立樂團表演</option>
                                <option value="4">親子類型藝文</option>
                                <option value="1">音樂劇場表演</option>
                                <option value="11">綜合類型整合活動</option>
                                <option value="7">專題演講及藝文座談會</option>
                            </select>
                            <div id="select_data">
                                <span>開始區間：</span><input id="start_time" type="date">
                                <span>結束區間：</span><input id="end_time" type="date">
                            </div>
                        </div>
                    `);
                    $('#exhibition_category').attr("disabled","disabled");
                    $('#start_time,#end_time').attr("readonly","readonly");
                    load_exhibition_info(6);//第一次進入載入
                    $('#exhibition_category').on('change', function() {
                        if(!exhibition_run){
                            load_exhibition_info($(this).find(":selected").val());
                            $('#exhibition_category').attr("disabled","disabled");
                            $('#start_time,#end_time').attr("readonly","readonly");
                        }
                    });
                    $('#start_time,#end_time').on('change', function() {//過濾時間
                        if($('#start_time').val() != "" && $('#end_time').val() != "" && !exhibition_run){
                            if(Date.parse($('#start_time').val())<Date.parse($('#end_time').val())){
                                load_exhibition_info($("#exhibition_category").find(":selected").val());
                                exhibition_run = true;
                                $('#start_time,#end_time').attr("readonly","readonly");
                            }else{
                                alert("開始區間需小於結束區間");
                            }
                        }
                    });
                }
            });
        }

    }
    function change_weather(location,time){
        $(".weather_info").empty();
        let weather_info = weather_data[location]["weatherElement"];
        $(".weather_info").append(`
            <p>天氣：${weather_info[0]["time"][time]["parameter"]["parameterName"]}</p>
            <p>溫度：${weather_info[2]["time"][time]["parameter"]["parameterName"]+"度~"+weather_info[4]["time"][time]["parameter"]["parameterName"]}度</p>
            <p>舒適度：${weather_info[3]["time"][time]["parameter"]["parameterName"]}</p>
            <p>降雨機率：${weather_info[1]["time"][time]["parameter"]["parameterName"]}%</p>
        `);
    }
    function load_exhibition_info(category){
        let interval_start_time = $('#start_time').val();
        let interval_end_time = $('#end_time').val();
        $(".each_exhibition_info").remove();
        $("#exhibition_info").append(`
            <div id="load_exhibition" style="text-align: center;width: 100%;font-size: 40px;">
                <span>加載中，請稍後...</span>
            </div>
        `);
        $.ajax({
            type: "Post",
            url: "/frontVue/index.php?action=API&controller=Ajax",
            data: {"dataname":"weather_data","url":"https://cloud.culture.tw/frontsite/trans/SearchShowAction.do?method=doFindTypeJ&category="+category},
            dataType: "text",
            success: function (response) {
                $("#load_exhibition").remove();
                let exhibition_info = JSON.parse(response);
                for(let i=0;i<exhibition_info.length;i++){
                    let title = exhibition_info[i]["title"];
                    let start_time = exhibition_info[i]["startDate"];
                    let end_time = exhibition_info[i]["endDate"];
                    let link = exhibition_info[i]["sourceWebPromote"];
                    let location = exhibition_info[i]["showInfo"][0]["location"];
                    let price = exhibition_info[i]["showInfo"][0]["price"];
                    if(price == ""){
                        price = "免費";
                    }
                    if(location == ""){
                        location = "尚未提供";
                    }
                    if(interval_start_time != "" && interval_end_time != ""){//有區間才過濾
                        if(Date.parse(interval_start_time)-28800000 <= Date.parse(start_time) && Date.parse(interval_end_time) >= Date.parse(end_time)){
                            $("#exhibition_info").append(`
                                <div class="each_exhibition_info">         
                                    <a href="${link}">${title}</a>
                                    <p>位置：${location}</p>
                                    <p>價格：${price}</p>
                                    <p>開始時間：${start_time}</p>
                                    <p>結束時間：${end_time}</p>
                                    <p>介紹：${title}</p>
                                </div>
                            `);
                        }
                    }else{
                        $("#exhibition_info").append(`
                            <div class="each_exhibition_info">         
                                <a href="${link}">${title}</a>
                                <p>位置：${location}</p>
                                <p>價格：${price}</p>
                                <p>開始時間：${start_time}</p>
                                <p>結束時間：${end_time}</p>
                                <p>介紹：${title}</p>
                            </div>
                        `);
                    }
                }
                if($(".each_exhibition_info").length == 0){
                    $("#exhibition_info").append(`
                        <div class="each_exhibition_info">         
                            <p>無活動，敬請期待</p>
                        </div>
                    `);
                }
                exhibition_run = false;
                $('#start_time,#end_time').removeAttr("readonly");
                $('#exhibition_category').removeAttr("disabled");
            }
        });
    }
});

