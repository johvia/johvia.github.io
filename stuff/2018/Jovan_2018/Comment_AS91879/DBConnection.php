<?php
$servername = "localhost";
$username = "_jovanbosman";
$password = "378f54c9381c2391898ca5578b707361";
$dbname = "jovanbosman";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	
}catch(PDOException $e){
	echo "Error: " . $e->getMessage();
	die();
}
?>