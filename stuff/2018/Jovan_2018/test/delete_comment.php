<?php
	require_once('DBConnection.php');
	$stmt = $conn->prepare("DELETE FROM comments WHERE comment_id=:comment_id");
	if (!$stmt) print_r($conn->errorInfo());
	$comment_id = $_GET['comment_id'];
	$stmt->bindParam(':comment_id', $comment_id);
	$stmt->execute();
	header("Location: admin.php");
?>