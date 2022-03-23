<?php

namespace Controllers;

use Bang\MVC\ControllerBase;
use Models\DogcUrl;

/**
 * 主頁面Controller
 * @author Bang
 */
class MemberControllers extends ControllerBase {

    public function Login() {
        $user_id = $_POST['userId'];
        $user_pwd = $_POST['userPsw'];

        $password_split = preg_split('//', $user_pwd, -1, PREG_SPLIT_NO_EMPTY);
        for($i=1;$i<count($password_split)-1;$i++){
        $password_split[$i] = "*";
        }
        $password_string = implode($password_split);

        $action = array(
            "controller" => "FrontDeskMemberControllers",
            "action" => "login",
            "userId" => "{$user_id}",
            "userPsw" => "{$user_pwd}" 
        );        
        $newcUrl = new DogcUrl();
        $front_data4 = $newcUrl->cUrl($action);
        if(!$front_data4){
            echo "帳號或密碼有誤";
        }else{
            $_SESSION['cus_name'] = $front_data4 -> cus_name; 
            $_SESSION['cus_id'] = $front_data4 -> cus_id; 
            $_SESSION['cus_phone'] = $front_data4 -> cus_phone; 
            $_SESSION['cus_password'] = $password_string; 
            $_SESSION['cus_point'] = $front_data4 -> cus_point; 
            echo "登入成功~".$front_data4 -> cus_name;
        };
    }

    public function MemberUpdate() {
        $cus_name = $_POST['cus_name'];
        $cus_phone = $_POST['cus_phone'];
        $cus_id = $_SESSION["cus_id"];
        $action = array(
            "controller" => "FrontDeskMemberControllers",
            "action" => "MemberUpdate",
            "cus_id" => "{$cus_id}",
            "cus_name" => "{$cus_name}",
            "cus_phone" => "{$cus_phone}"
        );   
        $newcUrl = new DogcUrl();
        $front_data4 = $newcUrl->cUrl($action);
    }

    public function Signup() {
        $sign_account = $_POST['sign_account'];
        $sign_password = $_POST['sign_password'];
        $sign_phone = $_POST['sign_phone'];
        $sign_name = $_POST['sign_name'];

        $action = array(
            "controller" => "FrontDeskMemberControllers",
            "action" => "signup",
            "sign_account" => "{$sign_account}",
            "sign_password" => "{$sign_password}",
            "sign_phone" => "{$sign_phone}",
            "sign_name" => "{$sign_name}" ,
            "cus_from" => "normal"
        );        
        $newcUrl = new DogcUrl();
        $front_data4 = $newcUrl->cUrlWithNoReturn($action);
        return $front_data4;
    }
    
    public function GoogleSignup() {
        $sign_account = $_POST['sign_account'];
        $sign_password = $_POST['sign_password'];
        $sign_name = $_POST['sign_name'];

        $action = array(
            "controller" => "FrontDeskMemberControllers",
            "action" => "signup",
            "sign_account" => "{$sign_account}",
            "sign_password" => "{$sign_password}",
            "cus_from" => "Google",
            "sign_name" => "{$sign_name}" 
        );        
        $newcUrl = new DogcUrl();
        $front_data4 = $newcUrl->cUrl($action);
        if($front_data4 == false){
            echo "已註冊過";
        }else{
            echo "還沒註冊但我幫你註冊了";
        }
    }
    public function GoogleLogin() {
        $sign_account = $_POST['sign_account'];
        $sign_password = $_POST['sign_password'];

        $action = array(
            "controller" => "FrontDeskMemberControllers",
            "action" => "login",
            "userId" => "{$sign_account}",
            "userPsw" => "{$sign_password}"
        );        
        $newcUrl = new DogcUrl();
        $front_data4 = $newcUrl->cUrl($action);
        if(!$front_data4){
            echo "帳號或密碼有誤";
        }else{
            $_SESSION['cus_name'] = $front_data4 -> cus_name; 
            $_SESSION['cus_id'] = $front_data4 -> cus_id; 
            $_SESSION['cus_phone'] = $front_data4 -> cus_phone; 
            $_SESSION['cus_point'] = $front_data4 -> cus_point; 
            echo "登入成功~".$front_data4 -> cus_name;
        };
    }

