<?php
include "config.php";
$sql ="select * from user where username='".$_GET["u"]."' && password='".$_GET["p"]."'";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
mysqli_data_seek ($result, 0);
$n = count($row);
if($n>0)
{
  echo "1";
}
else
{
   echo "0";
}

?>