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
				Admin Panel
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
.sidebar {
	height: 150%;
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
		<div id="header">
			<div class="logo"><i class="fa fa-user-circle" style="font-size:24px"> Welcome : <span id="admin"><?php echo $_SESSION['adminun']; ?></span></i>
			</div>
		</div>
		<div id="container">
			<div class="sidebar">
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
				<h1>File Management</h1>
				

				<div id="box">
					<div class="box-top">
					<ol class="breadcrumb">
				<li><a href ="adminpanel.php">Dashboard</a></li>   
				<li><a href ="manage_admins.php">Admin Management</a></li>
				<li><a href ="mstudents.php">Student Management</a></li>
				<li><a href ="manage_student_balance.php">Lendger Management</a></li>
				<li><a href ="grade_menu.php">Grade Management</a></li>
				<li class="active">CMS</a></li>
					</div>
					
					<div id="pics">
					<div class="box-panel" style="font-size:12pt;">
						<form action="manage_files.php" method="POST" enctype="multipart/form-data">	
						<p align="left"><a href="cms.php"><input type="button" value="Back" id="back"></a></p>
						<br>
						<h3 align="center">Manage Slide Show Pictures</h3><br><br>
						<center>	Slide show Picture 1: <input type="file" name="pic1"> 
							<input type="submit" name="submit" id="upload" value="upload">
							</center>
						</form>
						<br>
						<br>
						<form action="manage_files.php" method="POST" enctype="multipart/form-data">
						<center>	Slide show Picture 2: <input type="file" name="pic2"> 
							<input type="submit" name="submit1" id="upload" value="upload">
							</center>
						</form>
						<br>
						<br>
						<form action="manage_files.php" method="POST" enctype="multipart/form-data">
						<center>	Slide show Picture 3: <input type="file" name="pic3"> 
							<input type="submit" name="submit2" id="upload" value="upload">
							</center>
						</form>
		


						<?php
						include("connection.php");
					
					
					
						$query = "select * from tb_websitefile";
						
						$run = mysql_query($query);
						
						while ($row=mysql_fetch_assoc($run)){
							echo '<br><br> <div class="table-responsive"> ';	
						 echo' <table class="table">';
						  echo'<thead>';
							echo '<tr>';
							echo '<th>Slide Show First Picture</th>';
							echo '<th>Slide Show Second Picture</th>';
							echo '<th>Slide Show Third Picture</th>';
							echo '<tr>';
							echo '<td>';
							echo '<img src="'.$row['image_one'].'" width="300px" height="200px">';
							echo '</td>';
							echo '<td>';
							echo '<img src="'.$row['image_two'].'" width="300px" height="200px">';
							echo '</td>';
							echo '<td>';
							echo '<img src="'.$row['image_three'].'" width="300px" height="200px">';
							echo '</td>';
							echo '</tr>';
							
							echo '</table>';
						}
		
							?>
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
 	$file = $_FILES['pic1'];
	$file_name = $file['name'];
	$file_type = $file['type'];
	$file_size = $file['size'];
	$file_path = $file['tmp_name'];

	if($file_type == "video/3gp"||$file_type == "video/mp4"||$file_type == "video/avi"||$file_type == "image/gif"||$file_type == "text/css"||$file_type == "application/octet-stream"||$file_type == "text/html" ||$file_type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") 
		{
			die ("<script>alert('Thats not an image');</script>");
		}
		else 
		{

	if($file_name!="" && ($file_type="image/jpeg"||$file_type="image/png"||$file_type="image/gif")&& $file_size<=9048567)
	if(move_uploaded_file ($file_path,'images/'.$file_name))


		$query = "update tb_websitefile set image_one = 'images/$file_name' where wpid=1";

 if(mysql_query($query)) {
	
	echo "<script>alert('Update successfully!...','self');window.location = 'manage_files.php';</script>";
	
	}
}
}


if(isset($_POST['submit1'])) {
 	$file = $_FILES['pic2'];
	$file_name = $file['name'];
	$file_type = $file['type'];
	$file_size = $file['size'];
	$file_path = $file['tmp_name'];

	if($file_type == "video/3gp"||$file_type == "video/mp4"||$file_type == "video/avi"||$file_type == "image/gif"||$file_type == "text/css"||$file_type == "application/octet-stream"||$file_type == "text/html" ||$file_type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") 
		{
			die ("<script>alert('Thats not an image');</script>");
		}
		else 
		{

	if($file_name!="" && ($file_type="image/jpeg"||$file_type="image/png"||$file_type="image/gif")&& $file_size<=9048567)
	if(move_uploaded_file ($file_path,'images/'.$file_name))


		$query = "update tb_websitefile set image_two = 'images/$file_name' where wpid=1";

 if(mysql_query($query)) {
	
	echo "<script>alert('Update successfully!...','self'); window.location = 'manage_files.php';</script>";
	
	}
}
}

if(isset($_POST['submit2'])) {
	
	
$file = $_FILES['pic3'];
$file_name = $file['name'];
$file_type = $file['type'];
$file_size = $file['size'];
$file_path = $file['tmp_name'];

	if($file_type == "video/3gp"||$file_type == "video/mp4"||$file_type == "video/avi"||$file_type == "image/gif"||$file_type == "text/css"||$file_type == "application/octet-stream"||$file_type == "text/html" ||$file_type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") 
		{
			die ("<script>alert('Thats not an image');</script>");
		}
		else 
		{

	if($file_name!="" && ($file_type="image/jpeg"||$file_type="image/png"||$file_type="image/gif")&& $file_size<=9048567)
	if(move_uploaded_file ($file_path,'images/'.$file_name))


		$query = "update tb_websitefile set image_three = 'images/$file_name' where wpid=1";

 if(mysql_query($query)) {
	
	echo "<script>alert('Update successfully!...','self'); window.location = 'manage_files.php';</script>";
	
	}
}
}
?>