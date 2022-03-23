<?php 

// $userData = "action=login&userId=test456&userPsw=test654";
$userData = "action=proList&proCataNo=1";
// $userData = "action=vegBenefit&vegNo=1";

$curl = curl_init("http://192.168.56.103/dogeat_server/api.php?$userData");

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); //SSL
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//SSL

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//這個若是沒設 , curl_exec($curl) 會直接印出來


curl_setopt ($curl, CURLOPT_HEADER, 0); // 得到回傳的HTTP頁面.

$data = curl_exec($curl);

echo "$data"; //輸出傳回值

curl_close($curl);

?>

