<?php 
$e=$_GET['e'];
$e1=$_GET['e1'];
include 'conn.php';
$s="select * from tbl_subject where dpid='$e' and semester='$e1'";
$q=mysqli_query($con,$s);
?><option value="">select</option><?php
while($r=mysqli_fetch_array($q)){

?>
<option value="<?php echo $r['subid']; ?>"><?php echo $r['subname']; ?></option>

<?php } ?>

