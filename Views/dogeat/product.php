<?php 

// 建立CURL連線
$ch = curl_init();

// 設定擷取的URL網址
curl_setopt($ch, CURLOPT_URL, "http://192.168.56.103/dogeat_server/api.php?action=proList&proCataNo=1");
curl_setopt($ch, CURLOPT_HEADER, false);

//將curl_exec()獲取的訊息以文件流的形式返回，而不是直接輸出。
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

// 執行
$temp=curl_exec($ch);

// 關閉CURL連線
curl_close($ch);

$frontData=json_decode($temp);

// print_r($frontData);

?>

<!DOCTYPE html>
<html lang="zh-Hants">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog吃菜寵物零食</title>
    <link rel="stylesheet" href="./DogEatVeg/web/css/product.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    


    <div id="cardiv" class="cardiv">

        <div class="hiddiv"></div>
        <div class="incardiv">
            <p>您的購物車</p>
            <div id="closecar">&times</div>
            <div id='incarout'>

            </div>
        </div>
        <span class="total">合計：NTD 130</span>
        <a href="#"><div id="paybtn">結帳GO</div></a>
    </div>
  
    <div class="header">


        <button type="button" id="hamburger_icon">
            <span class="hr" id="hr1"></span>
            <span class="hr" id="hr2"></span>   
            <span class="hr" id="hr3"></span>
        </button>

        <ul class="menubur">
            <li class="menup menup1"><a href="product.html">蔬菜零食</a></li>
            <li class="menup menup2"><a href="product2.html">蔬菜粉粉</a></li>
            <li class="menup menup3"><a href="benefitpage.html">蔬菜功效</a></li>
            <li class="menup menup4"><a href="QA.html">常見問題</a></li>
            <li class="menup menup5"><a href="member.html">會員獨享</a></li>
            <li class="menup menup6 sm-menup"><a href="story.html">品牌故事</a></li>
            <li class="menup menup7 sm-menup"><a href="report.html">檢驗報告</a></li>
            <li class="menup menup8 sm-menup"><a href="privacy.html">網站服務條款與隱私權政策</a></li>
            <li class="menup menup9 sm-menup"><a href="contact.html">聯絡我們</a></li>

        </ul>


    <div class="logo">
            <a href="index.html" id="logoa">
            <img src="./DogEatVeg/web/img/logowithtext.png" alt="logo">
            </a>
            <a href="index.html" id="logoa">
                <img src="./DogEatVeg/web/img/logo.png" alt="logo">
            </a>
    </div>
    
    <div class="headerbtn">
        
        <a href="product.html">
        <div class="headerbtn_desert"> <img src="./DogEatVeg/web/img/focus.png" alt="">蔬菜零食</div>
        </a>
        <a href="product2.html">
        <div class="headerbtn_vegetable"> <img src="./DogEatVeg/web/img/focus.png" alt="">蔬菜粉粉</div>
        </a>
        <a href="benefitpage.html">
            <div class="headerbtn_benefit_page"> <img src="./DogEatVeg/web/img/focus.png" alt="">蔬菜功效</div>
            </a>
        <a href="QA.html">
        <div class="headerbtn_QA"> <img src="./DogEatVeg/web/img/focus.png" alt="">常見問題</div>
        </a>
        <a href="member.html">
        <div class="headerbtn_formember"> <img src="./DogEatVeg/web/img/focus.png" alt="">會員獨享</div>
        </a>
    </div>
    <div class="carandmember">
        <button type="button" class="headerbtn_shopcar">
            <a href="#">
            <img src="./DogEatVeg/web/img/icon/shopcar.svg" alt="shopcar">
            </a>
            <div id="atchint">  
                <!-- 購物車上的圓點 -->
            </div>
            <a href="#">
                <img src="./DogEatVeg/web/img/icon/shopcar_rwd.png" alt="shopcar">
            </a>
        </button>
        <button class="headerbtn_member">
            <a href="login.html">
            <img src="./DogEatVeg/web/img/icon/member.svg" alt="member">
            </a>
            <a href="login.html">
                <img src="./DogEatVeg/web/img/icon/member_rwd.png" alt="member"">
            </a>
        </button>
    </div>
    
    </div>
    <div class="banner_line">
    <img src="./DogEatVeg/web/img/banner_line.png" alt="" id="banner_line">
    </div>
