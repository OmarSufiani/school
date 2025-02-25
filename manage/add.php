
<?php

include('../organize/db_config.php');
// Collect data from form
include('../organize/header.php');
if (isset($_POST['submit'])) {
$english = $_POST['english'];
 $kiswahili = $_POST['kiswahili'];
$maths = $_POST['maths'];
$chemistry = $_POST['chemistry'];
$physics = $_POST['physics'];
$biology = $_POST['biology'];
$ire = $_POST['ire'];
$cre = $_POST['cre'];
$agriculture = $_POST['agriculture'];
$computer = $_POST['computer'];
$homescience = $_POST['homescience'];

// Insert data into the database
$sql = "INSERT INTO unit (english, kiswahili, maths, chemistry, physics, biology, ire, cre, agriculture, computer, homescience)
        VALUES ('$english', '$kiswahili', '$maths', '$chemistry', '$physics', '$biology', '$ire', '$cre', '$agriculture', '$computer', '$homescience')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
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
            margin-top: 90px;
            color: #444;
        }

        /* Form container */
        .form-container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
           
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
    <h1>Add Subject Details</h1>
    <div class="form-container">
        <form action="" method="POST">
            <label for="english">English:</label>
            <input type="text" id="english" name="english" required><br>

            <label for="kiswahili">Kiswahili:</label>
            <input type="text" id="kiswahili" name="kiswahili" required><br>

            <label for="maths">Maths:</label>
            <input type="text" id="maths" name="maths" required><br>

            <label for="chemistry">Chemistry:</label>
            <input type="text" id="chemistry" name="chemistry" required><br>

            <label for="physics">Physics:</label>
            <input type="text" id="physics" name="physics" required><br>

            <label for="biology">Biology:</label>
            <input type="text" id="biology" name="biology" required><br>

            <label for="ire">IRE:</label>
            <input type="text" id="ire" name="ire" required><br>

            <label for="cre">CRE:</label>
            <input type="text" id="cre" name="cre" required><br>

            <label for="agriculture">Agriculture:</label>
            <input type="text" id="agriculture" name="agriculture" required><br>

            <label for="computer">Computer:</label>
            <input type="text" id="computer" name="computer" required><br>

            <label for="homescience">Home Science:</label>
            <input type="text" id="homescience" name="homescience" required><br>

            <input type="submit" value="Submit">

            <br><br>
            <a href="../organize/homepage.php" class="btn btn-secondary mt-3" style="background-color: #6c757d; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;"> Back
            </a>
        </form>
    </div>
</body>
</html>
