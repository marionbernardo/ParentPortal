
<?php

	include("adminevents.php");
	mysql_connect('localhost','root','');
	mysql_select_db('db_bcis');
	
	
	
	if(isset($_POST['update'])){
$id = $_POST['eeid'];
$e_what = $_POST['ewhat'];
$e_date = $_POST['edate'];
$hour = $_POST['hour'];
$min = $_POST['minute'];
$med = $_POST['med'];
$e_where = $_POST['ewhere'];





		$query = "UPDATE tb_events SET event_what='$e_what',event_when='$e_date at $hour:$min $med',event_where = '$e_where'  WHERE eid=$id";

		
			if(mysql_query($query)) {
	
	echo "<script>alert('Update succesfully');window.location='adminevents.php';</script>";
	
	}
	}
	

	 
	
	
	
?>
