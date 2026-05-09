<?php
session_start();
include 'conn.php';
extract($_POST);
$s="select * from tbl_login where email='$email' and password='$password'";
 $q=mysqli_query($con,$s);
if(mysqli_num_rows($q)>0){
	$r=mysqli_fetch_array($q);
	if($r['status']=="0"){
					$_SESSION['user']=$email;
					header("Location:admin.php");
	
	
	}
	else if($r['status']=="2"){
	$_SESSION['user']=$email;
	header("Location:teacher.php");
	
	}
	else if($r['status']=="1"){
	$_SESSION['user']=$email;
	header("Location:hod.php");
	
	}
	else if($r['status']=="3"){
	$_SESSION['user']=$email;
	header("Location:student.php");
	}
	else if($r['status']=="4"){
	$_SESSION['parent_email']=$email;
	header("Location:parent.php");
	}

	else{
	$_SESSION['message']="1";
	header("Location:index.php");
	
	}

}
else{
$_SESSION['message']="0";

	header("Location:index.php");

}

?>