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
	</div>
	<div id="szoveg">
		<h1>Olimpia</h1>
		<h2>Egyéni párbajtőr</h2>
	</div>
	<div id="logoDiv">
		<a href="index.php"><img id ="logo" src="img/logo.png"/></a>
	</div>
</div>
<div id="felvitel" action="show.php">
<?php
include "db.php";
$con=connect("root",""); 
$dbname="beadando";
mysqli_select_db($con,$dbname);
$query="select * from olimpia";
$result=mysqli_query($con,$query) or die("Failed".$query);
echo "<div id=felvitel>
<h1>Módosítás</h1>";
echo "<table width=100% border=1>
<caption color=white>Adatbázisban tárolt jelentkezők:</caption><tr>";
echo "
	<th>ID</th>  
	<th>Név 
	<th>Helyszin 
	<th>Helyezés  
	<th>Ország 
	<th>Születési Év 
	<th>Fénykép</th></tr>"; 
	while (list($azonosito,$ev,$fenykep,$helyezes,$helyszin,$nev,$orszag)=
		mysqli_fetch_row($result)) 
	{  
		 echo "<form action=modify2.php method=post>
		 <input type=hidden id=id_update name=id_update value=$azonosito>";   
		 echo" 
		 <tr><td><font color=white>$azonosito</td>
		 <td><font color=white>$nev</td>
		 <td><font color=white>$helyszin</td>
		 <td><font color=white>$helyezes</td>
		 <td><font color=white>$orszag</td>
		 <td><font color=white>$ev</td>
		 <td><img src=$fenykep width=30 height=40></td></tr>
		 <td colspan=7><input type=submit value=Edit></td></tr>
		 </form>";
	}
	echo "</table></td>";
	echo "</div>";
?>
<a href=menu.php?d=5>Vissza</a>
<footer><p>Készítette:Szilvási I. Péter</p></footer>
<?php
}
	else header("Location: index.php");
?>