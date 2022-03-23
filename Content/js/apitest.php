<?php 

public function cusInfo_post()
{
	try{
		$cusData = [
			{
				"cus_id" => "test123",
				"cus_Psw" => "test321",
				"cus_phone" => "0912345678"
				"cus_name" => "boss"
			},
			{
				"cus_id" => "test456",
				"cus_Psw" => "test654",
				"cus_phone" => "0987654321"
				"cus_name" => "manager"
			},
			{
				"cus_id" => "test789",
				"cus_Psw" => "test987",
				"cus_phone" => "0974158258"
				"cus_name" => "emp"
			}
		];

		json_encode($cusData);


		$userId = $_GET['userId'];
		$userPsw = $_GET['userPsw'];


		if(isNull($userId)||isNull($userPsw)){
			throw new Exception('沒輸入帳或密',1001);
		}
		

	}catch(Exception $e){
		$result = array(
        "IsSuccess" => $e->getCode(),
        "Message" => $e->getMessage()
    	);
	}
}

?>