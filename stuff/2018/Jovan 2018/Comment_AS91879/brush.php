<?php
class brush{
// protected $censor;
	function brush(){
		// $myfile = fopen("swearWords.txt", "r") or die("Unable to open file!");
		// $swears=fread($myfile,filesize("swearWords.txt"));
		// fclose($myfile);
		// $censor=str_getcsv ( $swears , ",");
	}

	function fullbrush($input) {
		
		$output = strip_tags($input);
		$censor = array("anal","anus","arse","ass","ballsack","balls","bastard","bitch","biatch","bollock","bollok","boner","clitoris","cock","coon","cunt","dick","dildo","dyke","fag","fuck","f u c k","jerk","jizz","knobend","knob end","labia","muff","nigger","nigga","scrotum","shit","s hit","sh1t","slut","spunk","whore","OwO");

		for($i=0; $i<count($censor); $i++){
			$output = str_ireplace($censor[$i], "****", $output);
			echo "$censor[$i]";
		}
		$output = htmlspecialchars($output, ENT_QUOTES);
		
		$output = str_replace("\'", "&rsquo;", $output);
		
		$output = str_ireplace("\"", "&quot;", $output);
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