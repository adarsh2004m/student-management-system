<?php
session_start();
include "conn.php";

if(!isset($_SESSION['parent_email'])) {
    header("Location: parent_login.php");
    exit();
}

$parent_email = $_SESSION['parent_email'];

// Get parent details
$parent_query = "SELECT * FROM parents WHERE email = ?";
$stmt = $con->prepare($parent_query);
$stmt->bind_param("s", $parent_email);
$stmt->execute();
$parent = $stmt->get_result()->fetch_assoc();

// Get associated students with more details
$students_query = "SELECT s.*, sp.relationship, d.department as tbl_depart 
                  FROM tbl_sregister s
                  JOIN student_parent sp ON s.email = sp.student_email
                  LEFT JOIN tbl_depart d ON s.dpid = d.dpid
                  WHERE sp.parent_email = ?";
$stmt2 = $con->prepare($students_query);
$stmt2->bind_param("s", $parent_email);
$stmt2->execute();
$students = $stmt2->get_result();
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

 <!-- Main Sidebar Container -->
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
    </nav>

    <div class="container mt-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">My Students</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Department</th>
                <th>Semester</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Relationship</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php while($student = $students->fetch_assoc()): ?>
              <tr>
                <td>
                  <?php if(!empty($student['image'])): ?>
                  <img src="<?= htmlspecialchars($student['image']) ?>" width="50" height="50" class="img-circle">
                  <?php else: ?>
                  <img src="dist/img/default_student.png" width="50" height="50" class="img-circle">
                  <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($student['fullname']) ?></td>
                <td><?= htmlspecialchars($student['department'] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars($student['csem']) ?></td>
                <td><?= htmlspecialchars($student['email']) ?></td>
                <td><?= htmlspecialchars($student['mob']) ?></td>
                <td><?= ucfirst($student['relationship']) ?></td>
                <td>
                  <a href="parent_view_student.php?email=<?= urlencode($student['email']) ?>" 
                     class="btn btn-sm btn-primary">
                    <i class="fas fa-eye"></i> View
                  </a>
                </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
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