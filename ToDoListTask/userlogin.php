<html>
<head>
<title>ToDoList</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })

    })
</script>
<script type="text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
<style>
table
{
	margin-top:20px;
}	
td
{
  padding-right: 10px;
  text-align:center;
  height:30px;
}

input[type="checkbox"]{
  width: 30px; /*Desired width*/
  height: 30px; /*Desired height*/
}

thead
{
	background-color:green;
	
}
th
{
		height:60px;
		color:white;
		text-align:center;
}	
</style>
</head>
<body>
<?php
include "config.php";
error_reporting(0);
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
$v=$_POST["s"];
if(isset($v))
{	
    //************************Heading********************************// 
	if($_POST["s"]==1)
	{?>
	<table style="float:left;"><tr><font face="verdana"> <h3 style="color:red;">Welcome <u><i><?php echo $_POST["loginusername"];?></i></u></h3></font></p></tr></table>
	<a href="index.php"><button style="float:right;" class="btn btn-danger" type="button" name="logout1" id="logout1">Logout</button></a>
	<?php
	}
	else
	{
	?>
	<table style="float:right;"><tr><font face="verdana"> <h3 style="color:red;">Welcome<u><i><?php echo $_POST["signupusername"];?></h3></i></u></font></tr></table>
	<a href="index.php"><button style="float:right;" class="btn btn-danger" type="button" name="logout1" id="logout1">Logout</button></a>
	<?php
	}	
    //*************************LoginUser***************************//
	if($_POST["s"]==1)
	{
			?>
			<center><table><tr><font face="verdana"> <h3 style="color:#f93838;">Your's</h3></font></p></tr></table></center>
			<form action="show.php" target="_blank" method="POST">
			<center><table>
			<tr>
				<td><button type="button" class="btn-lg btn-primary" onclick="todolist()" name="todolist" id="todolist">TodoList</button></td>
				<td><button type="submit" class="btn-lg btn-success" value="1" name="show" id="completed">Completed</button></td>
				<td><button type="submit" class="btn-lg btn-info"    value="2" name="show" id="all">All Tasks</button></td>
			</tr>	
			</table></center>
			<center>
			<table>
			<tr>
			<td>Name of the Task:</td><td><input type="text" class="form-control" name="taskname" id="taskname"></input></td>
			<td>Schedule Date:</td><td><input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/></input></td>
			<td><button type="button" class="btn btn-success" onclick="a()" name="addtask" id="addtask">Add</button></td>
			</tr>
			</table>
			</center>
			<!------------Login Data Table--------------------------------------->
			<center>
			<?php
			$sqluserinfo = "select * from user where username='".$_POST["loginusername"]."'";
			$resultuserinfo=mysqli_query($conn,$sqluserinfo);
			$rowuserinfo = mysqli_fetch_assoc($resultuserinfo);
			mysqli_data_seek ($resultuserinfo, 0);
			$nuserinfo = count($rowuserinfo);
			if($nuserinfo>0)
			{
				while($rowuserinfo = mysqli_fetch_assoc($resultuserinfo))
				{
					$uida=$rowuserinfo["id"];
				}	
			}?>
			<p id="completed1">
			<p id="all1">
			<p id="res1">
			<?php
			$sqltaskdata = "select * from tasktable where userid='".$uida."' && taskstatus='0' ORDER BY `id` DESC";
			$resulttaskdata=mysqli_query($conn,$sqltaskdata);
			$rowtaskdata = mysqli_fetch_assoc($resulttaskdata);
			mysqli_data_seek ($resulttaskdata, 0);
			$ntaskdata = count($rowtaskdata);
			if($ntaskdata>0)
			{?>
				<table id="example1" border="1" class="display" style="width:600px;">
				<thead>
					<tr>
						<th>Mark as Completed</th>
						<th>Task</th>
						<th>Scheduled Date</th>
						<th>Update</th>
						<th>Delete</th>
						
					 </tr>
				</thead>
				<tbody>
				<?php
				while($rowtaskdata = mysqli_fetch_assoc($resulttaskdata))
				{?>
						<tr>
						<td><input id="<?php echo $rowtaskdata["id"];?>" onclick="changestatus(this)"  value="<?php echo $rowtaskdata["id"];?>" type="checkbox"></input></td>
						<td><?php echo $rowtaskdata["taskname"];?></td>
						<td><?php echo $rowtaskdata["scheduledtime"];?></td>
						<td><button type="button" name="update" id="update" onclick="updatetask(this)" value="<?php echo $rowtaskdata["id"];?>">Update</button></td>
						<td><button type="button" name="delete" id="delete" onclick="deletetask(this)" value="<?php echo $rowtaskdata["id"];?>">Delete</button></td>
						</tr><?php
				}	
			}

			?>
			</tbody>
			</table>
			</p>
			</center>
			<!------------------------Login DataTable Completion-------------------------------->
			<input type="hidden" name="uida" id="uida" value="<?php echo $uida;?>"></input>
			</form>
			<?php
	}
	else
	{
			?>
			<center><table><tr><font face="verdana"> <h3 style="color:#f93838;">Your's</h3></font></p></tr></table></center>
			<form action="show.php" target="_blank" method="POST">
			<center><table>
			<tr>
				<td><button type="button" class="btn-lg btn-primary" onclick="todolist()" name="todolist" id="todolist">TodoList</button></td>
				<td><button type="submit" class="btn-lg btn-success" value="1" name="show" id="completed">Completed</button></td>
				<td><button type="submit" class="btn-lg btn-info"    value="2" name="show" id="all">All Tasks</button></td>
			</tr>	
			</table></center>

			<center>
			<table>
			<tr>
			<td>Name of the Task:</td><td><input type="text" class="form-control" name="newtaskname" id="newtaskname"></input></td>
			<td>Schedule Date:</td><td><input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/></input></td>
			<td><button type="button" class="btn btn-success" onclick="na()" name="addtask" id="addtask">Add</button></td>
			</tr>
			</table>
			</center>
			<?php
				$sql="INSERT INTO `user`(`username`, `email`, `password`) VALUES ('".$_POST["signupusername"]."', '".$_POST["signupuseremail"]."', '".$_POST["signupuserpassword"]."')";
				$result=mysqli_query($conn,$sql);
				$sqluserinfo = "select * from user where email='".$_POST["signupuseremail"]."'";
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
			<center><p id="res1" ></p></center>
			<input type="hidden" name="uida" id="uida" value="<?php echo $uid;?>"></input>
			</form><?php
		
	}	
	


}
else
{?>
	<center><font face="verdana"> <h1 style="color:yellow;"> You did'nt Logged In </h1></font></center><?php
	include "index.php";
}
?>
<script>
function na()
{

	var u = document.getElementById("uida").value;

	if (window.XMLHttpRequest)
	{
		// code for modern browsers
		xmlhttp = new XMLHttpRequest();
	} 
	else
	{
		// code for old IE browsers
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() 
	{
		if (this.readyState==4 && this.status==200) 
		{

			var result = this.responseText.split(",");
			document.getElementById("res1").innerHTML = this.responseText;
			document.getElementById("newtaskname").value='';
			document.getElementById("date").value='';			
		}
	}
	xmlhttp.open("GET","dataaddition.php?name="+document.getElementById("newtaskname").value+"&d="+document.getElementById("date").value+"&u="+u,true);
    xmlhttp.send();
}
function a()
{

	var u = document.getElementById("uida").value;

	if (window.XMLHttpRequest)
	{
		// code for modern browsers
		xmlhttp = new XMLHttpRequest();
	} 
	else
	{
		// code for old IE browsers
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() 
	{
		if (this.readyState==4 && this.status==200) 
		{	

			var result = this.responseText.split(",");
			document.getElementById("res1").style.display="block";
			document.getElementById("res1").innerHTML = this.responseText;
			document.getElementById("taskname").value='';
			document.getElementById("date").value='';

		}
	}
	xmlhttp.open("GET","dataaddition.php?name="+document.getElementById("taskname").value+"&d="+document.getElementById("date").value+"&u="+u,true);
    xmlhttp.send();

}
function changestatus(a)
{
	var u = document.getElementById("uida").value;
	if (window.XMLHttpRequest)
	{
		// code for modern browsers
		xmlhttp = new XMLHttpRequest();
	} 
	else
	{
		// code for old IE browsers
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() 
	{
		if (this.readyState==4 && this.status==200) 
		{
			
			document.getElementById("res1").innerHTML = this.responseText;
			document.getElementById("res1").style.display="block";	
		}
	}
	xmlhttp.open("GET","changestatus.php?taskid="+a.value+"&u="+u,true);
    xmlhttp.send();
	
}
function deletetask(a)
{

	var u = document.getElementById("uida").value;
	if (window.XMLHttpRequest)
	{
		// code for modern browsers
		xmlhttp = new XMLHttpRequest();
	} 
	else
	{
		// code for old IE browsers
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() 
	{
		if (this.readyState==4 && this.status==200) 
		{

			document.getElementById("res1").innerHTML = this.responseText;
			document.getElementById("res1").style.display="block";	
		}
	}
	xmlhttp.open("GET","deletetask.php?taskid="+a.value+"&u="+u,true);
    xmlhttp.send();
	
}
function todolist()
{
	document.getElementById("res1").style.display="block";
}
function updatetask(a)
{

	var u = document.getElementById("uida").value;

	if (window.XMLHttpRequest)
	{
		// code for modern browsers
		xmlhttp = new XMLHttpRequest();
	} 
	else
	{
		// code for old IE browsers
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() 
	{
		if (this.readyState==4 && this.status==200) 
		{
			document.getElementById("res1").innerHTML = this.responseText;
			document.getElementById("res1").style.display="block";	
		}
	}
	xmlhttp.open("GET","updatetask.php?taskid="+a.value+"&u="+u,true);
    xmlhttp.send();
	
}
function savetask(a)
{
	var u = document.getElementById("uida").value;
	if (window.XMLHttpRequest)
	{
		// code for modern browsers
		xmlhttp = new XMLHttpRequest();
	} 
	else
	{
		// code for old IE browsers
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() 
	{
		if (this.readyState==4 && this.status==200) 
		{
			
			document.getElementById("res1").innerHTML = this.responseText;
			document.getElementById("res1").style.display="block";	
		}
	}
	xmlhttp.open("GET","savetask.php?taskid="+a.value+"&n="+document.getElementById("uname").value+"&d="+document.getElementById("udate").value+"&u="+u,true);
    xmlhttp.send();
	
}
</script>
</body>
</html>