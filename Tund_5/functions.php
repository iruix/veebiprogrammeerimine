<?php
require("../vp2018config.php");
//echo $GLOBALS["serverHost"];
//echo $GLOBALS["serverUsername"];
//echo $GLOBALS["serverPassword"];
$database = "if18_braian_ju_1";

	function signup($name, $surname, $email ,$gender, $birthDate, $password){
		$notice = "";
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], 
		$GLOBALS["serverPassword"], $GLOBALS["database"]);
		$stmt = $mysqli ->prepare("INSERT INTO vpusers (firstname, lastname, birthdate, gender, email, password) VALUES(?,?,?,?,?,?)");
		echo $mysqli->error;
		//krüpteerin parooli, kasutades juhuslikku soolamisfraasi (salting string)
		$options = [
			"cost" => 12,
			"salt" => substr(sha1(rand()), 0, 22),
			];
		$pwdhash = password_hash($password, PASSWORD_BCRYPT, $options);
		$stmt->bind_param("sssiss",$name, $surname, $email ,$gender, $birthDate, $pwdhash);
		if($stmt->execute()){
			$notice = "ok";
		} else {
			$notice = "error";
		}
		$stmt->close();
		$mysqli->close();
		return $notice;
	}
function saveAMsg($msg){
  //echo "Töötab!";
  $notice = ""; //see on teade, mis antakse salvestamise kohta
  //loome ühenduse andmebaasiserveriga
  $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
  //Valmistame ette SQL päringu
  $stmt = $mysqli->prepare("INSERT INTO vpamsg3 (message) VALUES(?)");
  echo $mysqli->error;
  $stmt->bind_param("s", $msg);//s - string, i - integer, d - decimal
  if ($stmt->execute()){
	$notice = 'Sõnum: "' .$msg .'" on salvestatud!';  
  } else {
	$notice = "Sõnumi salvestamisel tekkis tõrge: " .$stmt->error;
  }
  $stmt->close();
  $mysqli->close();
  return $notice;
}
  function readallmessages(){
	$notice = "";
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $mysqli->prepare("SELECT message FROM vpamsg3");
	echo $mysqli->error;
	$stmt->bind_result($msg);
	$stmt->execute();
	while($stmt->fetch()){
		$notice .= "<p>" .$msg ."</p> \n";
	}
	$stmt->close();
	$mysqli->close();
	return $notice;
  }
?>

