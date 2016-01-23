<html>
<head>
	<meta charset="UTF-8">
	<title>Módosítás</title>
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
<?php
	include "db.php";
	$username="root";
	$passwd="";
	$dbname="beadando";
	$con=connect($username,$passwd);
	mysqli_select_db($con,$dbname);
	$query="select * from olimpia where azonosito=".$_POST['id_update']; 
	$result=mysqli_query($con,$query) or die ("Failed ".$query);
	$rekord = mysqli_fetch_array( $result );
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
<div id="felvitel" >
<form id="mod2" action="modify3.php" method="post" enctype="multipart/form-data">
<h1>Módosítás</h1>
<table id ="tabla" border="0" align="center" color="white"cellspacing="20">
<input type='hidden' name='hfenykep' value='$rekord[fenykep]'>
<input type='hidden' name='id' value=<?php echo $rekord['azonosito'] ?>>
<tr><td>ID:</td><td align="left"><?php echo $_POST['id_update'];?></td></tr>
<tr><td>Név:</td><td align="left"><input required type="text" id="nev" name="nev" value=<?php echo $rekord['nev'] ?> size="20"></td></tr>
<tr><td>Helyszín:</td><td align="left"><input required type="text" id="helyszin" name="helyszin" value=<?php echo $rekord['helyszin'] ?> size="20" min="1"></td></tr>
<tr><td>Helyezés</td><td align="left"><input required type="number" size="5" name="helyezes" value=<?php echo $rekord['helyezes'] ?> onchange="notNegative(this.value);"></td></tr>
<tr><td>Születési év: </td><td align="left"><select required id="ev" name="ev" onChange="validate();" >
<?php
echo"<option id=0></option>";
for($i=1920;$i<2010;$i++)
  echo "<option id=$i>$i</option>";
?>
<tr><td>Ország</td><td align="left"><input required type="text" size="20" id="orszag" name="orszag" value=<?php echo $rekord['orszag'] ?>></td></tr>
<tr><td>Fénykép</td><td align="left"><input required type="file" id="fenykep" name="fenykep"></td></tr>
<tr><td ><input type="submit" value="Módosítás" id="update"/></td></tr>
</table><br> 
</form>
</div>
<br>
<a href="menu.php?d=4">Vissza</a>
<footer><p>Készítette:Szilvási I. Péter</p></footer>
</body>
</html>
</body>
</html>
<?php
}
	else header("Location: index.php");
?>