<style>
table{ border:2px solid blue;}
table tr{ background:green;color:white;}
table tr td{ padding:0 44px ;border-radius:22px;}
</style>

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
else echo "success";

$sql = "SELECT id, input FROM demo";
$result = $con->query($sql);
echo "<table border=border>";
if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr> <td> id: </td><td>". $row["id"]. "</td><td> - Name:</td><td>". $row["input"]  . "</td></tr>";
     }
} else {
     echo "0 results";
}
echo "</table>";
$con->close();

?>