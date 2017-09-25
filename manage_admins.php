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
				View Admins 
			</title>
		<link rel="icon" type="image" href="logo.png">
		<link rel="stylesheet" type="text/css" href="admincss/admin.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
div#header {
	width: 100%;
	height: 100px;
	background-color: #2c3e50;
	margin: 0 auto;
}
#pics {
	float:left;
	padding: 10px;
	display: inline-block;
	border: 1px solid gray;
	width: 100%;
	height: auto;
	margin-left: 0px;
	border-radius: 1px;
	background-color: white;
}
#studetails th{
	border: 1px solid black;
	background: #bdc3c7;
	font-size: 11pt;
}

#studetails td{
	padding-left: 20px;
	font-size: 10pt;
	border-bottom: 1px solid #95a5a6;
	text-align: center;
}
#tb1 {
	border: 1px solid #95a5a6;
	border-radius: 2px;
	text-align: center;
}
#del {
	margin-top: 8px;
	height: 2em;
	width: 5em;
	background-color: #c0392b;
	border-radius: 3px;
	color: #fff;
	border: 1px solid #ecf0f1;
	border-radius: 5px;
	font-weight: bold;
}
#del:hover{
	opacity: 0.9;
	cursor: pointer;
}
#view {
	margin-bottom: 10px;
	margin-top: 5px;
	height: 2em;
	width: 5em;
	background-color: #2c3e50;
	border-radius: 3px;
	color: #fff;
	border: 1px solid #ecf0f1;
	border-radius: 5px;
	font-weight: bold;
}

#view:hover {
	opacity: 0.9;
	cursor: pointer;
}
.sidebar {
	height: 150%;
}
input[type=submit] {
	margin-left: 0px;
	margin-top: 8px;
	height: 2em;
	width: 4em;
	background-color: #2980b9;
	border-radius: 3px;
	color: #fff;
	border: 1px solid gray;
}
input[type=text] {
	width: 15em;
	height:2em;
	font-size: 0.9em;
	border: 1px solid #bdc3c7;
	border-radius: 3px;
}
input[type=password] {
	width: 15em;
	height:2em;
	font-size: 0.9em;
	border: 1px solid #bdc3c7;
	border-radius: 3px;
}
.logo {
	float: right;
	margin-top: 10px;
	margin-right: 10px;
	color: white;
	font-size : 1.3em;
	font-weight: bold;
}
</style>

	<body>

		<div id="header">
			<div class="logo"><i class="fa fa-user-circle" style="font-size:24px"> Welcome : <span id="admin"><?php echo $_SESSION['adminun']; ?></span></i>
			
			</div>
		</div>
		<div id="container">
			<div class="sidebar">
				<ul id="nav">
					<li><a href="adminpanel.php"><i class="fa fa-dashboard" style="font-size:20px; color:white"></i>  Dashboard</a></li>
					<li><a href="manage_admins.php" class="selected"><i class="fa fa-user" style="font-size:20px; color:white"></i>  Admin Management</a></li>
					<li><a href="mstudents.php"><i class="fa fa-group" style="font-size:20px; color:white"></i>  Student Management</a></li>
					<li><a href="manage_student_balance.php"><i class="fa fa-google-wallet" style="font-size:20px; color:white"></i>   Lendger Management</a></li>
					<li><a href="grade_menu.php"><i class="fa fa-bar-chart" style="font-size:20px; color:white"></i>  Grade Management</a></li>
					<li><a href="cms.php"><i class="fa fa-qrcode" style="font-size:20px; color:white"></i>  CMS</a></li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#setting"><i class="fa fa-cogs" style="font-size:20px; color:white"></i>  Settings <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="setting" class="collapse">
                            <li>
                                <a href="adminchangepass.php">Change Password</a>
                            </li>
                            <li>
                                <a href="logout.php">Log out</a>
                            </li>
                        </ul>
                    </li>			
				</ul>

			</div>
			<div class="content">
				<h1>Admin Management</h1>
				
<form action="manage_admins.php" method="POST">
				<div id="box">
					<div class="box-top">
					<ol class="breadcrumb">
				<li><a href ="adminpanel.php">Dashboard</a></li>   
				<li class="active">Admin Management</a></li>				
				</ol>			
					</div>
	
				<div id="pics">
					<div class="box-panel">
						<b>Add new admin account</b>
						<br><br>
						<table id="m-admin" style="margin:auto;">
							<tr>
								<td><b>Admin fullname : </b></td>
								<td><input type="text" name="adminame" required></td>
							</tr>
							<tr>
								<td><b>Admin Position : </b></td>
								<td><input type="text" name="pos"></td>
							</tr>
							<tr>
								<td><b>Admin username : </b></td>
								<td><input type="text" name="adminuname" required></td>
							</tr>
							<tr>
								<td><b>Admin password : </b></td>
								<td><input type="password" name="adminpass" required></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="submit"></td>
							</tr>
						</table>

			<p align="center"><h2>Admin accounts</h2></p><br>
	  <div class="table-responsive">  	
						  <table class="table">
    <thead>
		<tr>
			<th>Admin Name</th>
			<th>Admin Position</th>
			<th>Admin Username</th>
			<th>Delete</th>
			<th> Update</th>	
		</tr>
		 </thead>	
			<?php
	
	mysql_connect("localhost","root","");
	mysql_select_db("thesis");
	
		$query = "select * from tb_admin";
		$run = mysql_query($query);
		
	while ($row=mysql_fetch_array($run)){
		$admin_id = $row[0];
		$admin_name = $row[1];
		$admin_position = $row[2];
		$admin_uname = $row[3];
		$admin_password = $row[4];
	
		?>
		
		 <tbody>
		<tr>
		<td><?php echo $admin_name;?></td>
		<td><?php echo $admin_position; ?></td>
		<td><?php echo $admin_uname; ?></td>
		<td><a href='deleteadmins.php?admin_id=<?php echo $admin_id;?>' onclick="return confirm('Are you sure you want to delete?')"><input type="button" id="del" value="Delete"></a></td>
		<td><a href=""><input type="button" value="View" id="view"></a></td>
		</tr>
		</tbody>

		
			<?php } ?>
			
	</table>
	</form>					
					</div>
				</div>
				</div>
			</div>
		</div>

	</body>
</html>
<?php

mysql_connect("localhost","root","");
mysql_select_db("thesis");

if(isset($_POST['submit'])) {

	$name = $_POST['adminame'];
	$pos = $_POST['pos'];
	$un = $_POST['adminuname'];
	$pas = $_POST['adminpass'];

	$query = "insert into tb_admin(admin_name,admin_position,admin_uname,admin_password) values ('$name','$pos','$un','$pas')";
	if(mysql_query($query))
		{
		
		echo "<script>alert('Add Successfully');</script>";
		}
	
	}
?>

