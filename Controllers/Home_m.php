<?php

namespace Controllers;

use Bang\MVC\ControllerBase;
// use Bang\Lib\Response;
// use Bang\Lib\TaskResult;
//use Models\DogcUrl;
// use Bang\Lib\ResponseBag;   
/**
 * 主頁面Controller
 * @author Bang
 */
class Home_m extends ControllerBase {

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
        return $this->View('','_Layout_m');
    }

    public function product() {
        $action = array(
            "controller" => "FrontDeskProductControllers",
            "action" => "proList",
            "proCataNo" => "1",
            );
            $this -> GetcUrl("front_data1",$action);    
        return $this->View('','_Layout_m');
    }

    public function benefitpage() {
        $action = array(
            "controller" => "FrontDeskProductControllers",
            "action" => "vegBenefit",
            );        
        $this -> GetcUrl("frontdata3",$action);
        return $this->View('','_Layout_m');
    }

    public function QA() {
        return $this->View('','_Layout_m');
    }
    public function member() {
        return $this->View('','_Layout_m');
    }
    public function login() {
        if(isset($_SESSION['cus_name'])){
            $this->RedirectToAction("MemberPage");
        }else{
            return $this->View('','_Layout_m');
        }
    }
    public function privacy() {
        return $this->View('','_Layout_m');
    }
    public function contact() {
        return $this->View('','_Layout_m');
    }

    public function MemberPage() {
        if(!isset($_SESSION['cus_name'])){
            $this->RedirectToAction("login");
        }else{
            return $this->View('','_Layout_m');
        }
    }
    public function check() {
        return $this->View('','_Layout_m');
    }
    public function story() {
        return $this->View('','_Layout_m');
    }
    public function report() {
        return $this->View('','_Layout_m');
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
        
        return $this->View('','_Layout_m');
    }
    public function news(){
        return $this->View('','_Layout_m');
    }
}