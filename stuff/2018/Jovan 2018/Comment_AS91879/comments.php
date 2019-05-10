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
		$comment_time = strtotime($row['comment_time']);
		
	    
		echo "<div class='comment'>";
		echo "<div class='commentname'>";
		echo "$name: <br>";
		echo "</div>";
		echo "<p class='commenttext'>$comment</p><br>";
		echo "<div class='commenttime'>";
		
		echo diff($row['comment_time'], $row['dbtime']);
		echo "</div>";
		echo "</div><br>";
	}
	
}

function diff($comment_time, $dbtime) {
	$diff = strtotime($dbtime) - strtotime($comment_time);
	$year = 60 * 60 * 24 * 365;
	$month = 60 * 60 * 24 * 30;
	$week = 60 * 60 * 24 * 7;
	$day = 60 * 60 * 24;
	$hour = 60 * 60;
	$min = 60;
	
	if($diff > $year ){
		$d = round($diff/$year);
		if($d > 1)return "$d years ago";
		else return "$d year ago";
	}else if($diff > $month ){
		$d = round($diff/$month);
		if($d > 1)return "$d months ago";
		else return "$d month ago";
	}else if($diff > $week ){
		$d = round($diff/$week);
		if($d > 1)return "$d weeks ago";
		else return "$d week ago";
	}else if($diff > $day ){
		$d = round($diff/$day);
		if($d > 1)return "$d days ago";
		else return "$d day ago";
	}else if($diff > $hour ){
		$d = round($diff/$hour);
		if($d > 1)return "$d hours ago";
		else return "$d hour ago";
	}else if($diff > $min ){
		$d = round($diff/$min);
		if($d > 1)return "$d minutes ago";
		else return "$d minute ago";
	}else{
		if($diff > 1)return "$diff seconds ago";
		else return "$diff second ago";
	}
}
	

?>