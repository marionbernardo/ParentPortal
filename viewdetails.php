<?php

error_reporting(0);

session_start();


if(!$_SESSION['adminun']){
header("location: adminlogin.php");

}
mysql_connect("localhost","root","");
mysql_select_db("db_bcis");

include("times.php");
?>
<html>
	<head>
		<!--title php dynamic-->
			<title>
				View Details
			</title>
		<link rel="icon" type="image" href="logo.jpg">
	
		<link rel="stylesheet" href="admincss/view.css">

	
	</head>




	<body>
		<form action="viewdetails.php" method="POST">
			<div id="header">
			<div class="logo"><a href="adminchangepass.php">Welcome : <span id="admin"><u><?php echo $_SESSION['adminun']; ?></u></span></a>
				<span id="logouts"><font color="white"><a href="logout.php"><input type="button" id="blo" value="Logout"></a></font></span>
			</div>
		</div>

		<a class="mobile" href="#">MENU</a>
		
		<div id="container">
			<div class="sidebar">
				<ul id="nav">
					<li><a href="adminpanel.php">Home</a></li>
					<li><a href="manage_admins.php">Manage Admins</a></li>
						<li>
					<a href="admin_inbox.php">Inbox 
					
							<?php
							mysql_connect("localhost","root","");
							mysql_select_db("db_bcis");
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
							mysql_select_db("db_bcis");
							$result=mysql_query("SELECT count(*) as total from tb_admissionrequest where opened='0'");
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
		
				

					</a></li>
					<li><a href="manage_students.php">Manage Students</a></li>
					<li><a href="manage_student_balance.php" >Manage Students Balance</a></li>
					<li><a href="manage_tuition.php">Manage Tuition Fee</a></li>
					<li><a href="adminboard.php">Manage Boardtrustees</a></li>
					<li><a href="adminannounce.php">Manage Announcements</a></li>
					<li><a href="adminevents.php">Manage Events</a></li>
					<li><a href="adminnews.php">Manage News</a></li>
					<li><a href="adminfacility.php">Manage Facilities</a></li>
					<li><a href="manage_file.php"  >Manage Website File</a></li>
				</ul>


			</div>


							<?php 

								mysql_connect("localhost","root","");
								mysql_select_db("db_bcis");

								if(isset($_GET['application_no'])) {
								$id =  $_GET['application_no'];
								$update = mysql_query("update tb_admissionrequest set opened ='1' where application_no ='$id'");
								}
								else {
									echo mysql_error();
								}

							?>
			<div class="content">
				<h1>Manage Admission Requests</h1>
				

				<div id="box">
					<div class="box-top">
						Request Inbox
					</div>

					<div class="box-panel">


						<div id="adform">
								<?php 

								$appid = $_GET['application_no'];

								mysql_connect("localhost","root","");
							mysql_select_db("db_bcis");	

							$query1 = "select * from tb_admissionrequest where application_no = '$appid'";
							
				
							$run1 = mysql_query($query1);
							
						while ($row=mysql_fetch_assoc($run1)){
							

						?>
							<p align="right"><input type="text" id="acc" name="accname" value="<?php echo $row['account_name'];?>"readonly><BR></p>
						<?php } ?>
						<p align="left">

							<a href="admissionrequest.php">Back to request inbox</a><BR><BR>
							
							<b>Information of a Student</b><Br>
							<?php 

								$appid = $_GET['application_no'];

								mysql_connect("localhost","root","");
							mysql_select_db("db_bcis");	

							$query = "select * from tb_students where application_no = '$appid'";
							
				
							$run = mysql_query($query);
							
						while ($row=mysql_fetch_assoc($run)){
							

						?>

							<table border=0>
									<tr>
										<td><input type="text" id="acc" name="accid" value=<?php echo $appid;?> readonly></td>
										<td>

											<input type="text" id="acc" name="asstcode"  value="<?php echo $row['assestment_code'];?>" readonly></td>
									</tr>
								<tr>
									<td><input type="text" name="fname" value="<?php echo $fname = $row['firstname'];?>"readonly></td>
									<td><input type="text" name="mname"  value="<?php echo $mname = $row['middlename'];?>"readonly></td>
									<td><input type="text" name="lname" value="<?php echo $lname = $row['lastname'];?>"readonly></td>
									
								</tr>
								
								<tr>
									<td>First Name</td>
									<td>Middle Name</td>
									<td>Last Name</td>
									
								</tr>
								
								<tr>
									<td><input type="text" name="age" value="<?php echo $age = $row['age'];?>" readonly></td>
									<td><input type="text" name="grade" value="<?php echo $grade = $row['grade_level'];?>"readonly></td>
									</td>
								</tr>

								<tr>
									<td>Age</td>
									<td>Grade/Level</td>
								</tr>
							
							<tr>
								<td></td>
							</tr>

							<tr>
								<td><input type="text" name="address" value="<?php echo $street = $row['address'];?>" readonly></td>
								
								<td><input type="text" name="cpnumber" value="<?php echo $row['contact_no'];?>" readonly></td>
							</tr>

								<tr>
									
									
									<td>Address</td>
									<td>Contact #</td>
								</tr>

								<tr>
									<td><input type="date" name="date" value="<?php echo $row['birthday'];?>" readonly></td>
									<td><input type="text" name="sex" value="<?php echo $row['sex'];?>" readonly></td>
									<td><input type="text" name="nation" value="<?php echo $row['nationality'];?>" readonly></td>
									<td><input type="text" name="religion" value="<?php echo $row['religion'];?>" readonly></td>
								</tr>


								<tr>
									<td>Birthday</td>
									<td>Gender</td>
									<td>Nationality</td>
									<td>Religion</td>
								</tr>


							
							</table>
							<BR><BR>
							<table border=0>
								<tr>
									<th><b>Parent information</b></th>
								</tr>
								<tr>
									<th><BR>Father's info</th>
									
								</tr>

								<tr>
									<td><input type="text" name="fathf" value="<?php echo $row['father_name'];?>" readonly></td>
										
								</tr>

								<tr>
									<td>Father's Name</td>
									
								</tr>

								<tr>
									<td><input type="text" name="fstreet" value="<?php echo $row['father_address'];?>" readonly></td>
								
							
								<td><input type="text" name="fcpnumber" value="<?php echo $row['father_contact'];?>" readonly></td>
								</tr>

								<tr>
									<td>Address</td>
									
		
									<td>Contact #</td>
								</tr>

								<tr>
									<td><input type="text" name="frelig" value="<?php echo $row['father_religion'];?>" readonly></td>
									<td><input type="text" name="fnation" value="<?php echo $row['father_nationality'];?>" readonly></td>
									<td><input type="text" name="foccup" value="<?php echo $row['father_occup'];?>" readonly></td>
								</tr>
								<tr>
									<td>Religion</td>
									<td>Nationality</td>
									<td>Occupation</td>
								</tr>

								<tr>
									<th><BR><b>Mother's Info</b></th>
								</tr>

								<tr>
									<td><input type="text" name="mothf" value="<?php echo $row['mother_name'];?>" readonly></td>
									
											
								</tr>

								<tr>
									<td>Mother's Name</td>
									
								
								</tr>

								<tr>
									<td><input type="text" name="mstreet" value="<?php echo $row['mother_address'];?>" readonly></td>
								
								<td><input type="text" name="mcpnumber" value="<?php echo $row['mother_contact'];?>" readonly></td>
								</tr>

								<tr>
									<td>Address</td>
								
									<td>Contact #</td>
								</tr>

								<tr>
									<td><input type="text" name="mrelig" value="<?php echo $row['mother_religion'];?>" readonly></td>
									<td><input type="text" name="mnation" value="<?php echo $row['mother_nationality'];?>" readonly></td>
									<td><input type="text" name="moccup" value="<?php echo $row['mother_occup'];?>" readonly></td>
								</tr>
								<tr>
									<td>Religion</td>
									<td>Nationality</td>
									<td>Occupation</td>
								</tr>

							</table>


							<table>
								<tr>
									<th><b>Others<BR><BR></b></th>
								</tr>

								<tr>
									<td>SCHOOL PREVIOUSLY ATTENDED: </td>
									<td><input type="text" name="schoolprev" id="other" value="<?php echo $row['school_prev'];?>" readonly></td>
								</tr>

								<tr>
									<td>FROM WHAT SOURCE DID YOU LEARN THIS SCHOOL: </td>
									<td><input type="text" name="source" id="other" value="<?php echo $row['what_source'];?>" readonly></td>
								</tr>


								<tr>
									<td>Allergies / Illnesses: </td>
									<td><input type="text" name="allergy" id="other" value="<?php echo $row['allergies'];?>" readonly></td>
								</tr>

								
							</table>
							
							<table>
								<tr>

									<td><BR><BR>
										
										<input type="text" name="datetoday"  value="<?php echo $row['date_today'];?>" readonly>
										</td>
								</tr>
									<tr>
										<td>Date</td>
									</tr>

							</table>
<?php }?>
						</p>
						<BR>
						
						<input type="submit" value="Approve" name="approve"><input type="submit" value="Reject" id="reject" name="reject">
					</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	</body>
