<?php   
if(!isset($_GET["d"]))  
   $_GET["d"]=0;   
switch($_GET["d"])   
 {      
     case 1: include "insert.php"; 
              break; 
     case 2: include "list.php";
                break;
	 case 3: include "delete.php";
				break;
	 case 4: include "modify.php";
				break;
	 case 5: include "home.php";
				break;
	 case 6: include "index.php";
				break;
	 case 7: include "reg.php";
				break;
	 case 8: include "info.php";
				break;
	 case 9: include "logout.php";
				break;
     default: include "index.php";
		break;    
 }
?>
