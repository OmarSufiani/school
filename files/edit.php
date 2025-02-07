<?php
include './db_config.php';

// Fetch all records from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <h1>Manage Users</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td>
                        <button class="edit-btn" onclick="editUser(<?php echo $row['id']; ?>)">Edit</button>
                        <button class="delete-btn" onclick="deleteUser(<?php echo $row['id']; ?>)">Delete</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <div id="editForm" class="hidden">
        <h2>Edit User</h2>
        <form id="editUserForm" action="update.php" method="POST">
            <input type="hidden" name="id" id="editId">
            <label for="name">Name:</label>
            <input type="text" name="name" id="editName" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="editEmail" required><br>

            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="editPhone" required><br>

            <button type="submit">Update</button>
        </form>
        <button onclick="closeEditForm()">Close</button>
    </div>
</body>
</html>
