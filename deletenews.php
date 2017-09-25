<?php

include('connection.php');


$nid = $_GET['nid'];


$query = "delete from tb_news where nid='$nid'";

if(mysql_query($query)){
echo "<script>window.open('adminnews.php?deleted=news has been deleted!','_self')</script>";
}
?>