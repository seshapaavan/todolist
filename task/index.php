<html>
<head>
<title>ToDoList</title>
</head>
<body>
<h1> Welcome to ToDoList</h1>
<div id="logindecide" >
<form action="userlogin.php" method="post">
<fieldset>
Username:-<input type="text" required="required" name="loginusername" id="username"></input></br>
Password:-<input type="password" required="required" name="loginpassword" id="password"></input></br>
<button type="submit" name="submit" value="1">Submit</input>
</fieldset>
</form>

Doesnt have Account !Signup Now !!!!!!!!!
<button onclick="changelogincontent()" type="button" name="signupb">CreateUser</button>
</div>
<div id="signupdecide" style="display:none;">
<h3>Signup</h3>
<form action="userlogin.php" method="post">
<fieldset>
Username:-<input type="text" required="required" name="signupusername" id="username"></input></br>
Email:-<input type="email" required="required" name="signupuseremail" id="useremail"></input></br>
Password:-<input type="password" required="required" name="signuppassword" id="password"></input></br>
<button type="submit" name="submit" value="2">Submit</input>
</fieldset>
</form>

Already having account ! Login Here !!!!!!!!!
<button onclick="changesignupcontent()" type="button" name="loginb">Login Here</button>
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