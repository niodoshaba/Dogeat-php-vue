<?php 
use Bang\Lib\Bundle;
?>
    <div class="story_title">
        <p>品牌故事</p> 
    </div>

    <div class="storyup">
        <div class="upleft">
            <p class="story_title1">我們的開始</p>
            <p class="story_title2">不只是遮風避雨，更滿足口腹之慾</p>
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
            <p class="story_title2">
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
        'Content/js/js_m/story.js',
    ));

    ?>