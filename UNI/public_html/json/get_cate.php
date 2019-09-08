<?php
//include("../lib/publicCharset.php");
include("../lib/php/publicDB.php");

function unistr_to_xnstr($str){     
	return preg_replace('/\\\u([a-z0-9]{4})/i', "&#x\\1;", $str); 
} 

	$db = new mDB();
	$strSQL = "select * from tb_abs_cate where 
ctmcate is not NULL or
ctscatefood is not NULL or
ctscateservice is not NULL or
ctscateroom is not NULL or
ctscatebar is not NULL or
ctscatemarket is not NULL " . $whereStr;
	$strSQL.= "order by ctmcate ";
	$rs = new mRS($db, $strSQL);
	
	$result = array();
	while($rs->next()){
		
	
		
		array_push($result, array('ctmcate'=>$rs->f("ctmcate"), 'ctscatefood'=>$rs->f("ctscatefood"), 'ctscateservice'=>$rs->f("ctscateservice"), 'ctscateroom'=>$rs->f("ctscateroom"), 'ctscatebar'=>$rs->f("ctscatebar"), 'ctscatemarket'=>$rs->f("ctscatemarket")));}
	
	$jsonStr = json_encode(array("result"=>$result));


	$rs->close();
	$db->close();
	$db=null;
	
	echo $jsonStr;
	
?>	