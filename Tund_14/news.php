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
  
  $pageTitle = "Uudiste lisamine"; 
  require("header.php");
  
  $expiredate = date("Y-m-d");
?>

<hr>
	<ul>
	  <li><a href="?logout=1">Logi välja</a>!</li>
	  <li><a href="main.php">Tagasi pealehele</a></li>
	</ul>
  <hr>

<!-- Lisame tekstiredaktory TinyMCE -->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector:'textarea#newsEditor',
		plugins: "link",
		menubar: 'edit',
	});
</script>

<form method="POST" action="/~braijul/veebiprogrammeerimine/Tund_14/readnews.php">
	<label>Uudise pealkiri:</label><br><input type="text" name="newsTitle" id="newsTitle" style="width: 100%;" value=""><br>
	<label>Uudise sisu:</label><br>
	<textarea name="newsEditor" id="newsEditor"></textarea>
	<br>
	<label>Uudis nähtav kuni (kaasaarvatud)</label>
	<input type="date" name="expiredate" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" value="<?php echo $expiredate; ?>">
	
	<input name="newsBtn" id="newsBtn" type="submit" value="Salvesta uudis!">
</form>
