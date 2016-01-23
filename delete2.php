<?php
// Turn off all error reporting
error_reporting(0);
?>

<?php
session_start();
if($_SESSION["isLogged"]==true)
{
include  "db.php";  
$username="root";
$passwd="";
$dbname="beadando";
$con=connect($username,$passwd);
mysqli_select_db($con,$dbname);
$query="select * from olimpia where azonosito=".$_POST['id'];
$result=mysqli_query($con,$query) or die ("Failed ".$query);
list($file)=mysql_fetch_row($result); 
if(is_file($file))
 { 
	unlink($file);
 }  
$query="delete from olimpia where azonosito=".$_POST['id'];  
mysqli_query($con,$query);
mysqli_close($con);
echo '<meta http-equiv="refresh" content="0; URL=delete.php">';
}
else header("Location: index.php");
?>
