<?php 
use Bang\Lib\Bundle;

$frontData3 = Bang\Lib\ResponseBag::Get('frontData3');

?>

<div class="benefit_title">
    <p>蔬菜功效</p> 
</div>
<div class="benefitpage">
    <div class="benefitpage_up">
        <div class="benefit_book">
            <img src="Content/img/benefit_bg4.png" alt="" id="bookrwd">
            <?php  
            for($i=0;$i<count($frontData3);$i++) {
                echo '<div class="benefit_switch" id="benefit_switchdiv'.($i+1).'">';
                echo '<span class="t1">'.($frontData3[$i] -> veg_name).'</span><br>'; 
                echo '<span class="t2">'.($frontData3[$i] -> veg_textarea1).'</span>';
                echo '<div class="benefit_textdown">'.($frontData3[$i] -> veg_textarea2).'</div>';
                echo '</div>';
            }
            ?>
            <div class="benefit_pic">
                    <?php echo '<img src='.($frontData3[0] -> veg_img_big).' alt="" id="vegetable_pic1" class="benefit_veg_pic">' ?>
                    <?php echo '<img src='.($frontData3[1] -> veg_img_big).' alt="" id="vegetable_pic2" class="benefit_veg_pic">' ?>
                    <?php echo '<img src='.($frontData3[2] -> veg_img_big).' alt="" id="vegetable_pic3" class="benefit_veg_pic">' ?>
                    <?php echo '<img src='.($frontData3[3] -> veg_img_big).' alt="" id="vegetable_pic4" class="benefit_veg_pic">' ?>
            </div>
            <div class="benefit_rwdtag">
                <img src="Content/img/benefit_tag1_rwd.png"  id="bnftag1rwd" class="benefit_tag">
                <img src="Content/img/benefit_tag2_rwd.png"  id="bnftag2rwd" class="benefit_tag">
                <img src="Content/img/benefit_tag4_rwd.png"  id="bnftag4rwd" class="benefit_tag">
                <img src="Content/img/benefit_tag3_rwd.png"  id="bnftag3rwd" class="benefit_tag">
            </div>
        </div>       

       
    </div>
</div>
<div id="benefit_down_div">
<div class="benefit_howtodo2">
    <p>我們選用最優質的各種蔬菜食材，切碎、搗碎後經過12小時以上的低溫烘焙，
    最後磨碎成粉，製造出狗狗們最喜歡的健康蔬菜粉。</p>
</div>
<div id="benefit_cookpicdiv">
    <div id="benefitpage_down1" class="benefitpage_down">
        <img src="Content/img/cook1.png" alt="">
        <img src="Content/img/cook2.png" alt="">
        <img src="Content/img/cook3.png" alt="">
        <img src="Content/img/cook4.png" alt="">
    </div>
    <div id="benefitpage_down2" class="benefitpage_down">
        <img src="Content/img/cook2.png" alt="">
        <img src="Content/img/cook3.png" alt="">
        <img src="Content/img/cook4.png" alt="">
        <img src="Content/img/cook1.png" alt="">
    </div>
    <div id="benefitpage_down3" class="benefitpage_down">
        <img src="Content/img/cook3.png" alt="">
        <img src="Content/img/cook4.png" alt="">
        <img src="Content/img/cook1.png" alt="">
        <img src="Content/img/cook2.png" alt="">
    </div>
    <div id="benefitpage_down4" class="benefitpage_down">
        <img src="Content/img/cook4.png" alt="">
        <img src="Content/img/cook1.png" alt="">
        <img src="Content/img/cook2.png" alt="">
        <img src="Content/img/cook3.png" alt="">
    </div>
</div>
</div>

<?php 

Bundle::Js('test_js', array(
    './Content/js/js_m/benefitpage.js'
));

?>