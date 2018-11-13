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

<?php
error_reporting(0);
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
include "config.php";
if($_POST["show"])
{
  if($_POST["show"]==1)
  {	  
	?><center><font face="verdana"> <h1 style="color:red;"> Your Completed Tasks </h1></font></center>
	<body>
	<table id="example" border="1" class="display" style="width:600px;">
        <thead style="background-color:green;">
            <tr>
                <th>TaskName</th>
                <th>Scheduled Date</th>
                <th>Status</th>
                
            </tr>
        </thead>
        <tbody>
	<?php
	$sqltaskdata = "select * from tasktable where userid='".$_POST["uida"]."' && taskstatus='1' ORDER BY `id` DESC";
	$resulttaskdata=mysqli_query($conn,$sqltaskdata);
	$rowtaskdata = mysqli_fetch_assoc($resulttaskdata);
	if($rowtaskdata)
	{	
		mysqli_data_seek ($resulttaskdata, 0);
		$ntaskdata = count($rowtaskdata);
		if($ntaskdata>0)
		{
			while($rowtaskdata = mysqli_fetch_assoc($resulttaskdata))
			{
				?>
				<tr>
                <td><?php echo $rowtaskdata["taskname"];?></td>
                <td><?php echo $rowtaskdata["scheduledtime"];?></td>
                <td>Completed</td>
                </tr>

				<?php
			}
		}
	}
	else
	{
		echo "No completed Tasts";
	}
  }
  if($_POST["show"]==2)
  {	  
	?><center><font face="verdana"> <h1 style="color:red;"> Your All Tasks </h1></font></center>
		<body>
	<table id="example" border="1" class="display" style="width:600px;">
        <thead style="background-color:green;">
            <tr>
                <th>TaskName</th>
                <th>Scheduled Date</th>
                <th>Status</th>
                
            </tr>
        </thead>
        <tbody>
	<?php
	$sqltaskdata = "select * from tasktable where userid='".$_POST["uida"]."'  ORDER BY `id` DESC";
	$resulttaskdata=mysqli_query($conn,$sqltaskdata);
	$rowtaskdata = mysqli_fetch_assoc($resulttaskdata);
	if($rowtaskdata)
	{	
		mysqli_data_seek ($resulttaskdata, 0);
		$ntaskdata = count($rowtaskdata);
		if($ntaskdata>0)
			{
			while($rowtaskdata = mysqli_fetch_assoc($resulttaskdata))
			{
				?>
				<tr>
                <td><?php echo $rowtaskdata["taskname"];?></td>
                <td><?php echo $rowtaskdata["scheduledtime"];?></td>
				<?php
				if($rowtaskdata["taskstatus"]==0)
				{
				?>
                <td>Not Completed</td>
				<?php
				}
				else
				{
				?>
                <td>Completed</td>
				<?php
				}?>					
                </tr>

				<?php
			}
		}
	}
	else
	{
		echo "No To Do List Made Yet";
	}
  }
}
else
{
	?>
	<center><font face="verdana"> <h1 style="color:yellow;"> You did'nt Logged In </h1></font></center><?php
	include "index.php";
}	
	