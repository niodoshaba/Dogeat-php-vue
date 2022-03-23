<div class="shoppingCart_cardiv">
    <div id="cardiv">
        <div style="text-align:center;margin: 10px 0;">
            <div style="display: inline-block;">
                <span id="cus_id"><?php if(isset($_SESSION['cus_id'])){echo $_SESSION['cus_name'];}else{echo ("您");}?>的購物車</span>
            </div>
            <div class="cart_close_div">
                <span class="cart_close">&times</span>
            </div>
        </div>
        <hr style="margin: 10px auto;">
        <div id="incarout" class="shoppingCart_incarout"></div>
        <hr style="margin: 10px auto;">
        <div class="shoppingCart_checkout">
            <p>合計：NT$ <input type="text" id="price_sum" name="check_price" style="background-color:initial;border:none;outline:none;width: 25%;color:#000;"></p>
            <a href="<?php echo Bang\Lib\Url::Action('check') ?>">
                <input type="submit" id="paybtn" value="結帳"></input>
            </a>
        </div>
    </div>
</div>
<div id="CartPrompt" style="background: #25672dde;padding: 10px;position: fixed;top: 10px;left: 50%;transform: translateX(-50%);display: none;border-radius: 20px;font-size: 55px;color: #fff;z-index:100;">
</div>