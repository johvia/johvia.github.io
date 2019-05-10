<?php
require_once('DBConnection.php');
session_start();
$sess_id=session_id();
$stmt = $conn->prepare("update users set session_id = '' where session_id=:sess_id");
$stmt->bindParam(':sess_id', $sess_id);
$stmt->execute();
header('Location: login.php');
?>