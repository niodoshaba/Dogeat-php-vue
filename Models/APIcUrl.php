<?php 

    namespace Models;

    class APIcUrl{

        function GetAPIcUrlData($url,$debug = false){

            $ch = curl_init();
            // 設定擷取的URL網址
            $header = array();
            $header[] = "accept: text/json";
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, false);
            //將curl_exec()獲取的訊息以文件流的形式返回，而不是直接輸出。
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            // 執行
            $temp=curl_exec($ch);
            if($debug){
                echo curl_error($ch);
                print_r($temp);
                die();
            }
            // 關閉CURL連線
            curl_close($ch);

            $dataname=json_decode($temp);
            return $dataname;

        }
    }
?>