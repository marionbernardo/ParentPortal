<?php
session_start();
if(!$_SESSION['adminun']){
header("location: adminlogin.php");
}
?>

<html>
	<head>
		<title>
			Account Settings
		</title>
		<link rel="icon" type="image" href="logo.png">
		<link rel="stylesheet" type="text/css" href="admincss/changepass.css">
</head>

<body>
		<div class="container">
			<div class="form">
				<div id="boxtop1">
			
			</div>
				
				<div class="row">
					<h2 align="left">Account Settings</h2><br>
					<hr noshade size="4" color="#bdc3c7"></hr>
					<br><br>
					<?php	include("connection.php");
	
						$un = $_SESSION['adminun'];
		
					$query = "select * from tb_admin where admin_uname = '$un'";
					
					$run = mysql_query($query);
					
					while ($row=mysql_fetch_assoc($run)){
						echo 'Name: <b>';
						echo $row['admin_name'];
						echo '</b><br><br>Position: <b>';
						echo $row['admin_position'];
						echo '</b><br>';
					}
					?>
					
					<br>Your username: <b><?php echo $_SESSION['adminun'];?></b><br><br>

					<label id="up" for="our-popup">Change password</label><br><br><br><br>
					<a href="adminpanel.php" onclick="history.back();"><label id="up2">Back</label></a>
			<span id="1">
		<input type="checkbox" class= "smoosh" id="our-popup">

		<label for="our-popup" class="overlay"></label>

		<div class="overlay-dialogue">

			<div id="boxtop">
				Change password
				<label id="labelclose" for="our-popup">&nbsp;&nbsp;x&nbsp;&nbsp; </label>
			</div>
			
	<form action="adminchangepass.php" method="POST">
		<table border=0  id="table-form2" cellspacing="10">
				
						<tr>
						<td align="right"><label>Enter Your Old Password : </label></td>
						<td><input type="password" name="old" id="password" required></td>
						</tr>
						<tr>
						<td></td><td id="ch"><input type="checkbox" onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'">
							Show password<br></td>
						</tr>

						<tr>
						<td align="right"><label>Enter your new Password : </label></td>
						<td><input type="password" name="new" id="new" required></td>
						</tr>			
						<tr>
						<td></td><td id="ch"><input type="checkbox" onchange="document.getElementById('new').type = this.checked ? 'text' : 'password'">
							Show password<br></td>
						</tr>

						<tr>
						<td align="right"><label>Re-Enter your new Password : </label></td>
						<td><input type="password" name="renew" id="renew" required></td>
						</tr>
						<tr>
						<td></td><td id="ch"><input type="checkbox" onchange="document.getElementById('renew').type = this.checked ? 'text' : 'password'">
								Show password<br></td>
						</tr>

						<tr>
						<td></td><td align="right"><input type="submit" name="update" value="Submit"></td>
						</tr>
						</table>
		</form>

		


		</div>
	</span>
				</div>

			</div>

		</div>	

	</body>
</html>

<?php
	mysql_connect("localhost","root","");
	mysql_select_db("thesis");	
	

		$name = $_SESSION['adminun'];
		$query = "select * from tb_admin where admin_uname='$un'";
		$run = mysql_query($query);
	while ($row=mysql_fetch_assoc($run)){
			$pass = $row['admin_password'];
		}
		
		$password=$pass;
	
if(isset($_POST['update'])){
		$name = $_SESSION['adminun'];
	 $old = $_POST['old'];
	$new= $_POST['new'];
	  $renew = $_POST['renew'];
	

	
	if ($password!=$old)
	{
	
		echo "<script>alert('This is not your old password');</script>";
	exit();
	
	}
	else

		if ($new!=$renew)
	{
	
		echo "<script>
	alert('New Password was not match');
	</script>";
	exit();
	
	}
		$query = "UPDATE tb_admin SET admin_password='$new' WHERE admin_uname='$un'";

		
			if(mysql_query($query)) {
	
	echo "<script>alert('changed');</script>";
	
	}
	else
	
	echo "ERROR";
	}	
		
		
		
		
	
?>