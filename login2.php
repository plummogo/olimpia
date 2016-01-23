<html>
<head>
<meta charset="utf8">
<link href='https://fonts.googleapis.com/css?family=Jura' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="pageStyle.css"/>
</head>
<?php
error_reporting(0);
?>
<?php	  
   session_start();
	   if($_POST['cap'] == $_SESSION['captcha'])
	   {   
				require "db.php";
				$query = mysqli_query($con,"SELECT id, jelszo, rank from users 
					WHERE fnev = '$_POST[nev]' ") or die(mysql_error());
				$perm = mysqli_fetch_array($query);
				if (strcasecmp($perm['jelszo'],$_POST['pw'])==0)
				{
						$_SESSION["isLogged"] = true;
						$_SESSION['id'] = $_POST['userid'];
						$_SESSION['nev'] = $_POST['nev'];
						if(strcasecmp($_POST['nev'],"root")==0)
						{
							$_SESSION['rank'] = 1;
						}
						else 
						{
							$_SESSION['rank'] = 0;
						}
						header("Location: home.php");
					
				}
				else
				{				
					echo "Helytelen felhasználónév vagy jelszó. <br>";
					//header("Location: index.php");
				}
				mysqli_close($con);
	   }
			else		
			{
				echo"Helytelen captcha kód";
				//header("Location: index.php");
			}
?>

</html>