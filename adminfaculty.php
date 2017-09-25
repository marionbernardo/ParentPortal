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
				Admin Faculty|  LCJCA
			</title>
		<link rel="icon" type="image" href="logo.png">
		<link rel="stylesheet" type="text/css" href="admincss/admin.css">			
</head>
<style>
div#header {
	width: 100%;
	height: 100px;
	background-color: #2c3e50;
	margin: 0 auto;
}
</style>
	<body>
	<form action="manage_student_balance.php" method="POST">
		<div id="header">
			<div class="logo"><a href="adminchangepass.php">Welcome : <span id="admin"><?php echo $_SESSION['adminun']; ?></span></a>
				<span id="logout"><font color="white"><a href="logout.php"><input type="button" id="blo" value="Logout"></a></font></span>
			</div>
		</div>
		<div id="container">
			<div class="sidebar">
				<ul id="nav">
						<li><a href="adminpanel.php" >Home</a></li>
					<li><a href="manage_admins.php">Manage Admins</a></li>
					<li><a href="mstudents.php">Manage Students</a></li>
					<li><a href="manage_student_balance.php">Manage Students Balance</a></li>
					<li><a href="manage_tuition.php">Manage Tuition Fee</a></li>
					<li><a href="manage_grade.php">Manage Grade</a></li>
					<li><a href="adminfaculty.php" class ="selected">Manage Faculty</a></li>
					<li><a href="adminboard.php">Manage Boardtrustees</a></li>
					<li><a href="adminannounce.php">Manage Announcements</a></li>
					<li><a href="adminevents.php">Manage Events</a></li>
					<li><a href="adminfacility.php">Manage Facilities</a></li>
						<li><a href="manage_files.php" >Manage Website File</a></li>
				</ul>

			</div>
			<div class="content">
				<h1>Manage Faculty</h1>
				

				<div id="box">
					<div class="box-top">
			
			         <br> <br>
					</div>

					<div class="box-panel">
						<input type="text" name="search" id="ss">
						<input type="submit" name="submit" value="Search" id="search"><br>
						(search by Student No and Name)
						<p align="center"><h2>Students</h2></p><br>

						<div id="over">
					<table border=0 id="studetails" width="100%" align="center">
					
						<tr>
							<th>Employee No.</th>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Last Name</th>
							<th>Position</th>
							<th>Full Info</th>
							<th>Update</th>								
						</tr>
		
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
						<tr align='center'>
						
							<td id="tb1"><?php echo $row['student_no']; ?></td>
							<td id="tb1"><?php echo $row['firstname']; ?></td>
							<td id="tb1"><?php echo $row['middlename']; ?></td>
							<td id="tb1"><?php echo $row['lastname']; ?></td>
							<td id="tb1"><?php echo $row['grade_level']; ?></td>
					
						<td id="tb1"><a href='?student_no=<?php echo $row['student_no'];?>&grade_level=<?php echo 
						$row['grade_level'];?>'><input type="button" id="view" value="View"></a></td>
						<td id="tb1"><a href='?student_no=<?php echo $row['student_no'];?>&grade_level=<?php echo 
						$row['grade_level'];?>'><input type="button" id="view" value="View"></a></td>
						</tr>
						
							<?php } ?>
							
						</table>
					</div>
					
				</div>
			</div>
		</div>
</form>
	</body>
</html>