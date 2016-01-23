<?php
require_once "db.php"; 
session_start();
$dbname="beadando"; 
$con=connect("root","");
mysqli_select_db($con, $dbname);
$query="insert into users (fnev, jelszo,rank)
values ('".$_POST['nev']."','".$_POST['pw']."',0)";  
mysqli_query($con,$query) or die ("Unsuccesfull ".$query);
$_SESSION['id']=$_POST['id'];
mysqli_close($con); 	
echo '<meta http-equiv="refresh" content="0; URL=index.php">';
?>