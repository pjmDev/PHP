<?php
include("../lib/php/publicCharset.php");
?>
<script>
	function goSave(){
		//this.txtLoname.value = txtLoname;
		alert("Save");
		f.target='_self';
		f.action='save.php';
		f.submit();
	}
</script>

<style type="text/css">
	.inbut01 {margin-top:10px; width:80px;}
	.list01 {border:1px solid;}
	.list01 td input {width:100px;}
	</style>

<?php
	echo "<form name='f' method='post' >";
	echo "리스트입니다.";
	
	echo "<table class='list01'>";
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

		echo "<td style='width:100px;'><input type='text' name=txtLoname></td>";

		echo show_sel_b($db, "onchange='changeBig();'");
		
		echo "<td>";
		echo "<select type='select' name='selmcate' onchange='changeMid();' style='width:80px;'>";
		echo "</select>";
		echo "</td>";

		echo "<td style='width:100px;'>";
		echo "<select type='select' name='selscate' style='width:80px;'>";
		echo "</select>";
		echo "</td>";

		echo "<td style='width:100px;'><input type='text' name=txtLolat></td>";
		echo "<td style='width:100px;'><input type='text' name=txtLolong></td>";
		echo "<td style='width:100px;'><input type='text' name=txtLohp></td>";
		echo "<td style='width:100px;'><input type='text' name=txtLosearch></td>";

	echo "</tr>";
	echo "</table>";
	echo "<input type='button' class='inbut01' value='등록' onClick='goSave();' >";
	
?>