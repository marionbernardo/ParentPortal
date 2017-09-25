<?php
session_start();
if (isset($_SESSION['adminun'])) {
header('Location: adminpanel.php');
}
?>

<html>
	<head>
		<title>
		Admin Login | LCJCA	
		</title>
			<link rel="icon" type="image" href="logo.png">
		<link rel="stylesheet" type="text/css" href="adminlog.css">
<link rel="stylesheet" href="popup.css">
		<script type="text/javascript">
function focus() {
	var text=document.getElementById('admin');

	text.focus();
	}
</script>
	</head>


<body onload="focus();">
		<div id="framecontent">
		<div class="innertube">
						<ul id="navmenu">

							<li><a href="index.php" >Home</a></li>
							<li><a href="administrators.php">Administrators</a></li>
							<li><a href="enrollmentinquiry.php" >Enrollment Inquiry</a></li>
							<li><a href="facility.php">Facilities</a></li>
							<li><a href="aboutus.php">About Us</a></li>
						</ul>
	</div>


	</div>
	</div>
	<div id="maincontent">

			<div id="line">
				<img src="finalLogo.png" alt="" width="100%" height="100%">
		
			</div>
<br><br><br><br><br>

	<div class="container">
		<div class="row">

		<div class="login-form">
		<h2>Admin Login</h2>
		<hr noshade size="4" color="#bdc3c7"></hr>
		<div class="login-text">
				<form action= "adminlogin.php" method="POST" autocomplete="off">

							<label>Username  </label><br><input type="text" name="adminun" id="admin" required/><br><br>
							<label>Password  </label><br><input type="password" name="adminpw" id="adminpw" required/><br>
							<td></td><td id="ch"><input type="checkbox" onchange="document.getElementById('adminpw').type = this.checked ? 'text' : 'password'">
							Show password<br></td>
							</tr>
							<br><br>
							<div class='buttons'>
							
							<input type="submit" name="login" value="Login">


					</form>
		
		</div>
		</div>
		
		</div>	
	</div>
</div>
	</div>
</div>

</div>
</body>


</html>

<?php 

include("connection.php");



if(isset($_POST['login'])){

 $admin_name = $_POST['adminun'];
 $admin_pass = $_POST['adminpw'];
 
 
 $query = "select * from tb_admin where admin_uname='$admin_name' AND admin_password='$admin_pass'";
 
 $run = mysql_query($query);
 
 if(mysql_num_rows($run)>0){
 
 
 	$_SESSION['adminun']=$admin_name;
 echo "<script>window.open('adminpanel.php','_self')</script>";
 
 }
 
 else {
 
 echo "<script>alert('admin details are incorrect')</script>";
 }
 
 }
 
?>

