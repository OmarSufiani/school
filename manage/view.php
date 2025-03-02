<?php
// Assuming you have a separate database connection file db_config.php
include('../organize/db_config.php');
include('../organize/header.php');

// Check if the form is submitted
if (isset($_POST['view_students'])) {
    // Query to get all students from the all_students table
    $query = "SELECT id, assno, admno, name, stream, gender FROM all_students";
    
    // Prepare and execute the query
    if ($result = $conn->query($query)) {
        // Check if there are any rows
        if ($result->num_rows > 0) {
            // Start the HTML table to display data
            echo "<h1>Student List</h1>";
            echo "<table border='1' cellpadding='10' cellspacing='0'>";
            echo "<tr><th>Student ID</th><th>Admission Number</th><th>Ass. No</th><th>Student Name</th><th>Stream</th><th>Gender</th></tr>";

            // Fetch each row and display it in the table
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";            // Displaying student ID
                echo "<td>" . $row['admno'] . "</td>";          // Displaying admission number
                echo "<td>" . $row['assno'] . "</td>";          // Displaying assigned number
                echo "<td>" . $row['name'] . "</td>";           // Displaying student name
                echo "<td>" . $row['stream'] . "</td>";         // Displaying stream
                echo "<td>" . $row['gender'] . "</td>";         // Displaying gender
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
<a href="../organize/homepage.php" class="btn btn-secondary mt-3" style="background-color: #6c757d; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Go Back
</a>
    <input type="submit" name="view_students" value="View All Students">
</form>

</body>
</html>
