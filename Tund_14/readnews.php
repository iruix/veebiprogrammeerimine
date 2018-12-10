<?php
  require("functions.php");
  //kui pole sisse loginud
  
  //kui pole sisselogitud
  if(!isset($_SESSION["userId"])){
	header("Location: index.php");
    exit();	
  }
  
  //väljalogimine
  if(isset($_GET["logout"])){
	session_destroy();
	header("Location:  index.php");
	exit();
  }
  
  $pageTitle = "Uudised"; 
  require("header.php");
?>

<hr>
	<ul>
	  <li><a href="?logout=1">Logi välja</a>!</li>
	  <li><a href="main.php">Tagasi pealehele</a></li>
	</ul>
 <hr>