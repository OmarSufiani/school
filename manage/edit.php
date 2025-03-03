<?php
// Assuming you have a separate database connection file db_connection.php
include('../organize/db_config.php');

// Define a variable to track if we should show the edit form
$show_edit_form = false;
$student = null;

// Check if admno is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['admno'])) {
    // Get the admno from POST request
    $admno = $_POST['admno'];

    // Fetch student data for editing
    $query = "SELECT admno, assno, name, stream, gender FROM all_students WHERE admno = ?";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $admno); // Bind the admno parameter

        $stmt->execute();
        // Make sure to match the number of columns returned by the query
        $stmt->bind_result($db_admno, $db_assno, $db_name, $db_stream, $db_gender);

        // Fetch the result
        if ($stmt->fetch()) {
            $student = [
                'admno' => $db_admno,
                'assno' => $db_assno,
                'name' => $db_name,
                'stream' => $db_stream,
                'gender' => $db_gender
            ];
            $show_edit_form = true; // Show the edit form if student is found
        }

        $stmt->close();
    }
}

// Update student details if form is submitted
if ($show_edit_form && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    // Get the updated data from the form
    $assno = $_POST['assno'];
    $name = $_POST['name'];
    $stream = $_POST['stream'];
    $gender = $_POST['gender'];

    // Update the student record in the database
    $updateQuery = "UPDATE all_students SET assno = ?, name = ?, stream = ?, gender = ? WHERE admno = ?";

    if ($stmt = $conn->prepare($updateQuery)) {
        $stmt->bind_param("sssss", $assno, $name, $stream, $gender, $admno);
        if ($stmt->execute()) {
            echo "<p class='success'>Student updated successfully!</p>";
        } else {
            echo "<p class='error'>Error: " . $stmt->error . "</p>";
        }
        $stmt->close();
    }

    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
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
        }

        form {
            max-width: 600px;
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

        .cancel-btn {
            background-color: #ff3b30;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            margin-top: 10px;
        }

        .cancel-btn:hover {
            background-color: #ff1e1a;
        }
    </style>
</head>
<body>

<h1>Edit Student Details</h1>

<?php if (!$show_edit_form): ?>
    <!-- Form to Enter Admission Number (admno) -->
    <form action="" method="POST">
        <label for="admno">Enter Admission Number:</label>
        <input type="text" name="admno" required>

        <input type="submit" value="Search Student">
        
        <br>
        <a href="../organize/homepage.php" class="btn btn-secondary mt-3" style="background-color: #6c757d; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Back</a>
    </form>
<?php elseif ($student): ?>
    <!-- Form to Edit Student Details -->
    <form action="" method="POST">
        <label for="assno">Ass/No:</label>
        <input type="text" name="assno" value="<?php echo $student['assno']; ?>" required>

        <label for="name">Student Name:</label>
        <input type="text" name="name" value="<?php echo $student['name']; ?>" required>

        <label for="stream">Stream:</label>
        <input type="text" name="stream" value="<?php echo $student['stream']; ?>" required>

        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="Male" <?php echo $student['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo $student['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
        </select>

        <input type="hidden" name="admno" value="<?php echo $student['admno']; ?>">
        <input type="submit" name="update" value="Update Student">
        
        <br>
        <a href="javascript:window.history.back();" class="cancel-btn">Cancel</a> <!-- Cancel Button to go back -->
    </form>
<?php else: ?>
    <p>Student not found!</p>
<?php endif; ?>

</body>
</html>
