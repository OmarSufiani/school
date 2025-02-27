<?php
// Start the session
session_start();

// Include your database connection file
include('../organize/db_config.php'); // Assuming you have a file to handle DB connection
include('../organize/header.php');

// Check if user ID is set in session
if (!isset($_SESSION['user_id'])) {
    die('Student not logged in.');
}

$user_id = $_SESSION['user_id']; // Get the student ID from the session

// Query to fetch all subjects (exam results) for the student, including registration number
$query = "SELECT * FROM academics WHERE std_id = ?"; // Assuming 'academics' is your table

// Prepare the query
$stmt = $conn->prepare($query);

// Check if the query was prepared successfully
if ($stmt === false) {
    die('Error preparing the query: ' . $conn->error);
}

// Bind the user ID to the prepared statement
$stmt->bind_param('i', $user_id); // Ensure user_id is an integer

// Execute the query
$stmt->execute();

// Get the results
$result = $stmt->get_result();

// Function to download the results as CSV
function downloadCSV($result) {
    // Open a file in write mode
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=subjects_results.csv');

    // Create file pointer connected to the output stream
    $output = fopen('php://output', 'w');
    
    // Column headings (now including REG.NO)
    $columns = ['REG.NO', 'Course Name', 'Score', 'Grade', 'Semester', 'Year'];
    fputcsv($output, $columns);

    // Add the student's exam data to the CSV
    while ($row = $result->fetch_assoc()) {
        $data = [
            $row['student_regno'], // Assuming 'student_regno' is the registration number column
            $row['course_name'],
            $row['score'],
            $row['grade'],
            $row['semester'],
            $row['year']
        ];
        fputcsv($output, $data);
    }

    // Close the file pointer
    fclose($output);
    exit();
}

// Check if the download button is clicked
if (isset($_POST['download'])) {
    downloadCSV($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Subject Results</title>
    <!-- Include Bootstrap or your preferred CSS for styling -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Additional styling for the form container */
        .form-container {
            max-width: 1000px; /* Limit the container width */
            margin: 0 auto; /* Center the form horizontally */
            padding: 30px;
            margin-top: 90px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2 class="mt-5 text-center">Exam Results</h2>

        <!-- Form to display subject results -->
        <form action="" method="post">
            <?php if ($result->num_rows > 0): ?>
                <!-- Table to display the results -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>REG.NO</th>
                            <th>Course Name</th>
                            <th>Score</th>
                            <th>Grade</th>
                            <th>Semester</th>
                            <th>Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['student_regno']); ?></td> <!-- Display Registration Number -->
                                <td><?php echo htmlspecialchars($row['course_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['score']); ?></td>
                                <td><?php echo htmlspecialchars($row['grade']); ?></td>
                                <td><?php echo htmlspecialchars($row['semester']); ?></td>
                                <td><?php echo htmlspecialchars($row['year']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

                <!-- Download button -->
                <button type="submit" name="download" class="btn btn-success mt-3">Download Results (CSV)</button>
            <?php else: ?>
                <p>No exam results available for this student.</p>
            <?php endif; ?>
        </form>
    </div>
</div>

<!-- Include Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
