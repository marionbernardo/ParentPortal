<?php
include("adminboard.php");
	mysql_connect('localhost','root','');
	mysql_select_db('thesis');
	
	
if(isset($_POST['update'])){
$board = $_POST['board'];
$fname = $_POST['bfname'];
$mname = $_POST['bmname'];
$lname = $_POST['blname'];
$position = $_POST['bposition'];


		$query = "UPDATE tb_administrators SET firstname='$fname',middlename='$mname',lastname='$lname',position='$position'  WHERE aid='$board'";

		
			if(mysql_query($query)) {
	
	echo "<script>window.location='adminboard.php'; alert('Update successfully');</script>";
	
	}
	}
?>