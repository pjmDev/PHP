<?php

include("../lib/publicCharset.php");
include("../lib/publicDB.php");

?>
<script src="local.js" type="text/javascript" charset='utf-8'></script>

<?php
		$db = new mDB();
		
		echo $_REQUEST["title"];	
		echo $_REQUEST["msg"];	
		
		if(mb_stripos($_REQUEST["title"], "카카오", 0, "utf-8") > 0){
			$bank = "카카오";
		}
		else if(mb_stripos($_REQUEST["title"], "S알리", 0, "utf-8") > 0){
			$bank = "신한";
		}

		else if(mb_stripos($_REQUEST["title"], "kakao", 0, "utf-8") > 0){
			$bank = "카카오";
		}
		else if(mb_stripos($_REQUEST["title"], "S", 0, "utf-8") > 0){
			$bank = "신한";
		}
		
		echo "AA".$bank;   
   $bankstr = explode("@", $arr[3]);
   print_r($bankstr);
	if($bank == "카카오"){
		$day = $bankstr[1];
		$state = $bankstr[3];
		$money = $bankstr[4];
		
	}
	if($bank == "신한"){
		$day = $bankstr[3];
		$state = $bankstr[0];
		$money = $bankstr[1];
		
	}
	if($bank != ""){

	echo "<form name='f' method='POST'>";

	$strSQL  = "insert into tb_msg ";
	$strSQL .= "(";
	$strSQL .= "msbank, msstate, msmoney, msardt,mshp,mscompany ";
 	$strSQL .= ") ";
	$strSQL .= "values ";
	$strSQL .= "(";
	$strSQL .= " '".$bank."', ";
	$strSQL .= " '".$state."', ";
	$strSQL .= " '".$money."', ";
	$strSQL .= " now(), ";
	$strSQL .= " '01083018980', ";
	$strSQL .= " '서혁준' ";
	$strSQL .= ")";
  //echo "A".$strSQL;
 	new mRS($db, $strSQL);
	echo "</form>";
	}
	
	echo $strSQL;
	
	$db->close();
	$db = null;
	
  echo $jsonStr;

?>