<?php

include('connection.php');
$fid = $_GET['fid'];
$query = "delete from tb_facilities where fid='$fid'";

if(mysql_query($query)){
echo "<script>window.open('adminfacility.php?deleted=facility has been deleted!','_self')</script>";
}
?>