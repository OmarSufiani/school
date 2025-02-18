<?php
include('db_config.php');
include('header.php');
include('sidebar2.php');

$errorMessage = ''; // Variable to store validation error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Form Validation
    if (empty($first_name) || empty($last_name) || empty($email) || empty($role) || empty($password) || empty($confirm_password)) {
        $errorMessage = 'All fields are required!';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = 'Invalid email format!';
    } elseif ($password !== $confirm_password) {
        $errorMessage = 'Passwords do not match!';
    } elseif (strlen($password) < 6) { // Password strength validation (minimum 6 characters)
        $errorMessage = 'Password should be at least 6 characters!';
    }

    // Proceed if no validation errors
    if (empty($errorMessage)) {
        // Hash password before storing it
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // SQL query to insert the new user into the database
        $sql = "INSERT INTO users (first_name, last_name, email, role, password) 
                VALUES ('$first_name', '$last_name', '$email', '$role', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            $successMessage = "New user added successfully!";
        } else {
            $errorMessage = "Error: " . $conn->error;
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
    <title>Add User</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            margin-top: 90px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 16px;
            color: #555;
            display: block;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #4CAF50;
        }

        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-group button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
        }

        .form-group button:hover {
            background-color: #45a049;
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
        }

        .form-footer a {
            color: #4CAF50;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        /* Styling for error and success messages */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Add User</h2>

        <!-- Display Error Message if there is a validation error -->
        <?php if (!empty($errorMessage)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
        <?php } ?>

        <!-- Display Success Message if the user was added successfully -->
        <?php if (isset($successMessage)) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $successMessage; ?>
        </div>
        <?php } ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required placeholder="Enter first name" value="<?php echo isset($first_name) ? $first_name : ''; ?>">
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required placeholder="Enter last name" value="<?php echo isset($last_name) ? $last_name : ''; ?>">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required placeholder="Enter email address" value="<?php echo isset($email) ? $email : ''; ?>">
            </div>

            <div class="form-group">
                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="">Select Role</option>
                    <option value="supperAdmin" <?php echo isset($role) && $role == 'supperAdmin' ? 'selected' : ''; ?>>SupperAdmin</option>
                    <option value="admin" <?php echo isset($role) && $role == 'admin' ? 'selected' : ''; ?>>Admin</option>
                    <option value="staff" <?php echo isset($role) && $role == 'staff' ? 'selected' : ''; ?>>Staff</option>
                    <option value="student" <?php echo isset($role) && $role == 'student' ? 'selected' : ''; ?>>Student</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required placeholder="Enter password">
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm password">
            </div>

            <div class="form-group">
                <button type="submit"><i class="fas fa-user-plus"></i> Add User</button>
            </div>
        </form>
    </div>

</body>
</html>