<div class="bg">

    <div class="benefit_btn">
        <a href="benefitpage.html" id="benefitbtn_a">
            <img src="./DogEatVeg/web/img/benefit_btn.png" alt="">
        </a>
    </div>

    <div class="secondview_down_text">
        <p>蔬菜零食</p>
    </div>

    <!-- <div class="index_productdiv" >
        <div class="index_product index_product1" >
            <div class="productcardup">
                <div class="cardimg" data-cardnumber="1">
                <img src="./DogEatVeg/web/img/tag1.png" alt=""  class="tag">
                <img src="./DogEatVeg/web/img/Heybogua/ch1.png" alt="">
                <div class="productbtn">彩虹雞胸乾</div>
                </div>

            </div>
            <div class="product_textdiv">
                <span class="product_text">NT$130</span>
                <button type="button"  class="atc" data-atcnum="1">
                    <img src="./DogEatVeg/web/img/icon/addtocar3.png" alt="" >
                </button>
            </div>
        </div>
        <div class="index_product index_product1" >
            <div class="productcardup">
                <div class="cardimg" data-cardnumber="2">
                <img src="./DogEatVeg/web/img/tag2.png" alt=""  class="tag">
                <img src="./DogEatVeg/web/img/Heybogua/ch2.png" alt="">
                <div class="productbtn">菠菜雞胸乾</div>
                </div>

            </div>
            <div class="product_textdiv">
                <span class="product_text">NT$130</span>
                <button type="button"  class="atc" data-atcnum="2">
                    <img src="./DogEatVeg/web/img/icon/addtocar3.png" alt="">
                </button>
            </div>
        </div>
        <div class="index_product index_product1">
            <div class="productcardup">
                <div class="cardimg" data-cardnumber="3">
                <img src="./DogEatVeg/web/img/tag3.png" alt=""  class="tag">
                <img src="./DogEatVeg/web/img/Heybogua/ch3.png" alt="">
                <div class="productbtn">南瓜雞胸乾</div>
                </div>

            </div>
            <div class="product_textdiv">
                <span class="product_text">NT$130</span>
                <button type="button"  class="atc" data-atcnum="3">
                    <img src="./DogEatVeg/web/img/icon/addtocar3.png" alt="">
                </button>
            </div>
        </div>
        <div class="index_product index_product1">
            <div class="productcardup">
                <div class="cardimg" data-cardnumber="4">
                <img src="./DogEatVeg/web/img/tag4.png" alt=""  class="tag">
                <img src="./DogEatVeg/web/img/Heybogua/ch4.png" alt="">
                <div class="productbtn">胡蘿蔔雞胸乾</div>
                </div>
            </div>
            <div class="product_textdiv">
                <span class="product_text">NT$130</span>
                <button type="button"  class="atc" data-atcnum="4">
                    <img src="./DogEatVeg/web/img/icon/addtocar3.png" alt="" >
                </button>
            </div>
        </div> 
        <div class="index_product index_product1" >
            <div class="productcardup">
                <div class="cardimg" data-cardnumber="5">
                <img src="./DogEatVeg/web/img/tag1.png" alt=""  class="tag">
                <img src="./DogEatVeg/web/img/Heybogua/ch1.png" alt="">
                <div class="productbtn">彩虹雞胸乾</div>
                </div>

            </div>
            <div class="product_textdiv">
                <span class="product_text">NT$130</span>
                <button type="button"  class="atc" data-atcnum="5">
                    <img src="./DogEatVeg/web/img/icon/addtocar3.png" alt="" >
                </button>
            </div>
        </div>
        <div class="index_product index_product1" >
            <div class="productcardup">
                <div class="cardimg" data-cardnumber="6">
                <img src="./DogEatVeg/web/img/tag2.png" alt=""  class="tag">
                <img src="./DogEatVeg/web/img/Heybogua/ch2.png" alt="">
                <div class="productbtn">菠菜雞胸乾</div>
                </div>

            </div>
            <div class="product_textdiv">
                <span class="product_text">NT$130</span>
                <button type="button"  class="atc" data-atcnum="6">
                    <img src="./DogEatVeg/web/img/icon/addtocar3.png" alt="" >
                </button>
            </div>
        </div>
        <div class="index_product index_product1" >
            <div class="productcardup">
                <div class="cardimg" data-cardnumber="7">
                <img src="./DogEatVeg/web/img/tag3.png" alt=""  class="tag">
                <img src="./DogEatVeg/web/img/Heybogua/ch3.png" alt="">
                <div class="productbtn">南瓜雞胸乾</div>
                </div>

            </div>
            <div class="product_textdiv">
                <span class="product_text">NT$130</span>
                <button type="button"  class="atc" data-atcnum="7">
                    <img src="./DogEatVeg/web/img/icon/addtocar3.png" alt="" >
                </button>
            </div>
            </div>
        <div class="index_product index_product1">
            <div class="productcardup">
                <div class="cardimg" data-cardnumber="8">
                <img src="./DogEatVeg/web/img/tag4.png" alt=""  class="tag">
                <img src="./DogEatVeg/web/img/Heybogua/ch4.png" alt="">
                <div class="productbtn">胡蘿蔔雞胸乾</div>
                </div>
            </div>
            <div class="product_textdiv">
                <span class="product_text">NT$130</span>
                <button type="button"  class="atc" data-atcnum="8">
                    <img src="./DogEatVeg/web/img/icon/addtocar3.png" alt="" >
                </button>
            </div>
        </div>  
    </div>  -->

    <div class="index_productdiv">
    <?php 

    for($i=0;$i<count($frontData);$i++){
    	echo '	<div class="index_product index_product1" >
                	<div class="productcardup">
                    	<div class="cardimg" data-cardnumber="$i">
                        	<img src="./DogEatVeg/web/img/tag1.png" alt=""  class="tag">
                			<img src="';
        echo        		($frontData[$i] -> pro_img);
        echo'        			" alt="">
                			<div class="productbtn">';
        echo 				($frontData[$i] -> pro_name);
        echo '				</div>
                		</div>
            		</div>
            		<div class="product_textdiv">
                		<span class="product_text">NT$';
        echo        	($frontData[$i] -> pro_price);
        echo        	'</span>
                		<button type="button"  class="atc" data-atcnum="1">
                    		<img src="./DogEatVeg/web/img/icon/addtocar3.png" alt="" >
                		</button>
            		</div>
        		</div>';
    }

    ?>
	</div>

