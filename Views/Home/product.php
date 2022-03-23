<?php 
use Bang\Lib\Bundle;
$frontData1 = json_encode(Bang\Lib\ResponseBag::Get('front_data1'));
Bundle::Css('test_css', array(
    'Content/css/product.css',
));
?>
<div id="CartPrompt" style="background: #25672dde;padding: 10px;position: fixed;top: 10px;left: 50%;transform: translateX(-50%);display: none;border-radius: 20px;font-size: larger;color: #fff;z-index:1;">
    <span>加入購物車成功</span>
</div>
<div style="transform: rotate(-20deg);position: fixed;top: 50px;z-index: 5;left: 10px;">
    <img src="Content/img/title.png" alt="" style="width: 250px;">
    <span style="position: absolute;display: block;top: 50%;left: 50%;font-size: 45px;width: 250px;transform: translate(-50%, -50%);text-align: center;color: #fff;letter-spacing: 5px;">蔬菜零食</span>
</div>

<div id="vue">
    <div class="bg">
        <div class="index_productdiv">
            <div class="index_product" v-if="itme.pro_status" v-for="(itme,index) in ReversedProInfo">
                <div class="productcardup">
                    <div class="cardimg">
                        <img src="Content/img/tag1.png" class="tag">
                        <img class="product_each_img" :data-pro_no="itme.pro_no" :src="JSON.parse(itme.pro_img).img_01">
                        <div class="productbtn">{{itme.pro_name}}</div>
                    </div>
                </div>
                <div class="product_textdiv">
                    <span class="product_text" :data-cardprice="index+1">{{itme.product_reserve==0? "缺貨中" : 'NT'+itme.pro_price}}</span>
                    <button type="button"  @click="AddToCartDatabase" class="atc">
                        <img src="Content/img/icon/addtocar3.png" :data-atcnum="itme.pro_no">
                    </button>
                </div>
            </div>
        </div>    
    </div>
</div>

<script>
    let vue = new Vue({
        el:'#vue',
        data : function(){
            return {
                product_inof: <?php print_r($frontData1);?>,
            }
        },
        mounted: function() {
            $(".product_each_img").click(function(){
                location.href="index.php?action=ProductInfo&controller=Home&pro_no="+$(this).attr("data-pro_no")
            });
        },
        computed: {
            ReversedProInfo: function() {
                for(let i=0;i<this.product_inof.length;i++){
                    let date = JSON.parse(this.product_inof[i].pro_status);
                    date.date = date.date.split(" ");
                    date.date[0] = date.date[0].split("-");
                    date.date[1] = date.date[1].split(":");
                    let now_date = new Date();
                    let status_date = new Date(date.date[0][0],date.date[0][1]-1,date.date[0][2],date.date[1][0],date.date[1][1]);
                    let pro_reserve = JSON.parse(this.product_inof[i].pro_all_info).product_reserve;
                    if(date.status == 1){//上架
                        if(now_date>status_date){
                            this.product_inof[i].pro_status = true;
                        }else{
                            this.product_inof[i].pro_status = false;
                        }
                    }else{//下架
                        if(now_date>status_date){
                            this.product_inof[i].pro_status = false;
                        }else{
                            this.product_inof[i].pro_status = true;
                        }
                    }
                }
                return this.product_inof
            },
        },
        methods : {
            AddToCartDatabase:function(event){
                let pro_no = event.target.getAttribute("data-atcnum");
                if($(`[data-atcnum='${pro_no}']`).parent().prev().text() == "缺貨中"){
                    alert("請給我們一點時間進行補貨，謝謝您的光顧。");
                }else{
                    AddToCartDatabase(pro_no);
                }
            },
        }
    });
</script>

