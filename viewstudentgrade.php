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
	width: 5em;
	background-color: #2980b9;
	border-radius: 3px;
	color: #fff;
	border: 1px solid gray;
}
</style>
	<body>
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
					<li><a href="manage_grade.php" class="selected">Manage Grade</a></li>
					<li><a href="adminfaculty.php">Manage Faculty</a></li>
					<li><a href="adminboard.php">Manage Boardtrustees</a></li>
					<li><a href="adminannounce.php">Manage Announcements</a></li>
					<li><a href="adminevents.php">Manage Events</a></li>
					<li><a href="adminfacility.php">Manage Facilities</a></li>
						<li><a href="manage_files.php" >Manage Website File</a></li>
				</ul>

			</div>
			<div class="content">
				<h1>Manage Student Grade</h1>
				

				<div id="box">
					<div class="box-top">
			
			         <br> <br>
					</div>

					<div class="box-panel">
					<p align="left"><a href="manage_grade.php"><input type="button" value="Back" id="back"></a></p>
					<br>
				<?php
							$student_no = $_GET['student_no'];

							mysql_connect("localhost","root","");
							mysql_select_db("thesis");	

							$query1 = "select * from tb_students where student_no = '$student_no'";
							$run1 = mysql_query($query1);
							
						while ($row=mysql_fetch_assoc($run1)){
						echo'<b>Name: </b>';
						echo $row['lastname'];
						echo '&nbsp;';
						echo $row['firstname'];
						echo '&nbsp;';
						echo $row['middlename'];	
						echo'<br>';
						echo '<b>Student No: </b>';
						echo $row['student_no'];
						echo '<br>';
						echo '<b>Grade: </b>';
						echo $row['grade_level'];
						echo '<br>';
						echo '<b>Section: </b>';
						echo $row['section'];
						echo '<br>';
						echo'<b>Schoo Year: </b>';
						 echo $row['schoolyear'];
						
					}
					?>
						<form action="viewstudentgrade.php?student_no=<?php echo $_GET['student_no'];?>&sub_id=<?php echo $_GET['sub_id'];?>" method="POST">
						<div id="over">
					<?php 

							$sub_id = $_GET['sub_id'];

							mysql_connect("localhost","root","");
							mysql_select_db("thesis");	

							$query = "select * from tb_subject where sub_id = '$sub_id'";
							$run = mysql_query($query);
					
							while ($row=mysql_fetch_assoc($run)){
							

						?>
						<table border=0 id="studetails" width="100%" align="center">
					<tr>
										<th>Subject Description</th>
										<th>Professor</th>
										<th>First Grading</th>
										<th>Second Grading</th>
										<th>Third Grading</th>
										<th>Fourth Grading</th>
										<th>Average</th>
										<th>Remarks</th>
									</tr>
						
						
						<div class="box-panel">
						<tr align='center'>
						
							<td id="tb1"><?php echo $row['subject_description']; ?></td>
							<td id="tb1"><?php echo $row['professor']; ?></td>
							<td id="tb1"><?php echo $row['first_grading']; ?></td>
							<td id="tb1"><?php echo $row['second_grading']; ?></td>
							<td id="tb1"><?php echo $row['third_grading']; ?></td>
							<td id="tb1"><?php echo $row['fourth_grading']; ?></td>
							<td id="tb1"><?php echo $row['average']; ?></td>
							<td id="tb1"><?php echo $row['remarks']; ?></td>
						
						</tr>
					</div>	
				</div>
			</div>
		</div>
</form>
</body>
</html>

<?php 

mysql_connect("localhost","root","");
mysql_select_db("thesis");


	if(isset($_POST['submit'])) {
		$student_no = $_GET['student_no'];