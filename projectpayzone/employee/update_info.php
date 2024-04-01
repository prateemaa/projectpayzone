<?php
session_start();
include '../homepage/config.php';

if(isset($_POST['submit'])){
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $designation = $_POST['designation'];

    // Update employee information in the database
    $sql = "UPDATE employee_register SET name='$name', email='$email', address='$address', phone='$phone', designation='$designation' WHERE id={$_SESSION['id']}";

    if(mysqli_query($conn, $sql)){
        // Update session variables with new information
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['address'] = $address;
        $_SESSION['phone'] = $phone;
        $_SESSION['designation'] = $designation;

        // Redirect to dashboard with success message
        header("Location: employeedashboard.php?success=profile_updated");
        exit();
    } else {
        // Redirect to dashboard with error message
        header("Location: employeedashboard.php?error=update_failed");
        exit();
    }
} else {
    // If form is not submitted, redirect to dashboard
    header("Location: employeedashboard.php");
    exit();
}
?>
