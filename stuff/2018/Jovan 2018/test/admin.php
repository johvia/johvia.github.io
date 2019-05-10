<?php
require_once('DBConnection.php');


echo <<<ENDOFHTML
	<!DOCTYPE html> 
	<html lang="en">
	<head>
	<title>Admin</title>
	<meta charset="UTF-8"> 
	</head>
	<body>
	<a href="topic_one.php">Topic One</a><br>
	<a href="topic_two.php">Topic two</a><br>
	<a href="admin.php">Admin</a><br>
	

ENDOFHTML;
	$stmt = $conn->prepare("SELECT comment, name, comment_id FROM comments order by comment_time DESC");
	$stmt->execute();
	$result = $stmt->fetchAll();
	for($i=0; $i<count($result); $i++){
		$row = $result[$i];
		$comment = $row['comment'];
		$name = $row['name'];
		$comment_id = $row['comment_id'];
		
		echo "<hr>";
		echo "$name: <br>";
		echo "$comment<br>";
		echo "<a href='delete_comment.php?comment_id=$comment_id'>Delete</a><br>";

	}
?>


</body>
</html>