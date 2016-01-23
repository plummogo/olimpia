<html>
<head>
	<meta charset="UTF-8">
	<title>Módosítás</title>
	<link href='https://fonts.googleapis.com/css?family=Jura' rel='stylesheet' type='text/css'>
</head>
<?php
// Turn off all error reporting
error_reporting(0);
?>
<?php

session_start();
if($_SESSION["isLogged"]==true)
{
	require_once "db.php"; 
	$dbname="beadando";
	$con=connect("root","");
	mysqli_select_db($con,$dbname);
	if(isset($con) == null)
	{
		echo "Hiba az adatbáziskapcsolat kialakításában".mysql_error();
	}
	$_kep=trim($_FILES['fenykep']['name']);
	if($_kep != "")
	{
		$_kep="images/".rand()."_".$_kep;
		move_uploaded_file($_FILES['fenykep']['tmp_name'],$_kep);
		unlink($_POST['hfenykep']);
	}
	else
	{
		$_kep=$_POST['hfenykep'];
	}
		$query = "UPDATE olimpia SET 
		nev='$_POST[nev]',
		ev=$_POST[ev],
		helyezes=$_POST[helyezes],
		helyszin='$_POST[helyszin]',
		orszag='$_POST[orszag]',
		fenykep_path='$_kep'
		WHERE azonosito=$_POST[id]";
		mysqli_query($con,$query) or die("Failed ".$query);
		echo '<meta http-equiv="refresh" content="0; URL=home.php">';
		mysqli_close($con);
?>
<?php
		$path=realpath('C:/wamp/www/images');
		$percent=0.5; 
		$bigimage="images/".$safe_filename;
		$smallimage ;
		list($width,$height)=getimagesize($bigimage); 
		$new_width = $width * $percent; 
		$new_height = $height * $percent;
		$image_p=imagecreatetruecolor($new_width, $new_height);
		$newimage=imagecreatefromjpeg($bigimage);
		chmod($path.$smallimage,0777);
		if(imagecopyresampled($image_p,$newimage,0,0,0,0,$new_width, $new_height, $width, $height))  
		   echo "Successfull";
		imagejpeg($image_p,$path.$smallimage,100); 
?>
<?php
}
else
{
	header("Location: index.php");
}
?>
</html>