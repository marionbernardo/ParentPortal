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
#back {
	margin-left: 0px;
	margin-top: 8px;
	height: 2em;
	width: 5em;
	background-color: #2980b9;
	border-radius: 3px;
	color: #fff;
	border: 1px solid gray;
	font-size: 15px;
}
#table-form {
	height: auto;
	padding: 0px;
	margin-left: 100px;
}
.sidebar {
	height: 190%;
}
input[type=submit] {
	margin-left: 0px;
	margin-top: 8px;
	height: 2em;
	width: 4em;
	background-color: #2980b9;
	border-radius: 3px;
	color: #fff;
	border: 1px solid gray;
}
input[type=text] {
	width: 15em;
	height:2em;
	font-size: 0.9em;
	border: 1px solid #bdc3c7;
	border-radius: 3px;
}
#del {
	margin-top: 8px;
	height: 2em;
	width: 5em;
	background-color: #c0392b;
	border-radius: 3px;
	color: #fff;
	border: 1px solid #ecf0f1;
	border-radius: 5px;
	font-weight: bold;
}
#del:hover{
	opacity: 0.9;
	cursor: pointer;
}
label.overlay {
 position: fixed;
 display: none;
 height: 100%;
 width: 100%;
 left: 0;
 top: 0;
}
input[type=checkbox].smoosh:checked ~ label.overlay {
 display: block;
 z-index: 500;
}
div.overlay-dialogue {
 position: fixed;
 display: none;
 width: 60%;
 left: 300px;
 right: 0;
 top: 15%;
 bottom: 15%;
 border-radius: 2px;
 background: whitesmoke;
}
input[type=checkbox].smoosh:checked ~ div.overlay-dialogue {
 display: block;
 z-index: 505;
}
/* eye candy */

.smoosh {
 display: none;
 line-height: 0;
 margin: 0 0 0 0;
 padding: 0 0 0 0;
 color: transparent;
 background: transparent;
 border: none;
 outline: none;
 height: 0;
 width: 0;
}

div.overlay-dialogue {
 
 overflow-y: auto;
 animation: START 0.3s ease-in-out;
}
@keyframes START {
 0% {transform: rotateY(55deg); opacity: 0;}
 100% {transform: rotateY(0deg); opacity: 1;}
}

label.overlay {
 background-color: rgba(0,0,0,.5);
 text-align: center;
 color: rgba(200, 200, 200, 0.5);
 line-height: 120%;
}

label.overlay:active {
 line-height: 130%;
}
label.overlay:before {
 content: 'Tap here to dismiss';
}

label:active {
 line-height: 90%;
 color: orange;
}

#up {
	padding-top: 3px;
	display: block;
	border: 1px solid #ecf0f1;
	border-radius: 5px;
	width:20em;
	height: 2em;
	float: right;
	background-color: #2ecc71;
	color:white;
	margin-left:6px;
	
}
#up:hover {
	opacity: 0.9;
	cursor: pointer;
}
#labelclose {
	margin-right: 4px;
	float:right;
	background-color: #c0392b;
	border-radius: 3px;
}
#labelclose:hover {
	cursor: pointer;
	opacity:0.9;
}
#boxtop {
	width: 100%;
	height: 30px;
	color:#fff;
	text-shadow: 0px 0px 1px #ddd;
	background-color: #2980b9;
	text-align: left;
	padding-left: 10px;
	padding-top: 5px;
	font-weight: 300;
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


	<body>
		<form action = "adminboard.php" method="POST" enctype="multipart/form-data">
		<div id="header">
			<div class="logo"><i class="fa fa-user-circle" style="font-size:24px"> Welcome : <span id="admin"><?php echo $_SESSION['adminun']; ?></span></i>
				
			</div>
		</div>
		<div id="container">
			<div class="sidebar">
				<ul id="nav">
					<ul id="nav">
					<li><a href="adminpanel.php"><i class="fa fa-dashboard" style="font-size:20px; color:white"></i>  Dashboard</a></li>
					<li><a href="manage_admins.php"><i class="fa fa-user" style="font-size:20px; color:white"></i>  Admin Management</a></li>
					<li><a href="mstudents.php"><i class="fa fa-group" style="font-size:20px; color:white"></i>  Student Management</a></li>
					<li><a href="manage_student_balance.php"><i class="fa fa-google-wallet" style="font-size:20px; color:white"></i>   Lendger Management</a></li>
					<li><a href="grade_menu.php"><i class="fa fa-bar-chart" style="font-size:20px; color:white"></i>  Grade Management</a></li>
					<li><a href="cms.php"class="selected"><i class="fa fa-qrcode" style="font-size:20px; color:white"></i>  CMS</a></li>
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
				<h1>School Administrators</h1>
				

				<div id="box">
					<div class="box-top">
					<ol class="breadcrumb">
				<li><a href ="adminpanel.php">Dashboard</a></li>   
				<li><a href ="manage_admins.php">Admin Management</a></li>
				<li><a href ="mstudents.php">Student Management</a></li>
				<li><a href ="manage_student_balance.php">Lendger Management</a></li>
				<li><a href ="grade_menu.php">Grade Management</a></li>
				<li class="active">CMS</a></li>
				</ol>	
					</div>
					
					<div id="pics">
					<div class="box-panel">
					<p align="left"><a href="cms.php"><input type="button" value="Back" id="back"></a></p>
					<br>

					<center>
						<table border=0  id="table-form" cellspacing="10">
							<tr>
								<td><label>First Name: </label></td>
								
								<td><input type="text" name="bfname" required></td>
							</tr>

							<tr>
						<td><label>Middle Name: </label></td>
						<td><input type="text" name="bmname" required></td>
							</tr>

							<tr>
						<td><label>Last Name: </label></td>
						<td><input type="text" name="blname" required></td>
							</tr>

							<tr>
						<td><label>Position: </label></td>
						<td><input type="text" name="bposition" required></td>
							</tr>

							<tr>
							<td></td><td><input type="submit" name="submit" value="Submit"></td>
							</tr>
						</table>
						</form>
						</center>
						<td id="tb1"><label id="up" for="our-popup">Update details of the administrators</label>
			
