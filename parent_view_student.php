<?php
session_start();
include "conn.php";

if(!isset($_SESSION['parent_email'])) {
    header("Location: parent_login.php");
    exit();
}

$student_email = $_GET['email'] ?? die('Student email not specified');
$parent_email = $_SESSION['parent_email'];

// Get parent details first
$parent_query = "SELECT * FROM parents WHERE email = ?";
$stmt = $con->prepare($parent_query);
$stmt->bind_param("s", $parent_email);
$stmt->execute();
$parent = $stmt->get_result()->fetch_assoc();

// Verify this parent has access to this student
$verify_query = "SELECT 1 FROM student_parent 
                WHERE parent_email = ? AND student_email = ?";
$stmt = $con->prepare($verify_query);
$stmt->bind_param("ss", $parent_email, $student_email);
$stmt->execute();
if($stmt->get_result()->num_rows == 0) {
    die("You don't have permission to view this student");
}

// Get student details
$student_query = "SELECT s.*, d.department as tbl_depart
                 FROM tbl_sregister s
                 LEFT JOIN tbl_depart d ON s.dpid = d.dpid
                 WHERE s.email = ?";
$stmt = $con->prepare($student_query);
$stmt->bind_param("s", $student_email);
$stmt->execute();
$student = $stmt->get_result()->fetch_assoc();

// Get relationship
$rel_query = "SELECT relationship FROM student_parent 
             WHERE parent_email = ? AND student_email = ?";
$stmt = $con->prepare($rel_query);
$stmt->bind_param("ss", $parent_email, $student_email);
$stmt->execute();
$relationship = $stmt->get_result()->fetch_assoc()['relationship'];
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
          <a href="#" class="d-block"><?= htmlspecialchars($parent['fullname'] ?? 'Parent') ?></a>
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
            <span class="nav-link">Welcome, <?= htmlspecialchars($parent['fullname'] ?? 'Parent') ?></span>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container mt-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Student Details</h3>
          <div class="card-tools">
            <a href="parent_students.php" class="btn btn-sm btn-default">
              <i class="fas fa-arrow-left"></i> Back to Students
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-3 text-center">
              <?php if(!empty($student['image'])): ?>
              <img src="<?= htmlspecialchars($student['image']) ?>" class="img-circle elevation-2" width="150" height="150">
              <?php else: ?>
              <img src="dist/img/default_student.png" class="img-circle elevation-2" width="150" height="150">
              <?php endif; ?>
              <h3 class="mt-3"><?= htmlspecialchars($student['fullname']) ?></h3>
              <h5 class="text-muted"><?= ucfirst($relationship) ?></h5>
            </div>
            <div class="col-md-9">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <tr>
                    <th width="30%">Email</th>
                    <td><?= htmlspecialchars($student['email']) ?></td>
                  </tr>
                  <tr>
                    <th>Mobile</th>
                    <td><?= htmlspecialchars($student['mob']) ?></td>
                  </tr>
                  <tr>
                    <th>Date of Birth</th>
                    <td><?= htmlspecialchars($student['dob']) ?></td>
                  </tr>
                  <tr>
                    <th>Department</th>
                    <td><?= htmlspecialchars($student['tbl_depart'] ?? 'N/A') ?></td>
                  </tr>
                  <tr>
                    <th>Current Semester</th>
                    <td><?= htmlspecialchars($student['csem']) ?></td>
                  </tr>
                  <tr>
                    <th>Year of Admission</th>
                    <td><?= htmlspecialchars($student['yad']) ?></td>
                  </tr>
                  <tr>
                    <th>Address</th>
                    <td>
                      <?= htmlspecialchars($student['hname'] ?? '') ?><br>
                      <?= htmlspecialchars($student['street'] ?? '') ?>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          
          <!-- Attendance Summary -->
          <!-- Attendance Summary -->
