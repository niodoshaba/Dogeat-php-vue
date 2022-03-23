<?php 

    namespace Models;

    class DogcUrl{

        function cUrl($action,$debug = false){
            $params = http_build_query($action);
            $ip = \Config::$Api;
            $ch = curl_init();
            // 設定擷取的URL網址
            curl_setopt($ch, CURLOPT_URL, "http://$ip/backVue/index.php?$params");
            curl_setopt($ch, CURLOPT_HEADER, false);
            //將curl_exec()獲取的訊息以文件流的形式返回，而不是直接輸出。
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            // 執行
            $temp=curl_exec($ch);
            // 關閉CURL連線
            curl_close($ch);
            
            if($debug == true){
                echo $temp;
            }

            $dataname=json_decode($temp);

            return $dataname;
        }

        function cUrlWithNoReturn($action,$debug = false){
            $params = http_build_query($action);
            $ip = \Config::$Api;
            $ch = curl_init();
            // 設定擷取的URL網址
            curl_setopt($ch, CURLOPT_URL, "http://$ip/backVue/index.php?$params");
            curl_setopt($ch, CURLOPT_HEADER, false);
            //將curl_exec()獲取的訊息以文件流的形式返回，而不是直接輸出。
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            // 執行
            $temp=curl_exec($ch);
            // 關閉CURL連線
            curl_close($ch);
            
            if($debug == true){
                echo $temp;
            }
            echo $temp;
        }
        
    }
?>