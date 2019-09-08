<?php 
	include("../lib/php/publicCharset.php");

	
	define("GOOGLE_API_KEY", "."); 


	function send_notification ($tokens, $message)
	{
	
		$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array(
			 'to' => $tokens,
			 'data' => $message
			);

		//print_r($fields);		


		$headers = array(
			'Authorization:key =' . GOOGLE_API_KEY,
			'Content-Type: application/json'
			);

		//print_r($headers);	

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

	$db = new mDB();
	
	$strSQL = "select fcmtoken from tb_fcm ";
	//$strSQL = " where fcmsq = '".$_REQUEST["fcmsq"]."' and fcmtoken = '".$_REQUEST["fcmtoken"]."' ";
	$strSQL.= " where fcmsq = '21' and fcmtoken = 'eR4aKMcJVNg:APA91bELfJUr1g5oWkoqwICpgFPSJlycfeFdT8LDT7rTs0x_wK5L7NWYN_XBhqbjwBcj_qCaIzcvfR90u8T50iEzm3PN6Tj1o_VewuJzwVfOQCwQ85yjb9yuaUfL8XVZPU_HxabGmujg' ";

	//$token="eR4aKMcJVNg:APA91bELfJUr1g5oWkoqwICpgFPSJlycfeFdT8LDT7rTs0x_wK5L7NWYN_XBhqbjwBcj_qCaIzcvfR90u8T50iEzm3PN6Tj1o_VewuJzwVfOQCwQ85yjb9yuaUfL8XVZPU_HxabGmujg";
	$rs = new mRS($db, $strSQL);
	
	$myMessage = "엑스칼리버가 오픈되었습니다.";
	//$message = iconv("euc-kr","utf-8",$message) ; 
	$message = array("message" => $myMessage);
	
	while($rs->next()){
		$message_status = send_notification($rs->f("fcmtoken"), $message);
	}

	echo $message_status;

	$rs->close();
	$db->close();
	$db=null;

 ?>