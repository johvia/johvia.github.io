<?php
//require_once('DBConnection.php');
session_start();
$sess_id=session_id();
if(isset($_POST['user_name']) && isset($_POST['password'])){


	//put something in the DB
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];


	$stmt = $conn->prepare("SELECT password FROM `users` WHERE user_name= :username");
	$stmt->bindParam(':username', $user_name);
	$stmt->execute();

	$result = $stmt->fetchAll();
	$loginSuccess=false;
	if(count($result) == 1){
		$row = $result[0];
		$hashed_password = $row['password'];
		if(password_verify($password, $hashed_password) ){
			$stmt = $conn->prepare("update users set session_id = :sess_id where user_name=:user_name");

			$stmt->bindParam(':sess_id', $sess_id);
			$stmt->bindParam(':user_name', $user_name);
			$stmt->execute();
			$loginSuccess=true;
		}
	}
	if($loginSuccess){
		showMenu();
	}else{
		displayLoginForm("Your user name or password was wrong");
	}
}else{

	$stmt = $conn->prepare("select user_name from users where session_id=:sess_id");
	$stmt->bindParam(':sess_id', $sess_id);
	$stmt->execute();
	$result = $stmt->fetchAll();
	if(count($result)==1){
		showMenu();
	}else{
		displayLoginForm("");
	}
}

function showMenu(){
	header("Location: admindeletion.php");
}

function displayLoginForm($message){

	echo <<<ENDOFFORM
	<!DOCTYPE html>
	<html>
	<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<link href="admin.ico" rel="icon" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="theme3.css">
	</head>
	<body>
	<div class='login'>
		<h1>Login</h1>
		<em style='color:red'>$message</em>
		<form action='login.php' method='POST'>
			<table>
				<tr><th>User Name</th><td><input type='text' name='user_name'></td></tr>
				<tr><th>Password</th><td><input type='password' name='password'></td></tr>
				<tr><td colspan=2><input type='submit' value='Login'></td></tr>

			</table>
		</form>
		<tr><td colspan=2><input class='back' onclick="location.href='pageone.php'" type='submit' value='Back'/></td></tr>
	</div>
	<br>
	<div class='mgodfrey'>
	Mr.Godfrey
	Your Login Info is:
	<br>Username: mgodfrey
	<br>Password: password
	</div>
	</body>
	</html>
ENDOFFORM;
}

?>
