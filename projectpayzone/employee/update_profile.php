<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayZone</title>
    <link rel="stylesheet" href="update_profile.css">
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <h2>Edit Information</h2>
            <form action="update_info.php" method="post">
                <!-- Edit Information form fields -->
                <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($_SESSION['name']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($_SESSION['address']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone No.:</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($_SESSION['phone']); ?>"  required>
                </div>
                <div class="form-group">
                    <label for="designation">Designation:</label>
                    <input type="text" id="designation" name="designation" value="<?php echo htmlspecialchars($_SESSION['designation']); ?>" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit">Save Changes</button>
                </div>
            </form>
        </div>
        <div class="form-wrapper">
            <h2>Change Password</h2>
            <?php if (isset($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>

        <?php if (isset($success)) { ?>
            <p style="color: green;"><?php echo $success; ?></p>
        <?php } ?>
            <form action="change_password.php" method="post">
                <!-- Change Password form fields -->
                <div class="form-group">
                    <label for="current_password">Current Password:</label>
                    <input type="password" id="current_password" name="current_password" required>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password:</label>
                    <input type="password" id="new_password" name="new_password" required>
                </div>
                <div class="form-group">
                <label for="confirm_password">Confirm New Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
                <div class="form-group">
                    <button type="submit" name="submit">Change Password</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html> 