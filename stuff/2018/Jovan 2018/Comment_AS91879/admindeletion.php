<?php
require_once('DBConnection.php');
require("check_logged_in.php");

echo <<<ENDOFHTML
	<!DOCTYPE html> 
	<html lang="en">
	<head>
	<title>Comment Deleter</title>
	<meta charset="UTF-8"> 
	<link href="admin.ico" rel="icon" type="image/x-icon" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="admin_stylesheet.css">
	</head>
	<body>
	<br>
	<div class="topnav">
		<div class="search-container">
			<form action="admindeletion.php" method="POST">
			<input type="text" placeholder="Search.." name="search">
			<button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
		<a class="active" href="logout.php">Logout</a>
	</div>
	<br>
	<br>
	<br>
	<br>
	

ENDOFHTML;
if(isset($_POST['search'])){
	//User searched for something
	$searchc = "%".$_POST['search']."%";
	$searchn = "%".$_POST['search']."%";
	$stmt = $conn->prepare("SELECT comment, comment_time, name, comment_id, page, now() as dbtime FROM comments WHERE name like :searchn or comment like :searchc order by comment_time DESC");
	$stmt->bindParam(':searchn', $searchn);
	$stmt->bindParam(':searchc', $searchc);
}else{
$stmt = $conn->prepare("SELECT comment, comment_time, name, comment_id, page, now() as dbtime FROM comments order by comment_time DESC");
}
	$stmt->execute();
	$result = $stmt->fetchAll();
	for($i=0; $i<count($result); $i++){
		$row = $result[$i];
		$comment = $row['comment'];
		$name = $row['name'];
		$comment_id = $row['comment_id'];
		$comment_time = strtotime($row['comment_time']);
		
		

		echo "<div class='dcomment'>";
		echo "<div class='comment'>";
		echo "<br><a class='dbutn' href='delete_comment.php?comment_id=$comment_id'>Delete</a><br><br>";
		echo "comment id:$comment_id<br>";
		echo "Name: $name: <br>";
		echo "<div class='commenttime'>";
		echo "Date: ";
		echo diff($row['comment_time'], $row['dbtime']);
		echo "</div>";
		echo "<p class='commenttext'>Comment: $comment</p>";
		
		
		// echo "<br><a href='delete_comment.php?comment_id=$comment_id'>Delete Comment</a>";
		echo "</div>";
		echo "</div><br>";
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


</body>
</html>