<?php
class brush{

	function brush(){}

	function fullbrush($input) {
		$output = strip_tags($input);
		$ouput = htmlspecialchars($output, ENT_QUOTES);
		$output = str_replace("\'", "&rsquo;", $ouput);
		$output = str_replace("\"", "&quot;", $ouput);
		$output = $this->quote_smart($output);
		return trim($output);
	}

	function quote_smart($value) {
	   // Stripslashes
		if (get_magic_quotes_gpc()) {
		   $value = stripslashes($value);
		}
		//return mysql_real_escape_string($value);
		return $value;
	}
}
?>