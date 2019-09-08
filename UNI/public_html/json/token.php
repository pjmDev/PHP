<?php 
	include("../lib/php/publicDB.php");
	
	
	$token = $_REQUEST["token"];

	$db = new mDB();

	$strSQL = "insert into tb_member (mbtoken) values ('".$_REQUEST["token"]."') where mbemail = '".$_REQUEST["mbemail"]."'"; 

	new mRS($db, $strSQL);

	$db->close();

	$db=null;

 ?>
