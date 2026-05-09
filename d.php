<?php
include 'conn.php';
$e=$_GET['e'];
$s="delete from tbl_login where email='$e'";
$s1="delete from tbl_tregister where email='$e'";
if(mysqli_query($con,$s) && mysqli_query($con,$s1)){
header("Location:vteach.php");

}
?>