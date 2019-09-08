<?php

include("../lib/php/publicCharset.php");
include("../lib/php/publicDB.php");

	if($_REQUEST["lonumber"] == null or $_REQUEST["lonumber"] == ""){
	die(); }
		
	$db = new mDB();
	echo "<form name='f' method='POST'>";
	
	$strSQL  = "update tb_location set ";
	$strSQL .= "loopen = '".$_REQUEST["lostat"]."' ";
	$strSQL .= " where lonum = '".$_REQUEST["lonumber"]."'";
  
  echo $strSQL;
 	new mRS($db, $strSQL);
	
	
	$db->close();
	$db = null;
	if($_REQUEST["lostat"] == "O"){
		
		include("fcmsend.php");
		
	}


	echo "</form>";

?>