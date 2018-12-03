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
  $pageTitle = "Pealeht";
  $scripts = '<script type="text/javascript" src="javascript/randompic.js" defer></script>' ."\n";
  
  require("header.php");
?>

<body>
	<p>See leht on valminud <a href="http://www.tlu.ee" target="_blank">TLÜ</a> õppetöö raames ja ei oma mingisugust, mõtestatud või muul moel väärtuslikku sisu.</p>
	<hr>
	<p>Olete sisse loginud nimega: <?php echo $_SESSION["userFirstName"] ." " .$_SESSION["userLastName"]; ?>. <b><a href="?logout=1">Logi välja!</a></b></p>
	<ul>
	  <li>Minu <a href="userprofile.php">kasutajaprofiil</a>.</li>
	  <li>Süsteemi <a href="users.php">kasutajad</a>.</li>
	  <li>Valideeri anonüümseid <a href="validatemsg.php">sõnumeid</a></li>
	  <li>Valideeritud sõnumid <a href="validatedmessages.php">kasutajate kaupa</a>.</li>
	  <li>Fotode <a href="photoupload.php">üleslaadimine</a></li>
	  <li>Piltide <a href="gallerypub.php">galerii</a></li>
	</ul>
	<hr>
	<div id="pic">
	</div>
  </body>
</html>