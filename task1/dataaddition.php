<?php

$servername = "localhost";
$username = "root";
$password = "";
$db="task";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql="INSERT INTO `tasktable`(`userid`, `taskname`, `scheduledtime`, `taskstatus`) VALUES ('".$_GET["uid"]."','".$_GET["taskname"]."','".$_GET["scheduledtime"]."','0')";
$result=mysqli_query($conn,$sql);

echo "markas completed   taskname         schedultedtime";
echo "</br>";
$sqlshow ="select * from `tasktable` where userid='".$_GET["userid"]."'";
$resultshow=mysqli_query($conn,$sqlshow);
$rowshow = mysqli_fetch_assoc($resultshow);
mysqli_data_seek ($resultshow, 0);
$nshow = count($rowshow);
if($nshow>0)
{
	while($rowshow = mysqli_fetch_assoc($resultshow))
	{
		echo $rowshow["taskname"];
		echo "      "
		echo $rowshow["scheduledtime"];
		echo "</br">;
	}
}	
?>
