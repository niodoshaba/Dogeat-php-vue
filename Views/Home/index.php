<?php 

use Bang\Lib\Bundle;
Bundle::Css('test_css', array(
    'Content/css/index.css',
));

$frontData1 = Bang\Lib\ResponseBag::Get('front_data1');
$frontData2 = Bang\Lib\ResponseBag::Get('front_data2');

?>
<div style="transform: rotate(-20deg);position: fixed;top: 50px;z-index: 5;left: 10px;">
    <img src="Content/img/title.png" alt="" style="width: 250px;">
    <span style="position: absolute;display: block;top: 50%;left: 50%;font-size: 45px;width: 250px;transform: translate(-50%, -50%);text-align: center;color: #fff;letter-spacing: 5px;">Dog吃菜</span>
</div>
    <div class="section">
        <div class="firstview">
            <div class="block1"></div>
            <div class="block2"></div>
            <div class="block5"></div>
            <div class="block6"></div>
            <div class="firstview_text">
            <p id="text1">狗狗也要<span class="orangetext1">吃蔬菜</span></p>
            <p id="text2">沒空做鮮食，只吃飼料哪裡夠</p>
            <p id="text3"><span class="orangetext2">蔬菜粉</span>，讓飼料變健康</p>
            </div>
        </div>

        <div class="indexdown">
            <div class="indexdowntext1">
                <p>挑食狗狗各種不肯吃</p>
                <p>先搭配<span class="orangetext3">優質肉乾</span></p>
                <p>試試寶貝喜歡哪種菜吧</p>
            </div>
            <div class="btn1">
                <a href="<?php echo Bang\Lib\Url::Action('product') ?>">
                    <div class="desertbtn1">
                        <img src="./Views/dogeat/DogEatVeg/web/img/indexbtn1_1.png" alt="">
                        <div class="desertbtn1text">
                            <p>蔬菜</p>
                            <p>&nbsp&nbsp零食</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="indexdowntext2">
                <p>想讓飼料更健康</p>
                <p>只要灑上一匙</p>
                <p><span class="orangetext4">蔬菜粉 營養超濃縮</span></p>
            </div> 
        </div>
    </div>

    <div class="section">
        <div class="secondview" >
            <div class="block3"></div>
            <div class="secondviewtext">
                <p id="v2text1">偶爾讓主子吃零食</p>
                <p id="v2text2">吃下去的都是各種化學成分</p>
                <p id="v2text3">來點真正<span class="naturetext">天然</span>的吧</p>
            </div>
            <div class="secondview_down_text">
                <p>&nbsp&nbsp蔬菜零食&nbsp&nbsp</p>
            </div>  
        </div>


        <div class="index_productdiv" >
            <?php for($i=0;$i<4;$i++) { ?>
                <div class="index_product index_product1">
                    <div class="productcardup">
                        <div class="cardimg">
                        <img src="./Views/dogeat/DogEatVeg/web/img/tag1.png" alt=""  class="tag">
                        <img class="product_each_img" data-pro_no="<?= $frontData1[$i]->pro_no ?>" src="<?= json_decode($frontData1[$i]->pro_img) -> img_01 ?>" alt="">
                        <div class="productbtn"><?= $frontData1[$i]->pro_name ?></div>
                        </div>
    
                    </div>
                    <div class="product_textdiv">
                        <span class="product_text">$<?= $frontData1[$i]->pro_price ?></span>
                        <button type="button"  class="atc" data-atcnum="<?= $frontData1[$i]->pro_no ?>">
                            <img src="./Views/dogeat/DogEatVeg/web/img/icon/addtocar3.png" alt="" >
                        </button>
                    </div>
                </div>
            <?php } ?>
            <!-- <div class="index_product index_product1">
                <div class="productcardup">
                    <div class="cardimg">
                    <img src="./Views/dogeat/DogEatVeg/web/img/tag1.png" alt=""  class="tag">
                    <img class="product_each_img" data-pro_no="1" src="/dogeat_server/Content/img/1_0.jpg" alt="">
                    <div class="productbtn">彩虹雞胸乾</div>
                    </div>

                </div>
                <div class="product_textdiv">
                    <span class="product_text">NT$130</span>
                    <button type="button"  class="atc" data-atcnum="1">
                        <img src="./Views/dogeat/DogEatVeg/web/img/icon/addtocar3.png" alt="" >
                    </button>
                </div>
            </div>
            <div class="index_product index_product1">
                <div class="productcardup">
                    <div class="cardimg">
                    <img src="./Views/dogeat/DogEatVeg/web/img/tag2.png" alt=""  class="tag">
                    <img class="product_each_img" data-pro_no="2" src="/dogeat_server/Content/img/2_0.jpg" alt="">
                    <div class="productbtn">菠菜雞胸乾</div>
                    </div>

                </div>
                <div class="product_textdiv">
                    <span class="product_text">NT$130</span>
                    <button type="button"  class="atc" data-atcnum="2">
                        <img src="./Views/dogeat/DogEatVeg/web/img/icon/addtocar3.png" alt="" >
                    </button>
                </div>
            </div>
            <div class="index_product index_product1">
                <div class="productcardup">
                    <div class="cardimg">
                    <img src="./Views/dogeat/DogEatVeg/web/img/tag3.png" alt=""  class="tag">
                    <img class="product_each_img" data-pro_no="3" src="/dogeat_server/Content/img/3_0.jpg" alt="">
                    <div class="productbtn">南瓜雞胸乾</div>
                    </div>

                </div>
                <div class="product_textdiv">
                    <span class="product_text">NT$130</span>
                    <button type="button"  class="atc" data-atcnum="3">
                        <img src="./Views/dogeat/DogEatVeg/web/img/icon/addtocar3.png" alt="" >
                    </button>
                </div>
            </div>
            <div class="index_product index_product1">
                <div class="productcardup">
                    <div class="cardimg">
                    <img src="./Views/dogeat/DogEatVeg/web/img/tag4.png" alt=""  class="tag">
                    <img class="product_each_img" data-pro_no="4" src="/dogeat_server/Content/img/4_0.jpg" alt="">
                    <div class="productbtn">胡蘿蔔雞胸乾</div>
                    </div>
                </div>
                <div class="product_textdiv">
                    <span class="product_text">NT$130</span>
                    <button type="button"  class="atc" data-atcnum="4">
                        <img src="./Views/dogeat/DogEatVeg/web/img/icon/addtocar3.png" alt="" >
                    </button>
                </div>
            </div>  -->
        </div> 
        <div class="seemorediv">
            <a href="<?php echo Bang\Lib\Url::Action('product') ?>">
                <span class="seemore">&lt;&lt;看所有產品&gt;&gt;</span>
            </a>
        </div>
    </div>
    <div class="section">
        <div class="thirdview" >
                <div class="block4"></div>
                <div class="thirdviewtext">
                    <p id="v3text1">想給主子吃鮮食但<span class="naturetext">沒空做</span></p>
                    <p id="v3text2">飼料也可以變得更健康</p>
                    <p id="v3text3"><span class="naturetext">只要一匙 健康加持</span></p>
                </div>
                <div class="thirdview_down_text">
                    <p>&nbsp&nbsp蔬菜粉粉&nbsp&nbsp</p>
                </div>
        </div>
        
        <div class="index_productdiv" >
            <?php for($i=0;$i<4;$i++) { ?>
                <div class="index_product index_product1">
                    <div class="productcardup">
                        <div class="cardimg">
                        <img src="./Views/dogeat/DogEatVeg/web/img/tag1.png" alt=""  class="tag">
                        <img class="product_each_img" data-pro_no="<?= $frontData2[$i]->pro_no ?>" src="<?= json_decode($frontData2[$i]->pro_img) -> img_01 ?>" alt="">
                        <div class="productbtn"><?= $frontData2[$i]->pro_name ?></div>
                        </div>
    
                    </div>
                    <div class="product_textdiv">
                        <span class="product_text">$<?= $frontData2[$i]->pro_price ?></span>
                        <button type="button"  class="atc" data-atcnum="<?= $frontData2[$i]->pro_no ?>">
                            <img src="./Views/dogeat/DogEatVeg/web/img/icon/addtocar3.png" alt="" >
                        </button>
                    </div>
                </div>
            <?php } ?>
            <!-- <div class="index_product index_product1">
                <div class="productcardup">
                    <div class="cardimg">
                    <img src="./Views/dogeat/DogEatVeg/web/img/tag1.png" alt=""  class="tag">
                    <img class="product_each_img" data-pro_no="9" src="/dogeat_server/Content/img/9_0.jpg" alt="">
                    <div class="productbtn">紫甘藍粉粉</div>
                    </div>

                </div>
                <div class="product_textdiv">
                    <span class="product_text">NT$130</span>
                    <button type="button"  class="atc"data-atcnum="9">
                        <img src="./Views/dogeat/DogEatVeg/web/img/icon/addtocar3.png" alt="" >
                    </button>
                </div>
            </div>
            <div class="index_product index_product1">
                <div class="productcardup">
                    <div class="cardimg">
                    <img src="./Views/dogeat/DogEatVeg/web/img/tag2.png" alt=""  class="tag">
                    <img class="product_each_img" data-pro_no="10" src="/dogeat_server/Content/img/10_0.jpg" alt="">
                    <div class="productbtn">菠菜粉粉</div>
                    </div>

                </div>
                <div class="product_textdiv">
                    <span class="product_text">NT$130</span>
                    <button type="button"  class="atc" data-atcnum="10">
                        <img src="./Views/dogeat/DogEatVeg/web/img/icon/addtocar3.png" alt="" >
                    </button>
                </div>
            </div>
            <div class="index_product index_product1">
                <div class="productcardup">
                    <div class="cardimg">
                    <img src="./Views/dogeat/DogEatVeg/web/img/tag3.png" alt=""  class="tag">
                    <img class="product_each_img" data-pro_no="11" src="/dogeat_server/Content/img/11_0.jpg" alt="">
                    <div class="productbtn">南瓜粉粉</div>
                    </div>

                </div>
                <div class="product_textdiv">
                    <span class="product_text">NT$130</span>
                    <button type="button"  class="atc" data-atcnum="11">
                        <img src="./Views/dogeat/DogEatVeg/web/img/icon/addtocar3.png" alt="" >
                    </button>
                </div>
            </div>
            <div class="index_product index_product1">
                <div class="productcardup">
                    <div class="cardimg">
                    <img src="./Views/dogeat/DogEatVeg/web/img/tag4.png" alt=""  class="tag">
                    <img class="product_each_img" data-pro_no="12" src="/dogeat_server/Content/img/12_0.jpg" alt="">
                    <div class="productbtn">胡蘿蔔粉粉</div>
                    </div>
                </div>
                <div class="product_textdiv">
                    <span class="product_text">NT$130</span>
                    <button type="button"  class="atc" data-atcnum="12">
                        <img src="./Views/dogeat/DogEatVeg/web/img/icon/addtocar3.png" alt="" >
                    </button>
                </div>
            </div>  -->
        </div> 
        <div class="seemorediv">
            <a href="<?php echo Bang\Lib\Url::Action('product2') ?>">
            <span class="seemore">&lt;&lt;看所有產品&gt;&gt;</span>
            </a>
        </div>
    </div>

<!-- <script type="text/javascript">
    3/25 saved
        (function(){ 

          document.onreadystatechange = () => {

            if (document.readyState === 'complete') {

              let el = document.querySelector('#LOGO_SVG');
              let myAnimation = new LazyLinePainter(el, {"ease":"easeLinear","strokeWidth":0.1,"strokeOpacity":1,"strokeColor":"#222F3D","strokeCap":"butt"}); 
              myAnimation.paint(); 
            }
          }

        })();
</script> -->
<div id="CartPrompt" style="background: #25672dde;padding: 10px;position: fixed;top: 10px;left: 50%;transform: translateX(-50%);display: none;border-radius: 20px;font-size: larger;color: #fff;z-index:1;">
    加入購物車成功
</div>
<?php 

    Bundle::Js('test_js', array(
    'Content/js/index.js'
    ));

 ?>
<script>
    $(".product_each_img").click(function(){
        location.href="index.php?action=ProductInfo&controller=Home&pro_no="+$(this).attr("data-pro_no")
    });
</script>
