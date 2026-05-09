<?php
session_start();
include "conn.php";

if(!isset($_SESSION['parent_email'])) {
    header("Location: index.php");
    exit();
}

$parent_email = $_SESSION['parent_email'];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Verify current password
    $query = "SELECT password FROM login WHERE email = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $parent_email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if(password_verify($current_password, $user['password'])) {
            if($new_password == $confirm_password) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $update_query = "UPDATE login SET password = ? WHERE email = ?";
                $stmt = $con->prepare($update_query);
                $stmt->bind_param("ss", $hashed_password, $parent_email);
                
                if($stmt->execute()) {
                    $_SESSION['password_change_success'] = "Password changed successfully";
                    header("Location: parent_profile.php");
                    exit();
                } else {
                    $error = "Error updating password: " . $con->error;
                }
            } else {
                $error = "New passwords do not match";
            }
        } else {
            $error = "Current password is incorrect";
        }
    } else {
        $error = "Error verifying current password";
    }
    
    $_SESSION['password_change_error'] = $error;
    header("Location: parent_profile.php");
    exit();
}
?>