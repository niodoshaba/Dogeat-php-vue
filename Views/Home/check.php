<?php
use Bang\Lib\Bundle;
Bundle::Css('test_css', array(
    'Content/css/header_footer.css',
));
$pro_detail = Bang\Lib\ResponseBag::Get('pro_detail');
$ecpay_return_info = Bang\Lib\ResponseBag::Get('ecpay_return_info');

?>

<style>
    #check_page{
        width:40%;
        margin:50px 0 5% 30%;
        display:flex;
        justify-content:center;
        flex-direction:column;
    }
    #order_list{
        border:1px solid #E0E0E0;
        border-radius: 20px 20px 0 0;
    }
    .check_title{
        background-color: initial;
        padding:10px;
        border:1px solid #E0E0E0;
        border-top:0px;
        
    }
    .first_title{
        background-color: #6bbc64;
        color: white;
        border-radius: 15px 15px 0 0;
    }
    .second_title{
        background-color: #6bbc64;
        color: white;

    }
    #ord_content{
        display:flex;
        flex-direction:column;
        margin:10px 0 10px 15px;
    }
    .each_product{
        padding: 5px 15px 5px 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    #check_btn{
        text-align:center;
        margin-top:5%;
    }
    #payment_method{
        width: 49%;
        display:inline-block;
        text-align: left;
    }
    #payment_total{
        width: 49%;
        display:inline-block;
        text-align: right;
    }
    .each_product{
        border-bottom:1px solid #E0E0E0;
    }
    .each_product:last-child{
        border-bottom: none;
    }

    #__paymentButton{
        background-color:#6bbc64;
        border:none;
        padding:5px 10px;
        border-radius:10px;
        color:white;
        font-size:14px;
    }
    @media print{
        #check_page,#title,#p1,#p2,#p4{
            display: none;
        }
        .footer,.header,.logo{
            display: none;
        }
        button{
            display: none;
        }
        #ecpay_return_info{
            width: 100%;
            
        }
        img{
            text-align: center;
        }
    }
