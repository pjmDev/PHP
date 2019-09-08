<?php
//include("../lib/php/publicCharset.php");
include("../lib/php/publicDB.php");

function unistr_to_xnstr($str){     
	return preg_replace('/\\\u([a-z0-9]{4})/i', "&#x\\1;", $str); 
} 

$whereStr = "";

/*
if ($_REQUEST["abuname"] != "")
	$whereStr .= " and abuname like '%" .$_REQUEST["abuname"]. "%' ";

if ($_REQUEST["abaname"] != "")
	$whereStr .= " and abaname like '%" .$_REQUEST["abaname"]. "%' ";
*/


	$db = new mDB();
	$strSQL = "select * from tb_abs where 1=1 " . $whereStr;
	$strSQL.= "order by abuname ";
	
	//echo "SQL : " . $strSQL;
	//$strSQL.= "order by lonum ";
	$rs = new mRS($db, $strSQL);
	
	$result = array();
	while($rs->next()){
		/*str[] = array('lonum'=>$rs->f("lonum"), 'loname'=>$rs->f("loname"), 'lobcate'=>$rs->f("lobcate"), 'lomcate'=>$rs->f("lomcate"), 
		'loscate'=>$rs->f("loscate"), 'lolat'=>$rs->f("lolat"), 'lolong'=>$rs->f("lolong"), 'lohp'=>$rs->f("lohp"));*/
		
		array_push($result, array('abnum'=>$rs->f("abnum"), 'abaname'=>$rs->f("abaname"), 'abuname'=>$rs->f("abuname"), 'ablat'=>$rs->f("ablat"), 'ablong'=>$rs->f("ablong"), 'abuniver'=>$rs->f("abuniver") ));
	}
	
	$jsonStr = json_encode(array("result"=>$result));

//echo "<form name='f'>";	
	//echo "<input type='hidden' name='json_list' id='json_list' value=$jsonStr />";

//echo "</form>";
	 
	$rs->close();
	$db->close();
	$db=null;
	
	echo $jsonStr;
	//echo unistr_to_xnstr($jsonStr);
?>	