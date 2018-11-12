<html>
<head>
<title>ToDoList</title>
<meta charset="UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
</head>
<body>
<h1> Welcome to ToDoList</h1>
<div id="logindecide" >
<form action="userlogin.php" method="post">
<fieldset>
Username:-<input type="text" required="required" name="loginusername" id="username"></input></br>
Password:-<input type="password" required="required" name="loginpassword" id="password"></input></br>
<button type="submit" class="btn btn-info btn-lg" name="submit" value="1">Submit</input>
</fieldset>
</form>

Doesnt have Account !Signup Now !!!!!!!!!
<button onclick="changelogincontent()" class="btn btn-info btn-lg" type="button" name="signupb">CreateUser</button>
</div>
<div id="signupdecide" style="display:none;">
<h3>Signup</h3>
<form action="userlogin.php" method="post">
<fieldset>
Username:-<input type="text" required="required" name="signupusername" id="username"></input></br>
Email:-<input type="email" required="required" name="signupuseremail" id="useremail"></input></br>
Password:-<input type="password" required="required" name="signuppassword" id="password"></input></br>
<button type="submit" name="submit" class="btn btn-info btn-lg" value="2">Submit</input>
</fieldset>
</form>

Already having account ! Login Here !!!!!!!!!
<button onclick="changesignupcontent()" class="btn btn-info btn-lg" type="button" name="loginb">Login Here</button>
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
</script>
</body>
</html>