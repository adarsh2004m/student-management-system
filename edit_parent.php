<?php 
include "conn.php";

// Get parent email from URL
$parent_email = isset($_GET['email']) ? $_GET['email'] : die('Parent email not specified');

// Fetch parent details
$parent_query = "SELECT * FROM parents WHERE email = ?";
$stmt = $con->prepare($parent_query);
$stmt->bind_param("s", $parent_email);
$stmt->execute();
$parent = $stmt->get_result()->fetch_assoc();

if (!$parent) {
    die('Parent not found');
}

// Fetch associated students
$relationship_query = "SELECT student_email, relationship FROM student_parent WHERE parent_email = ?";
$stmt2 = $con->prepare($relationship_query);
$stmt2->bind_param("s", $parent_email);
$stmt2->execute();
$relationships = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);

// Fetch all students for dropdown
$students_query = "SELECT email, fullname, csem FROM tbl_sregister";
$students_result = $con->query($students_query);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Edit Parent</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar content from your template -->
    <?php include 'sidem.php'; ?>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper" style="background-color:#FFFFFF">
     <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#"><img src="logo.jfif" width="50" height="50"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      
    </ul>
  </div>  
  <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
            
        </ul>
    </div>
</nav>  

    <!-- Main content -->
    <div class="container mt-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Parent</h3>
        </div>
        <div class="card-body">
          <form action="update_parent.php" method="post">
            <input type="hidden" name="original_email" value="<?= htmlspecialchars($parent['email']) ?>">
            
            <div class="form-group">
              <label>Parent Email</label>
              <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($parent['email']) ?>" required>
            </div>
            
            <div class="form-group">
              <label>Full Name</label>
              <input type="text" class="form-control" name="fullname" value="<?= htmlspecialchars($parent['fullname']) ?>" required>
            </div>
            
            <div class="form-group">
              <label>Mobile</label>
              <input type="text" class="form-control" name="mob" value="<?= htmlspecialchars($parent['mob']) ?>" required>
            </div>
            
            <div class="form-group">
              <label>House Name</label>
              <input type="text" class="form-control" name="hname" value="<?= htmlspecialchars($parent['hname'] ?? '') ?>">
            </div>
            
            <div class="form-group">
              <label>Street</label>
              <input type="text" class="form-control" name="street" value="<?= htmlspecialchars($parent['street'] ?? '') ?>">
            </div>
            
            <div class="form-group">
              <label>Gender</label>
              <select class="form-control" name="gender">
                <option value="male" <?= ($parent['gender'] ?? '') == 'male' ? 'selected' : '' ?>>Male</option>
                <option value="female" <?= ($parent['gender'] ?? '') == 'female' ? 'selected' : '' ?>>Female</option>
                <option value="other" <?= ($parent['gender'] ?? '') == 'other' ? 'selected' : '' ?>>Other</option>
              </select>
            </div>
            
            <h4>Associated Students</h4>
            <div id="student-associations">
              <?php foreach($relationships as $index => $rel): ?>
              <div class="row association-row mb-2">
                <div class="col-md-5">
                  <select class="form-control" name="student_email[]" required>
                    <option value="">Select Student</option>
                    <?php 
                    $students_result->data_seek(0);
                    while($student = $students_result->fetch_assoc()): 
                    ?>
                    <option value="<?= htmlspecialchars($student['email']) ?>" 
                      <?= $student['email'] == $rel['student_email'] ? 'selected' : '' ?>>
                      <?= htmlspecialchars($student['fullname']) ?> - Sem <?= htmlspecialchars($student['csem']) ?>
                    </option>
                    <?php endwhile; ?>
                  </select>
                </div>
                <div class="col-md-5">
                  <select class="form-control" name="relationship[]" required>
                    <option value="father" <?= $rel['relationship'] == 'father' ? 'selected' : '' ?>>Father</option>
                    <option value="mother" <?= $rel['relationship'] == 'mother' ? 'selected' : '' ?>>Mother</option>
                    <option value="guardian" <?= $rel['relationship'] == 'guardian' ? 'selected' : '' ?>>Guardian</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <?php if($index == 0): ?>
                  <button type="button" class="btn btn-success add-association">+</button>
                  <?php else: ?>
                  <button type="button" class="btn btn-danger remove-association">-</button>
                  <?php endif; ?>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">Update Parent</button>
            <a href="view_parents.php" class="btn btn-default mt-3">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
 <footer class="main-footer">
    <strong>.</strong>
   
    <div class="float-right d-none d-sm-inline-block">
      <b></b> 
    </div>
  </footer>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
$(document).ready(function() {
    // Add new student association
    $('.add-association').click(function() {
        const newRow = `
        <div class="row association-row mb-2">
            <div class="col-md-5">
                <select class="form-control" name="student_email[]" required>
                    <option value="">Select Student</option>
                    <?php 
                    $students_result->data_seek(0);
                    while($student = $students_result->fetch_assoc()): 
                    ?>
                    <option value="<?= htmlspecialchars($student['email']) ?>">
                        <?= htmlspecialchars($student['fullname']) ?> - Sem <?= htmlspecialchars($student['csem']) ?>
                    </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-5">
                <select class="form-control" name="relationship[]" required>
                    <option value="father">Father</option>
                    <option value="mother">Mother</option>
                    <option value="guardian">Guardian</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-association">-</button>
            </div>
        </div>`;
        $('#student-associations').append(newRow);
    });
    
    // Remove student association
    $(document).on('click', '.remove-association', function() {
        $(this).closest('.association-row').remove();
    });
});
</script>
</body>
</html>