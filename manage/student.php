<?php
// Assuming you have a separate database connection file db_connection.php
include('../organize/db_config.php');
include('../organize/header.php');

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $reg_no = $_POST['reg_no'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $sEmail = $_POST['sEmail'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $unitCode = $_POST['unitCode'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $grade = $_POST['grade'];
    $status = $_POST['status'];

    // Prepare the SQL query to insert the data into the database
    $query = "INSERT INTO students (reg_no, first_name, last_name, sEmail, date_of_birth, gender, unitCode, address, phone_number, grade, status)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    if ($stmt = $conn->prepare($query)) {
        // Bind parameters to the prepared statement
        $stmt->bind_param("sssssssssss", $reg_no, $first_name, $last_name, $sEmail, $date_of_birth, $gender, $unitCode, $address, $phone_number, $grade, $status);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "<p class='success'>Student added successfully!</p>";
        } else {
            echo "<p class='error'>Error: " . $stmt->error . "</p>";
        }
        
        // Close the statement
        $stmt->close();
    } else {
        echo "<p class='error'>Error: " . $conn->error . "</p>";
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
    <title>Add Student</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        /* Body Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            padding: 20px;
        }

        /* Form Styling */
        h1 {
            text-align: center;
            margin-bottom: 30px;
            margin-top: 90px;
        }

        form {
            max-width: 600px;
            margin-top: 90px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="submit"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .error {
            color: red;
            font-size: 14px;
            text-align: center;
        }

        .success {
            color: green;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>Add Student</h1>

    <form action="" method="POST">
        <label for="reg_no">Registration No:</label>
        <input type="text" name="reg_no" required>

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>

        <label for="sEmail">Email:</label>
        <input type="email" name="sEmail" required>

        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" name="date_of_birth" required>

        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>

        <label for="unitCode">Unit Code:</label>
        <input type="text" name="unitCode" required>

        <label for="address">Address:</label>
        <textarea name="address"></textarea>

        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number">

        <label for="grade">Grade:</label>
        <input type="text" name="grade">

        <label for="status">Status:</label>
        <select name="status">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>

        <input type="submit" name="submit" value="Add Student">
    </form>

</body>
</html>
