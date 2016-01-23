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
	print "<h1>Keresés</h1>";
	print "<form action=info2.php method=post enctype=multipart/form-data>";
	print "<table id =tabla border=0 align=center color=white cellspacing=20>";
	print "<tr><td align=left>Felhasználó név:</td><td align=left><input required type=text id=nev name=nev size=20></td></tr>";
	print "<tr><td colspan=2><input type=submit value=Keresés></td></tr>";
	print "</table>";
	print "</form>";
?>
</div>
<a href=menu.php?d=5>Vissza</a>
<footer>
<p>Készítette:Szilvási I. Péter</p>
</footer>
</body>
<?php
	}
	else header("Location: index.php");
?>
</html>