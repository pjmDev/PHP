<?php

include($project_path . "lib/php/publicCharset.php");
include($project_path . "lib/php/publicDB.php");




?>
<script src="local.js" type="text/javascript" charset='utf-8'></script>
<style type="text/css">
	.mainlogo {style=width:400px; height:400px;}
</style>

<?php

echo "<form name='f'>";
echo "<br><br>";
echo "<br><br>";
	echo "<center>";
	echo "<img src='image/anubis.png' class='mainlogo'>";
	echo "<br><br>";
	echo "<input type='button' value='위치등록' onClick='goList()' style=width:150px; height:70px;>";
	echo "</center>";

echo "</form>";	 

?>	