</html>

<?php 


if(isset($_POST['approve'])) {
$mname = $_POST['mname'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$accname = $_POST['accname'];
$asstcode = $_POST['asstcode'];
$subject = 'Application Approve';
$sender = 'admin';
$message = 'Your application in admission has been approved  and enter this assesstment code in 
available textbox in the assestment tab thank you! This is your assesstment code :';
$requirements = 'And bring the following requirements for the signature of the principal <br><br><b>1.</b>NSO Birth Certificate
(Photo Copy 1pc)<br><b>2.</b>Form 137 (Orginal copy 1pc)<br><b>3.</b>Form 138 (Report Card) Original Copy<br>
<b>4.</b>Good Moral Original copy';

	$dates = date("M/d/Y");
	$time = time();


$open = 0;
$query = "insert into tb_messages(sender,reciever,subject,message,date,time,open) values ('$sender','$accname','$subject','Hello! <b>$fname $mname $lname.</b> $message <b><u>$asstcode</u></b><br><br> $requirements','
	$dates','$time','$open')";

$accid = $_POST['accid'];

$query1 = mysql_query("delete from tb_admissionrequest where application_no = '$accid'");
if(mysql_query($query))
		{
		
		echo "<script>alert('Approved Successfully');window.location.href = 'admissionrequest.php';</script>";

	}
}


if(isset($_POST['reject'])) {

	$mname = $_POST['mname'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$accname = $_POST['accname'];
	$subject = 'Application Rejected';
	$sender = 'admin';
	$message = 'Your application in admission has been <b>rejected</b>. Because some of the informations you entered was wrong please try again.';
	$dates = date("M/d/Y");
	$time = time();
	$open = 0;

	$rej = "insert into tb_messages(sender,reciever,subject,message,date,time,open) values ('$sender','$accname','$subject','Hello! <b>$fname $mname $lname.</b> $message','
	$dates','$time','$open')";
	if(mysql_query($rej))
		{
		
		echo "<script>alert('Rejected Successfully');window.location.href = 'admissionrequest.php';</script>";

	}

		$accid = $_POST['accid'];

		$query2 = mysql_query("delete from tb_students where application_no = '$accid'");
		$query3 = mysql_query("delete from tb_admissionrequest where application_no = '$accid'");




}
?>



