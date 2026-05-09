<?php 
session_start();
include 'conn.php';
extract($_POST);
$s="insert into tbl_depart (department) values('$depart')";
if(mysqli_query($con,$s)){
 $_SESSION['m1']="0";
 header("Location:dadd.php");
}
else{
$_SESSION['m1']="1";
 header("Location:dadd.php");

}

?>