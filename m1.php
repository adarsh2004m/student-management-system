<?php 
//session_start();
//print_r($_SESSION);
//echo $_SESSION['message'];
if(isset($_SESSION['m1'])){

if($_SESSION['m1']=="0"){
?>

<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Added Successfully
  </div>
<?php
unset($_SESSION['m1']);
}
else if($_SESSION['m1']=="1"){
?>
 <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Error!</strong>Something Went Wrong Please try again
  </div>


<?php
unset($_SESSION['m1']);
}
else if($_SESSION['m1']=="2"){
?>
 <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Error!</strong>Already Exist
  </div>


<?php
unset($_SESSION['m1']);
}
else if($_SESSION['m1']=="3"){
?>

<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Deleted Successfully
  </div>
<?php
unset($_SESSION['m1']);

}
else if($_SESSION['m1']=="4"){
?>
 <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong> File Error!</strong>Sorry, only JPG, JPEG, PNG & GIF files are allowed.
  </div>


<?php
unset($_SESSION['m1']);
}
else if($_SESSION['m1']=="5"){
?>
 <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong> Update!</strong>Updated Successfully.
  </div>


<?php
unset($_SESSION['m1']);
}
else if($_SESSION['m1']=="6"){
?>
 <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong> Approve!</strong>Approved Successfully.
  </div>


<?php
unset($_SESSION['m1']);
}
}

?>