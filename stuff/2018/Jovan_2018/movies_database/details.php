<?php
require_once('DBConnection.php');
$stmt = $conn->prepare("SELECT * from movies WHERE id= :id");
$movie_id = $_GET["id"];
$stmt->bindParam(':id', $movie_id);
$stmt->execute();
$result = $stmt->fetchAll();
if(count($result) == 1){
	$row = $result[0];
	$title = $row['title'];
	$year = $row['year'];
	$classification = $row['classification'];
	$rating = $row['rating'];
	$genre = $row['genre'];
	$director = $row['director'];
	$profit = $row['profit'];
	$poster = $row['poster'];
	if(strlen($poster)>0){
		$poster="<img src='$poster' alt='$title'>";
	}
echo <<<EOD
<!DOCTYPE html>
<html>
<head>
<title>WGP DB - $title</title>
<link rel="stylesheet" type="text/css" href="movies.css">
<body>
<h1>WGP Movie DB</h1>
<a class='letterbtn' href="http://localhost/phpscripts/details/search.php"> Home </a>
<br>
<br>
<hr>
<h2>$title</h2>

<span class='label'>Year:</span><span class='details'>$year</span><br>
<span class='label'>Classification:</span><span class='details'>$classification</span><br>
<span class='label'>Rating:</span><span class='details'>$rating</span><br>
<span class='label'>Genre:</span><span class='details'>$genre</span><br>
<span class='label'>Director(s):</span><span class='details'>$director</span><br>
<span class='label'>Gross USA:</span><span class='details'>$$profit</span><br>
$poster<br><br>
<a href='delete_movie.php?id=$movie_id' class='deletebtn'>Delete Movie</a><br>

</body>
</html>

EOD;
	
}else{
	echo "No such movie id";
}
?>