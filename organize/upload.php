<?php
// Database connection details
include('db_config.php');
include('header.php');
include('sidebar2.php');
// Define the directory where files will be uploaded
$targetDir = "../uploads/files/";

// Ensure the directory exists, create it if not
if (!is_dir($targetDir)) {
    if (!mkdir($targetDir, 0777, true)) {
        $errorMessage = "Failed to create directory: $targetDir";
    }
}

// Initialize an empty error message
$errorMessage = "";

// Check if a file was uploaded
if (isset($_FILES["file"])) {
    // Get file information
    $fileName = basename($_FILES["file"]["name"]);
    $targetFile = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file type is allowed
    $allowedTypes = array("jpg", "png", "jpeg", "pdf", "txt", "doc", "docx");
    if (!in_array($fileType, $allowedTypes)) {
        $errorMessage = "Sorry, only JPG, PNG, PDF, TXT, DOC, and DOCX files are allowed.";
    }

    // Check if the file already exists
    if (file_exists($targetFile)) {
        $errorMessage = "Sorry, file already exists.";
    }

    // Try to upload the file
    if ($errorMessage == "" && move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        // Prepare SQL to insert file info into the database
        $stmt = $conn->prepare("INSERT INTO uploads (file_name, file_path, file_type) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $fileName, $targetFile, $fileType);

        // Execute the query
        if ($stmt->execute()) {
            $successMessage = "The file " . htmlspecialchars($fileName) . " has been uploaded successfully";
        } else {
            $errorMessage = "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else if ($errorMessage == "") {
        $errorMessage = "Sorry, there was an error uploading your file.";
    }
} else {
    $errorMessage = "No file was uploaded.";
}

// Close the database connection
$conn->close();
?>

<style>
    form {
    max-width: 400px;
    margin: 40px auto;
    background-color: #fff;
    padding: 30px;
    margin-top: 100px; /* This ensures the form is below the header */
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


    .alert {
        margin-bottom: 20px;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
   
    <!-- File upload form with enctype="multipart/form-data" -->
    <form action="" method="POST" enctype="multipart/form-data">
    <div>
        <h2>Upload a File</h2>
    </div>
    <br>

    <!-- Display Error Message if Any -->
    <?php if (!empty($errorMessage)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
    <?php } ?>

    <!-- Display Success Message if File is Uploaded Successfully -->
    <?php if (isset($successMessage)) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $successMessage; ?>
        </div>
    <?php } ?>



        <div class="mb-3">
            <label for="file" class="form-label">Choose a file to upload:</label>
            <input type="file" class="form-control" id="file" name="file" required>

            
        </div>
        <button type="submit" class="btn btn-primary">Upload File</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




