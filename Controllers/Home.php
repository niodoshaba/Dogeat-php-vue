<?php

namespace Controllers;

use Bang\MVC\ControllerBase;
// use Bang\Lib\Response;
// use Bang\Lib\TaskResult;
// use Bang\Lib\ResponseBag;   
/**
 * 主頁面Controller
 * @author Bang
 */
class Home extends ControllerBase {

    public function index() {
        $action = array(
            "controller" => "FrontDeskProductControllers",
            "action" => "proList",
            "proCataNo" => "1",
            );        
        $this -> GetcUrl("front_data1",$action);
        $action = array(
            "controller" => "FrontDeskProductControllers",
            "action" => "proList",
            "proCataNo" => "2",
            );        
        $this -> GetcUrl("front_data2",$action); 

        return $this->View();
    }

    public function product() {
        $action = array(
            "controller" => "FrontDeskProductControllers",
            "action" => "proList",
            "proCataNo" => "1",
            );        
        $this -> GetcUrl("front_data1",$action);
        return $this->View();
    }

    public function product2() {
        $action = array(
            "controller" => "FrontDeskProductControllers",
            "action" => "proList",
            "proCataNo" => "2",
            );        
        $this -> GetcUrl("frontdata2",$action); 
        return $this->View();
    }

    public function benefitpage() {
        $action = array(
            "controller" => "FrontDeskProductControllers",
            "action" => "vegBenefit",
            );        
        $this -> GetcUrl("frontdata3",$action);
        return $this->View();
    }
    
    public function login() {
        if(isset($_SESSION['cus_name'])){
            echo "<script>alert('您已登入~返回上一頁');
                history.back();
                </script> ";
            // exit();
        }else{
            return $this->View();
        }
    }

    public function MemberPage() {
        if(!isset($_SESSION['cus_name'])){
            echo "<script>alert('請先登入');
                location.href ='index.php?action=login&controller=Home'
                </script> ";
            // exit();
        }else{
            return $this->View();
        }
    }

    public function QA() {
        return $this->View();
    }

    public function member() {
        return $this->View();
    }

    public function check() {
        $action = array(
            "controller" => "Home",
            "action" => "Check");       
        $this -> GetcUrl("pro_detail",$action);
        return $this->View();
    }
    public function story() {
        return $this->View();
    }
    public function report() {
        return $this->View();
    }
    public function privacy() {
        return $this->View();
    }
    
    public function contact() {
        return $this->View();
    }
    public function ProductInfo() {
        $pro_no = $_GET['pro_no'];

        if(!isset($_GET["pro_no"])){
            $this->RedirectToAction("product");
        }
        
        $action = array(
            "controller" => "FrontDeskProductControllers",
            "action" => "proInfo",
            "pro_no" => $pro_no);
        $this -> GetcUrl("pro_info",$action);
        
        return $this->View();
    }
    public function news(){
        return $this->View();
    }
    // public function test(){
    //     return $this->View();
    // }
}