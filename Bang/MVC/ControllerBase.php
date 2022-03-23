<?php

namespace Bang\MVC;

use Bang\Lib;
use Bang\Lib\Response;
use Bang\Lib\Url;
use Models\DogcUrl;
use Models\APIcUrl;
use Bang\Lib\ResponseBag;

/**
 * 所有Controller的基底
 * @author Bang
 */
class ControllerBase {
    function __construct() {
        $route = Route::Current();
        $controller = $route->controller;
        if($this->IsMobile()){
            if($controller == "Home"){
                $this->RedirectToAction($route->action ,'Home_m' );
            }
        }else{
            if($controller == "Home_m"){
                $this->RedirectToAction($route->action ,'Home' );
            }
        }
    }

    public function GetcUrl($dataname, $action){
        $newcUrl = new DogcUrl();
        $getdata = $newcUrl->cUrl($action);
        ResponseBag::Add($dataname, $getdata);
    }

    public function APIcUrl($dataname, $url){
        $newcUrl = new APIcUrl();
        $getdata = $newcUrl->GetAPIcUrlData($url);
        ResponseBag::Add($dataname, $getdata);
    }
    /**
     * 回傳View結果
     * 帶預設Layout.php
     */
    protected function View($viewName = "" , $layout = '_Layout') {
                        
            if(Lib\eString::IsNullOrSpace($viewName)) {
                $viewName = Route::Current()->action;
            }
            $className = Lib\eString::RemovePrefix(get_class($this), "Controllers\\");
            $viewFile = "{$className}/{$viewName}.php";
            Lib\ResponseBag::Add("View", $viewFile);;

        $layoutFile = Lib\Path::View($layout, "Shared");
        include $layoutFile;
    }

    /**
     * 回傳Json格式結果
     * @param object $obj 傳入物件，為空時將自動傳TaskResult並IsSuccess為true
     */
    protected function Json($obj = NULL) {
        if ($obj === NULL) {
            $obj = new Lib\TaskResult();
            $obj->IsSuccess = true;
        }
        $result = json_encode($obj, JSON_UNESCAPED_UNICODE);
        return $this->JsonContent($result);
    }

    /**
     * 以 Json 字串回傳json格式
     * @param string $json_str 傳入JSON格式字串，為空時將自動傳TaskResult並IsSuccess為true
     */
    protected function JsonContent($json_str) {
        header('Content-Type: application/json');
        echo $json_str;
    }

    /**
     * 重新導向網址
     * @param string $url 導向的網址
     */
    protected function RedirectToUrl($url) {
        Response::RedirectUrl($url);
        die();
    }

    /**
     * 重新導向網址
     * @param string $url 導向的網址
     */
    protected function RedirectToAction($actoiName, $controller = null, $params = array()) {
        if (null == $controller) {
            $controller = Route::Current()->controller;
        }
        $url = Url::Action($actoiName, $controller, $params);
        $this->RedirectToUrl($url);
    }

    public function IsMobile(){
        $iPod = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
        $iPhone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
        $iPad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
        if(stripos($_SERVER['HTTP_USER_AGENT'],"Android") && stripos($_SERVER['HTTP_USER_AGENT'],"mobile")){
            $Android = true;
        }else if(stripos($_SERVER['HTTP_USER_AGENT'],"Android")){
            $Android = false;
            $AndroidTablet = true;
        }else{
            $Android = false;
            $AndroidTablet = false;
        }
        $webOS = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
        $BlackBerry = stripos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
        $RimTablet= stripos($_SERVER['HTTP_USER_AGENT'],"RIM Tablet");
        //do something with this information
        if( $iPod || $iPhone || $iPad || $Android || $AndroidTablet || $webOS || $BlackBerry || $RimTablet){              
            return true;
        }else{            
            return false;
        }
    }    
}
