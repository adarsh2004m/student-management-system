<?php
include 'conn.php';

// Get parent email from URL
$email = isset($_GET['email']) ? $_GET['email'] : die('Parent email not specified');

// Start transaction
$con->begin_transaction();

try {
    // 1. Delete from student_parent first
    $sql1 = "DELETE FROM student_parent WHERE parent_email = ?";
    $stmt1 = $con->prepare($sql1);
    $stmt1->bind_param("s", $email);
    $stmt1->execute();

    // 2. Delete from parents
    $sql2 = "DELETE FROM parents WHERE email = ?";
    $stmt2 = $con->prepare($sql2);
    $stmt2->bind_param("s", $email);
    $stmt2->execute();

    // 3. Delete from login
    $sql3 = "DELETE FROM tbl_login WHERE email = ?";
    $stmt3 = $con->prepare($sql3);
    $stmt3->bind_param("s", $email);
    $stmt3->execute();

    // Commit transaction
    $con->commit();
    
    header("Location: view_parent.php?success=Parent deleted successfully");
    exit();

} catch (Exception $e) {
    // Rollback transaction on error
    $con->rollback();
    header("Location: view_parent.php?error=" . urlencode("Error deleting parent: " . $e->getMessage()));
    exit();
}
?>