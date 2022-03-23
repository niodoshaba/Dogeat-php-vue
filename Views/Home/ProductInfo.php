<?php
use Bang\Lib\Bundle;
Bundle::Css('test_css', array(
    'Content/css/header_footer.css',
    'Content/css/ProductInfo.css',
));

$pro_info = Bang\Lib\ResponseBag::Get('pro_info');

?>
<div style="transform: rotate(-20deg);position: fixed;top: 50px;z-index: 5;left: 10px;">
    <img src="Content/img/title.png" alt="" style="width: 250px;">
    <span style="position: absolute;display: block;top: 50%;left: 50%;font-size: 45px;width: 250px;transform: translate(-50%, -50%);text-align: center;color: #fff;letter-spacing: 5px;">商品資訊</span>
</div>

<div id="vue">
    <div id="product_info_all">
        <div id="product_info_img">
            <div id="product_info_big_img">
                <img id="product_info_big_img_show" :src="JSON.parse(pro_info.pro_img).img_01" alt="" >
            </div>
            <div id="product_info_small_img">
                <div class="product_info_small_img_each">
                    <img class="product_info_small_img" :src="JSON.parse(pro_info.pro_img).img_01" @click="BigImgShow" alt="">
                </div>
                <div class="product_info_small_img_each">
                    <img class="product_info_small_img" :src="JSON.parse(pro_info.pro_img).img_02" @click="BigImgShow" alt="">
                </div>
                <div class="product_info_small_img_each">
                    <img class="product_info_small_img" :src="JSON.parse(pro_info.pro_img).img_03" @click="BigImgShow" alt="">

                </div>
                <div class="product_info_small_img_each">
                    <img class="product_info_small_img" :src="JSON.parse(pro_info.pro_img).img_04" @click="BigImgShow" alt="">

                </div>
            </div>
        </div>

        <div id="product_info_info">
            <span id="product_info_catalog1">多種蔬菜添加，搭配雞肉滿足營養及美味</span>
            <span id="product_info_catalog2">新鮮蔬菜烘乾製粉，營養成份超超超濃縮</span>
            <div id="product_info_title">
                <span> {{pro_info.pro_name}} </span>
            </div>
            <div id="product_info_price">
                <span>NT$ {{pro_info.pro_price}}</span>
            </div>
            <div id="product_info_detail">
                <span> {{JSON.parse(pro_info.pro_all_info).pro_info }} </span>
            </div>
            <div>
                <span id="product_info_sec_title">商品資訊</span>
            </div>
            <div id="product_info_li">
                <ul>
                    <li>產品成分： {{JSON.parse(pro_info.pro_all_info).product_element}}</li>
                    <li>保存期限： {{JSON.parse(pro_info.pro_all_info).pro_deadtime}}</li>
                    <li>產品容量： {{JSON.parse(pro_info.pro_all_info).product_content}} g / 包</li>
                    <li id="pro_info_status">庫存狀況： {{ pro_info.product_reserve}}包</li>
                </ul>
            </div>
            <div id="product_info_btn">
                <div id="product_info_back" @click="Back">
                    回上一頁
                </div>
                <div id="product_info_cart"  @click="AddToCartDatabase" class="atc" :data-atcnum="pro_info.pro_no">
                    加入購物車
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let vue = new Vue({
        el:"#vue",
        data:function(){
            return{
                pro_info:<?php echo json_encode($pro_info[0]);?>,
                sss:"sdf"
            }
        },
        mounted: function() {
            let cata_no = this.pro_info.cata_no;
            if(cata_no == 1){
                $("#product_info_catalog1").css("display","inline-block")
                $("#product_info_catalog2").css("display","none")
            }else{
                $("#product_info_catalog1").css("display","none")
                $("#product_info_catalog2").css("display","inline-block")
            }
        },
        methods:{
            AddToCartDatabase:function(event){
                let pro_no = event.target.getAttribute("data-atcnum");
                if(this.pro_info.product_reserve == 0){
                    alert("請給我們一點時間進行補貨，謝謝您的光顧。");
                }else{
                    AddToCartDatabase(pro_no);
                }
            },
            Back:function(){
                history.back();
            },
            BigImgShow:function(event){
                let current_img = event.target.getAttribute("src");
                $("#product_info_big_img_show").attr("src",current_img)
            }
        }
    });
</script>