<?php
//include("../lib/publicCharset.php");
include("../lib/php/publicDB.php");

	$whereStr = "";
	$whereStr .= " mbemail = '" .$_REQUEST["mbemail"]. "' and mbpassword = '" .$_REQUEST["mbpassword"]. "' ";

	$db = new mDB();
	$strSQL = "select * from tb_member where " . $whereStr;
	//$strSQL.= "order by lonum ";
	$rs = new mRS($db, $strSQL);
	
	//echo $strSQL;
	
	$suc = false;
	while($rs->next()){

		/*str[] = array('lonum'=>$rs->f("lonum"), 'loname'=>$rs->f("loname"), 'lobcate'=>$rs->f("lobcate"), 'lomcate'=>$rs->f("lomcate"), 
		'loscate'=>$rs->f("loscate"), 'lolat'=>$rs->f("lolat"), 'lolong'=>$rs->f("lolong"), 'lohp'=>$rs->f("lohp"));*/
		$token = $rs->f("mbtoken");
		
		$suc = true;
	}
	if($token != $_REQUEST["mbtoken"]){
		
		$strSQL  = "update tb_member set ";
		$strSQL .= "mbtoken = '".$_REQUEST["mbtoken"]."' ";
		$strSQL .= "where mbemail = '".$_REQUEST["mbemail"]."'";
 			new mRS($db, $strSQL);
	}
	
	$jsonStr = json_encode(array($suc));

//echo "<form name='f'>";	
	//echo "<input type='hidden' name='json_list' id='json_list' value=$jsonStr />";
//echo "</form>";
	 
	$rs->close();
	$db->close();
	$db=null;
	
	echo $jsonStr;
	//echo unistr_to_xnstr($jsonStr);
?>	