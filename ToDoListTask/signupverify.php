<?php
$nv=0;
include "config.php";
$sqlusername ="select * from user where username='".$_GET["u"]."'";
$resultusername=mysqli_query($conn,$sqlusername);
$rowusername = mysqli_fetch_assoc($resultusername);
if($rowusername)
{	
mysqli_data_seek ($resultusername, 0);
$nusername = count($rowusername);
if($nusername>0)
{
  $nv=$nv+10;
}
}
$sqlemail ="select * from user where email='".$_GET["e"]."'";
$resultemail=mysqli_query($conn,$sqlemail);
$rowemail = mysqli_fetch_assoc($resultemail);
if($rowemail)
{	
mysqli_data_seek ($resultemail, 0);
$nemail = count($rowemail);
if($nemail>0)
{
  $nv=$nv+5;
}
}
if($nv==0)
{
	echo "1";
}
elseif($nv>10)
{
	echo "2";
}	
elseif($nv>12)
{
	echo "3";
}
else
{
	echo "4";
}	
?>