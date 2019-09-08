<?php
//include("../lib/php/publicCharset.php");
include("../../lib/php/publicDB.php");

function unistr_to_xnstr($str){     
	return preg_replace('/\\\u([a-z0-9]{4})/i', "&#x\\1;", $str); 
} 


$whereStr = "";
if ($_REQUEST["loname"] != "")
	$whereStr .= " and loname like '%" .$_REQUEST["loname"]. "%' ";
if ($_REQUEST["lobcate"] != "")
	$whereStr .= " and lobcate = '" .$_REQUEST["lobcate"]. "' ";

	$whereStr .= " and louniver = 'andong' ";

	$db = new mDB();
	$strSQL = "select * from tb_location where 1=1 " . $whereStr;
	$strSQL.= "order by loname ";
	//$strSQL.= "order by lonum ";
	$rs = new mRS($db, $strSQL);
	
	$result = array();
	while($rs->next()){
		
		/*str[] = array('lonum'=>$rs->f("lonum"), 'loname'=>$rs->f("loname"), 'lobcate'=>$rs->f("lobcate"), 'lomcate'=>$rs->f("lomcate"), 
		'loscate'=>$rs->f("loscate"), 'lolat'=>$rs->f("lolat"), 'lolong'=>$rs->f("lolong"), 'lohp'=>$rs->f("lohp"));*/
		
		array_push($result, array('lonum'=>$rs->f("lonum"), 'loname'=>$rs->f("loname"), 'lobcate'=>$rs->f("lobcate"), 'lomcate'=>$rs->f("lomcate"), 
										'loscate'=>$rs->f("loscate"), 'lolat'=>$rs->f("lolat"), 'lolong'=>$rs->f("lolong"), 'lohp'=>$rs->f("lohp"), 'louniver'=>$rs->f("louniver") ));
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