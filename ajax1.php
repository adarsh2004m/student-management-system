<?php
session_start();
$ee=$_SESSION['user'];
include 'conn.php';
$d=$_GET['d'];
$s1=$_GET['s'];
$st=1;

$s="select * from tbl_sregister where dpid='$d' and csem='$s1' and status='$st'";
$q=mysqli_query($con,$s);
if(mysqli_num_rows($q)>0){
?>
<div  align="justify"><input type="text"  placeholder="total days"name="t" class="form-control"  required style="width:20%" align="right">

<input type="text" name="cs" value="<?php echo $s1; ?>" style="display:none">
</div>
<tbody><tr><th>Name</th><th>Photo</th><th>Present Days</th></tr>
<?php
while($r=mysqli_fetch_array($q)){

?>
<tr><th><?php  echo $r['fullname'];?><input type="text" name="e[]" value="<?php echo $r['email']; ?>" style="display:none">



</th><th><img src="<?php echo $r['image']; ?>"  class="img-size-32"/></th><th><input type="text" class="form-control" name="p[]" style="width:20%" required></th></tr>
<?php
}
?></tbody><tfoot align="right"><button type="submit" value="Save" name="save" class="btn btn-success" >Save</button></tfoot><?php 

}else{ echo "no data";}
 ?>