<?php 
use Bang\Lib\Bundle;

?>
<style>
    @media print{
        #check_page,#foot_menu,#header{
            display: none;
        }
        .footer,.header{
            display: none;
        }
        img,button,a{
            display: none;
        }
        #ecpay_return_info{
            width: 80%;
        }
    }
</style>
<div id="ecpay_return_info" style="padding: 20px;position: absolute;background: #6bbc64;z-index: 1;height: 45%;left: 50%;top: 45%;transform: translate(-50%, -50%);border-radius: 20px;<?php if(!isset($_SESSION["ecpay_return_info"]["MerchantTradeNo"])){ echo "display:none";}?>">
    <div id="need_print_info" style="padding: 20px;font-size: 50px;box-sizing: border-box;position: relative;width: 100%;height: 100%;background: #fff;left: 50%;top: 50%;border-radius: 20px;transform: translate(-50%, -50%);">
        <p style="white-space:nowrap;">訂單編號：<?php echo $_SESSION["ecpay_return_info"]["MerchantTradeNo"]?></p>
        <?php
            if(isset($_SESSION["ecpay_return_info"]["BankCode"])){//ATM
                echo "<p style='white-space:nowrap;'>".$_SESSION["ecpay_return_info"]["BankCode"]."</p>";
                echo "<p style='white-space:nowrap;'>".$_SESSION["ecpay_return_info"]["vAccount"]."</p>";
            }else{
                if(isset($_SESSION["ecpay_return_info"]["PaymentNo"])){//代碼
                    echo "<p style='white-space:nowrap;'>".$_SESSION["ecpay_return_info"]["PaymentNo"]."</p>";
                }else{//條碼
                    echo "<p style='white-space:nowrap;'>".$_SESSION["ecpay_return_info"]["Barcode1"]."</p>";
                    echo "<p style='white-space:nowrap;'>".$_SESSION["ecpay_return_info"]["Barcode2"]."</p>";
                    echo "<p style='white-space:nowrap;'>".$_SESSION["ecpay_return_info"]["Barcode3"]."</p>";
                }
            }
        ?>
        <p>繳費日期：<?php echo $_SESSION["ecpay_return_info"]["ExpireDate"]?></p>
        <p>總共消費金額：<?php echo $_SESSION["ecpay_return_info"]["TradeAmt"]?></p>
        <?php unset($_SESSION["ecpay_return_info"]);?>
        <div style="text-align: center;">
            <button id="carry_on" style="outline: none;cursor: pointer;border:none;border:2px solid #FF9224;box-sizing:border-box;background-color:#fff;padding:10px 20px;font-size:55px;border-radius:20px;color:#FF9224;font-weight:bold">繼續選購</button>
            <button id="print" style="outline: none;cursor: pointer;border:none;border:2px solid #FF9224;box-sizing:border-box;background-color:#FF9224;padding:10px 20px;font-size:55px;border-radius:20px;color:#fff;font-weight:bold">列印</button>   
        </div>
    </div>  
</div>
<div id="check_page" class="check_page_box">
    <div class="order_list" style="text-align: center;">
        <div class="check_title first_title" >您選購的商品</div>
        <div id="ord_content" style="font-size: 45px;"></div>
    </div>
    <div class="order_list" >
        <div class="check_title second_title" >您的付款資料</div>
        <div id="payment" >
            <div class="member_info" >
                <span>收件人姓名：</span>
                <input id="ord_name" value="<?php 
                                                if(isset($_SESSION['cus_name'])){
                                                    echo $_SESSION['cus_name'];
                                                }else{
                                                    echo "guest";
                                                }
                                            ?>">
                </input>
            </div>
            <div class="member_info" >
                <span>收件人地址：</span>
                <input id="ord_address"></input>
            </div>
            <div class="member_info" >
                <span>收件人電話：</span>
                <input id="ord_phone" value="<?php 
                                                if(isset($_SESSION['cus_phone'])){
                                                    echo $_SESSION['cus_phone'];
                                                }else{
                                                    echo "";
                                                }
                                            ?>">
                </input>
            </div>
            <div class="member_info">
                <span>超商取貨：</span>
                <form style="display:inline-block;" id="ECPayForm" method="POST" action="https://logistics.ecpay.com.tw/Express/map" target="_self">
                    <input type="hidden" name="MerchantID" value="3042748" />
                    <input type="hidden" name="LogisticsType" value="CVS" />
                    <input type="hidden" name="LogisticsSubType" value="UNIMARTC2C" />
                    <input type="hidden" name="IsCollection" value="N" />
                    <input type="hidden" name="ServerReplyURL" value="http://<?php echo \Config::$Api ?>/frontVue/index.php?controller=Home_m&action=check" />
                    <input type="submit" id="__paymentButton" value="選擇取件門市" />
                </form>        
            </div>
            <div style="flex-direction:column;justify-content:center;align-items:center" class="member_info">
                    <?php
                        if(isset($_POST["MerchantID"])){
                            if($_POST["LogisticsSubType"] == "UNIMARTC2C"){
                                $_POST["LogisticsSubType"] = "統一超商";
                            }
                            echo 
                            '
                            <div style="display:block;">'.$_POST["LogisticsSubType"].'</div>
                            <div style="display:block;" id="cvs_store_name">'.$_POST["CVSStoreName"].'</div>
                            <div style="display:block;" id="cvs_address">'.$_POST["CVSAddress"].'</div>
                            ';
                        }
                    ?>
                </div>
            <div class="member_info" >
                <span>您的總金額：NT$</span>
                <span id="total_price"></span>
            </div>
            <div class="member_info">
            <span style="cursor:pointer;margin-left:20px">使用點數</span>
            <input type="text" style="width:150px;margin:0 25px" id="use-point">
            <span style="font-size:30px;line-height:60px">(目前擁有:<span id="point-have">
            <?php 
                if(!isset($_SESSION["cus_id"])){
                    unset($_SESSION["cus_point"]);
                    echo "0";
                }else{
                    echo $_SESSION["cus_point"];
                }
            ?>
            </span>)</span>
            </div>
        </div>
    </div>
    <div id="check_btn">
        <button id="back">回上頁
        </button>
        <button id="final_check">確定結帳
        </button>
        <button id="ecpay">ECPay</button>
    </div>
</div>
<div id="box_ecpay" style="display: none;"></div>
<?php
    Bundle::Js('test_js', array(
            'Content/js/js_m/check.js',
    ));
?>