</style>
<div id="vue">
    <div id="title" style="transform: rotate(-20deg);position: fixed;top: 50px;z-index: 5;left: 10px;">
        <img src="Content/img/title.png" alt="" style="width: 250px;">
        <span style="position: absolute;display: block;top: 50%;left: 50%;font-size: 45px;width: 250px;transform: translate(-50%, -50%);text-align: center;color: #fff;letter-spacing: 5px;">謝謝光臨</span>
    </div>
    <div id="ecpay_return_info" style="padding: 10px;position: absolute;background: #6bbc64;z-index: 1;left: 50%;top: 50%;transform: translate(-50%, -50%);border-radius: 20px;
    <?php 
    if(!isset($_SESSION["ecpay_return_info"]["MerchantTradeNo"])){
        echo "display:none;";
    }else{
        if(isset($_SESSION["ecpay_return_info"]["BankCode"])){
            echo "height:43%;";
        }else{
            if(isset($_SESSION["ecpay_return_info"]["PaymentNo"])){//代碼
                echo "height:35%;";
            }else{//條碼 
                echo "height:80%;";
            }
        }
    }
    ?>">
        <div id="need_print_info" style="padding: 15px;font-size: 20px;box-sizing: border-box;position: relative;width: 100%;height: 100%;background: #fff;left: 50%;top: 50%;border-radius: 20px;transform: translate(-50%, -50%);">
            <p style="white-space:nowrap;">訂單編號：<?php echo $_SESSION["ecpay_return_info"]["MerchantTradeNo"]?></p>
            <?php
                if(isset($_SESSION["ecpay_return_info"]["BankCode"])){//ATM
                    echo "<p style='white-space:nowrap;'>".$_SESSION["ecpay_return_info"]["BankCode"]."</p>";
                    echo "<p style='white-space:nowrap;'>".$_SESSION["ecpay_return_info"]["vAccount"]."</p>";
                }else{
                    if(isset($_SESSION["ecpay_return_info"]["PaymentNo"])){//代碼
                        echo "<p style='white-space:nowrap;'>".$_SESSION["ecpay_return_info"]["PaymentNo"]."</p>";
                    }else{//條碼 
                        echo "<p style='white-space:nowrap;'>條碼第一段號碼：".$_SESSION["Barcode1"]."</p>";
                        echo "<img src='http://niodoshaba.byethost17.com/frontVue/index.php?action=Barcode_img1&controller=Barcode_img'>";
                        echo "<p style='white-space:nowrap;'>條碼第二段號碼：".$_SESSION["Barcode2"]."</p>";
                        echo "<img src='http://niodoshaba.byethost17.com/frontVue/index.php?action=Barcode_img2&controller=Barcode_img'>";
                        echo "<p style='white-space:nowrap;'>條碼第三段號碼：".$_SESSION["Barcode3"]."</p>";
                        echo "<img src='http://niodoshaba.byethost17.com/frontVue/index.php?action=Barcode_img3&controller=Barcode_img'>";                  
                    }
                }
            ?>
            <p>繳費日期：<?php echo $_SESSION["ecpay_return_info"]["ExpireDate"]?></p>
            <p>總共消費金額：<?php echo $_SESSION["ecpay_return_info"]["TradeAmt"]?></p>
            <?php unset($_SESSION["ecpay_return_info"]);?>
            <div style="text-align: center;">
                <button id="carry_on" style="outline: none;cursor: pointer;border:none;border:2px solid #FF9224;box-sizing:border-box;background-color:#fff;padding:10px 20px;font-size:16px;border-radius:20px;color:#FF9224;font-weight:bold">繼續選購</button>
                <button id="print" style="outline: none;cursor: pointer;border:none;border:2px solid #FF9224;box-sizing:border-box;background-color:#FF9224;padding:10px 20px;font-size:16px;border-radius:20px;color:#fff;font-weight:bold">列印</button>
            </div>
        </div>  
    </div>
    <div id="check_page" >
        <div id="order_list" >
            <div class="check_title first_title" >您選購的商品</div>
            <div id="ord_content" style="text-align: center;">

                <div class="each_product"  v-for="(item,index) in cart_data" :data-pro_no="item.pro_no">
                    <div style="width:20%;display:inline-block">
                        <img :src="JSON.parse(item.pro_img).img_01" style="width:100%">
                    </div>
                    <span>{{item.pro_name}}</span>
                    <span>NT$
                        <span class="each_price each_price_check">{{item.pro_price}}</span>
                    </span>
                    <span @click="DelInCheck" class="del_in_check" style="font-size:32px;color:maroon;cursor:pointer" :data-orditem_no="item.orditem_no">&times</span>
                </div>
            
            </div>
        </div>

        <div id="order_list" >
            <div class="check_title second_title" >您的付款資料</div>
        </div>

        <div id="payment" >
            <div class="check_title" >收件人姓名：
                <input id="ord_name" value="<?php 
                                            if(isset($_SESSION['cus_name'])){
                                                echo $_SESSION['cus_name'];
                                            }else{
                                                echo "guest";
                                            }
                                            ?>">
                </input>
            </div>
            <div class="check_title" >收件人地址：
                <input id="ord_address"></input>
            </div>
            <div class="check_title" >連絡電話：
                <input id="ord_phone" :value="cus_phone">
                </input>
            </div>
            <div class="check_title">超商取貨：
                <form style="display:inline-block;margin-bottom:10px" id="ECPayForm" method="POST" action="https://logistics.ecpay.com.tw/Express/map" target="_self">
                    <input type="hidden" name="MerchantID" value="3042748" />
                    <input type="hidden" name="LogisticsType" value="CVS" />
                    <input type="hidden" name="LogisticsSubType" value="UNIMARTC2C" />
                    <input type="hidden" name="IsCollection" value="N" />
                    <input type="hidden" name="ServerReplyURL" value="http://<?php echo \Config::$Api ?>frontVue/index.php?controller=Home&action=check" />
                    <input type="submit" id="__paymentButton" value="選擇取件門市" />
                </form>
                <br>
                <span>
                    <?php
                    // print_r($ecpay_return_info);
                    print_r($_POST);
                        if(isset($_POST["MerchantID"]) && isset($_POST["LogisticsSubType"])){
                            if($_POST["LogisticsSubType"] == "UNIMARTC2C"){
                                $_POST["LogisticsSubType"] = "統一超商";
                            }
                            echo 
                            '
                            <div style="display:inline-block;">'.$_POST["LogisticsSubType"].'</div>
                            <span> / </span>
                            <div style="display:inline-block;"id="cvs_store_name">'.$_POST["CVSStoreName"].'</div>
                            <span> / </span>
                            <div style="display:inline-block;"id="cvs_address">'.$_POST["CVSAddress"].'</div>
                            ';
                        }else if(isset($_POST["MerchantID"]) && $_POST["RtnCode"] == 1){//信用卡交易完成
                            if($_POST["RtnMsg"] == "Succeeded"){
                                echo
                                '
                                <script>alert("交易成功");</script>
                                '; 
                            }else{
                                echo
                                '
                                <script>alert("交易失敗");</script>
                                '; 
                            }
                        }
                    ?>
                </span>

            </div>
            <div class="check_title" >您的總金額：NT$
                <span id="total_price"></span>
                <span style="cursor:pointer;margin-left:20px">使用點數</span>
                <input type="text" style="width:50px" id="use-point" onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'')">
                <span style="font-size:12px;line-height:24px">(目前擁有:<span id="point-have">
                        {{cus_point}}
                </span>)</span>
            </div>
        </div>

        <div id="check_btn">
            <button id="back" @click="Back" style="border:none;border:2px solid #FF9224;box-sizing:border-box;background-color:initial;padding:10px 20px;font-size:16px;border-radius:20px;color:#FF9224;font-weight:bold;cursor: pointer;">回上頁</button>
            <button id="final_check" @click="FinalCheck" style="border:none;background-color:#FF9224;box-sizing:border-box;padding:10px 20px;font-size:16px;border-radius:20px;color:white;font-weight:bold;cursor: pointer;">確定結帳</button>
            <button id="ecpay" style="border:none;background-color:#01957d;box-sizing:border-box;padding:10px 20px;font-size:16px;border-radius:20px;color:white;font-weight:bold;cursor: pointer;">ECPay</button>
        </div>
    </div>
    <div id="box_ecpay" style="display: none;"></div>
