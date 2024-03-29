﻿<?php 
	include("../lib/php/publicDB.php");
	
	function send_notification ($tokens, $message)
	{
		$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array(
			 'registration_ids' => $tokens,
			 'data' => $message
			);

		$headers = array(
			'Authorization:key =' . GOOGLE_API_KEY,
			'Content-Type: application/json'
			);

	   $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);           
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       return $result;
	}
	

	//데이터베이스에 접속해서 토큰들을 가져와서 FCM에 발신요청
	$db = new mDB();

	$strSQL = "select DISTINCT fcmtoken from tb_fcm";

	$rs = new mRS($db, $strSQL);
	$tokens = array();

	while($rs->next()){
			$tokens[] = $row["token"];
	}
	$db->close();
	$db=null;
	
  $myMessage = $_REQUEST['message']; //폼에서 입력한 메세지를 받음
	if ($myMessage == ""){
		$myMessage = "전체 보내기";
	}

	$message = array("message" => $myMessage);
	$message_status = send_notification($tokens, $message);
	echo $message_status;

 ?>
