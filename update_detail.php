<?php
error_reporting(0);

?>
<html>
	<head>
		<title>
			
		</title>

		<style>
		
		* {
			padding: 0px;
			margin: 0px;
		}

		select {
		height: 2em;
		font-size: 11pt;
		border-radius: 3px;
		border: 1px solid #95a5a6;
		margin-left: 8px;
		margin-top: 10px;

		}

		body {
			font-family: segoe UI;
		}
		input[type=text]{

		height: 2em;
		font-size: 11pt;
		text-align: center;
		border: 1px solid #ecf0f1;
		border-bottom: 1px solid #95a5a6;
		margin-left: 10px;
		margin-top: 10px;
		font-size: 11pt;
	
	}

	#tbcenter {
		
		margin: auto;
		border-radius: 4px;
		padding: 10px;
		
		background-color:#ecf0f1;
		width:800px;
		border: 1px solid black;
	}

	table td {
		text-align: center;
		font-size: 9pt;
	}

	input[type=submit] {

		margin-left: 0px;
		margin-top: 8px;
		height: 3em;
		width: 7em;
		background-color: #2980b9;
		border-radius: 5px;
		color: #fff;
		border: 1px solid gray;
		font-weight: bold;
	}

	input[type=submit]:hover {
		opacity: 0.9;
		cursor: pointer;
	}

	#un {

		background: #ecf0f1;
		border-bottom: 1px solid #ecf0f1;
		color:#ecf0f1;
	}

	#read {
		background: #ecf0f1;

	}

	#s-pic img{
		display: inline-block;
		float: left;
		border: 1px solid black;
		border-radius: 4px;
		margin-left: 390px;
		
	}
	#s-top{
		display: inline-block;
		float: left;
		
		
		margin-top: 100px;
		
	}

</style>
	</head>

	<body>
	
<form action="update_detail.php" method="POST">
							

						
							
							
							<?php 

								$id = $_GET['student_no'];

								mysql_connect("localhost","root","");
							mysql_select_db("thesis");	

							$query = "select * from tb_students where student_no = '$id'";
							
				
							$run = mysql_query($query);
							
						while ($row=mysql_fetch_assoc($run)){
							

						?>
					<br>
							<div id="tbcenter">
							

								<div id="s-top">
								<b>Update Grade Level of the Student</b><Br>
								</div>
								<div id="s-pic">
								
								<?php echo "&nbsp;&nbsp;<img src='studentportal/".$row['student_pic']."' height = '130px' width= '130px'";?><Br><Br>
								</div>
							<table border=0 align="center" id="tb">
									<tr>
										<td><input type="text"  id="un" name="un" value="<?php echo $row['student_username']; ?>" readonly></td>
									</tr>
									
									<tr>
										<td><input type="text" id='read' name="stdno" value="<?php echo $row['student_no'];?>" readonly></td>
									</tr>
									<tr>
										<td>Student number</td>
									</tr>
								<tr>
									<td><input type="text" name="fname" id="read" value="<?php echo $fname = $row['firstname'];?>" readonly></td>
									<td><input type="text" name="mname"  id="read"  value="<?php echo $mname = $row['middlename'];?>" readonly> </td>
									<td><input type="text" name="lname" id="read"  value="<?php echo $lname = $row['lastname'];?>" readonly></td>
									
								</tr>
								
								<tr>
									<td>First Name</td>
									<td>Middle Name</td>
									<td>Last Name</td>
									
								</tr>
								
								<tr>
									<td><input type="text" id="read"  name="age" value="<?php echo $age = $row['age'];?>" readonly></td>
									<td><select name="grade" required>
										<option value=""><?php echo $grade = $row['grade_level'];?></option>
										  <option value="Nursery">Nursery</option>
										  <option value="JuniorKindergarten">JuniorKindergarten</option>
										  <option value="SeniorKindergarten">SeniorKindergarten</option>
										  <option value="1">Grade 1</option>
										  <option value="2">Grade 2</option>
										  <option value="3">Grade 3</option>
										  <option value="4">Grade 4</option>
										  <option value="5">Grade 5</option>
										  <option value="6">Grade 6</option>
										  <option value="7">Grade 7</option>
										  <option value="8">Grade 8</option>
										  <option value="9">Grade 9</option>
										  <option value="10">Grade 10</option>
										</select>



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
								<td><input type="text" id="read"  name="address" value="<?php echo $street = $row['address'];?>" readonly></td>
								
								<td><input type="text" id="read"  name="cpnumber" value="<?php echo $row['contact_no'];?>" readonly></td>
							</tr>

								<tr>
									
									
									<td>Address</td>
									<td>Contact #</td>
								</tr>

								<tr>
									<td><input type="text" id="read" name="date" value="<?php echo $row['birthday'];?>" readonly></td>
									<td><input type="text" id="read" name="sex" value="<?php echo $row['sex'];?>" readonly></td>
									<td><input type="text" id="read" name="nation" value="<?php echo $row['nationality'];?>" readonly></td>
									<td><input type="text" id="read" name="religion" value="<?php echo $row['religion'];?>" readonly></td>
								</tr>


								<tr>
									<td>Birthday</td>
									<td>Gender</td>
									<td>Nationality</td>
									<td>Religion</td>
								</tr>


							
							</table>
							<BR><BR>
							

							<p align="center"><input type="submit" name="submit" value="Update"></p>
							</div>


<?php }?>


		</div>

		</form>
	</body>
</html>

<?php 

mysql_connect("localhost","root","");
mysql_select_db('thesis');

if(isset($_POST['submit'])) {
	$f = $_POST['fname'];
	$m = $_POST['mname'];
	$l = $_POST['lname'];

	$age = $_POST['age'];
	$grade = $_POST['grade'];
	$address = $_POST['address'];
	
	$cno = $_POST['cpnumber'];
	$bdate = $_POST['date'];
	$sex = $_POST['sex'];
	$nation = $_POST['nation'];
	$rel = $_POST['religion'];


	


	

	$datetoday = $_POST['datetoday'];


$un = $_POST['un'];

$stdno = $_POST['stdno'];
	
$assest_code = substr(md5(uniqid(rand(), true)), 18, 18);

$subject = "Renewal Approved";
$dates = date("M/d/Y");
	$time = time();

$query ="update tb_students set assestment_code = '$assest_code',firstname = '$f',middlename = '$m',lastname ='$l',age = '$age',
grade_level = '$grade',address = '$address',contact_no = '$cno',birthday = '$bdate',sex = '$sex',nationality = '$nation',religion ='$rel'
,date_today ='$datetoday' where student_no = '$stdno'";

$open = 0;

$query1 = mysql_query("insert into tb_messages(sender,reciever,subject,message,date,time,open) values ('admin','$un','$subject','Hello $f $m $l ! 
	your renewal in admission has been approved this is your new assestment code : <b>$assest_code</b><br><Br>And Bring your <b>Report Card</b> in the office for the signature of the Principal. Thank you.','$dates','$time','$open')");

if(mysql_query($query)) {
	
	echo "<script>alert('Update succesfully');window.location='renew_admission.php';</script>";
	
	}
	}

?>