<?php

//include($project_path . "lib/publicCharset.php");
//include($project_path . "lib/publicDB.php");

include("../lib/php/publicCharset.php");
include("../lib/php/publicDB.php");

?>
<script src="local.js" type="text/javascript" charset='utf-8'></script>
<style type="text/css">
	.mainlogo {style=width:400px; height:400px;}
</style>

<?php
echo "A". $_REQUEST["lonum"];
echo "<form name='f' method='post'>";

$db = new mDB();

	$strSQL  = "delete from tb_location where lonum = '".$_REQUEST["lonum"]."' ";


  echo $strSQL;
 new mRS($db, $strSQL);
	

$db->close();
$db = null;

echo "</form>";	 

?>	
<script>
			
		alert("삭제되었습니다.");	
		f.target='_self';
		f.action='list.php';
		f.submit();
	</script>