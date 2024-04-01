<?php
session_start();
include '../homepage/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <ul class="main">
                <li class="top">
                    <li class="dashboard">
                        <a href="employeedashboard.php">
                            <i class="fa-solid fa-gauge-simple-high"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li><a href="salary_slip.php"><i class="fa-solid fa-money-bill"></i><span>Salary Slips</span></a></li>
                    <li><a href="leave_request.php"><i class="fa-regular fa-calendar-days"></i><span>Leave Request</span></a></li>
                </li>
                <li class="logout"><a href="../index.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> <span>Logout</span></a></li>
            </ul>
        </div>
    </div>

    <div class="main_content">
        <div class="header">
            <div class="header_title">
                <span>Employee</span>
                <h2>Dashboard</h2>
            </div>

            <div class="user_info">
                <!-- Display employee's name -->
                Welcome, <?php echo $_SESSION['name']; ?>

                <!-- Display employee's photo -->
                <?php if (!empty($_SESSION['photograph'])) { ?>
                    <img src="../homepage/uploads/<?php echo htmlspecialchars($_SESSION['photograph']); ?>" alt="Employee Photo">
                <?php } ?>
            </div>
        </div>

        <!-- Include update profile form -->
        <?php include 'update_profile.php'; ?>

        <!-- Include change password form -->
        <?php include 'change_password.php'; ?>
    </div>
</body>

</html>
