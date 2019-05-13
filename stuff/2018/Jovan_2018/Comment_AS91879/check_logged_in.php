<?php
session_start();
$sess_id=session_id();
$stmt = $conn->prepare("select user_name from users where session_id=:sess_id");
$stmt->bindParam(':sess_id', $sess_id);
$stmt->execute();
$result = $stmt->fetchAll();
if(count($result) == 0){
	header("Location: login.php");
	die();
}