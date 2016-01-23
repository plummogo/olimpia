<?php
session_start();  
 header("Content-type: image/jpeg"); 
 $im=imagecreatetruecolor(150,40);  
 $white=imagecolorallocate($im,255,255,255);
 $black=imagecolorallocate($im,0,0,0);
 $grey=imagecolorallocate($im,125,125,125);
 $chars="abcdefhjkmnpqrstuxy345789";
 $str="";
 for ($i=0;$i<6;$i++){
   $rand=rand(0,strlen($chars)-1); 
     $str.=$chars[$rand];
   }
  $_SESSION["captcha"]=$str; 
  imagefill($im,0,0,$white);  
  imagettftext($im,20,0,12,32,$grey,"arial.ttf",$str);  
  imagettftext($im,20,0,10,30,$black,"arial.ttf",$str); 
  imagejpeg($im);  
  imagedestroy($im);  
?>

