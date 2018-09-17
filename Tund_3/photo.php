<?php
  //echo "Siin on minu esimene PHP";
  $name = "Braian";
  $surname = "Jullinen";
	$dirToRead = "../../pics/";
	$allFiles = array_slice(scandir($dirToRead), 2);
	//var_dump($allFiles);
	

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
  <!--<img src="http://greeny.cs.tlu.ee/~rinde/veebiprogrammeerimine2018s/tlu_terra_600x400_2.jpg" alt="TLÜ Terra Õppehoone">-->
  <!-- see tähendab, et ei loe faili. Target="_blank" näitab, et avab uues tabis lingi. see lõpetab selle kommentaari --> 
	<?php
		for ($i = 0; $i < count($allFiles); $i ++){
			echo '<img src="' .$dirToRead .$allFiles[$i] .'" alt="pilt"><br>';
		}
	?>
	
</body>
</html>