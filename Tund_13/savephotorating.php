<?php
	//get meetodiga saadetavad parameetrid
	$id = $_REQUEST["id"];
	$rating = $_REQUEST["rating"];
	
	require("../../../config.php");
	$database = "if18_braian_ju_1";

	//alustan sessiooni
	session_start();
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	$stmt = $mysqli->prepare("INSERT INTO vpphotoratings (photoid, userid, rating) VALUES (?, ?, ?)");
	$stmt->bind_param("iii", $id, $_SESSION["userId"], $rating);
	$stmt->execute();
	//küsime uue keskmise hinde
	$stmt = $mysqli->prepare("SELECT AVG(rating) as AvgValue FROM vpphotoratings WHERE photoid=?");
	$stmt->bind_param("i"), $id);
	$stmt->bind_result($score);
	$stmt->execute();
	$stmt->fetch();
	$stmt->close();
	$mysqli->close();
	echo round($score, 2);
?>