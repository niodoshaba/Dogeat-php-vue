<?php 
// ini_set('display_errors','on');     # 開啟錯誤輸出 
// error_reporting(E_ALL);


require_once("mysql_connect.php");

$userId = $_GET['userId'];
$userPsw = $_GET['userPsw'];

$sql = "SELECT cus_name, cus_phone
        FROM  `custom`
        WHERE cus_id = `test123` AND cus_password = `test321`
        ";
        
$customApi = $pdo->prepare($sql);
$customApi -> execute();

if( $customApi->rowCount()==0){ //查無此人
    echo "沒這人";
}else{ //登入成功
  //自資料庫中取回資料
  $customInfo = array();
  while($customRow = $customApi->fetch(PDO::FETCH_ASSOC)){ 
    $customInfo[] = $customRow;
  }
  echo json_encode($customInfo);

}


?>