<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Attendance Summary</h3>
    </div>
    <div class="card-body">
        <?php
        // Get attendance summary
        $attendance_query = "SELECT sem, SUM(total) as total_classes, SUM(present) as present_classes 
                            FROM tbl_att 
                            WHERE email = ? 
                            GROUP BY sem";
        $stmt = $con->prepare($attendance_query);
        $stmt->bind_param("s", $student_email);
        $stmt->execute();
        $attendance = $stmt->get_result();
        
        if($attendance->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Semester</th>
                        <th>Total Classes</th>
                        <th>Classes Attended</th>
                        <th>Attendance Percentage</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $attendance->fetch_assoc()): 
                        $percentage = ($row['present_classes'] / $row['total_classes']) * 100;
                        $status = $percentage >= 75 ? 'text-success' : 'text-danger';
                        $status_text = $percentage >= 75 ? 'Satisfactory' : 'Low Attendance';
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($row['sem']) ?></td>
                        <td><?= htmlspecialchars($row['total_classes']) ?></td>
                        <td><?= htmlspecialchars($row['present_classes']) ?></td>
                        <td><?= number_format($percentage, 2) ?>%</td>
                        <td class="<?= $status ?>"><b><?= $status_text ?></b></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="alert alert-info">
            No attendance records found for this student.
        </div>
        <?php endif; ?>
        
        <!-- Attendance Chart -->
        <div class="mt-4">
            <canvas id="attendanceChart" height="150"></canvas>
        </div>
    </div>
</div>
          
          <!-- Academic Performance -->
         <!-- Internal Marks Summary -->
<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Internal Marks Summary</h3>
    </div>
    <div class="card-body">
        <?php
        // Get internal marks summary
        $marks_query = "SELECT m.subid, s.subname, m.mark, m.total, 
                        (m.mark/m.total)*100 as percentage, m.status
                        FROM tbl_internal m
                        JOIN tbl_subject s ON m.subid = s.subid
                        WHERE m.email = ?";
        $stmt = $con->prepare($marks_query);
        $stmt->bind_param("s", $student_email);
        $stmt->execute();
        $marks = $stmt->get_result();
        
        if($marks->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Marks Obtained</th>
                        <th>Total Marks</th>
                        <th>Percentage</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $marks->fetch_assoc()): 
                        $status_class = $row['status'] == 1 ? 'text-success' : 'text-danger';
                        $status_text = $row['status'] == 1 ? 'Pass' : 'Fail';
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($row['subname'] ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($row['mark']) ?></td>
                        <td><?= htmlspecialchars($row['total']) ?></td>
                        <td><?= number_format($row['percentage'], 2) ?>%</td>
                        <td class="<?= $status_class ?>"><b><?= $status_text ?></b></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Marks Chart -->
        <div class="mt-4">
            <canvas id="marksChart" height="150"></canvas>
        </div>
        <?php else: ?>
        <div class="alert alert-info">
            No internal marks records found for this student.
        </div>
        <?php endif; ?>
    </div>
</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
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
<script src="plugins/chart.js/Chart.min.js"></script>
<script>
$(function () {
    // Attendance Chart
    var attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
    var attendanceChart = new Chart(attendanceCtx, {
        type: 'bar',
        data: {
            labels: [
                <?php 
                $attendance->data_seek(0);
                while($row = $attendance->fetch_assoc()) {
                    echo "'Sem ".$row['sem']."',";
                }
                ?>
            ],
            datasets: [{
                label: 'Classes Attended',
                data: [
                    <?php 
                    $attendance->data_seek(0);
                    while($row = $attendance->fetch_assoc()) {
                        echo $row['present_classes'].",";
                    }
                    ?>
                ],
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }, {
                label: 'Total Classes',
                data: [
                    <?php 
                    $attendance->data_seek(0);
                    while($row = $attendance->fetch_assoc()) {
                        echo $row['total_classes'].",";
                    }
                    ?>
                ],
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Marks Chart
    var marksCtx = document.getElementById('marksChart').getContext('2d');
    var marksChart = new Chart(marksCtx, {
        type: 'bar',
        data: {
            labels: [
                <?php 
                $marks->data_seek(0);
                while($row = $marks->fetch_assoc()) {
                    echo "'".($row['subname'] ?? 'Subject '.$row['subid'])."',";
                }
                ?>
            ],
            datasets: [{
                label: 'Marks Percentage',
                data: [
                    <?php 
                    $marks->data_seek(0);
                    while($row = $marks->fetch_assoc()) {
                        echo number_format($row['percentage'], 2).",";
                    }
                    ?>
                ],
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
});
</script>
</body>
</html>