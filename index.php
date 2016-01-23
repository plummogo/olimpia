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
session_start();
if(!isset($_SESSION))
	{
		session_start();
	}
	print "<h1>Bejelentkezés</h1>";
	print "<form action=login2.php method=post enctype=multipart/form-data>";
	print "<table id =tabla border=0 align=center color=white cellspacing=20>";
	print "<tr><td align=left>Felhasználó név:</td><td align=left><input required type=text id=nev name=nev size=20></td></tr>";
	print "<tr><td align=left>Jelszó</td><td align=left><input required type=password id=pw name=pw></td></tr>";
	print "<tr><td align=left>Írja be a képen látható karaktereket</td><td align=left><input required type=text name=cap id=cap size=20></td></tr>";
	print "<tr><td colspan=2><img src=chp.php></td></tr>";
	print "<input type=hidden name=userid id=userid>";
	print "<tr><td colspan=2><input type=submit value=OK></td></tr>";
	print "<tr><td colspan=2><p>Még nem regisztráltál?  Tedd meg<a href=menu.php?d=7><strong> itt.</strong></a></p></td></tr>";
	print "</table>";
	print "</form>";
?>
</div>
<footer>
<p>Készítette:Szilvási I. Péter</p>
</footer>
</body>

</html>