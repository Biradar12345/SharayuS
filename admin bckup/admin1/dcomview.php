<?php

session_start();
if(!$_SESSION['user_name']){
	header('location:admin_login.php?error=login first then come');
}

?>

<style>
a{ color:black;text-decoration:none;}
table{ border:2px solid blue;}
table tr{ background:green;color:white;}
table tr td{ padding:0 44px ;border-radius:22px;}
</style>
welcome: <?php echo $_SESSION['user_name'];?><hr>
<a href="dcomform.php">Insert a new rocord</a><br><a href="logout.php">Logout</a><br>
<?php

$dbname = "fk";
$username = "root";
$password = "";
$servername = "localhost";
// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
     die("Connection failed: " . $con->connect_error);
} 
else echo "success<br>";

$sql = "SELECT * FROM dcom";
$result = $con->query($sql);
echo "<table border=border>";
 echo "<tr> <th> id </th><th> Name</th> <th> father  </th><th> school</th><th>Course</th></tr>";
if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {	$del=$row["sid"]; $edit=$row["sid"];$det=$row["sid"];
         echo "<tr> <td>". $row["sid"]. "</td><td>". $row["roll_no"]  . "</td><td>". $row["student_name"]  . "</td>
				<td>". $row["father_name"]  . "</td><td>". $row["class"]  . "</td>
				<td><a href='delete.php?del=$del'> Delete</a></td>
				<td><a href='edit.php?edit=$edit'>Edit</a></td>
				<td><a href='dcomview.php?detail=$det'>Detail</a></td></tr>";
     }
	
} else {
     echo "0 results";
}
echo "</table>";

$con->close();

?>
<center >
<?php
echo @$_GET['deleted'];
echo @$_GET['updated'];
if(isset($_GET['logged'])){
echo "logged in as:";
echo @$_GET['logged'];}
?></center>



<?php
if(isset($_GET['detail'])){
$did = $_GET['detail'] ;


$con = mysqli_connect("localhost","root","",'fk');

$dquery = "SELECT * FROM dcom where sid='$did'";
$drun = mysqli_query($con,$dquery);

while($row1=mysqli_fetch_array($drun))
{
	$sname = $row1['student_name'];
	$fname = $row1['roll_no'];
	$school = $row1['father_name'];
	$roll = $row1['class'];
	$coursename = $row1['cnic'];
	}

echo " <table border=border>
		<tr> <th> name </th><th>father</th><th>school</th><th>roll no</th><th>coursename</th></tr>
		<tr> <td> $sname </td><td>$fname</td><td>$school</td><td>$roll</td><td>$coursename</td></tr>
		
		</table>";

	
	
}
?>
<form action="dcomview.php" method="GET">

<p>Search a record:<input type="text" name="search" /><button type="submit" name="submit" value="Search" >Search</button></p>
</form>

<?php

if(isset($_GET['search'])){
	
	$con = mysqli_connect("localhost","root","",'fk');
		
		$search_rec = $_GET['search'];
		$search_query = "select * from dcom where student_name='$search_rec' OR roll_no='$search_rec' ";
		
		
		
		
		$run2 = mysqli_query($con,$search_query);
		echo " <table>";
		while ($row2=mysqli_fetch_assoc($run2))
		{
			
		
			
			$ids = $row2['sid'];
			$names = $row2['student_name'];
			$fathers = $row2['father_name'];
			$schools = $row2['roll_no'];
			$rolls = $row2['class'];
			$courses = $row2['cnic'];
		
		
		echo "<tr> <td> $ids </td> <td> $names</td> <td> $fathers </td> <td> $schools</td> <td> $rolls </td> <td> $courses</td></tr>";
		}
		echo "</table> ";	
		}
?>