<!DOCTYPE html>
<html lang="en">
<head>
<title>PHP start</title>
<meta charset="UTF-8">
<style>
</style>
</head>
<body>

<?php
	$i=0;
	$txt="I love memes";
	while($i<10){
		echo "$i<br>";
		$i+=6;
	}
	echo "Now I'm writing with PhP";
	if($i>10){
		echo "<br>True: " . $txt . "!<br>";
	}
	echo "---------------------------------------------------------------------------";
	$x = 5; // global scope
 
	function myTest() {
	// using x inside this function will generate an error
		echo "<p>Variable x inside function is: $x</p>";
	} 
	myTest();

	echo "<p>Variable x outside function is: $x</p>";
?>




</body>
</html>