<!--DETAILS OF THE ADMINISTRATORS-->

	<span id="1">
		<input type="checkbox" class= "smoosh" id="our-popup">

		<label for="our-popup" class="overlay"></label>

		<div class="overlay-dialogue">

			<div id="boxtop">
				Update the details of the administrator
				<label id="labelclose" for="our-popup">&nbsp;&nbsp;x&nbsp;&nbsp; </label>
			</div>
			
		<form action="updateboarddetails.php" method="POST">
		<table border=0  id="table-form2" cellspacing="10">
		<br>
				<tr>
					<td>
					&nbsp;&nbsp;&nbsp;&nbsp;
					Choose the position that you want to update:</td><td><select position="board" required>
							<option value="">
							<?php
	
	mysql_connect("localhost","root","");
	mysql_select_db("thesis");
	
		$query = "select * from tb_administrators";
		$run = mysql_query($query);
		
	while ($row=mysql_fetch_array($run)){
		$aid = $row[0];
		$firstname = $row[1];
		$middlename = $row[2];
		$lastname = $row[3];
		$position = $row[4];

		
		?>
			<option value=<?php echo $aid; ?>><?php echo $position; ?></option>
								
			<?php } ?>		
			</select>
					</td>
				</tr>			
							<tr>
								<td align="right"><label>First Name:</label></td>
								<td><input type="text" name="bfname" required></td>
							</tr>
							<tr>
							<td align="right"><label>Middle Name: </label></td>
							<td><input type="text" name="bmname" required></td>
							</tr>
							<tr>
							<td align="right"><label>Last Name: </label></td>
							<td><input type="text" name="blname" required></td>
							</tr>				
							<tr>
							<td align="right"><label>Position: </label></td>
							<td><input type="text" name="bposition" required></td>
							</tr>
							<tr>
							<td></td><td><input type="submit" name="update" value="Update"></td>
							</tr>
						</table>
		</form>

		</div>
	</span>
						<br><br>
						<p align="center"><h2>School Administrators</h2></p><br>
		<div id="over">
	<div class="table-responsive">  	
						  <table class="table">
						<thead>
		<tr>
		
			<th>First Name</th>
			<th>Middle Name</th>
			<th>Last Name</th>
			<th>Position</th>
			<th>Delete</th>
			</thead>
		</tr>
		
			<?php
	
	mysql_connect("localhost","root","");
	mysql_select_db("thesis");
	
	
	
		$query = "select * from tb_administrators";
		
		$run = mysql_query($query);
		
	while ($row=mysql_fetch_array($run)){
		$aid = $row[0];
		$firstname = $row[1];
		$middlename = $row[2];
		$lastname = $row[3];
		$position = $row[4];
	
		
		?>
		<tbody>
		<tr>
		
		<td><?php echo $firstname; ?></td>
		<td><?php echo $middlename; ?></td>
		<td><?php echo $lastname; ?></td>
		<td><?php echo $position; ?></td>	
		<td><a href='deleteboard.php?aid=<?php echo $aid;?>' onclick="return confirm('Are you sure you want to delete?')"><input type="button" id="del" value="Delete"></a></td>
		</tr>
		</tbody>
			<?php } ?>
			
	</table>
</div>
</div>			
			</div>
				</div>
				</div>
			</div>
		</div>
		
	</body>
</html>
<?php 
	
include("connection.php");


if(isset($_POST['submit'])) {
$fname = $_POST['bfname'];
$mname = $_POST['bmname'];
$lname = $_POST['blname'];
$position = $_POST['bposition'];


	$query = "insert into tb_administrators(firstname,middlename,lastname,position) values ('$fname','$mname','$lname','$position')";

	if(mysql_query($query)) {
	
	echo "<script>alert('Add successfully!!','self');window.location='adminboard.php';</script>";
	
	}
}

?>