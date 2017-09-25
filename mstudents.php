<?php
session_start();
if(!$_SESSION['adminun']){
header("location: adminlogin.php");
}
?>
<html>
	<head>
			<title>
				Manage Students | LCJCA
			</title>
		<link rel="icon" type="image" href="logo.png">
		<link rel="stylesheet" type="text/css" href="admincss/admin.css">	
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
div#header {
	width: 100%;
	height: 100px;
	background-color: #2c3e50;
	margin: 0 auto;
}
#search {
	margin-left: 0px;
	margin-top: 8px;
	height: 3em;
	width: 5em;
	background-color: #2980b9;
	border-radius: 3px;
	color: #fff;
	border: 1px solid gray;
}

#back {
	margin-left: 0px;
	margin-top: 8px;
	height: 2em;
	width: 5em;
	background-color: #2980b9;
	border-radius: 3px;
	color: #fff;
	border: 1px solid gray;
}

#back:hover {
	opacity: 0.9;
	cursor: pointer;
}
#pics {
	float:left;
	padding: 10px;
	display: inline-block;
	border: 1px solid gray;
	width: 100%;
	height: 100%;
	margin-left: 0px;
	border-radius: 1px;
	background-color: white;
}
.sidebar {
	height: 120%;
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
.logo {
	float: right;
	margin-top: 10px;
	margin-right: 10px;
	color: white;
	font-size : 1.3em;
	font-weight: bold;
}
</style>

<script type="text/javascript">
function focus() {
	var text=document.getElementById('ss');

	text.focus();
	}
</script>
</head>
<body onload="focus();">
		<form action="mstudents.php" method="POST">
		<div id="header">
			<div class="logo"><i class="fa fa-user-circle" style="font-size:24px"> Welcome : <span id="admin"><?php echo $_SESSION['adminun']; ?></span></i>

			</div>
		</div>

		<div id="container">
			<div class="sidebar">
				<ul id="nav">
					<li><a href="adminpanel.php"><i class="fa fa-dashboard" style="font-size:20px; color:white"></i>  Dashboard</a></li>
					<li><a href="manage_admins.php"><i class="fa fa-user" style="font-size:20px; color:white"></i>  Admin Management</a></li>
					<li><a href="mstudents.php" class="selected"><i class="fa fa-group" style="font-size:20px; color:white"></i>  Student Management</a></li>
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
				<h1>Student Management</h1>
				

				<div id="box">
					<div class="box-top">
				<ol class="breadcrumb">
				<li><a href ="adminpanel.php">Dashboard</a></li>   
				<li><a href ="manage_admins.php">Admin Management</a></li>
				<li class="active">Student Management</a></li>
				</ol>			
					</div>

						<div id="pics">
					<div class="box-panel">				
						<input type="text" name="search" id="ss">
						<input type="submit" name="submit" value="Search" id="search"> <a href="add_students.php"><input type="button" value="ADD" id="search"></a><br>
						(search by Student No. and  Name)
						<br><br>
						<p align="center"><h2>Students</h2></p><br>
						
							 <div class="table-responsive">  	
						  <table class="table">
						<thead>
							<tr>
								<th>Student No.</th>
								<th>First Name</th>
								<th>Middle Name</th>
								<th>Last Name</th>
								<th>Username</th>
								<th>Password</th>
								<th>Full info</th>
								<th> Update</th>	
							</tr>
						</thead>
						
						<?php 
							include("connection.php");

							if(isset($_POST['submit'])) {
							$search = $_POST['search'];

							$query = "select * from tb_students where firstname like '%$search%' or lastname like '%$search%' or middlename like '%$search%' or student_no ='$search' or grade_level = '$search'";
							
						}
						else
							$query = "select * from tb_students";
		
							$run = mysql_query($query);
								if(mysql_num_rows($run) == 0) {
									echo "No Results Found!";
								}
							
						while ($row=mysql_fetch_assoc($run)){
							
						?>

						<tbody>
						<tr>
							<td><?php echo $row['student_no'];?></td>
							<td><?php echo $row['firstname'];?></td>
							<td><?php echo $row['middlename'];?></td>
							<td><?php echo $row['lastname'];?></td>
							<td><?php echo $row['student_username'];?></td>
							<td><?php echo $row['student_password'];?></td>
							<td><a href="studentdetail.php?student_no=<?php echo $row['student_no'];?>"><input type="button" value="View" id="view"></a></td>
							<td><a href="update_full_detail.php?student_no=<?php echo $row['student_no'];?>"><input type="button" value="View" id="view"></a></td>
						</tbody>		
						</tr>

						
						<?php } ?>
					</table>
				</div>
				</div>
			</div>
			</div>
			</div>
		</div>
	</form>
	</body>
</html>