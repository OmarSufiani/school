<?php
// Start the session
session_start();

// Include your database connection file
include('../organize/db_config.php'); // Assuming you have a file to handle DB connection
include('../organize/header.php');
// Check if the user is logged in (session check for user_id)
if (!isset($_SESSION['user_id'])) {
    die('Student not logged in.');
}

// Initialize variables
$sAdmno = '';

// Check if the search form was submitted and get the admission number
if (isset($_POST['search'])) {
    $sAdmno = $_POST['sAdmno'];  // Get the admission number from the input
}

// Query to fetch exam details by admission number
if ($sAdmno != '') {
    $query = "SELECT * FROM exam WHERE sAdmno = ?";  // Modify to search by sAdmno
} else {
    $query = "SELECT * FROM exam";  // Default query to fetch all results
}

// Prepare the query
$stmt = $conn->prepare($query);

// Check if the query was prepared successfully
if ($stmt === false) {
    die('Error preparing the query: ' . $conn->error);
}

// Bind the sAdmno to the prepared statement (if the user is searching)
if ($sAdmno != '') {
    $stmt->bind_param('s', $sAdmno);  // Ensure sAdmno is treated as a string
}

// Execute the query
$stmt->execute();

// Get the results
$result = $stmt->get_result();

// Function to download the results as CSV
function downloadCSV($result) {
    // Open a file in write mode
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=exam_results.csv');

    // Create file pointer connected to the output stream
    $output = fopen('php://output', 'w');
    
    // Column headings (now including all the new fields)
    $columns = ['ID', 'Adm No', 'Year', 'Exam', 'Term', 'Class', 'Student Name', 'Score', 'Comment', 'Grade'];
    fputcsv($output, $columns);

    // Add the student's exam data to the CSV
    while ($row = $result->fetch_assoc()) {
        $data = [
            $row['id'],
            $row['sAdmno'],
            $row['year'],
            $row['exam'],
            $row['term'],
            $row['class'],
            $row['sName'],
            $row['score'],
            $row['comment'],
            $row['grade']
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
    <title>Exam Results</title>
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

        <!-- Search Form to find results by Admission Number -->
        <form action="" method="post">
            <div class="form-group">
                <label for="sAdmno">Enter Admission Number:</label>
                <input type="text" class="form-control" id="sAdmno" name="sAdmno" value="<?php echo htmlspecialchars($sAdmno); ?>" required>
            </div>
            <button type="submit" name="search" class="btn btn-primary">Search</button>
        </form>

        <!-- Display Exam Results -->
        <?php if ($result->num_rows > 0): ?>
            <!-- Table to display the results -->
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>#</th>
                        
                        <th>Year</th>
                        <th>Exam</th>
                        <th>Term</th>
                        <th>Class</th>
                        <th>Student Name</th>
                        <th>Score</th>
                        <th>Comment</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                           
                            <td><?php echo htmlspecialchars($row['year']); ?></td>
                            <td><?php echo htmlspecialchars($row['exam']); ?></td>
                            <td><?php echo htmlspecialchars($row['term']); ?></td>
                            <td><?php echo htmlspecialchars($row['class']); ?></td>
                            <td><?php echo htmlspecialchars($row['sName']); ?></td>
                            <td><?php echo htmlspecialchars($row['score']); ?></td>
                            <td><?php echo htmlspecialchars($row['comment']); ?></td>
                            <td><?php echo htmlspecialchars($row['grade']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <!-- Download button -->
            <form action="" method="post">
                <button type="submit" name="download" class="btn btn-success mt-3">Download Results (CSV)</button>
            </form>

            <br>
            <a href="../organize/homepage.php" class="btn btn-secondary mt-3" style="background-color: #6c757d; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Back</a>
        <?php else: ?>
            <p>No exam results found for this Admission Number.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Include Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
