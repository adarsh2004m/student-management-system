<?php 
session_start();
include 'conn.php';
extract($_POST);
$st=1;
if(isset($_POST['approve'])){
$ss="update tbl_internal set status='$st' where temail='$te' and subid='$sub1'";
if(mysqli_query($con,$ss)){
$_SESSION['m1']="6";
header("Location:verifyi.php");

}
else{
$_SESSION['m1']="1";
header("Location:verifyi.php");


}}
?>