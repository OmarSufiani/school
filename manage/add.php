<?php
// Assuming you have a separate database connection file db_connection.php
include('../organize/db_config.php');
include('../organize/header.php');

$successMessage = '';
$errorMessage = '';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $sAdmno = $_POST['sAdmno'];
    $year = $_POST['year'];
    $exam = $_POST['exam'];
    $term = $_POST['term'];
    $class = $_POST['class'];
    $sName = $_POST['sName'];
    $score = $_POST['score'];
    $comment = $_POST['comment'];
    $grade = $_POST['grade'];

    // Validate form fields
    if (empty($sAdmno) || empty($year) || empty($exam) || empty($term) || empty($class) || empty($sName) || empty($score) || empty($comment) || empty($grade)) {
        $errorMessage = "All fields are required!";
    } elseif (!is_numeric($score) || $score < 0 || $score > 100) {
        $errorMessage = "Please enter a valid score between 0 and 100.";
    } elseif (!is_numeric($year) || $year < 2000 || $year > 2100) {
        $errorMessage = "Please enter a valid year.";
    } else {
        // Prepare the SQL query to insert the data into the database
        $query = "INSERT INTO exam (sAdmno, year, exam, term, class, sName, score, comment, grade)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare the statement
        if ($stmt = $conn->prepare($query)) {
            // Bind parameters to the prepared statement
            $stmt->bind_param("sssssssss", $sAdmno, $year, $exam, $term, $class, $sName, $score, $comment, $grade);

            // Execute the statement
            if ($stmt->execute()) {
                $successMessage = "Exam added successfully!";
            } else {
                $errorMessage = "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            $errorMessage = "Error: " . $conn->error;
        }
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
        input[type="number"],
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

    <!-- Display success or error messages -->
    <?php if ($successMessage): ?>
        <p class="success"><?php echo $successMessage; ?></p>
    <?php endif; ?>

    <?php if ($errorMessage): ?>
        <p class="error"><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        
        <label for="sAdmno">Admission Number:</label>
        <input type="text" name="sAdmno" required>
        
        <label for="year">Year:</label>
        <input type="number" name="year" required>

        <label for="exam">Exam:</label>
        <select name="exam" required>
            <option value="MidTerm">MidTerm</option>
            <option value="EndTerm">EndTerm</option>
        </select>

        <label for="term">Term:</label>
        <select name="term" required>
            <option value="I">I</option>
            <option value="II">II</option>
            <option value="III">III</option>
        </select>

        <label for="class">Stream:</label>
        <select name="class" required>
            <option value="7B">7B</option>
            <option value="7R">7R</option>
            <option value="8B">8B</option>
            <option value="8R">8R</option>
            <option value="9B">9B</option>
            <option value="9R">9R</option>
        </select>
        
        <label for="sName">Subject Name:</label>
        <select name="sName" required>
            <option value="MAT">MAT</option>
            <option value="ENG">ENG</option>
            <option value="KISW">KISW</option>
            <option value="INT-SCI">INT-SCI</option>
            <option value="PRE-TECH">PRE-TECH</option>
            <option value="AGRI">AGRI</option>
            <option value="SST">SST</option>
            <option value="RE">RE</option>
            <option value="CAS">CAS</option>
        </select>

        <label for="score">Score:</label>
        <input type="number" name="score" required>

        <label for="comment">Comment:</label>
        <select name="comment" required>
            <option value="EXCELLENT">EXCELLENT</option>
            <option value="GOOD">GOOD</option>
            <option value="AVERAGE">AVERAGE</option>
            <option value="POOR">POOR</option>
        </select>

        <label for="grade">Grade:</label>
        <input type="text" name="grade" required>
        
        <input type="submit" name="submit" value="Add Student">
        
        <br>
        <a href="../organize/homepage.php" class="btn btn-secondary mt-3" style="background-color: #6c757d; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Back</a>
    </form>

</body>
</html>
