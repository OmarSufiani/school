<?php


//include('../header.php');
include('sidebar2.php');
// Define the directory where files will be uploaded
$targetDir = "uploads/files/";

// Check if the directory exists, if not create it
if (!is_dir($targetDir)) {
    if (!mkdir($targetDir, 0777, true)) {
        die("Failed to create the directory: $targetDir");
    }
}

// Check if the file input field is set and if the file was uploaded
if (isset($_FILES["file"])) {
    // Get the uploaded file's name and its temporary location
    $targetFile = $targetDir . basename($_FILES["file"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is a valid type (optional)
    $allowedTypes = array("jpg", "png", "jpeg", "pdf", "txt", "doc", "docx");
    if (!in_array($fileType, $allowedTypes)) {
        echo "Sorry, only JPG, PNG, PDF, TXT, DOC, and DOCX files are allowed.";
        exit();
    }

    // Check if the file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        exit();
    }

    // Try to upload the file using the correct tmp_name
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    echo "No file was uploaded.";
}
?>

<style>
    form{
          max-width: 400px;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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


    
    <!-- File upload form with enctype="multipart/form-data" -->
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="container mt-5">
        <div>
          <h2>Upload a File</h2>
        </div>
        <br>
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
