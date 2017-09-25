
<?php

	include("adminnews.php");
	mysql_connect('localhost','root','');
	mysql_select_db('db_bcis');
	
	
	
	if(isset($_POST['update'])){

	$id = $_POST['nid'];

$title = $_POST['ntitle'];
$date = $_POST['ndate'];
$hour = $_POST['hour'];
$min = $_POST['minute'];
$med = $_POST['med'];
$reporter = $_POST['nreporter'];
$content = $_POST['ncont'];


		$query = "UPDATE tb_news SET news_title='$title',news_date_time='$date / $hour:$min $med',news_reporter = '$reporter',news_content = '$content'  WHERE nid=$id";

		
			if(mysql_query($query)) {
	
	echo "<script>alert('Update succesfully');window.location='adminnews.php';</script>";
	
	}
	}
	

	 
	
	
	
?>
