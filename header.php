<?php

session_start();
include('db_config.php');
if (isset($_SESSION['first_name'])) {
    $first_name = $_SESSION['first_name'];
} else {
    $firstname = 'Guest'; // Default for when the user is not logged in
}
?>

<style>
    /* Basic styling for the header */

    .header {
        background-color: rgb(63, 64, 99);
        color: white;
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 100;
    }


    .logo {
        font-size: 24px;
    }

    .profile-dropdown {
        position: relative;
        display: inline-block;
    }

    .profile-btn {
        background-color: rgb(63, 64, 99);
        color: white;
        padding: 10px 15px;
        font-size: 16px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
        right: 0;
        padding: 10px;
    }

    .profile-dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }
</style>
<header class="header">
    <div class="logo">School Management System</div>
    
    <!-- Profile Dropdown -->
    <div class="profile-dropdown">
        <!-- Profile button with image and username -->
        <button class="profile-btn">
            <img src="#"  class="profile-icon"> 
            Hello, <?php echo ($first_name); ?>
        </button>
        <div class="dropdown-content">
            <a href="#">My Profile</a>
            <a href="#">Settings</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</header>
