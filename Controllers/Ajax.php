<?php

namespace Controllers;

use Bang\MVC\ControllerBase;
use Bang\Lib\ResponseBag;
use Models\APIcUrl;

/**
 * 主頁面Controller
 * @author Bang
 */
class Ajax extends ControllerBase {

    public function API() {
        $url = $_POST['url'];
        $dataname = $_POST['dataname'];
        $newcUrl = new APIcUrl();
        $api_data = $newcUrl->GetAPIcUrlData($url);
        ResponseBag::Add($dataname, $api_data);
        echo (json_encode($api_data));
    }

}
