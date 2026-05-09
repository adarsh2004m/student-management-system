<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Website Example</title><meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" >
  <title>AdminLTE 3 | Dashboard</title>
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
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 
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
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
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
		<a class="dropdown-item" data-toggle="modal" data-target="#reg" href="#">Teacher</a>
		<a class="dropdown-item" data-toggle="modal" data-target="#reg" href="#">Student</a>
		</div>
		</div>
      </li>
    </ul>
  </div>  
</nav>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-4">
      <h2>About Me</h2>
      <h5>Photo of me:</h5>
      <div class="fakeimg">Fake Image</div>
      <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
      <h3>Some Links</h3>
      <p>Lorem ipsum dolor sit ame.</p>
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="#" >Active</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
      <hr class="d-sm-none">
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
  

      <form action="" method="post" class="was-validated">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="password" required>
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
	  <form action="" method="post" class="was-validated">
      <div class="modal-header">
	  <h2  class="fa fa-arrow-alt-circle-right"   align="center" style="color:#006600">Register</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
       
      
  <!-- /.login-logo -->
  

    
	  
	  <div class="row">
	  <div   class="col-md-6">
        
	  <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="full name" required >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-child"></span>
            </div>
          </div>
        </div>
    
        <div class="input-group mb-3">
          <input type="date" class="form-control" placeholder="Date of Birth" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar"></span>
            </div>
          </div>
        </div>
		
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="mobile number" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
		
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="House Name" required>
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
		
        </div>
		
          <!-- /.col -->
          <div class="col-md-6">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
		
		 <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
		
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Street">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-street-view"></span>
            </div>
          </div>
        </div>
		
		<div class="input-group mb-3">
          <select class="selectpicker form-control" required>
		  <option value="">Select Department</option>
		  </select>
         
        </div>
        </div>
          <!-- /.col -->
		  
		  </div>
		 
        </div>
      <div class="modal-footer">
	  <button class="btn btn-primary" type="submit" value="Register">Register</button>
	  
	  </div>
	  </form>

      <!-- /.social-auth-links -->

     
    </div>
	
    <!-- /.login-card-body -->
  
      
     
    </div>

  </div>
</div>

    <div class="col-sm-8">
      <h2>TITLE HEADING</h2>
      <h5>Title description, Dec 7, 2017</h5>
      <div class="fakeimg">Fake Image</div>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
      <br>
      <h2>TITLE HEADING</h2>
      <h5>Title description, Sep 2, 2017</h5>
      <div class="fakeimg">Fake Image</div>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    </div>
  </div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
