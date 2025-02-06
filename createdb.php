<?php
$servername = "localhost"; // Use "127.0.0.1" or "localhost" as appropriate
$username = "root"; // Replace with a valid MySQL username, such as "root"
$password = ""; // Replace with the corresponding password (leave blank if no password)

try {
    // Establish a connection to MySQL
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL to create the database
    $sql = "CREATE DATABASE IF NOT EXISTS omar";
    $conn->exec($sql);

    echo "Database 'omar' created successfully!";
} catch (PDOException $e) {
    echo "Error creating database: " . $e->getMessage();
} finally {
    // Close the connection
    $conn = null;
}
?>
