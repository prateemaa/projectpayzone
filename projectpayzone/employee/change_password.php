<?php
// Start the session if it hasn't been started already
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../homepage/config.php';

if (isset($_POST['submit'])) {
    // Check if the 'id' key is set in $_SESSION
    if (isset($_SESSION['id'])) {
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);
        $id = $_SESSION['id']; // Retrieve employee ID from session

        if ($new_password !== $confirm_password) {
            $error = "New password and confirm password do not match.";
        } else {
            $sql = "SELECT * FROM employee_register WHERE id='$id' AND password='$current_password'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1) {
                $update_sql = "UPDATE employee_register SET password='$new_password' WHERE id='$id'";
                if (mysqli_query($conn, $update_sql)) {
                    $success = "Password changed successfully.";
                    // Redirect to employeedashboard.php after successful password change
                    header("Location: employeedashboard.php");
                    exit();
                } else {
                    $error = "Error updating password: " . mysqli_error($conn);
                }
            } else {
                $error = "Incorrect current password.";
            }
        }
    } else {
        // Handle the case where 'id' key is not set in $_SESSION
        $error = "Session ID not set.";
    }
}
?>
