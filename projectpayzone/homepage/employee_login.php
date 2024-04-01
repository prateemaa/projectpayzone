<?php
session_start();
include 'config.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql="SELECT * FROM employee_register WHERE email='$email' and password ='$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
       $row = mysqli_fetch_assoc($result);
       $_SESSION['islogin'] = true;
       $_SESSION['id'] = $row['id']; // Add the employee ID to the session
       $_SESSION['name'] = $row['name']; 
       $_SESSION['email'] = $row['email'];
       $_SESSION['address'] = $row['address'];
       $_SESSION['phone'] = $row['phone'];
       $_SESSION['designation'] = $row['designation'];
       $_SESSION['photograph'] = $row['photograph']; 
       
       // Redirect to employee dashboard
       header("Location: ./../employee/employeedashboard.php");
       exit;
    }else{
       $error = "Invalid email or password";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>
    <!-- CSS -->
    <link rel="stylesheet" href="employee_login_style.css"> 
</head>
<body>
    <div class="container">
        <h2>Employee Login</h2>

        <?php if (isset($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>

        <form action="employee_login.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <a href="#" class="forgot-pass">Forgot password?</a>
            <button type="submit" name="submit">Login</button>
        </form>
        <div class="bottom-link">
          Don't have an account?
          <a href="employee_register.php" id="register-link">Register</a>
        </div>
        
    </div>
</body>
</html>
