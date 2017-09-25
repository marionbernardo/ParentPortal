
<?php

	include("adminannounce.php");
	mysql_connect('localhost','root','');
	mysql_select_db('thesis');
	
	
	
	if(isset($_POST['update'])){

	$id = $_POST['anni'];
$what = $_POST['what'];
$date = $_POST['whendate'];
$hour = $_POST['hour'];
$minute = $_POST['minute'];
$med = $_POST['med'];
$where = $_POST['where'];



		$query = "UPDATE tb_announcements SET ann_what='$what',ann_when='$date at $hour:$minute $med',ann_where = '$where'  WHERE anid=$id";

		
			if(mysql_query($query)) {
	
	echo "<script>alert('Update succesfully');window.location='adminannounce.php';</script>";
	
	}
	}
	

	 
	
	
	
?>
