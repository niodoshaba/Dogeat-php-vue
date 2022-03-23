<?php 
use Bang\Lib\Bundle;
Bundle::Css('test_js', array(
    'Content/css/story.css',
));
 ?>

<div style="transform: rotate(-20deg);position: fixed;top: 50px;z-index: 5;left: 10px;">
    <img src="Content/img/title.png" alt="" style="width: 250px;">
    <span style="position: absolute;display: block;top: 50%;left: 50%;font-size: 45px;width: 250px;transform: translate(-50%, -50%);text-align: center;color: #fff;letter-spacing: 5px;">品牌故事</span>
</div>
    <div>
        <img src="Content/img/Dog/1.png" alt="" id="dog1">
        <img src="Content/img/Dog/2.png" alt="" id="dog2">
        <img src="Content/img/Dog/3.png" alt="" id="dog3">
        <img src="Content/img/Dog/4.png" alt="" id="dog4">
        <img src="Content/img/Dog/5.png" alt="" id="dog5">
        <img src="Content/img/Dog/6.png" alt="" id="dog6">
        <img src="Content/img/Dog/8.png" alt="" id="dog8">
        <img src="Content/img/Dog/9.png" alt="" id="dog9">
        <img src="Content/img/Dog/10.png" alt="" id="dog10">
        <img src="Content/img/Dog/11.png" alt="" id="dog11">
        <img src="Content/img/Dog/12.png" alt="" id="dog12">
        <img src="Content/img/Dog/13.png" alt="" id="dog13">
    </div>

    <div class="storyup">
        <div class="upleft">
            <p class="title">我們的開始</p>
            <p class="title2">不只是遮風避雨，更滿足口腹之慾</p>
        </div>
        <div class="upright">
            <span class="text1"> 
                Dog吃菜這個品牌來自於 <strong>我們的家人</strong> ，他們是散落在街頭毛小孩。
                ​​我們想給予的不單單只是一個能遮風避雨的家，另一方面也希望能滿足他們的口腹之慾，
                讓只能吃飼料的他們，也可以補充更多的營養，讓他們的身體更健康。
                ​於是 Dog吃菜 就這樣成立了。</span>
        </div>
    </div>
    <div id="overflow">
    <div class="storymid">
        <div class="mid">
            <p class="title2">
                為什麼要做零食？
            </p>
            <p class="text1">
                ​市面上大部分的寵物零食，都有人工添加物、調味料等等，這些對毛小孩們都是負擔。<br>
                我們相信願意買零食給毛小孩的家長都很愛他們，但卻不知道其實是無形的傷害，
                我們選用各種新鮮食材，低溫乾燥殺菌，也能保留食材的鮮甜及營養，
                希望可以透過我們，讓狗狗有更好的選擇，吃得開心也吃得安心，
                給毛小孩們最單純的幸福，而我們也想將幸福傳遞下去，分享給各式各樣的毛小孩們。 
                也希望更多人認知到，只有真正天然無添加的寵物零食，才是最適合毛小孩們吃的寵物零食。
            </p>
        </div>
    </div>
    </div>
    
    <div class="pictachi">
        <div class="bdiv" id="bdiv">
        <img src="Content/img/Dog/big1.png" alt="" id="b1">
        <img src="Content/img/Dog/big2.png" alt="" id="b2">
        <img src="Content/img/Dog/big3.png" alt="" id="b3">
        <img src="Content/img/Dog/big4.png" alt="" id="b4">
        </div>
    </div>
    <div class="switchcir">
        <div id="cir1"></div>
        <div id="cir2"></div>
        <div id="cir3"></div>
        <div id="cir4"></div>
    </div>

    <?php 
    
    Bundle::Js('test_js', array(
        'Content/js/story.js',
    ));

    ?>