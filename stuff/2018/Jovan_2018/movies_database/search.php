<!DOCTYPE html>
<html>
<head>
<title>WGP MOVIE DB</title>
<link rel="stylesheet" type="text/css" href="movies.css">
<body>
<h1>WGP Movie DB Search</h1>

<form action='search.php' method='POST'><span class='search'>
Search </span><input type='text' name='search'>
<input type='submit' value='Find movies'>
<br>
<br>
</form>
<?php
for($i=65; $i<=90; $i++){
		
		echo "<a class='letterbtn' href='search.php?letter=".chr($i)."'>".chr($i)."</a> ";
		
}
echo "<br>";
echo "<br>";
echo "<hr>";
echo "<br>";
echo "<a class='letterbtn' href='add_movie.php'> Add a movie</a>";

echo "<span class='date'>Today is " . date("d/m/Y") . "</span><br>";
echo "<br>";
echo"<hr>";



require_once('DBConnection.php');
if(isset($_POST['search'])){
	//User searched for something
	$search = "%".$_POST['search']."%";
	$stmt = $conn->prepare("SELECT id, title FROM movies WHERE title like :search or director like :search or genre like :search order by title ");
	
	$stmt->bindParam(':search', $search);
	$stmt->bindParam(':search', $search);
	$stmt->bindParam(':search', $search);
}else if(isset($_GET['letter'])){
	$search = $_GET['letter']."%";
	$stmt = $conn->prepare("SELECT id, title FROM movies WHERE title like :search order by title ");
	$stmt->bindParam(':search', $search);
}else{
	//User did not search show them the first 10 films
	$stmt = $conn->prepare("SELECT id, title from movies order by title LIMIT 10");
	if (!$stmt) print_r($conn->errorInfo());
}
$stmt->execute();
$result = $stmt->fetchAll();
for($i=0; $i<count($result); $i++){
	$row = $result[$i];
	$id = $row['id'];
	$title = $row['title'];
	echo "<a href='details.php?id=$id' class='links'>$title</a><br><br>";
}
?>
<iframe class='discord' src="https://discordapp.com/widget?id=289992145262084096&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0"></iframe>
<br>
<br>
<br>
</body>
</html>