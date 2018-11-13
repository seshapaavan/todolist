<html>
<head>

</head>
<body>
<?php
include "config.php";
$sql="INSERT INTO `tasktable`(`userid`, `taskname`, `scheduledtime`, `taskstatus`) VALUES ('".$_GET["u"]."','".$_GET["name"]."','".$_GET["d"]."','0')";
$result=mysqli_query($conn,$sql);

$sqlshow ="select * from `tasktable` where userid='".$_GET["u"]."' && taskstatus='0' ORDER BY `id` DESC";
$resultshow=mysqli_query($conn,$sqlshow);
$rowshow = mysqli_fetch_assoc($resultshow);
mysqli_data_seek ($resultshow, 0);
$nshow = count($rowshow);
if($nshow>0)
{
echo '<table id="example1" border="1" class="display" style="width:600px;">';
echo '<thead>';
echo '<tr>';
echo '<th>Mark as Completed</th>';
echo '<th>Task</th>';
echo '<th>Scheduled Date</th>';
echo '<th>Update</th>';
echo '<th>Delete</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

	while($rowshow = mysqli_fetch_assoc($resultshow))
	{
		echo "<tr>";
			echo '<td><input id=';
			echo $rowshow['id'];
			echo " onclick='changestatus(this)'  value= '";
			echo $rowshow['id'];
			echo "' type='checkbox'></input></td>";
			echo "<td>";
			echo $rowshow["taskname"];
			echo "</td>";
			echo "<td>";
			echo $rowshow["scheduledtime"];
			echo "</td>";
			echo "<td><button  onclick='updatetask(this)' value='";
			echo $rowshow["id"];
			echo "'  type='button'>Update</button></td>";
			echo "<td><button  onclick='deletetask(this)' value='";
			echo $rowshow["id"];
			echo "' type='button' >Delete</button></td>";
			echo "</tr>";
	}
	echo '</tbody>';
    echo '</table>';
}	
?>
</body>
</html>