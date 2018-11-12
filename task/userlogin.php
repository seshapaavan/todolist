<?php
print_r($_POST);

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

?>
<html>
<head>
</head>
<body>
<?php
if($_POST["submit"]==1)
{?>
<h1>Welcome <?php echo $_POST["loginusername"];?></h1>
<?php
}
else
{
?>
<h1>Welcome  <?php echo $_POST["signupusername"];?></h1>
<?php
}	
?>
<h1> Your To Do List </h1>
<?php
if($_POST["submit"]==1)
{
	?>
	Name of the Task<input type="text" name="taskname" id="taskname"></input> Schedule Date <input type="date" name="taskdate" id="taskdate"></input><button type="button" name="addtask" id="addtask">Add</input>
	
	<?php
}
else
{
	echo "Start Your ToDoList !! Enter New Task";
	?>
	Name of the Task<input type="text" name="newtaskname" id="newtaskname"></input> Schedule Date <input type="date" name="newtaskdate" id="newtaskdate"></input><button type="button" name="newaddtask" id="newaddtask">Add</input>
	<?php
}	
?>
</body>
</html>