4<html>
<head>
	<meta charset="UTF-8">
	<title>Felvitel</title>
	<link href='https://fonts.googleapis.com/css?family=Jura' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="pageStyle.css"/>
	<script>
	function notNegative(inputValue)
	{
			if (inputValue <= 0)  
			{
				alert("Incorrect value");
				return false;
			}
			else{
				return true;
			}
	}
	</script>
</head>
<body>
<?php
if(isset($_SESSION))
{
    session_start();
	header("Location: index.php");
}
?>
<div id="pageBox">
<div id="header">
	<div id="kiaz">
		<?php 
		session_start();
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
<?php
if($_SESSION["isLogged"]==true)
{
?>
	<div id="felvitel">
	<form id="urlap" name="urlap" action="insert2.php" enctype="multipart/form-data" onsubmit="return isEmpty();" method="post">
	<h3>Személyes adatok:</h3>
	<table id ="tabla" border="0" align="center" color="white"cellspacing="20">
	<tr><td>Név:</td><td align="left"><input required type="text" id="nev" name="nev" size="20"></td></tr>
	<tr><td>Helyszín:</td><td align="left"><input required type="text" id="helyszin" name="helyszin" size="20" min="1"></td></tr>
	<tr><td>Helyezés</td><td align="left"><input required type="number" size="5" name="helyezes" min="1" onchange="notNegative(this.value);"></td></tr>
	<tr><td>Születési év: </td><td align="left"><select required id="ev" name="ev">
	<?php
	echo"<option id=0></option>";
	for($i=1920;$i<2010;$i++)
	  echo "<option id=$i>$i</option>";
	?>
	<tr><td>Ország</td><td align="left"><input required type="text" size="20" id="orszag" name="orszag"></td></tr>
	<tr><td>Fénykép</td><td align="left"><input required type="file" id="fenykep" name="fenykep"></td></tr>
	<tr><td colspan="2"><input type="submit" value="Felvitel" id="insert"/></td></tr>
	</table><br>
	</form>
<?php
}
else 
{
	header("Location: index.php");
}
?>
<a href=menu.php?d=5>Vissza</a>
</div>
</div>
<footer><p>Készítette:Szilvási I. Péter</p></footer>
</body>
</html>