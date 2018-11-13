<html>
<?php
session_start();
session_destroy();
?>
<!---************Head Portion****************-->
<head>
<title>ToDoList</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
<style>
td
{
  padding-top: 10px;
  padding-bottom: 10px;
}
</style>
</head>
<!-----********* Head Portion Complete**********-->

<body>
<div class="container">
<div class="container-fluid">
<div class="pagewrapper">
<center><font face="verdana"> <h3>Welcome to </h3><h1 style="color:red;">ToDoList</h1></font></center>
<center>
<div id="logindecide">
<center><h3>Login</h3></center>
<form id="loginform" action="userlogin.php" method="post">
<fieldset>
<table>
<tr><td>Username:</td><td><input type="text" class="form-control" required="required" name="loginusername" id="loginusername"></input></td></tr>
<tr></tr>
<tr></tr>
<tr><td>Password:</td><td><input type="password" class="form-control" required="required" name="loginpassword" id="loginpassword"></input></td></tr>
<tr></tr>
<tr><p id="loginusernamep" style="display:none;color:darkred;">Invalid Username and Password<p></tr>
<tr><input type="hidden" name="s" id="s" value="1"></input></tr>
<tr><td></td><td><center><button class="btn btn-success" onclick="loginverify()" type="button" >Submit</input></center></td></tr>
</table>
</fieldset>
</form>

<font face="verdana" "> <h4>Doesnt have Account !Signup Now !!!!!!!!!
<button class="btn btn-link" onclick="changelogincontent()" type="button" name="signupb">CreateUser</button></h4></font>
</div>
</center>

<center>
<div id="signupdecide" style="display:none;">
<center><h3>Signup</h3></center>
<form id="signupform" action="userlogin.php" method="post">
<fieldset>
<table>
<tr><td>Username:</td><td><input type="text" class="form-control" required="required" name="signupusername" id="signupusername"></input></td></tr>
<tr></tr>
<tr><td>Email:</td><td><input type="email" class="form-control" required="required" name="signupuseremail" id="signupuseremail"></input></td></tr>
<tr></tr>
<tr><td>Password:</td><td><input type="password" class="form-control" required="required" name="signupuserpassword" id="signupuserpassword"></input></td></tr>
<tr></tr>
<tr><p id="signupusernamep" style="display:none;color:darkred;">.<p></tr>
<tr><input type="hidden" name="s" id="s" value="2"></input></tr>
<tr><td></td><td><center><button class="btn btn-success" onclick="signupverify()" type="button" >Submit</input></center></td></tr>
</table>
</fieldset>
</form>

<font face="verdana" "> <h4>Already having account ! Login Here !!!!!!!!!
<button class="btn btn-link" onclick="changesignupcontent()" type="button" name="loginb">Login Here</button></h4></font>
</div>
</center>


</div>
</div>
</div>

<script>
function changelogincontent()
{

	document.getElementById("logindecide").style.display="none";
	document.getElementById("signupdecide").style.display="block";
}
function changesignupcontent()
{
	document.getElementById("logindecide").style.display="block";
	document.getElementById("signupdecide").style.display="none";
}
function loginverify()
{
	u=document.getElementById("loginusername").value;
	p=document.getElementById("loginpassword").value;
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
            var r=this.responseText;			
			if(r==1)
			{
			
				document.getElementById("loginform").submit();
			}
			else
			{
		        document.getElementById("loginusernamep").style.display="block";
			
			}
			

		}
	}
	xmlhttp.open("GET","loginverify.php?u="+u+"&p="+p,true);
    xmlhttp.send();
	
}
function signupverify()
{

	u=document.getElementById("signupusername").value;

	e=document.getElementById("signupuseremail").value;

	p=document.getElementById("signupuserpassword").value;

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

            var r=this.responseText;			
			if(r==1)
			{
			
				document.getElementById("signupform").submit();
			}
			if(r==2)
			{
		        document.getElementById("signupusernamep").style.display="block";
				document.getElementById("signupusernamep").innerHTML="Username already exists";
			}
			if(r==3)
			{
				document.getElementById("signupusernamep").style.display="block";
				document.getElementById("signupusernamep").innerHTML="Username and Email already exists";
			}
			if(r==4)
			{
				document.getElementById("signupusernamep").style.display="block";
				document.getElementById("signupusernamep").innerHTML="Email already exists";
			}				
			

		}
	}
	xmlhttp.open("GET","signupverify.php?u="+u+"&e="+e,true);
    xmlhttp.send();
	
}
</script>

</body>
</html>