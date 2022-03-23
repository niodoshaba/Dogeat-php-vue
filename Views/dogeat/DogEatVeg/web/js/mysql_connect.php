<?php 
	$dsn = "mysql:host=192.168.56.103; port=3306; dbname=dogeatveg; cahrest=utf8;";
    $user = "root";
    $password = "4rfv3edc";
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
    $pdo = new PDO($dsn, $user, $password,$options);
?>