<div class="footer_line">
    <img src="./DogEatVeg/web/img/banner_line.png" alt="" >
    </div>
    <div class="footer">
        <div class="footerlogo">
                <img src="./DogEatVeg/web/img/logo.png" alt="logo">
        </div>

        <div class="footertext">
            <p class="name">Dog吃菜</p>  
            <p class="copyright">© 2020 By Niodoshaba</p>
        </div>

        <div class="footerbtn">
            <a href="story.html">
                <div class="footerbtn_story">品牌故事</div>
                </a>
                <a href="report.html">
                <div class="footerbtn_report">檢驗報告</div>
                </a>
                <a href="privacy.html">
                <div class="footerbtn_policy">服務條款與隱私政策</div>
                </a>
                <a href="contact.html">
                <div class="footerbtn_contact">聯絡我們</div>
        </div>
        <div class="socialsign">
            <div class="facebook">
                <a href="https://www.facebook.com/">
                <img src="./DogEatVeg/web/img/icon/FB.png" alt="facebook">
                </a>
            </div>
            <div class="line">
                <a href="https://line.me/zh-hant/">
                <img src="./DogEatVeg/web/img/icon/LINE.png" alt="line">
                </a>
            </div>
            <div class="instagram">
                <a href="https://www.instagram.com/">
                <img src="./DogEatVeg/web/img/icon/IG.png" alt="ig">
                </a>
            </div>
        </div>
    </div>
      <script src="node_modules/gsap/src/minified/TweenMax.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="./js/product.js"></script>
</body>
</html> 