</div>
<script>
        let vue = new Vue({
        el:'#vue',
        data : function(){
            return {
                cart_data: "",
                cus_point: "<?php if(!isset($_SESSION["cus_id"])){unset($_SESSION["cus_point"]);echo "0";}else{echo $_SESSION["cus_point"];}?>",
                cus_phone: "<?php isset($_SESSION['cus_phone']) ? $_SESSION['cus_phone'] : "" ?>",
            }
        },
        mounted: function () {
            this.GetCartPro();
        },
        methods : {
            GetCartPro:function(event){
                let v_this = this;
                v_this.GetCartProAjax(function(render_data){
                    v_this.cart_data = JSON.parse(render_data);
                    v_this.CountPrice();
                })
            },
            Back:function(){
                history.back()
            },
            CountPrice:function(){
                let total = 0;
                if(this.cart_data != null){
                    for(let i =0;i<this.cart_data.length;i++){
                        total+=parseInt(this.cart_data[i].pro_price);
                    }
                }
                $('#total_price').text(total);
            },
            DelInCheck:function(event){
                let v_this = this;
                let delete_orditem_no = event.target.getAttribute("data-orditem_no")
                v_this.DelInCheckAjax(delete_orditem_no,function(render_data){
                    alert("已刪除資料");
                    v_this.GetCartPro();
                })
            },
            FinalCheck:function(){
                let v_this = this;
                if(this.cart_data == null){
                    alert("尚未選購商品，快去購物!")
                }else if($("#ord_name").val() == "" || $("#ord_address").val() == "" || $("#ord_phone").val() == ""){
                    alert("請填寫完整")
                }else{
                    let date = new Date();
                    let now_date=date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate();
                    let pro_no = "";
                    for(let i=0;i<$(".each_product").length;i++){
                        if(i+1 != $(".each_product").length){
                            pro_no += $(".each_product").eq(i).attr("data-pro_no")+" ";
                        }else{
                            pro_no += $(".each_product").eq(i).attr("data-pro_no");
                        }
                    }
                    if($("#cvs_address").text() != ""){
                        order_data = {
                            "ord_price":$("#total_price").text(),
                            "ord_address":$("#cvs_address").text()+"("+$("#cvs_store_name").text()+")",
                            "ord_phone":$("#ord_phone").val(),
                            "now_date":now_date,"pro_no":pro_no
                        }
                    }else{
                        order_data = {
                            "ord_price":$("#total_price").text(),
                            "ord_address":$("#ord_address").val(),
                            "ord_phone":$("#ord_phone").val(),
                            "now_date":now_date,"pro_no":pro_no
                        }
                    }
                    let use_point = $("#use-point").val();
                    if(use_point <= v_this.cus_point){
                        v_this.FinalCheckAjax(order_data,function(res){
                            console.log(res);
                            if(res){
                                let insufficient_pro =  JSON.parse(res);
                                if(insufficient_pro[0] == true){
                                    let insufficient_name = "";
                                    console.log(insufficient_pro);
                                    for (const key in insufficient_pro) {
                                        if(key==0){
                                            insufficient_name = "以下商品數量庫存不足\n";
                                        }else if(isNaN(insufficient_pro[key])){
                                            insufficient_pro[key] = insufficient_pro[key].split("_");
                                            insufficient_name += key+":"+insufficient_pro[key][0]+"剩餘"+insufficient_pro[key][1]+"包\n";
                                        }
                                    }
                                    alert(insufficient_name);
                                }else{
                                    if($("#use-point").val() != ""){
                                        v_this.UsePoint(use_point);
                                    }
                                    else{
                                        if(v_this.cus_phone){
                                            v_this.EarnPoint();
                                        }else{
                                            v_this.CleanCart();
                                        }
                                    }
                                }
                            }else{
                                alert("系統錯誤請聯絡管理員");
                            }
                        })
                    }else{
                        alert("您沒那多點數唷!");
                    }
                }
            },
            UsePoint:function(use_point){
                let v_this = this;
                if(v_this.cus_phone){
                    let cus_phone = v_this.cus_phone;
                    v_this.UsePointAjax(use_point,cus_phone,function(render_data){
                        console.log("use point success");
                        v_this.EarnPoint(cus_phone);
                    })
                }else{
                    alert("請先登錄才可使用點數!");
                }
            },
            EarnPoint:function(cus_phone){
                let v_this = this;
                let total_price = $("#total_price").text();
                v_this.EarnPointAjax(total_price,cus_phone,function(render_data){
                    console.log("earn point success");
                    v_this.CleanCart();
                })
            },
            CleanCart:function(){
                let v_this = this;
                v_this.CleanCartAjax(function(render_data){
                    alert("結帳完成");
                    location.reload();
                })
            },
            //-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----
            //-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----Ajax-----
            GetCartProAjax: function( cb) {
                this.callAjax("GET","<?php echo Bang\Lib\Url::Action('CartRender','CartControllers')?>",{},"text",cb);
            },
            DelInCheckAjax: function(orditem_no, cb) {
                this.callAjax("POST","<?php echo Bang\Lib\Url::Action('DeleteCart','CartControllers')?>",{orditem_no:orditem_no},"text",cb);
            },
            FinalCheckAjax: function(order_data, cb) {
                this.callAjax("POST","<?php echo Bang\Lib\Url::Action('CreateOrder','OrderControllers')?>",order_data,"text",cb);
            },
            UsePointAjax: function(use_point,cus_phone, cb) {
                this.callAjax("GET","<?php echo Bang\Lib\Url::Action('UsePoint','MemberControllers')?>",{use_point:use_point,cus_phone:cus_phone},"text",cb);
            },
            EarnPointAjax: function(total_price,cus_phone, cb) {
                this.callAjax("GET","<?php echo Bang\Lib\Url::Action('EarnPoint','MemberControllers')?>",{ord_price:total_price,cus_phone:cus_phone},"text",cb);
            },
            CleanCartAjax: function( cb) {
                this.callAjax("GET","<?php echo Bang\Lib\Url::Action('CleanCart','CartControllers')?>",{},"text",cb);
            },
            callAjax:function(method,url,data,dataType,cb){
                $.ajax({
                    type: method,
                    url: url,
                    data: data,
                    dataType: dataType,
                    success: function (response) {
                        cb(response);
                    },error:function(err){
                        console.log(err);
                        alert("something Error!");
                    }
                });
            }
        }
    })
</script>

