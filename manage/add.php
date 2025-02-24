<?php
include('../organize/header.php');
include('../organize/db_config.php'); // Ensure db_config.php exists and connects to the database

// Collect data from the form when the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $subject_name = $_POST['subject_name'] ?? '';
    $code = $_POST['code'] ?? '';

    // Basic validation
    $errors = [];
    
    if (empty($subject_name)) {
        $errors[] = "Subject name is required.";
    }

    if (empty($code)) {
        $errors[] = "Subject code is required.";
    } elseif (!preg_match('/^[A-Za-z0-9]+$/', $code)) { // Ensure code is alphanumeric
        $errors[] = "Subject code must be alphanumeric.";
    }

    // If there are no errors, proceed with database insertion
    if (empty($errors)) {
        // Ensure the connection is established
        if ($conn) {
            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO subjects (subject_name, code) VALUES (?, ?)");
            $stmt->bind_param("ss", $subject_name, $code);

            if ($stmt->execute()) {
                $successMessage = "New record created successfully";
            } else {
                $errorMessage = "Error: " . $stmt->error;
            }

            // Close the statement and connection
            $stmt->close();
        } else {
            $errorMessage = "Database connection failed.";
        }

        // Close the connection after the query
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subjects</title>
    <style>
        /* General page styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            padding: 20px;
            color: #444;
        }

        /* Form container */
        .form-container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            margin-top: 90px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Label styling */
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        /* Input field styling */
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="text"]:focus {
            border-color: #007BFF;
            outline: none;
        }

        /* Submit button styling */
        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Responsive styling */
        @media screen and (max-width: 600px) {
            .form-container {
                padding: 15px;
                width: 90%;
            }

            input[type="submit"] {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
    
        <!-- Display Error Message if validation failed -->
        <?php if (!empty($errors)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php 
                foreach ($errors as $error) {
                    echo "<p style='color:red;'>$error</p>";
                }
            ?>
        </div>
        <?php } ?>

        <!-- Display Success Message if the user was added successfully -->
        <?php if (isset($successMessage)) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $successMessage; ?>
        </div>
        <?php } ?>

        <form action="" method="POST">
            <h1>Add Unit Details</h1>
            <label for="Subject_name">Subject Name:</label>
            <input type="text" name="subject_name" required><br>

            <label for="Subject_Code">Subject Code:</label>
            <input type="text" name="code" required><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
