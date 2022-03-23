<?php 
use Bang\Lib\Bundle;
Bundle::Css('test_css', array(
    './Content/css/owl.carousel.min.css',
));
$frontData1 = Bang\Lib\ResponseBag::Get('front_data1');
$frontData2 = Bang\Lib\ResponseBag::Get('front_data2');
?>

<div id="index_banner">
    <div style="height:100%">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            <!--判斷數量-->
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
            <!--迴圈新增圖片-->
                <div class="carousel-item active">
                    <img src="./Content/img/01.PNG" class="d-block w-100 h-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./Content/img/02.PNG" class="d-block w-100 h-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<div class="index_catalog">
    <div class="index_product_title index_product_title1">
        <div class="index_product_title_up index_product_title1_up">蔬菜零食</div>
    </div>
    <div class="index_product_div">
        <div class="owl-carousel owl-theme">
            <?php
                foreach($frontData1 as $value){
                    echo '<div class="index_item">';
                        echo '<span class="index_pro_title">'.$value -> pro_name.'</span>';
                        echo '<img class="product_each_img" data-pro_no="'.$value -> pro_no.'" src="'.json_decode($value->pro_img) -> img_01.'">';
                        echo '<span class="index_pro_info">NT'.$value -> pro_price;
                            echo '<img src="./Views/dogeat/DogEatVeg/web/img/icon/addtocar3.png" style="width: 150px;" class="atc" data-atcnum="'.$value -> pro_no.'">';
                        echo '</span>';
                    echo '</div>';
                }
            ?>
        </div>
    </div>
</div>

<div class="index_catalog">
    <div class="index_product_title index_product_title2">
        <div class="index_product_title_up index_product_title2_up">蔬菜粉粉</div>
    </div>
    <div class="index_product_div">
        <div class="owl-carousel owl-theme">
            <?php
                foreach($frontData2 as $value){
                    echo '<div class="index_item">';
                        echo '<span class="index_pro_title">'.$value -> pro_name.'</span>';
                        echo '<img class="product_each_img" data-pro_no="'.$value -> pro_no.'" src="'.json_decode($value->pro_img) -> img_01.'">';
                        echo '<span class="index_pro_info">NT'.$value -> pro_price;
                            echo '<img src="./Views/dogeat/DogEatVeg/web/img/icon/addtocar3.png" style="width: 150px;" class="atc" data-atcnum="'.$value -> pro_no.'">';
                        echo '</span>';
                    echo '</div>';
                }
            ?>
        </div>
    </div>
</div>
<?php 
Bundle::Js('test_js', array(
    './Content/js/lib/owl.carousel.min.js'
));
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        var owl = $('.owl-carousel');   
        owl.owlCarousel({
            margin: 10,
            responsive: {
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
            }
        })
    });

    $(".product_each_img").click(function(){
            location.href="index.php?action=ProductInfo&controller=Home_m&pro_no="+$(this).attr("data-pro_no")
    });

</script>