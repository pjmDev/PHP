<?php
include($project_path . "../lib/php/publicDB.php");

$db = new mDB();


$ret = "";

$strSQL = "select * from tb_category where cabcate = '" . $_REQUEST["bcate"] . "' ";
//echo $strSQL;
$rs = new mRS($db, $strSQL);
if (!$rs->next())
	return;
$search_bcate = $rs->f("cabcate");
$rs->close();

//$strSQL = "select distinct posigugun from tb_category ";
$strSQL = "select * from tb_category ";
$strSQL.= "where cabcate = '" . $search_bcate . "' and castandard = 'm' ";
$strSQL.= "order by camcate ";
//echo $strSQL;
$rs = new mRS($db, $strSQL);

while ($rs->next()) {
	$ret .= $rs->f("camcate");
	$ret .= "~!@";
	$ret .= $rs->f("camcate");
	$ret .= "@!~";
}
echo $ret;
$rs->close();
$db->close();
$db=null;

?>