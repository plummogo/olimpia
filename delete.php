<html>
<head>
	<meta charset="UTF-8">
	<title>Törlés</title>
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
	}
	else header("Location: index.php");
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

if($_SESSION['rank'] == 1)
{
	include "db.php";
	$username="root";
	$passwd="";
	$dbname="beadando";
	$con=connect($username,$passwd);
	mysqli_select_db($con,$dbname);
	$query="select * from olimpia";  
	$result=mysqli_query($con,$query) or die ("Failed ".$query);
	echo "<div id=felvitel>
	<h1>Törlés</h1>";
	echo "<table width=100% border=1>
	<caption>Adatbázisban tárolt jelentkezők:</caption><tr>";
	echo "
		<th>ID</th>  
		<th>Nev 
		<th>Helyszin 
		<th>Helyezes  
		<th>Orszag 
		<th>Születési Év 
		<th>Fénykép</th></tr>"; 
	while (list($azonosito,$ev,$fenykep,$helyezes,$helyszin,$nev,$orszag)=
		mysqli_fetch_row($result)) 
	{  	
		 echo "<form action=delete2.php method=post>
		 <input type=hidden name=id value=$azonosito>";   
		 echo "
		 <td><font color=white>$azonosito</td>
		 <td><font color=white>$nev</td>
		 <td><font color=white>$helyszin</td>
		 <td><font color=white>$helyezes</td>
		 <td><font color=white>$orszag</td>
		 <td><font color=white>$ev</td>
		 <td><img src=$fenykep width=30 height=40></td>
		 <td colspan=2> <input type=submit value=X id=delete></tr>";
		 echo "</form>"; 
	}
	echo "</table></td>";
	echo "</div>";
	mysqli_close($con);
}
else if($_SESSION['rank'] == 0)
{
	echo "<font color=white> <h1>Nincs jogosultságod!</h1><br>Kérd az admint!";
	echo "<br>";
}
?>
<a href=menu.php?d=5>Vissza</a>
<footer><p>Készítette:Szilvási I. Péter</p></footer>
</body>
</html>