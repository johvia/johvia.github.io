<?php
if(isset($_POST['title'])){
	require_once('DBConnection.php');
	$stmt = $conn->prepare("INSERT INTO MOVIES (title, year, classification, rating, genre, director, profit, poster) VALUES (:title, :year, :classification, :rating, :genre, :director, :profit, :poster);");
	$title =$_POST['title'];
	$year =$_POST['year'];
	$classification =$_POST['classification'];
	$rating =$_POST['rating'];
	$genre =$_POST['genre'];
	$director =$_POST['director'];
	$profit =$_POST['profit'];
	$poster =$_POST['poster'];
	
	$stmt->bindParam(':title', $title);
	$stmt->bindParam(':year', $year);
	$stmt->bindParam(':classification', $classification);
	$stmt->bindParam(':rating', $rating);
	$stmt->bindParam(':genre', $genre);
	$stmt->bindParam(':director', $director);
	$stmt->bindParam(':profit', $profit);
	$stmt->bindParam(':poster', $poster);
	$stmt->execute();
	header("Location: search.php");	
}
?>
<!DOCTYPE html>
<html>
<head>
<title>WGP MOVIE DB</title>
<link rel="stylesheet" type="text/css" href="movies.css">
<body>
<h1>Add a new Movie</h1>
<form action='add_movie.php' method='POST'>
<span class='label'>Title</span><input type='text' name='title'><br>
<span class='label'>Year</span><input type='text' name='year'><br>
<span class='label'>Classification</span>
<select name='classification'>
	<option value='G'>G</option>
	<option value='PG'>PG</option>
	<option value='PG-13'>PG-13</option>
	<option value='R'>Restricted</option>
	<option value='NC-17'>Adults only</option>
</select>
<br>
<span class='label'>Rating</span><input type='text' name='rating'><br>
<span class='label'>Genre</span><input type='text' name='genre'><br>
<span class='label'>Director(s)</span><input type='text' name='director'><br>
<span class='label'>Gross USA Profit</span><input type='text' name='profit'><br>
<span class='label'>Poster file</span><input type='text' name='poster'><br>
<input type='submit' value='Submit Movie'>
</form>
<br>
<a class='letterbtn' href='search.php'> Back to search</a>
</body>
</html>
