<?php
include('header.php');
include('db_config.php');
include('sidebar2.php');
//include('sidebar2.php');
// Directory where your files are stored
$directory = 'uploads/files/';  // Change this to your folder path

// Check if the form is submitted to handle the file download
if (isset($_POST['download_file'])) {
    $file = $_POST['file'];  // Get the selected file name from the form
    $filePath = $directory . basename($file);  // Build the full file path

    // Check if the file exists
    if (file_exists($filePath)) {
        // Set headers for downloading the file
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Content-Length: ' . filesize($filePath));

        // Read the file and send it to the browser
        readfile($filePath);
        exit();
    } else {
        echo "File not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download File</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        form{

            max-width: 400px;
    margin: 40px auto;
    background-color: #fff;
    padding: 30px;
    margin-top: 100px; /* This ensures the form is below the header */
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);  
        }
    </style>
</head>
<body>


    <!-- Form to select a file to download -->
    <form action="" method="POST">

    
<div class="container mt-5">
    <h2>Download File</h2>

    <!-- Display any error or success messages here -->
    <?php if (isset($errorMessage)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
    <?php } ?>

    <?php if (isset($successMessage)) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $successMessage; ?>
        </div>
    <?php } ?>
        <div class="mb-3">
            <label for="file" class="form-label">Select a file to download:</label>
            <select class="form-select" id="file" name="file" required>
                <option value="">Choose a file</option>

                <?php
                // Open the directory and get the list of files
                if ($handle = opendir($directory)) {
                    while (false !== ($file = readdir($handle))) {
                        // Skip '.' and '..'
                        if ($file != '.' && $file != '..') {
                            echo "<option value=\"$file\">$file</option>";
                        }
                    }
                    closedir($handle);
                }
                ?>
            </select>
        </div>
        <button type="submit" name="download_file" class="btn btn-primary">Download</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
