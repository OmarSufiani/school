<?php
session_start(); // Start or resume the session

// Destroy all session data
session_unset(); // Remove all session variables
session_destroy(); // Destroy the session

// Prevent caching to ensure that logged-out users can't access restricted pages via back button
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies

// Redirect to the login page or home page
header("Location: ../index.php");
exit(); // Ensure no further code is executed
?>
