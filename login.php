<?php
session_start();

// Prevent caching of the page
header("Cache-Control: no-cache, no-store, must-revalidate"); // Disable caching
header("Pragma: no-cache"); // For older browsers
header("Expires: 0"); // Expire immediately

// If user is already logged in, redirect to homepage
if (isset($_SESSION['user_id'])) {
    header("Location: homepage.php");
    exit();
}

// Initialize error messages array
$errors = [];

// Process login when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('db_config.php');

    // Get the form input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Server-side validation
    if (empty($email)) {
        $errors[] = "Email is required.";
    } else {
        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    // If there are no validation errors, proceed with login
    if (empty($errors)) {
        // Sanitize email to prevent SQL Injection
        $email = $conn->real_escape_string($email);

        // Query to fetch the user from the database
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Check if the password is correct using password_verify
            if (password_verify($password, $row['password'])) {
                // Start session for the logged-in user
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['role'] = $row['role']; // Store user role in session

                // Redirect to homepage
                header("Location: homepage.php");
                exit();
            } else {
                $errors[] = "Invalid password.";
            }
        } else {
            $errors[] = "No user found with this email.";
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            background:Url("./images/admin.jpg");
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: blue;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: blue;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: blue;
        }

        .form-container a {
            text-decoration: none;
            color: blue;
            font-size: 14px;
            margin-top: 10px;
        }

        .form-container a:hover {
            text-decoration: underline;
        }

        /* Error Messages */
        .error {
            color: red;
            font-size: 14px;
        }

    </style>
</head>
<body>

<div class="form-container">
    <h2>Login</h2>

    <!-- Display error messages -->
    <?php
    if (!empty($errors)) {
        echo '<div class="error">';
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
        echo '</div>';
    }
    ?>

    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" required placeholder="Enter your email">
        
        <label for="password">Password:</label>
        <input type="password" name="password" required placeholder="Enter your password">
        
        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>
