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
		<link rel="icon" type="image" href="logo.jpg">
		<link rel="stylesheet" type="text/css" href="admincss/admin.css">	
	
	</head>




	<body>
		<div id="header">
			<div class="logo"><a href="#">Welcome : <span id="admin"><?php echo $_SESSION['adminun']; ?></span></a>
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
					<li><a href="adminnews.php"  class="selected">Manage News</a></li>
					<li><a href="adminfacility.php" >Manage Facilities</a></li>
					<li><a href="manage_files.php" >Manage Website File</a></li>
				</ul>

			</div>
			<div class="content">
				<h1>Manage News</h1>
				

				<div id="box">
					<div class="box-top">
					
					<br> <br>
					</div>

					<div class="box-panel">
						<form action="adminnews.php" method="POST" enctype="multipart/form-data">
						<table border=0  id="table-form" cellspacing="10">
							<tr>
								<td align="right"><label>News Title : </label></td>
						<td><input type="text" name="ntitle" required></td>
							</tr>

							<tr>
						<td align="right"><label>Date : </label></td>
						<td><input type="date" name="ndate" required></td>
					</tr>
					<tr>
					<td align="right"><label>Time : </label></td>
					<td>
							<select name="hour"   required>
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
						<td align="right"><label>Reporter : </label></td>
						<td><input type="text" name="nreporter" required></td>
							</tr>

							<tr>
						<td align="right"><label>News content: </label></td>
						<td><textarea rows="5" cols="40" name="ncont" required></textarea></td>
							</tr>
							
							<tr>
						<td align="right"><label>Photo: </label></td>
						<td><input type="file" name="newsphoto" id="file" required></td>
							</tr>
							
							

							<tr>
							<td></td><td><input type="submit" name="submit" value="Submit"></td>
							</tr>
						</table>
					</form>

				<td id="tb1"><label id="up" for="our-popup">Update the News Details</label>
			<span id="1">
		<input type="checkbox" class= "smoosh" id="our-popup">

		<label for="our-popup" class="overlay"></label>

		<div class="overlay-dialogue">

			<div id="boxtop">
				Update the News Details
				<label id="labelclose" for="our-popup">&nbsp;&nbsp;x&nbsp;&nbsp; </label>
			</div>
			
	<form action="updatenewsdet.php" method="POST">
		<table border=0  id="table-form2" cellspacing="10">
				<tr>
					<td>
					Choose News title :</td><td>	<select name="nid" required>
							<option value="">
					<?php
		include("connection.php");
	
	
	
		$query = "select * from tb_news";
		
		$run = mysql_query($query);
		
	while ($row=mysql_fetch_array($run)){
		$nid = $row[0];
		$news_title = $row[1];
		$news_date_time = $row[2];
		$news_reporter = $row[3];
		$news_content = $row[4];
		$news_photo = $row[5];
		
		
		?>
		
		
							
						
							<option value=<?php echo $nid; ?>><?php echo $news_title; ?></option>
						
						
				<?php } ?>		
					
					</select>
					
					</td>
				</tR>	<td align="right"><label>News Title : </label></td>
						<td><input type="text" name="ntitle" required></td>
							<tr>
								<td align="right"><label>Date : </label></td>
						<td><input type="date" name="ndate" required></td>
					</tr>
					<tr>
					<td align="right"><label>Time : </label></td>
					<td>
							<select name="hour"   required>
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
						<td align="right"><label>Reporter : </label></td>
						<td><input type="text" name="nreporter" required></td>
							</tr>

							<tr>
						<td align="right"><label>News content: </label></td>
						<td><textarea rows="5" cols="40" name="ncont" required></textarea></td>
							</tr>
							
					
						
						
							

							<tr>
							<td></td><td><input type="submit" name="update" value="Update"></td>
							</tr>
						</table>
		</form>

		


		</div>
	</span>





	<td id="tb1"><label id="up" for="our-popup1">Update the picture of News</label>

<span>
		<input type="checkbox" class= "smoosh" id="our-popup1">

		<label for="our-popup1" class="overlay"></label>

		<div class="overlay-dialogue">
			<div id="boxtop">
				Update the picture of News
				<label id="labelclose" for="our-popup1">&nbsp;&nbsp;x&nbsp;&nbsp;</label>
			</div>
			
		


		<form action="updatephotonews.php" method="POST" enctype="multipart/form-data">
			<BR><BR><BR><BR><table border=0 width="70%"  id="table-form2" cellspacing="10">
				<tr>

					<td align="right">
					Choose Event title(what) :</td><td>	<select name="nid" required>
							<option value="">
					<?php
			include("connection.php");
	
	
	
		$query = "select * from tb_news";
		
		$run = mysql_query($query);
		
	while ($row=mysql_fetch_array($run)){
		$nid = $row[0];
		$news_title = $row[1];
		$news_date_time = $row[2];
		$news_reporter = $row[3];
		$news_content = $row[4];
		$news_photo = $row[5];
		
		
		?>
		
		
							
						
							<option value=<?php echo $nid; ?>><?php echo $news_title; ?></option>
						
						
				<?php } ?>		
					</select>
					
					</td>
				</tR>

							<tr>

								<td align='right'>Choose Photo : </td> <td><input type="file" name="file" required></td>
							</tr>

							<tr>
							<td></td><td><input type="submit" name="update" value="Update"></td>
							</tr>

			
						</table>
		</form>


		</div>
	</span>
					<br><BR><?php include("selnews.php");?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

<?php 

include("connection.php");


if(isset($_POST['submit'])) {


$title = $_POST['ntitle'];
$date = $_POST['ndate'];
$hour = $_POST['hour'];
$min = $_POST['minute'];
$med = $_POST['med'];
$reporter = $_POST['nreporter'];
$content = $_POST['ncont'];





 	$file = $_FILES['newsphoto'];
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


		$query = "insert into tb_news(news_title,news_date_time,news_reporter,news_content,news_photo) values ('$title','$date / $hour:$min $med','$reporter','$content','images/$file_name')";

 if(mysql_query($query)) {
	
	echo "<script>alert('Add successfully!...','self');window.location='adminnews.php';</script>";
	
	}
	


}


}


?>