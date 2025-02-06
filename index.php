<?php
session_start();

// Prevent caching of the page
header("Cache-Control: no-cache, no-store, must-revalidate"); // Disable caching
header("Pragma: no-cache"); // For older browsers
header("Expires: 0"); // Expire immediately

// If user is already logged in, redirect to homepage
if (isset($_SESSION['user_id'])) {
    header("Location: homepage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Dashboard</h3>
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="Register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
            
        </ul>
    </div>

    <!-- Main content -->
    <div class="main-content">
        <!-- Top bar -->
        <div class="top-bar">
            <div class="top-bar-left">
                <span>Welcome, User!</span>
            </div>
            <div class="top-bar-right">
                <span>Notification</span> | <span>Messages</span>
            </div>
        </div>

        <!-- Page content -->
        <div class="page-content">
            <h1>Welcome to the Dashboard</h1>
            <p>Here you can manage your profile, settings, and more.</p>
        </div>
    </div>
</body>
</html>
