<?php
class mDB extends PDO {
    public $cnn; 
    private $host = '/'; 
    private $database = '/'; 
    private $user = '/'; 
    private $passwd = '/!'; 
    private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
/*    function __construct() {
     $this->cnn = parent::__construct("mysql:host=$this->host; dbname=$this->database; charset=utf8", $this->user, $this->passwd , $this->options);
	}    
} */

	function mDB(){
		$this->cnn = new PDO("mysql:host=" .$this->host. "; dbname=" .$this->database. ";charset=utf8", $this->user, $this->passwd);
	}
	  
	// -----------------------------------------------------
	function close() {
		$this->cnn = null;
	} 
	// -----------------------------------------------------
	
		// -----------------------------------------------------
	function rollback() {
		$rs = PDO::query;
		if (!$rs)
			die("Error mysql transaction rollback : " . PDO::rollback());
		return $rs;
	}
  // -----------------------------------------------------
	    function commit() 
    { 
       //if(!--$this->transactionCounter) 
           return PDO::commit(); 
       //return $this->transactionCounter >= 0; 
    }
	
	/*
	function query($strSQL, $die_flag=true) {
		 $rs = $db->query($strSQL);
 		 $Array = $rs->fetch(PDO::FETCH_ASSOC);
		if (!$rs) {
		    echo "Error Invalid query : " . error() . $strSQL;
			if ($die_flag)
		    	die();		    
		    return $rs;
		}
		else {
			return $rs;
		}			 
	}
	// -----------------------------------------------------
	function execute($strSQL, $die_flag=true) {
		$rs = mysql_query($strSQL, $this->cnn);
		if (!$rs) {
			if ($die_flag == true)  {
		    	echo "Error Invalid sql : " . mysql_error();
		    	die();
		    }
		    return false;
		}
		else {
			return true;
		}			 
	}
	// -----------------------------------------------------

	function beginTransaction() 
    { 
        if(!$this->transactionCounter++) 
            return PDO::beginTransaction(); 
       return $this->transactionCounter >= 0; 
    } 
	// -----------------------------------------------------

	// -----------------------------------------------------
	    function rollback() 
    { 
        if($this->transactionCounter >= 0) 
        { 
            $this->transactionCounter = 0; 
            return PDO::rollback(); 
        } 
        $this->transactionCounter = 0; 
        return false; 
    } 
	
	// -----------------------------------------------------
		/*function begintrans() {
		//$rs = mysql_query("set autocommit=0", $this->cnn);
		$rs = pdo::beginTransaction();
		if ($rs) 
			$rs = mysql_query("begin", $this->cnn);
		if (!$rs)
			die("Error mysql transaction begin : " . mysql_error());
		return $rs;
	}*/
	
	// -----------------------------------------------------
	
	/*
	function commit() {
		$rs = mysql_query("commit", $this->cnn);
		if (!$rs)
			die("Error mysql transaction commit : " . mysql_error());
		return $rs;
	}
	*/

	
	
	
	
	
	
	/*
	
try{
 		$db = new	PDO("mysql:host=DNS; dbname=/;charset=utf8", "id", "password");
		$st = $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$st = $db->prepare("select * from tab_address");
		$st->execute();
		while($row = $st->fetch(PDO::FETCH_ASSOC)){
			$_REQUEST[] = $row;
		}
		
}
catch(Exception $e) {
    echo $e->getMessage();
}
*/

}

// **********************************************************

class mRS {
	var $result;
	var $row;
	 
