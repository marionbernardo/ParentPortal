<?php
session_start();


if(!$_SESSION['adminun']){
header("location: adminlogin.php");

}
?>

<html>
	<head>
		<title>
			Password Changed
		</title>
		<link rel="stylesheet" type="text/css" href="admincss/changepass.css">
	</head>

	<body>
		<div class="container">
			
			<div class="form">
				<h2>Password Changed</h2><BR>
					<hr noshade size="4" color="#bdc3c7"></hr>
				<div class="row">
					
					
					<br>Hello <b><?php echo $_SESSION['adminun'];?></b> your password has been changed successfully... <br><br>
					Do you want to logout to test your new password?
					<BR><BR>
					<div id="confirm">
					<a href="logout.php"><input type="submit" value="YES"></a>
					<a href="adminchangepass.php"><input type="button" value="NO"></a>
					</div>
	
				</div>

			</div>

		</div>	

	</body>
</html>

