<?php
session_start();
include 'conn.php';
$e=$_SESSION['user'];
$s="select * from tbl_tregister where email='$e'";
$q=mysqli_query($con,$s);
$r=mysqli_fetch_array($q);
$x=$r['dpid'];
$s1="select * from tbl_depart where dpid='$x'";
$q1=mysqli_query($con,$s1);
$r1=mysqli_fetch_array($q1);

 ?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | User Profile</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  
<script type="text/javascript">
function getXMLHttp()
{
	var xmlHttp
	
	try
	{
		xmlHttp=new XMLHttpRequest();
	}
	catch(e)
	{
		try
		{
			xmlHttp=new ActiveXObject("Masxml2.XMLHTTP");
		}
		catch(e)
		{
			try
			{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e)
			{
				alert("your browser doesnot support AJAX!");
				return false;
			}
		}
	}
	return xmlHttp;
	
}

function getsub(s)
{
  var xmlHttp = getXMLHttp();
 	
	d=document.f.d.value;
	
	xmlHttp.onreadystatechange = function()
  	{
    	if(xmlHttp.readyState == 4)
    	{
			document.getElementById('x1').innerHTML = xmlHttp.responseText;
    	}
		else if(xmlHttp.readyState == 1)
		{
		document.getElementById('x1').innerHTML = '<span>Loading...</span>';	
		}
  	}
  xmlHttp.open("GET", "ajax3.php?s="+s+"&d="+d, true);
  xmlHttp.send();
}

function getd()
{
  var xmlHttp = getXMLHttp();
 	
	d=document.f.d.value;
	s=document.f.cs.value;
	sid=document.f.sub1.value;
	xmlHttp.onreadystatechange = function()
  	{
    	if(xmlHttp.readyState == 4)
    	{
			document.getElementById('x2').innerHTML = xmlHttp.responseText;
    	}
		else if(xmlHttp.readyState == 1)
		{
		document.getElementById('x2').innerHTML = '<span>Loading...</span>';	
		}
  	}
  xmlHttp.open("GET", "ajax7.php?s="+s+"&d="+d+"&sid="+sid, true);
  xmlHttp.send();
}
</script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md bg-light navbar-light" >
    <!-- Left navbar links -->
	 <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav m1-auto">
	
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
	  
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
	  </ul>
	  </div>
	  <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
      <li class="nav-item d-none d-sm-inline-block align-items-end" >
        <a href="logout.php" class="nav-link">Logout</a>
      </li>
	  
	  </ul>
	  </div>
       
    

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $e;?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $r['image'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $r['fullname']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <?php  include 'asidem.php';?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <?php include 'm1.php'; ?>
       <div class="card">
	   <div class="card-header">
	   <h3>Add Attendance</h3>
	   </div>
	   <div  class="card-body">
	   <form name="f" class="was-validated" action="hinte.php" method="post">
	    <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
	   <input type="text" value="<?php echo $x; ?>" name="d" style="display:none">
	   <select class="select2-blue form-control" required onChange="getsub(this.value)" name="cs">
	   <option value="">select semester</option>
	   <option value="1">1</option>
	   			<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				
	   </select>
	   </div>
	   </div>
	   <div class="col-sm-6">
	   <div  class="form-group">
	   <select class="select2-blue form-control" id="x1" name="sub1" required onChange="getd()">
	   <option value="">select subject</option>
	   
				
	   </select>
	   </div>
	   </div>
	   </div>
	   
	   <table class="table table-striped" id="x2">
	   
	   </table>
	   </form>
	   </div>
	   </div>
	   
	   </div>
        
      
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.2
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
