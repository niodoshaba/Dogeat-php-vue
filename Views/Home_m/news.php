<?php
use Bang\Lib\Bundle;
?>
<div class="box_news">
    <div class="box_change_news">
        <button class="btn_earthquake" style="color: #fff;background-color: #6bbc64;">地震</button>
        <button class="btn_reservoir">水庫</button>
        <button class="btn_news">新聞</button>
        <button class="btn_taoyuan_parking">桃園停車場</button>
        <button class="btn_taoyuan_travel">桃園景點</button>
        <button class="btn_exhibition">藝文活動</button>
    </div>
    <!-- 地震 -->
    <div id="box_taiwan_earthquake" style="display:block">
        <div id="earthquake_title"></div>
        <div id="earthquake_area_all">
            <div id="earthquake_area">
                <div id="earthquake_pic">
                    <img id="earthquake_pic_img" src="" alt="">
                </div>
            </div>
            <div id="earthquake_info">
            <div id="station_list">請先選擇地區</div>
                <div id="earthquake_station">
                    <div class="each_station"></div>
                </div>
                <div id="earthquake_each_station"></div>
            </div>
        </div>
        <div id="earthquake_area_select">
            <div id="earthquake_each_area_content"></div>
        </div>
    </div>
    <!-- 水庫 -->
    <div id="box_taiwant_reservoir" style="display:none">
        <div class="box_each_reservoir">
             <div id="load_reservoir" style="text-align: center;width: 100%;font-size: 40px;">
                <span>加載中，請稍後...</span> 
            </div>
        </div>
    </div>
    <!-- 新聞 -->
    <div id="box_taiwan_news" style="display:none;width: 90%;margin: 0 auto;">
        <div id="new_info" style="display:flex;flex-wrap:wrap;justify-content:center">
            <div id="load_news" style="text-align: center;width: 100%;font-size: 40px;">
                <span>加載中，請稍後...</span> 
            </div>
        </div>
    </div>
    <!-- 桃園停車場 -->
    <div id="box_taoyuan_parking">
        <div class="flex">
            <div id="box_select_park">
                <div id="load_park" style="text-align: center;width: 100%;font-size: 40px;">
                    <span>加載中，請稍後...</span> 
                </div>
            </div>
            <div id="map"></div>
        </div>
    </div>
    <!-- 桃園觀光景點 -->
    <div id="box_taoyuan_travel">
        <div id="taoyuan_travel_info">
            <div id="load_travel" style="text-align: center;width: 100%;font-size: 40px;">
                <span>加載中，請稍後...</span>
            </div>
        </div>
    </div>
    <!-- 展覽資訊 -->
    <div id="box_exhibition">
        <div id="box_weather">
            <div id="load_exhibition" style="text-align: center;width: 100%;font-size: 40px;">
                <span>加載中，請稍後...</span>
            </div>
        </div>
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyCcOSA313Zy2UoHYtzvIfoPmipbf9Dahew"></script> 
<script>
    let map;
    let marker;
    function initMap(x,y){
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 19,
        center: {lat:  x, lng: y},//y,x
        mapTypeId: "terrain",
    });
    marker = new google.maps.Marker({
        position : { lat: x, lng: y},//positon 位置
        map:map, //標示地圖
    })
    }
    initMap(24.9934,121.3011);
</script>
<?php
    Bundle::Js('test_js', array(
        'Content/js/liquidFillGauge.js',
        'Content/js/taiwant_API.js'
    ));
?>