<?php 
use Bang\Lib\Bundle;

 ?>
    <div class="member_title">
        <p>會員獨享</p> 
    </div>
    <div class="member_title2">
        <p>加入會員好處多多！購買前記得檢查自己有沒有登入喔！ <a href="login.html">馬上檢查</a></p> 
    </div>

    <h1 class="ml6">
        <span class="text-wrapper">
          <span class="letters">&#10038吃菜好夥伴 好禮享不完&#10038</span>
        </span>
    </h1>

    <div class="memberdiv1">
        <div class="div1right">
            <div class="right1up">
                <img src="Content/img/money.png" alt="">
                <div class="pdiv">
                <p class="p1">好朋友註冊禮</p>
                <p class="p2">首次註冊之會員，登入立即領取 &#36;50折扣金</p>
                </div>
            </div>
            <hr>
            <div class="right2up">
                <img src="Content/img/birthday.png" alt="">
                <div class="pdiv">
                <p class="p1">屬於你的生日禮</p>
                <p class="p2">為你最特別的這天，獻上小小的祝福 &#36;100折扣金</p>
                </div>
            </div>
            <hr>
            <div class="right3up">
                <img src="Content/img/stampcard.png" alt="">
                <div class="pdiv">
                <p class="p1">多買多划算</p>
                <p class="p2">消費金額每 &#36;150可集一點，滿10點送您一包健康蔬菜零食</p>
                </div>
            </div>
        </div>
    </div>
    
    <h1 class="ml6">    
        <span class="text-wrapper2">
        <span class="letters2">&#10038加入會員，完整記錄你的需求&#10038</span>
        </span>
    </h1> 

    <div class="memberdiv2">
        <div class="div2">
            <div class="pdiv">
                <p class="p1"><strong>1對1好友QA問答</strong></p>
                <p class="p2">登入後可在訊息區留言，您的問題交給專人來解答</p>
            </div>
            <div class="div2right">
                <img src="Content/img/people.png" alt="">
            </div>
        </div>
        <hr>
        <div class="div2">
            <div class="pdiv">
                <p class="p1"><strong>主子愛吃的，我幫您記</strong></p>
                <p class="p2">詳細訂單記錄，主子吃過甚麼一目了然</p>
            </div>
            <div class="div2downleft">
                <img src="Content/img/computer.png" alt="">
            </div>
        </div>     
    </div>

<a href="<?php echo Bang\Lib\Url::Action('login') ?>" id="joina">
    <div class="joinbtn">立馬加入GO!</div>
</a>

<?php 

        Bundle::Js('test_js', array(
            'Content/js/js_m/member.js',
        ));

 ?>

