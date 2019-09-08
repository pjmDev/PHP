<?php

include($project_path . "publicCharset.php");
include($project_path . "publicDB.php");

?>
<!-- <script src="local.js" type="text/javascript" charset='utf-8'></script> -->
<style type="text/css">
</style>

<?php
$db = new mDB();
$_REQUEST["text"] = "019114@@[Web발신]신한체크승인 대우공업 입금 2,900원 잔액23,233,000원";

if($_REQUEST["text"] == ""){
	die();
}

$msg = array();

$msg = explode("@@", $_REQUEST["text"]);

print_r($msg);
$value = "[Web발신]";
for($i=0;$i<count($msg);$i++){
	if(strpos($msg[$i], $value) !== false) {		
		
		$msbody = $msg[$i];
		//echo $msbody;
		$bankn = array("신한");
	
		for($i=0;$i<count($bankn);$i++){
			if(strpos($msbody, $bankn[$i]) !== false) {
				$bankcode = $bankn[$i];
			}
		}
		
		$bankname = whatbank($bankcode);
		if($bankname == ""){
			die();
		}
		echo $bankname;
				
		$state = "";
		if(strpos($msbody, "출금") !== false) {
			$state = "출금";
		}
		else if(strpos($msbody, "입금") !== false) {
			$state = "입금";
		}
		else{
			die();
		}
		//echo $state;
		
		$pay = mb_str_split($msbody);
				
		//$money_s = explode("\n", $msbody);
		
		for($i=0; $i<count($pay); $i++){
			if($pay[$i] !== "입" || $pay[$i] !== "금" || $pay[$i] !== "출" || $pay[$i] !== "잔" || $pay[$i] !== "액"){
				if(preg_replace("/[^0-9]*/s", "", $pay[$i]) == ""){
					$pay[$i] = "*";
				}
			}
			else if($pay[$i] == "입" || $pay[$i] == "금" || $pay[$i] == "출" || $pay[$i] == "잔" || $pay[$i] == "액"){
				$pay[$i] = $pay[$i]."|";
				
			}
			
		}
		
		$payment = implode("", $pay);
		//echo $payment;
	
		$money = str_replace(",", "", trim(str_replace("*", "", mb_substr($payment, 3, 100, "UTF-8"))));
		
		$money = explode("\n", $money);
		
		
		print_r($money);
		//$rs->close();
	}
			
}
	//문자열 1개씩 다 분할해서 문자열이면 * 문자열이 아니면 숫자를 출력해서 
echo "<form name='f'>";
echo "</form>";	 

$db->close();
$db=null;
?>	

<?
function whatbank($bank){
	$db = new mDB();
	echo $bank;
	$strSQL = "select * from tb_bank where bank like '%".$bank."%'";
	$rs = new mRS($db, $strSQL);
	if($rs->next()){
		return $rs->f("banknumber");
	}
	return 0;
}

function mb_str_split($str){
      $ret = array();
      for ($i=0; $i<mb_strlen($str, "UTF-8"); $i++){
         array_push($ret, mb_substr($str, $i, 1, "UTF-8"));
      }
      return $ret;
   }

?>