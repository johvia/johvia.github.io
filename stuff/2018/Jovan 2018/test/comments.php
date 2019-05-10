<?php
require_once('DBConnection.php');

if(isset($_POST['submitComment'])){
	require("brush.php");
	$brush = new brush();
	$stmt = $conn->prepare("INSERT INTO comments (name, comment, comment_time, page) VALUES (:name, :comment, now(), :page);");
	$ref = $_SERVER['HTTP_REFERER'];
	$name = $brush->fullbrush($_POST['yourName']);
	$comment = $brush->fullbrush($_POST['yourComment']);
	
	
	
	$stmt->bindParam(':name', $name);
	$stmt->bindParam(':comment', $comment);
	$stmt->bindParam(':page', $ref);
	
	
	$stmt->execute();
	
	//TODO: $name posted a comment:$comment . This is now put into the database. The comment was posted from the page: <b>$ref</b> so this also goes into the database against the comment";
	header('Location: '.$ref); //we now redirect to the orginal page.
	die();
}
else{
	echo "<form action='comments.php' method='POST'>
<p class='name'>Name: </p><input type='text' name='yourName'><br><br>
<p class='commentTitle'>Comment: </p><textarea name='yourComment'></textarea><br>
<input type='submit' value='Submit' name='submitComment'>
</form><br>";
	$page = "%".$_SERVER['PHP_SELF'] ;
	$stmt = $conn->prepare("SELECT comment, comment_time, name, now() as dbtime FROM comments where page like :page order by comment_time DESC");
	$stmt->bindParam(':page', $page);
	$stmt->execute();
	$result = $stmt->fetchAll();
	for($i=0; $i<count($result); $i++){
		$row = $result[$i];
		$comment = $row['comment'];
		$name = $row['name'];
		
		echo "<hr>";
		echo "$name: <br>";
		echo "$comment<br>";

	}
	
}

	

?>