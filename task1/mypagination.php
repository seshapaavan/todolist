<?Php
//****************************************************************************
////////////////////////Downloaded from  www.plus2net.com   //////////////////////////////////////////
///////////////////////  Visit www.plus2net.com for more such script and codes.
////////                    Read the readme file before using             /////////////////////
//////////////////////// You can distribute this code with the link to www.plus2net.com ///
/////////////////////////  Please don't  remove the link to www.plus2net.com ///
//////////////////////////
//*****************************************************************************
?>
<!doctype html public "-//w3c//dtd html 3.2//en">

<html>

<head>
<title>Plus2net.com paging script in PHP</title>
</head>

<body>
<?Php
include "config.php";           // All database details will be included here 
$page_name="showdata.php"; //  If you use this code with a different page ( or file ) name then change this 

////// starting of drop down to select number of records per page /////
if(isset($_GET["company"]))
{
	$query="select * from filter where product_company='".$_GET["company"]."'";

}
else
{
$query=" SELECT * FROM filter    ";
}

$result=mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
		mysqli_data_seek ($result, 0);
		$n=0;
		while($row = mysqli_fetch_assoc($result))
		{
			$n=$n+1;
		}
		echo $n;
echo "</br>";
@$limit=2; // Read the limit value from query string. 
if(strlen($limit) > 0 and !is_numeric($limit)){
echo "Data Error";
exit;
}

// If there is a selection or value of limit then the list box should show that value , so we have to lock that options //
// Based on the value of limit we will assign selected value to the respective option//
switch($limit)
{
case 2:
$select2="selected";
$select10="";
$select5="";
break;

case 5:
$select5="selected";
$select10="";
$select2="";
break;

default:
$select10="selected";
$select5="";
$select2="";
break;

}

@$start=$_GET['start'];
if(strlen($start) > 0 and !is_numeric($start)){
echo "Data Error";
exit;
}



// You can keep the below line inside the above form, if you want when user selection of number of 
// records per page changes, it should not return to first page. 
// <input type=hidden name=start value=$start>
////////////////////////////////////////////////////////////////////////
//
///// End of drop down to select number of records per page ///////


$eu = ($start - 0); 

if(!$limit > 0 ){ // if limit value is not available then let us use a default value
$limit = 10;    // No of records to be shown per page by default.
}                             
$this1 = $eu + 1; 
$back = $eu -1; 
$next = $eu +1; 


/////////////// Total number of records in our table. We will use this to break the pages///////
//$nume = $dbo->query("select count(Id) from filter")->fetchColumn();
/////// The variable nume above will store the total number of records in the table////

/////////// Now let us print the table headers ////////////////
$bgcolor="#f1f1f1";
echo "<TABLE width=50% align=center  cellpadding=0 cellspacing=0> <tr>";

$b=$start*$limit;

////////////// Now let us start executing the query with variables $eu and $limit  set at the top of the page///////////
if(isset($_GET["company"]))
{
	$query="select * from filter where product_company='".$_GET["company"]."' limit $b, $limit";
}
else
{
$query=" SELECT * FROM filter limit $b, $limit  ";
}




//////////////// Now we will display the returned records in side the rows of the table/////////

foreach ($dbo->query($query) as $row) {

if($bgcolor=='#f1f1f1'){$bgcolor='#ffffff';}
else{$bgcolor='#f1f1f1';}


echo "<th align=left bgcolor=$bgcolor id='title'>&nbsp;<font face='Verdana' size='2'>$row[product_company]</font></br><font face='Verdana' size='2'>$row[product_price]</font></br><font face='Verdana' size='2'>$row[product_location]</font></th>"; 


}
echo "</tr>";
echo "</table>";
////////////////////////////// End of displaying the table with records ////////////////////////

/////////////// Start the buttom links with Prev and next link with page numbers /////////////////
echo "<table align = 'center' width='50%'><tr><td  align='left' width='30%'>";
//// if our variable $back is equal to 0 or more then only we will display the link to move back ////////
if($back >=0)
{ 
	if(isset($_GET["company"]))
	{
		$bprev=$page_name."?start=$back&limit=$limit&company=".$_GET["company"];
		print "<a href='$bprev'><font face='Verdana' size='2'>PREV</font></a>"; 
	}
	else
	{
		print "<a href='$page_name?start=$back&limit=$limit'><font face='Verdana' size='2'>PREV</font></a>"; 
	}	
} 
//////////////// Let us display the page links at  center. We will not display the current page as a link ///////////
echo "</td><td align=center width='30%'>";
$i=0;
$l=1;
for($i=0;$i < $n/$limit;$i=$i+1){
if($i <> $eu){
	if(isset($_GET["company"]))
	{
		$bt=$page_name."?start=$i&limit=$limit&company=".$_GET["company"];
		echo " <a href='$bt'><font face='Verdana' size='2'>$l</font></a> ";
	}
	else
	{	
		echo " <a href='$page_name?start=$i&limit=$limit'><font face='Verdana' size='2'>$l</font></a> ";
	}
}
else { echo "<font face='Verdana' size='4' color=red>$l</font>";}        /// Current page is not displayed as link and given font color red
$l=$l+1;
}


echo "</td><td  align='right' width='30%'>";
///////////// If we are not in the last page then Next link will be displayed. Here we check that /////
if($this1 < $n/$limit) 
{
	if(isset($_GET["company"]))
	{
		$bnext=$page_name."?start=$next&limit=$limit&company=".$_GET["company"];
		print "<a href='$bnext'><font face='Verdana' size='2'>NEXT</font></a>";
	}
	else
	{	
		print "<a href='$page_name?start=$next&limit=$limit'><font face='Verdana' size='2'>NEXT</font></a>";
	}
} 
echo "</td></tr></table>";


?>
 <br><br>

</body>

</html>
