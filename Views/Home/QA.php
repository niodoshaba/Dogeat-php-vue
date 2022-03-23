<?php 
use Bang\Lib\Bundle;

Bundle::Css('test_css', array(
    'Content/css/QA.css',
));

 ?>
<div style="transform: rotate(-20deg);position: fixed;top: 50px;z-index: 5;left: 10px;">
    <img src="Content/img/title.png" alt="" style="width: 250px;">
    <span style="position: absolute;display: block;top: 50%;left: 50%;font-size: 45px;width: 250px;transform: translate(-50%, -50%);text-align: center;color: #fff;letter-spacing: 5px;">常見問題</span>
</div>

<div class="QAdiv">
    <div class="QA">
        <p class="Q1">2020.03.30</p>
        <p class="Q2">購物須知</p>
        <div class="Q3">
            <ol>
                <li>我們所提供的產品配送區域僅限於台灣本島（離島地區採郵局郵寄方式，需外加運費120元，貨到付款加代收費30元）。</li>
                <li>確認交易條件無誤且有庫存後，約4～5個工作天到貨（7-11店到店取貨則需約5～7個工作天）；如遇年節及中秋節期間由於配送公司配送量較大，故無法保證可於指定日期及時段到貨，請於兩週前訂購，以上配送時間如有問題，請來電洽詢。</li>
                <li>若由於訂購或信用卡資料須再進行確認核對，則訂單將於付款、訂單資料確認後，盡速為您配送。</li>
                <li>我們所提供為全新產品，並提供以下保證：您所購買的商品依法享有七天內無條件退貨的權利，如您欲辦理退貨，請來電或留言，我們會儘快幫您處理。</li>
            </ol>
        </div>
        <div class="readmore">
            <span>read more...</span>
        </div>
    </div>
    <div class="QA">
        <p class="Q1">2020.03.30</p>
        <p class="Q2">吃菜的好處</p>
        <div class="Q3">
            <ol>
                <li>飼主若平時沒辦法抽出時間製作鮮食，狗狗平時只吃飼料，難以補充全方位的營養。</li>
                <li>蔬果提供和肉類不一樣的健康取向。如果說肉類能提供活力來源，蔬果則提供「調整健康」的功能。</li>
                <li>建議餵食狗狗蔬菜前，先參考 <a href="benefitpage.html" id="inqa">蔬菜功效</a>，選擇最適合您的狗狗的種類</li>
            </ol>
        </div>
        <div class="readmore">
            <span>read more...</span>
        </div>
    </div>
    <div class="QA">
        <p class="Q1">2020.03.30</p>
        <p class="Q2">為何做成粉狀蔬菜</p>
        <div class="Q3">
            <ol>
                <li>狗狗的消化能力跟人不一樣，他們對於植物纖維的消化能力很差，加上總是狼吞虎嚥，缺乏充分咀嚼，因此蔬菜要磨碎才能幫助他們的腸胃道消化及吸收。</li>
                <li>適量的膳食纖維能提供腸道好菌營養，同時幫助腸道蠕動，避免便秘問題讓毒素在腸道累積。</li>
            </ol>
        </div>
        <div class="readmore">
            <span>read more...</span>
        </div>
    </div>
    <div class="QA">
        <p class="Q1">2020.03.30</p>
        <p class="Q2">如何保存</p>
        <div class="Q3">
            <ol>
                <li>Dog吃菜的零食經過特殊的包裝、殺菌流程，保持內部無菌的狀態，可一旦開封接觸外界空氣，食物就會開始逐漸衰敗，跟新鮮菜餚一樣，要盡快食用完畢。</li>
                <li>開封後未食用完畢的話，請放進冰箱冷藏，並盡快食用完畢。</li>
                <li>若我們的商品在有效期內有酸臭，發霉，或是其他不正常的情形發生，請勿繼續餵食並請立即連絡我們為您辦理退換貨手續。</li>
            </ol>
        </div>
        <div class="readmore">
            <span>read more...</span>
        </div>
    </div>
</div>

<?php 

    Bundle::Js('test_js', array(
        'Content/js/QA.js',
    ));

 ?>

