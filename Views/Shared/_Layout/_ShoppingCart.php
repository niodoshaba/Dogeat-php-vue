<div id="cardiv" class="cardiv">
    <div class="hiddiv"></div>
    <div class="incardiv">
        <p><span id="cus_id"><?php if(isset($_SESSION['cus_id'])){echo $_SESSION['cus_name'];}else{echo ("您");}?></span>的購物車</p>
        <div id="closecar">&times</div>
        <div id='incarout'></div>
            <span class="total">合計：NT$ 
                <input type="text" id="price_sum" name="check_price" style="background-color:initial;border:none;outline:none;width:50px;color:white;font-size:18px"></input>
            </span>
            <a href="<?php echo Bang\Lib\Url::Action('check') ?>" style="width:40%;margin:0 auto;">
            <input type="submit" id="paybtn" value="結帳" style="border:none;
                                                                background-color:#FF9224;
                                                                padding:10px 20px;
                                                                font-size:24px;
                                                                border-radius:20px;
                                                                color:white;
                                                                font-weight:bold"></input>
            </a>
    </div>
</div>


<?php 

?>