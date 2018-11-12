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

?>
<html>
<head>
<script type="text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
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
	Name of the Task<input type="text" name="taskname" id="taskname"></input> Schedule Date <input type="date" name="taskdate" id="taskdate"></input>
	<button type="button" onclick="a()" name="addtask" id="addtask">Add</button>
	
	<?php
}
else
{
	echo "Start Your ToDoList !! Enter New Task";
	$sql="INSERT INTO `user`(`username`, `email`, `password`) VALUES ('".$_POST["signupusername"]."', '".$_POST["signupuseremail"]."', '".$_POST["signuppassword"]."')";
	echo $sql;
	$result=mysqli_query($conn,$sql);
	$sqluserinfo = "select * from user where email='".$_POST["signupuseremail"]."'";
	echo $sqluserinfo;
	$resultuserinfo=mysqli_query($conn,$sqluserinfo);
	$rowuserinfo = mysqli_fetch_assoc($resultuserinfo);
	mysqli_data_seek ($resultuserinfo, 0);
	$nuserinfo = count($rowuserinfo);
	if($nuserinfo>0)
	{
	   	while($rowuserinfo = mysqli_fetch_assoc($resultuserinfo))
		{
			$uid=$rowuserinfo["id"];
		}	
	}
	?>
	Name of the Task<input type="text" name="newtaskname" id="newtaskname"></input> Schedule Date <input type="date" name="newtaskdate" id="newtaskdate"></input>
	<button type="button" onclick="na()" name="newaddtask" id="newaddtask">Add</button>
	<?php
}	
?>
<div id="res"></div>
<script type="text/javascript" >
function na()
{
	alert("hai");
	var u =<?php echo $uid; ?>
	alert(u);
	xmlhttp.onreadystatechange=function() 
	{
		if (this.readyState==4 && this.status==200) 
		{
			var result = this.responseText.split(",");
			alert(result);
			document.getElementById("res").innertHTML = result;
		}
	}
	xmlhttp.open("GET","dataaddition.php?name="+document.getElementById("newtaskname").value+"&d="+document.getElementById("newtaskdate").value+"&uid="+u,true);
    xmlhttp.send();
}	
</script>	
</body>
</html>