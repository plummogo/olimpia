<html>
<head>
	<meta charset="UTF-8">
	<title>Regisztráció</title>
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
<h1>Regisztráció</h1>
<form action="reg2.php" enctype="multipart/form-data" method="post">
<input type="hidden" id="user-id">
<table id ="tabla" border="0" align="center" color="white"cellspacing="20">
<tr><td align="left">*Felhasználó név:</td><td align="left"><input required type="text" id="nev" name="nev" size="20"></td></tr>
<tr><td align="left">Jelszó</td><td align="left"><input required type="password" name="pw"></td></tr>
<tr><td align="left">*Jelszó megerősítése: </td><td align="left"><input required type="password" id="ev" name="pw2"  >
<tr><td colspan="2"><input type="submit" value="Regisztráció" id="reg"/></td></tr>
</table><br>
</form>
</div>
<footer>
<p>Készítette:Szilvási I. Péter</p>
</footer>
</body>
</html>