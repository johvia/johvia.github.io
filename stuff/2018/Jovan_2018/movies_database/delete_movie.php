<?php
	require_once('DBConnection.php');
	$stmt = $conn->prepare("delete from MOVIES where id=:movie_id");
	if (!$stmt) print_r($conn->errorInfo());
	$movie_id = $_GET['id'];
	$stmt->bindParam(':movie_id', $movie_id);
	$stmt->execute();
	header("Location: search.php");
?>