<?php
session_start(); 

// Check if 'name' session variable is set to avoid errors
$name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';

// Check if 'photograph' session variable is set and not empty
$photograph = !empty($_SESSION['photograph']) ? '../homepage/uploads/' . htmlspecialchars($_SESSION['photograph']) : '';

include '../homepage/config.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = isset($_SESSION['id']) ? $_SESSION['id'] : null; // Initialize $id variable

// Initialize the success message variable
$success_message = "";

// Check if form is submitted
if(isset($_POST['submit'])) {
    $leave_type = $_POST['leave_type'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $reason = $_POST['reason'];
    
    // Insert submitted data into database
    $sql = "INSERT INTO leave_request (id, leave_type, start_date, end_date, reason, status) VALUES ('$id', '$leave_type', '$start_date', '$end_date', '$reason', 'Pending')";
    
    if ($conn->query($sql) === TRUE) {
        $success_message = "Leave request submitted successfully!";
        // Redirect to prevent form resubmission
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch and display leave requests from the database
$sql = "SELECT * FROM leave_request WHERE id = '$id'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="leave_request.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .content {
            display: flex;
            justify-content: space-between;
        }

        .leave_request_form,
        .leave_requests {
            width: 48%; /* Adjust the width as needed */
        }

        .success_message {
            text-align: center;
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
            padding: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <ul class="main">
                <li class="top">
                    <li>
                        <a href="employeedashboard.php">
                            <i class="fa-solid fa-gauge-simple-high"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li><a href="salary_slip.php"><i class="fa-solid fa-money-bill"></i><span>Salary Slips</span></a></li>
                    <li class="leave_request"><a href="#"><i class="fa-regular fa-calendar-days"></i><span>Leave Request</span></a></li>
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
                Welcome, <?php echo $name; ?>

                <!-- Display employee's photo -->
                <?php if (!empty($photograph)) { ?>
                    <img src="<?php echo $photograph; ?>" alt="Employee Photo">
                <?php } ?>
            </div>
        </div>

        <!-- Success message -->
        <?php if (!empty
($success_message)) { ?>
    <div class="success_message"><?php echo $success_message; ?></div>
<?php } ?>

<div class="content">
    <!-- Leave Request Form -->
    <div class="leave_request_form">
        <h3>Leave Request</h3>
        <form action="leave_request.php" method="POST">
            <label for="leave_type">Leave Type:</label>
            <select name="leave_type" id="leave_type">
                <option value="sick">Sick Leave</option>
                <option value="vacation">Vacation Leave</option>
                <!-- Add more leave types as needed -->
            </select><br><br>
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date"><br><br>
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date"><br><br>
            <label for="reason">Reason:</label><br>
            <textarea name="reason" id="reason" rows="4" cols="50"></textarea><br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

    <!-- Display leave requests -->
    <?php
    if ($result->num_rows > 0) {
        echo "<div class='leave_requests'>";
        echo "<h3>Leave Requests</h3>";
        echo "<table>";
        echo "<tr><th>Eid</th><th>Leave Type</th><th>Start Date</th><th>End Date</th><th>Reason</th><th>Status</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["leave_type"]."</td><td>".$row["start_date"]."</td><td>".$row["end_date"]."</td><td>".$row["reason"]."</td><td>".$row["status"]."</td></tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "<p>No leave requests found.</p>";
    }
    ?>
</div>
</div>
</body>
</html>
