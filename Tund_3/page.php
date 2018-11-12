<?php
  //echo "Siin on minu esimene PHP";
  $name = "Tundmatu";
  $surname = "inimene";
	$dirToRead = "../../pics/";
	$allFiles = array_slice(scandir($dirToRead), 2);
	//var_dump($allFiles);
	//var_dump($_POST);
	if (isset($_POST["firstname"])) {
		$name = $_POST["firstname"];
	}
	if (isset($_POST["surname"])) {
		$surname = $_POST["surname"];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <title>
	<?php
		echo $name;
		echo " ";
		echo $surname;
	?>
  </title>
</head>
<body>
  <h1>
  <?php
	echo $name ." " .$surname
	?>
  </h1>
  <p> <a  href="https://www.wincalendar.com/Calendar/Date/June-18-2018" target="_blank">June 18, 2018</a> RIP</p>
	<hr>
	
	<form method="POST">
	<label>Eesnimi:</label>
	<input name="firstname" type="text" value="">
	<label>Perekonnanimi:</label>
	<input name="surname" type="text" value="">
	<label>Sünniaasta</label>
	<input name="birthyear" type="number" min="1924" max="2007" value="1999">
	<br>
	<input name="submitUserData" type="submit" value="Saada Andmed">
	
	</form>
	
	<?php
		if (isset($_POST["submitUserData"])){
			echo "<br><p>Olete elanud järgnevatel aastatel:</p>";
			echo "<ul> \n";
		for ($i = $_POST["birthyear"]; $i <= date("Y"); $i+=1){
				echo "<li>" . $i ."</li> \n";
			}
			echo "</ul> \n";
			//<ul> ja <ol> on erinevad loendid;
		}
	?>
</body>
</html>