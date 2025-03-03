<?php
// Assuming you have a separate database connection file db_connection.php
include('../organize/db_config.php');
include('../organize/header.php');

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $admno = $_POST['admno'];
    $assno = $_POST['assno'];
    $name = $_POST['name'];
   
    $stream = $_POST['stream'];
    $gender = $_POST['gender'];
   

    // Prepare the SQL query to insert the data into the database
    $query = "INSERT INTO all_students (admno,assno,name, stream, gender)
              VALUES (?, ?, ?, ?, ?)";

    // Prepare the statement
    if ($stmt = $conn->prepare($query)) {
        // Bind parameters to the prepared statement
        $stmt->bind_param("sssss", $admno,$assno, $name, $stream,$gender);
        
        
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

    <h1>Register New Student</h1>

    <form action="" method="POST">
        
        <label for="admno">Admission Number:</label>
        <input type="text" name="admno" required>
        
        <label for="first_name">Ass/No:</label>
        <input type="text" name="assno" required>

        <label for="name">Student_Name:</label>
        <input type="text" name="name" required>


        <label for="stream">Stream:</label>
        <input type="text" name="stream" required>

    

        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
    
        </select>

       

        <input type="submit" name="submit" value="Submit">
        <br>
        <a href="../organize/homepage.php" class="btn btn-secondary mt-3" style="background-color: #6c757d; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;"> Back
        </a>
    </form>

</body>
</html>
