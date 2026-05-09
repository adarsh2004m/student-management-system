// save_parent.php
<?php
include 'conn.php';

$email = $_POST['email'];
$fullname = $_POST['fullname'];
$mob = $_POST['mob'];
$student_email = $_POST['student_email'];
$relationship = $_POST['relationship'];

// Insert into parents table
$sql = "INSERT INTO parents (email, fullname, mob) VALUES (?, ?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("sss", $email, $fullname, $mob);
$stmt->execute();

// Insert into student_parent relationship table
$sql2 = "INSERT INTO student_parent (student_email, parent_email, relationship) VALUES (?, ?, ?)";
$stmt2 = $con->prepare($sql2);
$stmt2->bind_param("sss", $student_email, $email, $relationship);
$stmt2->execute();

// Insert into login table with status=4 (assuming 4 is for parents)
 // Using mobile as default password
$sql3 = "INSERT INTO tbl_login (email, password, status) VALUES (?, ?, 4)";
$stmt3 = $con->prepare($sql3);
$stmt3->bind_param("ss", $email, $mob);
$stmt3->execute();

header("Location: view_parent.php");
exit();
?>