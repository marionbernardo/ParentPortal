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
				Manage Students
			</title>
		<link rel="icon" type="image" href="logo.jpg">
		<link rel="stylesheet" type="text/css" href="admincss/admin.css">	

		<style>
		#search {

			margin-left: 0px;
			margin-top: 8px;
			height: 2em;
			width: 5em;
			background-color: #34495e;
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

		</style>

		<script type="text/javascript">
function focus() {
	var text=document.getElementById('ss');

	text.focus();
	}
</script>
		
	</head>




	<body onload="focus();">
		<form action="" method="POST">
		<div id="header">
			<div class="logo"><a href="adminchangepass.php">Welcome : <span id="admin"><u><?php echo $_SESSION['adminun']; ?></u></span></a>
				<span id="logout"><font color="white"><a href="logout.php"><input type="button" id="blo" value="Logout"></a></font></span>
			</div>
		</div>

		<a class="mobile" href="#">MENU</a>
		
		<div id="container">
			<div class="sidebar">
				<ul id="nav">
				<li><a href="adminpanel.php" >Home</a></li>
					<li><a href="manage_admins.php">Manage Admins</a></li>
									<li>
					<a href="admin_inbox.php">Inbox 
					
							<?php
							mysql_connect("localhost","root","");
							mysql_select_db("thesis");
							$result=mysql_query("SELECT count(*) as total from tb_messages where open='0' and reciever = 'admin'");
							$data=mysql_fetch_assoc($result);
							if($data['total'] > 0) {
								echo "<span id='notif'>";
								echo $data['total'];
								echo '&nbsp;new message(s)</span>';
							}
							else {
								echo "";
							}
							
							?>
		
					</a>
					</li>
					<li><a href="admissionrequest.php" >Admission Requests
					
							<?php
							mysql_connect("localhost","root","");
							mysql_select_db("thesis");
							$result=mysql_query("SELECT count(*) as total from tb_admissionrequest where opened='0'");
							$data=mysql_fetch_assoc($result);
							if($data['total'] > 0) {
								echo "<span id='notif'>";
								echo $data['total'];
							
							}
							else {
								echo "";
							}
							
						
							
							?>
		
				

					</a></li>
					<li><a href="manage_students.php" class="selected">Manage Students</a></li>
					<li><a href="manage_student_balance.php" >Manage Students Balance</a></li>
					<li><a href="manage_tuition.php">Manage Tuition Fee</a></li>
					<li><a href="adminboard.php">Manage Boardtrustees</a></li>
					<li><a href="adminannounce.php">Manage Announcements</a></li>
					<li><a href="adminevents.php">Manage Events</a></li>
					<li><a href="adminnews.php">Manage News</a></li>
					<li><a href="adminfacility.php">Manage Facilities</a></li>
					<li><a href="manage_files.php" >Manage Website File</a></li>
				</ul>

			</div>
			<div class="content">
				<h1>Manage Students</h1>
				

				<div id="box">
					<div class="box-top">
						Renew Admission
					</div>

					<div class="box-panel">
						<p align="left"><a href="manage_students.php"><input type="button" value="<-- BACK" id="back"></a></p>
							
								<input type="text" name="search" id="ss">
								<input type="submit" name="submit" value="Search" id="search"><br><br>
							
						<div id="cont">
						<table border=0 id="studetails" width="100%" lign="center">
							<tr>
								<th>Student No.</th>
								<th>Assestment Code.</th>
								<th>First Name</th>
								<th>Middle Name</th>
								<th>Last Name</th>
								<th>Username</th>
								<th>Password</th>
								
								<th>Renew Admission</th>
							</tr>
						
						<?php 
							mysql_connect("localhost","root","");
							mysql_select_db("thesis");	

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

						<tr>
							<td><?php echo $row['student_no'];?></td>
							<td><?php echo $row['assestment_code'];?></td>
							<td><?php echo $row['firstname'];?></td>
							<td><?php echo $row['middlename'];?></td>
							<td><?php echo $row['lastname'];?></td>
							<td><?php echo $row['student_username'];?></td>
							<td><?php echo $row['student_password'];?></td>
							
							
								<td><a href="update_detail.php?student_no=<?php echo $row['student_no'];?>"><input type="button" value="Renew" id="update"></a></td>
						</tr>

						
						<?php }?>
					</table>
				</div>
				<BR><BR>
				
				</div>
				<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
						<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
			</div>

		</div>
	</form>
	</body>
</html>