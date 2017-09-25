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
.sidebar {
	height: 100%;
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
				<h1>CMS</h1>
	
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
							  <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user-circle-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div>School Administrators</div>
                            </div>
                        </div>
                    </div>
                    <a href="adminboard.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right fa-2x"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
			
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file-picture-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">                               
                                <div>Facilities/Gallery</div>
                            </div>
                        </div>
                    </div>
                    <a href="adminfacility.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right fa-2x"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
			
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-bullhorn fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">                               
                                <div>Announcements</div>
                            </div>
                        </div>
                    </div>
                    <a href="adminannounce.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right fa-2x"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
			
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-calendar fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">                              
                                <div>Events</div>
                            </div>
                        </div>
                    </div>
                    <a href="adminevents.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right fa-2x"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
			
			 <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-folder-open-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">                               
                                <div>Website File</div>
                            </div>
                        </div>
                    </div>
                    <a href="manage_files.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right fa-2x"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
			
			 <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">                               
                                <div>Users</div>
                            </div>
                        </div>
                    </div>
                    <a href="">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right fa-2x"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>



