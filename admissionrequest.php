<?php

error_reporting(E_ALL & ~E_NOTICE & ~8192);

session_start();


if(!$_SESSION['adminun']){
header("location: adminlogin.php");

}
mysql_connect("localhost","root","");
mysql_select_db("thesis");

include("times.php");
?>
<html>
	<head>
		<!--title php dynamic-->
			<title>
				Requests 
			</title>
		<link rel="icon" type="image" href="logo.png">
		<link rel="stylesheet" type="text/css" href="admincss/admin.css">
		<link rel="stylesheet" type="text/css" href="admincss/admissionrequest.css">
		
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
					<li><a href="admissionrequest.php" class="selected">Admission Requests
					
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
					<li><a href="manage_students.php">Manage Students</a></li>
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
				<h1>Manage Admission Requests</h1>
				

				<div id="box">
					<div class="box-top">
						Request Inbox
					</div>
							
					<div class="box-panel">
						<div id="requests">
						<table id="request" align="center">
							<tr>
								<th>Application no</th>
								<th>Account name</th>
								<th>Name</th>
								<th>Date</th>
								<th>Time</th>
								<th>Seen</th>
								<th>View all Details</th>
							</tr>
						
						<?php 
							mysql_connect("localhost","root","");
							mysql_select_db("thesis");	

							$query = "select * from tb_admissionrequest ORDER BY application_no DESC";
		
							$run = mysql_query($query);
							
						while ($row=mysql_fetch_array($run)){
							$application_no = $row[0];
							$accname = $row[1];
							$name = $row[2];
							$date = $row[3];
							$time_elapsed = timeAgo($row['time']);
							$open = $row[5];
							
									if($row['opened'] == 0) {
										$open = "Not Opened";
									}else {
										$open = "Opened";

									}


						?>

						<tr>
							<td><?php echo $application_no; ?></td>
							<td><?php echo $accname; ?></td>
							<td><?php echo $name; ?></td>
							<td><?php echo $date; ?></td>
							<td><?php echo $time_elapsed; ?></td>
							<td><?php echo $open;?></td>
							
							<td><a href="viewdetails.php?application_no=<?php echo $application_no;?>"><input type="button" id="view" value="View"></a></td>
						</tr>


						<?php }?>
						</table>

					</div>
					</div>
				</div>
				<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
				<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
			</div>
		</div>
	</body>
</html>