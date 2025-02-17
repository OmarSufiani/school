<?php 
include('db_config.php');
// Get the registration number (regno) from the URL parameter
$regno = $_GET['regno'];

// SQL query to fetch student details by regno
$sql = "SELECT * FROM students WHERE regno = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $regno);
$stmt->execute();
$result = $stmt->get_result();

// Check if a student is found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Return student data as a JSON response
    echo json_encode($row);
} else {
    // If no student is found, return an error message
    echo json_encode(["error" => "Student not found"]);
}

// Close connection
$conn->close();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Results</title>
    <style>
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 15px 32px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            margin: 20px;
        }

        .form-container, .result-container {
            display: none;
            margin-top: 20px;
        }

        .form-container form {
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-container button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .result-container {
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
        }

        .result-container h3 {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <button class="button" onclick="toggleForm()">Enter Student Regno</button>

    <div class="form-container" id="formContainer">
        <form id="studentForm" onsubmit="getStudentResults(event)">
            <h2>Enter Regno</h2>
            <label for="regno">Registration Number:</label>
            <input type="text" id="regno" name="regno" required>

            <button type="submit">Submit</button>
        </form>
    </div>

    <div class="result-container" id="resultContainer">
        <h3>Student Results</h3>
        <p><strong>Name:</strong> <span id="studentName"></span></p>
        <p><strong>Grade:</strong> <span id="studentGrade"></span></p>
        <p><strong>Score:</strong> <span id="studentScore"></span></p>
    </div>

    <script>
        // Function to toggle the form visibility
        function toggleForm() {
            var formContainer = document.getElementById('formContainer');
            if (formContainer.style.display === "none" || formContainer.style.display === "") {
                formContainer.style.display = "block";
            } else {
                formContainer.style.display = "none";
            }
        }

        // Function to get student results from the PHP backend
        function getStudentResults(event) {
            event.preventDefault();

            const regno = document.getElementById('regno').value;

            // Fetch student data from the PHP backend using fetch API
            fetch(`getStudentDetails.php?regno=${regno}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        // Display student data
                        document.getElementById('studentName').textContent = data.name;
                        document.getElementById('studentGrade').textContent = data.grade;
                        document.getElementById('studentScore').textContent = data.score;

                        // Show the results container
                        document.getElementById('resultContainer').style.display = 'block';
                    }
                })
                .catch(error => {
                    alert("Error fetching student data");
                    console.error(error);
                });
        }
    </script>

</body>
</html>