	// -----------------------------------------------------
	function mRS($db, $strSQL) {
		$this->result = $db->cnn->query($strSQL);
 		
	}
	// -----------------------------------------------------
	function close() {
//		if ($this->result) 
			//mysql_free_result($this->result);
	}
	// -----------------------------------------------------
	function next() {
 		$this->row = $this->result->fetch(PDO::FETCH_ASSOC);
		return ($this->row);
	}
	// -----------------------------------------------------
	function f($name) {
		if (!isset($this->row[$name])) return "";
    return ($this->row[$name]);
	}
	// -----------------------------------------------------
	function fss($name) {
		return (stripslashes($this->row[$name]));
	}	
	// -----------------------------------------------------
	function fas($name) {
		return (addslashes($this->row[$name]));
	}	
	// -----------------------------------------------------
	function fkr($name) {
		return iconv("UTF-8", "EUC-KR", $this->row[$name]);
	}
	// -----------------------------------------------------
	function futf8($name) {
		return iconv("EUC-KR", "UTF-8", $this->row[$name]);
	}
	// -----------------------------------------------------
	function intval($name) {
		return (intval($this->row[$name]));
	}
	// -----------------------------------------------------
	function val($name) {
		return (doubleval($this->row[$name]));
	}
	// -----------------------------------------------------
	function number($name) {
		return (number_format($this->row[$name]));
	}
	// -----------------------------------------------------
	function dblval($name) {
		if ($this->row[$name] == "") 
			return "";
		return (doubleval($this->row[$name]));
	}
	// -----------------------------------------------------
	function currency($name) {
		//if (number_format($this->row[$name]) == 0) 
		if ($this->row[$name] == "") 
			return "0";
		else
			return number_format($this->row[$name]);
	}
	/*
	// -----------------------------------------------------
	function fdt0($name, $sep="-") {
		return (substr(str_replace($sep, "", $this->row[$name]), 0,8));
	}
	// -----------------------------------------------------
	function fdt($name, $sep="-") {
		$str = $this->row[$name];
		if (strlen($str) >= 8) {
			return substr($str, 0, 4).$sep.substr($str, 5, 2).$sep.substr($str, 8, 2);
		}
		else {
			return $str;
		}
	}
	// -----------------------------------------------------
	function fdt_ac($name, $sep="-") {
		$str = $this->fdt($name, $sep);
		if ($str == "2100-12-31")
			return "";
		else
			return $str;
	}
	// -----------------------------------------------------
	function fdtm($name, $sep="-") {
		$str = $this->row[$name];
		if (strlen($str) >= 8) {
			return substr($str, 0, 4).$sep.substr($str, 5, 2).$sep.substr($str, 8, 2)." ".substr($str, 11, 2).":".substr($str, 14, 2);
		}
		else {
			return $str;
		}
	}
	// -----------------------------------------------------
	function fdtms0($name) {
		$str = $this->row[$name];
		if (strlen($str) >= 8) {
			return substr($str, 0, 4).substr($str, 5, 2).substr($str, 8, 2).substr($str, 11, 2).substr($str, 14, 2).substr($str, 17, 2);
		}
		else {
			return $str;
		}
	}
	*/
	// -----------------------------------------------------
	function fdtnbsp($name, $sep="-") {
		$str = $this->row[$name];
		if (strlen($str) >= 8) {
			return substr($str, 0, 4)."-".substr($str, 5, 2)."-".substr($str, 8, 2);
		}
		else {
			if ($str == "")
				return "&nbsp;";
			else 
				return $str;
		}
	}
	// -----------------------------------------------------
	function fday($name) {
		if (!isset($this->row[$name])) return "";
		$str = $this->row[$name];
		return intval(substr($str, 8, 2));
	}
	// -----------------------------------------------------
	function fvalue($name) {
		if (!isset($this->row[$name])) return "";
    return (htmlspecialchars($this->row[$name]));
	}	
	// -----------------------------------------------------
	function fnbsp($name) {
		if (!isset($this->row[$name])) return "&nbsp;";
    if (trim($this->row[$name]) == "")
        return ("&nbsp;");
    else
        return ($this->row[$name]);
	}
	
	
	// -----------------------------------------------------
	function ftelhp($name) {
		if (!isset($this->row[$name])) return "";
		/*$arr = GetTelhpArr(dpcseed_dec($this->row[$name]));
		$ret = $arr[0];
		$ret.= ( ($arr[1] != "") ? "-".$arr[1] : "");
		$ret.= ( ($arr[2] != "") ? "-".$arr[2] : "");
    return ($ret);*/
    return preg_replace("/(0(?:2|[0-9]{2}))([0-9]+)([0-9]{4}$)/", "\\1-\\2-\\3", $hp_no);

	}

	/*
	// -----------------------------------------------------
	function f2arr(&$array) {
	    $array_ptr = &$array;
	    $ncols = mysql_num_fields($this->result);
	    for ($i = 0; $i < $ncols; $i++) {
	        //$col_name  = strtolower(oci_field_name($this->stmt, $i));
	        $col_name = mysql_field_name($this->result,$i);
	        /*$col_type  = oci_field_type($stmt, $i);*/
	        /*$col_size  = oci_field_size($stmt, $i);*/
	 /*     $array_ptr[$col_name] = $this->row[$col_name];
	    }
	}
	// -----------------------------------------------------
	function value_hash($val) {
			$ret = "";
	    $ncols = mysql_num_fields($this->result);
	    for ($i = 0; $i < $ncols; $i++) {
	        $col_name = mysql_field_name($this->result,$i);
	        $ret.= $this->row[$col_name];
	    }
	    return Hash("sha256", $val . $ret);
	    //return md5($val . $ret);
	}
}

function pDbErrMsg($db, $errMsg="", $dieFlag=true, $fontSize=3) {
    echo "<center><font size=".$fontSize." color='red'><b>Error ! " . $errMsg . "</b></font></center>";
    $db->ShowError();
    //$db->rollback();
    $db->close();
    unset($db);
    if ($dieFlag)
        die();
}
function pDbErrMsgBox($db, $errMsg="", $dieFlag=true, $fontSize=3) {
    echo $errMsg;
    $db->ShowError();
    //$db->rollback();
    $db->close();
    unset($db);
    if ($dieFlag)
        die();
}
function GetTableCount($db, $strSQL) {
	$rs = new kRs($db, $strSQL);
	$rs->next();
	return $rs->row[0];
}
// ----------------------------------------------
function GetLastDbKey($db) {
	$strSQL = "select last_insert_id() as max_key ";
	$rs = new kRS($db, $strSQL);
	if (!$rs->next()) {
	    pErrMsg("GetLastDbKey() : autoincrement °ª È¹µæ ½ÇÆÐ", true);		
	}
	$maxkey = $rs->f("max_key");
	$rs->close();
	return $maxkey;
}
*/
}
	?>