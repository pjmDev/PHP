<?php
//include("../lib/php/publicCharset.php");
include("../lib/php/publicDB.php");

function unistr_to_xnstr($str){     
	return preg_replace('/\\\u([a-z0-9]{4})/i', "&#x\\1;", $str); 
} 

	$db = new mDB();
	$strSQL = "select * from test0118";
	$rs = new mRS($db, $strSQL);
	
	$result = array();
	while($rs->next()){
		
		array_push($result, array('name'=>$rs->f("name"), 'url'=>$rs->f("url")));}
	
	$jsonStr = json_encode(array("result"=>$result));


	$rs->close();
	$db->close();
	$db=null;
	
	echo $jsonStr;
	
?>	