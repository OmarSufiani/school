<?php
session_start();
include('header.php');
include('db_config.php');


// Check if the user is logged in (i.e., if session variable exists)
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// Prevent caching of the page to avoid back/forward issues
header("Cache-Control: no-cache, no-store, must-revalidate"); // Disable caching
header("Pragma: no-cache"); // For older browsers
header("Expires: 0"); // Expire immediately


// Query to count the number of students
$sql_students = "SELECT COUNT(*) AS student_count FROM students";
$result_students = $conn->query($sql_students);
$students = $result_students->fetch_assoc()['student_count'];

// Query to count the number of accounts
$sql_accounts = "SELECT COUNT(*) AS account_count FROM accounts";
$result_accounts = $conn->query($sql_accounts);
$accounts = $result_accounts->fetch_assoc()['account_count'];

// Query to count the number of staff members
$sql_teachers = "SELECT COUNT(*) AS teachers_count FROM accounts";
$result_teachers = $conn->query($sql_teachers);
$teachers = $result_teachers->fetch_assoc()['teachers_count'];

// Query to count the number of users
$sql_users = "SELECT COUNT(*) AS user_count FROM users"; // Assuming you have a 'users' table
$result_users = $conn->query($sql_users);
$users = $result_users->fetch_assoc()['user_count'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Basic styling for the dashboard */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .dashboard {
            display: flex;
            justify-content: space-around;
            padding: 20px;
        }

        .box {
            background-color: #4CAF50;
            color: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            width: 200px;
            margin: 10px;
        }

        .box h3 {
            margin: 0;
            font-size: 24px;
        }

        .box p {
            font-size: 18px;
            margin-top: 10px;
        }


        .box2 {
            background-color:orange;
            color: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            width: 200px;
            margin: 10px;
        }

        .box2 h3 {
            margin: 0;
            font-size: 24px;
        }

        .box2 p {
            font-size: 18px;
            margin-top: 10px;
        }

        .box3 {
            background-color:blue;
            color: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            width: 200px;
            margin: 10px;
        }

        .box3 h3 {
            margin: 0;
            font-size: 24px;
        }

        .box3 p {
            font-size: 18px;
            margin-top: 10px;
        }

        .box4 {
            background-color:teal;
            color: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            width: 200px;
            margin: 10px;
        }

        .box4 h3 {
            margin: 0;
            font-size: 24px;
        }

        .box4 p {
            font-size: 18px;
            margin-top: 10px;
        }




    </style>
    

    </head>
<body>

    <div class="dashboard">
        <div class="box">
            <h3>Students</h3>
            <p><?php echo $students; ?></p>
        </div>

        <div class="box2">
            <h3>Accounts</h3>
            <p><?php echo $accounts; ?></p>
        </div>

        <div class="box3">
            <h3>Teachers</h3>
            <p><?php echo $teachers; ?></p>
        </div>

        <div class="box4">
            <h3>Users</h3>
            <p><?php echo $users; ?></p>
        </div>
    </div>

</body>
</html>



      