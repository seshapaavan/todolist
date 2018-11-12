<html>
<head>
</head>
<body>
<table style="height:100%;">
<tr>
<th>
<div style="width:200px;background-color:blue;height:100%;">
<p style="color:white;"> Filters</p>
<p style="color:white;">
<select onChange="companyfilter()" name="company" id="company">
<?php
$options = array("all","apple","amazon","flipkart");
$selected = "done";
if(isset($_GET["company"]))
{	
	foreach($options as $option)
	{
		if($_GET["company"]==$option)
		{
			echo '<option value="'.$option.'" selected="selected">'.ucfirst($option).'</option>';
		}
		else
		{
			echo '<option value="'.$option.'">'.ucfirst($option).'</option>';
		}
	}
}
else
{
	foreach($options as $option)
	{
		if($selected==$option)
		{
			echo '<option value="'.$option.'" selected="selected">'.ucfirst($option).'</option>';
		}
		else
		{
			echo '<option value="'.$option.'">'.ucfirst($option).'</option>';
		}
	}	
}

	
?>
</select> 

</p>

</div>
</th>
<th>
<div style="margin-top:20px;margin-left:300px;width:800px;background-color:green;height:100%;">
<p style="color:white;"><?php  include "mypagination.php";?> </p>
</div>
</th>
</tr>
</table>
<script>
function companyfilter()
{
	var a=document.getElementById("company").value;
	if(a=='all')
	{
		var b="http://localhost/paavan/showdata.php/showdata.php";
		window.location=b;
	}
	else
	{
		var b="http://localhost/paavan/showdata.php/showdata.php?company="+a;
		window.location=b;
	}
}
</script>
</body>
</html>