<?php
session_start();
if(!$_SESSION['adminun']){
header("location: adminlogin.php");
}
?>
<html>
	<head>
		<title>
		Manage Students
		</title>
		<link rel="icon" type="image" href="logo.png">
		<link rel="stylesheet" type="text/css" href="admincss/admin.css">	
	
<style>			
div#header {
	width: 100%;
	height: 100px;
	background-color: #2c3e50;
	margin: 0 auto;
}
#adds {
	margin-top: 8px;
	height: 5em;
	width: 8em;
	background-color:#2980b9 ;
	border-radius: 3px;
	color: #fff;
	border: 1px solid #ecf0f1;
	border-radius: 5px;
	font-weight: bold;
}
#adds:hover {
	opacity: 0.9;
	cursor: pointer;
}
#updates {
	margin-top: 8px;
	height: 5em;
	width: 8em;
	background-color: #27ae60;
	border-radius: 3px;
	color: #fff;
	border: 1px solid #ecf0f1;
	border-radius: 5px;
	font-weight: bold;
}
#updates:hover {
	opacity: 0.9;
	cursor: pointer;
}
#renew {
	margin-top: 8px;
	eight: 5em;
	width: 16.3em;
	background-color: #e67e22;
	border-radius: 3px;
	color: #fff;
	border: 1px solid #ecf0f1;
	border-radius: 5px;
	font-weight: bold;
}
#renew:hover {
	opacity: 0.9;
	cursor: pointer;
}
#views {
	margin-top: 8px;
	height: 5em;
	width: 16.3em;
	background-color: #2c3e50;
	border-radius: 3px;
	lor: #fff;
	border: 1px solid #ecf0f1;
	border-radius: 5px;
	font-weight: bold;
}
#views:hover {
	opacity: 0.9;
	cursor: pointer;
}
	</style>
	</head>
	<body>
		<div id="header">
			<div class="logo"><a href="adminchangepass.php">Welcome : <span id="admin"><u><?php echo $_SESSION['adminun']; ?></u></span></a>
				<span id="logout"><font color="white"><a href="logout.php"><input type="button" id="blo" value="Logout"></a></font></span>
			</div>
		</div>
		<div id="container">
			<div class="sidebar">
				<ul id="nav">
					<li><a href="adminpanel.php" >Home</a></li>
					<li><a href="manage_admins.php" >Manage Admins</a></li>
					<li><a href="manage_students.php" class="selected">Manage Students</a></li>
					<li><a href="manage_student_balance.php" >Manage Students Balance</a></li>
					<li><a href="manage_tuition.php">Manage Tuition Fee</a></li>
					<li><a href="adminboard.php">Manage Boardtrustees</a></li>
					<li><a href="adminannounce.php">Manage Announcements</a></li>
					<li><a href="adminevents.php">Manage Events</a></li>
					<li><a href="adminfacility.php">Manage Facilities</a></li>
					<li><a href="manage_files.php" >Manage Website File</a></li>
				</ul>

			</div>
			<div class="content">
				<h1>Manage Students</h1>
				

				<div id="box">
					<div class="box-top">
					
					<br><br>
					</div>

					<div class="box-panel">
						<div id="cont">
							<br><br>
							<a href="add_students.php"><input type="button" value="ADD" id="adds"></a>
							<a href="update_students.php"><input type="button" value="UPDATE" id="updates"></a><br>
							<a href="mstudents.php"><input type="button" value="VIEW RECORDS" id="views"></a>
						</div>
				<br><br><br>
				</div>
				<br><br><br><br><br><br><br><br><br><br><br><br><br>
						<br><br><br><br><br><br><br><br><br><br>
			</div>
		</div>
	</body>
</html>