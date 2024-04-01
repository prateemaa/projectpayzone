<?php
session_start();
include 'config.php';

if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql="SELECT * FROM adminlogin WHERE email='$email'";
  $result = mysqli_query($conn,$sql);
  if($row = $result->fetch_assoc()){
    if($row["password"]== $password){
      $_SESSION['islogin'] = true;
      header("Location:admin_dashboard.php");
      exit;
    }else{
      $error = "Invalid email or password";
    }
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
    <title>Admin Login</title>
    <!-- CSS -->
    <link rel="stylesheet" href="admin_style.css"> 
</head>
<body>
    <div class="container">
        <h2>Admin Login</h2>

        <?php if (isset($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>
        <form action="admin_login.php" method="post"> <!-- Corrected form action -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="submit">Login</button>
        </form>
        <a href="../index.php">Back to Home Page</a>
    </div>
</body>
</html>
