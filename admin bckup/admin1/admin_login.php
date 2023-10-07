<?php

session_start();

?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title>Login SFK Collage</title>
<link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />

<link rel="stylesheet" href="../css/style.css" type="text/css">	

<style>

.headtext{ width:auto;}
 
.con{  
	border: 2px solid black;
	border-top:none;}
form {	
	color: #099;
	text-align: center;
}

input[type=text], input[type=password] {
	width: 22%;
	padding: 12px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #ccc;
	box-sizing: border-box;
	text-align: center;
}

#button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 158px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 27%;
}
#button:hover{ background:green;}




.imgcontainer {
    text-align: center;
	padding:6px;
    margin: 0 0 12px  0;
}

img.avatar {
    width: 20%;
    border-radius: 40%;
}

.container {
    padding: 16px;
	
}



span.psw {
        padding-top: 16px;
		left: 222px;
		}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    
}


</style>

</head>
<body>
<!---------------------------header and fix sidebar-------------------------->

	<div class="header">
		<div class="coverhead">
			<a href="index.html" id="logo"><img src="../images/logo.png" alt="logo" height="58" width="381"></a>
			<div class="coverul">
				<div id="topbar"> 
  				   <ul>
  				 	<li><a href="#">FK<sup><i class="fa fa-trademark fa-fw "></i></sup></a></li>
				 	<li><a href="#"><i class="fa fa-address-book-o fa-fw" aria-hidden="true"></i>Contact Us</a></li>	
					<li><a href="#"><i class="fa fa-user-circle fa-fw" aria-hidden="true"></i>Student Login</a></li>
       					<li><a href="login.html"><i class="fa fa-user-circle-o fa-fw" aria-hidden="true"></i>Admin Login</a></li>
     				   </ul> 
  			
				</div>


				
				<ul class="selful">
					<li   class="selected">	<a href="index.html"><i class="fa fa-home fa-fw"></i>Home</a></li>
					<li><a href="#">Managment</a></li>
					
					<li><a href="addnew.html">Admission</a></li>
					<li><a href="#">Careers</a></li>
					<li><a href="#">Downloads</a></li>
				
				
					
				</ul>
			</div>
		</div>
	</div>



	
	<div class="sidebar">	


				<ul class="sideul">
					<li><a href=""><i class="fa fa-info-circle fa-fw"></i>Info Desk</a></li>
					<li><a href="">Department</a></li>
					<li><a href="#"><i class="fa fa-ellipsis-v fa-fw "></i>Head Office</a></li>
					<li><a href="#">Public Holiday</a></li>
					<li><a href="#">Results</a></li>
					<li><a href="#">I am fk</a></li>
				</ul>



	</div>

<!-----------------------------login page content----------------->
<div class="hell">
	<div class="headtext marginl sphover">
			Login Form
					</div>
<div class="marginl con">
<form action='admin_login.php' method='POST'>
  <div class="imgcontainer">
    <img src="../images/img_avatar2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username"  name="user_name" required>
<br>
    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="admin_pass" required>
<br>        
    <input id="button" type="submit" name="login" value="Login" />
  </div>
<center>
<div id="wrong" style="color:red;font-weight:bold"></div>
<?php if(isset($_GET['error'])){echo $_GET['error']; }?>  
</center>
</form>
</div>

</div>
<!-------------footer----------------->
		
<div class="footer">

	<div class="foot1">
		<img src="../images/worldmap.png" alt=""  >
         	 <a href="#">Find School With Google Maps &raquo;</a>
        

	</div>

	<div class="foot2">
		
		<p>Stay Update with us</p>
		<ul class="faico clear">
        	  <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
        	  <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
        	  <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
        	  <li><a class="faicon-flickr" href="#"><i class="fa fa-flickr"></i></a></li>
        	  <li><a class="faicon-rss" href="#"><i class="fa fa-rss"></i></a></li>
        	</ul>


	</div>
	<div class="foot3">
		
			<a class="f31" href="#">Administr</a>
			<a class="f32" href="#">Help Desk</a>
			<a class="f33" href="#">Feedback</a>
			<a class="f34" href="#">Complaints</a>
			
	
	</div>
	<div class="foot4">
		<div class="f41">
			<a href="index.html"><i class="fa fa-home fa-lg "></i></a>
			<a href="index.html"><i class="fa fa-info-circle fa-lg "></i></a>
			<a href="index.html"><i class="fa fa-address-book-o fa-lg "></i></a>
			<a href="index.html"><i class="fa fa-sign-out fa-lg "></i></a>
		</div>
		<div class="f42">
			<br>
			<i class="fa fa-envelope fa-fw"></i>realx4rd@gmail.com<br><br>
			<i class="fa fa-phone fa-fw"></i>0346-6882215
			
		</div>
	</div>

	
</div>
<?php

$con = mysqli_connect("localhost","root","",'fk','myweb');
		
if(isset($_POST['login']))
{
	$username = $_SESSION['user_name'] = $_POST['user_name'];
	$password = $_POST['admin_pass'];

$query = "select * from login where user_name='$username' AND user_password='$password'";
$run = mysqli_query($con,$query);

if(mysqli_num_rows($run)>0)
{
	echo "<script>window.open('adminpanel.php?logged=logged in successfully','_self')</script>";	
}
else{
echo "<script>document.getElementById('wrong').innerHTML='Incorrect user name or password Retry...!';</script>";
}
	
}



?>

</body>
</html>















