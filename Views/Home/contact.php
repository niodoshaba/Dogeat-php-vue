<?php
use Bang\Lib\Bundle;
Bundle::Css('test_css', array(
    'Content/css/header_footer.css',
));
?>
<div style="transform: rotate(-20deg);position: fixed;top: 50px;z-index: 5;left: 10px;">
    <img src="Content/img/title.png" alt="" style="width: 250px;">
    <span style="position: absolute;display: block;top: 50%;left: 50%;font-size: 45px;width: 250px;transform: translate(-50%, -50%);text-align: center;color: #fff;letter-spacing: 5px;">聯絡我們</span>
</div>

<div style="margin:100px;text-align:center;">
    <div class="mapdiv">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3615.0027469618967!2d121.56235021537874!3d25.033980844445335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442abb6da9c9e1f%3A0x1206bcf082fd10a6!2zMTEw5Y-w5YyX5biC5L-h576p5Y2A5L-h576p6Lev5LqU5q61N-iZnw!5e0!3m2!1szh-TW!2stw!4v1602839173599!5m2!1szh-TW!2stw"  frameborder="0" style="border:0;height: 300px;width: 700px;" allowfullscreen="" aria-hidden="true" tabindex="0" id="map"></iframe>
        <hr style="width: 60%;">
        <div class="content2" style="margin:15px;font-size: 25px;">
            <div>
            <span class="t2">地址：</span>
            <span class="t3">桃園市大馬路好棒棒街</span>
            </div>
            <div>
            <span class="t2">連絡電話：</span>
            <span class="t3">0988-588-1788</span>
            </div>
            <div>
            <span class="t2">營業時間：</span>
            <span class="t3">9:00~17:00</span>
            </div>
        </div>
        <hr style="width: 60%;">
    </div>
</div>



