<?php 

$frontData1 = Bang\Lib\ResponseBag::Get('front_data1');

?>

<div class="product_title">
        <p>蔬菜零食</p>
</div>
<div class="product_all_div">
<?php 
for($i=0;$i<count($frontData1);$i++){
    echo '	<div class="index_product index_product'.$i.'" >
                <div class="productcardup">
                    <div class="cardimg" data-cardnumber="'.($frontData1[$i] -> pro_no).'">
                        <img src="Content/img/tag1.png" alt=""  class="tag">
                        <img  class="product_each_img pro_img" data-pro_no="'.($frontData1[$i] -> pro_no).'" src="';
    echo        		json_decode($frontData1[$i]->pro_img) -> img_01;
    echo'        			" alt="">
                        <div class="productbtn">';
    echo 				($frontData1[$i] -> pro_name);
    echo '				</div>
                    </div>
                </div>
                <div class="product_textdiv">
                    <span class="product_text">NT$';
    echo        	'<span class="product_text price" data-cardprice="'.($i+1).'">'.($frontData1[$i] -> pro_price).'</span>' ;
    echo        	'</span>
                    <button type="button"  class="atc" data-atcnum="'.($frontData1[$i] -> pro_no).'">
                        <img src="Content/img/icon/addtocar3.png" alt="" >
                    </button>
                </div>
            </div>';
}
?>
</div>

<script>
    
        $(".product_each_img").click(function(){
            location.href="index.php?action=ProductInfo&controller=Home_m&pro_no="+$(this).attr("data-pro_no")
        });

</script>

