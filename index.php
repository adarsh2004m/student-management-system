<?php  session_start();

include 'conn.php';
$s="select * from tbl_depart";
$q=mysqli_query($con,$s);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Website Example</title><meta charset="utf-8">
  
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
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
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<script src="j.js"></script>
<script src="bd.js"></script>
<link href="bd.css" rel="stylesheet"/>


  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  
  
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
<script>
function getpass(){
			p1=document.f.p.value;
			p2=document.f.p1.value;
			if(p1==p2){
			document.getElementById("pm").style.display="none";
			document.getElementById("pm1").style.display="block";
			return true;
			}
			else{
			document.getElementById("pm1").style.display="none";
			document.getElementById("pm").style.display="block";
			return false;
			}

}
function getpass1(){
			p1=document.f1.p2.value;
			p2=document.f1.p3.value;
			if(p1==p2){
			document.getElementById("pm2").style.display="none";
			document.getElementById("pm3").style.display="block";
			return true;
			}
			else{
			document.getElementById("pm3").style.display="none";
			document.getElementById("pm2").style.display="block";
			return false;
			}

}
</script>
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0"><?php  include "message1.php"; ?> <?php  include 'm1.php';?>
  <h1>Shree Vidyadhiraja College of Arts and Science</h1>
  <p>Karunagapply,kollam</p> 
  <p></p>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link"  href="#"  data-toggle="modal" data-target="#myModal">LOGIN</a>
		
      </li>
      <li class="nav-item">
	  <div class="dropdown">
        <a  class="dropdown-header" data-toggle="dropdown" href="#"  ><font face="Times New Roman, Times, serif" color="#FFFFFF">REGISTER</font></a>
		<div class="dropdown-menu">
		<a class="dropdown-item" data-toggle="modal" data-target="#reg1" href="#">Teacher</a>
		<a class="dropdown-item" data-toggle="modal" data-target="#reg" href="#">Student</a>
		</div>
		
		</div>
      </li>
    </ul>
  </div>  
</nav>

<div class="container" style="margin-top:30px">
  <div class="row">
   
     <div  class="col-lg-9"> 
      
			  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
	
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" >
                                                <div class="carousel-item active">
                                                    <div class="container-fluid"> <img  class="img-fluid" src="img1.jpg" alt="First slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container-fluid"><img class=" img-fluid" src="img7.jpg" alt="Second slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container-fluid"><img class="img-fluid" src="img3.jpg" alt="Third slide"></div>
													
                                                </div>
                                            </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

      
	</div>  
    </div>
	<!-- login -->
	<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
	
      <div class="modal-header">
	  <h2  class="fa fa-arrow-alt-circle-right"   align="center" style="color:#006600">Login</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <div class="login-box">
      
  <!-- /.login-logo -->
  

      <form action="login.php" method="post" class="was-validated">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" required name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" required name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  
      </div>
     
    </div>

  </div>
  </div>
  <!-- login end -->
  <div id="reg" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">

    <!-- Modal content-->
    <div class="modal-content">
	  <form action="sregister.php" method="post" class="was-validated" enctype="multipart/form-data" name="f1">
      <div class="modal-header">
	  <h2  class="fa fa-arrow-alt-circle-right"   align="center" style="color:#006600">Register</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
       
      
  <!-- /.login-logo -->
  

    
	  
	  <div class="row">
	  <div   class="col-md-6">
        
	  <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="full name" required name="fname" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-child"></span>
            </div>
          </div>
        </div>
    
        <div class="input-group mb-3">
          <input type="date" class="form-control" placeholder="Date of Birth" required  name="dob">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar"></span>
            </div>
          </div>
        </div>
		
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="mobile number" required name="mob">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
		
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="House Name" required  name="hname">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-book"></span>
            </div>
          </div>
        </div>
		
		<div class="form-group clearfix" align="center">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary1" name="r1"  value="male" class="form-control input-sm"checked>
                        <label for="radioPrimary1">
						male
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2"  class="form-control input-sm" value="female" name="r1">
                        <label for="radioPrimary2">
						female
                        </label>
                      </div>
                      
                      </div>
					  <div class="input-group mb-3">
           <input class="date-own form-control" style="width: 300px;" type="text" required  placeholder="Year of admission" name="yad">
 <script type="text/javascript">
      $('.date-own').datepicker({
         minViewMode: 2,
         format: 'yyyy'
       });
  </script>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar"></span>
            </div>
          </div>
        </div>
		<div class="form-group">
                    
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file1" name="file1" required>
                        <label class="custom-file-label" for="exampleInputFile">Upload your photo</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
        </div>
		
          <!-- /.col -->
          <div class="col-md-6">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" required name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" required name="p2">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
		
		 <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype Password" required name="p3" onKeyUp="getpass1()">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
			
          </div>
		  <div class="invalid-feedback"  id="pm2" style="display:none">
		  password mismatch
		  </div>
		   <div class="valid-feedback"  id="pm3" style="display:none">
		  password match
		  </div>
        </div>
		
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Street" name="street">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-street-view"></span>
            </div>
          </div>
        </div>
		
		<div class="input-group mb-3">
          <select class="selectpicker form-control" required name="d">
		  <option value="">Select Department</option>
		  <?php while($r=mysqli_fetch_array($q)){ ?>
		  <option value="<?php echo $r['dpid']; ?>" ><?php echo $r['department']; ?></option>
		  <?php } ?>
		  </select>
         
        </div>
		<div class="input-group mb-3">
          <select class="selectpicker form-control" required name="csem">
		  <option value="">Select Current Semester</option>
		  <option value="1">1</option>
		  <option value="2">2</option>
		  <option value="3">3</option>
		  <option value="4">4</option>
		  <option value="5">5</option>
		  <option value="6">6</option>
		  
		  </select>
         
        </div>
        </div>
          <!-- /.col -->
		  
		  </div>
		 
        </div>
      <div class="modal-footer">
	  <button class="btn btn-primary" type="submit" value="Register" name="submit1">Register</button>
	  
	  </div>
	  </form>

      <!-- /.social-auth-links -->

     
    </div>
	
    <!-- /.login-card-body -->
  
      
     
    </div>

  </div>
