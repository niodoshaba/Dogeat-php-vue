<?php

namespace Controllers;

use Bang\MVC\ControllerBase;
use Models\DogcUrl;

/**
 * 主頁面Controller
 * @author Bang
 */
class CartControllers extends ControllerBase {
    public function CartAdd() {
        if(isset($_SESSION['cus_id'])){
            $cus_id = $_SESSION['cus_id'];
        }else{
            $cus_id = "guest";
        }
        $pro_no = $_GET['pro_no'];
        $action = array(
            "controller" => "CartControllers",
            "action" => "cartadd",
            "cus_id" => $cus_id,
            "pro_no" => $pro_no,
        );        
        // print_r(http_build_query(($action)));
        $newcUrl = new DogcUrl();
        echo $newcUrl->cUrlWithNoReturn($action);
    }

    public function CartRender() {
        if(isset($_SESSION['cus_id'])){
            $cus_id = $_SESSION['cus_id'];
        }else{
            $cus_id = "guest";
        }
        $action = array(
            "controller" => "CartControllers",
            "action" => "cartrender",
            "cus_id" => $cus_id,
        );        
        // print_r(http_build_query(($action)));
        $newcUrl = new DogcUrl();
        $pro_data = $newcUrl->cUrl($action);
        $pro_data2 = json_encode($pro_data, JSON_UNESCAPED_UNICODE);
        echo $pro_data2;
        return $pro_data2;
    }

    public function DeleteCart() {
        $orditem_no = $_POST['orditem_no'];
        
        $action = array(
            "controller" => "CartControllers",
            "action" => "deletecart",
            "orditem_no" => $orditem_no,
        );   
        // print_r(http_build_query(($action)));
        $newcUrl = new DogcUrl();
        $pro_data = $newcUrl->cUrl($action);
    }

    public function CleanCart() {
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
        $pro_data = $newcUrl->cUrl($action);
    }
}
