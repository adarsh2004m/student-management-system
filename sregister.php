<?php
session_start();
include 'conn.php';

$target_dir = "uploads1/";
$target_file = $target_dir . basename($_FILES["file1"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit1"])) {
    $check = getimagesize($_FILES["file1"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
      //  echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file1"]["size"] > 500000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif"  && $imageFileType != "jfif") {
  // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $_SESSION['m1']="4";
	header("Location:index.php");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
$_SESSION['m1']="1";
	header("Location:index.php");
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file)) {
	extract($_POST);
	$st=0;
	$st1=3;
	$s="insert into tbl_sregister values('$email','$fname','$mob','$dob','$hname','$street','$r1','$d','$yad','$csem','$target_file','$st')";
	
	$s2="insert into tbl_login values('$email','$p2','$st1')";
	if(mysqli_query($con,$s) &&  mysqli_query($con,$s2)){
	
	$_SESSION['m1']="0";
	header("Location:index.php");
	
	}
	else{
	$_SESSION['m1']="1";
	header("Location:index.php");
	
	}
	
	
       // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
	$_SESSION['m1']="1";
	header("Location:index.php");
        //echo "Sorry, there was an error uploading your file.";
    }
}
?>