<?php
// Variables

$User = "root";
$Password = "";
$Database = "fkdatesheet";
$Host = "localhost";
$sqlDate = date('Y-m-d H:i:s'); 

		// Connect to the server
	$con = 	mysqli_connect($Host, $User, $Password,$Database) or die (mysqli_error()); 
		//Check connectivity
		
		// Delete data into DB
		
		$del_rec = $_GET['del'];
		
		$query = "DELETE FROM mcom WHERE id='$del_rec'";
		
		if(mysqli_query($con,$query)){
			echo "<script>window.open('mcomdsview.php?deleted=Record Deleted ','_self')</script>";
		}
		
		
		
		
		
?>
		