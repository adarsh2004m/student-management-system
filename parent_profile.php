<?php
session_start();
include "conn.php";

if(!isset($_SESSION['parent_email'])) {
    header("Location: parent_login.php");
    exit();
}

$parent_email = $_SESSION['parent_email'];
$parent_query = "SELECT * FROM parents WHERE email = ?";
$stmt = $con->prepare($parent_query);
$stmt->bind_param("s", $parent_email);
$stmt->execute();
$parent = $stmt->get_result()->fetch_assoc();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $mob = $_POST['mob'];
    $hname = $_POST['hname'];
    $street = $_POST['street'];
    $gender = $_POST['gender'];
    
    $update_query = "UPDATE parents SET fullname=?, mob=?, hname=?, street=?, gender=? WHERE email=?";
    $stmt = $con->prepare($update_query);
    $stmt->bind_param("ssssss", $fullname, $mob, $hname, $street, $gender, $parent_email);
    
    if($stmt->execute()) {
        $success = "Profile updated successfully";
        // Refresh parent data
        $parent_query = "SELECT * FROM parents WHERE email = ?";
        $stmt = $con->prepare($parent_query);
        $stmt->bind_param("s", $parent_email);
        $stmt->execute();
        $parent = $stmt->get_result()->fetch_assoc();
    } else {
        $error = "Error updating profile: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Parent Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="parent_dashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Parent Portal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background-color:#003399">
      <!-- Sidebar user panel -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= htmlspecialchars($parent['fullname']) ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="parent_dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="parent_profile.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>My Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="parent_students.php" class="nav-link">
              <i class="nav-icon fas fa-child"></i>
              <p>My Students</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="parent_logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper" style="background-color:#FFFFFF">
    
      
      <nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <a class="navbar-brand" href="#"><img src="logo.jfif" width="50" height="50"></a>
      <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <span class="nav-link">Welcome, <?= htmlspecialchars($parent['fullname']) ?></span>
          </li>
        </ul>
      </div>
    </nav>
    

    <div class="container mt-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">My Profile</h3>
        </div>
        <div class="card-body">
          <?php if(isset($success)): ?>
          <div class="alert alert-success"><?= $success ?></div>
          <?php endif; ?>
          <?php if(isset($error)): ?>
          <div class="alert alert-danger"><?= $error ?></div>
          <?php endif; ?>
          
          <form method="post">
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" value="<?= htmlspecialchars($parent['email']) ?>" readonly>
            </div>
            <div class="form-group">
              <label>Full Name</label>
              <input type="text" name="fullname" class="form-control" value="<?= htmlspecialchars($parent['fullname']) ?>" required>
            </div>
            <div class="form-group">
              <label>Mobile</label>
              <input type="text" name="mob" class="form-control" value="<?= htmlspecialchars($parent['mob']) ?>" required>
            </div>
            <div class="form-group">
              <label>House Name</label>
              <input type="text" name="hname" class="form-control" value="<?= htmlspecialchars($parent['hname'] ?? '') ?>">
            </div>
            <div class="form-group">
              <label>Street</label>
              <input type="text" name="street" class="form-control" value="<?= htmlspecialchars($parent['street'] ?? '') ?>">
            </div>
            <div class="form-group">
              <label>Gender</label>
              <select name="gender" class="form-control">
                <option value="male" <?= ($parent['gender'] ?? '') == 'male' ? 'selected' : '' ?>>Male</option>
                <option value="female" <?= ($parent['gender'] ?? '') == 'female' ? 'selected' : '' ?>>Female</option>
                <option value="other" <?= ($parent['gender'] ?? '') == 'other' ? 'selected' : '' ?>>Other</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
          </form>
          
          <hr>
          <h4>Change Password</h4>
          <form action="parent_change_password.php" method="post">
            <div class="form-group">
              <label>Current Password</label>
              <input type="password" name="current_password" class="form-control" required>
            </div>
            <div class="form-group">
              <label>New Password</label>
              <input type="password" name="new_password" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Confirm New Password</label>
              <input type="password" name="confirm_password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-warning">Change Password</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer class="main-footer">
    <strong>Parent Portal &copy; <?= date('Y') ?></strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>