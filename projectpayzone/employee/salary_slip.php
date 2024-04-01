<?php
session_start();
// Include your database connection file or configuration
require_once "connection.php";

// Check if employee ID is provided in the query parameter
if (isset($_GET['id'])) {
    $employeeId = $_GET['id'];

    // Fetch employee data from the database based on the provided ID
    $fetch_employee_query = "SELECT * FROM employee_register WHERE id = $id";
    $employee_result = mysqli_query($conn, $fetch_employee_query);
    $employee = mysqli_fetch_assoc($employee_result);

    // Fetch payslip data for the employee
    $fetch_payslip_query = "SELECT * FROM payslip WHERE employee_id = $id";
    $payslip_result = mysqli_query($conn, $fetch_payslip_query);
    $payslip = mysqli_fetch_assoc($payslip_result);
} else {
    // Handle case where employee ID is not provided
    $_SESSION['error'] = "Employee ID not provided";
    header("Location: salary_slip.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Payslip</title>
    <!-- CSS Styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        h2 {
            text-align: center;
        }

        .payslip-details {
            margin-top: 20px;
        }

        .payslip-details p {
            margin-bottom: 10px;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #007bff;
            text-decoration: none;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Employee Payslip</h2>
        <div class="payslip-details">
            <p><strong>Name:</strong> <?php echo $employee['name']; ?></p>
            <p><strong>Email:</strong> <?php echo $employee['email']; ?></p>
            <p><strong>Designation:</strong> <?php echo $employee['designation']; ?></p>
            <p><strong>Payslip Date:</strong> <?php echo $payslip['payslip_date']; ?></p>
            <p><strong>Basic Salary:</strong> <?php echo $payslip['basic_salary']; ?></p>
            <p><strong>Allowances:</strong> <?php echo $payslip['allowances']; ?></p>
            <p><strong>Deductions:</strong> <?php echo $payslip['deductions']; ?></p>
            <p><strong>Net Salary:</strong> <?php echo $payslip['net_salary']; ?></p>
        </div>
        <div class="back-link">
            <a href="employee.php">Back to Employee list</a>
        </div>
    </div>
</body>

</html>
