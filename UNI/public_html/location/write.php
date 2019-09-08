<?php
include("../lib/php/publicCharset.php");
include("../lib/php/publicDB.php");
?>
<style type="text/css">
	.inbut01 {margin-top:10px; width:80px;}
	</style>

<script src="local.js" type="text/javascript" charset='utf-8'></script>

<script>

	function goSave(lonum){
		//this.txtLoname.value = txtLoname;
		f.lonum.value = lonum;
		f.target='_self';
		f.action='save.php';
		f.submit();
	}
	function goList(){
		//this.txtLoname.value = txtLoname;
		f.target='_self';
		f.action='list.php';
		f.submit();
	}

	function HttpReq(url, sendStr) {
		try {
		    var xmlHttp =null;
		    if(window.XMLHttpRequest ){
		        xmlHttp = new XMLHttpRequest();     
		    }
		    else{
		        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		    }
		    if( xmlHttp ){ // 동기 호출
		        xmlHttp.open('POST', url, false);
		        xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		        xmlHttp.send(sendStr);
		        return (xmlHttp.responseText);
		    }
			else {
			    return("null");
			}
		} 
		catch (e) {
			alert('HtttpReq:'+e.description);
		}
	}
	
	
	 	function changeBig() {
		//var sd = 'sido=' + Base64.encode(document.all.selSearchSido.value);
		
		var sd = 'bcate=' + document.f.selLobcate.value;
		ret2 = HttpReq('setsel.php', sd);
		str = ret2.replace(/\n/g,"");
	
		var ctl2 = document.f.selmcate;
		ctl2.innerHTML = "";
		
		var rec = str.split('@!~');
		for (var j=0; j<rec.length-1; j++) {
			var fld = rec[j].split('~!@');
				
			newOpt = document.createElement('OPTION');
			newOpt.value = fld[0];
			newOpt.text  = fld[1];
			newOpt.setAttribute("sname", fld[1]);
			//newOpt.setAttribute("fee_per", fld[2]);
			ctl2.add(newOpt);
		}
	}
	
	function changeMid() {
		var sd = 'bcate=' + document.f.selLobcate.value + '&mcate=' + document.f.selmcate.value;
		ret3 = HttpReq('setsels.php', sd);
		str2 = ret3.replace(/\n/g,"");
	
		var ctl3 = document.f.selscate;
		ctl3.innerHTML = "";
		
		var rec2 = str2.split('@!~');
		for (var j=0; j<rec2.length-1; j++) {
			var fld2 = rec2[j].split('~!@');
				
			newOptn = document.createElement('OPTION');
			newOptn.value = fld2[0];
			newOptn.text  = fld2[1];
			newOptn.setAttribute("sname", fld2[1]);
			ctl3.add(newOptn);
		}	
	}
	
</script>

<?php
	$db = new mDB();
	if($_REQUEST["lonum"] == ""){
		include("write_new.php"); 
		}
	else{
		include("write_up.php");
		}
$db->close();
$db = null;
?>




<?php

function show_sel_b($db, $oncha){
	
	$strSQL = "select * from tb_category where castandard = 'b' ";
	$rs = new mRS($db, $strSQL);
	$str = "<td>";
	$str .= "<select type='select' name='selLobcate' ".$oncha." style='width:80px;'>";
	$str .= "<option>카테고리</option>";
	while($rs->next()){
		$str.="<option value='".$rs->f("cabcate")."'>".$rs->f("cabcate")."</option>";
	}
	$str.="</select>";
	$str.= "</td>";
	$rs->close();
		
	return $str;
	}
	
/*
function show_sel_s($db, $name, $str){
	
	$strSQL = "select * from tb_category where castandard = 's' ";
	$rs = new mRS($db, $strSQL);
	$str;
	$str .= "<td>";
	$str .= "<select type='select' name=".$name." onchang="selLocation($name);" style='width:80px;'>";
	$a = 0;
	while($rs->next()){
		$str.="<option value='".$rs->f("cascate")."'>".$rs->f("cascate")."</option>";
	}
	$str.="</select>";
	$str.= "</td>";
	$rs->close();
		
	return $str;
	}
/*
 function show_sel_mid($db, $name, $stand){

		$strSQL = "select * from tb_category where cabcate='교내' castandard='m' ";
		$rs = new mRS($db, $strSQL);
		$str = "<td>";
		$str .= "<select type='select' name=".$name." style='width:80px;'>";
		while($rs->next()){
			$str.="<option value='".$rs->f("camcate")."'>".$rs->f("camcate")."</option>";
		}
			$str.="</select>";
			$str.= "</td>";

	}
*/

?>