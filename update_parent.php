<?php
include 'conn.php';

// Get form data
$original_email = $_POST['original_email'];
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$mob = $_POST['mob'];
$hname = $_POST['hname'] ?? null;
$street = $_POST['street'] ?? null;
$gender = $_POST['gender'] ?? null;
$student_emails = $_POST['student_email'];
$relationships = $_POST['relationship'];

// Start transaction
$con->begin_transaction();

try {
    // 1. Update parent details
    $sql = "UPDATE parents SET 
            email = ?, 
            fullname = ?, 
            mob = ?, 
            hname = ?, 
            street = ?, 
            gender = ?
            WHERE email = ?";
    $stmt = $con->prepare($sql);
    
    if ($stmt === false) {
        throw new Exception("Error preparing statement: " . $con->error);
    }
    
    $stmt->bind_param("sssssss", $email, $fullname, $mob, $hname, $street, $gender, $original_email);
    
    if (!$stmt->execute()) {
        throw new Exception("Error executing statement: " . $stmt->error);
    }

    // 2. Update login table if email changed
    if ($original_email != $email) {
        $sql2 = "UPDATE login SET email = ? WHERE email = ?";
        $stmt2 = $con->prepare($sql2);
        $stmt2->bind_param("ss", $email, $original_email);
        $stmt2->execute();
    }

    // 3. Delete existing relationships
    $sql3 = "DELETE FROM student_parent WHERE parent_email = ?";
    $stmt3 = $con->prepare($sql3);
    $stmt3->bind_param("s", $email);
    $stmt3->execute();

    // 4. Insert new relationships
    $sql4 = "INSERT INTO student_parent (student_email, parent_email, relationship) VALUES (?, ?, ?)";
    $stmt4 = $con->prepare($sql4);

    foreach ($student_emails as $index => $student_email) {
        $relationship = $relationships[$index];
        $stmt4->bind_param("sss", $student_email, $email, $relationship);
        $stmt4->execute();
    }

    // Commit transaction
    $con->commit();
    
    header("Location: view_parent.php?success=Parent updated successfully");
    exit();

} catch (Exception $e) {
    // Rollback transaction on error
    $con->rollback();
    header("Location: edit_parent.php?email=" . urlencode($original_email) . "&error=" . urlencode($e->getMessage()));
    exit();
}
?>