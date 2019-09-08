<?php
include("../lib/php/publicCharset.php");
include("../lib/php/publicDB.php");

?>
<meta content="yes" name="apple-mobile-web-app-capable" />
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0 , width=device-width " />
<style>
	body {margin:0; padding:0; width:100%; max-width:100%; overflow-x:hidden; overflow-y:auto;}
	.topcont {}
	.topcont2 {padding-top:15px;}
	
	.line01 {background:black; color:#ffffff; margin:0 0 0 0; width:100%;  height:7px; padding: .8em 0 0 .5em; position:absolute;}
	.tab01 {border-collapse:collapse; margin:0 0 0 0; padding: 0 0 0 0; width:100%;}
	.tab01 tr td {border-top:1px solid; border-bottom:1px solid; margin:0 0 0 0; padding: 0 0 0 0; width:100%;}
	</style>
	<link rel="stylesheet" type="text/css" href="/lib/css/main.css"/>
<script src="local.js" type="text/javascript" charset='utf-8'></script>
<script src="/js/jquery.js"></script>
<script>
	function goWrite(){
		//this.txtLoname.value = txtLoname;
		alert("Write");
		f.target='_self';
		f.action='/location/write.php';
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
	
	function goList(){
		f.target='_self';
		f.action='../location/list.php';
		f.submit();
	}

	</script>
	
	
	
<?php
	echo "<body>";
	echo "<form name='f' method='get'>";
	$db = new mDB();
	$strSQL = "select * from tb_location where lonum = ".$_REQUEST["lonum"]." ";
	$rs = new mRS($db, $strSQL);
	$rs->next();
	echo "<div class='topframe'>".$rs->f("loname")."(".$rs->f("lobcate").">".$rs->f("lomcate").">".$rs->f("loscate").") 
	   </div>";
//<input type='button' value='편집' onClick=\"goWrite()\">
//<input type='button' value='뒤로가기' onClick=\"goList()\"> 
	
	echo "<input type='hidden' name='lonum' value='".$_REQUEST["lonum"]."'>";
	
	//echo "<td style='border-right:none; height:53px; padding: .2em 0 0 .3em;'><h2>" . $rs->f("loscate")." / tel.".$rs->f("lotelhp"). "</h2></td>";
	
	
	echo "<img src='../image/1.jpg' style='width:100%; height:400px;'>";
	
	echo "<div class='line01'></div>";
	
	echo "<div class='topcont2'>&nbsp;상&nbsp;세&nbsp;정&nbsp;보</div>";
	
	echo "<div style='width:100%; border-top:2px solid #ccc; border-bottom:2px solid #ccc;'>최고의 음식점이 되겠습니다.</div>";
	echo "<div class='list'><img src='../image/goaja.jpg' style='width:100%; '/></div>";
	
	$rs->close();
	$db->close();
	$db=null;
	echo "</form>";	 
	echo "</body>";

?>	
