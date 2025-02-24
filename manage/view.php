<?php
// Assuming you have a separate database connection file db_connection.php
include('../organize/db_config.php');
include('../organize/header.php');
// Check if the form is submitted
if (isset($_POST['view_students'])) {
    // Query to get all students from the database
    $query = "SELECT * FROM students";
    
    // Prepare and execute the query
    if ($result = $conn->query($query)) {
        // Check if there are any rows
        if ($result->num_rows > 0) {
            // Start the HTML table to display data
            echo "<h1>Student List</h1>";
            echo "<table border='1' cellpadding='10' cellspacing='0'>";
            echo "<tr><th>Student ID</th><th>Registration No</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Date of Birth</th><th>Gender</th><th>Phone Number</th><th>Units</th><th>Status</th></tr>";

            // Fetch each row and display it in the table
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['student_id'] . "</td>";
                echo "<td>" . $row['reg_no'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['sEmail'] . "</td>";
                echo "<td>" . $row['date_of_birth'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                
                echo "<td>" . $row['phone_number'] . "</td>";
                echo "<td>" . $row['units'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "</tr>";
            }

            // Close the table after displaying all rows
            echo "</table>";
        } else {
            // If no students are found, display a message
            echo "<p>No students found in the database.</p>";
        }

        // Free the result set
        $result->free();
    } else {
        // If there was an error with the query
        echo "<p>Error: " . $conn->error . "</p>";
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
            margin-top: 90px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        p {
            text-align: center;
            font-size: 16px;
            color: #666;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<!-- Form to trigger the view action -->
<form action="" method="POST">
    <input type="submit" name="view_students" value="View All Students">
</form>

</body>
</html>
