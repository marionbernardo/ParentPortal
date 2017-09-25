<?php

include('connection.php');

$anid = $_GET['anid'];
$query = "delete from tb_announcements where anid='$anid'";

if(mysql_query($query)){
echo "<script>window.open('adminannounce.php?deleted=announcement has been deleted!','_self')</script>";
}
?>