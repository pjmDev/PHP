<?php
//include("../lib/publicCharset.php");
include("../lib/php/publicDB.php");



$whereStr = "";
	$db = new mDB();
	$strSQL = "select * from tb_fcm where 1=1 " . $whereStr;
	$strSQL.= "order by fcmsq ";
	//$strSQL.= "order by lonum ";
	$rs = new mRS($db, $strSQL);
	
	$result = array();
	while($rs->next()){
		
		/*str[] = array('lonum'=>$rs->f("lonum"), 'loname'=>$rs->f("loname"), 'lobcate'=>$rs->f("lobcate"), 'lomcate'=>$rs->f("lomcate"), 
		'loscate'=>$rs->f("loscate"), 'lolat'=>$rs->f("lolat"), 'lolong'=>$rs->f("lolong"), 'lohp'=>$rs->f("lohp"));*/
		
		array_push($result, array('fcmsq'=>$rs->f("fcmsq"), 'fcmemail'=>$rs->f("fcmemail") ));
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