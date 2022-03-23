<?php

namespace Controllers;

use Bang\MVC\ControllerBase;
use Models\DogcUrl;
include("ECPay.Payment.Integration.php");

/**
 * 主頁面Controller
 * @author Bang
 */
class OrderControllers extends ControllerBase {

    public function CreateOrder(){
        $ord_price = $_POST["ord_price"];
        $ord_address = $_POST["ord_address"];
        $ord_phone = $_POST["ord_phone"];
        $now_date = $_POST["now_date"];
        $pro_no = $_POST["pro_no"];
        $pro_no_string= str_replace(" ","_",$pro_no);
        $action = array(
            "controller" => "FrontDeskMemberControllers",
            "action" => "CreateOrder",
            "ord_price" => "{$ord_price}",
            "ord_address" => "{$ord_address}",
            "ord_phone" => "{$ord_phone}",
            "now_date" => "{$now_date}",
            "pro_no_string" => "{$pro_no_string}"
        );        
        $newcUrl = new DogcUrl();
        echo $newcUrl->cUrlWithNoReturn($action);
    }

    public function CheckOrder(){
        $cus_phone = $_GET["cus_phone"];

        $action = array(
            "controller" => "FrontDeskMemberControllers",
            "action" => "CheckOrderInfo",
            "cus_phone" => "{$cus_phone}",
        );        
        $newcUrl = new DogcUrl();
        $check_order_data = $newcUrl->cUrl($action);
        $check_order = json_encode($check_order_data, JSON_UNESCAPED_UNICODE);
        echo $check_order;
    }

    public function CancelOrder(){
        $ord_no = $_POST["ord_no"];
        $ord_status = $_POST["ord_status"];

        $action = array(
            "controller" => "FrontDeskMemberControllers",
            "action" => "CancelOrder",
            "ord_no" => "{$ord_no}",
            "ord_status" => "{$ord_status}",
        );        
        $newcUrl = new DogcUrl();
        $newcUrl->cUrl($action);
        echo "訂單編號:".$ord_no. "已取消";
    }
    public function Ecpay(){
        $ord_price = $_POST["ord_price"];
        $pro_info = $_POST["pro_info"];
        $ord_phone = $_POST["ord_phone"];
        $ord_address = $_POST["ord_address"];
        $pro_no = $_POST["pro_no"];
        $pro_no_string= str_replace(" ","_",$pro_no);
        $obj = new \ECPay_AllInOne();
        // //服務參數
        $obj->ServiceURL  = "https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5";
        $obj->HashKey     = "5294y06JbISpM5x9";
        $obj->HashIV      = "v77hoKGq4kWxNNIS";
        $obj->MerchantID  = "2000132";
        //
        $obj->Send['MerchantTradeNo'] = date("YmdHis").rand(10,99)."178";
        $obj->Send['MerchantTradeDate'] = date("Y/m/d H:i:s");
        $obj->Send['PaymentType'] = "aio";
        $obj->Send['TotalAmount'] = $ord_price;
        $obj->Send['TradeDesc'] = "ecpay 商城購物";
        $obj->Send['ReturnURL'] = "https://".\Config::$Api."/frontVue/index.php?action=PayEcpay&controller=PayEcpay";
        $obj->Send['ChoosePayment'] = \ECPay_PaymentMethod::ALL;
        $obj->Send['OrderResultURL'] = "http://".\Config::$Api."/frontVue/index.php?action=CreatOrder&controller=PayEcpay";//信用卡付款完成返回此頁
        $obj->SendExtend['ClientRedirectURL'] = "http://".\Config::$Api."/frontVue/index.php?action=CreatOrder&controller=PayEcpay";//取號完成後回傳頁面
        $obj->Send['CustomField1'] = $pro_no_string;
        $obj->Send['CustomField2'] = $ord_phone;
        $obj->Send['CustomField3'] = $ord_address;
        // //訂單的商品資料
        for($i=0;$i<count($pro_info);$i++){
            array_push($obj->Send['Items'], array(
                'Name' => $pro_info[$i][0],
                'Price' => $pro_info[$i][1],
                'Currency' => "元",
                'Quantity' => (int)"1"
            )
            );
        }
        //產生訂單(auto submit至ECPay)
        $obj->CheckOut();
        $Response = (string)$obj->CheckOutString();
        echo $Response;
    }
}