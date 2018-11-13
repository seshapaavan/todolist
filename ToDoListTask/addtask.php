<?php

include "config.php";

?>
<html>
<head>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

</head>
<body>
<form action="addtask.php" method="post">
	Name of the Task<input type="text" name="taskname" id="taskname"></input> Schedule Date <input type="date"  name="taskdate" id="taskdate"></input>
	<button type="button" onclick="a()" name="addtask" id="addtask">Add</button>
	<input type="hidden" name="uida" id="uida" value="<?php echo $_POST["u"];?>"></input>
	</form>
	<?php
$sql="INSERT INTO `tasktable`(`userid`, `taskname`, `scheduledtime`, `taskstatus`) VALUES ('".$_POST["uida"]."','".$_POST["taskname"]."','".$_POST["taskdate"]."','0')";

$result=mysqli_query($conn,$sql);


$sqlshow ="select * from `tasktable` where userid='".$_POST["uida"]."' ORDER BY `id` DESC";
$resultshow=mysqli_query($conn,$sqlshow);
$rowshow = mysqli_fetch_assoc($resultshow);
mysqli_data_seek ($resultshow, 0);
$nshow = count($rowshow);
if($nshow>0)
{
echo '<table id="example" border="1" class="display" style="width:600px;">';
echo '<thead style="background-color:green;">';
echo '<tr>';
echo '<th>Mark as Completed</th>';
echo '<th>Task</th>';
echo '<th>Scheduled Date</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

	while($rowshow = mysqli_fetch_assoc($resultshow))
	{
		echo '<tr>';
        echo '<td><input type="checkbox"></input></td>';
        echo '<td>';
		echo $rowshow["taskname"];
		echo '</td>';
        echo '<td>';
		echo $rowshow["scheduledtime"];
		echo '</td>';
        echo '</tr>';
		
	}
	echo '</tbody>';
    echo '</table>';
}	
?>
</body>
</html>