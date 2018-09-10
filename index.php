<?php
  //echo "Siin on minu esimene PHP";
  $name = "Braian";
  $surname = "Jullinen";
	$today = date("d.m.Y");
	$hournow = date("H");
	$tod = "";
	if ($hournow < 8) {
		$tod = "varajane hommik";
	}
	if ($hournow >= 8 and $hournow < 16) {
		$tod = "kooliaeg";
	}
	if ($hournow >= 16) {
		$tod = "vaba aeg";
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
  <?php
	echo "<p> Tänane kuupäev on " .$today . "</p> \n";
	echo "<p> Lehe avamise hetkel oli kell " .date("H:i:s") .", käes on " .$tod .".</p> \n";
	?>
  <!--<img src="http://greeny.cs.tlu.ee/~rinde/veebiprogrammeerimine2018s/tlu_terra_600x400_2.jpg" alt="TLÜ Terra Õppehoone">-->
  <!-- see tähendab, et ei loe faili. Target="_blank" näitab, et avab uues tabis lingi. see lõpetab selle kommentaari --> 
    <img src="http://greeny.cs.tlu.ee/~rinde/veebiprogrammeerimine2018s/tlu_terra_600x400_2.jpg" alt="TLÜ Terra Õppehoone">
	<p>Mu naaber teeb ka veebi, siin on ta <a href="http://greeny.cs.tlu.ee/~alekmog/" target="_blank">leht</a></p>
</body>
</html>