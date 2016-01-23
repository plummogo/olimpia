<html>
<head>
	<meta charset="UTF-8">
	<title>Olimpia</title>
	<link href='https://fonts.googleapis.com/css?family=Jura' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="pageStyle.css"/>
</head>
<body>
<div id="pageBox">
	<div id="header">
	<div id="kiaz">
	<?php 
	session_start();
	if($_SESSION["isLogged"] == true)
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
<div id="navBar">
<?php
require "db.php";  $username="root";
$passwd=""; $dbname="beadando";
$con=connect($username,$passwd);
mysqli_set_charset($con,"utf8");
mysqli_select_db($con,$dbname);
$query="SELECT * from menu ";   
$result=mysqli_query($con,$query) or die ("Unsuccesful".$query); 
echo "<ul>";
while ($row = mysqli_fetch_array($result))   
{  
	if($row['nev']!="Kezdőlap")
		if($row['nev']!="Bejelentkezés")
			if($row['nev']!="Regisztráció")
	{
		$nev = $row['nev'];
		$id = $row['id'];
		echo "<li>
		<a href=menu.php?d=".$id.">".$nev."</a></li>"; 
	}    
}
echo "</ul>"; 
mysqli_close($con);   

?>
</div>
	<div id="felvitel">
	<h1>Üdvözöllek a weboldalon!</h1>
	<p>
	Az újkori olimpiák férfi,egyéni párbajtőr
	dobogós helyezetteinek adatait vizsgálja 
	meg adatbázis-kezelő rendszer segítségével!
	</p>
	<br>
	<p>
	<strong>Szilágyi Áron</strong>(Budapest, 1990. január 14. –) olimpiai, világ- és Európa-bajnok magyar kardvívó. A Vasas SC versenyzője. A STRONGAA Management által képviselt sportoló.
	</p>
	</div>
	<div>
	<h1>Sportpályafutása</h1>
	<p>
	2006-ban a kadett világbajnokságon ötödik helyezést szerzett. A juniorok között 31. lett. Ugyanitt csapatban kilencedik volt. A Poznańban megrendezett junior Európa-bajnokságon aranyérmes lett, csapatban hatodik volt. 2007-ben kadett Európa-bajnok volt egyéniben és csapatban is. Ugyanebben az évben a kadett világbajnokságon második helyezést ért el. Ugyanebben az évben a szentpétervári világbajnokságon – Decsi Tamás, Lontay Balázs és Nemcsik Zsolt társaként – aranyérmet szerzett csapatban,[1] egyéniben a 42. helyen végzett. A prágai junior Európa-bajnokságon második lett egyéniben és csapatban egyaránt.

	2008-ban a junior vb-n egyéniben hatodik, csapatban első lett. Az Európa-bajnokságon egyéniben 18., csapatban hetedik volt. 18 évesen egyéniben a legjobb 16 közé került a 2008-as pekingi olimpián. Csapatban hetedikként zárt. Az amszterdami junior Eb-n csapatban szerzett ezüstérmet. Az év végén megnyerte a magyar bajnokságot. 2009-ben a junior vb-n egyéniben második, csapatban első lett. A debreceni U23-as Európa-bajnokságon a legjobbnak bizonyult. A felnőtt Eb-n csapatban 4., egyéniben 30. volt. Az antalyai világbajnokságon 13., csapatban harmadik volt. A junior Eb-n egyéniben aranyérmes, csapatban hatodik lett.

	2010-ben a junior világbajnokságon egyéniben harmadik, csapatban kilencedik volt. Az Európa-bajnokságon 11., csapatban hatodik lett. A párizsi világbajnokságon 6. helyezést ért el, csapatban 10.-ként zárt. A magyar bajnokságon hatodik lett.
	</p>
	</div>
	</div>
<footer>
<p>Készítette:Szilvási I. Péter</p>
</footer>
</body>
</html>