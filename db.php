<?php
function connect($username,$passwd)
{  
   $con=mysqli_connect('localhost',$username,$passwd);
   if(!isset($con))  
	{ 
        echo "Error".mysqli_error();  
	}  
return $con;
}
$dbname="beadando";
$con=connect("root","");  
mysqli_select_db($con,$dbname);
				if(isset($con) == null)
				{
					echo "Hiba az adatbáziskapcsolat kialakításában".mysql_error();
				}

				mysqli_select_db($con,"$dbname"); 
?>