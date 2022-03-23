
<?php 
use Bang\Lib\Bundle;

?>

    <div class="report_title">
        <p>檢驗報告</p> 
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
        'Content/js/js_m/report.js',
    ));

    ?>



