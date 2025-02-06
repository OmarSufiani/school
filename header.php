<?php
include('db_config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System Dashboard</title>
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
        }
        
        .header {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
        }
        
        .header h1 {
            margin: 0;
        }

        /* Navigation bar */
        .nav-bar {
            display: flex;
            justify-content: flex-end;
            background-color: #333;
        }

        .nav-bar a {
            padding: 14px 20px;
            text-decoration: none;
            color: white;
            text-align: center;
            font-size: 18px;
        }

        .nav-bar a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Profile dropdown */
        .profile {
            position: relative;
            display: inline-block;
        }

        .profile-dropdown {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 160px;
            z-index: 1;
        }

        .profile:hover .profile-dropdown {
            display: block;
        }

        .profile-dropdown a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .profile-dropdown a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>
<body>

<!-- Header -->
<div class="header">
    <h1>School Management System</h1>
</div>

<!-- Navigation Bar -->
<div class="nav-bar">
    <div class="profile">
        <!-- Display the username if logged in -->
        <?php if (isset($_SESSION['username'])): ?>
            <a href="javascript:void(0)" class="profile-link"><?php echo $_SESSION['username']; ?></a>
            <div class="profile-dropdown">
                <a href="profile.php">Profile</a>
                <a href="logout.php">Logout</a>
            </div>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
