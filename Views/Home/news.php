<?php
use Bang\Lib\Bundle;
Bundle::Css('test_css', array(
    'Content/css/header_footer.css',
    'Content/css/news.css'
));
?>
<style>
.show_btn{
    color:#fff;
    background-color:#6bbc64;
}
.not_show_btn{
    color:#6bbc64;
    background-color:#fff;
}
</style>
<div style="transform: rotate(-20deg);position: fixed;top: 50px;z-index: 5;left: 10px;">
    <img src="Content/img/title.png" alt="" style="width: 250px;">
    <span style="position: absolute;display: block;top: 50%;left: 50%;font-size: 45px;width: 250px;transform: translate(-50%, -50%);text-align: center;color: #fff;letter-spacing: 5px;">台灣資訊</span>
</div>
<div id="vue">
    <div class="box_news">
        <div class="box_change_news">
            <button @click="ShowBox('earthquake')"      class="btn_earthquake"      :class="control_box_show.earthquake_show?'show_btn':'not_show_btn'">地震</button>
            <button @click="ShowBox('reservoir')"       class="btn_reservoir"       :class="control_box_show.reservoir_show?'show_btn':'not_show_btn'">水庫</button>
            <button @click="ShowBox('news')"            class="btn_news"            :class="control_box_show.news_show?'show_btn':'not_show_btn'">新聞</button>
            <button @click="ShowBox('taoyuan_parking')" class="btn_taoyuan_parking" :class="control_box_show.taoyuan_parking_show?'show_btn':'not_show_btn'">桃園停車場</button>
            <button @click="ShowBox('taoyuan_travel')"  class="btn_taoyuan_travel"  :class="control_box_show.taoyuan_travel_show?'show_btn':'not_show_btn'">桃園景點</button>
            <button @click="ShowBox('weather')"         class="btn_exhibition"      :class="control_box_show.weather_show?'show_btn':'not_show_btn'">藝文活動</button>
        </div>
        <!-- 地震 -->
        <div v-if="control_box_show.earthquake_show" id="box_taiwan_earthquake" style="display:block">
            <div id="earthquake_title">
                {{earthquake_data.reportContent}}
            </div>
            <div id="earthquake_area_all">
                <div id="earthquake_area">
                    <div id="earthquake_pic">
                        <img id="earthquake_pic_img" :src="earthquake_data.reportImageURI">
                    </div>
                </div>
                <div id="earthquake_info">
                    <div id="station_list" v-if="!earthquake_area.show_area">請先選擇地區</div>

                    <div v-else>
                        <div id="station_list">{{ earthquake_area.earthquake_area_data.areaDesc }}觀測站列表</div>
                        <div id="earthquake_station">
                            <div class="each_station" v-for="(item,index) in earthquake_area.earthquake_area_data.eqStation" @click="ShowStationInof(index)">{{item.stationName}}</div>
                        </div>
                        <div id="earthquake_each_station" v-if="earthquake_area.show_area_info">
                            <div v-if="earthquake_area.eqStation_info.waveImageURI">
                                <div class="earth_text">地震規模：{{earthquake_area.eqStation_info.stationIntensity.value}} 級</div>
                                <div class="earth_text">震源深度：{{earthquake_area.eqStation_info.distance.value}} km</div> 
                                <div class="earth_text">方位角：{{earthquake_area.eqStation_info.azimuth.value}} 度</div>
                                <div class="earth_text">波圖： <img id="wave_img" :src="earthquake_area.eqStation_info.waveImageURI"></div>
                            </div>
                            <div v-else>
                                <div class="earth_text">地震規模：{{earthquake_area.eqStation_info.stationIntensity.value}} 級</div>
                                <div class="earth_text">震源深度：{{earthquake_area.eqStation_info.distance.value}} km</div> 
                                <div class="earth_text">方位角：{{earthquake_area.eqStation_info.azimuth.value}} 度</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div id="earthquake_area_select">
                <div id="earthquake_each_area_title"></div>
                <div id="earthquake_each_area_content" v-if="API_status.earthquake_API" >
                    <div v-for="(item,index) in earthquake_data.intensity.shakingArea" class="earthquake_each_area" @click="ShowEachArea(index)" :data-area-set="index">
                        <div class="earthquake_each_location">{{item.areaDesc}}</div>
                        <div class="earthquake_each_value">
                            {{item.areaIntensity.value}}級
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 水庫 -->
        <div v-if="control_box_show.reservoir_show" id="box_taiwant_reservoir" style="width: 90%;margin: 0 auto;">
            <div class="box_each_reservoir">
                <div v-if="!API_status.reservoir_API" id="load_reservoir" style="text-align: center;width: 100%;font-size: 40px;">
                    <span>加載中，請稍後...</span> 
                </div>
                <div v-else class="each_reservoir_flex"  v-for="(item,indxe) in reservoir_data">
                    <div class="reservoir_info">
                        <p style="text-align: center;"> {{item.reservoirName}} </p>
                        <div class="box" style="background-color: initial;">
                            <svg width="250" height="250" style="background-color: initial;">
                                <path class="wave" :d="item.d" :stroke="item.background_color" :fill="item.background_color"/>
                                <text x="50%" y="50%" :fill="item.text_color" text-anchor = "middle" dominant-baseline="middle" style="font-size: 45px;font-weight: bolder;">{{item.percentage}}%</text>
                                <circle cx="125" cy="125" r="125" style="fill:#4682b400;stroke-width:15;" :stroke="item.background_color"/>
                            </svg>
                        </div>
                        <p>有效蓄水量：{{item.volumn}}萬立方公尺</p>
                        <p :style="item.waterStatus_css">{{item.waterStatus}}</p>
                        <p>{{item.usageDay}}</p>
                        <p>更新時間：{{item.updateAt}}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- 新聞 -->
        <div v-if="control_box_show.news_show" id="box_taiwan_news" style="width: 90%;margin: 0 auto;">
            <div id="new_info" style="display:flex;flex-wrap:wrap;justify-content:center">
                <div v-if="!API_status.news_API" id="load_news" style="text-align: center;width: 100%;font-size: 40px;">
                    <span>加載中，請稍後...</span> 
                </div>
                <div v-else v-for="(item,index) in news_data" class="news_content" style="border:3px solid #6bbc64;border-radius:15px;overflow:hidden;display:flex;flex-direction:column;width:20%;margin:25px">
                    <div class="news_img" style="height:200px">
                        <a style="display:flex;justify-content:center;height:100%" :href="item.url">
                            <img style="height:100%" :src="item.image" alt="">
                        </a>
                    </div>
                    <div style="height:75px;font-size:18px;padding:5px 5px;background-color:#6bbc64;color:white;display:flex;justify-content:center;align-items:center;overflow-y:auto" class="news_title">{{item.title}}</div>
                    <div style="font-size:16px;margin:10px 5px;height:175px;overflow-y:auto" class="news_content">{{item.description}}</div>
                </div>
            </div>
        </div>
        <!-- 桃園停車場 -->
        <div v-show="control_box_show.taoyuan_parking_show" id="box_taoyuan_parking">
            <div v-if="!API_status.taoyuan_parking_API" id="load_park" style="text-align: center;width: 100%;font-size: 40px;">
                <span>加載中，請稍後...</span> 
            </div>
            <div v-if="API_status.taoyuan_parking_API" class="flex">
                <div id="box_select_park">
                    <select id="select_park" @change="ChangePark">
                        <option v-for="(item,index) in taoyuan_parking_data.park_name" :value="index">{{item}}</option>
                    </select>
                    <div id="park_info">
                        <p style="background: #6bbc64;padding: 10px;font-size: 25px;color: #fff;border-radius: 10px 10px 0 0;margin:0;text-align: center;">{{taoyuan_parking_data.one_park_info.parkName}}</p>
                        <p>剩餘車位：{{taoyuan_parking_data.one_park_info.surplusSpace}}</p>
                        <hr style="height: 5px;width: 100%;background: linear-gradient(to right,#6bbc6424, #6bbc64,#6bbc6424);border: none;margin: 0">
                        <p>{{taoyuan_parking_data.one_park_info.payGuide}}</p>
                        <hr style="height: 5px;width: 100%;background: linear-gradient(to right,#6bbc6424, #6bbc64,#6bbc6424);border: none;margin: 0">
                        <p>位置：{{taoyuan_parking_data.one_park_info.address}}</p>
                    </div>
                </div>
                <div id="map"></div>
            </div>
        </div>
        <!-- 桃園觀光景點 -->
        <div v-if="control_box_show.taoyuan_travel_show" id="box_taoyuan_travel">
            <div id="taoyuan_travel_info">
                <div v-if="!API_status.taoyuan_travel_API" id="load_travel" style="text-align: center;width: 100%;font-size: 40px;">
                    <span>加載中，請稍後...</span>
                </div>
                <div v-else id="each_info" v-for="(item,index) in taoyuan_travel_data.travel_info">
                    <div style="display: flex;">
                        <div class="attraction_img">
                            <img :src="item.Images.Image[0].Src" alt="">
                            <div class="info">
                                <a :href="item.Links ? item.Links.Link.Src : '#'" target="_blank" alt="官網">{{item.Name}}</a>
                            </div>
                            <div style="font-size: 19px;margin: 5px 0;width: 100%;">桃園市{{item.District}}{{item.Address}}</div>
                        </div>
                        <div class="attraction_info">
                            <p style="font-size: 35px;text-align: center;background: #6dcca9f0;border-radius: 50px;color: white;margin:0;">{{item.Name}}</p>
                            <p>{{item.Ticket}}</p>
                            <p>{{item.phone}}</p>
                            <p>{{taoyuan_travel_data.open_time[index]}}</p>
                            <p>{{item.Description}}</p>
                            <p>{{item.Remind}}</p>
                        </div>
                    </div>
                    <div class="each_img">
                        <img v-for="(img_item,img_index) in taoyuan_travel_data.travel_img[index]" :src="img_item.Src" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- 展覽資訊 -->
        <div v-if="control_box_show.weather_show" id="box_exhibition">
            <div id="box_weather">
                <div v-if="!API_status.weather_API" id="load_exhibition" style="text-align: center;width: 100%;font-size: 40px;">
                    <span>加載中，請稍後...</span>
                </div>
                <div v-else>
                    <select @change="ChangeWeatherLocation" id="weather_location">
                        <option :value="index" v-for="(item,index) in weather_data.weather_location">{{item}}</option>
                    </select>
                    <select @change="ChangeWeatherTime" id="weather_time">
                        <option :value="index" v-for="(item,index) in weather_data.weather_time">{{item}}</option>
                    </select>
                    <div class="weather_info" >
                        <p>天氣：{{weather_data.weather_info.weather_status}}</p>
                        <p>溫度：{{weather_data.weather_info.weather_temperature}}</p>
                        <p>舒適度：{{weather_data.weather_info.weather_Comfort}}</p>
                        <p>降雨機率：{{weather_data.weather_info.weather_rain_Chance}}%</p>
                    </div>
                </div>
            </div>
            <div v-if="API_status.weather_API" id="exhibition_info">
                <select v-model="exhibition_data.select_exhibition_location" id="exhibition_location">
                    <option>全部地區</option>
                    <option v-for="(item,index) in exhibition_data.exhibition_location">{{item}}</option>
                </select>
                <select id="exhibition_category" @change="ChangeExhibitionCategory">
                    <option value="6">展覽</option>
                    <option value="2">戲劇表演</option>
                    <option value="5">獨立樂團表演</option>
                    <option value="4">親子類型藝文</option>
                    <option value="1">音樂劇場表演</option>
                    <option value="11">綜合類型整合活動</option>
                    <option value="7">專題演講及藝文座談會</option>
                </select>
                <div id="select_data">
                    <span>開始區間：</span><input v-model="exhibition_data.interval_start_time" id="start_time" type="date">
                    <span>結束區間：</span><input v-model="exhibition_data.interval_end_time" id="end_time" type="date">
                </div>
                <div v-if="!API_status.exhibition_API" id="load_exhibition" style="text-align: center;width: 100%;font-size: 40px;">
                    <span>加載中，請稍後...</span>
                </div>
                <div v-else-if="ExhibitionData == ''" class="each_exhibition_info">         
                    <p>無活動，敬請期待</p>
                </div>
                <div v-else v-for="(item,index) in ExhibitionData" class="each_exhibition_info">         
                    <a :href="item.sourceWebPromote">{{item.title}}</a>
                    <p>位置：{{item.showInfo[0]["location"] ?　item.showInfo[0]["location"]:"尚未提供"}}</p>
                    <p>價格：{{item.showInfo[0]["price"] ? item.showInfo[0]["price"]:"免費"}}</p>
                    <p>開始時間：{{item.startDate}}</p>
                    <p>結束時間：{{item.endDate}}</p>
                    <p>詳細介紹：{{item.descriptionFilterHtml? "":"無介紹資訊"}}</p>
                    <p>{{item.descriptionFilterHtml}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyCcOSA313Zy2UoHYtzvIfoPmipbf9Dahew"></script> 

<?php
    Bundle::Js('test_js', array(
        'Content/js/liquidFillGauge.js',
    ));
?>
<script>
    let vue = new Vue({
        el:"#vue",
        data:function(){
            return{
                control_box_show:{
                    earthquake_show: true,
                    reservoir_show:false,
                    news_show:false,
                    taoyuan_parking_show:false,
                    taoyuan_travel_show:false,
                    weather_show:false
                },
                API_status:{
                    earthquake_API: false,
                    reservoir_API:false,
                    news_API:false,
                    taoyuan_parking_API:false,
                    taoyuan_travel_API:false,
                    weather_API:false,
                    exhibition_API:false
                },
                earthquake_data:"",
                earthquake_area:{
                    show_area:false,
                    show_area_info:false,
                    area_set:"",
                    earthquake_area_data:"",
                    station_set:"",
                    eqStation:"",
                    eqStation_info:"",
                },
                reservoir_data:[],
                news_data:"",
                taoyuan_parking_data:{
                    all_park_info:"",
                    park_name:[],
                    one_park_info:""
                },
                taoyuan_travel_data:{
                    travel_info:"",
                    open_time:[],
                    travel_img:[]
                },
                weather_data:{
                    weather_data:"",
                    weather_location:[],
                    weather_time:[],
                    weather_info:"",//渲染選中地區及時間的天氣資訊
                    select_time_value:"0",//選中的時間的索引
                    select_location_value:"0"//選中的地區的索引
                },
                exhibition_data:{
                    exhibition_data:"",
                    interval_start_time:"",
                    interval_end_time:"",
                    exhibition_location:[],
                    select_exhibition_location:"全部地區"//選中的地區名稱
                }
            }
        },
        computed:{
            ExhibitionData:function(){
                let v_this = this;
                let filter_exhibition_data = [];
                exhibition_data = v_this.exhibition_data.exhibition_data;
                interval_start_time = v_this.exhibition_data.interval_start_time;
                interval_end_time = v_this.exhibition_data.interval_end_time;
                select_exhibition_location = v_this.exhibition_data.select_exhibition_location;
                if(select_exhibition_location != "全部地區"){
                    for(let key in exhibition_data){
                        if(exhibition_data[key].showInfo[0]["location"].search(select_exhibition_location) != -1){
                            if(interval_start_time && interval_end_time){
                                    start_time = exhibition_data[key].startDate
                                    end_time = exhibition_data[key].endDate
                                    if(Date.parse(interval_start_time)-28800000 <= Date.parse(start_time) && Date.parse(interval_end_time) >= Date.parse(end_time)){
                                        filter_exhibition_data.push(exhibition_data[key]);
                                    }   
                            }else{
                                filter_exhibition_data.push(exhibition_data[key]);
                            }
                        }
                    }
                    return filter_exhibition_data;
                }else{
                    if(interval_start_time && interval_end_time){
                        for(let key in exhibition_data){
                            start_time = exhibition_data[key].startDate
                            end_time = exhibition_data[key].endDate
                            if(Date.parse(interval_start_time)-28800000 <= Date.parse(start_time) && Date.parse(interval_end_time) >= Date.parse(end_time)){
                                filter_exhibition_data.push(exhibition_data[key]);
                            }
                        }
                        return filter_exhibition_data;
                    }
                    return exhibition_data;
                }
            }
        },
        created(){
            this.EarthquakeDataShow();
        },
        methods: {
            ShowBox:function(show_box_name){
                API_name = show_box_name+"_API"
                show_box_name = show_box_name+"_show";
                for(let i in this.control_box_show) {
                    if(i != show_box_name){
                        this.control_box_show[i] = false;
                    }else{
                        this.control_box_show[i] = true;
                        if(!this.API_status[API_name]){
                            switch (API_name) {
                            case 'earthquake_API':
                                this.EarthquakeDataShow();
                                break;
                            case 'reservoir_API':
                                this.ReservoirDataShow();
                                break;
                            case 'news_API':
                                this.NewsDataShow();
                                break;
                            case 'taoyuan_parking_API':
                                this.TaoyuanParkingDataShow();
                                break;
                            case 'taoyuan_travel_API':
                                this.TaoyuanTravelDataShow();
                                break;
                            case 'weather_API':
                                this.WeatherDataShow();
                                break;
                            default:
                                console.log(`${API_name} is no find.`);
                            }
                        }
                    }
                }
            },
            EarthquakeDataShow:function(){
                let v_this = this;
                v_this.EarthquakeDataShowAjax(function(earthquake_data){
                    v_this.API_status.earthquake_API = true;
                    v_this.earthquake_data = earthquake_data["records"]["earthquake"][0];
                })
            },
            ShowEachArea:function(area_set){
                let v_this = this;
                v_this.area_set = area_set;
                v_this.earthquake_area.earthquake_area_data = v_this.earthquake_data.intensity.shakingArea[area_set];
                v_this.earthquake_area.eqStation = v_this.earthquake_data.intensity.shakingArea[area_set].eqStation;
                v_this.earthquake_area.show_area = true;
            },
            ShowStationInof:function(station_set){
                let v_this = this;
                v_this.earthquake_area.eqStation_info = v_this.earthquake_area.eqStation[station_set];
                v_this.earthquake_area.show_area_info = true;
            },
            ReservoirDataShow:function(){
                let v_this = this;      
                v_this.ReservoirDataShowAjax(function(reservoir_data){
                    reservoir_data = reservoir_data[0];
                    for (let reservoirName in reservoir_data){
                        let percentage = parseFloat(reservoir_data[reservoirName].percentage).toFixed(1);
                        let netFlow = -parseFloat(reservoir_data[reservoirName].daliyNetflow).toFixed(1);
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
                            netPercentageVar = ((-netFlow) / parseFloat(reservoir_data[reservoirName].baseAvailable)*100).toFixed(2);
                            usageDay = Math.round(percentage/netPercentageVar);
                            if (reservoir_data[reservoirName].percentage > 80 && netPercentageVar > 2) {
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
                            netPercentageVar = ((netFlow) / parseFloat(reservoir_data[reservoirName].baseAvailable)*100).toFixed(2);
                            waterStatus='昨日水量上升：'+ netPercentageVar + '%';
                            waterStatus_css='color:#31a2de';
                        }
                        if(reservoir_data[reservoirName].percentage>50){
                            background_color = 'rgb(23, 139, 202)';
                            text_color = 'rgb(164, 219, 248)';
                        }else if(reservoir_data[reservoirName].percentage<=50 && reservoir_data[reservoirName].percentage >=30){
                            background_color = 'rgb(255 160 119)';
                            text_color = 'rgb(241 196 177)';
                        }else{
                            background_color = 'rgb(255 68 68)';
                            text_color = 'rgb(167 53 53)'
                        }
                        //svg用
                        d='M0 '+y +
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
                        'H0 Z'
                        v_this.reservoir_data.push({ reservoirName: reservoirName,d:d,background_color:background_color,text_color:text_color,percentage:percentage,volumn:reservoir_data[reservoirName].volumn,waterStatus_css:waterStatus_css,waterStatus:waterStatus,usageDay:usageDay,updateAt:reservoir_data[reservoirName].updateAt});
                    }
                    v_this.API_status.reservoir_API = true;
                })
            },
            NewsDataShow:function(){
                let v_this = this;
                v_this.NewsDataShowShowAjax(function(news_data){
                    v_this.news_data = JSON.parse(news_data)["articles"];
                    v_this.API_status.news_API = true;
                })
            },
            TaoyuanParkingDataShow:function(){
                let v_this = this;
                v_this.TaoyuanParkingDataShowAjax(function(park_data){
                    park_data = JSON.parse(park_data)["result"]["records"];
                    v_this.taoyuan_parking_data.all_park_info = park_data;
                    for(let index in park_data){
                        v_this.taoyuan_parking_data.park_name.push(park_data[index]["parkName"]);
                    }
                    v_this.API_status.taoyuan_parking_API = true;
                    v_this.ChangePark(0);
                })
            },
            ChangePark:function(event){
                let value = 0;
                let wgsY = 24.9934;
                let wgsX = 121.3011;
                if(event!=0){
                    value = event.target.value;
                }
                let v_this = this;
                v_this.taoyuan_parking_data.one_park_info = v_this.taoyuan_parking_data.all_park_info[value];
                wgsY = v_this.taoyuan_parking_data.one_park_info.wgsY
                wgsX = v_this.taoyuan_parking_data.one_park_info.wgsX
                setTimeout(function(){
                    v_this.initMap(parseFloat(wgsY),parseFloat(wgsX))
                },1)
                //v_this.initMap(parseFloat(wgsY),parseFloat(wgsX))
            },
            initMap:function(y,x){
                console.log("ger")
                map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 17,
                    center: {lat:  y, lng: x},
                    mapTypeId: "terrain",
                });
                marker = new google.maps.Marker({
                    position : { lat: y, lng: x},//positon 位置
                    map:map, //標示地圖
                })
            },
            TaoyuanTravelDataShow:function(){
                let v_this = this;
                v_this.TaoyuanTravelDataShowAjax(function(taoyuan_travel_data){
                    v_this.API_status.taoyuan_travel_API = true;
                    v_this.taoyuan_travel_data.travel_info = JSON.parse(taoyuan_travel_data)["Infos"]["Info"];
                    for(let index in v_this.taoyuan_travel_data.travel_info){
                        v_this.taoyuan_travel_data.open_time.push(v_this.taoyuan_travel_data.travel_info[index]["Open-Time"]);
                        v_this.taoyuan_travel_data.travel_img.push(v_this.taoyuan_travel_data.travel_info[index]["Images"]["Image"]);
                    }
                })
            },
            WeatherDataShow:function(){
                let v_this = this;
                v_this.WeatherDataShowAjax(function(weather_data){
                    weather_data = v_this.weather_data.weather_data = JSON.parse(weather_data)["records"]["location"];
                    for(let value in weather_data[0]["weatherElement"][0]["time"]){
                        let start_time= weather_data[0]["weatherElement"][0]["time"][value]["startTime"].split(" ");
                        let end_time = weather_data[0]["weatherElement"][0]["time"][value]["endTime"].split(" ");
                        v_this.weather_data.weather_time.push(start_time[0]+" "+start_time[1]+"~"+end_time[1]);
                    }
                    for(let index in weather_data){
                        v_this.weather_data.weather_location.push(weather_data[index]["locationName"]);
                        v_this.exhibition_data.exhibition_location.push(weather_data[index]["locationName"]);
                    }
                    v_this.weather_data.select_time = v_this.weather_data.weather_time[0];
                    v_this.ChangeWeatherInfo(0,0);
                    v_this.API_status.weather_API = true;
                    v_this.ExhibitionDataShow(6);
                })
            },
            ChangeWeatherLocation:function(event){
                let v_this = this;
                let location_value = v_this.weather_data.select_location_value = event.target.value;
                let time = v_this.weather_data.select_time_value;
                v_this.ChangeWeatherInfo(location_value,time);
            },
            ChangeWeatherTime:function(event){
                let v_this = this;
                let location_value = v_this.weather_data.select_location_value;
                let time = v_this.weather_data.select_time_value = event.target.value;
                v_this.ChangeWeatherInfo(location_value,time);
            },
            ChangeWeatherInfo(location_value,time){
                let v_this = this;
                let weather_info = v_this.weather_data.weather_data[location_value]["weatherElement"]
                v_this.weather_data.weather_info={
                    weather_status:weather_info[0]["time"][time]["parameter"]["parameterName"],
                    weather_temperature:weather_info[2]["time"][time]["parameter"]["parameterName"]+"度~"+weather_info[4]["time"][time]["parameter"]["parameterName"],
                    weather_Comfort:weather_info[3]["time"][time]["parameter"]["parameterName"],
                    weather_rain_Chance:weather_info[1]["time"][time]["parameter"]["parameterName"]
                }
            },
            ExhibitionDataShow:function(category){//第一次載入
                let v_this = this;
                $('#exhibition_category,#exhibition_location').attr("disabled","disabled");
                $('#start_time,#end_time').attr("readonly","readonly");
                v_this.ExhibitionDataShowAjax(category,function(exhibition_data){
                    exhibition_data = JSON.parse(exhibition_data);
                    v_this.exhibition_data.exhibition_data = exhibition_data;
                    $('#start_time,#end_time').removeAttr("readonly");
                    $('#exhibition_category,#exhibition_location').removeAttr("disabled");
                    v_this.API_status.exhibition_API = true;
                })
            },
            ChangeExhibitionCategory:function(){//變動類別
                let v_this = this;
                let category = event.target.value;
                v_this.API_status.exhibition_API = false;
                $('#exhibition_category,#exhibition_location').attr("disabled","disabled");
                $('#start_time,#end_time').attr("readonly","readonly");
                v_this.ExhibitionDataShowAjax(category,function(exhibition_data){
                    exhibition_data = JSON.parse(exhibition_data);
                    v_this.exhibition_data.exhibition_data = exhibition_data;
                    $('#start_time,#end_time').removeAttr("readonly");
                    $('#exhibition_category,#exhibition_location').removeAttr("disabled");
                    v_this.API_status.exhibition_API = true;
                })
            },
            //-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----
            //-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----
            //-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----
            //-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----
            //-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----
            EarthquakeDataShowAjax:function(cb){
                this.callAjax("GET","https://opendata.cwb.gov.tw/api/v1/rest/datastore/E-A0015-001?Authorization=rdec-key-123-45678-011121314",{},"JSON",cb);
            },
            ReservoirDataShowAjax:function(cb){
                this.callAjax("GET","https://www.taiwanstat.com/waters/latest",{},"JSON",cb);
            },
            NewsDataShowShowAjax:function(cb){
                this.callAjax("POST","<?php echo Bang\Lib\Url::Action('API','Ajax')?>",{"dataname":"news_data","url":"https://gnews.io/api/v4/search?q=寵物&lang=zh&max=8&country=tw&token=5b7edcfe3f7e0f0aa6ca412b93a2296b"},"text",cb);
            },
            TaoyuanParkingDataShowAjax:function(cb){
                this.callAjax("POST","<?php echo Bang\Lib\Url::Action('API','Ajax')?>",{"dataname":"park_data","url":"https://data.tycg.gov.tw/api/v1/rest/datastore/0daad6e6-0632-44f5-bd25-5e1de1e9146f?format=json"},"text",cb);
            },
            TaoyuanTravelDataShowAjax:function(cb){
                this.callAjax("POST","<?php echo Bang\Lib\Url::Action('API','Ajax')?>",{"dataname":"travel_data","url":"https://travel.tycg.gov.tw/open-api/zh-tw/Travel/Attraction?regions=&category=&page=1"},"text",cb);
            },
            WeatherDataShowAjax:function(cb){
                this.callAjax("POST","<?php echo Bang\Lib\Url::Action('API','Ajax')?>",{"dataname":"weather_data","url":"https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization=rdec-key-123-45678-011121314"},"text",cb);
            },
            ExhibitionDataShowAjax:function(category,cb){
                this.callAjax("POST","<?php echo Bang\Lib\Url::Action('API','Ajax')?>",{"dataname":"weather_data","url":"https://cloud.culture.tw/frontsite/trans/SearchShowAction.do?method=doFindTypeJ&category="+category},"text",cb);
            },
            callAjax:function(method,url,data,dataType,cb){
                $.ajax({
                    type: method,
                    url: url,
                    data: data,
                    dataType: dataType,
                    success: function (response) {
                        cb(response);
                    },error:function(err){
                        alert("something Error!");
                    }
                });
            }
        }
    })
</script>