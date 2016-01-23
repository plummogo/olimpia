<html>
<head>
	<meta charset="UTF-8">
	<title>Listázás</title>
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
<?php
if($_SESSION["isLogged"]==true)
{
	include "db.php";
	$con=connect("root",""); 
	$dbname="beadando";
	mysqli_select_db($con,$dbname);
	$query="select * from olimpia";
	if(!isset($_GET['order']))
		$_GET['order']=0;
	switch ($_GET['order']) 
	{
		case 0:
			$query.=" order by azonosito";
			break;
		case 1:
			$query.=" order by nev";
			break;
		case 2:
			$query.=" order by helyszin";
			break;
		case 3:
			$query.=" order by helyezes";
			break;		
		case 4:
			$query.=" order by orszag";
			break;	
		case 5:
			$query.=" order by ev";
			break;		
	}
	$result=mysqli_query($con,$query) or
	die("Failed".$query);
	echo "<div id=felvitel>
	<h1>Listázás</h1>";
	echo "<table width=100% border=1>
	<caption>Adatbázisban tárolt jelentkezők:</caption><tr>";
	echo "
		<th><a href=list.php?d=".$_GET['d']."&order=0> By ID</a></th>  
		<th><a href=list.php?d=".$_GET['d']."&order=1> By Nev </a> 
		<th><a href=list.php?d=".$_GET['d']."&order=2>By Helyszin </a>
		<th><a href=list.php?d=".$_GET['d']."&order=3>By Helyezes </a> 
		<th><a href=list.php?d=".$_GET['d']."&order=4>By Orszag </a>	
		<th><a href=list.php?d=".$_GET['d']."&order=5>By Születési Év </a>
		<th><p>Fénykép</p></th></tr>";
	while (list($azonosito,$ev,$fenykep,$helyezes,$helyszin,$nev,$orszag)=
		mysqli_fetch_row($result)) 
	{  
		 echo"
		 <tr><td><font color=white>$azonosito</td>
		 <td><font color=white>$nev</td>
		 <td><font color=white>$helyszin</td>
		 <td><font color=white>$helyezes</td>
		 <td><font color=white>$orszag</td>
		 <td><font color=white>$ev</td>
		 <td><img src=$fenykep width=30 height=40></td></tr>";
	}
	echo "</table></td>";
	echo "</div>";
}
else
{	
	header("Location: index.php");
}
?>
<a href="menu.php?d=5">Vissza</a>
<footer><p>Készítette:Szilvási I. Péter</p></footer>
</body>
</html>
<?php
	}
else header("Location: index.php");
?>