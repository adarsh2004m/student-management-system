<?php
session_start();
$ee=$_SESSION['user'];
include 'conn.php';
$d=$_GET['d'];
$s1=$_GET['s'];
$st=1;
$ss="select * from tbl_att where dpid='$d' and sem='$s1' and temail='$ee'";
$q2=mysqli_query($con,$ss);
if(mysqli_num_rows($q2)>0){
$q3=mysqli_query($con,$ss);
$r3=mysqli_fetch_array($q3);
?>  
<div  align="justify"><input type="text"  placeholder="total days" name="t" value="<?php echo $r3['total'];?>" class="form-control"  required style="width:20%" align="right">

<input type="text" name="cs" value="<?php echo $s1; ?>" style="display:none">
</div>
<tbody><tr><th>Name</th><th>Photo</th><th>Present Days</th></tr>

<?php
while($r2=mysqli_fetch_array($q2)){
$ee1=$r2['email'];
 $s="select * from tbl_sregister where dpid='$d' and csem='$s1' and status='$st' and email='$ee1'";
$q=mysqli_query($con,$s);
if(mysqli_num_rows($q)>0){
?>

<?php
while($r=mysqli_fetch_array($q)){

?>
<tr><th><?php  echo $r['fullname'];?><input type="text" name="e[]" value="<?php echo $r['email']; ?>" style="display:none">



</th><th><img src="<?php echo $r['image']; ?>"  class="img-size-32"/></th><th><input type="text" class="form-control" 
 value="<?php echo $r2['present']; ?>" name="p[]" style="width:20%" required></th></tr>
<?php
}
?><?php 

}else{ echo "no data";}}
?> </tbody><tfoot align="right"><button type="submit" value="Save" name="save" class="btn btn-success" >Update</button></tfoot><?php

}else{ echo "no data";}
 ?>