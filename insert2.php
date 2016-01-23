<?php
// Turn off all error reporting
error_reporting(0);
?>
<?php
	session_start();
	if($_SESSION["isLogged"]==true)
	{
?>
<?php
require_once "db.php"; 
if(!isset($_SESSION))
{
    session_start();
}
		$dbname="beadando"; 
		$con=connect("root","");
		mysqli_select_db($con, "$dbname");
		$safe_filename=trim($_FILES['fenykep']['name']);
		$safe_filename=rand().$safe_filename;
		move_uploaded_file($_FILES['fenykep']['tmp_name'],"images/".$safe_filename); //add new line from slide 10
		$query="insert into olimpia (ev, fenykep_path, helyezes, helyszin, nev, orszag,kivitte)
		values ('".$_POST['ev']."','"."images/".$safe_filename."','".$_POST['helyezes']."','".$_POST['helyszin']."','".$_POST['nev']."','".$_POST['orszag']."','".$_SESSION['nev']."')";  
		mysqli_query($con,$query) or die ("Unsuccesfull ".$query);
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
echo '<meta http-equiv="refresh" content="0; URL=home.php">';
?>
<?php
	}
	else header("Location: index.php");
?>