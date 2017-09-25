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
.sidebar {
	height: 130%;
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
			</div>
			<div class="content">
				<h1>Manage Upcoming Events</h1>
				

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
						<form action = "adminevents.php" method = "POST" enctype="multipart/form-data">
						<p align="left"><a href="cms.php"><input type="button" value="Back" id="back"></a></p>
						<br>
						<center>
						<table border=0  id="table-form" cellspacing="10">
							<tr>
								<td align="right"><label>What : </label></td>
						<td><input type="text" name="ewhat" required></td>
							</tr>

							<tr>
						<td align="right"><label>When (date/time) : </label></td>
						<td><input type="date" name="edate" required>
							<br><select name="hour"   required>
							<option value="">--</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							</select>
							:
							<select name="minute" id="select1" required>
								<option value="">--</option>
								<option value="00">00</option>
							<option value="01">01</option>
							<option value="02">02</option>
							<option value="03">03</option>
							<option value="04">04</option>
							<option value="05">05</option>
							<option value="06">06</option>
							<option value="07">07</option>
							<option value="08">08</option>
							<option value="09">09</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>

							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							<option value="31">31</option>
							<option value="32">32</option>
							<option value="33">33</option>
							<option value="34">34</option>
							<option value="35">35</option>
							<option value="36">36</option>
							<option value="37">37</option>
							<option value="38">38</option>
							<option value="39">39</option>
							<option value="40">40</option>
							<option value="41">41</option>
							<option value="42">42</option>
							<option value="43">43</option>
							<option value="44">44</option>
							<option value="45">45</option>
							<option value="46">46</option>
							<option value="47">47</option>
							<option value="48">48</option>
							<option value="49">49</option>
							<option value="50">50</option>
							<option value="51">51</option>
							<option value="52">52</option>
							<option value="53">53</option>
							<option value="54">54</option>
							<option value="55">55</option>
							<option value="56">56</option>
							<option value="57">57</option>
							<option value="58">58</option>
							<option value="59">59</option>
							<option value="60">60</option>
							</select>

							<select name="med"  id="select1" required>
							<option value="">--</option>
							<option value="AM">AM</option>
							<option value="PM">PM</option>
							
					</td></tr>
							</tr>

							<tr>
						<td align="right"><label>Where : </label></td>
						<td><input type="text" name="ewhere" required></td>
							</tr>
	
							<tr>
						<td align="right"><label>Photo: </label></td>
						<td><input type="file" name="ephoto" id="file" required></td>
							</tr>
							
							<tr>
							<td></td><td><input type="submit" name="submit" value="Submit"></td>
							</tr>
						</table>
				</form>
</center>
<br><br>
<!--event details -->
		<td id="tb1"><label id="up" for="our-popup">Update the Event details</label>
			<span id="1">
		<input type="checkbox" class= "smoosh" id="our-popup">

		<label for="our-popup" class="overlay"></label>

		<div class="overlay-dialogue">

			<div id="boxtop">
				Update the Event details
				<label id="labelclose" for="our-popup">&nbsp;&nbsp;x&nbsp;&nbsp; </label>
			</div>
			
	<form action="updateventdet.php" method="POST">
		<table border=0  id="table-form2" cellspacing="10">
		<br>
				<tr>
					<td>
					&nbsp;&nbsp;&nbsp;&nbsp; Choose Event title(what) :</td><td>	<select name="eeid" required>
							<option value="">
					<?php
			include("connection.php");
	
	
	
		$query = "select * from tb_events";
		
		$run = mysql_query($query);
		
	while ($row=mysql_fetch_array($run)){
		$eid = $row[0];
		$event_what = $row[1];
		$event_when = $row[2];
		$event_where  = $row[3];
		$event_photo  = $row[4];
		
		
		?>
				
					<option value=<?php echo $eid; ?>><?php echo $event_what; ?></option>
										
				<?php } ?>		
					
					</select>					
					</td>
				</tr>
							<tr>
								<td align="right"><label>What : </label></td>
						<td><input type="text" name="ewhat" required></td>
							</tr>

							<tr>
						<td align="right"><label>When(date/time) : </label></td>
						<td><input type="date" name="edate"  required>
							<br><select name="hour"   required>
							<option value="">--</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							</select>
							:
							<select name="minute" id="select1" required>
								<option value="">--</option>
								<option value="00">00</option>
							<option value="01">01</option>
							<option value="02">02</option>
							<option value="03">03</option>
							<option value="04">04</option>
							<option value="05">05</option>
							<option value="06">06</option>
							<option value="07">07</option>
							<option value="08">08</option>
							<option value="09">09</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>

							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							<option value="31">31</option>
							<option value="32">32</option>
							<option value="33">33</option>
							<option value="34">34</option>
							<option value="35">35</option>
							<option value="36">36</option>
							<option value="37">37</option>
							<option value="38">38</option>
							<option value="39">39</option>
							<option value="40">40</option>
							<option value="41">41</option>
							<option value="42">42</option>
							<option value="43">43</option>
							<option value="44">44</option>
							<option value="45">45</option>
							<option value="46">46</option>
							<option value="47">47</option>
							<option value="48">48</option>
							<option value="49">49</option>
							<option value="50">50</option>
							<option value="51">51</option>
							<option value="52">52</option>
							<option value="53">53</option>
							<option value="54">54</option>
							<option value="55">55</option>
							<option value="56">56</option>
							<option value="57">57</option>
							<option value="58">58</option>
							<option value="59">59</option>
							<option value="60">60</option>
							</select>

							<select name="med"  id="select1" required>
							<option value="">--</option>
							<option value="AM">AM</option>
							<option value="PM">PM</option>
							</tr>

							<tr>
						<td align="right"><label>Where : </label></td>
						<td><input type="text" name="ewhere" required></td>
							</tr>

							<tr>
							<td></td><td><input type="submit" name="update" value="Update"></td>
							</tr>
						</table>
		</form>
		</div>
	</span>

	<td id="tb1"><label id="up" for="our-popup1">Update the picture of Event</label>

<span>
		<input type="checkbox" class= "smoosh" id="our-popup1">

		<label for="our-popup1" class="overlay"></label>

		<div class="overlay-dialogue">
			<div id="boxtop">
				Update the picture of Event
				<label id="labelclose" for="our-popup1">&nbsp;&nbsp;x&nbsp;&nbsp;</label>
			</div>
			
		<form action="updatephotoevent.php" method="POST" enctype="multipart/form-data">
			<br><br><table border=0 width="70%"  id="table-form2" cellspacing="10">
				<tr>
					<td align="right">
					Choose Event title(what) :</td><td>	<select name="eeid" required>
							<option value="">
					<?php
			include("connection.php");
	
		$query = "select * from tb_events";	
		$run = mysql_query($query);
		
	while ($row=mysql_fetch_array($run)){
		$eid = $row[0];
		$event_what = $row[1];
		$event_when = $row[2];
		$event_where  = $row[3];
		$event_photo  = $row[4];
		
		
		?>
				
				<option value=<?php echo $eid; ?>><?php echo $event_what; ?></option>
								
				<?php } ?>		
					
					</select>
					</td>
				</tr>

							<tr>

								<td align='right'>Choose Photo : </td> <td><input type="file" name="file" required></td>
							</tr>

							<tr>
							<td></td><td><input type="submit" name="update" value="Update"></td>
							</tr>

						</table>
		</form>

</div>
		</div>
	</span>
				<br><br><?php include('selevent.php');?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<?php 


include('connection.php');


if(isset($_POST['submit'])) {

$e_what = $_POST['ewhat'];
$e_date = $_POST['edate'];
$hour = $_POST['hour'];
$min = $_POST['minute'];
$med = $_POST['med'];
$e_where = $_POST['ewhere'];

 $file = $_FILES['ephoto'];
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


		$query = "insert into tb_events(event_what,event_when,event_where,event_photo) values ('$e_what','$e_date at $hour:$min $med','$e_where','images/$file_name')";

 if(mysql_query($query)) {
	
	echo "<script>alert('Add successfully!...','self');window.location='adminevents.php';</script>";
	
	}
}
}
?>