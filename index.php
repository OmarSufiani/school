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
    <!-- Bootstrap CSS (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 30px 20px;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            transition: all 0.3s;
        }

        .sidebar-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .sidebar h3 {
            font-size: 24px;
            font-weight: bold;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            transition: 0.3s;
        }

        .sidebar ul li a:hover {
            color: #18bc9c;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
            transition: all 0.3s;
        }

        /* Top Bar */
        .top-bar {
            display: flex;
            justify-content: space-between;
            background-color: #2c3e50;
            padding: 15px;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .top-bar-left span {
            font-weight: bold;
        }

        .top-bar-right {
            display: flex;
            gap: 15px;
        }

        /* Page Content */
        .page-content {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            margin: 0 auto;
        }

        .page-content h1 {
            font-size: 36px;
            color: #2c3e50;
        }

        .page-content p {
            font-size: 18px;
            color: #7f8c8d;
        }

        /* Hover Effects for Sidebar */
        .sidebar:hover {
            width: 300px;
        }

        /* Mobile View */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
            }

            .main-content {
                margin-left: 0;
            }

            .top-bar {
                flex-direction: column;
                align-items: center;
            }

            .top-bar-right {
                margin-top: 10px;
            }
        }
    </style>
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
           
            <li><a href="login.php">Login</a></li>
        </ul>
    </div>

    <!-- Main content -->
    <div class="main-content">
        <!-- Top bar -->
        <div class="top-bar">
            <div class="top-bar-left">
                <span>Welcome||</span>
            </div>
            <div class="top-bar-right">
                <span>Notification</span> | <span>Messages</span>
            </div>
        </div>
        <img src="./images/admin.jpg">
        </div>
    </div>

</body>
</html>
