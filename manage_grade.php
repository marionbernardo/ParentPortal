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
				Admin Teacher |  LCJCA
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
#back {
	margin-left: 0px;
	margin-top: 8px;
	height: 2em;
	width: 7em;
	background-color: #2980b9;
	border-radius: 3px;
	color: #fff;
	border: 1px solid gray;
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
</style>
	<body>
	<form action="manage_grade.php" method="POST">
		<div id="header">
			<div class="logo"><a href="adminchangepass.php">Welcome : <span id="admin"><?php echo $_SESSION['adminun']; ?></span></a>
				<span id="logout"><font color="white"><a href="logout.php"><input type="button" id="blo" value="Logout"></a></font></span>
			</div>
		</div>
		<div id="container">
			<div class="sidebar">
				<ul id="nav">
					<li><a href="adminpanel.php"><i class="fa fa-dashboard" style="font-size:20px; color:white"></i>  Dashboard</a></li>
					<li><a href="manage_admins.php"><i class="fa fa-user" style="font-size:20px; color:white"></i>  Admin Management</a></li>
					<li><a href="mstudents.php"><i class="fa fa-group" style="font-size:20px; color:white"></i>  Student Management</a></li>
					<li><a href="manage_student_balance.php"><i class="fa fa-google-wallet" style="font-size:20px; color:white"></i>   Lendger Management</a></li>
					<li><a href="manage_grade.php" class="selected"><i class="fa fa-bar-chart" style="font-size:20px; color:white"></i>  Grade Management</a></li>
					<li><a href=""><i class="fa fa-qrcode" style="font-size:20px; color:white"></i>  CMS</a></li>
					<li><a href=""><i class="fa fa-cogs" style="font-size:20px; color:white"></i>  Setting</a></li>	
				</ul>

			</div>
			<div class="content">
				<h1>Grade Management</h1>
				

				<div id="box">
					<div class="box-top">
				  <ol class="breadcrumb">
				<li><a href ="adminpanel.php">Dashboard</a></li>   
				<li><a href ="manage_admins.php">Admin Management</a></li>
				<li><a href ="mstudents.php">Student Management</a></li>
				<li><a href ="manage_student_balance.php">Lendger Management</a></li>
				<li class="active">Grade Management</a></li>
				</ol>			  
					</div>

					<div id="pics">
					<div class="box-panel">
					<p align="left"><a href="classinfo.php"><input type="button" value="Add Class" id="back"></a></p>
					<p align="left"><a href="insertgrade.php"><input type="button" value="Add Subject" id="back"></a></p>
					<p align="left"><a href="insertgrade.php"><input type="button" value="Add Student" id="back"></a></p>
					<p align="left"><a href="insertgrade.php"><input type="button" value="Add Teacher" id="back"></a></p>
					
						<input type="text" name="search" id="ss">
						<input type="submit" name="submit" value="Search" id="search"><br>
						(search by Student No and Name)
						<p align="center"><h2>Students</h2></p><br>

						 <div class="table-responsive">  	
						  <table class="table">
						<thead>
						<tr>
							<th>Student No.</th>
							<th>Name</th>
							<th>Grade Level</th>
							<th>Section</th>
							<th>Full info</th>													
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
							<td><?php echo $row['student_no']; ?></td>
							<td><?php echo $row['lastname']; ?>,<?php echo $row['firstname']; ?>&nbsp<?php echo $row['middlename']; ?></td>
							<td><?php echo $row['grade_level']; ?></td>
							<td><?php echo $row['section']; ?></td>
							<td><a href="viewstudentgrade.php"?student_no=<?php echo $row['student_no'];?>&grade_level=<?php echo 
							$row['grade_level'];?>'><input type="button" id="view" value="View"></a></td>
						</tr>
						</tbody>
						
							<?php } ?>
							
						</table>
					</div>	
				</div>
			</div>
		</div>
	  </div>
</form>
</body>
</html>