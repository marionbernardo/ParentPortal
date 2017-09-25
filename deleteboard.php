<?php

include('connection.php');

$aid = $_GET['aid'];
$query = "delete from tb_administrators where aid='$aid'";

if(mysql_query($query)){
echo "<script>window.open('adminboard.php?deleted=member has been deleted!','_self')</script>";
}
?>