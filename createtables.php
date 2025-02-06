<?php
$servername = "localhost"; // Use "127.0.0.1" or "localhost" as appropriate
$username = "root"; // Replace with a valid MySQL username, such as "root"
$password = ""; // Replace with the corresponding password (leave blank if no password)
$dbname = "omar"; // Ensure this matches the database name you created

try {
    // Establish a connection to the database
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL to create the 'users' table
    $sql = "
    CREATE TABLE IF NOT EXISTS users (
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    ";

    $conn->exec($sql);
    echo "Table 'users' created successfully!";
} catch (PDOException $e) {
    echo "Error creating table: " . $e->getMessage();
} finally {
    // Close the connection
    $conn = null;
}
?>
