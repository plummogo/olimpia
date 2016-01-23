<html>
<head>
	<meta charset="UTF-8">
	<title>Bejelentkezés</title>
	<link href='https://fonts.googleapis.com/css?family=Jura' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="pageStyle.css"/>
</head>
<body>
<div id="pageBox">
<div id="header">
	<div id="kiaz">
	<?php 
	session_start();
	if($_SESSION["isLogged"]==true)
	{
	echo "Bejelentkezve: ".$_SESSION['nev']; 
	?>
	</div>
	<div id="szoveg">
		<h1>Olimpia</h1>
		<h2>Egyéni párbajtőr</h2>
	</div>
	<div id="logoDiv">
		<a href="index.php"><img id ="logo" src="img/logo.png"/></a>
	</div>
</div>
<div id="felvitel">
<?php
	$sum = 0;
	require "db.php";
	$query = "SELECT azonosito, kivitte, COUNT(azonosito) FROM olimpia GROUP BY azonosito"; 
	print "<table id =tabla border=0 align=center color=white cellspacing=20>";
	print "<tr><td align=left>Felhasználó név:</td><td align=left>".$_POST['nev']."</td></tr>";
	$result = mysqli_query($con,$query) or die ("Failed ".$query);
	while($row = mysqli_fetch_array($result))
	{
		if(strcasecmp($_POST['nev'],$row['kivitte'])==0)
			$sum += $row['COUNT(azonosito)'];
		else $sum= 0;
	}
	print "<tr><td align=left>SUM:</td><td align=left>".$sum."</td></tr>";
	print "</table>";
?>
</div>
<a href=menu.php?d=5>Vissza</a>
<footer>
<p>Készítette:Szilvási I. Péter</p>
</footer>
</body>
</html>
<?php
	}
else header("Location: index.php");
?>