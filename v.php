<?php 
include 'conn.php';
$e=$_GET['e'];
$st=2;
$st1=1;
$s="update tbl_login set status='$st' where email='$e'";
$s1="update tbl_tregister set status='$st1' where email='$e'";
if(mysqli_query($con,$s) && mysqli_query($con,$s1)){
header("Location:vteach.php");

}

?>