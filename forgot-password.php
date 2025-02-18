<?php
// forgot
// 
 include('db_config.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Example users database (use a real database in production)
    $users = [
        ['email' => 'hommiedelaco@gmail.com.com', 'password' => 'hashed_password']
    ];

    $user = null;
    foreach ($users as $u) {
        if ($u['email'] === $email) {
            $user = $u;
            break;
        }
    }

    if (!$user) {
        echo json_encode(['message' => 'No account with that email found.']);
        exit;
    }

    // Generate a reset token (in a real scenario, save the token in the database)
    $resetToken = bin2hex(random_bytes(16)); // Simple token generation
    $resetLink = "http://localhost/reset-password.php?token=$resetToken";

    // Send email with the reset link
    $subject = "Password Reset Request";
    $message = "Click the following link to reset your password: $resetLink";
    $headers = "From: no-reply@yourdomain.com";

    if (mail($email, $subject, $message, $headers)) {
        // Save the token and associate it with the user in a real app (not shown here)
        echo json_encode(['message' => 'Password reset link has been sent to your email.']);
    } else {
        echo json_encode(['message' => 'Failed to send email.']);
    }
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
    <form id="reset-password-form" method="post" action="">
        <input type="hidden" id="token" name="token">
        <label for="new-password">Enter a new password:</label>
        <input type="password" id="new-password" name="new-password" required>
        <button type="submit">Reset Password</button>
    </form>

    <div id="message"></div>

    <script>
        // Extract token from the URL
        const urlParams = new URLSearchParams(window.location.search);
        const token = urlParams.get('token');
        document.getElementById("token").value = token;

        document.getElementById("reset-password-form").addEventListener("submit", function(event) {
            event.preventDefault();
            const newPassword = document.getElementById("new-password").value;
            const token = document.getElementById("token").value;

            fetch('reset-password.php', {
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
