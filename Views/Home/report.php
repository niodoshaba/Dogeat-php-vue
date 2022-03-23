
    <?php 
use Bang\Lib\Bundle;
Bundle::Css('test_js', array(
    'Content/css/report.css',
));
 ?>
<div style="transform: rotate(-20deg);position: fixed;top: 50px;z-index: 5;left: 10px;">
    <img src="Content/img/title.png" alt="" style="width: 250px;">
    <span style="position: absolute;display: block;top: 50%;left: 50%;font-size: 45px;width: 250px;transform: translate(-50%, -50%);text-align: center;color: #fff;letter-spacing: 5px;">檢驗報告</span>
</div>
    <div class="report_banner" id="close1">
        <img src="Content/img/Banner/banner3.png" alt="" id="report1">

    </div>
    <div id="close2"></div>
        <div class="rdiv">
            <img src="Content/img/report/1.png" alt="" id="r1">
            <img src="Content/img/report/2.png" alt="" id="r2">
            <img src="Content/img/report/3.png" alt="" id="r3">
            <img src="Content/img/report/5.png" alt="" id="r5">
            <img src="Content/img/report/6.png" alt="" id="r6">
        </div>

<?php 
    
    Bundle::Js('test_js', array(
        'Content/js/report.js',
    ));

?>



