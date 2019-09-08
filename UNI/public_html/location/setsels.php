<?php
include($project_path . "../lib/php/publicDB.php");

$db = new mDB();
$ret = "";

/*$strSQL = "select * from tb_category where cabcate = '" . $_REQUEST["bcate"] . "' and camcate = '" . $_REQUEST["mcate"] . "' ";
//echo $strSQL;
$rs = new mRS($db, $strSQL);
if (!$rs->next()){}
return;
$rs->close();
	*/
	
$search_bcate = $_REQUEST["bcate"];
$search_mcate = $_REQUEST["mcate"];

//$strSQL = "select distinct posigugun from tb_category ";
$strSQL = "select * from tb_category ";
$strSQL.= "where cabcate = '" . $search_bcate . "' and camcate = '" . $search_mcate . "' and castandard = 's' ";
$strSQL.= "order by cascate ";
//echo $strSQL;
$rs = new mRS($db, $strSQL);

while ($rs->next()) {
	$ret .= $rs->f("cascate");
	$ret .= "~!@";
	$ret .= $rs->f("cascate");
	$ret .= "@!~";
}
echo $ret;

?>