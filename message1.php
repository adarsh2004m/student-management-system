<?php 
//session_start();
//print_r($_SESSION);
//echo $_SESSION['message'];
if(isset($_SESSION['message'])){

if($_SESSION['message']=="0"){
?>

<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Invalid!</strong> Email or password
  </div>
<?php
unset($_SESSION['message']);
}
else{
?>
 <div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Under processs!</strong>Please try later
  </div>


<?php
unset($_SESSION['message']);
}
}

?>