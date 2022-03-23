<?php 
use Bang\Lib\Bundle;

Bundle::Css('test_css', array(
    'Content/css/header_footer.css',
));

// //藍新
// function create_mpg_aes_encrypt ($parameter = "" , $key = "", $iv = "") {
//     $return_str = '';
//     if (!empty($parameter)) {
//     //將參數經過 URL ENCODED QUERY STRING
//     $return_str = http_build_query($parameter);
//     }
//     return trim(bin2hex(openssl_encrypt(addpadding($return_str), 'aes-256-cbc', $key, OPENSSL_RAW_DATA|OPENSSL_ZERO_PADDING, $iv)));
//     }
// function addpadding($string, $blocksize = 32) {
//     $len = strlen($string);
//     $pad = $blocksize - ($len % $blocksize);
//     $string .= str_repeat(chr($pad), $pad);
//     return $string;
//     }

//     $trade_info_arr = array(
//         'MerchantID' => 'MS116212762',
//         'RespondType' => 'JSON',
//         'TimeStamp' => time(),
//         'Version' => 1.5,
//         'MerchantOrderNo' => rand(10000,99999),
//         'Amt' => 1000,
//         'ItemDesc' => 'UnitTest',
//         'Email' => 'kof011466@gmail.com',
//         'LoginType' => 0,

//         );
//         $mer_key = 'z4Dl18uIdDl59CBlbwSNqDsZPjXFhoE5';
//         $mer_iv = 'C1n74nZ5kDXoZZOP';
//         //交易資料經 AES 加密後取得 TradeInfo
//         $tradeInfo = create_mpg_aes_encrypt($trade_info_arr, $mer_key, $mer_iv); 

//         // echo $tradeInfo;
//         // echo "<hr>";

//         $tradesha_info = "HashKey=".$mer_key."&".$tradeInfo."&HashIV=".$mer_iv;
//         // echo $tradesha_info;
//         // echo "<hr>";

//         $tradesha = strtoupper(hash("sha256", $tradesha_info));
//         // echo $tradesha;
//         // echo "<hr>";

//         //解碼
//         function create_aes_decrypt($parameter = "", $key = "", $iv = "") {
//             return strippadding(openssl_decrypt(hex2bin($parameter),'AES-256-CBC',
//             $key, OPENSSL_RAW_DATA|OPENSSL_ZERO_PADDING, $iv));
//         }
//         function strippadding($string) {
//             $slast = ord(substr($string, -1));
//             $slastc = chr($slast);
//             $pcheck = substr($string, -$slast);
//             if (preg_match("/$slastc{" . $slast . "}/", $string)) {
//                 $string = substr($string, 0, strlen($string) - $slast);
//                 return $string;
//             } else {
//                 return false;
//             }
//         }

//         $aa = create_aes_decrypt($tradeInfo, $mer_key, $mer_iv);
//         // echo $aa;
//         // echo "<hr>";
        
?>

<!-- <form style="display:inline-block;margin-bottom:10px" id="ECPayForm" method="POST" action="https://ccore.spgateway.com/MPG/mpg_gateway" target="_self">
    <input type="hidden" name="MerchantID" value="MS116212762" />
    <input type="hidden" name="TradeInfo" value="<?echo $tradeInfo?>" />
    <input type="hidden" name="TradeSha" value="<?echo $tradesha?>" />
    <input type="hidden" name="Version" value="1.5" />
    <input type="submit" id="__paymentButton" value="藍新" />
</form> -->


<?php 

// 新聞
// $ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, 'https://gnews.io/api/v4/search?q=寵物&lang=zh&country=tw&token=5b7edcfe3f7e0f0aa6ca412b93a2296b');  //5b7edcfe3f7e0f0aa6ca412b93a2296b & e414735f9d17afeedf5f974e2fc07992
curl_setopt($ch, CURLOPT_HEADER, false);
//將curl_exec()獲取的訊息以文件流的形式返回，而不是直接輸出。
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
$data = curl_exec($ch); 
curl_close($ch); 

$news_data = json_decode($data);

?>

<div style="display:flex;flex-wrap:wrap;justify-content:center">
<?php 
    for($i=0;$i<8;$i++){
        echo '
        <div class="news_content" style="border:3px solid #6bbc64;border-radius:15px;overflow:hidden;display:flex;flex-direction:column;width:20%;margin:25px">
            <div class="news_img" style="height:200px">
                <a style="display:flex;justify-content:center;height:100%" href="'.$news_data -> articles[$i] -> url.'">
                    <img style="height:100%" src="'.$news_data -> articles[$i] -> image.'" alt="">
                </a>
            </div>
            <div style="height:75px;font-size:18px;padding:5px 5px;background-color:#6bbc64;color:white;display:flex;justify-content:center;align-items:center;overflow-y:auto" class="news_title">'
            .$news_data -> articles[$i] -> title
            .'</div>
            <div style="font-size:16px;margin:10px 5px;height:175px;overflow-y:auto" class="news_content">'.
            $news_data -> articles[$i] -> description
            .'</div>
        </div>
        ';
    }
?>
</div>

<script>

// $.ajax({
//         url: "<?php echo Bang\Lib\Url::Action('API','Ajax') ?>",   //後端的URL
//         type: "POST",   //用POST的方式
//         dataType: "json",   //response的資料格式
//         cache: false,   //是否暫存
//         data: {"url":"https://data.tycg.gov.tw/api/v1/rest/datastore/bf55b21a-2b7c-4ede-8048-f75420344aed?format=json"},
//         success: function(resp) {                
//             console.log(resp);
//             console.log(resp["result"]);
//             console.log(resp["result"]["records"]);
//             for(i=0;i<resp["result"]["records"].length;i++){
//                 console.log(resp["result"]["records"][i]["BusStatus"]);
//                 console.log(resp["result"]["records"][i]["BusID"]);

//                 if(resp["result"]["records"][i]["BusStatus"] == "0"){
//                     console.log(resp["result"]["records"][i]["BusID"]);
//                 }

//             }
//         } 
//     });

</script>