    public function EarnPoint(){
        $ord_price = $_GET["ord_price"];
        $cus_phone = $_GET["cus_phone"];

        $action = array(
            "controller" => "FrontDeskMemberControllers",
            "action" => "EarnPoint",
            "ord_price" => "{$ord_price}",
            "cus_phone" => "{$cus_phone}"
        );      
        $newcUrl = new DogcUrl();
        $newcUrl->cUrl($action);

        $_SESSION['cus_point'] = $_SESSION['cus_point'] + floor($ord_price / 100);
    }
    public function UsePoint(){
        $use_point = $_GET["use_point"];
        $cus_phone = $_GET["cus_phone"];

        $action = array(
            "controller" => "FrontDeskMemberControllers",
            "action" => "UsePoint",
            "use_point" => "{$use_point}",
            "cus_phone" => "{$cus_phone}"
        );      
        $newcUrl = new DogcUrl();
        $newcUrl->cUrl($action);

        $_SESSION['cus_point'] = $_SESSION['cus_point'] - $use_point;
    }
    public function LeaveMessage(){
        $cus_phone = $_GET["cus_phone"];
        $mes_content =$_GET["mes_content"];
        $now_date = $_GET["now_date"];
        $action = array(
            "controller" => "FrontDeskMemberControllers",
            "action" => "LeaveMessage",
            "cus_phone" => "{$cus_phone}",
            "mes_content" => "{$mes_content}",
            "now_date" => "{$now_date}"
        );        
        $newcUrl = new DogcUrl();
        echo $newcUrl->cUrl($action);
    }
    public function GetMemberMessage(){
        $cus_phone = $_GET["cus_phone"];
        $action = array(
            "controller" => "FrontDeskMemberControllers",
            "action" => "GetMemberMessage",
            "cus_phone" => "{$cus_phone}",
        );
        $newcUrl = new DogcUrl();
        $message = $newcUrl->cUrl($action);
        echo json_encode($message, JSON_UNESCAPED_UNICODE);
    }
    public function ThirdPartyLogin(){
        $cus_id = $cus_password = $_POST["cus_id"];
        $cus_name = $_POST["cus_name"];
        $action = array(
            "controller" => "FrontDeskMemberControllers",
            "action" => "ThirdPartyLogin",
            "cus_id" => "{$cus_id}",
            "cus_password" => "{$cus_password}",
            "cus_name" => "{$cus_name}",
            "cus_from" => "Facebook"
        );        
        $newcUrl = new DogcUrl();
        $user_info =  $newcUrl->cUrl($action);
        if(!$user_info){
            echo false;
        }else{
            $_SESSION['cus_name'] = $user_info -> cus_name; 
            $_SESSION['cus_id'] = $user_info -> cus_id; 
            $_SESSION['cus_phone'] = $user_info -> cus_phone; 
            $_SESSION['cus_password'] = $user_info; 
            $_SESSION['cus_point'] = $user_info -> cus_point; 
            echo "登入成功~".$user_info -> cus_name;
        };
    }
    public function updatapoint(){
        $cus_phone = $_POST["cus_phone"];
        $Bargaining_chip = $_POST["Bargaining_chip"];
        $action = array(
            "controller" => "FrontDeskMemberControllers",
            "action" => "UsePointForGame",
            "cus_phone" => "{$cus_phone}",
            "Bargaining_chip" => "{$Bargaining_chip}",
        );   
        $newcUrl = new DogcUrl();
        $result =  $newcUrl->cUrl($action);
        $_SESSION["cus_point"] = $result[0];
        $result = json_encode($result, JSON_UNESCAPED_UNICODE);
        echo $result;
    }
}