</div>

 <div id="reg1" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">

    <!-- Modal content-->
    <div class="modal-content">
	  <form action="tregister.php" method="post" class="was-validated" enctype="multipart/form-data" onSubmit="getpass()" name="f">
      <div class="modal-header">
	  <h2  class="fa fa-arrow-alt-circle-right"   align="center" style="color:#006600">Register</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
       
      
  <!-- /.login-logo -->
  

    
	  
	  <div class="row">
	  <div   class="col-md-6">
        
	  <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="full name" required  name="fname">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-child"></span>
            </div>
          </div>
        </div>
    
        <div class="form-group">
                    
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file1" name="file1" required>
                        <label class="custom-file-label" for="exampleInputFile">Upload your photo</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
		
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="mobile number"  name="mob" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
		
		
		<div class="input-group mb-3" align="left">
          <input type="radio" class="form-control input-sm"  name="r"  value="male">
          <div class="input-group-append">
            <div class="input-group-text">
             <span class="input-group-prepend"> Male</span>
            </div>
          </div>
		  <input type="radio" class="form-control input-sm"   name="r" value="female">
          <div class="input-group-append">
            <div class="input-group-text">
              Female
            </div>
          </div>
        </div>
	
		
		
		
        </div>
		
          <!-- /.col -->
          <div class="col-md-6">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" required name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password"  name="p" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
		
		 <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype Password" name="p1"  onKeyUp="getpass()"required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
		  <div class="invalid-feedback"  id="pm" style="display:none">
		  password mismatch
		  </div>
		   <div class="valid-feedback"  id="pm1" style="display:none">
		  password match
		  </div>
        </div>
		
		
		
		<div class="input-group mb-3">
		<div class="select2-blue">
		<label> Department</label>
          <select   class="select2 form-control"  data-dropdown-css-class="select2-blue" multiple="multiple" data-placeholder="Select  departments"  style="width:100%"  name="d" required>
		   <option value="">Select Department</option>
		  <?php
		  $s5="select * from tbl_depart";
$q5=mysqli_query($con,$s5); while($r5=mysqli_fetch_array($q5)){ ?>
		  <option value="<?php echo $r5['dpid']; ?>"><?php echo $r5['department']; ?></option>
		  <?php } ?>
		  </select>
         </div>
        </div>
		
        </div>
          <!-- /.col -->
		  
		  </div>
		 
        </div>
      <div class="modal-footer">
	  <button class="btn btn-primary" type="submit" value="Register" name="submit">Register</button>
	  
	  </div>
	  </form>

      <!-- /.social-auth-links -->

     
    </div>
	
    <!-- /.login-card-body -->
  
      
     
    </div>

  </div>
</div>


   


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
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
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
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
</body>
</html>
