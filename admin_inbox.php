<?php
session_start();
include('times.php');

if(!$_SESSION['adminun']){
header("location: adminlogin.php");

}
?>
<html>
	<head>
		<!--title php dynamic-->
			<title>
				Admin Inbox
			</title>
		<link rel="icon" type="image" href="logo.jpg">
		<link rel="stylesheet" type="text/css" href="admincss/admin.css">	
	
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
					<a href="admin_inbox.php" class="selected">Inbox 
					
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
				<h1>Inbox</h1>
				

				<div id="box">
					<div class="box-top">
						Messages
					</div>

					<div class="box-panel">
						
					<?php 

								mysql_connect("localhost","root","");
								mysql_select_db("thesis");

								if(isset($_GET['msg'])) {
								$id =  $_GET['msg'];
								$update = mysql_query("update tb_messages SET open ='1' where message_no ='$id'");
								$msg = mysql_query("select * from tb_messages where message_no = '$id'");
								$row = mysql_fetch_array($msg);

										$message_no = $row[0];
										$sender = $row[1];
										$reciever = $row[2];
										$sub  = $row[3];
										$message  = $row[4];
										$date = $row[5];
										$time_elapsed = timeAgo($row['time']);
										$open = $row[7];
				

		

				?>

	<div id="msg">
		<p align="left"><a id="back" href="admin_inbox.php"><input type="button" value="Back to inbox" id="back1"></a></p>
	
			
		
				<p align="left" id="inbox">
				<BR><b>From : </b> <?php echo $sender ;?><BR>
		
				<b>Date : </b>  <?php echo $date; ?><BR>
				<b>Sent : </b> <?php echo $time_elapsed; ?><Br><BR>
				
				</p>
			
	<p align="left" id="message">
		<b>Message</b><br><Br>
	<?php echo $message;  ?><BR><BR><BR><BR>
	</p>
		<p align="left"><a id="remove" href="?remove=<?php echo $message_no; ?>"><input type="button" id="danger" value="Delete this message"></a></p>
			</div>
		<?php exit(); } ?>
		<?php 

		if(isset($_GET['remove'])) {
			$id = $_GET['remove'];
			$remove = mysql_query("delete from tb_messages where message_no='$id'");
			
			if($remove) {
				echo "<script>window.location = 'admin_inbox.php';</script>";
			}else {

				die ("Please Refresh the page");
			}
			exit();
		}
		?>



								<table id="eninbox">
									<tr>
										<th>From</th>
										<th>Subject</th>
										<th>Date</th>
										<th>Sent</th>
										<th>Seen</th>
										<th>View</th>
									</tr>
								
						<?php		
		
							mysql_connect("localhost","root","");
							mysql_select_db("thesis");

									
							$query = "select * from tb_messages where reciever = 'admin' ORDER BY message_no DESC";
							
							$run = mysql_query($query);
															
							while ($row=mysql_fetch_array($run)){
										$message_no = $row[0];
										$sender = $row[1];
										$reciever = $row[2];
										$sub  = $row[3];
										$message  = $row[4];
										$date = $row[5];
										$time_elapsed = timeAgo($row['time']);
										$open = $row[7];

									if($row['open'] == 0) {
										$open = "Not Opened";
									}else {
										$open = "Opened";

									}
								?>
								<tr>
									<td><?php echo $sender;?></td>
									<td><?php echo $sub;?></td>
									<td><?php echo $date;?></td>
									<td><?php echo $time_elapsed;?></td>
									<td><?php echo $open; ?></td>
									<td><?php echo '<a href="?msg='.$message_no.'"><input type="button" value="View" id="view"></a>'?></td>
								</tr>
									
									
									
									
								

									<?php } ?>
						</table>
				</div>
			</div>
		</div>
	</body>
</html>