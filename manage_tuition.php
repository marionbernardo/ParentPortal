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
				Admin Panel | LCJCA
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
		
input[type=number] {
	width: 10em;
	height:2em;
	font-size: 0.9em;
	border: 1px solid #bdc3c7;
	border-radius: 3px;
}

</style>
</head>
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
					<li><a href="manage_student_balance.php" >Manage Students Balance</a></li>
					<li><a href="manage_tuition.php" class="selected">Manage Tuition Fee</a></li>
					<li><a href="manage_grade.php">Manage Grade</a></li>
					<li><a href="adminboard.php">Manage Boardtrustees</a></li>
					<li><a href="adminannounce.php">Manage Announcements</a></li>
					<li><a href="adminevents.php">Manage Events</a></li>
					<li><a href="adminfacility.php">Manage Facilities</a></li>
						<li><a href="manage_files.php" >Manage Website File</a></li>
						
				</ul>

			</div>
			<div class="content">
				<h1>Manage Tution Fee</h1>
				
				<div id="box">
					<div class="box-top">
						
						<br> <br>
					</div>
		
					<div class="box-panel">
				
					<p align="center"><h2>Tution Fee</h2></p><br>
		<div id="over">
	<table border=0 id="studetails" width="100%" align="center">
	
		<tr>
		
			<th>Grade Level</th>
			<th>Tution Fee</th>
			<th>Miscellaneous</th>
			<th>Other Expenses</th>
			<th>View full info</th>
			<th>Update</th>
			
		</tr>
		
			<?php
			include("connection.php");
		$query = "select * from tb_tuitionfee";
		$run = mysql_query($query);
		
	while ($row=mysql_fetch_assoc($run)){
	
		
		?>
		<tr align='center'>
		
		<td id="tb1">Grade <?php echo $row['grade_level']; ?></td>
		<td id="tb1"><?php echo $row['tuition']; ?></td>
		<td id="tb1"><?php echo $row['miscellaneous']; ?></td>
		<td id="tb1"><?php echo $row['other_expenses']; ?></td>
		<td id="tb1"><a href='viewtuition.php?grade_level=<?php echo $row['grade_level'];?>'><input type="button" id="view" value="View"></a></td>
		<td id="tb1"><a href='update_tuition.php?grade_level=<?php echo $row['grade_level'];?>'><input type="button" id="view" value="View"></a></td>
		</tr>
		
			<?php } ?>
			
	</table>
				</div>
			</div>
		</div>
	</body>
</html>

<?php
mysql_connect("localhost","root","");
mysql_select_db("thesis");


	if(isset($_POST['submit'])) {

		$grade = $_POST['grade'];
		$a = $_POST['tuition'];
		$b = $_POST['miscellaneous'];
		$c = $_POST['learners_materials'];
		$d = $_POST['playpen_computer'];
		$e = $_POST['books'];
		$f = $_POST['school_materials'];
		$g = $_POST['other_expenses'];
		

			$query = "update tb_tuitionfee set tuition = '$a',miscellaneous ='$b',learners_materials ='$c',playpen_computer ='$d'
			,books = '$e',school_materials = '$e',other_expenses ='$f'  where grade_level = '$grade_level'";

			if(mysql_query($query)) {
	
	echo "<script>alert('Update succesfully');window.location='manage_tuition.php';</script>";
	
	}
	}

?>