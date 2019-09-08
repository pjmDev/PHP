<?php

	echo "<form name='f' method='get' >";
	echo "<input type='hidden' value='' name='lonum' >";
	
	$strSQL = "select * from tb_location where lonum = ".$_REQUEST["lonum"]." ";
	$rs = new mRS($db, $strSQL);
	$rs->next();
		echo "<table style='border:1px solid;'>";
		echo "<tr>";
		echo "<td style='width:100px;'>이름</td>";
		echo "<td style='width:80px;'>대분류</td>";
		echo "<td style='width:80px;'>중분류</td>";
		echo "<td style='width:80px;'>소분류</td>";
		echo "<td style='width:100px;'>위도</td>";
		echo "<td style='width:100px;'>경도</td>";
		echo "<td style='width:100px;'>휴대전화</td>";
		echo "<td style='width:100px;'>검색어</td>";
		echo "</tr>";
		echo "<tr>";

		echo "<td style='width:100px;'><input type='text' name=txtLoname value='".$rs->f("loname")."'></td>";

		echo show_sel_b($db, "onchange='changeBig();'");
		
		echo "<td>";
		echo "<select type='select' name='selmcate' onchange='changeMid();' style='width:80px;'>";
		echo "</select>";
		echo "</td>";

		echo "<td style='width:100px;'>";
		echo "<select type='select' name='selscate' style='width:80px;'>";
		echo "</select>";
		echo "</td>";

		echo "<td style='width:100px;'><input type='text' name=txtLolat value='".$rs->f("lolat")."'></td>";
		echo "<td style='width:100px;'><input type='text' name=txtLolong value='".$rs->f("lolong")."'></td>";
		echo "<td style='width:100px;'><input type='text' name=txtLohp value='".$rs->f("lohp")."'></td>";
		echo "<td style='width:100px;'><input type='text' name=txtLosearch value='".$rs->f("losearch")."'></td>";

	echo "</tr>";
	echo "</table>";

	echo "<input type='button' class='inbut01' width='100px' value='등록' onClick='goSave(".$_REQUEST["lonum"].")'; >";
	echo " ";
	echo "<input type='button' class='inbut01' width='100px' value='취소' onClick='goList()'; >";
	
	$rs->close();

echo "</form>";

?>
