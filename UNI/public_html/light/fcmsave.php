<?php

include("../lib/php/publicCharset.php");
include("../lib/php/publicDB.php");
	
	echo "<form name='f' method='POST'>";	
	$db = new mDB();
		
	if($_REQUEST["fcmst"] == "1"){
		
		$IsFound = false;
		$strSQL = "select * from tb_fcm where fcmsq = '".$_REQUEST["fcmsq"]."' and fcmemail = '".$_REQUEST["fcmemail"]."'  ";
		$rs = new mRS($db, $strSQL);
		if($rs->next()){
			$IsFound = true;
		}
		
		if($IsFound){
			$strSQL = "update tb_fcm set fcmtoken = '".$_REQUEST["fcmtoken"]."' where fcmsq = '".$_REQUEST["fcmsq"]."' and fcmemail = '".$_REQUEST["fcmemail"]."'";
			echo $strSQL;
		}
		else{
			$strSQL = "insert into tb_fcm ";
			$strSQL.= "( ";
			$strSQL.= " fcmsq, fcmtoken, fcmemail ";
			$strSQL.= " )";
			$strSQL.= " values ";
			$strSQL.= "( ";
			$strSQL.= " '".$_REQUEST["fcmsq"]."', '".$_REQUEST["fcmtoken"]."', '".$_REQUEST["fcmemail"]."' ";
			$strSQL.= " )";
			echo $strSQL;
		}
		
	}
	else if($_REQUEST["fcmst"] == "0"){
		
	$strSQL = "delete from tb_fcm ";
  $strSQL.= " where fcmsq = '".$_REQUEST["fcmsq"]."' and fcmemail = '".$_REQUEST["fcmemail"]."' ";
 		echo $strSQL;
	}
	else{
		die();
	}
	new mRS($db, $strSQL);
		
	
	
	$rs->close();
	$db->close();
	$db = null;
	echo "</form>";
	
?>