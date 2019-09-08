<?php

include("../lib/php/publicCharset.php");
include("../lib/php/publicDB.php");




?>

<script src="local.js" type="text/javascript" charset='utf-8'></script>
<script>
	
	function goWrite(){
		//this.txtLoname.value = txtLoname;
		alert("Write");
		f.target='_self';
		f.action='write.php';
		f.submit();
	}
	
	
	function goUpdate(lonum){
		//this.txtLoname.value = txtLoname;
		f.lonum.value = lonum;
		alert("Update");
		f.target='_self';
		f.action='write.php';
		f.submit();
	}
	
	
	function goDelete(lonum){
		//this.txtLoname.value = txtLoname;
		f.lonum.value = lonum;
		alert("Delete");
		f.target='_self';
		f.action='delete.php';
		f.submit();
	}
	
	function goInfox(lonum){
		//this.txtLoname.value = txtLoname;
		f.lonum.value = lonum;
		var url = "../popup/view.php?lonum="+f.lonum.value;
		alert("Info");
		window.open(url, "info", "width=500px height=700px");
	}
	
		function goInfo(lonum){
		//this.txtLoname.value = txtLoname;
		f.lonum.value = lonum;
		var url = "../mobile/view_m.php?lonum="+f.lonum.value;
		f.target='_self';
		f.action=url;
		f.submit();
	}
	
	
	</script>
<?php

echo "<form name='f' method='get'>";
echo "<input type='hidden' name='lonum' value=''>";

echo "<table>";
echo "<tr>";
echo "<td style='width:80px;'>No</td>";
echo "<td style='width:100px;'>이름</td>";
echo "<td style='width:100px;'>대분류</td>";
echo "<td style='width:100px;'>중분류</td>";
echo "<td style='width:100px;'>소분류</td>";
echo "<td style='width:100px;'>위도</td>";
echo "<td style='width:100px;'>경도</td>";
echo "<td style='width:100px;'>휴대전화</td>";
echo "<td style='width:100px;'>검색어</td>";
echo "<td style='width:100px;'>수정</td>";
echo "<td style='width:100px;'>삭제</td>";
echo "<td style='width:100px;'>비고</td>";
echo "</tr>";
	$a=0;
	$db = new mDB();
	$strSQL = "select * from tb_location ";
	$rs = new mRS($db, $strSQL);
	while($rs->next()){
		$a++;
	echo "<tr>";
	echo "<td>".$a."</td>";
	echo "<td>".$rs->f("loname")."</td>";
	echo "<td>".$rs->f("lobcate")."</td>";
	echo "<td>".$rs->f("lomcate")."</td>";
	echo "<td>".$rs->f("loscate")."</td>";
	echo "<td>".$rs->f("lolat")."</td>";
	echo "<td>".$rs->f("lolong")."</td>";
	echo "<td>".$rs->f("lohp")."</td>";
	echo "<td>".$rs->f("losearch")."</td>";
	echo "<td>";
	echo "<input type='button' value='편집' onClick=\"goUpdate(".$rs->f("lonum").")\">";
	echo "</td>";
	echo "<td>";
	echo "<input type='button' value='삭제' onClick=\"goDelete(".$rs->f("lonum").")\">";
	echo "</td>";
	echo "<td>";
	echo "<input type='button' value='상세정보' onClick=\"goInfo(".$rs->f("lonum").")\">";
	echo "</td>";
	

	echo "</tr>";
	}
	echo "</table>";
	
	echo "<input type='button' value='신규등록' onClick=\"goWrite()\">";
	
	$rs->close();
	$db->close();
	$db=null;


echo "</form>";	 



?>	