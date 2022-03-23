<?php

namespace Controllers;

use Bang\MVC\ControllerBase;
use Models\DogcUrl;
use Bang\Lib\ResponseBag;
include("ECPay.Payment.Integration.php");

/**
 * 主頁面Controller
 * @author Bang
 */
class payEcpay extends ControllerBase {
    //模擬付款(線上才可用)
    public function PayEcpay(){
        // 將 post 資料轉成字串 儲存 SaveData
        $String = print_r( $_POST, true );  
        define( 'ECPay_MerchantID', '2000132' );
        define( 'ECPay_HashKey', '5294y06JbISpM5x9' );
        define( 'ECPay_HashIV', 'v77hoKGq4kWxNNIS' );
        // 重新整理回傳參數。
        $arParameters = $_POST;
        foreach ($arParameters as $keys => $value) {
            if ($keys != 'CheckMacValue') {
                if ($keys == 'PaymentType') {
                    $value = str_replace('_CVS', '', $value);
                    $value = str_replace('_BARCODE', '', $value);
                    $value = str_replace('_CreditCard', '', $value);
                }
                if ($keys == 'PeriodType') {
                    $value = str_replace('Y', 'Year', $value);
                    $value = str_replace('M', 'Month', $value);
                    $value = str_replace('D', 'Day', $value);
                }
                $arFeedback[$keys] = $value;
            }
        }
        // 計算出 CheckMacValue
        $CheckMacValue = \ECPay_CheckMacValue::generate( $arParameters, ECPay_HashKey, ECPay_HashIV );
        
        if( $_POST['RtnCode'] =='1' && $CheckMacValue == $_POST['CheckMacValue'] ){
            $ord_no = $_POST['MerchantTradeNo'];
            $newcUrl = new DogcUrl();
            $action = array(
                "controller" => "FrontDeskMemberControllers",
                "action" => "CancelOrder",
                "ord_no" => $ord_no,
                "ord_payment_status" => "已付款"
            );
            $newcUrl->cUrl($action);
            echo '1|OK';
        }
        
    }
    //訂單建立
    public function CreatOrder(){
        if(isset($_POST["MerchantID"])){
            $ord_price = $_POST["TradeAmt"];
            $ord_address = $_POST["CustomField3"];
            $ord_phone = $_POST["CustomField2"];
            date_default_timezone_set('Asia/Taipei');
            $now_date = date("Y-m-d");
            $pro_no_string = $_POST["CustomField1"];
            $ord_no = $_POST["MerchantTradeNo"];
            $ord_payment_status = "";
            $ord_payment_method = "";
            if($_POST["RtnCode"] == 2 ){ //ATM取號
                $ord_payment_method = "ATM取號";
                $ord_payment_status = "未付款";
                $ecpay_info = array(
                    "MerchantTradeNo" => $ord_no,
                    "RtnCode" => $_POST["RtnCode"],
                    "TradeAmt" => $ord_price,
                    "BankCode" => "繳費銀行代碼：".$_POST["BankCode"],
                    "vAccount" => "繳費帳號：".$_POST["vAccount"],
                    "ExpireDate" => $_POST["ExpireDate"],
                );
            }else if($_POST["RtnCode"] == 10100073){//CVS/BARCODE 
                $ord_payment_method = "條碼/代碼取號";
                $ord_payment_status = "未付款";
                if($_POST["PaymentNo"] != ""){//代碼
                    $ecpay_info = array(
                        "MerchantTradeNo" => $ord_no,
                        "RtnCode" => $_POST["RtnCode"],
                        "TradeAmt" => $ord_price,
                        "PaymentNo" => "繳費代碼：".$_POST["PaymentNo"],
                        "ExpireDate" => $_POST["ExpireDate"]
                    );
                }else{//條碼
                    $_SESSION["Barcode1"] = $_POST["Barcode1"];
                    $_SESSION["Barcode2"] = $_POST["Barcode2"];
                    $_SESSION["Barcode3"] = $_POST["Barcode3"];
                    $ecpay_info = array(
                        "MerchantTradeNo" => $ord_no,
                        "RtnCode" => $_POST["RtnCode"],
                        "TradeAmt" => $ord_price,
                        "ExpireDate" => $_POST["ExpireDate"]
                    );
                }
            }else if($_POST["RtnCode"] == 1){//信用卡
                $ord_payment_method = "信用卡";
                $ord_payment_status = "已付款";
            }
            $action = array(
                "controller" => "FrontDeskMemberControllers",
                "action" => "CreateOrder",
                "ord_no" => "{$ord_no}",
                "ord_price" => "{$ord_price}",
                "ord_address" => "{$ord_address}",
                "ord_phone" => "{$ord_phone}",
                "now_date" => "{$now_date}",
                "pro_no_string" => "{$pro_no_string}",
                "ord_payment_method" => "{$ord_payment_method}",
                "ord_payment_status" => "{$ord_payment_status}"
            );        
            $newcUrl = new DogcUrl();
            $status = $newcUrl->cUrl($action);
            if($status == 1){
                if(isset($_SESSION['cus_id'])){
                    $cus_id = $_SESSION['cus_id'];
                }else{
                    $cus_id = "guest";
                }
                $action = array(
                    "controller" => "CartControllers",
                    "action" => "cleancart",
                    "cus_id" => $cus_id,
                );        
                $newcUrl = new DogcUrl();
                $newcUrl->cUrl($action);
                if($_POST["RtnCode"] == 10100073 || $_POST["RtnCode"] == 2){//條碼/代碼、ATM回傳
                    $_SESSION["ecpay_return_info"] = $ecpay_info;
                    echo "<script>alert('訂單已建立');</script>";
                    echo "<script>location.href='/frontVue/index.php?action=check&controller=Home';</script>";
                }else{
                    echo "<script>alert('信用卡支付成功，訂單已建立');</script>";
                    echo "<script>location.href='/frontVue/index.php?action=check&controller=Home';</script>";
                }
            }else{
                echo "<script>alert('訂單建立失敗');</script>";
                echo "<script>location.href='/frontVue/index.php?action=check&controller=Home';</script>";
            }
        }
    }
}