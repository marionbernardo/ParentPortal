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
#back {
	margin-left: 0px;
	margin-top: 8px;
	height: 2em;
	width: 7em;
	background-color: #2980b9;
	border-radius: 3px;
	color: #fff;
	border: 1px solid gray;
}
#search {
	margin-left: 0px;
	margin-top: 8px;
	height: 3em;
	width: 5em;
	background-color: #008000;
	border-radius: 3px;
	color: #fff;
	border: 1px solid gray;
}
#add {
	margin-left: 0px;
	margin-top: 8px;
	height: 3em;
	width: 5em;
	background-color: #2980b9;
	border-radius: 3px;
	color: #fff;
	border: 1px solid gray;
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

.sidebar {
	height: 120%;
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
	<form action="classinfo.php" method="POST">
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
					<li><a href="grade_menu.php" class="selected"><i class="fa fa-bar-chart" style="font-size:20px; color:white"></i>  Grade Management</a></li>
					<li><a href="cms.php"><i class="fa fa-qrcode" style="font-size:20px; color:white"></i>  CMS</a></li>
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
				<h1>Class Information</h1>
				<div id="box">
					<div class="box-top">
				 <ol class="breadcrumb">
				<li><a href ="adminpanel.php">Dashboard</a></li>   
				<li><a href ="manage_admins.php">Admin Management</a></li>
				<li><a href ="mstudents.php">Student Management</a></li>
				<li><a href ="manage_student_balance.php">Lendger Management</a></li>
				<li class="active">Grade Management</a></li>
				</ol>	
					</div>

					<div id="pics">
					<div class="box-panel">
					<p align="left"><a href="grade_menu.php"><input type="button" value="Back" id="back"></a></p>
										
						<p align="left"><input type="text" name="search" placeholder ="Search Class Info" id="ss">
						<input type="submit" name="submit"  value="Search" id="search" required> <a href="add_class.php"><input type="button" value="Add Class" id="add"></a><br>
						<br><br></p>

						 <div class="table-responsive">  	
						  <table class="table">
						<thead>
					                <?php if(isset($_GET['r'])): ?>
                    <?php
                        $r = $_GET['r'];
                        if($r=='added'){
                            $classs='success';   
                        }else if($r=='updated'){
                            $classs='info';   
                        }else if($r=='deleted'){
                            $classs='danger';   
                        }else{
                            $classs='hide';
                        }
                    ?>
                    <div class="alert alert-<?php echo $classs?> <?php echo $classs; ?>">
                        <strong>Class info successfully <?php echo $r; ?>!</strong>    
                    </div>
                <?php endif; ?>
						<tr>
				
                                <th>Subject</th>
                                <th>Class Name</th>
                                <th>Grading Period</th>
                                <th>S.Y.</th>
                                <th>Teacher</th>
                                <th>Student</th>
                                <th>Action</th>											
						</tr>
						</thead>
		
			<?php
			include("connection.php");
	
				if(isset($_POST['submit'])) {
							$search = $_POST['search'];
							$query = "select * from class where grade_level like '%$search%'  or section like '%$search%' or grading_period like '%$search%' or subject like '%$search%' order by grade_level,section,grading_period asc";
							
							
						}
						else
				
							$query = "select * from class";
							
							$run = mysql_query($query);
											if(mysql_num_rows($run) == 0) {
												echo "No Results Found!";
											}
							
							while ($row=mysql_fetch_assoc($run)){
				
		
		
						?>
						<tbody>
						<tr>						
                                    <td><?php echo $row['subject'];?></td>
                                    <td><?php echo $row['grade_level'].' - '.$row['section'];?></td>
                                    <td><?php echo $row['grading'];?></td>                                
                                    <td><?php echo $row['sy'];?></td>                                
                                    <td><a href="classteacher.php?classid=<?php echo $row['id'];?>&teacherid=<?php echo $row['teacher'];?>" title="update teacher">View</a></td>
                                    <td><a href="classstudent.php?classid=<?php echo $row['id'];?>" title="update students" title="add student">View</a></td>
                                    <td>                                                                               
                                        <a href="edit.php?type=class&id=<?php echo $row['id']?>" title="update class"><i class="fa fa-edit fa-2x text-primary"></i></a>
                                        <a href="data/data_model.php?q=delete&table=class&id=<?php echo $row['id']?>" title="delete class"><i class="fa fa-times-circle fa-2x text-danger confirmation"></i></a></td>
						</tr>
						</tbody>
						
							<?php } ?>
							
						</table>
					</div>	
				</div>
			</div>
		</div>
</form>
</div>
</body>
</html>