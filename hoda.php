<?php
include 'conn.php';
extract($_POST);
if(isset($_POST['y'])){
$st2=2;
$st3=1;
$s2="update tbl_login set status='$st2' where email='$y'";
$s3="update tbl_tregister set status='$st3' where email='$y'";
mysqli_query($con,$s2);
mysqli_query($con,$s3);
}
$st=1;
$st1=2;


$s="update tbl_login set status='$st' where email='$t'";
$s1="update tbl_tregister set status='$st1' where email='$t'";
 if(mysqli_query($con,$s) && mysqli_query($con,$s1)){
header("Location:ahod.php");

}
?>