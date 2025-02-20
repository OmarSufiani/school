<?php
// Include your database configuration
include('db_config.php'); 

// Handle the password reset logic when the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $newPassword = $_POST['newPassword'];

    // Verify the token (In real applications, verify against your database)
    if ($token !== 'valid_reset_token') {
        echo json_encode(['message' => 'Invalid or expired token.']);
        exit;
    }

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Example: Update the password in the database
    // Assuming you have a 'users' table with columns 'password' and 'reset_token'
    $stmt = $db->prepare("UPDATE users SET password = ? WHERE reset_token = ?");
    $stmt->bind_param('ss', $hashedPassword, $token);
    $stmt->execute();

    // Optionally invalidate the reset token after use
    // $stmt = $db->prepare("UPDATE users SET reset_token = NULL WHERE reset_token = ?");
    // $stmt->bind_param('s', $token);
    // $stmt->execute();

    // Send a success message
    echo json_encode(['message' => 'Your password has been successfully reset.']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Your Password</h2>

    <!-- Password Reset Form -->
    <form id="reset-password-form" method="post">
        <input type="hidden" id="token" name="token">
        <label for="new-password">Enter a new password:</label>
        <input type="password" id="new-password" name="newPassword" required>
        <button type="submit">Reset Password</button>
    </form>

    <!-- Displaying success or error messages -->
    <div id="message"></div>

    <script>
        // Extract token from the URL
        const urlParams = new URLSearchParams(window.location.search);
        const token = urlParams.get('token');
        document.getElementById("token").value = token;

        // Handle form submission
        document.getElementById("reset-password-form").addEventListener("submit", function(event) {
            event.preventDefault();
            const newPassword = document.getElementById("new-password").value;
            const token = document.getElementById("token").value;

            // Send the form data via a POST request using Fetch API
            fetch(window.location.href, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `token=${encodeURIComponent(token)}&newPassword=${encodeURIComponent(newPassword)}`
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById("message").textContent = data.message;
            })
            .catch(error => {
                document.getElementById("message").textContent = "Error: " + error.message;
            });
        });
    </script>
</body>
</html>
