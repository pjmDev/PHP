<?php

include("../lib/php/publicCharset.php");
include("../lib/php/publicDB.php");

?>
<script src="local.js" type="text/javascript" charset='utf-8'></script>

<?php
	
	$db = new mDB();
		
	echo "<form name='f' method='POST'>";

	$strSQL = "select * from tb_location where lonum = ".$_REQUEST["lonum"]." ";
	$rs = new mRS($db, $strSQL);
	$rs->next();
	$rs->close();
	

if($_REQUEST["lonum"] == ''){
	
	$strSQL  = "insert into tb_location ";
	$strSQL .= "(";
	$strSQL .= "loname, lobcate, lomcate, loscate, lolat, lolong, lohp, losearch ";
 	$strSQL .= ") ";
	$strSQL .= "values ";
	$strSQL .= "(";
	$strSQL .= " '".$_REQUEST["txtLoname"]."', ";
	$strSQL .= " '".$_REQUEST["selLobcate"]."', ";
	$strSQL .= " '".$_REQUEST["selmcate"]."', ";
	$strSQL .= " '".$_REQUEST["selscate"]."', ";
	$strSQL .= " '".$_REQUEST["txtLolat"]."', ";
	$strSQL .= " '".$_REQUEST["txtLolong"]."', ";
	$strSQL .= " '".$_REQUEST["txtLohp"]."', ";
	$strSQL .= " '".$_REQUEST["txtLosearch"]."' ";
	$strSQL .= ")";
  
}

else {
	
	$strSQL  = "update tb_location set ";
	$strSQL .= "loname = '".$_REQUEST["txtLoname"]."', lobcate = '".$_REQUEST["selLobcate"]."', ";
 	$strSQL .= "lomcate = '".$_REQUEST["selmcate"]."', loscate = '".$_REQUEST["selscate"]."', ";
	$strSQL .= "lolat = '".$_REQUEST["txtLolat"]."', lolong = '".$_REQUEST["txtLolong"]."', ";
	$strSQL .= "lohp = '".$_REQUEST["txtLohp"]."', losearch = '".$_REQUEST["txtLosearch"]."' ";
	$strSQL .= " where lonum = '".$_REQUEST["lonum"]."'";
	
}
  echo $strSQL;
 
 new mRS($db, $strSQL);
	
	echo "</form>";
	$db->close();
	$db = null;

?>	
<script>
	alert("저장되었습니다.");	
	f.target='_self';
	f.action='list.php';
	f.submit();
</script>