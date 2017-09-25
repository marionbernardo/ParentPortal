<?php
session_start();


if(!$_SESSION['adminun']){
header("location: adminlogin.php");

}
?>
<html>
	<head>
		<!--title php dynamic-->
			<title>
				View Users
			</title>
		<link rel="icon" type="image" href="logo.jpg">
		<link rel="stylesheet" type="text/css" href="admincss/admin.css">	
		<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0" />
	</head>




	<body>
		<div id="header">
			<div class="logo"><a href="adminchangepass.php">Welcome : <span id="admin"><u><?php echo $_SESSION['adminun']; ?></u></span></a>
				<span id="logout"><font color="white"><a href="logout.php"><input type="button" id="blo" value="Logout"></a></font></span>
			</div>
		</div>

		<a class="mobile" href="#">MENU</a>
		
		<div id="container">
			<div class="sidebar">
				<ul id="nav">
					<li><a href="adminpanel.php" >Manage Body Content</a></li>
					<li><a href="admin_inbox.php" >Inbox </a></li>
					<li><a href="admissionrequest.php">Manage Admission Request </a></li>
					<li><a href="manage_students.php">Manage Students</a></li>
					<li><a href="manage_student_balance.php" >Manage Students Balance</a></li>
					<li><a href="manage_tuition.php">Manage Tuition Fee</a></li>
					<li><a href="viewusers.php" class="selected">View Users</a></li>
					<li><a href="adminboard.php">Manage Boardtrustees</a></li>
					<li><a href="adminannounce.php">Manage Announcements</a></li>
					<li><a href="adminevents.php">Manage Events</a></li>
					<li><a href="adminnews.php">Manage News</a></li>
					<li><a href="adminfacility.php">Manage Facilities</a></li>
				</ul>

			</div>
			<div class="content">
				<h1>Manage Users</h1>
				

				<div id="box">
					<div class="box-top">
						View Users
					</div>
						
					<div class="box-panel">
						<p align="center"><h2>Users</h2></p><br>
		<div id="over">
	<table border=0  width="100%" align="center">
	
		<tr>
		
			<th>Name</th>
			<th>Username</th>
			<th>Delete</th>
			
		</tr>
		
			<?php
			include("connection.php");
	
	
	
		$query = "select * from tb_users";
		
		$run = mysql_query($query);
		
	while ($row=mysql_fetch_assoc($run)){
		
		
		
		?>
		<tr align='center'>
		
		<td id="tb1"><?php echo $row['name']; ?></td>
		<td id="tb1"><?php echo $row['username']; ?></td>
		
	
		
		<td id="tb1"><a href='delete_user.php?uid=<?php echo $row['uid'];?>' onclick="return confirm('Are you sure you want to delete?')"><input type="button" id="del" value="Delete"></a></td>
		</tr>
		
			<?php } ?>
			
	</table>
				</div>
			</div>
		</div>
	</body>
</html>