<?php
session_start();
// Include your database connection file or configuration
include 'config.php';

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $designation = $_POST['designation'];
    $gender = $_POST['gender'];
    $mstatus = $_POST['mstatus'];
    $joiningdate = $_POST['joiningdate'];
    $password = md5($_POST['password']);

    // File upload
    $photograph = '';
    if (!empty($_FILES['photograph']['name'])) {
        $photograph = $_FILES['photograph']['name'];
        $tmp = $_FILES['photograph']['tmp_name'];
        $path = 'uploads/';
        move_uploaded_file($tmp, $path . $photograph);
    }

    // Check if email already exists
    $check_email_query = "SELECT * FROM employee_register WHERE email = '$email'";
    $check_email_result = mysqli_query($conn, $check_email_query);
    if (mysqli_num_rows($check_email_result) > 0) {
        $_SESSION['error'] = "Employee with this email already exists";
        header("Location: employee_register.php");
        exit();
    }

    // Insert employee data into the database
    $insert = "INSERT INTO employee_register (name, email, address, phone, designation, gender, mstatus, joiningdate, photograph, password) 
    VALUES ('$name', '$email', '$address', '$phone', '$designation', '$gender', '$mstatus', '$joiningdate', '$photograph', '$password')";
    $result = mysqli_query($conn, $insert);
    if ($result) {
        $_SESSION['success'] = "Employee registered successfully";
        header("Location: employee_login.php");
        exit();
    } else {
        $_SESSION['error'] = "Failed to register employee";
        header("Location: employee_register.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration</title>
    <!-- CSS -->
    <link rel="stylesheet" href="employee_register_style.css">
</head>

<body>
    <div class="container">
        <h2>Employee Registration</h2>
        <form action="employee_register.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone No.:</label>
                <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
            </div>
            <div class="form-group">
                <label for="designation">Designation:</label>
                <select id="designation" name="designation" required>
                    <option value="">Select Designation</option>
                    <option value="finance_department">Finance Department</option>
                    <option value="it_officer">IT Officer</option>
                    <option value="teacher">Teacher</option>
                </select>
            </div>
            <div class="form-group">
                <label>Gender:</label>
                <div class="radio-group">
                    <label><input type="radio" name="gender" value="male" required> Male</label>
                    <label><input type="radio" name="gender" value="female"> Female</label>
                    <label><input type="radio" name="gender" value="other"> Other</label>
                </div>
            </div>

            <div class="form-group">
                <label for="mstatus">Marital Status:</label>
                <select id="mstatus" name="mstatus" required>
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                </select>
            </div>
            <div class="form-group">
                <label for="joiningdate">Joining Date:</label>
                <input type="date" id="joiningdate" name="joiningdate" required>
            </div>
            <div class="form-group">
                <label for="photograph">Photograph:</label>
                <input type="file" id="photograph" name="photograph" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="submit">Register</button>
        </form>
        <div class="bottom-link">
            Already have an account? <a href="employee_login.php">Login</a>
        </div>
    </div>
</body>

</html>
