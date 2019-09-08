<?php

include("../lib/php/publicCharset.php");
include("../lib/php/publicDB.php");
function unistr_to_xnstr($str){     
	return preg_replace('/\\\u([a-z0-9]{4})/i', "&#x\\1;", $str); 
} 
?>
<script src="local.js" type="text/javascript" charset='utf-8'></script>

<?php
		$db = new mDB();
	if($_REQUEST["mbemail"] != ""){

		
	echo "<form name='f' method='POST'>";

	$strSQL  = "insert into tb_member ";
	$strSQL .= "(";
	$strSQL .= "mbemail, mbpassword, mbname, mbphone, mbtoken ";
 	$strSQL .= ") ";
	$strSQL .= "values ";
	$strSQL .= "(";
	$strSQL .= " '".$_REQUEST["mbemail"]."', ";
	$strSQL .= " '".$_REQUEST["mbpassword"]."', ";
	$strSQL .= " '".$_REQUEST["mbname"]."', ";
	$strSQL .= " '".$_REQUEST["mbphone"]."', ";
	$strSQL .= " '".$_REQUEST["mbtoken"]."' ";
	$strSQL .= ")";
  //echo "A".$strSQL;
 	new mRS($db, $strSQL);
	echo "</form>";
	}
	
	echo $strSQL;

	$strSQL = "select * from tb_member where mbemail = '".$_REQUEST["mbemail"]."' and  mbpassword = '".$_REQUEST["mbpassword"]."' ";
	//echo "B".$strSQL;
	$rs = new mRS($db, $strSQL);
	
	$result = array();
	if($rs->next()){
		$suc = true;
		echo $rs->f("mbname");
	}
	else{
		$suc = false;
	}
	array_push($result, array('suc'=>$suc ));
	
		$jsonStr = json_encode(array("result"=>$result));
	
	$rs->close();
	$db->close();
	$db = null;
	
  echo $jsonStr;

?>