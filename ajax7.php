<?php
session_start();
$ee=$_SESSION['user'];
include 'conn.php';
$d=$_GET['d'];
$s1=$_GET['s'];
$sid=$_GET['sid'];
$st=1;
$ss="select * from tbl_internal where subid='$sid' and temail='$ee'";
$q1=mysqli_query($con,$ss);
$q2=mysqli_query($con,$ss);
if(mysqli_num_rows($q1)>0){
$r2=mysqli_fetch_array($q2);
?>
<div  align="justify"><input type="text"  placeholder="Out Of" name="t"  value="<?php echo $r2['total']; ?>"class="form-control"  required style="width:20%" align="right">

<input type="text" name="cs1" value="<?php echo $s1; ?>" style="display:none">
</div>
<tbody><tr><th>Name</th><th>Photo</th><th>Internal Mark</th></tr>
<?php 
 while($r1=mysqli_fetch_array($q1)){
 $em=$r1['email'];
$s="select * from tbl_sregister where dpid='$d' and csem='$s1' and status='$st' and email='$em'";
$q=mysqli_query($con,$s);
if(mysqli_num_rows($q)>0){
?>

<?php
while($r=mysqli_fetch_array($q)){

?>
<tr><th><?php  echo $r['fullname'];?><input type="text" name="e[]" value="<?php echo $r['email']; ?>" style="display:none">



</th><th><img src="<?php echo $r['image']; ?>"  class="img-size-32"/></th><th><input type="text" class="form-control" value="<?php echo $r1['mark']; ?>" name="p[]" style="width:20%" required></th></tr>
<?php
}}else{ echo "no data";}
}
?></tbody><tfoot align="right"><button type="submit" value="Save" name="save" class="btn btn-success" >Update</button></tfoot><?php 
}else{ echo "no data";}

 ?>